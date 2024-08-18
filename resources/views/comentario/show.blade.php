@extends('layouts.app')
@section('titulo', 'Ver')
@section('template_title')
    {{ $comentario->name ?? __('Show') . " " . __('Comentario') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Comentario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('comentarios.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Titulo:</strong>
                                    {{ $comentario->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Contenido:</strong>
                                    {{ $comentario->contenido }}
                                </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Creado:</strong>
                            {{ $comentario->created_at }}
                        </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Ultima edicion:</strong>
                            {{ $comentario->updated_at }}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
