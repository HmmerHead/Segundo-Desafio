@extends('app')

@section('content')

<div class="container">
  <a href=" {{ route('produtos.index') }} ">Voltar</a>
  <div class="">
    <h3>Cadastro</h3>
  </div>
  @if($errors->any())
    @foreach ($errors->all() as $error)
      <div class="alert alert-warning" role="alert">
        Todos campos devem ser preenchidos
      </div>
    @endforeach
  @endif
  <form action=" {{ route('produtos.store') }} " class="form-row" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    
    @include('admin.produto.form')
  </form>
</div>
</div>

@endsection