<?php

function monthOptions($monthAr){
    $options="";
    foreach($monthAr as $month)
            
        $options.= "<option>$month</option>";
    return $options;
}
        
include "head.php";

?>
<div class="row">
            <form class="form-inline" method="post" action="days.php">
                <label>Month Chooser:
            <select name="month">
                <?php 
                 echo monthOptions($months);
                ?>
                
            </select>
                <div class="form-group">
                    <input type="number" class="form-control" name="year" placeholder="enter the year here" value="<?= $year ?>">
                </div>
                <button type="submit" class="btn btn-default">Get Days</button>
            </form>
<?php include "foot.php" ?>
