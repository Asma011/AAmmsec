@extends('layouts.siteAdmin')
@section('styles')
<script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
form label {
    width: 100%;
}

</style>
@endsection
@section('contents')
<div class="main-content-header">
    <h1>Home Description</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/home_desc">Home Description</a>
      </li>
    </ol>
  </div>
  
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">
              Home Description
            </h5>
            <span class="add_new">
              <button type="button" class="btn btn-primary add_btn" onclick="window.location.href='/admin-add_home_desc'"><span class="add_icon"><i class="fa fa-plus" aria-hidden="true"></i></span> Edit</button>
            </span>
          </div>
          <div class="add_service_form">
            <form>
              <div class="form-group">
                
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('styles')
    
@endsection