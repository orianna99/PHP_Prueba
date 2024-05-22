$(document).ready(function() {
    $('#show-table').click(function() {
        $('#table').show();
    });

    $('.edit-btn').click(function() {
        var documentoId = $(this).data('id');
        fetch('/document/' + documentoId)
            .then(response => response.json())
            .then(data => {
                $('#id_documento').val(data.documento.DOC_ID);
                $('#nombre_documento').val(data.documento.DOC_NOMBRE);
                $('#contenido_documento').val(data.documento.DOC_CONTENIDO);

                var select = $('#tipo_documento');
                select.empty();
                select.append('<option value="">Seleccione uno</option>');
                data.tiposDocumentos.forEach(function(tipo) {
                    var option = $('<option></option>').attr('value', tipo.TIP_ID).text(tipo.TIP_NOMBRE);
                    if (tipo.TIP_ID == data.documento.DOC_ID_TIPO) {
                        option.attr('selected', 'selected');
                    }
                    select.append(option);
                });

                var select_proceso = $('#proceso_documento');
                select_proceso.empty();
                select_proceso.append('<option value="">Seleccione uno</option>');
                data.proProcesos.forEach(function(proceso) {
                    var option = $('<option></option>').attr('value', proceso.PRO_ID).text(proceso.PRO_NOMBRE);
                    if (proceso.PRO_ID == data.documento.DOC_ID_PROCESO) {
                        option.attr('selected', 'selected');
                    }
                    select_proceso.append(option);
                });
            })
            .catch(error => console.error('Error al obtener los datos:', error));
        
        $('#editModal').modal('show');
    });
});

function confirmDelete(id) {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "¡No podrás revertir esto!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: '¡Sí, eliminar!',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Enviar el formulario si se confirma la eliminación
            document.getElementById('deleteForm').submit();
        }
    });
}
