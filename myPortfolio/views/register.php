<div class="col-sm-6 col-sm-offset-3">
    <div class="well">
        <div class="formHeader text-center">
        <h3>Not Yet Registered?</h3>
        </div>
        <form  class="form-horizontal" method="post" action="index.php?action=signin">
            <div class="form-group">
                <label class="control-label col-sm-5">Your Name: </label>
                <div class="col-sm-4">
                    <input type="text"  id="name" name="name"
                     placeholder="Your Name" >
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Email: </label>
                <div class="col-sm-4">
                    <input type="email" id="email" name="email"
                     placeholder="Email Address" >
                </div>
            </div>      
            <div class="form-group">
                <label class="control-label col-sm-5">User Name *: </label>
                <div class="col-sm-4">
                    <input type="text" id="registerName" name="username"
                     placeholder="User Name" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5">Password *: </label>
                <div class="col-sm-4">
                    <input type="password" id="registerPassword"
                     name="password" placeholder="Password" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-5" >Repeat Password *: </label>
                <div class="col-sm-4">
                    <input type="password" id="repeatPassword"
                      name="repeat" placeholder="Repeat Password" required>
                </div>
            </div>
            <div class="form-group  text-center">
                <input type="submit" name="register" value="Register"/>
            </div>
            <div class="text-center">
                <h5><strong>*Required</strong></h5>
            </div>
        </form>
    </div>
</div>