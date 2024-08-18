@extends('layouts.app')

@section('template_title')
    Publicaciones
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
                                {{ __('Publicaciones') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('publicaciones.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Nueva Publicación') }}
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
                        <div class="profile-cover">
                            <div class="profile-cover__img">
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" />
                                <h3 class="h3">{{Auth::user()->name}}</h3>
                            </div>
                            <div class="profile-cover__action bg--img" data-overlay="0.3">
                                <button class="btn btn-rounded btn-info">
                                    <i class="fa fa-plus"></i>
                                    <span>Follow</span>
                                </button>
                                <button class="btn btn-rounded btn-info">
                                    <i class="fa fa-comment"></i>
                                    <span>Message</span>
                                </button>
                            </div>
                            <div class="profile-cover__info">
                                <ul class="nav">
                                    <li><strong>26 </strong> Proyectos </li>
                                    <li><strong> 33 </strong> Seguidores </li>
                                    <li><strong> 136 </strong> Siguiendo</li>
                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                <tr>
                                    <th>No</th>
                                    <th>Titulo</th>
                                    <th>Cantidad Comentarios</th>
                                    <th>Cantidad Replys</th> <!-- Nueva columna para Replys -->
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($publicaciones as $publicacione)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{ $publicacione->titulo }}</h5>
                                                    <p class="card-text">{{ $publicacione->descripcion }}</p>
                                                    <a href="#" class="btn btn-primary">Ver</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $publicacione->cantidad_comentarios }}</td>
                                        <td>
                                            <a href="{{ route('comentarios.index') }}">
                                                <i class="fa fa-comments"></i> {{ $publicacione->cantidad_replys }}
                                            </a> <!-- Redirigir a comentarios -->
                                        </td>
                                        <td>
                                            <form action="{{ route('publicaciones.destroy', $publicacione->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary" href="{{ route('publicaciones.show', $publicacione->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('publicaciones.edit', $publicacione->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar esta publicación?')"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
