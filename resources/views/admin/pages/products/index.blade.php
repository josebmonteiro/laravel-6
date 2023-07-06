@extends('admin.layouts.app')

@section('title', 'Gestão de Produtos')

@section('content')
    <h1>Exibindo os produtos</h1>

    <a href="{{ route('products.create')}}">Cadastrar</a>

    <hr/>

    @component('admin.components.cards')
        @slot('title')
            <h1>Titulo card</h1>
        @endslot
        Um card de exemplo
    @endcomponent

    <hr/>

    @include('admin.includes.alerts', ['content' => 'Alerta de preços de produtos'])

    <hr/>

    @if(isset($products))
        @foreach ($products as $product)
            <p class="@if ($loop->last) last @endif">{{ $product }}</p>
        @endforeach
    @endif

    <hr/>

    @forelse ($products as $product)
        <p class="@if ($loop->first) last @endif">{{ $product }}</p>
    @empty
        <p>Não existem produtos cadastrados</p>
    @endforelse

    <hr/>

    {{ $teste }}
    <!-- If normal -->
    @if ($teste === '123')
        É igual
    @elseif($teste == 123)
        É igual a 123
    @else
        É diferente
    @endif

    <!-- If invertida -->
    @unless ($teste === '123')
        Teste
    @else
        É diferente 2
    @endunless

    <!-- Possui valor ou foi setado no controler? -->
    @isset($teste2)
        {{ $teste2 }}
    @endisset

    <!-- Está vazio? -->
    @empty($teste3)
        Vazio
    @else
        Não está vazio {{ $teste3 }}
    @endempty

    <!-- Está autenticado? -->
    @auth
        <p>Autenticado</p>
    @else
        <p>Não está autenticado</p>
    @endauth

    <!-- Não está autenticado? -->
    @guest
        <p>Não está autenticado</p>
    @else
        <p>Autenticado</p>
    @endguest

    <!-- Switch normal -->
    @switch($teste)
        @case(1)
            Igual a 1
            @break
        @case(2)
            Igual a 2
            @break
        @case(123)
            Igual a 123
            @break
        @default
            Default
    @endswitch
@endsection

@push('styles')
    <style>
        .last {background: #CCC;}
    </style>
@endpush

@push('scripts')
    <script>
        document.body.style.background = '#efefef';
    </script>
@endpush