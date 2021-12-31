@extends('layouts.siteAdmin')
@section('styles')
    
@endsection
@section('contents')
<div class="main-content-header">    
<h1>Survey List</h1>  
    <ol class="breadcrumb">  
        <li class="breadcrumb-item">  
            <a href="{{ route('admin.dashboard') }}">Dashboard</a>  
        </li>  
        <li class="breadcrumb-item">  
            <a href="#">Survey List</a>  
        </li>  
    </ol>
</div>
<div class="row">  
    <div class="col-lg-12">  
      <div class="card mb-30 appointment_manage">  
          {{-- <div class="tabs-style-two">  
              <ul class="nav nav-tabs">  
                  <li class="nav-item">  
                      <a class="nav-link active" href="/admin-support-categories">Sub page</a>  
                  </li>  
                  <li class="nav-item">  
                      <a class="nav-link" href="/admin-support-subcategories">Add Sub Page</a>  
                  </li>  
             
              </ul>  
          </div>   --}}
              <div class="card-body">  
                <div class="card-header">  
                    <h5 class="card-title">Survey</h5>  
                    <span class="add_new">  
                       
                    </span> 
                </div>
  
                  <div class="table-responsive">  
                      <table class="table m-0 table-striped light table-hover" id="myTable">  
                          <thead class="bort-none borpt-0">  
                              <tr>  
                                  <th scope="col">Id</th>   
                                  <th scope="col">Date</th>  
                                  <th scope="col">Name</th>                                 
                                  <th scope="col">Mobile</th> 
                                  <th scope="col">Email</th> 
                                  <th scope="col">Total</th>  
                                  <th scope="col">Correct</th> 
                                  <th scope="col">Incorrect</th> 
                                  <th scope="col">Percentage</th> 
                              </tr>  
                          </thead>  
                          <tbody>
                                  @foreach ( $surveys as $survey )
                                    <tr>                                      
                                        <td>{{ $survey->id }}</td>
                                        <td>{{ $survey->created_at }}</td>
                                        <td>{{ $survey->name }}</td>
                                        <td>{{ $survey->mobile }}</td>
                                        <td>{{ $survey->email }}</td>
                                        <td>{{ $survey->total_que }}</td>
                                        <td>{{ $survey->correct_count }}</td>
                                        <td>{{ $survey->incorrect_count }}</td>
                                        <td>{{ $survey->percentage }}</td>
                                        
                                    
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