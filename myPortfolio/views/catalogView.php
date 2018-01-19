<?php
    function getTd($value, $itemId) {
        $it = "<td><a href=\"index.php?action=details&houseId=$itemId\">$value</a></td>";
        return $it;
    }

    $styles = "
    img {
        width: 400px;
        height: 210px;
        margin-bottom: 8px;
    }
    #searchName{
        width:100%;
    }
    ";
    include 'top.php';
?>
    <header class='row text-center'>
    <div id="catalogHeader" class="col-sm-10">
        <h3>Our Catalog</h3>
    </div>
    </header>
    <!--<div class="row">
            <div class="text-center"><img src="images/<?= lcfirst($items[0]->get('categoryName')) ?>.jpg" alt="picture of the category"/></div>
        </div>-->
        <div class="row">
        <div class="col-sm-12">
            <div id="searchForm" class="well">
                <form  class="form-horizontal" method="post" action="index.php?action=catalog">
                    <div class="form-group">
                        <label class="control-label col-sm-2">Search by Name: </label>
                        <div class="col-sm-3">
                            <input
                            type="text" id="searchName" name="searchName" 
                            placeholder="Item or Category" >
                        </div>
                        <label class="control-label col-sm-1">Min: </label>
                        <div class="col-sm-2">
                            <input type="number"
                            name="minPrice" placeholder="Min. Price" >
                        </div>
                        <label class="control-label col-sm-1">Max: </label>
                        <div class="col-sm-2">
                            <input type="number"
                            name="maxPrice" placeholder="Max. Price" >
                        </div>
                        <div class="col-sm-1">
                            <input  type="submit" name='search' value="Search"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-sm-9 col-sm-offset-1">
            <?php include "pager.php"; ?>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unit</th>
                        <th>Amount in Stock</th>
                        <th>Price</th>
                        <th>Category</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($items as $item) :?>
                    <tr class="item">
                        <td><?= $item->get('name') ?></td>
                        <td><?= $item->get('unit') ?></td>
                        <td><?= $item->get('amount') ?></td>
                        <td><?= $item->get('price') ?></td>
                        <td><?= $item->get('categoryName') ?></td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <?php include "pager.php"; ?>
        </div>
    </div>
<?php
include 'bottom.php';
?>