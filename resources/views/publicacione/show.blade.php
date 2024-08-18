@extends('layouts.app')
@section('titulo', 'Ver')
@section('template_title')
    {{ $publicacione->name ?? __('Show') . " " . __('Publicacione') }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Publicacione</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary btn-sm" href="{{ route('publicaciones.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body bg-white">

                                <div class="form-group mb-2 mb20">
                                    <strong>Titulo:</strong>
                                    {{ $publicacione->titulo }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Descripcion:</strong>
                                    {{ $publicacione->descripcion }}
                                </div>
                                <div class="form-group mb-2 mb20">
                                    <strong>Cantidad Comentarios:</strong>
                                    {{ $publicacione->cantidad_comentarios }}
                                </div>

                                <div class="form-group mb-2 mb20">
                                     <strong>Creado:</strong>
                                    {{ $publicacione->created_at }}
                                </div>

                        <div class="form-group mb-2 mb20">
                            <strong>Ultima edicion:</strong>
                            {{ $publicacione->updated_at }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
