<?php

namespace Deskfy\Utils;

class Mask
{

    public static function make($mask, $str){

        $str = str_replace(" ","",$str);
    
        for($i=0;$i<strlen($str);$i++){
            $mask[strpos($mask,"#")] = $str[$i];
        } 
        return $mask;
    }
}