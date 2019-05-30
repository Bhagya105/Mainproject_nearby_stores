@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add product images</a> </div>
    <h1>Product images</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Product images</h5>
          </div>
          <div class="widget-content nopadding">
            
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="/Admin/add_images/{{$productDetails->id}}" name="add_image" id="add_image" novalidate="novalidate">
              @csrf
              <input type="hidden" name="product_id" value="{{$productDetails->id}}">
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
                <label class="control-label">Product Name</label>
                <label class="control-label"><strong>{{$productDetails->product_name }}</strong></label>
              
              </div> 
             
           
              <div class="control-group">
                <label class="control-label">Image</label>
                <div class="controls">
                  <input type="file" name="image[]" id="image" multiple="multiple">
                </div>
              </div> 
              
             
              <div class="form-actions">
                <input type="submit" value="Add Images" class="btn btn-success">
              </div>

             
              
            </form>
          </div>
        </div> <div class="row-fluid">
      
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>View Images</h5>
        </div>
        <div class="flash-message">

</div>
        <div class="widget-content nopadding">
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>Product Name</th> 
                 <th>Image</th> 
                <th>Action</th>
               </tr>
               </thead>
              
                <?php echo $productsImages; ?>
                
                
                <tbody>
              
                

              
              
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
      
        
        
    @endsection