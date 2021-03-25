<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DetalleFactura;
use Barryvdh\DomPDF\Facade as PDF;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$sales = DB::table('facturas')
                                ->join('clientes', 'facturas.id_cliente', '=', 'clientes.id')
                                ->select('clientes.nombre as nombre','clientes.apellido as apellido',
                                'facturas.id', 'facturas.fecha as fecha', 'facturas.total as subtotal',
                                'facturas.total as impuesto', 'facturas.total')
                                ->get();*/
        $sales = DB::select('select clientes.nombre as nombre, clientes.apellido as apellido, facturas.id as id,
                            facturas.fecha as fecha, ROUND((facturas.total / 1.12),2) as subtotal,
                            ROUND(facturas.total - (facturas.total / 1.12),2 ) as impuesto, facturas.total as total
                            from clientes, facturas
                            where facturas.id_cliente= clientes.id;');
        //return $sales;
        return view('table.tablaV', compact('sales'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function show(Factura $factura)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {


        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $detalles = DB::table('detalle_facturas')
                                        ->select('detalle_facturas.*')
                                        ->where('detalle_facturas.id_factura','=',$id)
                                        ->get();

        if(($request->df_ids)===null){
            for($i=0; $i<count($detalles); $i++){
                $df=DetalleFactura::findOrFail($detalles[$i]->id);
                $df->delete();
            }
        }else{
            for($i=0; $i<count($detalles); $i++){

                if(array_search($detalles[$i]->id,$request->df_ids)===false){
                    $detail = DetalleFactura::findOrFail($detalles[$i]->id);
                    $detail->delete();
                    //echo "se debe eliminar ".$detalles[$i]->id;
                }else{
                    $n=array_search($detalles[$i]->id,$request->df_ids);
                    $df= DetalleFactura::findOrFail($detalles[$n]->id);
                    $df->cantidad=$request->cantidad[$n];
                    $df->total=$request->totales[$n];
                    $df->save();
                }

            }

            for($i=0;$i<count($request->df_ids);$i++){
                if($request->df_ids[$i]==-1){
                    $this->addSaleDetail($request->id_prods[$i],$request->cantidad[$i],$request->totales[$i],$request->precio[$i],$id);
                }
            }

        }


        $sale = Factura::findOrFail($id);
        $fecha = date('Y-m-d',strtotime($request->input('fechafac')));
        $sale->fecha = $fecha;
        $sale->total = floatval($request->input('total'));
        $sale->id_cliente = $request->input('cliente');
        $sale->save();


        return redirect()->route('tablaV');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Factura  $factura
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sale = Factura::findOrFail($id);
        $sale->delete();
        return back()->with('eliminar','ok');
    }

    public function addSaleDetail($idp,$cantidad,$total,$precio, $id){

        $newD = new DetalleFactura;
        $newD->cantidad=$cantidad;
        $newD->total=$total;
        $newD->precioUnitario=$precio;
        $newD->id_factura=$id;
        $newD->id_producto=$idp;
        $newD->save();


    }

    public function imprimir($id){
        $sales = DB::table('facturas')
                                    ->join('clientes', 'facturas.id_cliente','=', 'clientes.id')
                                    ->join('detalle_facturas', 'detalle_facturas.id_factura','=', 'facturas.id')
                                    ->join('productos', 'detalle_facturas.id_producto','=', 'productos.id')
                                    ->join('categorias', 'productos.id_categoria','=', 'categorias.id')
                                    ->select('facturas.id as numfactura','facturas.fecha','facturas.total','categorias.nombre as categoria','productos.nom_producto','clientes.*','detalle_facturas.cantidad as cant','detalle_facturas.precioUnitario as pvp')
                                    ->where('facturas.id','=',$id)
                                    ->get();

        $fact = DB::table('facturas')
                                    ->join('clientes', 'facturas.id_cliente','=', 'clientes.id')
                                    ->select('facturas.*','clientes.nombre as nombre','clientes.apellido as apellido','clientes.cedula as cedula')
                                    ->where('facturas.id','=',$id)
                                    ->get();
        $data = ["fact"=>$fact, "sales"=>$sales];

        $pdf = PDF::loadView('pdf.reporteVenta', compact('data'));
        return $pdf->stream();

    }

    public function saleData($id){
        $info = DB::table('facturas')
                                    ->join('detalle_facturas','facturas.id','=','detalle_facturas.id_factura')
                                    ->join('productos','detalle_facturas.id_producto','=', 'productos.id')
                                    ->join('categorias', 'productos.id_categoria','=', 'categorias.id')
                                    ->select('productos.nom_producto as producto','detalle_facturas.precioUnitario as pvp','detalle_facturas.total as total','detalle_facturas.cantidad as cant','categorias.nombre as cat')
                                    ->where('facturas.id','=',$id)
                                    ->get();

        return $info;
    }
}
