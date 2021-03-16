<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Factura;

class ChartController extends Controller
{
    /*En $factura obtenemos el valor acumulativo de 
    ganancias generadas por mes del presente anio */
    public function charts(){
        $datas = $this->barchart();
        $pies = $this->piechart();
        
        return view("dashboard", compact('datas','pies'));
        //return $facturas;
        //return $pies;
    }

    private function barchart(){
        $facturas = Factura::select(DB::raw("SUM(total) as count"))
                                    ->whereYear('fecha',date('Y'))
                                    ->groupBy(DB::raw("Month(fecha)"))
                                    ->pluck('count');
        $months =   Factura::select(DB::raw("Month(fecha) as month"))
                                    ->whereYear('fecha',date('Y'))
                                    ->groupBy(DB::raw("Month(fecha)"))
                                    ->pluck('month');
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month){
            $datas[$month-1] = $facturas[$index];
        }
        return $datas;
    }

    /*Verificar si es COUNT o SUM del campo 'cantidad' de los productos*/
    //Cambio por suma de productos comprados en detalle_factura
    private function piechart(){
        $productos= DB::select('select CONVERT ( SUM(dp.cantidad) , UNSIGNED ) as y , p.nom_producto as name
                                from productos p, detalle_facturas dp, facturas f
                                where dp.id_factura=f.id and
                                dp.id_producto=p.id
                                and MONTH(f.fecha)=month(CURDATE())
                                and year(f.fecha)=year(CURDATE())
                                group by p.nom_producto;');
        return $productos;
    }
    
}
