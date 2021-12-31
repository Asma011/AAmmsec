@extends('layouts.siteAdmin')
@section('styles')
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
            <h5 class="card-title">Banners</h5>
            <span class="add_new">
              
            </span>
          </div>
          <div class="table-responsive">
            <table class="table m-0 table-striped light table-hover" id="myTable">
              <thead class="bort-none borpt-0">
                <tr>
                  <th scope="col">S.No</th>
                  <th scope="col">Banner</th>
                  <th scope="col">Page</th>
                  <th scope="col">Title</th>
                  <th scope="col">Description</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php if(@$banners){ $i=1; foreach(@$banners as $key=>$value){ ?>
                  <tr id="user_<?php echo @$value['id'];?>">
                    <td><?php echo @$i;?></td>
                    <td><img src="<?php echo base_url().$value['banner'] ?>" style="width: 150px;height: 100px"></td>
                    <td><?php echo $value['page']; ?></td>
                    <td><?php echo $value['title']; ?></td>
                    <td><?php echo $value['description']; ?></td>
                    <td class="text-center">
                      <button type="button" title="edit" class="btn btn-link edit_btn p-0 mr-1" onclick="window.location.href='admin/add_banner/<?php echo base64_encode(@$value["id"]);?>'">
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
                url: "/admin/delete/categories",
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
  </script>
@endsection
@section('scripts')
    
@endsection