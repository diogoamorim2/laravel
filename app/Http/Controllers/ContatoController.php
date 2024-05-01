<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contato;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\ContatoRequest;
//use App\Http\Requests\ProductUpdateRequest;

class ContatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $contato = Contato::latest()->paginate(5);
          
        /*return view('index', compact('contato'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);*/
        
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        //Grava o email contato subscribe-email 
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContatoRequest $request): RedirectResponse
    {
        Contato::create($request->validated());
           
        return redirect()->route('index')
                         ->with('success', 'Obrigado pelo cadastro, em breve entraremos em contato.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('contato.edit',compact('contato'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContatoRequest $request, Contato $contato): RedirectResponse
    {
        $contato->update($request->validated());
          
        return redirect()->route('contato.index')
                        ->with('success','Contato editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contato $contato)
    {
        $contato->delete();
           
        return redirect()->route('contato.index')
                        ->with('success','Contato apagado successfully');
    }
}
