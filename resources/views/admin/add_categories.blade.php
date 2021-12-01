@extends('layouts.siteAdmin')
@section('styles')
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <style>

        form label {
            width: 100%;
        }

    </style>
@endsection
@section('contents')
<div class="main-content-header">
    <h1>Categories</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/categories">Categories</a>
      </li>
      <!--<li class="breadcrumb-item">-->
      <!--  <a href="admin/subcategories">Sub Categories</a>-->
      <!--</li>-->
    </ol>
  </div>  
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">
              <?php echo (@$value)?'Edit':'Add'; ?> Category
            </h5>
          </div>
          <div class="add_service_form">
            <form class="" id="genres" enctype="multipart/form-data">
              <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="data[category_name]" value="<?php echo @$value['category_name'];?>" >
                <input type="hidden" class="form-control" name="id" value="<?php echo @$value['id'];?>">
                <input type="hidden" class="form-control" name="table" value="categories">
              </div>
              <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-control" name="data[status]" >
                  <option value="1" <?php if(@$value){ if(@$value['status']==1){ echo "selected"; } } ?>>Active</option>
                  <option value="0" <?php if(@$value){ if(@$value['status']==0){ echo "selected"; } } ?>>InActive</option>
                </select>
              </div>
              <div class="text-center">
                <button type="button" class="btn btn-primary genres">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
@endsection
@section('scripts')
<script type="text/javascript">
    $("#genres").validate({
      ignore: [],
      rules: {

        "data[title]" :  "required"
      }
    });
    $('.genres').on("click",function(event){
      event.preventDefault();
      var validator = $("#genres").validate();
      validator.form();
      if(validator.form() == true){
        $('.genres').html("<i class='fa fa-spinner fa-spin'></i>");
        before_ajax("Do not close this page, While Saving your Data...",5000);
        $(this).attr("disabled","disabled");
        var data = new FormData($('#genres')[0]);
        $.ajax({
          url: "/admin/update_data",
          type: "POST",
          data: data,
          mimeType: "multipart/form-data",
          contentType: false,
          cache: false,
          processData:false,
          error:function(request,response){
            console.log(request);
          },
          success: function(result){
            var obj = jQuery.parseJSON(result);
            if(obj.status == 'success'){
              success_ajax("Your Data Successfully saved",3000,true);
              setTimeout(function(){
                window.location.href="admin/support_categories";
              }, 3000);
            }
            else if (obj.status =='error'){
              failure_ajax("Your Data Unable to saved",3000);
            }
          }
        });
      }
    });
  </script>
@endsection