<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Produto;

/**
* Os dados que serão exibidos nas View's, encontram-se em 
*  resources/views/admin/produto/
* 
*/

class ProdutoController extends Controller
{
    /**
     * Função que buscará os dados e exibirá uma listagem de produtos
     * Na View: index.blade.php
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $produtos = Produto::get();
        return view('admin.produto.index', compact('produtos'));
    }

    /**
     * Função retorna o formulário para cadastro
     * View: create.blade.php
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoUnid = ['Caixa', 'Unitário', 'Pacote', 'Saco']; // Variável usada para inserir valores na tag select
        return view('admin.produto.create', compact('tipoUnid'));
    }

    /**
     * Função para armazenar os dados do formulário
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
     * Função retorna o formulário para edição
     * View: edit.blade.php
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
     * Função para editar os dados do formulário
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
     * Função remover o produto
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
