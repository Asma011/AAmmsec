@extends('layouts.siteAdmin')
@section('styles')
@endsection
@section('contents')
    <!-- Main Content Header -->
<div class="main-content-header">
    <h1>User Management</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{  }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="admin/get_users">User Management</a>
      </li>
    </ol>
  </div>
  
  <!-- End Main Content Header -->
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
              <!-- <div class="tabs-style-two">
          <ul class="nav nav-tabs">
                              <li class="nav-item">
                                  <a class="nav-link active" href="admin/get_users">Customer Management</a>
                              </li>
              <li class="nav-item">
                                  <a class="nav-link" href="admin/sub_admin">Sub User Management</a>
                              </li>
                              
                              <li class="nav-item">
                                  <a class="nav-link" href="admin/drivers_list ">Driver Management</a>
                              </li>
                              
                          </ul>
              </div> -->
              <div class="card-body">
                  <div class="card-header">
                      <h5 class="card-title">User Management</h5>
                      <form action="admin/get_users" method="post">
                        <label>Start Date:</label> <input type="date" id="start_date" name="start_date">
                        <label>end Date:</label>  <input type="date" id="end_date" name="end_date"> 
                      <input type="submit" class="btn btn-primary" value="Submit">
                    </form>
                     <span class="add_new1 d-none" style="float: right;">
                        <a href="admin/export_CustomerReports" class="btn btn-primary"><span class="add_icon"><i class="fa fa-download" aria-hidden="true"></i></span> Export</a>
                    </span>
                      <span class="add_new d-none">                        
                      <button type="button" class="btn btn-primary add_btn"  onclick="window.location.href='admin/addUser'"><span class="add_icon"><i class="fa fa-plus" aria-hidden="true"></i></span> Add New</button>
                      </span>
                  </div>				
                  <div class="table-responsive">
                      <table class="table m-0 table-striped light table-hover" id="myTable">
                          <thead class="bort-none borpt-0">
                              <tr>
                  <th scope="col">S.No</th>
                                  <th scope="col">User Name</th>								
                                  <th scope="col">Email</th>
                                  <th scope="col">Mobile Number</th>
                                  <th scope="col">Registered Date</th>
                                  <th scope="col">Status</th>
                                  <th scope="col">Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php if(@$users){ $i=1; foreach(@$users as $key=>$value){ ?>
                                  <?php if($value['status']>=1){
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
                              <tr id="user_<?php echo @$value['user_id'];?>">
                                  <td><?php echo @$i;?></td>
                                  <td><?php echo @$value['first_name'].' '.$value['last_name'];?></td>                                
                                  <td><?php echo @$value['email'];?></td>
                                  <td><?php echo @$value['mobile_no'];?></td>
                                  <td><?php echo date('Y-m-d',strtotime(@$value['register_date']));?></td>
                                  <td class="text-center">
                                      <button type="button" title="<?php echo $title; ?>" class="badge badge-<?php echo $badge; ?>" onclick="changeUserStatus('<?php echo @$value['user_id'];?>',<?php echo $cng; ?>)">
                                          <?php echo $status; ?>
                                      </button>
                                  </td>                               
                                  <td class="text-center">    
                                      <button onclick="delete_user('<?php echo @$value['user_id'];?>')" type="button" title="Delete" class="btn del_btn btn-link p-0 mr-1">
                                          <i class="fa fa-trash" aria-hidden="true"></i>
                                      </button>
                                      <button type="button" title="view" class="btn view_btn btn-link p-0" onclick="window.location.href='admin/viewUser/<?php echo base64_encode(@$value['user_id']);?>'">
                                          <i class="fa fa-eye" aria-hidden="true"></i>
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
    function delete_user(userId="")
    {
        $.confirm({
                title: 'Do you want Delete permanently ?',
                content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
                autoClose: 'cancelAction|8000',
                buttons: {
                    deleteUser: {
                        text: 'Delete',
                        action: function () {                            
                            $.ajax({                
                                url: "/admin/delete/users",
                                type: "POST",
                                data: {id:userId,param:'user_id'},           
                                success: function(result)
                                {
                                  $.alert(result);
                                  $("#user_"+userId).remove();
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
    function resetpwd(userId="")
    {
        $.confirm({
                title: 'Do you want to reset password ?',
                content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
                autoClose: 'cancelAction|8000',
                buttons: {
                    deleteUser: {
                        text: 'Yes, Reset!',
                        action: function () {                            
                            $.ajax({                
                                url: "/admin/forgotPassword",
                                type: "POST",
                                data: {user_id:userId},           
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

    function changeUserStatus(id="",value="")
    {
      if(value==1)
      {
        var title_m = "Do you want Activate This User ?";
        var text_m = "Activate";
      }
      else if(value==0)
      {
        var title_m = "Do you want InActivate This User ?";
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
                                url: "/admin/changeUserStatus",
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