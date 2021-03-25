@extends('plantilla')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css">
<!--Tables-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">
@endsection

@section('seccion')

<div class="d-flex justify-content-between align-items-center mt-2">
    <h1>Bienvenido Usuario</h1>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
          <li class="breadcrumb-item" aria-current="page"><a href="{{ route('tablaV') }}">Ventas</a></li>
        </ol>
      </nav>
</div>
<div class="container-fluid">
    <div class="card">
        <div class="card-header bg-secondary">
          <i class="bi bi-plus"></i> Creación de una Venta
        </div>

        <div class="card-body">
            <div class="row">
                <div class="det col-lg-8">
                    <div class="card ">
                        <div class="card-header bg-secondary">
                        <i class="bi bi-boxes"></i> Detalle de Producto
                        </div>
                        <div class="card-body">
                            <form action="{{route('sale.create')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="mb-2">
                                    <label for="nombrecategory" class="form-label"><strong>Buscador de Producto: </strong></label>
                                </div>
                                    <div class="mb-3">
                                    <select id="sel" class="selectpicker" >
                                            <option selected disable hidden></option>
                                            @foreach($data["products"] as $pro)
                                                <option class="products" value="{{$pro->id}}">{{$pro->nom_producto}}</option>
                                            @endforeach

                                        </select>

                                    </div>
                                    <div class="mb-3">
                                    <hr>
                                    <br>
                                        <button id="deleteall" type="button" class="btn btn-danger btn-sm btn-flat btnRemove">
                                        <i class="bi bi-trash"></i>
                                        Eliminar todos mis items
                                        </button>

                                    </div>

                                    <div class="mb-3"><hr></div>


                                    <div class="mb-3">
                                        <table id="items-table" class="table table-striped">
                                        <thead class="table-light">
                                            <tr>
                                                <th>Eliminar</th>
                                                <th>Producto</th>
                                                <th>Categoría</th>
                                                <th>PVP</th>
                                                <th>Cantidad</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody id="datos">

                                        </tbody>
                                        </table>
                                    </div>
                                </div>

                                </div>
                                    </div>
                                    </div>

                                        <div  class="det col-lg-4 ">
                                             <div class="card ">
                                                 <div class="card-header bg-secondary">
                                                    <i class="bi bi-boxes"></i> Datos de la Factura
                                                        </div>
                                                        <div class="card-body">


                                            <div class="row">
                                                <div class="mb-3">
                                                    <label for="nombrecategory" class="form-label"><strong>Fecha Venta:</strong></label>
                                                            <div id="form-date" class="form-group">
                                                                <div class='input-group date' id='datetimepicker1'>
                                                                    <span id="span-date" class="input-group-addon">
                                                                    <input class="form-control" name="fechafac" id="date-select" type='text' class="form-control" val="xd" required />


                                                                    </span>
                                                                </div>
                                                            </div>
                                                </div>
                                                <div class="mb-2">
                                                    <label for="nombrecategory" class="form-label"><strong>Cliente:</strong></label>

                                                </div>
                                                <div class="mb-3">
                                                    <select class="form-control" name="cliente" id="client-sel" class="selectpicker" required>
                                                            <option selected disable hidden></option>
                                                            @foreach($data["clients"] as $cl)
                                                                <option class="products" value="{{$cl->id}}">{{$cl->nombre}} {{$cl->apellido}}</option>
                                                            @endforeach

                                                        </select>

                                                    </div>
                                                <div class="mb-3">
                                                    <label for="nombrecategory" class="form-label"><strong>Subtotal:</strong></label>
                                                    <input class="form-control" type="number" value="0" readonly class="form-control " name="subtotal" id="subtotal" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nombrecategory" class="form-label"><strong>Iva 12%:</strong></label>
                                                    <input  type="number" value="0" readonly class="form-control " name="iva" id="iva" >
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nombrecategory" class="form-label"><strong>Total:</strong></label>
                                                    <input type="number" value=0  id="totalfac"  class="form-control " name="total"  readonly>
                                                </div>
                                            </div>

                                    </div>
                                    </div>
                                </div>
                        </div>


                        <div class="card-footer ">
                            <button type="submit" class="btn btn-info fw-bold"><i class="bi bi-plus"></i> Guardar registro</button>
                            <a href="{{redirect()->getUrlGenerator()->previous()}}" type="button" class="btn btn-success fw-bold"> <i class="bi bi-arrow-repeat"></i>Cancelar</a>
                        </div>
        </form>

      </div>
</div>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

<script type="text/javascript">

