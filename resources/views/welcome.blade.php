<div>
    
</div>

<div class="modal-dialog modal-lg" id="a${id}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="card">
            <div class="card-header bg-secondary">
                <i class="bi bi-search"></i> Detalle de Venta
            </div>
            <div class="card-body">
                <table class="table" id="items-table">
                    <thead class="table-light">
                        <th scope='col'>Producto</th>
                        <th scope='col'>Categoría</th>
                        <th scope='col'>PVP</th>
                        <th scope='col'>Cantidad</th>
                        <th scope='col'>Subtotal</th>
                    </thead>
                    <tbody>
                        for(x=0;x<response.length;x++){
                            <tr>
                                <td>${response[x]['producto']}</td>
                                <td>${response[x]['cat']}</td>
                                <td class="text-center">${response[x]['pvp']}</td>
                                <td class="text-center">${response[x]['cant']}</td>
                                <td class="text-center">${response[x]['total']}</td>
                            </tr>
                        }
    
                    </tbody>
                </table>            
              </div>
        </div>
    </div>
</div>