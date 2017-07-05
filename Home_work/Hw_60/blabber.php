<?php 
    
    include "first.php";
    echo '<div class="row">';
    for ($i=0; $i < 3; $i++) { 
        for ($j=0; $j < 3; $j++) { 
            echo '<div class="well col-sm-offset-2 col-sm-2 text-center">Blah</div>';
        }
        echo "</div>", '<div class="row">';
    }

 include "last.php" 
 ?>