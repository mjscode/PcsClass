<?php
include 'top.php';
?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div id="signInForm" class="well text-center">
            <form  class="form-horizontal" action="index.php">
                <div class="form-group">
                    <label class="control-label col-sm-2">UserName: </label>
                    <div class="col-sm-3">
                        <input type="text" id="userName" name="userName" placeholder="User Name" required>
                    </div>
                    <label class="control-label col-sm-2">Password: </label>
                    <div class="col-sm-3">
                        <input type="password" id="userPassword" name="userPassword" placeholder="Password" required>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" value="Log In"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
    if (!empty($error)):
?>  
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 text-center">
                <div class="alert alert-warning">
                    <strong>Error!</strong> <?=$error?>
                </div>
            </div>
        </div>
<?php 
    endif; 
?>
<div id="registerForm" class="row">
<?php include 'register.php' ?>
</div>
<?php
    include 'bottom.php';
?>