@extends('layouts.site')
@section('styles')
<style type="text/css">
	.img-circle {
		width: 150px;
		height: 150px;
	}
	.inner-box {
		cursor: pointer;
	}.moving-bg {
		background: url(/assets/uploads/banners/cd4be3cde8c79f45cd5d67b785e4496b.jpg) !important;;
	}
</style>
@endsection
@section('contents')
<div id="home" class="header-1 demo-1 has-gradient">
	<div class="moving-bg"></div>
	<div class="container">
		<div class="header-1-content row">
			<div class="col-md-9 col-sm-12">
				<h1 class="has-line">Aammsecurities</h1>
				<p class="lead">“I really think that if we change our own approach and thinking about what we have available to us, that is what will unlock our ability to truly excel in security. It’s a perspectives exercise. What would it look like if abundance were the reality and not resource constraint?”  — Greg York</p>
			</div>
		</div>
	</div>
</div>
@include('partials.quiz')
<section id="about" class="about">
	<div class="container">
		<div class="row">
            @foreach ($contents as $content ) 
			{!! $content['description'] !!}
            @endforeach
		</div>
	</div>
</section>
@endsection