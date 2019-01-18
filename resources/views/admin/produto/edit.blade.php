@extends('app')

@section('content')

<div class="container">
    <a href=" {{ route('produtos.index') }} ">Voltar</a>
  <h3>Alterar Dados</h3>
  <form action="{{ route('produtos.update', $produtos->id) }}" class="form-row" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      {{ method_field('PUT') }}

      @include('admin.produto.form')
          
  </form>
</div>
</div>

@endsection