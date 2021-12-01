@extends('layouts.site')

@section('title')
   

@endsection
@section('styles')
    <style type="text/css">
        .img-circle {
            width: 150px;
            height: 150px;
        }
        .card{
            padding: 2rem !important;
            margin-top: 2rem;
            box-shadow: 0px 0px 10px rgb(0 0 0 / 5%);
            background: #fff
            
        }
        .card .card-body img{
            display: block;
            height: auto;
            margin: auto;
        }
        .card-title{
            font-weight: 600;
            font-size: 1.80rem
        }
        .inner-box {
            cursor: pointer;
        }
        #title{
            display: none;
        }
        #home{
            height: 300px;
        }
        .moving-bg {
           
      background: url('/assets/uploads/banners/cd4be3cde8c79f45cd5d67b785e4496b.jpg') !important;;
      background-size: contain;
    }
    .header-1 .header-1-content {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 400px;
}
.result-content{
    min-height: 250px;
    margin: 20px;
}


    </style>
@endsection
@section('contents')
<div id="home" class="header-1 demo-1 has-gradient">
    <div class="moving-bg"></div>
    <div class="container">
      <div class="header-1-content row">
        <div class="col-md-9 col-sm-12">
          <h1 class="has-line">Survey Result</h1>
          <p class="lead"></p>
        </div>
      </div>
    </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-6">          
                <div class="result-content">
                    <h2 class="sec-title">Hi {{ $survey[0]['name']  }}</h2>
                    <p class="lead">Following are the Evaluation of your recent enrolled survey :-</p>
                    <ul>
                        <li><strong>Total Questions :</strong>   {{ $survey[0]['total_que'] }}</li>
                        <li><strong>Total Correct Count :</strong> {{ $survey[0]['correct_count'] }}</li>
                        <li><strong>Total Incorrect Count :</strong> {{ $survey[0]['incorrect_count'] }}</li>
                        <li><strong>Security Awareness Score:</strong> {{ $survey[0]['percentage'] }}%</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <h2 class="sec-title">Security</h2>
                    <p class="lead">Understanding and recognizing fraud is an effective way 
                        of helping to prevent it from happening to you. Learn about 
                        our tools to detect potential fraud before it's too late.
                    </p>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/img-products/Capture-1.JPG') }}" alt="card-img">
                    <h4 class="card-title">An Added Layer of Security</h4>
                    <p class="card-text">Protecting your personal and financial information is one of our 
                        top priorities. That's why we offer you these security features that add a 
                        dual-layer of protection to your online account.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/img-products/Capture-2.JPG') }}" alt="card-img">
                    <h4 class="card-title">Security Tips</h4>
                    <p class="card-text">Knowing how to protect yourself is the best attack deterrent, so please 
                        review our valuable cyber security tips</p>
                    </div>
                </div>
            </div>    
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/img-products/Capture-3.JPG') }}" alt="card-img">
                    <h4 class="card-title">Reporting Fraud</h4>
                    <p class="card-text">In the event you become a victim of identity fraud, the sooner you 
                        report fraud or identity theft, the faster PNC and the authorities can take steps to 
                        assist you.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/img-products/Capture-4.JPG') }}" alt="card-img">
                    <h4 class="card-title">Set Up Account Activity Alerts</h4>
                    <p class="card-text">Stay informed by setting up alerts and easily monitor
                        your accounts via email or text message.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/img-products/Capture-5.JPG') }}" alt="card-img">
                    <h4 class="card-title">Detect and Remove Malware</h4>
                    <p class="card-text">We have partnered with a leading expert in financial security, 
                        Trusteer Rapport, to offer online fraud protection software FREE to our customers.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card text-center">
                    <div class="card-body">
                        <img src="{{ asset('assets/img-products/Capture-6.JPG') }}" alt="card-img">
                    <h4 class="card-title">Learn How to Spot & Report Phishing</h4>
                    <p class="card-text">Phishing is a fraudulent attempt, usually made through 
                        e-mail or phone, including text messaging, to steal your personal 
                        information.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
    
@endsection