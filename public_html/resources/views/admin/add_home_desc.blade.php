@extends('layouts.siteAdmin')
@section('styles')
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
form label {
    width: 100%;
}
@endsection
@section('contents')
<div class="main-content-header">
    <h1>Home Description</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/home_desc">Homme Description</a>
      </li>
    </ol>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">
              Edit Home Description
            </h5>
          </div>
          <div class="add_service_form">
            <form class="" id="genres" enctype="multipart/form-data">
              <div class="form-group">
                <textarea name="data[description]" id="editor1" class="form-control ckeditor" cols="20" rows="8" ><?php echo @$value['description'];?></textarea>
                <input type="hidden" class="form-control" name="id" value="<?php echo @$value['id'];?>">
                <input type="hidden" class="form-control" name="table" value="home_content">
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
    $("#genres").validate({
        ignore: [],
        rules: {
          "data[description]"             :{
                              required: function(textarea) 
                              {
                                 CKEDITOR.instances[textarea.id].updateElement();
                                 var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
                                 return editorcontent.length === 0;
                              }
                            },
        },
        messages : {
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
                  window.location.href="admin/home_desc";
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