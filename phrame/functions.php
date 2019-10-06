<?php

    function toXML($array,$intend=0,$before="root"){
        $output = "";
        foreach($array as $key => $value){
            if(is_int($key)){ $key = preg_replace('/s$/i',"",$before); }
            $key = str_replace(" ","_",$key);
            $output .= str_repeat("\t",$intend)."<".$key.">";
                if(!is_array($value)){
                    if(is_string($value)){
                        $output .= "<![CDATA[".$value."]]>";
                    } else {
                        $output .= (is_bool($value) ? ($value ? "true" : "false") : strval($value));
                    }
                } else {
                    $output .= "\n";
                    $output .= toXML($value,($intend+1),$key);
                    $output .= str_repeat("\t",$intend);
                }
            $output .= "</".$key.">\n";
        }
        return $output;
    }

?>