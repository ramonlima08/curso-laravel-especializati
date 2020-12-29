@extends('admin.layouts.app')
@section('title',"Editar Produto")

@section('content')

    <h1>Editar Produto {{$product->name}}</h1>

    <form action="{{ route('products.update', $product->id) }}" class="form" method="post" enctype="multipart/form-data">
        <!-- Input proprio do laravel para o verbo PUT que a rota pede para updates -->
        @method('PUT')
        @include('admin.pages.products._partials.form')
        <div class="form-group">
            <button class="btn btn-success" type="submit"> Atualizar</button>
            <a href="{{ route('products.index')}}" class="btn btn-primary" type="button"> Voltar</a>
        </div>
    </form>
@endsection