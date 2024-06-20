<link href="{{ asset('/css/style-login.css') }}" rel="stylesheet">

<!-- CONTAINER -->
<div class="container">
    
   <div class="row">
      

        <div class="col-lg-12">
        
        <div class="progress">
            <div aria-valuemax="100" aria-valuemin="0" aria-valuenow="50" class="progress-bar progress-bar-striped progress-bar-animated bg-danger" role="progressbar" style="width: 0%"></div>
        </div>

        <div id="qbox-container">
            <form class="needs-validation" id="form-wrapper" method="post" name="form-wrapper" novalidate="">
                <div id="steps-container">
                   

                    <div id="success">
                    <div class="mt-5">
                        <h4>Success! We'll get back to you ASAP!</h4>
                        <p>Meanwhile, clean your hands often, use soap and water, or an alcohol-based hand rub, maintain a safe distance from anyone who is coughing or sneezing and always wear a mask when physical distancing is not possible.</p>
                        <a class="back-link" href="">Go back from the beginning ➜</a>
                    </div>
                    </div>
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