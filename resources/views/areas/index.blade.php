@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Áreas
            <a href="{{ route('areas.create') }}">
                <button class="btn btn-primary">Cadastrar</button>
            </a>
        </h1>

        <table class="table">
            <thead>
            <tr>
                <th>#</th>
                <th>Descrição</th>
                <th>Cor</th>
                <th>Ações</th>
            </tr>
            </thead>
            <tbody>
            @foreach($areas as $area)
                <tr>
                    <td>{{ $area->id }}</td>
                    <td>{{ $area->description }}</td>
                    <td>{{ $area->color }}</td>
                    <td>
                        <a class="btn btn-primary" href="{{ route('areas.edit', ['area' => $area->id]) }}">Editar</a>
                        <form action="{{ route('areas.destroy', ['area' => $area->id]) }}" method="post">
                            @csrf
                            <input type="hidden" name="_method" value="delete">
                            <button type="submit" class="btn btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{$areas->links()}}
    </div>
@endsection
