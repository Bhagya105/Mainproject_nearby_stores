
@extends('layouts.adminLayout.admin_design')
@section('content')
<!--main-container-part-->
<div id="content">
<!--breadcrumbs-->
 






<h1>ADD CATEGORY</h1>
<div style="margin-left:200px;margin-top:50px;">
 
<form action="/addca" onsubmit="return" class="oh-autoval-form">
			  @csrf

			   <div class="form-group">
			   
			  
			   </div>
				
			   <div class="form-group">
                  <div class="input-icon"style="margin-left:50px;">
                    <i class="lni-user"></i>
                   <h5 style="color:black;"> Category Name:</h5>&emsp; &emsp;&emsp;
                    <input style="width:250;height:50;"type="text"  autocomplete="off" class="form-control av-name" name="category_name" av-message="Invalid category name" placeholder="Category Name" required="required">	
			    </div>
                </div> 
                <div class="form-group">
                  <div class="input-icon" style="margin-left:50px;">
                    <i class="lni-user"></i>
                    <h5 style="color:black;"> Category Description:</h5>&emsp; &emsp;&emsp;
                     <input style="width:250;height:50;" type="text"  autocomplete="off" class="form-control" name="category_des" placeholder="Category Description" required="required">	
			    </div>
                </div> 
                <br>
               <div style="margin-left:150px;">
                <button style="width:100;height:50;border-radius:50px;background-color:black;color:white"class="btn btn-common log-btn" type="submit">Add</button>
                </div>
                </div>
								

<script>
function myFunction() {
  alert("Category Added Successfully!");
}
</script>


              </form>
<!--End-breadcrumbs-->

<!--Action boxes-->
  

<!--Chart-box-->    
    

<!--end-main-container-part-->

@endsection