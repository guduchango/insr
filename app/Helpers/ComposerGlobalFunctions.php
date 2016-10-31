<?php

if (!function_exists('in_equals')) {

    //Funcion para comparar valores en una vista si coinciden los valores retorna selected
    function inEqual($value1,$value2){

        if($value1==$value2){
            echo  ' selected ';
        }

        return '';
    }
}