@extends('admin.layouts.app')
@section('title',"Gestão de Produtos")

@section('content')

<h1>Exibindo o Produto</h1>

<hr>

<ul>
    <li>Nome: {{$product->name}}</li>
    <li>Preço: {{$product->price}}</li>
    <li>Descrição: {{$product->description}}</li>
</ul>

<form action="{{ route('products.destroy',$product->id) }}" method="post">
    @csrf
    @method('DELETE')
    <div class="form-group">
        <button class="btn btn-danger" type="submit"> Deletar Produto {{ $product->name }}</button>
        <a href="{{ route('products.index')}}" class="btn btn-primary" type="button"> Voltar</a>
    </div>
</form>

@endsection
