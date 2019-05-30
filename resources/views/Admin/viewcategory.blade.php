
 @extends('layouts.adminLayout.admin_design')
@section('content')

<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
<h1>View Category</h1>
<table style="margin-left:200px;margin-top:50px;width:500px" id="customers">
 
<tr><th>&emsp;Category Name&emsp;</th><th>&emsp;Category Description&emsp;</th>
@foreach($viewcategory as $row)

<tr>
                    <!-- <td>&emsp;&emsp;{{$row->emp_reg_id}}</td> -->
                    <td>&emsp;{{$row->category_name}}</td>
                    <!--td><img src="storage/upload/{{$row->image}}" height="45px" width="40px"></td-->
                    <td>{{$row->category_des}}</td>
                    
                   
                                                            <!-- @if($row->status == '1')        
                    
                                                             <td>UNBLOCK</td>         
                                                            @else
                                                              <td>BLOCK</td>
                                                            @endif
                                                    
              <td><a href="{{url('Approve/'.$row->category_id)}}">Change Status</a></td> -->

                                                             
                                                                 
                                                                  
              
               
               @endforeach
        
</table></center> 
    <!--End-breadcrumbs-->

<!--Action boxes-->
  

<!--Chart-box-->    
    

<!--end-main-container-part-->

@endsection
