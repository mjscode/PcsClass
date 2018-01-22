<?php
   if(empty($_SESSION['logged'])){
    header("Location: index.php?action=signin");
};
?>
