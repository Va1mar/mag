<?php

class Utility {
    public static function is_image($filename) {
    
    $info = @getimagesize($filename);
    
    if(!$info)
        return false;
    elseif(!in_array($info[2], array(1, 2, 3)))
        return false;
    else
        return true;
    }   
}




?>