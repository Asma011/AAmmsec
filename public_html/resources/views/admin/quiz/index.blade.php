@extends('layouts.siteAdmin')
@section('styles')
    
@endsection
@section('contents')
<div class="main-content-header">    
<h1>Quiz</h1>  
    <ol class="breadcrumb">  
        <li class="breadcrumb-item">  
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>  
        </li>  
        <li class="breadcrumb-item">  
            <a href="#">Quiz List</a>  
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
                    <h5 class="card-title">Quiz List</h5>  
                    <span class="add_new">  
                        <button type="button" class="btn btn-primary add_btn" onclick="window.location.href='{{ route('admin.showCreateQuizFrm') }}'"><span class="add_icon"><i class="fa fa-plus" aria-hidden="true"></i></span> Add New</button>  
                    </span> 
                </div>
  
                  <div class="table-responsive">  
                      <table class="table m-0 table-striped light table-hover" id="myTable">  
                          <thead class="bort-none borpt-0">  
                              <tr>  
                                                                   
                                  <th scope="col">Quiz_Id</th>
                                  <th scope="col">Quiz Title</th> 
                                  <th scope="col">Description</th> 
                                  <th scope="col">Status</th> 
                                  <th scope="col">Actions</th>  
                              </tr>  
                          </thead>
  
                          <tbody>
                                  @foreach ( $quizs as $quiz )
                                    <tr>                                      
                                        <td>{{ $quiz->id }}</td>                                       
                                        <td>{{ $quiz->Quiz_Title }}</td>        
                                        <td>{{ $quiz->Quiz_Sub_Title }}</td>  
                                        <td>{{ ($quiz->Status==1)?'Active':'Inactive' }}</td>                                
                                        <td class="text-center">
                                            <button type="button" title="edit" class="btn btn-link edit_btn p-0 mr-1" 
                                            onclick="window.location.href='{{ route('admin.editQuiz',['qid'=>$quiz->id]) }}'">    
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>    
                                            </button>    
                                           
                                            <button onclick="window.location.href='{{ route('admin.showQuizDetailList',['qdid'=>$quiz->id]) }}'" type="button" title="view" 
                                                class="btn del_btn btn-link p-0 mr-1">    
                                                <i class="fa fa-eye" aria-hidden="true"></i>    
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