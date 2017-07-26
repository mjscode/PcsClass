<?php
  if (!empty($_GET['sefer'])) 
        $seferId = $_GET['sefer'];
    include "models/infoModel.php";
    include "views/infoView.php";
?>