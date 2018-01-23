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
    .row{
        padding-top:2%;
    }
    #sortForm{
        border-top:2px solid black;
        padding-bottom:2%;
    }
    ";
    include 'top.php';
    if(!empty($_SESSION['categories'])){
        $categories=$_SESSION['categories'];
    }else{
        $categories=[];
    }
    
?>
    <header class='row text-center'>
    <div id="catalogHeader" class="col-sm-10">
        <h3>Our Catalog</h3>
    </div>
    </header>
    <!--<div class="row">
            <div class="text-center"><img src="images/<?= lcfirst($items[0]->get('categoryName')) ?>.jpg" alt="picture of the category"/></div>
        </div>-->
        <div class="well">
            <form  id="searchForm" class="form-horizontal" method="get" action="index.php?action=catalog">
                <div class="row">
                    <div class="col-sm-12">
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
                    </div>
                </div> 
                <div class="row">
                    <label class="control-label col-sm-2 col-sm-offset-1">By category(ies): </label>
                    <div class="col-sm-7 text-left">
                        <?php foreach($categories as $category): ?>
                            <label class="checkbox-inline"><input type="checkbox" name="categoryId" value= <?= $category['id'] ?>
                            ><?= $category['name'] ?></label>
                        <?php endforeach ?>
                    </div>
                    <label class="checkbox-inline col-sm-1"><input type="checkbox" name="categoryId" value="" checked>Or All</label> 
                </div>
            </form>
        </div>
    
    <div class="row">
        <div class="col-sm-9 col-sm-offset-1">
            <?php include "pager.php"; ?>
            <div class="row">
                <form  id="sortForm" class="form-horizontal text-center" method="get" action="index.php?action=catalog">
                    <label class="control-label col-sm-2 col-sm">Sort by: </label>
                    <label class="radio-inline col-sm-2" ><input type="radio" name="sort" value="category" checked>Category</label>
                    <label class="radio-inline col-sm-2"><input type="radio" name="sort" value="cheapest">Cheapest</label>
                    <label class="radio-inline col-sm-2"><input type="radio" name="sort" value="expansive">Most Expansive</label>
                    <label class="radio-inline col-sm-2"><input type="radio" name="sort" value="alphabetical">Alphabetical</label>
                    <input  type="submit" name='sort' value="Sort"/>
                </form>
            </div>
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