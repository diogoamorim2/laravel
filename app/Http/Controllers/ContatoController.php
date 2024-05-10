<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Contato;
use App\Http\Requests\ContatoStoreRequest;
use App\Http\Requests\ContatoUpdateRequest;
use App\Mail\FaleConosco;
use App\Mail\Newsletter;
use App\Mail\FaleConoscoContato;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $view = 'index';
    private const EMAIL_CONTATO_SISCON = 'contato@sisconsp.com.br';

    public function index(): View
    {
        $contatos = Contato::latest()->paginate(5);
        
        
        if(Auth::check())
        {
            $this->view = 'contato.index';
        }

        return view($this->view , compact('contatos'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(ContatoStoreRequest $request): RedirectResponse
    {
        
        $msgRetorno = 'Mensagem enviada com sucesso.';
        $status = 'success';

         //Salva no BD no contato cadastrado.
         $request = Contato::create($request->validated());

         if(!$request)
         {
            $msgRetorno = $msgRetorno;
            $status = 'error';
         }

         //Em caso de usuario não logado e novo cadastrado, dispara email de boas vindas
         if(!Auth::check() && $request)
         {
             $contato = Contato::findOrFail($request->id);
 
             Mail::to($contato->email)
                 ->queue(new FaleConosco($contato)); 

             Mail::to(self::EMAIL_CONTATO_SISCON)
                 ->queue(new FaleConoscoContato($contato));
         }
        
         return redirect('/contact')->with($status, $msgRetorno);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContatoStoreRequest $request): RedirectResponse
    {
        $msgRetorno = 'Mensagem enviada com sucesso.';
        $status = 'sucess';

        //Salva no BD no contato cadastrado.
        $request = Contato::create($request->validated());

        if(!$request)
        {
            $msgRetorno = 'Falha ao enviar a mensagem.';
            $status = 'error';
        }

        //Em caso de usuario não logado e novo cadastrado, dispara email de boas vindas
        if(!Auth::check()  && $request)
        {
            $contato = Contato::findOrFail($request->id);

            Mail::to($contato->email)
                //->send(new Newsletter($contato));
                ->queue(new Newsletter($contato));
        }
           
        return redirect()->route('contatos.index')
                        ->with($status, $msgRetorno);
                         //->view('contatos.index', $msgRetorno, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Contato $contato): View
    {
        if(Auth::check())
        {
            $this->view = 'contato.show';
        }

        return view($this->view , compact('contato'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contato $contato)
    {
        if(Auth::check())
        {
            $this->view = 'contato.edit';
        }

        return view($this->view , compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContatoUpdateRequest $request, Contato $contato)
    {
        if(Auth::check())
        {
            $this->view = 'contato.index';
            $contato->update($request->validated());
        }
          
        return redirect()->route($this->view)
                        ->with('success','Contato atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contato $contato)
    {
        if(Auth::check())
        {
            $this->view = 'contato.index';
            $contato->delete();
        }
           
        return redirect()->route($this->view)
                        ->with('success','Contato apagado com sucesso');
    }
}
