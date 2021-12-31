@extends('layouts.siteAdmin')
@section('styles')
    
@endsection
@section('contents')
<div class="main-content-header">    
<h1>Pages</h1>  
    <ol class="breadcrumb">  
        <li class="breadcrumb-item">  
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>  
        </li>  
        <li class="breadcrumb-item">  
            <a href="#">Pages List</a>  
        </li>  
    </ol>
</div>
<div class="row">  
    <div class="col-lg-12">  
      <div class="card mb-30 appointment_manage">  
          {{-- <div class="tabs-style-two">  
              <ul class="nav nav-tabs">  
                  <li class="nav-item">  
                      <a class="nav-link active" href="/admin-support-categories">Pages</a>  
                  </li>  
                  <li class="nav-item">  
                      <a class="nav-link" href="/admin-support-subcategories">Sub Pages</a>  
                  </li>                
              </ul>  
          </div>   --}}
              <div class="card-body">  
                <div class="card-header">  
                    <h5 class="card-title">Pages List</h5>  
                    <span class="add_new">  
                        <button type="button" class="btn btn-primary add_btn" onclick="window.location.href='{{ route('admin.showaddNewPages') }}'"><span class="add_icon"><i class="fa fa-plus" aria-hidden="true"></i></span> Add New</button>  
                    </span> 
                </div>
  
                  <div class="table-responsive">  
                      <table class="table m-0 table-striped light table-hover" id="myTable">  
                          <thead class="bort-none borpt-0">  
                              <tr>  
                                  <th scope="col">Id</th>                                    
                                  <th scope="col">Menu_Item_Name</th>
                                  <th scope="col">Sub_Item_Name</th>  
                                  <th scope="col">Page_Title</th> 
                                  <th scope="col">Actions</th>  
                              </tr>  
                          </thead>
  
                          <tbody>
                                  @foreach ( $pages as $page )
                                    <tr>                                      
                                        <td>{{ $page->id }}</td>
                                        <td>{{ $page->menu_item_name }}</td>
                                        <td>{{ $page->submenu_item_name }}</td>
                                        <td>{{ $page->page_title }}</td>
                                        <td class="text-center">
                                            <button type="button" title="edit" class="btn btn-link edit_btn p-0 mr-1" 
                                            onclick="window.location.href='{{ route('admin.showeditPagesForm',['pid'=>$page->id]) }}'">    
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>    
                                            </button>    
                                            <button onclick="delete_row('<?php echo @$value['id'];?>')" type="button" title="Delete" 
                                                class="btn del_btn btn-link p-0 mr-1">    
                                                <i class="fa fa-trash" aria-hidden="true"></i>    
                                            </button>
                                        </td>
                                    </tr>
                                 
                                  @endforeach
                            </tbody>
  
                      </table>
  
                  </div>
  
              </div>
  
          </div>
  
      </div>
  
  </div>
@endsection
@section('scripts')
    
@endsection