<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Crear Registro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('create') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Contenido</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="3"  required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="tipo" class="form-label">Tipo</label>
                        <select class="form-select" id="tipoDocumento" name="tipoDocumento" required>
                            <option value="">Seleccione uno</option>
                            @foreach($tiposDocumentos as $tipoDocumento)
                                <option value="{{ $tipoDocumento->TIP_ID }}">{{ $tipoDocumento->TIP_NOMBRE }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="proceso" class="form-label">Proceso</label>
                        <select class="form-select" id="procesos" name="procesos" required>
                            <option value="">Seleccione uno</option>
                            @foreach($proProcesos as $proProceso)
                                <option value="{{ $proProceso->PRO_ID }}">{{ $proProceso->PRO_NOMBRE }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
