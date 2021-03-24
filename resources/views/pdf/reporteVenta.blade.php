<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura {{$data["fact"][0]->id}}</title>
    <style>
    h1{
        text-align: center;
    }
    thead{
        margin-bottom: 10px;
    }
    table{
        text-align: center;
        margin: 0 auto;
        width: 80%;
    }

    .first{
        width: 30%;
    }
    </style>
</head>
<body>
    <h1 >Adrick's</h1>
    <p><strong>Factura: </strong>{{$data["fact"][0]->id}}</p>
    <p><strong>Fecha de Venta: </strong>{{$data["fact"][0]->fecha}}</p>
    <p><strong>Cliente: </strong>{{$data["fact"][0]->nombre}} {{$data["fact"][0]->apellido}}</p>
    <p><strong>Cédula: </strong>{{$data["fact"][0]->cedula}}</p>

        <br>

        <table>
            <thead>
                <th><strong>Categoria</strong></th>
                <th><strong>Producto</strong></th>
                <th><strong>Cant</strong></th>
                <th><strong>P. Unit</strong></th>
                <th><strong>Total</strong></th>
            </thead>
        </table>
        <br>
        <table>
            <tbody id="datos">

                @foreach($data["sales"] as $df)
                <tr>
                    <td class="first" >{{$df->categoria}}</td>
                    <td>{{$df->nom_producto}}</td>
                    <td>{{$df->cant}}</td>
                    <td>{{$df->pvp}}</td>
                    <td>{{$df->cant*$df->pvp}}</td>
                </tr>
                @endforeach
            <tr><td class="first">Subtotal</td><td></td><td> </td><td></td><td>{{$data["fact"][0]->total/1.12}}</td></tr>
            <tr><td class="first">Iva</td><td></td><td></td><td></td><td>{{($data["fact"][0]->total/1.12)*12/100}}</td></tr>
            <tr><td class="first">Total</td><td></td><td></td><td></td><td>{{$data["fact"][0]->total}}</td></tr>
            </tbody>
    </table>
    <br>
    <br>
    <br>
    <br>
    <footer>
    <p style="text-align:center"><strong>****GRACIAS POR SU COMPRA****</strong></p>
    <p style="text-align:center"><strong>NO SE ACEPTAN CAMBIOS NI DEVOLUCIONES</strong></p>
    </footer>

</body>
</html>
