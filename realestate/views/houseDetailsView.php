<?php
    $styles = "
        img {
            width: 400px;
            height: 210px;
            margin-bottom: 8px;
        }

        .well:first-of-type {
            background: none;
            border: none;
            box-shadow: none;
        }
    ";
    include 'top.php';
?>
    <?php if (!empty($house)) : ?>
        <div class="row">
            <div class="text-center"><img src="<?= $house->get('picture') ?>" alt="picture of the house"/></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Address</div><div class="well col-sm-8"><?= $house->get('address') ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">City</div><div class="well col-sm-8"><?= $house->get('city') ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">State</div><div class="well col-sm-8"><?= $house->get('state') ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Zip</div><div class="well col-sm-8"><?= $house->get('zip') ?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Price</div><div class="well col-sm-8"><?= $house->get('price')?></div>
        </div>
        <div class="row">
            <div class="well col-sm-2 text-right">Notes</div><div class="well col-sm-8"><?= $house->get('notes') ?></div>
        </div>
    <?php endif ?>
<?php
include 'bottom.php';
?>