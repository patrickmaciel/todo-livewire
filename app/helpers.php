<?php

if (!function_exists('isImage')) {
    function isImage($extension)
    {
        return in_array($extension, ['jpg', 'jpeg', 'png', 'gif']);
    }
}


if (!function_exists('removeMascaraMoeda')) {
    function removeMascaraMoeda($valor)
    {
        if (strpos($valor, ',') === false) {
            return $valor;
        }

        return str_replace(',', '.', preg_replace('/[^0-9,]/', '', $valor));
    }
}
