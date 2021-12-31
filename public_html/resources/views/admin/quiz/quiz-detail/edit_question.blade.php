@extends('layouts.siteAdmin')
@section('styles')
    <script src="//cdn.ckeditor.com/4.13.1/full/ckeditor.js"></script>
    <style>

        form label {
            width: 100%;
        }

    </style>
@endsection
@section('contents')
<div class="main-content-header">
    <h1>Edit Quiz Question</h1>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
      </li>
      <li class="breadcrumb-item">
        <a href="#">Edit Quiz Question</a>
      </li>
      <!--<li class="breadcrumb-item">-->
      <!--  <a href="admin/subcategories">Sub Categories</a>-->
      <!--</li>-->
    </ol>
  </div>  
  <div class="row">
    <div class="col-lg-12">
      <div class="card mb-30 appointment_manage">
        <div class="card-body">
          <div class="card-header">
            <h5 class="card-title">
                Edit Quiz 
            </h5>
          </div>
          <div class="add_service_form">
            @if (count($errors) > 0)
                <div class="alert alert-danger fade show m-t-5">
                    <span class="close" data-dismiss="alert">×</span>
                    <div><b>Error!</b>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif
            @if (session('success'))  
            <div class="alert alert-success fade show m-t-5">
                <span class="close" data-dismiss="alert">×</span>
                <div><b>Success!</b> {{ session('success') }}.</div>
            </div>
            @endif
            @if (session('danger'))  
            <div class="alert alert-danger fade show m-t-5">
                <span class="close" data-dismiss="alert">×</span>
                <div><b>Error!</b> {{ session('danger') }}.</div>
            </div>
            @endif
            <form class="" method="post" action="{{ route('admin.UpdateQuestionQuiz') }}"  enctype="multipart/form-data">
                @csrf
                <input type="text" hidden name="queid" id="queid" value="{{ $quizDetail[0]['id'] }}">
              <div class="form-group">
                <label class="form-label">Question {{  $quizDetail[0]['id'] }}</label>
                <textarea type="text" class="form-control" 
                    name="Question" id="Question" rows="3">{{ $quizDetail[0]['Question'] }}"</textarea>                 
                @error('Question')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="form-group">
                <label class="form-label">Option A</label>
                <input type="text" class="form-control" 
                    name="OptionA" id="OptionA" 
                    value="{{ $quizDetail[0]['OptionA'] }}" required
                > 
                @error('OptionA')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="form-group">
                <label class="form-label">Option B</label>
                <input type="text" class="form-control" 
                    name="OptionB" id="OptionB" 
                    value="{{ $quizDetail[0]['OptionB'] }}" required
                > 
                @error('OptionB')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="form-group">
                <label class="form-label">Option C</label>
                <input type="text" class="form-control" 
                    name="OptionC" id="OptionC" 
                    value="{{ $quizDetail[0]['OptionC'] }}" required
                > 
                @error('OptionC')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
              <div class="form-group">
                <label class="form-label">Option D</label>
                <input type="text" class="form-control" 
                    name="OptionD" id="OptionD" 
                    value="{{ $quizDetail[0]['OptionD'] }}" required
                > 
                @error('OptionD')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>
             
              <div class="form-group">
                <label class="form-label">Correct Answer</label>
                <select class="form-control" name="correctAnswer"  id="correctAnswer">                 
                  <option value="OptionA" {{ ($quizDetail[0]['correctAnswer']=='OptionA')?'selected':'' }}>Option A</option>
                  <option value="OptionB" {{ ($quizDetail[0]['correctAnswer']=='OptionB')?'selected':'' }}>Option B</option>
                  <option value="OptionC" {{ ($quizDetail[0]['correctAnswer']=='OptionC')?'selected':'' }}>Option C</option>
                  <option value="OptionD" {{ ($quizDetail[0]['correctAnswer']=='OptionD')?'selected':'' }}>Option D</option>
                </select>
                @error('Status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>   
              <div class="form-group">
                <label class="form-label">Remarks in case of incorrect answer</label>
                <textarea id="remarks"  rows="6" class="form-control" name="remarks">{{ $quizDetail[0]['remarks'] }}</textarea>
                @error('remarks')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror 
              </div>          
              <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  
@endsection
@section('scripts')

   
@endsection