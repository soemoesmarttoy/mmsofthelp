<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<div class="row">
        <div class="col-lg-12 text-center">
            <h3 class="mt-5"><?php echo buy;?></h3>
        </div>
    </div>
    <div class="row">
        <a href="../user/formindex.php"><?php echo back;?></a>
    </div>
    
   <div>
       <form action="" method="POST">       
        <input type="hidden" name="com_id" value="<?= $view_bag['com_id'] ?>">
        
        <div class="form-group">
        <label for="cat_id"><?php echo item_cat; ?></label>
        <select class="form-select" name='cat_id' id='cat_id' onchange='load_new_content()'>
        <option value=""><?php echo choose; ?></option>
            <?php 
            foreach($model as $item) :
            ?>
            <option value="<?= $item->id ?>"><?= $item->name ?></option>
            <?php endforeach; ?>
        </select>
        </div>

        <div class="form-group">
        <label for="cat_id"><?php echo item_name; ?></label>
        <!-- State dropdown -->
        <select class="form-select" name="item_id" id="state">
        <option value=""><?php echo choose; ?></option>
        </select>
        </div>

        <div class="form-group">
        <label for="cus_id"><?php echo cus_name; ?></label>
        <select class="form-select" name="cus_id" id="cus_id">
        <option value=""><?php echo choose; ?></option>

        <?php 
        $customers = CustomerData::get_customers($view_bag['com_id']);
        foreach($customers as $cus) :
        ?>

        <option value="<?= $cus->id ?>"><?= $cus->name ?></option>

        <?php
        endforeach;
        ?>

        </select>
        </div>

        <?php
        $categories = CategoryData::get_categories_default();
        foreach($categories as $cat) : 
            if($cat->name == pay_type){
        ?>   

            <div class='form-group'>
            <label for='pay_type'><?php echo pay_type; ?></label>
            <!-- State dropdown -->
            <select class='form-select' name='pay_type' id='pay_type'>
            <option value=''><?php echo choose; ?></option>
            <?php
            $items = ItemData::get_items_by_cat_id($cat->id);
            foreach($items as $item) :
            ?>
            <option value='<?= $item->id ?>'><?= $item->name ?></option>

            <?php
            endforeach;
            ?>

            </select>
            </div>  
            
            <?php
            }elseif($cat-> name == location){
            ?>

            <div class='form-group'>
            <label for='item_id'><?php echo location; ?></label>
            <!-- State dropdown -->
            <select class='form-select' name='item_id' id='item_id'>
            <option value=''><?php echo choose; ?></option>
            <?php
            $items = ItemData::get_items_by_cat_id($cat->id);
            foreach($items as $item) :
            ?>
            <option value='<?= $item->id ?>'><?= $item->name ?></option>

            <?php
            endforeach;
            ?>

            </select>
            </div> 



            <?php
            }elseif($cat-> name == work_type){
                ?>
    
                <div class='form-group'>
                <label for='item_id'><?php echo work_type; ?></label>
                <!-- State dropdown -->
                <select class='form-select' name='work_id' id='work_id'>
                <option value=''><?php echo choose; ?></option>
                <?php
                $items = ItemData::get_items_by_cat_id_with_com($cat->id, $view_bag['com_id']);
                foreach($items as $item) :
                ?>
                <option value='<?= $item->id ?>'><?= $item->name ?></option>
    
                <?php
                endforeach;
                ?>
    
                </select>
                </div> 
    
    
    
                <?php
                }
            
            
            else{
            ?>

            <div class='form-group'>
            <label for='<?= $cat->id ?>'><?= $cat->name ?></label>
            <!-- State dropdown -->
            <input type="text" class='form-control' name='<?= $cat->id ?>' id='<?= $cat->id ?>'>
            </div>
        <?php
            } endforeach;
        ?>
        
        <div class="form-group">
              <input class="btn btn-outline-primary" type="submit" value="<?php echo submit;?>">
        </div>  
       </form>
       <div class="text-danger">
            <?php
            if (isset($view_bag['status'])){
            echo $view_bag['status'];
            }
            ?>
        </div>
   </div>

   <script>
$(document).ready(function(){
    $('#cat_id').on('change', function(){
        var countryID = $(this).val();
        if(countryID){
            $.ajax({
                type:'POST',
                url:'response.php',
                data:'country_id='+countryID,
                success:function(html){
                    $('#state').html(html);                    
                }
            }); 
        }else{
            $('#state').html('<option value=""><?php echo choose; ?></option>');            
        }
    });
   
});
</script>





