@extends('layouts.app')
@section('titulo', 'Crear')
@section('template_title')
    {{ __('Create') }} Comentario
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Create') }} Comentario</span>
                    </div>
                    <div class="card-body bg-white">
                        <form method="POST" action="{{ route('comentarios.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('comentario.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
