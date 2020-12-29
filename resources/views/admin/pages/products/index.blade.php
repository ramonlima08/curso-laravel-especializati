@extends('admin.layouts.app')
@section('title',"Gestão de Produtos")

@section('content')

    <h1>Exibindo os produtos</h1>

    <a href="{{ route('products.create') }}" class="btn btn-primary"> Cadastrar Produto </a>
    <hr/>
    
    <form method="post" action="{{ route('products.search') }}" class="form form-inline">
        @csrf
        <div class="col-lg-12">
            <input type="text" name="filter" placeholder="Filtrar:" class="form-control" value="{{ $filters['filter'] ?? ''}}" style="width: 50%">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </form>
    <br/>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>COD</th>
                <th>img</th>
                <th>Nome</th>
                <th>Valor</th>
                <th>Descrição</th>
                <th style="width: 15%">Ver</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{$product->id}}</td>
                    <td>@if ($product->image)
                        <img src="{{ url("storage/{$product->image}") }}" alt="{{$product->name}}" style="max-width: 100px"/>
                    @endif</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                    <td>{{$product->description}}</td>
                    <td class="text-center">
                        <a href="{{ route('products.edit',$product->id) }}" class="btn btn-sm btn-primary"> Editar </a>
                        <a href="{{ route('products.show',$product->id) }}" class="btn btn-sm btn-primary"> Ver </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @if (isset($filters))
        {!! $products->appends($filters)->links() !!}
    @else
        {!! $products->links() !!}
    @endif
    

@endsection
