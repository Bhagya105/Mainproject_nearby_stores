<?php $url = url()->current(); ?>
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li <?php if (preg_match("/dashboard/i", $url)){ ?> class="active" <?php } ?>><a href="/dashboard"><i class="icon icon-home"></i> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Categories</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/categor/i", $url)){ ?> style="display: block;" <?php } ?>>
      
        <li <?php if (preg_match("/add-categories/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/add-categories">Categories</a></li>
        <li <?php if (preg_match("/view-categories/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/view-categories">View Categories</a></li>
       
      </ul>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Brand</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/brand/i", $url)){ ?> style="display: block;" <?php } ?>>
      
        <li <?php if (preg_match("/add-brand/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/add-brand">Add Brand</a></li>
         <li <?php if (preg_match("/view-brand/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/view-brand">View Brand</a></li> 
       
      </ul>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Products</span> <span class="label label-important">2</span></a>
      <ul <?php if (preg_match("/products/i", $url)){ ?> style="display: block;" <?php } ?>>
      
        <li <?php if (preg_match("/add-product/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/add-product">Add Products</a></li>
        <li <?php if (preg_match("/view-product/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/view-product">View Products</a></li>
       
      </ul>
      <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Coupons</span> <span class="label label-important">2</span></a>
    <ul <?php if (preg_match("/coupons/i", $url)){ ?> style="display: block;" <?php } ?>>
      
      <li <?php if (preg_match("/add-coupon/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/add-coupon">Add Coupon</a></li>
      <li <?php if (preg_match("/view-coupons/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/view-coupons">View Coupons</a></li>
     
    </ul>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Orders</span> <span class="label label-important">1</span></a>
    <ul <?php if (preg_match("/Orders/i", $url)){ ?> style="display: block;" <?php } ?>>
      
      
      <li <?php if (preg_match("/view-orders/i", $url)){ ?> class="active" <?php } ?>><a href="/Admin/view-orders">View Orders</a></li>
     
    </ul>
    
</div>
<!--sidebar-menu-->