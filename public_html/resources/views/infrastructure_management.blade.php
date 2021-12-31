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
      background: url('/assets/uploads/banners/a3aa22d0bd480279b437181f0a17f1ba.jpg') !important;;
    }
  </style>
@endsection
@section('contents')
<div id="home" class="header-1 demo-1 has-gradient">
    <div class="moving-bg"></div>
    <div class="container">
      <div class="header-1-content row">
        <div class="col-md-9 col-sm-12">
          <h1 class="has-line">Infrastructure Management</h1>
          <p class="lead"></p>
        </div>
      </div>
    </div>
  </div>
  
  <section id="services" class="how-it-work">
    <div class="container">
      <div class="how-one-container">
        <div class="row">
            <p style="margin-left:23px; text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:22px"><strong>Support for Infrastructure 24 hours a day</strong></span></span></p>

            <p style="margin-left:23px; text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">Infrastructure management, to us, is more than just keeping your hardware, software, networks, and cloud services operational. We share your long-term objectives and help businesses save time by simplifying operations and increasing efficiency.</span></span></p>

            <ul>
            </ul>


        </div>
      </div>
      <div class="how-one-container">
        <div class="row" style="background: #ebeaea;">
            <h2><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">We provide you with the headspace you need to focus on your business, establish a competitive edge, and grasp exciting possibilities by providing managed IT services.</span></span></h2>


            
        </div>
      </div>
      <div class="how-one-container">
        <div class="row">
            <h2 style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:16px">If&nbsp;your IT infrastructure is not implemented, managed, and maintained effectively, you risk experiencing connection, productivity, and security issues, all of which have a negative impact on performance and profitability. With aammsecurities as a trusted partner, we can predict risks to your infrastructure early and take action long before problems occur &ndash; meticulously controlling every inch of your IT estate.</span></span></h2>

            
        </div>
      </div>
    </div>
  </section>
    
@endsection