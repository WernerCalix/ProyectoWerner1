@extends('layouts.app')
@section('titulo', 'Categorias')
@section('template_title')
    Categorías
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
                                {{ __('Categorías') }}
                            </span>
                            <div class="float-right">
                                <a href="{{ route('categorias.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                    {{ __('Nueva Categoria') }}
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
                        <div class="container justify-content-center mt-5 border-left border-right">
                            <form action="{{ route('categorias.store') }}" method="POST" class="d-flex justify-content-center pt-3 pb-2">
                                @csrf
                                <input type="text" name="nombre" placeholder="+ Agregar una nota" class="form-control addtxt" required>
                                <button type="submit" class="btn btn-primary ml-2">{{ __('Agregar') }}</button>
                            </form>

                            @foreach ($categorias as $categoria)
                                <div class="d-flex justify-content-center py-2">
                                    <div class="second py-2 px-2">
                                        <span class="text1">{{ $categoria->nombre }}</span>
                                        <div class="d-flex justify-content-between py-1 pt-2">
                                            <div>
                                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="" width="18">
                                                <span class="text2">{{ $categoria->nombre }}</span>
                                            </div>
                                            <div>
                                                <span class="text3">¿Votar?</span>
                                                <span class="thumbup"><i class="fa fa-thumbs-o-up"></i></span>
                                                <span class="text4">3</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <form action="{{ route('categorias.destroy', $categoria->id) }}" method="POST" style="display:inline;">
                                                <a class="btn btn-sm btn-primary" href="{{ route('categorias.show', $categoria->id) }}">
                                                    <i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}
                                                </a>
                                                <a class="btn btn-sm btn-success" href="{{ route('categorias.edit', $categoria->id) }}">
                                                    <i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}
                                                </a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm" onclick="event.preventDefault(); confirm('¿Estás seguro que quieres eliminar?') ? this.closest('form').submit() : false;">
                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                {!! $categorias->withQueryString()->links() !!}
            </div>
        </div>
    </div>
@endsection
