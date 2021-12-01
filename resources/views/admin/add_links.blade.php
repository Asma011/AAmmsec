@extends('layouts.siteAdmin')
@section('styles')
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <!-- <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script> -->
    <style>

        form label {
            width: 100%;
        }

    </style>
@endsection
@section('contents')
<div class="main-content-header">
    <h1>Support Links</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/categories">Categories</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/subcategories">Support Links</a>
      </li>
    </ol>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">
              <?php echo (@$value)?'Edit':'Add'; ?> Support Links
            </h5>
          </div>
          <div class="add_service_form">
            <form class="" id="genres" enctype="multipart/form-data">
              
              <div class="form-group">
                <label class="form-label">Category</label>
                <select class="form-control" name="data[category_id]" onchange="choosesubcategories(this.value)">
                    <option value="">Select a category</option>
                    
                      <option value=""></option>
                  
                   </select>
              </div>              
              <div class="form-group" id="subcategories">
                <label class="form-label">Sub-Category</label>
                <select class="form-control" name="data[subcategory_id]" id="getSubCategories">
                  <option value="">Select Sub-Category</option>
      
                    <option value=""></option>
                  
                </select>
              </div>  
              <div class="form-group">
                <label class="form-label">Link Title</label>
                <input type="text" class="form-control" name="data[link_title]" value="<?php echo @$value['link_title'];?>" >
                <input type="hidden" class="form-control" name="id" value="<?php echo @$value['id'];?>">
                <input type="hidden" class="form-control" name="table" value="support_links">
              </div>
  
              <div class="form-group">
                <label class="form-label">Link Description</label>
                <textarea name="data[description]" id="editor1" class="form-control ckeditor" cols="20" rows="8" ><?php echo @$value['description'];?></textarea>
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
<script> 
    CKEDITOR.replace( 'editor1', {
    height: 200,
    filebrowserUploadUrl: "admin/ckeditor_image"
   }); 
  </script>
  
  
  <script type="text/javascript">
  
    function choosesubcategories(category_id){
      $.ajax({
        url: "/admin/getSubCategories",
        type: "POST",
        data: {category_id:category_id},
        error:function(request,response){
          console.log(request);
        },
        success: function(result){
          $('#getSubCategories').html(result);
        }
      });
    }
    
      $("#genres").validate({
        ignore: [],
        rules: {
  
          "data[category_id]" :  "required",
          "data[subcategory_id]" :  "required",
          "data[link_title]"     :  "required",
          "data[description]"    {
                              required: function(textarea) 
                              {
                                 CKEDITOR.instances[textarea.id].updateElement();
                                 var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                 return editorcontent.length === 0;
                              }
                            },
        },
        messages : {
          "data[category_id]"    :  "Please select a category",
          "data[subcategory_id]" :  "Please select a sub-category",
          "data[link_title]"     :  "Please write a link title",
          "data[description]"  : "<span style='color:red;'>Content can not be empty</span>"
        },
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
                  window.location.href="admin/links_management";
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