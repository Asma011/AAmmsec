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
    <h1>Edit Sub Menu Link</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="#">Edit Sub Menu Link</a>
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
                Edit Sub Menu Link
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
            <form class="" method="post" action="{{ route('admin.storeEditSubMenuForm') }}"  enctype="multipart/form-data">
                @csrf
                <input type="text" value="{{ $link[0]['id'] }}" id="smid" name="smid" hidden>
              <div class="form-group">
                <label class="form-label">Sub Link Name</label>
                <input type="text" class="form-control" 
                    name="submenu_item_name" id="submenu_item_name" 
                    value="{{ $link[0]['submenu_item_name'] }}" required
                /> 
                @error('submenu_item_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="form-group">
                <label class="form-label">Page under Menu Links </label>
                <select class="form-control" name="menu_item_id"  id="menu_item_id">
                    
                   @foreach ($menu as $link1 )
                    <option value="{{ $link1->id }}" {{ ($link[0]['menu_item_id']==$link1->id)?'selected':'' }} >{{ $link1->menu_item_name }}</option>
                   @endforeach 
                 
                  
                </select>
                @error('menu_item_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="form-group">
                <label class="form-label">Slug</label>
                <input type="text" class="form-control" 
                    name="slug" id="slug" 
                    value="{{ $link[0]['slug'] }}" required
                > 
                @error('slug')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              
              <div class="form-group">
                <label class="form-label">Status</label>
                <select class="form-control" name="status"  id="status">
                   
                  <option value="1" {{ ($link[0]['status']==1)?'selected':'' }}>Active</option>
                  <option value="0" {{ ($link[0]['status']==0)?'selected':'' }}>Inactive</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{  $link[0]['status']  }}</strong>
                    </span>
                @enderror 
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
  
  
@endsection
@section('scripts')

   
@endsection