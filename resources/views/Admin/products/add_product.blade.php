@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add products</a> </div>
    <h1>Products</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Products</h5>
          </div>
          <div class="widget-content nopadding">
            
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="/Admin/add-product" name="add_product" id="add_product" novalidate="novalidate">
              @csrf
              <!-- @if( Session::has( 'success' ))
     {{ Session::get( 'success' ) }}
@elseif( Session::has( 'warning' ))
     {{ Session::get( 'warning' ) }} <here to 'withWarning()' >
@endif -->
<div class="flash-message">
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
</div>
              <div class="control-group">
                <label class="control-label">Under Category</label>
                <div class="controls">
                  <select  name="category_id"  style="width:220px;">
                  <?php echo $categories_dropdown;?>
                 
                  </select>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Brand</label>
                <div class="controls">
                  <select  name="brand_id"  style="width:220px;">
                  <?php echo $brand_dropdown;?>
                 
                  </select>
                </div>
              </div>
             
           <div class="control-group">
                <label class="control-label">Product Name</label>
                <div class="controls">
                  <input type="text" name="product_name" id="product_name">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description"></textarea>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Size</label>
                <div class="controls">
                  <input type="text" name="size" id="size">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Color</label>
                <div class="controls">
                  <input type="text" name="color" id="color">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Features</label>
                <div class="controls">
                  <textarea name="feature" id="feature"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Price</label>
                <div class="controls">
                  <input type="text" name="price" id="price">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Enable</label>
                <div class="controls">
                <input type="checkbox" name="status" id="status" value="1">
                </div>
              </div>
              
             
              <div class="form-actions">
                <input type="submit" value="Add Product" class="btn btn-success">
              </div>

             
              
            </form>
          </div>
        </div>
      </div>
    </div>
    
    
@endsection