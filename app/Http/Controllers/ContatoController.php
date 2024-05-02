<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Contato;
use App\Http\Requests\ContatoStoreRequest;
use App\Http\Requests\ContatoUpdateRequest;
use Illuminate\Support\Facades\Auth;


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
    public function create(): View
    {
        if(Auth::check())
        {
            $this->view = 'contato.create';
        }

        return view($this->view);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContatoStoreRequest $request): RedirectResponse
    {
        Contato::create($request->validated());
           
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
