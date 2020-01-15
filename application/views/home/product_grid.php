<?php

$last_product_id=0;
 foreach( $products as $val){
    $last_product_id=$val['id'];
?>
<div class="col-xs-12 col-sm-6  col-md-3 col-lg-3">
  <!-- First product box start here-->
  <div class="prod-info-main prod-wrap clearfix">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="product-image"> 
            <img src="<?php echo    base_url('uploads/products/'.$val['productImage']) ;?>" alt="194x228" class="img-responsive"> 
            <span class="tag2 sale">
              SALE
            </span> 
          </div>
        </div>
        <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="product-deatil">
            <h5 class="name">
              <a href="#">
                 <?php echo $val['ProductName']; ?> <span><?php echo $val['ProductCategory']; ?>  </span>
              </a>
            </h5>
            <p class="price-container">
              <span>$<?php echo $val['ProductName']; ?></span>
            </p>
            <span class="tag1"></span> 
        </div>
        <div class="description">
          <p><?php echo $val['description']; ?> </p>
        </div>
        <div class="product-info smart-form">
          <div class="row">
            <div class="col-md-12"> 
              <a href="javascript:void(0);" class="btn btn-danger">Add to cart</a>
                            <a href="javascript:void(0);" class="btn btn-info">More info</a>
            </div>
            <div class="col-md-12">
              <div class="rating">Rating:
                <label for="stars-rating-5"><i class="fa fa-star text-danger"></i></label>
                <label for="stars-rating-4"><i class="fa fa-star text-danger"></i></label>
                <label for="stars-rating-3"><i class="fa fa-star text-danger"></i></label>
                <label for="stars-rating-2"><i class="fa fa-star text-warning"></i></label>
                <label for="stars-rating-1"><i class="fa fa-star text-warning"></i></label>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<?php   
}
?>
 <input type="hidden" name="last_product_id" value="<?php echo $last_product_id; ?> ">

 
