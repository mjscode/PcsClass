<?php
$monthly=["jan"=>31, "march"=>31, "april"=>30, "may"=>31, "june"=>30, "july"=>31, "aug"=>31, "sept"=>30, "oct"=>31, "nov"=>30, "dec"=>31];
function febDays($year){
    if(($year/4<round($year/4))||(($year/100===round($year/100))&&($year/400<round($year/400))))
        return 28;
    else 
        return 29;
}
    
include "head.php";
?>
<?php
if(!in_array($_POST['month'],$months)){
        echo"not valid month";
    }
    elseif($_POST['month']!=='feb'){
    echo $monthly[$_POST['month']];    
}
    else{
    echo febDays($_POST['year']);
}
include "foot.php";
?>