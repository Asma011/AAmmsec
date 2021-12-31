@extends('layouts.siteAdmin')
@section('styles')
    
@endsection
@section('contents')
    <!-- Main Content Header -->

<div class="main-content-header">

    <h1>Support Links</h1>
  
    <ol class="breadcrumb">
  
      <li class="breadcrumb-item">
  
        <a href="admin/dashboard">Dashboard</a>
  
      </li>
  
      <li class="breadcrumb-item">
  
        <a href="/admin-links-management">Support Links</a>
  
      </li>
  
    </ol>
  
  </div>
  
  
  
  <!-- End Main Content Header -->
  
  <div class="row">
  
    <div class="col-lg-12">
  
      <div class="card mb-30 appointment_manage">
  
          <div class="tabs-style-two">
  
            <ul class="nav nav-tabs">
  
                <li class="nav-item">

                    <a class="nav-link " href="/admin-support-categories">Categories</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link" href="/admin-support-subcategories">Sub Categories</a>

                </li>

                <li class="nav-item">

                    <a class="nav-link active" href="/admin-links-management">Support Links</a>

                </li>

            </ul>
  
          </div>
  
              <div class="card-body">
  
                  <div class="card-header">
  
                      <h5 class="card-title">Support Links</h5>
  
                      <span class="add_new">
  
                          <button type="button" class="btn btn-primary add_btn" onclick="window.location.href='/admin-add-links'"><span class="add_icon"><i class="fa fa-plus" aria-hidden="true"></i></span> Add New</button>
  
                      </span>
  
                    
  
                    </div>
  
                  <div class="table-responsive">
  
                      <table class="table m-0 table-striped light table-hover" id="myTable">
  
                          <thead class="bort-none borpt-0">
  
                              <tr>
  
                                  <th scope="col">S.No</th>
  
                                  <th scope="col">Category Name</th>
  
                  <th scope="col">Sub-Category Name</th>
  
                  <th scope="col">Link Title</th>								
  
                                  <th scope="col">Status</th>
  
                                  <th scope="col">Actions</th>
  
                              </tr>
  
                          </thead>
  
                          <tbody>
  
                              <?php if(@$links){ $i=1; foreach(@$links as $key=>$value){ ?>
  
                                  <?php if($value['status']==1){
  
                                      $status = 'Active';
  
                                      $badge = 'success';
  
                                      $title = 'InActivate';
  
                                      $cng = 0;
  
                                  }elseif($value['status']==0){
  
                                      $status = 'Inactive';
  
                                      $badge = 'danger';
  
                                      $title = 'Activate';
  
                                      $cng = 1;
  
                                  } ?>
  
                              <tr id="user_<?php echo @$value['id'];?>">
  
                                  <td><?php echo @$i;?></td>
  
                                  <td><?php echo @$value['category_name'];?></td>
  
                                  <td><?php echo @$value['subcategory_name'];?></td>
  
                                  <td><?php echo @$value['link_title'];?></td>                                
  
                                  <td class="text-center">
  
                                      <button type="button" title="<?php echo $title; ?>" class="badge badge-<?php echo $badge; ?>" onclick="changeStatus('<?php echo @$value['id'];?>',<?php echo $cng; ?>)">
  
                                          <?php echo $status; ?>
  
                                      </button>
  
                                  </td>                               
  
                                  <td class="text-center">                                    
  
                                      <button type="button" title="edit" class="btn btn-link edit_btn p-0 mr-1" onclick="window.location.href='admin/add_links/<?php echo base64_encode(@$value["id"]);?>'">
  
                                          <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
  
                                      </button>
  
                                      <button onclick="delete_row('<?php echo @$value['id'];?>')" type="button" title="Delete" class="btn del_btn btn-link p-0 mr-1">
  
                                          <i class="fa fa-trash" aria-hidden="true"></i>
  
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
<script type="text/javascript">

    function delete_row(id="")

    {

        $.confirm({

                title: 'Do you want to Delete permanently ?',

                content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',

                autoClose: 'cancelAction|8000',

                buttons: {

                    deleteUser: {

                        text: 'Delete',

                        action: function () {                            

                            $.ajax({                

                                url: "/admin/delete/support_links",

                                type: "POST",

                                data: {id:id,param:'id'},

                                success: function(result)

                                {

                                  $.alert(result);

                                  $("#user_"+id).remove();

                                  setTimeout(function(){ 

                                    location.reload();  

                                   }, 2000);                                                                 

                                }

                              });                           

                        }

                    },

                    cancelAction: function(){

                        $.alert('Action is canceled');

                    }

                }

            });

    }



    function changeStatus(id,value)

    {

      if(value==1)

      {

        var title_m = "Do you want to activate this link ?";

        var text_m = "Activate";

      }

      else if(value==0)

      {

        var title_m = "Do you want to inactivate this link ?";

        var text_m = "InActivate";

      }      

       $.confirm({

                title: title_m,

                content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',

                autoClose: 'cancelAction|8000',

                buttons: {

                    deleteUser: {

                        text: text_m,

                        action: function () {                            

                            $.ajax({                

                                url: "/admin/changeStatus/support_links",

                                type: "POST",

                                data: {id:id,value:value},           

                                success: function(result)

                                {

                                  $.alert(result);                                  

                                  setTimeout(function(){ 

                                    location.reload();  

                                   }, 2000);

                                                                 

                                }

                              });

                           

                        }

                    },

                    cancelAction: function(){

                        $.alert('Action is canceled');

                    }

                }

            });

      }   

</script>
@endsection