@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Coupons</a> <a href="#" class="current">View Coupons</a> </div>
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
            <h5>View Coupons</h5>
          </div>
          <div class="flash-message">
 
</div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Coupon Code</th>
                   <th>Amount</th> 
                  <th>Amount Type</th>
                  <th>Expiry Date</th>
                  
                  <th>Created Date</th>
                  <th>Status</th>
                  <th>Actions</th>
                  
                </tr>
              </thead>
              <tbody>
              @foreach($coupons as $coupon)
                <tr class="gradeX">
                  <td>{{ $coupon->coupon_code }}</td>
                   <td>
                   {{ $coupon->amount }}
                   @if($coupon->amount_type=="Percentage") % @else ₹ @endif 
                   </td> 
                  <td>{{ $coupon->amount_type }}</td>
                  <td>{{ $coupon->expiry_date }}</td>
                  <td>{{ $coupon->created_at }}</td>
                  <td>
                 
                  @if($coupon->status==1) Active @else Inactive @endif
                  </td>
                <td>
                   <!-- <a href="{{ url('/Admin/edit-coupon/'.$coupon->id) }}" class="btn btn-primary btn-mini">Edit</a>  -->
                  
                  <a rel="{{ $coupon->id }}" rel1="delete-product" href="javascript:" class="btn btn-danger btn-mini deleteRecord">Delete</a></td> 

                </tr>
              
 
           
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