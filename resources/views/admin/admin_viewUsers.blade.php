@extends('layouts.siteAdmin')
@section('styles')
@endsection
@section('contents')
<div class="main-content-header">
    <h1>User Management</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="admin/dashboard">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
            <a href="admin/get_users">Users Management</a>
            <span class="active"></span>
        </li>
        <li class="breadcrumb-item active">
            <span class="active">View User Details</span>
        </li>
    </ol>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card mb-30 appointment_manage">
            <div class="card-body">
                <div class="card-header">
                    <h5 class="card-title">User Details</h5>
                </div>

                <div class="user_details">
                    <div class="tabs-style-two">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#profile">Profile</a>
                            </li>
                            <li class="nav-item d-none">
                                <a class="nav-link" data-toggle="tab" href="#about">About</a>
                            </li>
                            <li class="nav-item d-none">
                                <a class="nav-link" data-toggle="tab" href="#business">Business</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active show" id="profile" role="tabpanel">
                                <div class="row profile_row">
                                    <div class="col-md-3 d-none">
                                        <div class="profile-header mb-30">
                                            <img class="rounded-circle" src="" alt="Profle">
                                            <h3 class="name mt-3">user_name</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="user_profile_info">
                                            <div class="profile-left-content">
                                                <div class="card mb-30">
                                                    <div class="card-body">
                                                        <div class="card-header">
                                                            <h5 class="card-title">Profile Info</h5>
                                                        </div>

                                                        <ul class="info">
                                                            <li>
                                                                <i data-feather="edit-2" class="icon"></i>
                                                                Name : 'first_name' last_name
                                                            </li>
                                                            <li>
                                                                <i data-feather="mail" class="icon"></i>
                                                                Email Address : 'email'
                                                            </li>
                                                            <li>
                                                                <i data-feather="calendar" class="icon"></i>
                                                                Joined: 'register_date'
                                                            </li>
                                                            <li>
                                                                <i data-feather="phone" class="icon"></i>
                                                                Mobile Number : 'mobile_no'
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="about" role="tabpanel">
                                <div class="row profile_row">
                                    <div class="col-md-3">
                                        <div class="profile-header mb-30">
                                            <img class="rounded-circle" src="" alt="Profle-imd">
                                            <h3 class="name mt-3">user Name</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="user_profile_info">
                                            <div class="profile-left-content">
                                                <div class="card mb-30">
                                                    <div class="card-body">
                                                        <div class="card-header">
                                                            <h5 class="card-title">About</h5>
                                                        </div>
                                                        <ul class="info">                                                            
                                                                <li>
                                                                    <i data-feather="align-left" class="icon"></i>
                                                                    About : <strong>about</strong>
                                                                </li>     
                                                                <li>
                                                                    <i data-feather="wind" class="icon"></i>
                                                                    Represented To : 
                                                                    represents                                                                    
                                                                  
                                                                </li>                                                            
                                                                    hobbies
                                                                <li>
                                                                    <i data-feather="grid" class="icon"></i>
                                                                    Hobbies : 
                                                                    hobbies
                                                                </li>
                                                            
                                                            
                                                                <li>
                                                                    <i data-feather="thumbs-up" class="icon"></i>
                                                                    Likes : 
                                                                    likes
                                                                </li>
                                                         
                                                                <li>
                                                                    <i data-feather="user" class="icon"></i>
                                                                    Is an : are you
                                                                </li>
                                                                <li>
                                                                    <i data-feather="globe" class="icon"></i>
                                                                    Ethnic Country :ethnic_country
                                                                </li>
                                                                <li>
                                                                    <i data-feather="map-pin" class="icon"></i>
                                                                    Current Country : 'current_country'
                                                                </li>                                                           
                                                                <li>
                                                                    <i data-feather="headphones" class="icon"></i>
                                                                    Music Genres : 
                                                                    'music_genres'
                                                                </li>                                                            
                                                                <li>
                                                                    <i data-feather="map" class="icon"></i>
                                                                    Places Travelled : 
                                                                    places_travelled
                                                                </li>                                                         
                                                                <li>
                                                                    <i data-feather="clipboard" class="icon"></i>
                                                                    Places Want to Travel : 
                                                                    'places_want_to_travel'
                                                                </li>                                                           
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="business" role="tabpanel">
                                <div class="row profile_row">
                                    <div class="col-md-3">
                                        <div class="profile-header mb-30">
                                            <img class="rounded-circle" src="user_image" alt="Profle">
                                            <h3 class="name mt-3">user_name</h3>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="user_profile_info">
                                            <div class="profile-left-content">
                                                <div class="card mb-30">
                                                    <div class="card-body">
                                                        <div class="card-header">
                                                            <h5 class="card-title">Business</h5>
                                                        </div>

                                                        <ul class="info">
                                                            <li>
                                                                <i data-feather="alert-circle" class="icon"></i>
                                                                Business Owner : 'Yes':'No';
                                                            </li>
                                                            
                                                                <div class="col-md-3">
                                                                    <div class="profile-header mb-30">
                                                                        <img class="" src="business_logo" alt="Profle">
                                                                    </div>
                                                                </div>
                                                                <li>
                                                                    <i data-feather="award" class="icon"></i>
                                                                    About Business : 'about_business'
                                                                </li>
                                                                <li>
                                                                    <i data-feather="map-pin" class="icon"></i>
                                                                    Business Location : 'business_location'
                                                                </li>
                                                                <li>
                                                                    <i data-feather="phone" class="icon"></i>
                                                                    Business Phone : 'business_phone'
                                                                </li>
                                                                <li>
                                                                    <i data-feather="mail" class="icon"></i>
                                                                    Business Email : 'business_email'
                                                                </li>
                                                        
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="cards" role="tabpanel">
                                <div class="card-header">
                                    <h5 class="card-title">Credit Card Details</h5>
                                    <span class="add_new">
                                        <button type="button" class="btn btn-primary addcard" data-userid="userid"><span class="add_icon"><i class="fa fa-plus" aria-hidden="true"></i></span> Add New Card</button>
                                    </span>
                                </div>
                                <div class="table-responsive">
                                    <table class="table m-0 table-striped light table-hover" id="cardtbl">
                                        <thead class="bort-none borpt-0">
                                            <tr>
                                                <th scope="col">Sl No</th>
                                                <th scope="col">Name On Card</th>
                                                <th scope="col">Card Number</th>
                                                <th scope="col">Card Expiry</th>
                                                <th scope="col">Card Type</th>
                                                <th scope="col">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <tr id="card; ?>">
                                                <td>1</td>
                                                <td>card_name</td>
                                                <td>card_number</td>
                                                <td>card_expiry</td>
                                                <td>card_type</td>
                                                <td>
                                                    <button type="button" title="Edit" class="btn btn-link p-0 addcard" data-id="id" > <i class="fa fa-eye" aria-hidden="true"></i></button>
                                                    <button type="button" title="Delete" class="btn del_btn btn-link p-0" onclick="id"> <i class="fa fa-trash" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<section>
    <div class = "modal fade" data-backdrop="static" data-keyboard="false" id ="addcard" tabindex = "-1" role = "dialog" aria-labelledby = "myModalLabel" aria-hidden = "true"></div>
</section>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#user_orders').DataTable();
        $('#user_wishlist').DataTable();
        $('#cardtbl').DataTable();
        var $modal = $('#addcard');
        $(document).on('click','.addcard',function(){
            var id = $(this).data('id');
            var userid = $(this).data('userid');
            event.stopPropagation();
            $modal.load('website/cards', {id: id,userid: userid},
                function(){
                    $modal.modal('show');
                });
        });
    });
</script>
<script type="text/javascript">
    function delete_card(id="")
  {
    $.confirm({
      title: 'Delete This Card ?',
      content: 'This dialog will automatically trigger \'cancel\' in 6 seconds if you don\'t respond.',
      autoClose: 'cancelAction|8000',
      buttons: {
        deleteUser: {
          text: 'Yes, Delete it',
          action: function () {
            $.ajax({
              url: "/admin/delete/users_saved_cards",
              type: "POST",
              data: {id:id,param:'id'},
              success: function(result)
              {
                $.alert(result);
                $("#card"+id).remove();
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