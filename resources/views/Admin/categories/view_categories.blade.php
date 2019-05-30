@extends('layouts.adminLayout.admin_design')
@section('content')
<div id="content">
  <div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> <a href="#">Categories</a> <a href="#" class="current">View Categories</a> </div>
    <h1>Categories</h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>View Categories</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>Category ID</th>
                  <th>Category name</th>
                  <th>Category description</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
              @foreach($categories as $category)
                <tr class="gradeX">
                  <td>{{ $category->id}}</td>
                  <td>{{ $category->name}}</td>
                  <td>{{ $category->description}}</td>
                  <!-- <td class="center"><a href="{{url('/Admin/edit-category/'.$category->id)}}'" class="btn btn-success btn-mini">Edit</a> <a href="#" class="btn btn-danger btn-mini">Delete</a></td> -->
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