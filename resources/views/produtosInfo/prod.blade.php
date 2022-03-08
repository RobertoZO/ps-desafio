@extends('layouts.page_templates.site')

@section('title', 'Produto')

@section('content')
    <tr>
        <td>
            <p>{{ $produto->nome }}</p>
        </td>
        <td>
            <p>{{ $produto->descricao }}</p>
        </td>
        <td> <span>{{ $produto->categoria()->pluck('categoria')->first() }}</span> </td>
        <td> <img style="width: 100px;" src="/storage/{{ $produto->imagem }}" alt="{{ $produto->nome }}"> </td>
        <td> <span>Quantidade: {{ $produto->quantidade }}</span> </td>
        <td> <span>Preco: {{ $produto->preco }}</span> </td>
    </tr>
@endsection
