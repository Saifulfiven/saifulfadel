  
<!-- Blog Start -->
        <div class="container-fluid py-5  bg-pengalaman">
            <div class="container py-5">
                <div class="text-center mb-5 wow fadeInUp" data-wow-delay=".3s">
                    <h5 class="mb-2 px-3 py-1 text-dark rounded-pill d-inline-block border border-2 border-primary">Acara</h5>
                    <h1 class="display-5">Alumni Talk</h1>
                </div>


                <div class="row align-items-center" style="margin-bottom:4%">
                    
                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".5s">
                        <span  style="letter-spacing: 5px;"> ACARA YANG AKAN DATANG </span>
                        <h2 class="mb-4" style="color: blue;">{{ $acarasterbaru->judul }}</h2>
                        <p><i>
                        {{ $acarasterbaru->deskripsi }}
                        </i></p>
                        <span class="text-dark d-block mb-2"><i class="fas fa-calendar-alt me-2"></i>{{ $acarasterbaru->tanggal }}</span>
                        <span class="text-dark d-block mb-2"><i class="fas fa-clock me-2"></i>{{ $acarasterbaru->jam }}</span>
                        
                        @if($acarasterbaru->lokasi != null)
                        <span class="text-dark d-block mb-2">
                            <i class="fas fa-location-arrow me-2"></i>{{ $acarasterbaru->lokasi }}
                        </span>
                        @endif

                        @if($acarasterbaru->linksatu != null)
                        <a href="{{ $acarasterbaru->linksatu }}" target="_blank"
                        class="btn btn-primary mt-3 mb-3 text-white" style="letter-spacing: 5px;">
                        {{ $acarasterbaru->judullinksatu }}</a>
                        @endif

                        @if($acarasterbaru->linkdua != null)
                        <a href="{{ $acarasterbaru->linkdua }}" target="_blank"
                        class="btn btn-primary mt-3 mb-3 text-white" style="letter-spacing: 5px;">
                        {{ $acarasterbaru->judullinkdua }}</a>
                        @endif
                    </div>

                    <div class="col-lg-6 wow fadeIn" data-wow-delay=".3s">
                        <img src="images/acara/{{ $acarasterbaru->gambar }}" class="img-fluid" alt="Acara">
                    </div>
                </div>
                
            

            <div class="row">
                <div class="owl-carousel blog-carousel wow fadeInUp mt-5" data-wow-delay=".5s">
                    
                    @foreach ($acaras as $acara)
                        <div class="blog-item">
                            <img src="images/acara/{{ $acara->gambar }}" class="img-fluid w-100 rounded-top" alt="">
                            <div class="rounded-bottom bg-light">
                            <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
                                <span class="pe-2 text-dark"><i class="fa fa-user me-2"></i>By Admin</span>
                                    <span class="text-dark"><i class="fas fa-calendar-alt me-2"></i>{{ $acara->tanggal }}</span>
                            </div>
            
                                <div class="px-4 pb-0">
                                    <h4>{{ $acara->judul }}</h4>
                                    <p>{{ $acara->deskripsi }}</p>
                                </div>

                                <div class="p-4 py-2 d-flex justify-content-between bg-primary rounded-bottom blog-btn">
                                    <!-- <a href="/{{ $acara->slug }}" class="btn btn-primary btn-block text-white">Daftar Sekarang</a> -->
                                </div>
                                
                            </div>
                        </div>
                    @endforeach

                   
                  </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->
       