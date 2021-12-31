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
    <h1>Edit Page</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="#">Edit Page</a>
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
              Edit Page
            </h5>
          </div>
          <div class="add_service_form">
            @if (count($errors) > 0)
                <div class="alert alert-danger fade show m-t-5">
                    <span class="close" data-dismiss="alert">×</span>
                    <div><b>Error!</b>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if (session('success'))  
            <div class="alert alert-success fade show m-t-5">
                <span class="close" data-dismiss="alert">×</span>
                <div><b>Success!</b> {{ session('success') }}.</div>
            </div>
            @endif
            @if (session('danger'))  
            <div class="alert alert-danger fade show m-t-5">
                <span class="close" data-dismiss="alert">×</span>
                <div><b>Error!</b> {{ session('danger') }}.</div>
            </div>
            @endif
            <form class=""  method="post" action="{{ route('admin.updatePagesContent') }}" enctype="multipart/form-data">
            @csrf
            <input type="text" hidden value="{{ $page[0]['id']  }}" name="pid" id="pid"/>
            <div class="form-group">
                <label class="form-label">Menu Id</label>
                <select class="form-control" name="menu_id"  id="menu_id">                    
                    @foreach ($menu as $links )
                      <option value="{{ $links->id }}" {{ ($page[0]['menu_item_id']== $links->id ) ? 'selected' : '' }}>{{ $links->menu_item_name }}</option>                    
                    @endforeach                   
                </select>
            </div>
            <div class="form-group">
                <label class="form-label">Sub Menu Id</label>
                <select class="form-control" name="sub_menu_id"  id="sub_menu_id">                  
                    @if($page[0]['submenu_item_id'])
                        @foreach ($sub_menu as $sub_links )
                        <option value="{{ $sub_links->id }}" {{ ($page[0]['submenu_item_id']== $sub_links->id ) ? 'selected' : '' }}>{{ $sub_links->submenu_item_name }}</option>
                        @endforeach  
                    @else
                        <option value="">It is not Subpage Leave This Field Blank</option>
                    @endif 
                </select>
            </div>
              <div class="form-group">
                <label class="form-label">Page Title</label>
                <input type="text" class="form-control" name="page_title" id="page_title"
                 value="{{ $page[0]['page_title'] }}" required >
                 @error('page_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
              </div>
              <div class="form-group">
                <label class="form-label">Banner Title</label>
                <input type="text" class="form-control" name="banner_title" id="banner_title"
                 value="{{ $page[0]['banner_title'] }}" required >
                 @error('banner_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
              </div>
              <div class="form-group">
                <label class="form-label">Banner Sub Title</label>
                <input type="text" class="form-control" name="banner_sub_title" id="banner_sub_title"
                 value="{{ $page[0]['banner_sub_title'] }}" required >
                 @error('banner_sub_title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
              </div>
              <div class="form-group">
                <label class="form-label">Banner Image</label>
                <input type="file" class="form-control" name="banner_img_location" id="banner_img_location"/>
                <img src="{{ asset('/assets/uploads/banners/'.$page[0]['banner_img_location']) }}" height="100px" width="100px" alt="banner image"/>
                 @error('banner_img_location')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
              </div>
              <div class="form-group">
                <label class="form-label">Section Content 1</label>
                <textarea name="editor1" id="editor1" class="form-control ckeditor" 
                cols="20" rows="8" >{{ $page[0]['Section_Content1'] }}</textarea>               
                 @error('editor1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
              </div>
              <div class="form-group">
                <label class="form-label">Section Content 2</label>
                <textarea name="editor2" id="editor2" class="form-control ckeditor" 
                cols="20" rows="8" >{{ $page[0]['Section_Content2'] }}</textarea>               
                 @error('editor2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
              </div>
              <div class="form-group">
                <label class="form-label">Section Content 3</label>
                <textarea name="editor3" id="editor3" class="form-control ckeditor" 
                cols="20" rows="8" >{{ $page[0]['Section_Content3'] }}</textarea>               
                 @error('editor3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
              </div>
              <div class="form-group">
                <label class="form-label">Slug ( Unique Page Name )</label>
                <input type="text" class="form-control" name="slug" id="slug"
                  required value="{{ $page[0]['slug'] }}" />
                 @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror   
              </div>
              <div class="form-group">
                <label class="form-label">Is Helper Page</label>
                <select class="form-control" name="is_helper_page"  id="is_helper_page">
                  <option value="1" {{ ($page[0]['is_helper_page']==1)?'selected':'' }}>Yes</option>
                  <option value="0" {{ ($page[0]['is_helper_page']==0)?'selected':'' }} >No</option>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
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
                  window.location.href="admin/cloud_services";
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