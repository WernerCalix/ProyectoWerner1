@extends('layouts.app')
@section('titulo', 'Comentarios')
@section('template_title')
    Comentarios
@endsection

@section('content')
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Comentarios') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('comentarios.create') }}" class="btn btn-primary btn-sm" data-placement="left">
                                    {{ __('Nuevo Comentario') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success m-4">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body bg-white">
                        <div class="container">
                            <div class="row">
                                @foreach ($comentarios as $comentario)
                                    <div class="col-md-6 col-sm-12 mb-4">
                                        <div class="panel panel-default">
                                            <div class="panel-heading d-flex justify-content-between align-items-center">
                                                <h4>{{ $comentario->titulo }}</h4>
                                                <a class="btn btn-link" href="#">Ver todos</a>
                                            </div>
                                            <div class="panel-body d-flex">
                                                <img class="img-circle me-3" width="80" height="80" src="https://bootdey.com/img/Content/avatar/avatar6.png">
                                                <div>
                                                    <p>{{ $comentario->contenido }}</p>
                                                    <h5><a href="https://bootdey.com">Más fragmentos en Bootdey</a></h5>
                                                    <div class="mt-3">
                                                        <a class="btn btn-sm btn-primary" href="{{ route('comentarios.show', $comentario->id) }}">
                                                            <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                        </a>
                                                        <a class="btn btn-sm btn-success" href="{{ route('comentarios.edit', $comentario->id) }}">
                                                            <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                        </a>
                                                        <form action="{{ route('comentarios.destroy', $comentario->id) }}" method="POST" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;">
                                                                <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                {!! $comentarios->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
