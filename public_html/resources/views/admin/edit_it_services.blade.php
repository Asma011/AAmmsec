@extends('layouts.siteAdmin')
@section('styles')
  <style>
    form label {
        width: 100%;
      } 
  </style>   
@endsection
@section('contents')
<div class="main-content-header">
    <h1>IT Services</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/IT_services">IT Services</a>
      </li>
    </ol>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">
              Edit IT Services
            </h5>
          </div>
          <div class="add_service_form">
            <form class="" id="genres" enctype="multipart/form-data">
              <div class="form-group">
                <label class="form-label">Sub-menu</label>
                <input type="text" name="data[name]" class="form-control" value="<?php echo @$value['name'];?>" disabled>
                <input type="hidden" class="form-control" name="id" value="<?php echo @$value['id'];?>">
                <input type="hidden" class="form-control" name="table" value="it_services">
              </div>
              <div class="form-group">
                <label class="form-label">Section 1</label>
                <textarea name="data[description1]" id="editor1" class="form-control ckeditor" cols="20" rows="8" ><?php echo @$value['description1'];?></textarea>
              </div>
              <div class="form-group">
                <label class="form-label">Section 2</label>
                <textarea name="data[description2]" id="editor2" class="form-control ckeditor" cols="20" rows="8" ><?php echo @$value['description2'];?></textarea>
              </div>
              <div class="form-group">
                <label class="form-label">Section 3</label>
                <textarea name="data[description3]" id="editor3" class="form-control ckeditor" cols="20" rows="8" ><?php echo @$value['description3'];?></textarea>
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
    CKEDITOR.replace( 'editor2', {
    height: 200,
    filebrowserUploadUrl: "admin/ckeditor_image"
   }); 
    CKEDITOR.replace( 'editor3', {
    height: 200,
    filebrowserUploadUrl: "admin/ckeditor_image"
   }); 
  </script> 
  
  <script type="text/javascript">
    $("#genres").validate({
        ignore: [],
        rules: {
          "data[description1]"             :{
                              required: function(textarea) 
                              {
                                 CKEDITOR.instances[textarea.id].updateElement();
                                 var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                 return editorcontent.length === 0;
                              }
                            },
          "data[description2]"             :{
                              required: function(textarea) 
                              {
                                 CKEDITOR.instances[textarea.id].updateElement();
                                 var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                 return editorcontent.length === 0;
                              }
                            },
          "data[description3]"             :{
                              required: function(textarea) 
                              {
                                 CKEDITOR.instances[textarea.id].updateElement();
                                 var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                 return editorcontent.length === 0;
                              }
                            },
        },
        messages : {
          "data[description1]"  : "<span style='color:red;'>Content can not be empty</span>",
          "data[description2]"  : "<span style='color:red;'>Content can not be empty</span>",
          "data[description3]"  : "<span style='color:red;'>Content can not be empty</span>"
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
                  window.location.href="admin/IT_services";
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