<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Newslatter;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Http\Requests\NewslatterRequest;
//use App\Http\Requests\ProductUpdateRequest;

debugbar()->info('Passou aqui NewslatterController');

class NewslatterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        exit('NewslatterController index');
        //
        //$newslatter = Newslatter::latest()->paginate(5);
          
        /*return view('index', compact('newslatter'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);*/
        
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        exit('NewslatterController create');
        //Grava o email newslatter subscribe-email 
        return view('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewslatterRequest $request): RedirectResponse
    {
        exit('NewslatterController store');
        debugbar()->info('Passou aqui store');
        Newslatter::create($request->validated());
           
        return redirect()->route('index')
                         ->with('success', 'Obrigado pelo cadastro, em breve entraremos em newslatter.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        exit('NewslatterController show');
        return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('newslatter.edit',compact('newslatter'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewslatterRequest $request, Newslatter $newslatter): RedirectResponse
    {
        exit('NewslatterController update');
        $newslatter->update($request->validated());
          
        return redirect()->route('newslatter.index')
                        ->with('success','newslatter editado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Newslatter $newslatter)
    {
        exit('NewslatterController destroy');
        $newslatter->delete();
           
        return redirect()->route('newslatter.index')
                        ->with('success','newslatter apagado successfully');
    }
}
