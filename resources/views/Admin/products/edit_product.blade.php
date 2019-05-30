@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Edit products</a> </div>
    <h1>Products</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Edit Products</h5>
          </div>
          <div class="widget-content nopadding">
            
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="/Admin/edit-product/{{$productDetails->id}}" name="edit_product" id="edit_product" novalidate="novalidate">
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
                  <input type="text" name="product_name" id="product_name" value="{{$productDetails->product_name}}">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Description</label>
                <div class="controls">
                  <textarea name="description" id="description"> {{$productDetails->description}}</textarea>
                </div>
              </div>
              
              <div class="control-group">
                <label class="control-label">Size</label>
                <div class="controls">
                  <input type="text" name="size" id="size" value="{{$productDetails->size}}">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Color</label>
                <div class="controls">
                  <input type="text" name="color" id="color" value="{{$productDetails->color}}">
                </div>
              </div> 
              <div class="control-group">
                <label class="control-label">Feature</label>
                <div class="controls">
                  <textarea name="feature" id="feature"> {{$productDetails->feature}}</textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image" id="image" value="{{$productDetails->image}}">
                  <input type="hidden" name="current_image" value="{{$productDetails->image}}">
                  @if(!empty($productDetails->image))
                  <img src="/upload/{{$productDetails->image}}" style="width:90px;"> | <a href="/Admin/delete-product-image/{{$productDetails->id}}">Delete</a>
              </div> 
              @endif
              <div class="control-group" style="margin-left:10px;">
                <label class="control-label">Price</label>
                <div style="margin-left:200px;margin-top:10px;">
                  <input type="text" name="price" id="price" value="{{$productDetails->price}}">
                  </div>
                </div>
              </div> 
              <div class="control-group" style="margin-left:10px;">
                <label class="control-label">Enable</label>
                <div class="controls">
                  <input type="checkbox" name="status" id="status" @if($productDetails->status=="1") checked @endif value="1">
                  </div>
                </div>
               
              
             
              <div class="form-actions">
                <input type="submit" value="Edit Product" class="btn btn-success">
              </div>

             
              
            </form>
          </div>
        </div>
      </div>
    </div>
    
    
@endsection
