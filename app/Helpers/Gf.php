<?php
namespace App\Helpers;

class Gf {

    public static function hola(){
        echo "hola mundo desde hleper";
    }

    public function setValue($value){

        return strtolower(trim($value));
   }

}