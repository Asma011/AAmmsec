@extends('layouts.site')
@section('styles')
<style type="text/css">
    .tagline {
      color: #C0977E;
      font-family: "Space Mono", monospace;
      text-transform: uppercase;
      letter-spacing: 0.2em;
      font-size: 0.875em;
      line-height: 1.5;
      margin: 0 0 1.75em;
      font-weight: 700;
    }.moving-bg {
      background: url('/assets/uploads/banners/eb6d6463fd00778ca691f74c251f5815.jpg') !important;;
    }
  </style>
@endsection
@section('contents')
<div id="home" class="header-1 demo-1 has-gradient">
    <div class="moving-bg"></div>
    <div class="container">
      <div class="header-1-content row">
        <div class="col-md-9 col-sm-12">
          <h1 class="has-line">Project Management</h1>
          <p class="lead"></p>
        </div>
      </div>
    </div>
  </div>
  
  <section id="services" class="how-it-work">
    <div class="container">
      <div class="how-one-container">
        <div class="row">
            <h2><span style="font-size:16px"><strong><span style="font-family:Arial,Helvetica,sans-serif">IT Project Management Solutions That Are Simple to Use</span></strong></span></h2>

            <p><span style="font-size:16px"><strong><span style="font-family:Arial,Helvetica,sans-serif">Given the vital nature of your IT infrastructure, it is critical that each project be handled and performed with care and professionalism from start to finish. </span></strong></span></p>

        </div>
      </div>
      <div class="how-one-container">
        <div class="row" style="background: #ebeaea;">
            <p><strong><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif">We provide minimal disruption to your company operations as your IT project management provider, regardless of how complicated or important your requirements may be.</span></span></strong></p>

            <p>&nbsp;</p>

            <p>&nbsp;</p>

            
        </div>
      </div>
      <div class="how-one-container">
        <div class="row">
            <h2><strong><span style="font-size:16px"><span style="font-family:Arial,Helvetica,sans-serif">Whether you&#39;ve made a strategic choice to relocate servers, require new systems for your staff, or are relocating offices, we can manage and oversee your project from start to end. Allow us to manage your IT infrastructure so that you may concentrate on the organization&#39;s objectives. We scope each project in advance to provide you with an accurate estimate of the work, time, and costs. We&#39;ve secured the successful completion of a wide variety of IT projects.</span></span></strong></h2>

            
        </div>
      </div>
    </div>
  </section>
    
@endsection