
<?php
$last_product_id=0;

 foreach( $products as $val){
    $last_product_id=$val['id'];
?>

<div class="col-xs-12 col-sm-6  col-md-2 col-lg-2">
  <!-- First product box start here-->
  <div class="prod-info-main prod-wrap clearfix">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="product-image">
            <?php if($val['Available_qty'] < 10 ){ ?>
              <label class="prod-left"><?php echo $val['Available_qty']; ?> Left </label>
          <?php  }    ?>

            <img src="<?php echo    base_url('uploads/products/'.$val['productImage']) ;?>" alt="194x228" class="img-responsive">
            <?php if($val['Available_qty'] < 5){ ?>
              <span class="tag2 sale">
              SALE
            </span>
            <?php   } ?>
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="product-deatil">
            <label class="name">
              <a href="<?php echo base_url();?>/view/<?php echo $this->encrypt->encode($val['id']); ?>/<?php echo urlencode($val['ProductName']); ?>">
                 <?php echo $val['ProductName']; ?>
                   </a>
                 </label><span  class="category-label"><?php echo $val['ProductCategory']; ?>  </span>


            <p class="price-container">
              <span class="currency-product"> ₹</span><span class="price"><?php echo $val['SalePrice']; ?></span>
            </p>
            <span class="tag1"></span>
            <!-- <label class="prod-left"> <?php echo $val['Available_qty'] ; ?> Left </label> -->
        </div>

        <!-- <div class="product-info smart-form">
          <div class="row"> -->
            <!-- <div class="col-md-12">  -->
              <!-- <a href="<?php echo base_url();?>buy-now/<?php echo $this->encrypt->encode($val['id']); ?>/1"  class="btn btn-danger">Buy Now</a> -->
              <!-- <a  href="<?php echo base_url();?>/view/<?php echo $this->encrypt->encode($val['id']); ?>/<?php echo urlencode($val['ProductName']); ?>"
                 class="btn btn-info">More info</a> -->
            <!-- </div> -->

          <!-- </div>
        </div> -->
      </div>
    </div>
  </div>

</div>
<?php
}
?>
 <input type="hidden" name="last_product_id" value="<?php echo $last_product_id; ?> ">
<div class="col-xs-12 col-sm-12  col-md-12 col-lg-12" >
  <div  class="col-xs-12 col-sm-12  col-md-6 col-lg-6" > <p class="item-count-label" > <?php echo $products_total; ?> items Found </p> </div>
  <div  class="col-xs-12 col-sm-12  col-md-6 col-lg-6" >
<?php if($products_count  > 1){ ?>
<nav aria-label="Page navigation example">
    <ul class="pagination">
      <li class="page-item first-page"><a class="page-link">First</a></li>
      <?php for($pc=1; $pc<= $products_count; $pc++ ){ ?>
        <li
        class="page-item  <?php if($current_page == $pc){ echo "active" ; } ?>" data-attr="<?php echo $pc  ; ?>"><a class="page-link" ><?php echo $pc  ; ?></a></li>
      <?php } ?>
      <li class="page-item last-page" data-attr="1"><a class="page-link">Last</a></li>
    </ul>
</nav>
</div>

  <?php } ?>

  </div>
