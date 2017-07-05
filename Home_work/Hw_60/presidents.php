<?php

    
    $pres_array_assoc=[
        "Trump"=>["name"=>"Trump","year"=>2017],
        "Obama"=>["name"=>"Obama","year"=>2009],
        "Bush"=>["name"=>"Bush","year"=>2001]
        ];
    
    include "first.php"

?>
    <table class ="table">
    
    <thead>
        <tr>
        <th>President</th>
        <th>Year</th>     
        </tr>
    </thead>
        <tbody>
            <?php
            foreach($pres_array_assoc as $president) {
               echo "<tr>";
            foreach($president as $data){
                echo "<td>",$data, "</td>";
            }
            echo "</tr>";
    }
    
        ?>

    </tbody>
    </table>
<?= include "last.php" ?>