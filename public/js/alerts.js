$('.items-delete').submit(function(e){
  e.preventDefault();
  Swal.fire({
    title: '¿Estás seguro?',
    text: "¡Este item se borrará definitivamente!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Sí, eliminar!',
    cancelButtonText: 'Cancelar!'
  }).then((result) => {
    if (result.value){
      this.submit();
    }
  });
});

