<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $produtos = Produto::get();
        return view('admin.produto.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoUnid = ['Caixa', 'Unitário', 'Pacote', 'Saco']; // Variável usada para inserir valores na tag select
        return view('admin.produto.create', compact('tipoUnid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
         * Verificação para saber se já existe o respectivo valor, ou se o campo foi preenchido
         * 
         */
        $request->validate([
            'nome' => 'required',
            'sku' => 'required',
        ]);

        $produto = new Produto;
        $produto->sku = $request->input("sku");
        $produto->nome = $request->input("nome");
        $produto->valorUnitario = $request->input("valorUnitario");
        $produto->UnidadeVenda = $request->input("UnidadeVenda");
        $produto->save();        
        return redirect()->route('produtos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produtos = Produto::findOrFail($id);
        $tipoUnid = ['Caixa', 'Unitário', 'Pacote', 'Saco']; // Variável usada para inserir valores na tag select
        return view('admin.produto.edit', compact('produtos', 'tipoUnid'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        /**
         * Verificação para saber se já existe o respectivo valor, ou se o campo foi preenchido
         * 
         */
        $request->validate([
            'nome' => 'required',
            'sku' => 'required',
            'valorUnitario' => 'required'
        ]);
        $produto = Produto::findOrFail($id);
        $produto->sku = $request->input("sku");
        $produto->nome = $request->input("nome");
        $produto->valorUnitario = $request->input("valorUnitario");
        $produto->UnidadeVenda = $request->input("UnidadeVenda");
        $produto->save();        
        return redirect()->route('produtos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produtos = Produto::findOrFail($id);
        if ($produtos->delete()) {
            return redirect()->route('produtos.index');
        }
    }
}
