<?php
include "stop.php"
?>
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
            
            <button type="submit" class="btn btn-default">Enter Info</button>
            </form>
            <hr>
                <form class="form-Horizontal" >
            <div class="form-group">
        <label for="select" class="col-sm-2 control-label">Select A catagory</label>
        <div class="col-sm-10">
        <select class="form-control" id="catagory" name="catagory">
                <?php foreach($catagory as $key=>$variaty) :?>
                <option value="<?= $variaty['catrgory']?>"
                ><?= $variaty['catrgory']?></option>
                <?php endforeach ?>
                <option value="<?= '' ?>"
                ><?= '' ?></option>
            </select>
        </div>
    </div>
            <button type="submit" class="btn btn-default">Select</button>
            </div>
            </form>
            <hr>
            <form class="form-Horizontal" >
            <div class="form-group">
        <label for="sefer" class="col-sm-2 control-label">Select A Sefer</label>
        <div class="col-sm-10">
        <select class="form-control" id="sefer" name="sefer">
                <?php foreach($seforim as $sefer) :?>
                <option value="<?= $sefer['id'] ?>"
                ><?= $sefer["name"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
            <input type="hidden" name="action" value="info">
            <button type="submit" class="btn btn-default">Get Info</button>
            </div>
            </form>
            <hr>
            <form class="form-Horizontal"  method ="post">
            <div class="form-group">
        <label for="delete" class="col-sm-2 control-label">Delete A Sefer</label>
        <div class="col-sm-10">
        <select class="form-control" id="delete" name="delete">
                <?php foreach($seforim as $sefer) :?>
                <option value="<?= $sefer['id'] ?>"
                <?php if (!empty($did) && $did == $sefer['id']) echo "selected" ?>
                ><?= $sefer["name"] ?></option>
                <?php endforeach ?>
            </select>
        </div>
    </div>
            <button type="submit" class="btn btn-default">Delete</button>
            </div>
            </form>
           
<?php
 include "sbot.php" ?>