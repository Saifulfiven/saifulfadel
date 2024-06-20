

<div class="step">
                        <h4>Form Identitas</h4>

                        
                        <div class="row">
                              <!-- TITLE -->
                            <div class="col-lg-4">
                                <div id="title-container">
                                    <img class="covid-image" src="/img/logo-header.png">
                                    <h2>Form Data Alumni</h2>
                                    <h3>Nobel Indonesia</h3>
                                    <div id="pesan"></div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mt-2">
                                    <label class="form-label">NIM</label> 
                                    <input class="form-control" id="nim" name="nim" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Nama Lengkap</label> 
                                    <input class="form-control" id="namalengkap" name="namalengkap" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">No HP/WA</label> 
                                    <input class="form-control" id="kontak" name="kontak" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Kode Prodi</label> 
                                    <input class="form-control" id="prodi" name="kodeprodi" type="text">
                                </div>
                            </div>

                            
                            <div class="col-md-4">
                                <div class="mt-2">
                                    <label class="form-label">Tahun Lulus</label> 
                                    <input class="form-control" id="tahunlulus" name="tahunlulus" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">Email</label> 
                                    <input class="form-control" id="email" name="email" type="email">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">NIK</label> 
                                    <input class="form-control" id="nik" name="nik" type="text">
                                </div>
                                <div class="mt-2">
                                    <label class="form-label">NPWP</label> 
                                    <input class="form-control" id="npwp" name="npwp" type="text">
                                </div>
                            </div>
                        </div>
                    </div>

                    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

<script>
       $(document).ready(function(){
    $("#nim").on('change', function(){
        console.log("anak kucing meong meong");
        var text = $(this).val();
        $.ajax({
            type: "POST",
            url: "{{ route('process.text') }}",
            data: { 
                _token: "{{ csrf_token() }}",
                text: text 
            },
            success: function(response){
                if (response.pesan == '404') {
                    
                    $("#pesan").val(response.pesan);
                    alert(response.pesan);
                } else {
                    $("#namalengkap").val(response.namalengkap);
                    $("#email").val(response.email);
                    $("#nik").val(response.nik);
                    $("#prodi").val(response.prodi);
                }
            },
        });
    });
});
</script>
