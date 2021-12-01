@extends('layouts.siteAdmin')
@section('styles')
@endsection
@section('contents')
<div class="main-content-header">
    <h1>IT Services</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="admin/dashboard">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/it_services">IT Services</a>
      </li>
    </ol>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">IT Services</h5>
            <span class="add_new">
            </span>
          </div>
          <div class="table-responsive">
            <table class="table m-0 table-striped light table-hover" id="myTable">
              <thead class="bort-none borpt-0">
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Sub-menu</th>
                  <!-- <th scope="col">Section 1</th>
                  <th scope="col">Section 2</th>
                  <th scope="col">Section 3</th> -->
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(@$it_services){ $i=1; foreach(@$it_services as $key=>$value){ ?>
                  <tr id="user_<?php echo @$value['id'];?>">
                    <td><?php echo @$i;?></td>
                    <td><?php echo $value['name']; ?></td>
                    <!-- <td><?php //echo $value['description1']; ?></td>
                    <td><?php //echo $value['description2']; ?></td>
                    <td><?php //echo $value['description3']; ?></td> -->
                    <td><?php echo substr($value['description1'],0,200).'  ...'; ?></td>
                    <td class="text-center">
                      <button type="button" title="edit" class="btn btn-link edit_btn p-0 mr-1" onclick="window.location.href='admin/edit_it_services/1'">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </button>
                    </td>
                  </tr>
                <?php $i++; } } ?>
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