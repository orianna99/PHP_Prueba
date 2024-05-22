@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Bienvenido al Dashboard') }}</div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-tipos="{{ $tiposDocumentos }}" data-procesos="{{$proProcesos}}">
                       Crear Registro
                    </button>
                    <button type="button" class="btn btn-primary" id="show-table">
                        Vista de Documentos
                     </button>
                    @include('modal.create')
                </div>
            </div>

            <div class="card mt-2" id="table" style="display: none">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Codigo</th>
                            <th scope="col">Contenido</th>
                            <th scope="col">Tipo</th>
                            <th scope="col">Proceso</th>
                            <th scope="col">Edicion</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documentos as $documento)
                        <tr>
                            <th>{{ $documento->DOC_ID }}</th>
                            <td>{{ $documento->DOC_NOMBRE }}</td>
                            <td>{{ $documento->DOC_CODIGO }}</td>
                            <td>{{ $documento->DOC_CONTENIDO }}</td>
                            <td>{{ $documento->tipTipoDoc->TIP_NOMBRE }}</td>
                            <td>{{ $documento->proProceso->PRO_NOMBRE }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm edit-btn" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $documento->DOC_ID }}">Editar</button>
                            </td>
                            
                            <td>
                                <form method="POST" action="{{ route('delete', $documento->DOC_ID) }}" id="deleteForm">
                                    @csrf
                                    <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $documento->DOC_ID }})">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @include('modal.edit')
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/document.js') }}"></script>

@endsection


