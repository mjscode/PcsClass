<?php
   if($_SESSION['logged']===false){
    header("Location: index.php?action=signin");
};
?>
