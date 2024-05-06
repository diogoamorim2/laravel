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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $view = 'index';

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
        //exit('Entrou create');
         //Salva no BD no contato cadastrado.
         $request = Contato::create($request->validated());

         //Em caso de usuario não logado e novo cadastrado, dispara email de boas vindas
         if(!Auth::check())
         {
             $contato = Contato::findOrFail($request->id);
 
             Mail::to($contato->email)
                 ->queue(new FaleConosco($contato));
         }
            
         return redirect()->route('contatos.index')
                          ->with('success', 'Mensagem enviada com sucesso.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContatoStoreRequest $request): RedirectResponse
    {
        //Salva no BD no contato cadastrado.
        $request = Contato::create($request->validated());

        //Em caso de usuario não logado e novo cadastrado, dispara email de boas vindas
        if(!Auth::check())
        {
            $contato = Contato::findOrFail($request->id);

            Mail::to($contato->email)
                //->send(new Newsletter($contato));
                ->queue(new Newsletter($contato));
        }
           
        return redirect()->route('contatos.index')
                         ->with('success', 'Contato criado com sucesso.');
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
        }

        $contato->update($request->validated());
          
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
        }

        $contato->delete();
           
        return redirect()->route($this->view)
                        ->with('success','Contato apagado com sucesso');
    }
}
