@extends('layouts.siteAdmin')
@section('styles')
    
@endsection
@section('contents')
<div class="main-content-header">    
<h1>Quiz Detail</h1>  
    <ol class="breadcrumb">  
        <li class="breadcrumb-item">  
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>  
        </li>  
        <li class="breadcrumb-item">  
            <a href="#">Quiz Detail</a>  
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
                    <h5 class="card-title">Quiz Detail</h5>  
                    <span class="add_new">  
                        <button type="button" class="btn btn-primary add_btn" onclick="window.location.href='{{ route('admin.CreateQuestionQuiz') }}'"><span class="add_icon"><i class="fa fa-plus" aria-hidden="true"></i></span> Add New</button>  
                    </span> 
                </div>
  
                  <div class="table-responsive">  
                      <table class="table m-0 table-striped light table-hover" id="myTable">  
                          <thead class="bort-none borpt-0">  
                              <tr>  
                                                                   
                                  <th scope="col">Id</th>
                                  <th scope="col">Question</th>                                                              
                                  <th scope="col">Actions</th>  
                              </tr>  
                          </thead>
  
                          <tbody>
                                  @foreach ( $quizdetails as $quiz )
                                    <tr>                                      
                                        <td>{{ $quiz->id }}</td>                                       
                                        <td>{{ $quiz->Question }}</td>             
                                        <td class="">
                                            <button type="button" title="edit" class="btn btn-link edit_btn p-0 mr-1" 
                                            onclick="window.location.href='{{ route('admin.editQuestionQuiz',['queId'=>$quiz->id]) }}'">    
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>    
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