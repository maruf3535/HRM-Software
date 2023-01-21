<?php



if (!function_exists('printManual')) {
    function printManual($req)
    {
        echo "<pre>";
        print_r($req->all());
    }
}
