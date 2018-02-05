<?php 
    if($_SESSION["logged"]):
        $username=$_SESSION["username"];
        if($_SESSION["admin"]){
            $status="Admin";
        }else{
            $status="User";
        }
    ?>  
     <ul class="nav navbar-nav navbar-right">
      <li id = "userN" class="navbar-text"><span class="glyphicon glyphicon-user"></span> <?=$username?></li>
      <li id="status" class="navbar-text"><span class="glyphicon glyphicon-log-in"></span> <?=$status?></li>
    </ul>
<?php endif ?>
    