@extends('landingpage.layout')

@section('content')

<!-- CONTAINER -->
<div class="container">
   <div class="row">
        <div class="col-lg-12">
            <div id="success">
                <div class="mt-5 text-center">
                    
                <img src="{{ asset('img/icon-sukses.png') }}" 
                class="img-fluid mt-3 animated zoomIn"
                alt="Sukses" width="150" style="animation-duration: 1.5s;">
                    <h4>Terima kasih data yang kamu inputkan berhasil kami Terima!</h4>
                    <p>Lanjutkan Perjalanan Panjang kita dengan lebih baik</p>
                    <a class="back-link" href="/">Kembali Ke Beranda ➜</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection