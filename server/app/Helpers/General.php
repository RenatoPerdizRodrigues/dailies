<?php

if (! function_exists('dataParaAmericana')) {
    function dataParaAmericana($data) {
        if($data != null){
            $data = explode('/', $data);
         $data = $data[2] . '-' . $data[1] . '-' . $data[0];
        } else {
            $data = null;
        }
        

        return $data;
    }
}

if (! function_exists('dataParaBrasileira')) {
    function dataParaBrasileira($data) {
        if($data != null){
            $data = explode('-', $data);
            $data = $data[2] . '/' . $data[1] . '/' . $data[0];
        } else {
            $data = null;
        }
        

        return $data;
    }
}