<?php
class Frame{
    private static $top='top.php';
    private static $bottom='bottom.php';
        public function __construct($file) {
            include Frame::$top;
            if(is_file($file)){
            include $file;
            }elseif(is_string($file)){
                echo $file;
            }
            include Frame::$bottom;
    }
}

?>