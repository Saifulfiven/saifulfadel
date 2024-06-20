@extends('landingpage.layout')

@section('content')
<link href="{{ asset('/css/style-login.css') }}" rel="stylesheet">

<!-- CONTAINER -->
<div class="container">
    
   <div class="row">
      

        <div class="col-lg-12">
        
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
        </div>

        <div id="qbox-container">
            <form action="/tracerstudy" class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate="">
            @csrf
                <div id="steps-container">
                   

                    @include('tracerstudy.component-stepform-satu')
                    @include('tracerstudy.component-stepform-dua')
                    @include('tracerstudy.component-stepform-tiga')

            
                    
                </div>
                <div id="q-box__buttons">
                    <button id="prev-btn" type="button">Previous</button> 
                    <button id="next-btn" type="button">Next</button> 
                    <button id="submit-btn" type="submit">Submit</button>
                </div>
            </form>
        </div>
        </div>
    </div>
</div>
<script src="{{ asset('/js/script-login.js') }}"></script>

@endsection

