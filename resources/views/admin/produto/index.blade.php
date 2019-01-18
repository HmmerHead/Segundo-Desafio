@extends('app')

@section('content')

<div class="container">    
    <div class="container">
      <div class="row align-items-center"> 
        <div class="col-sm">        
          <h2>Lista de Arquivos</h2>
          <p>Lista arquivos de Existentes. </p>
        </div>
        <div class="col-sm">
        <a class="btn btn-success"  href=" {{ route('produtos.create') }}">Cadastrar</a>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Código do Produto</th>
              <th>Nome do Produto</th>
              <th>Valor Unitário</th>
              <th>Tipo da unidades vendida</th>
              <th>Editar</th>
              <th>Excluir</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($produtos as $produto)
            <tr>
              <td>{{ $produto->id }}</td>
              <td>{{ $produto->sku }}</td>
              <td>{{ $produto->nome }}</td>
              <td>{{ $produto->valorUnitario }}</td>
              <td>{{ $produto->UnidadeVenda }}</td>
              <td><a class="btn btn-success"  href=" {{ route('produtos.edit', $produto->id) }} ">Editar</a></td>
              <td>
                  <form style="display: inline" action="{{ route('produtos.destroy', $produto->id) }}" method="post">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}
  
                      <button type="submit" class="btn btn-danger" 
                          onclick="return confirm('Tem certeza que deseja remover o produto?')">Deletar</button>
                    </form></td>
            </tr>
            @empty
              <div class="alert alert-warning" role="alert">
                Nenhum nota cadastrado
              </div> 
            @endforelse         
          </tbody>
        </table>         
      </div>
    </div>
  </div>
  @endsection