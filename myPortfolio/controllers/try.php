<?php
    $a[]=['a'];
    $b[]='b';
    echo var_dump($a);
    foreach($b as $key=>$value){
        echo $key." ".$value;
    }
?>