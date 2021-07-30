<?php

namespace App\Http\Controllers;
use App\Models\regionModel;
use Illuminate\Http\Request;

class regionController extends Controller
{
    public function obtenerRegiones($pais){
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "http://battuta.medunes.net/api/region/".$pais."/all/?key=7b6ed3d77be4dd5b5d8b5670b8f4d155",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            //CURLOPT_ENCONDING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT =>30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);
        if($err){
            echo "curl error #:". $err;
        }else{
            $objeto = json_decode($response);
            foreach ($objeto as $region){
                echo json_encode($region);
                //echo json_encode($objeto);
                $verificar = regionModel::where('region',$region->region)->first();
                if(!$verificar)
                    $nuevaRegion = new regionModel();

                $nuevaRegion->region = $region->region;
                $nuevaRegion->country = $region->country;

                $nuevaRegion->save();

            echo "<hr>";


            }

        }
    }
    //MANDAR A LLAMAR DESDE NUESTRA BASE DE DATOS POR PAIS Y NOMBRE
    public function obtenerRegionPais($pais){
        $regionPais = regionModel :: where('1')->get();
        return ['Pais' => $regionPais];
    }

    public function obtenerRegionNombre($nombre){
        $regionNombre = regionModel :: where('region',$nombre)->get();
        return ['Region' => $regionNombre];
    }

}
