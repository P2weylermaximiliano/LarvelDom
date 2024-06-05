<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\student;
use App\Models\Parameter;

class ApiiController extends Controller
{
    public function conditionStudent($id){
        $student =Student::find($id);
        $cant=$student->assists;

        $cantclase =Parameter::find(1);
        //dd($cant);
        $cantclase=2;
        $porcentaje=count($cant)/$cantclase*100;
        //return $porcentaje;
        if ($porcentaje> 80){
            return "el alumno esta promocionado";
        } if (($porcentaje<80) && ($porcentaje>40)){
            return "el alumno esta regular";

        }else {
            return "el alumno esta libre";
        }
    }
}
