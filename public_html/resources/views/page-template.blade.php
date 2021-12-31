@extends('layouts.site')

@section('title')
   
@foreach ($pages as $page)
    {{  $page->page_title  }}
        
    @endforeach
@endsection
@section('styles')
    <style type="text/css">
        .img-circle {
            width: 150px;
            height: 150px;
        }
        .inner-box {
            cursor: pointer;
        }
    </style>
@endsection
@section('contents')
@foreach ($pages as $page)
<div id="home" class="header-1 demo-1 has-gradient">
	<div class="moving-bg" style="background:url({{ asset('/assets/uploads/banners/'.$page->banner_img_location) }})!important"></div>
	<div class="container">
		<div class="header-1-content row">
			<div class="col-md-9 col-sm-12">
				<h1 class="has-line"> {{  $page->banner_title  }}</h1>
				<p class="lead">{{  $page->banner_sub_title  }}</p>
			</div>
		</div>
	</div>
</div>
@include('partials.quiz')
<section id="services" class="how-it-work">
    <div class="container">
      <div class="how-one-container" >
        <div class="row" style="padding: 60px">
            {!! $page->Section_Content1 !!}
        </div>
      </div>
      <div class="how-one-container" >
        <div class="row" style="background: #ebeaea; padding: 60px">
            {!! $page->Section_Content2 !!}
        </div>
      </div>
      <div class="how-one-container" style="padding: 60px">
        <div class="row">
            {!! $page->Section_Content3 !!}
        </div>
      </div>
    </div>
  </section>

    @endforeach
@endsection
@section('scripts')
    
@endsection