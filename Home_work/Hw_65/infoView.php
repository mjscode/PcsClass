<?php
include "stop.php";
?>
<div class="row">
            <div class="well col-sm-2 text-right">Sefer</div><div class="well col-sm-8"><?= $array['name'] ?></div>
        </div>
<div class="row">
        <div class="well col-sm-2 text-right">Price</div><div class="well col-sm-8"><?= $array['price'] ?></div>
</div>
<div class="row">
    <div class="well col-sm-2 text-right">Quantity</div><div class="well col-sm-8"><?= $array['Quantity'] ?></div>
</div>
<?php
include "sbot.php";
?>