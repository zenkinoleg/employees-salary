<?php

function _prnt($s, $stop = false)
{
    if (php_sapi_name() != "cli") {
        $obj_wrap_top = "<pre>";
        $obj_wrap_bottom = "</pre>";
        $str_wrap_top = "<div>";
        $str_wrap_bottom = "</div>";
    } else {
        $obj_wrap_top = "";
        $obj_wrap_bottom = "";
        $str_wrap_top = "";
        $str_wrap_bottom = "\n\r";
    }
    if (is_array($s) || is_object($s)) {
        echo $obj_wrap_top;
        print_r($s);
        echo $obj_wrap_bottom;
    } else {
//      echo "<div>" . str_replace("\n","<br />",htmlentities($s)) . "</div>";
        echo $str_wrap_top;
        echo $s;
        echo $str_wrap_bottom;
    }

    if ($stop) {
        exit();
    }
}
