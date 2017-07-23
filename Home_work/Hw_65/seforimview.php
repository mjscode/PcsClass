<?php
//include "seforimModel.php";
include "stop.php"
?>
<form class="form-inline" method="post" action="infoController.php">
        <div class="form-group">
        <?php if (!empty($errors)) : ?>
        <div class="alert alert-danger">
            <ul>
                <?php foreach($errors as $error) echo "<li>$error</li>" ?>
            </ul>
            </div>
             <?php elseif(isset($valid)) : ?>
        <div class="alert alert-success">
            <ul>
                <?php echo "<p>Your sefer, the $sNm for the price of $sPr with the amount of $sQn has been added.</p>" ?>
            </ul>
        </div>
            <?php endif ?>
         <form class="form-inline"  method ="post">
            <div class="form-group">
                <label for="name" class="col-sm-4 control-label">Enter the name of the sefer:</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Name" 
                        value="<?=$sNm?>"
                    >
            </div>
            <div class="form-group">
            <label for="name" class="col-sm-4 control-label">Enter the price of the sefer:</label>
                <div class="col-sm-4">
                    <input type="number" min="1,00" max="1500.00" class="form-control" id="price" name="price" placeholder="Price"
                        value="<?=$sPr?>"
                    >
            </div>
            </div>
            <div class="form-group">
                <label for="Quantity" class="col-sm-4 control-label">Enter how many we have in stock:</label>
                <div class="col-sm-4">
                    <input type="number" min="1" max"10000" class="form-control" id="Quantity" name="Quantity" placeholder="Quantity" 
                        value="<?=$sQn ?>"
                    >
                    </div>
            </div>
            <div class="row">
            <button type="submit" class="btn btn-default">Enter Info</button>
            </div>
            </form>
                <label>Choose a Sefer to see info:</label>
            <select name="info">
                <?php 
                 echo $string;
                ?> 
            </select>
            <button type="submit" class="btn btn-default">Get Info</button>
            </div>
            </form>
            <form class="form-inline"  method ="post">
            <div class="form-group">
                  <label>Choose a Sefer to delete:</label>
            <select name="delete">
                <?php 
                 echo $string;
                ?> 
            </select>
            <button type="submit" class="btn btn-default">Delete</button>
            </div>
            </form>
<?php include "sbot.php" ?>