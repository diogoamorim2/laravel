<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContatoStoreRequest;
use App\Http\Requests\ContatoUpdateRequest;
use App\Mail\FaleConoscoContato;
use App\Mail\Newsletter;
use App\Models\Contato;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $contatos = Contato::latest()->paginate(5);

        return view('contato.index', compact('contatos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContatoStoreRequest $request): RedirectResponse
    {
        // Rate limit by email to prevent spamming a single address
        $emailKey = 'contact_email_limit:'.Str::lower($request->input('email'));

        if (RateLimiter::tooManyAttempts($emailKey, 3)) {
            Log::warning('Email rate limit exceeded', ['email' => $request->input('email'), 'ip' => $request->ip()]);

            return redirect()->back()
                ->with('error', 'Muitas tentativas para este email. Tente novamente mais tarde.');
        }

        RateLimiter::hit($emailKey, 3600); // 1 hour decay

        $msgRetorno = 'Mensagem enviada com sucesso.';
        $status = 'success';

        try {
            //Salva no BD no contato cadastrado.
            $contato = Contato::create($request->validated());

            //Em caso de usuario não logado e novo cadastrado, dispara email de boas vindas
            if (! Auth::check()) {
                Mail::to($contato->email)
                    ->queue(new Newsletter($contato));

                // Send email to admin if it's a contact request (has subject or comment)
                if ($contato->assunto || $contato->comentario) {
                    Mail::to(config('services.contact.email'))
                        ->queue(new FaleConoscoContato($contato));
                }
            }

            Log::info('New contact form submission', ['id' => $contato->id, 'ip' => $request->ip()]);

        } catch (\Exception $e) {
            Log::error('Failed to store contact or send email', [
                'error' => $e->getMessage(),
                'ip' => $request->ip(),
            ]);

            return redirect()->back()
                ->with('error', 'Falha ao enviar a mensagem. Por favor, tente novamente mais tarde.');
        }

        return redirect()->back()
            ->with($status, $msgRetorno);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contato $contato): View
    {
        return view('contato.show', compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contato $contato)
    {
        return view('contato.edit', compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContatoUpdateRequest $request, Contato $contato)
    {
        $contato->update($request->validated());
        Log::info('Contact updated', ['id' => $contato->id, 'user_id' => Auth::id()]);

        return redirect()->route('contatos.index')
            ->with('success', 'Contato atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contato $contato)
    {
        $contato->delete();
        Log::info('Contact deleted', ['id' => $contato->id, 'user_id' => Auth::id()]);

        return redirect()->route('contatos.index')
            ->with('success', 'Contato apagado com sucesso');
    }
}
