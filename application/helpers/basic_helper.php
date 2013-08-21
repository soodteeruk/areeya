<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: SAIRAT
 * Date: 30/7/2556
 * Time: 20:24 น.
 */
if( ! function_exists('render_json')){
    function render_json($json){
        header('Cache-Control: no-cache, must-revalidate');
        header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
        header('Content-type: application/json');

        echo $json;
    }
}

if(!function_exists('str_format')) {
    function str_format($title, $value, $format) {
        $len = strlen($format);
        $tmp = $format.$value;

        return $title.substr($tmp, (strlen($tmp) - $len));
    }
}