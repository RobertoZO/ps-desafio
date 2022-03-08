@extends('layouts.page_templates.site')

@section('title', 'Todas as categorias')

@section('content')
    <table>
        <tr>
            <th class="id">
                ID
            </th>
            <th class="nome">
                Nome da Categoria
            </th>
        </tr>
        @foreach ($categorias as $categoria)
            <tr>
                <td>
                    <p>{{ $categoria->id }}</p>
                </td>
                <td>
                    <p>{{ $categoria->categoria }}</p>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
