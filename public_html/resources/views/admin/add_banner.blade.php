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
    <h1>Banners</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/banners">Banners</a>
      </li>
    </ol>
  </div>
  
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">
              <?php echo (@$value)?'Edit':'Add'; ?> Banner
            </h5>
          </div>
          <div class="add_service_form">
            <form class="" id="genres" enctype="multipart/form-data">
              <div class="form-group">
                <label class="form-label">Banner</label>
                <input type="file" class="form-control" name="banner">
                <?php if(@$banner_id){ ?>
                  <img src="<?php echo base_url().@$value['banner'];?>" style="margin-top: 10px" height="200px" width="500px">
                <?php } ?>
                <br> Note: Banner diemention (1900 X 800 pixels)             
              </div>
              <div class="form-group">
                <label class="form-label">Page</label>
                <input type="text" class="form-control" name="data[page]" value="<?php echo @$value['page'];?>" disabled>
                <input type="hidden" class="form-control" name="id" value="<?php echo @$value['id'];?>">
                <input type="hidden" class="form-control" name="table" value="banners">
                <input type="hidden" class="form-control" name="image_name" value="banner">
              </div>
              <div class="form-group">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" name="data[title]" value="<?php echo @$value['title'];?>" >
              </div>
              <div class="form-group">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="data[description]" cols="8" rows="5"><?php echo @$value['description'];?></textarea>
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
@section('afooter')
    
@endsection
@section('scripts')
<script type="text/javascript"> 
    
    $("#genres").validate({
      ignore: [],
      rules: {

        "data[title]"             :  "required"
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
                window.location.href="admin/banners";
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