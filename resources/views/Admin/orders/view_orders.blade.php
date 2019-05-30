@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Orders</a> <a href="#" class="current">View Orders</a> </div>
    <h1>Orders</h1>
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
            <h5>Orders</h5>
          </div>
          <div class="flash-message">
 
</div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Order ID</th>
                   <th>Order Date</th> 
                  <th>Customer name</th>
                  <th>Customer Email</th>
              
                  <th>Ordered Products</th>
                  <th>Order Amount</th>
                  <td>Order Status</td>
                  <th>Payment Method</th>
                 
             
                   <th>Actions</th> 
                </tr>
              </thead>
              <tbody>
              @foreach($orders as $order)
                <tr class="gradeX">
                  <td>{{ $order->id}}</td>
                   <td>{{ $order->created_at}}</td> 
                  <td>{{ $order->name}}</td>
                  <td>{{ $order->user_email }}</td>
                  <td>
                  @foreach($order->orders as $pro)
                  {{ $pro->product_code }}
                  ({{ $pro->product_qty }})
                  <br>
                  @endforeach
                  </td>
                  <td>{{ $order->grand_total }}</td>
                  <td>{{ $order->order_status }}</td>
                  
                  <td>{{ $order->payment_method }}</td>
                
                 
                  <td class="center">
                  <a target="_blank" href="{{ url('Admin/view-order/'.$order->id)}}"  class="btn btn-success btn-mini">View Order Details</a>
                <br><br>
                 <a target="_blank" href="{{ url('Admin/view-order-invoice/'.$order->id)}}" 
                   class="btn btn-success btn-mini">View Order Invoice</a>
             </td>
             </tr>
             @endforeach
             </tbody>
             </table>
                 
      
  </div>
</div>


            
            
            
        


@endsection