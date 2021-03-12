$('#items-table').DataTable({
    responsive: true,
    autoWidth: false,
    "language": {
        "lengthMenu": "Mostrar _MENU_ registros por página",
        "zeroRecords": "No existe registro",
        "info": "Mostrando la página _PAGE_ of _PAGES_",
        "infoEmpty": "No hay registros disponibles",
        "infoFiltered": "(filtrado de _MAX_ registro totales)",
        "search": "Buscar:",
        "paginate":{
            "next":"Siguiente",
            "previous": "Anterior"
        }
    }
});