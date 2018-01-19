<?php 
    if(!empty($_SESSION["logged"])):
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
        <!-- <div id="label" class="col-sm-2 text-center" >
                <div class="panel panel-primary ">
                    <div class="panel-heading">
                        <h4><?= $username ?></h4>
                    </div>
                    <div class="panel-body">
                        <h5><?= $status ?></h5
                    </div>
                    <div class="panel-footer">
                    <a href="index.php?action=logOut">Log Out</a>
                    </div>
                </div>
        </div>-->
<?php endif ?>
    