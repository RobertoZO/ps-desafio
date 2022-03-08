@extends('layouts.page_templates.site')

@section('title', 'Todos os produtos')

@section('content')
    <div>
        <div class="filtro-styles">
            <label>
                <p>Filtro por Categoria:</p>
                <span>
                    <form action="{{ route('produtos.filtro') }}">
                        <select name="categoria_id" required>
                            <option value="">Selecione uma Categoria</option>
                            @foreach ($categorias as $categoria)
                                <option value="{{ $categoria->id }}">
                                    {{ $categoria->categoria }}
                                </option>
                            @endforeach
                        </select>
                        <button type="submit">Filtrar</button>
                    </form>
                </span>
            </label>
        </div>
        <div>
            <table>
                <tr>
                    <th class="id">ID</th>
                    <th class="nome">Nome</th>
                    <th class="descricao">Descrição</th>
                    <th class="categoria">Categoria</th>
                    <th class="imagem">Imagem</th>
                    <th class="quantidade">Quantidade</th>
                    <th class="preco">Preço</th>
                </tr>

                @foreach ($produtos as $produto)
                    <tr>
                        <td>
                            {{ $produto->id }}
                        </td>
                        <td>
                            {{ $produto->nome }}
                        </td>
                        <td>
                            {{ $produto->descricao }}
                        </td>
                        <td> {{ $produto->categoria()->pluck('categoria')->first() }} </td>
                        <td> <img src="/storage/{{ $produto->imagem }}" alt="{{ $produto->nome }}"> </td>
                        <td>{{ $produto->quantidade }} u </td>
                        <td>
                            @if ($produto->quantidade != 0)
                                R${{ $produto->preco }}
                            @else
                                Esgotado
                            @endif
                        </td>
                    </tr>
                @endforeach

            </table>
        </div>
    </div>
@endsection
