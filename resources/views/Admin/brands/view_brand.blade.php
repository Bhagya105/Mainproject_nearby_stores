@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Brand</a> <a href="#" class="current">View Brand</a> </div>
    <h1>Brand</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Brand</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>No:</th>
                  <th>Brand name</th>
                  
                  <th></th> 
                </tr>
              </thead>
              <tbody>
              @foreach($brands as $brand)
                <tr class="gradeX">
                  <td>{{ $brand->id}}</td>
                  <td>{{ $brand->name}}</td>
                  
                   <td class="center"></td> 
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