$("#sel").select2({
      placeholder: "Selecciona un producto",
      allowClear: true
  });

  $("#client-sel").select2({
      placeholder: "Selecciona un cliente",

  });

  $(function() {
            $('#datetimepicker1').datetimepicker({
                format:'YYYY-MM-DD'
            });
        });
        var cont = $("#datos tr").size();
        console.log(cont);
        function productDelete(ctl) {
            var t = $('#items-table').DataTable();
            var t2 = 0.00;
            var t1 = 0.00;
            t2 = parseFloat($(ctl).parents("tr").find(":nth-child(6)").find(":first-child").val()).toFixed(2);
            t.row($(ctl).parents("tr")).remove().draw();
            var t1 = parseFloat($("#subtotal").val()).toFixed(2);
            t1 = parseFloat(t1);
            t2 = parseFloat(t2);
            console.log(typeof(t2));
            console.log(t2);
            var s = parseFloat(t1-t2).toFixed(2);
            $("#subtotal").val(parseFloat(t1-t2).toFixed(2));
            $("#iva").val(parseFloat(s*0.12).toFixed(2));
            $("#totalfac").val(parseFloat($("#subtotal").val())+parseFloat($("#iva").val()));
            cont--;

        }

        function updateSub(val){
            var bef = $(val).parents("tr").find(":nth-child(6)").find(":first-child").val();
            console.log(bef);
            var subtotalb = parseFloat($("#subtotal").val()).toFixed(2)-parseFloat(bef).toFixed(2);
            //console.log($(val).parents("tr").find(":nth-child(4)").text());
            let precio = parseFloat($(val).parents("tr").find(":nth-child(4)").find(":first-child").val());
            console.log(precio);
            console.log(val.value);
            $(val).parents("tr").find(":nth-child(6)").find(":first-child").val((precio*val.value).toFixed(2));
            var s = subtotalb+(precio*val.value);
            $("#subtotal").val(parseFloat(s).toFixed(2));
            $("#iva").val(parseFloat(s*0.12).toFixed(2));
            $("#totalfac").val(parseFloat($("#subtotal").val())+parseFloat($("#iva").val()));

        }



        function updateIva(val){

            $("#iva").val(val.value*0.12);
            console.log(val.value*0.12)
        }

        $("#subtotal").attr("onchange","updateIva(this);")

  function change(){
    var sel = document.getElementById("sel");
    $(".select2-selection__clear").remove();
    var seleccionado = sel.options[sel.selectedIndex].value;
    console.log(seleccionado);
    var data ;

    $.ajax({

                  url: '/erp/product/'+seleccionado,
                  type: "Get",
                  //this will expect a json response
                  data:{},
                   success: function(response){
                        data = response.data;
                        console.log(response);
                        cont++;
                        console.log(cont);
                        var t = $('#items-table').DataTable();
                        t.row.add([" <button type='button' onclick='productDelete(this);' class='btn btn-danger btn-sm'><i class='bi bi-trash-fill'></i></button>",`<input class="esconder" value=${response[0]["id"]} name="id_prods[]">${response[0]["nom_producto"]}</input>`,`</input>${response[0]["nombre"]}` ,`<input value=${response[0]["precio"]} name="precio[]"></input>`,"<input name='cantidad[]' min=1 class='canti' onchange='updateSub(this);' ' value=0 type='number' style=width:70%>", "<input name='totales[]'  readOnly type='number' value=0> </input>" ]).draw();




                        $(`#datos :nth-child(${cont}) :nth-child(3) `).attr("value",response[0]["id_categoria"]);

                        $(`#datos :nth-child(${cont}) :nth-child(4) `).attr("class","prize")
                        $(`#datos :nth-child(${cont}) :nth-child(5) :nth-child(1) `).attr("value",1);
                        var elem = document.querySelector(`#datos :nth-child(${cont}) :nth-child(5) :nth-child(1)`);
                        elem.setAttribute('value',1);
                        updateSub((elem));





            }

                });



    }

    document.getElementById("sel").setAttribute("onchange","change();")

    function deleteAll(){

        $("#datos tr").each(function(){

            productDelete(this.firstChild.firstChild);
        })

    }

    $("#deleteall").click(deleteAll);








</script>


@endsection

@section('js')
    <!--Tables-->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="{{ asset('js/tables.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <!--Alerts-->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    @if (session('eliminar') == 'ok')
        <script>
            Swal.fire(
                '!Borrado!',
                'El elemento fue borrado exitosamente',
                'success'
            );
        </script>
    @endif
    <script src="{{ asset('js/alerts.js') }}"></script>
@endsection
