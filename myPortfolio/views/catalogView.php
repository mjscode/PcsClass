<?php
    

    $styles = "
    img {
        width: 200px;
        height: 110px;
        margin-bottom: 8px;
    }

    #searchName, #maxIn, #minIn{
        width:100%;
    }
    .row,.well{
        margin-top:2%;
        margin-bottom:2%;
    }
    #sortForm{
       
    }
    #catalogHeader{
    
        
    }
    ";
    include 'top.php';

    
?>
    <header class='row text-center'>
        <div id="catalogHeader" class="col-sm-10 col-sm-offset-1">
        <div class="row">
            <h3><strong>Our Catalog</strong></h3>
        </div>
        <div class="row text-jusify">
            Here you can see our list of items. You can use our seach filter to find anything specific you're lookin for. 
            You can search by name, price range, and by category. You can also sort by your specification. Users with administrative
            rights will be able to update or remove an item, as well as add one.
        </div>
        <div class="row">
            <a href="#list"><button class="btn-small btn-success">See our List</button></a>
            <a href="#addPanel"><button class="btn-small btn-success">Add an Item</button></a>
        </div>
        </div>
    </header>
    <div class="row" id="list">
        <div class="col-sm-2">
        <div class="well">
            <form  id="searchForm" method="get" >
                        <div class="form-group">
                            <label>Search by Name: </label>
                                <input
                                type="text" id="searchName" placeholder="Item or Category"
                                name="searchName" value=<?=$search?> >
                        </div>
                        <div class="form-group">
                            <label >Min: </label>    
                                <input id="minIn" type="number" min='0' placeholder="Min" name="minPrice" value=<?=$min?> >
                                </div>
                            <div class="form-group">
                            <label>Max: </label>
                                <input id="maxIn" max='0' type="number" placeholder="Max"
                                name="maxPrice" value=<?=$max?> >
                        </div>
                        <label >By category(ies): </label>                  
                <div class="form-group text-center">
                        <?php  foreach($categories as $category):?>
                            <label class="checkbox" ><input class="checkB" type="checkbox" name="categoryId[]" 
                            value= <?php echo "'".$category['id']."'";
                            if(in_array($category['id'],$ids)){ echo ' checked';}?>
                            ><?= $category['name'] ?></label>
                        <?php endforeach ?>
                </div>
                <div class="form-group text-center">
                    <label class="checkbox"><input id="allBox" type="checkbox" name="categoryId" value="0" 
                    <?php if(empty($ids)){echo 'checked';}?>>All Categories</label> 
                    </div>
                    <div class="row text-center">
                    <input type="hidden" name="action" value="catalog" />
                                <input type="hidden" name="sort" value=<?=  $sort?> />
                                <input type="submit" name='search' value="Search"/> 
                    </div>
                
            </form>
        </div>
        </div>
    
       
        <div class="col-sm-10">
            <form id="sortForm" class="row text-center">
                    <label class="control-label col-sm-2">Sort by: </label>
                    <a href=<?= getLink(['sort'=>'categoryId']) ?>>
                         <div class="radio-inline col-sm-2"><input type="radio" <?php if ($sort==='categoryId'){ echo 'checked';
                         }?>> Category</div> 
                    </a>                    
                    <a href=<?= getLink(['sort'=>'price_asc']) ?>>
                        <div class="radio-inline col-sm-2"><input type="radio"<?php if ($sort==='price_asc') echo 'checked';?>> Cheapest</div>
                    </a>
                    <a href=<?= getLink(['sort'=>'price_desc']) ?>>
                        <div class="radio-inline col-sm-2"><input type="radio"<?php if ($sort==='price_desc') echo 'checked';?>> Most Expensive</div>
                    </a>
                    <a href=<?= getLink(['sort'=>'name']) ?>>
                        <div class="radio-inline col-sm-2"><input type="radio" <?php if ($sort==='name') echo 'checked';?>> Alphabetical</div>
                    </a>        
           </form>
            <table  class="table table-striped">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Unit</th>
                        <th>Amount in Stock</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>For Admins:</th>
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
                        <td><?php if($_SESSION['admin']):?>
                        <a  class='deleteButton' href=<?= getLink(['delete'=>$item->get('id')]) ?> >
                            <button >delete</button></a>
                            <?php endif ?>
                            </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
            </table>

            <?php include "pager.php"; ?>
        </div>
    </div>
    <?php
    if (!empty($error)){
        foreach($errors as $error):
?>  
        <div class="row">
            <div id='alertBox' class="col-sm-6 col-sm-offset-3 text-center">
                <div class="alert alert-warning">
                    <strong>Error!</strong> <?=$error?>
                </div>
            </div>
        </div>
<?php
        endforeach;
    }; 
?>
    <div class="row">
        <div class="col-sm-9 col-sm-offset-2">
    <div id="addPanel" class="panel panel-default" >
        <div class="panel-heading">Add an Item here:</div>
        <div class="panel-body">
            <?php if(!$_SESSION['logged'] || !$_SESSION['admin']){
                echo "<div class='row text-center'>Sorry! In order to add item you must be an Administrator.</div>";
            }else{}
            ?>
        </div>
    </div>
    </div>
    </div>
<script src="jsFiles/catalog.js"></script>
<?php
include 'bottom.php';
?>