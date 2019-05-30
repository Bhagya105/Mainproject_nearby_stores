@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">Add products attributes</a> </div>
    <h1>Products</h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
            <h5>Add Products Attributes</h5>
          </div>
          <div class="widget-content nopadding">
            
            <form enctype="multipart/form-data" class="form-horizontal" method="post" action="/Admin/add_attributes/{{$productDetails->id}}" name="add_attribute" id="add_attribute" novalidate="novalidate">
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
                <label class="control-label">Size</label>
                <label class="control-label">{{$productDetails->size}}</label>
              </div>
              <div class="control-group">
                <label class="control-label">Color</label>
                <label class="control-label">{{$productDetails->color}}</label>
              </div>
              <div class="control-group">
                
                <label class="control-label"></label>
                <div class="field_wrapper">
                <div>
                <input type="text" name="code[]" id="code" placeholder="Product code" style="width:120px;"/>
                <input type="text" name="highlights[]" id="highlights" placeholder="Size" style="width:120px;"/>
                <input type="text" name="specifications[]" id="specifications" placeholder="Price" style="width:120px;"/>
                <input type="text" name="stock[]" id="stock" placeholder="Stock" style="width:120px;"/>
                
                <a href="javascript:void(0);" class="add_button" title="Add field">Add</a>
                </div>
                </div>
              </div> 
           
              <div class="control-group">
                <label class="control-label"></label>
                
              </div> 
              
             
              <div class="form-actions">
                <input type="submit" value="Add Attributes" class="btn btn-success">
              </div>

             
              
            </form>
          </div>
        </div> <div class="row-fluid">
      
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
          <h5>View Attributes</h5>
        </div>
        <div class="flash-message">

</div>
        <div class="widget-content nopadding">
        <form action="/Admin/edit_attributes/{{$productDetails->id}}" method="post">
        @csrf
          <table class="table table-bordered data-table">
            <thead>
              <tr>
                <th>No:</th>
                 <th>Product code</th> 
                <th>Highlights</th>
                <th>Specifications</th>
                <th>Stock</th>
                <th>Action</th>
               
              </tr>
            </thead>
            <tbody>
            @foreach($productDetails['attributes'] as $attribute)
              <tr class="gradeX">
                <td><input type="hidden" name="idAttr[]" value="{{ $attribute->id}}">{{ $attribute->id}}</td>
                 <td>{{ $attribute->code}}</td> 
                <td>{{ $attribute->highlights}}</td>
                <td><input type="text" name="specifications[]" value="{{ $attribute->specifications}}"></td>
                <td><input type="text" name="stock[]" value="{{ $attribute->stock}}"></td>
                
                
               <td class="center"> 
               <input type="submit" value="Update" class="btn btn-primary btn-mini">
               <a rel="{{ $attribute->id }}" rel1="delete-attribute" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td> 
              </tr>
            

          
              @endforeach
            </tbody>
          </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
  
    
    
@endsection