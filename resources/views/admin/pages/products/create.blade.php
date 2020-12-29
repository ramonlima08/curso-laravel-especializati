@extends('admin.layouts.app')
@section('title',"Cadastrar Produtos")

@section('content')

    <h1>Cadastrando novos produtos</h1>

    <form action="{{ route('products.store') }}" class="form" method="post" enctype="multipart/form-data">
        @include('admin.pages.products._partials.form')

        <div class="form-group">
            <button class="btn btn-success" type="submit"> Enviar</button>
            <a href="{{ route('products.index')}}" class="btn btn-primary" type="button"> Voltar</a>
        </div>
    </form>


@endsection