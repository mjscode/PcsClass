<?php
     
    $styles = "
        .category img {
            width: 206px;
            height: 150px;
        }
        header{
            border-bottom:black solid 2px;
            margin-bottom:2%;
        }
        .row{
            padding-bottom:2%
        }
        #creditsBody{
            display:none;
        }
    ";
    include 'top.php';
    if(!empty($_SESSION["logged"])){
        $name=" ".$_SESSION['name'];
    }else{
        $name='';
    }
    include 'modals/homeModal.php';
?>
<header class='row text-center'>
    <div id="mainHeader" class="col-sm-10">
        <h3 ><strong>Welcome<?= $name?>!</strong></h3>
        <h4>Check out our Inventory! Click a category below to view a selection,
        or to view all.</h4>
    </div>
            <div class="col-sm-2">
                <button class="btn btn-primary btn-lg" id="infoB">Info</button>
            </div>
</header>
<div class="row text-center">

            <div class="col-sm-10">
                <div class="row">
                <?php 
                $i = 0;
                foreach($categories as $category) :
                ?>
                    <a href="index.php?action=catalog&categoryId=<?= $category->get('id') ?>">
                        <div class="col-md-3 col-sm-4 category">
                            <figure>
                                <img src="images/<?= $category->get('picture') ?>" alt="picture of the category"/>
                            </figure>
                            <figcaption class="text-center">
                                <h4><?=$category->get('name')?></h4>
                                <h4>Number of Items: <?= $category->get('selection') ?></h4>
                                <p>Example:<?=$category->get('example') ?></p>
                                <h5>Most Expansive Item: $<?= $category->get('expansive') ?> Cheapest Item: $<?=$category->get('cheapest') ?></h5>
                            </figcaption>
                        </div>
                    </a>
                    <?php
                    if (++$i % 3 === 0) {
                        echo '<div class="clearfix visible-sm-block"></div>';
                    }
                    if ($i % 4 === 0) {
                            echo '<div class="clearfix visible-md-block visible-lg-block"></div>';
                    }
                    ?>
                <?php endforeach ?>
            </div>
            </div>
                    
            </div>
            <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
            <div class="panel panel-default ">
            <div id="creditsHeading" class="panel-heading">
                <h4> Like these Photos?</h4>
            </div>
                <div id="creditsBody" class="panel-body text-center">The photos were downloaded from the website 
                <a href="https://unsplash.com">unsplash.com</a> they were taken by the following Photographers
                 (click on one to view their website):
                 <hr>
                  <?php include 'credits.php' ?>
                  <button id="creditsClose">Close</button>
                  </div>
             </div>
            </div> 
            </div>
<?php
include 'bottom.php';
?>