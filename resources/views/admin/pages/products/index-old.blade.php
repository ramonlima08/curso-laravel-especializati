@extends('admin.layouts.app')
@section('title',"Gestão de Produtos")

@section('content')

    <h1>Exibindo os produtos</h1>

    <a href="{{ route('products.create') }}"> Cadastrar Produto </a>

    @component('admin.components.card')
        @slot('title')
            Passando valor pro title
        @endslot
        Um card de exemplo
    @endcomponent

    <hr/>

    @include('admin.alerts.alert', ['content' => 'Texto de Alerta para add no include'])
    <hr/>
    @if(isset($products))
        @foreach ($products as $product)
            <p class="@if($loop->last) last @endif">{{$product}}</p>
        @endforeach
    @endif
    <hr/>
    @forelse ($products as $product)
        <p class="@if($loop->first) last @endif">{{$product}}</p>
    @empty
        <p>Não foi encontrado produtos</p>
    @endforelse
    <hr/>

    @if($teste === 123)
        É igual
    @elseif($teste === 1234)
        Esse tem o 4
    @else
        Diferente
    @endif

    <br/>

    @unless($teste === '1234')
    <p>Verifica se é diferente, inverso do IF</p>
    @endunless

    <br/>

    @isset($teste2)
        <p>{{$teste2}}</p>
    @endisset

    @empty($teste3)
        <p>Vazio</p>
    @endempty

    @auth
        <p>Autenticação</p>
    @else
        <p>Não tem Autenticação</p>
    @endauth

    @guest
        <p>Não tem Autenticação</p>
    @endguest

    @switch($teste)
        @case(1)
            Igual a 1
            @break
        @case(2)
            Igual a 2
            @break
        @case(1234)
            Igual a 1234
            @break
        @default
            Igual a qualquer outra coisa
    @endswitch

@endsection


@push('styles')
    <style>
        .last{
            background: red;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#ccc'
    </script>
@endpush