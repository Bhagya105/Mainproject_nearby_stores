@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Products</a> <a href="#" class="current">View Products</a> </div>
    <h1>Products</h1>
  </div>
  @foreach (['danger', 'warning', 'success', 'info'] as $msg)
    @if(Session::has('alert-' . $msg))
    <p class="alert alert-{{ $msg }}">{{ Session::get('alert-' . $msg) }}</p>
    @endif
  @endforeach
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Products</h5>
          </div>
          <div class="flash-message">
 
</div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No:</th>
                   <th>Category name</th> 
                  <th>Brand name</th>
                  <th>Product name</th>
                  <!-- <th>Description</th> -->
                  <th>Size</th>
                  <th>Color</th>
                  <th>Price</th>
                  <th>Image</th>
                 
                   <th>Action</th> 
                </tr>
              </thead>
              <tbody>
              @foreach($products as $product)
                <tr class="gradeX">
                  <td>{{ $product->id}}</td>
                   <td>{{ $product->category_name}}</td> 
                  <td>{{ $product->brand_name}}</td>
                  <td>{{ $product->product_name}}</td>
                  <!-- <td>{{ $product->description}}</td> -->
                  <td>{{ $product->size}}</td>
                  <td>{{ $product->color}}</td>
                  
                  <td>{{ $product->price}}</td>
                  <td>
                  @if(!empty($product->image))
                  <img src="/upload/{{$product->image}}" style="width:90px;">   
                  </td>       @endif        </td>
                  <td class="center"><a href="#myModal{{ $product->id}}" data-toggle="modal" class="btn btn-success btn-mini">View</a>
                   <a href="{{ url('/Admin/edit-product/'.$product->id) }}" class="btn btn-primary btn-mini">Edit</a> 
                   <a  href="/Admin/add_attributes/{{$product->id}}"  class="btn btn-success btn-mini">Add Attributes</a>
                   <a  href="/Admin/add_images/{{$product->id}}"  class="btn btn-primary btn-mini">Add alternate images</a>
                  <!-- <a id="delProduct" href="/Admin/delete-product/{{$product->id}}" class="btn btn-danger btn-mini">Delete</a></td>  -->
                  <a rel="{{ $product->id }}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td> 

                </tr>
              
 
            <div id="myModal{{ $product->id}}" class="modal hide">
              <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">X</button>
                <h3>{{ $product->product_name}} Full Details</h3>
              </div>
              <div class="modal-body">
                <p>Category Name:{{ $product->category_name}}</p>
                <p>BrandName:{{ $product->brand_name}}</p>
                <!-- <p>Product Description:{{ $product->description}}</p> -->
                <p>Size:{{ $product->size}}</p>
                <p>Color:{{ $product->color}}</p>
                <p>Price:{{ $product->price}}</p>
                
              </div>
              </div>
                @endforeach
              </tbody>
              
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


            
            
            
        


@endsection