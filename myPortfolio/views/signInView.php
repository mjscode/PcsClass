<?php
include 'top.php';
?>
<div class="row">
    <div class="col-sm-8 col-sm-offset-2">
        <div id="signInForm" class="well">
            <form  class="form-horizontal" method="post" action="index.php?action=signin">
                <div class="form-group">
                    <label class="control-label col-sm-2">User Name: </label>
                    <div class="col-sm-3">
                        <input
                        type="text" id="username" name="username" 
                        placeholder="User Name" required>
                    </div>
                    <label class="control-label col-sm-2">Password: </label>
                    <div class="col-sm-3">
                        <input type="password"
                        name="userPassword" placeholder="Password" required>
                    </div>
                    <div class="col-sm-2">
                        <input  type="submit" name='logIn' value="Log In"/>
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
            <div id='alertBox' class="col-sm-6 col-sm-offset-3 text-center">
                <div class="alert alert-warning">
                    <strong>Error!</strong> <?=$error?>
                    <div>
                        <button id='closeAlert'>Close</button>
                    </div>
                </div>
            </div>
        </div>
<?php 
    endif; 
?>
<div id="registerForm" class="row">
    <?php include 'register.php' ?>
    <div class="col-sm-3 col-sm-offset-0 text-center">
        <div class="alert alert-success">
            <div id='infoHeader' >
                <a> <h5>Info</h5></a>
            </div>
            <div id='info'>
                <div class="text-justify">
                    <strong>Welcome!</strong> This is is the sample log in page. You can sign in
                    as a user using name: "joe", password: "crazy".<br>
                     Or as an Administrator using "bob", "meany". <br>You can also register and include whatever information you wish 
                    (remember this is a sample website and any information you enter 
                    will be avaible to the public).
                    <br>
                </div> 
                <button id='infoButton'>Ok</button>
            </div>
        </div>
    </div>
</div>
<?php
    include 'bottom.php';
?>