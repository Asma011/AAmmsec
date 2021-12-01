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
<section style="margin: 100px">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <h3>Good to See You {{ Auth::user()->user_name }}
            </div>
        </div>
    </div>
</section>
@endsection