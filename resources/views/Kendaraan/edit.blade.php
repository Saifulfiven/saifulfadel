@extends('admindashboard.layout')

@section('content')

<?php
    $Kendaraans = [
        'tempat_isi_bahan_bakar' => 'SPBU Sam Ratulangi',
        'berapa_liter' => '5 Liter',
        'harga_per_liter' => '15.000',
        'total_bayar' => '75.000',
        'gambar' => 'bensin.jpeg',
        'keterangan' => 'Kehabisan Bensin di jalan'
    ];
?>

<div class="container-fluid py-4">
    <div class="row">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card">
                <div class="card-header d-flex justify-content-between bg-primary text-white">
                    <strong>hari, tanggal : Kamis, 20-juni-2024</strong>
                    <a href="{{ url()->previous() }}" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Buka Isi Bahan Bakar -->
                        <div class="col-md-6">
                            <div class="border border-primary p-3">
                                <h4>Pengisian Bahan Bakar</h4>
                                <div class="row">
                                    <div class="col-md-4">
                                        Tempat Isi Bahan Bakar
                                    </div>
                                    <div class="col-md-4">
                                        {{ $Kendaraans['tempat_isi_bahan_bakar'] }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Berapa Liter
                                    </div>
                                    <div class="col-md-4">
                                        {{ $Kendaraans['berapa_liter'] }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Harga per Liter
                                    </div>
                                    <div class="col-md-4">
                                        {{ $Kendaraans['harga_per_liter']}}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Total Bayar
                                    </div>
                                    <div class="col-md-4">
                                        {{ $Kendaraans['total_bayar'] }}
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Gambar Nota
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('images/Kendaraan/'.$Kendaraans['gambar']) }}" alt="{{ $Kendaraans['gambar'] }}" width="100px" class="img-thumbnail" onclick="onClick(event)" id="preview">
                                        <script>
                                            function onClick(event) {
                                                var modal = document.getElementById("myModal");
                                                var img = document.getElementById("img01");
                                                var caption = document.getElementById("caption");
                                                img.src = event.target.src;
                                                caption.innerHTML = event.target.alt;
                                                modal.style.display = "block";
                                                var span = document.getElementsByClassName("close")[0];
                                                span.onclick = function() { 
                                                    modal.style.display = "none";
                                                }
                                            }
                                        </script>
                                        <div id="myModal" class="modal">
                                            <span class="close">&times;</span>
                                            <img class="modal-content" id="img01">
                                            <div id="caption"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        Keterangan
                                    </div>
                                    <div class="col-md-4">
                                        {{ $Kendaraans['keterangan'] }}
                                    </div>
                                </div>
                                
                                <button class="btn btn-primary" onclick="togglepemakaian()">Isi Bensin</button>
                                
                                <script>
                                    function togglepemakaian() {
                                        var content = document.getElementById("togglepemakaian");
                                        if (content.style.display === "none") {
                                            content.style.display = "block";
                                            setTimeout(function() {
                                                content.style.transition = "opacity 0.3s";
                                                content.style.opacity = "1";
                                            }, 50);
                                        } else {
                                            content.style.transition = "opacity 0.3s";
                                            content.style.opacity = "0";
                                            setTimeout(function() {
                                                content.style.display = "none";
                                            }, 300);
                                        }
                                    }
                                </script>
                            </div>
                        </div>

                        <div class="col-md-6 border border-primary p-3" id="togglepemakaian" style="display: none;">
                            <form action="" method="post" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="tempat_isi_bahan_bakar" class="col-sm-4 col-form-label">Tempat Isi Bahan Bakar</label>
                                    <div class="col-sm-7">
                                        <input type="text" class="form-control" id="tempat_isi_bahan_bakar" name="tempat_isi_bahan_bakar" placeholder="Masukkan Tempat Isi Bahan Bakar">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="berapa_liter" class="col-sm-4 col-form-label">Berapa Liter</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="berapa_liter" name="berapa_liter" placeholder="Masukkan Berapa Liter">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga_per_liter" class="col-sm-4 col-form-label">Harga per Liter</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="harga_per_liter" name="harga_per_liter" placeholder="Masukkan Harga per Liter">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="total_bayar" class="col-sm-4 col-form-label">Total Bayar</label>
                                    <div class="col-sm-7">
                                        <span>500.000</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lampiran" class="col-sm-4 col-form-label">Lampiran</label>
                                    <div class="col-sm-7">
                                        <input type="file" class="form-control-file" id="lampiran" name="lampiran">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Tutup Isi Bahan Bakar -->



                    <div class="row" style="margin-top:20px">
                    <!-- Buka Isi Bahan Bakar -->
                        <div class="col-md-6">
                            <div class="border border-primary p-3">
                                <h4>Penanggungjawab</h4>
                                <div class="row">
                                    <div class="col-md-6">Tanggal Pemakaian
                                    </div>
                                    <div class="col-md-6">
                                        Kamis, 14 - Juli - 2024
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Jam Awal Pemakaian
                                    </div>
                                    <div class="col-md-6">
                                        10.00 WIB
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Jam Akhir Pemakaian
                                    </div>
                                    <div class="col-md-6">
                                        12.00 WIB
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Speedometer Awal
                                    </div>
                                    <div class="col-md-6">
                                        38889
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-6">
                                        Spedometer Akhir
                                    </div>
                                    <div class="col-md-6">
                                        50030
                                    </div>
                                </div>
                                <br>
                                <button class="btn btn-primary" onclick="toggleContent()">Update Pemakaian</button>
                                
                                <script>
                                    function toggleContent() {
                                        var content = document.getElementById("toggleContent");
                                        if (content.style.display === "none") {
                                            content.style.display = "block";
                                            setTimeout(function() {
                                                content.style.transition = "opacity 0.3s";
                                                content.style.opacity = "1";
                                            }, 50);
                                        } else {
                                            content.style.transition = "opacity 0.3s";
                                            content.style.opacity = "0";
                                            setTimeout(function() {
                                                content.style.display = "none";
                                            }, 300);
                                        }
                                    }
                                </script>
                            </div>
                        </div>


                        <div class="col-md-6 border border-primary p-3" id="toggleContent" style="display: none;">
                            <form action="" method="post" class="form-horizontal">
                                @csrf
                                <div class="form-group row">
                                    <label for="tempat_isi_bahan_bakar" class="col-sm-4 col-form-label">Tanggal Pemakaian</label>
                                    <div class="col-sm-7">
                                        <input type="date" class="form-control" id="tempat_isi_bahan_bakar" name="tempat_isi_bahan_bakar">
                                    </div>
                                </div>
                               
                                <div class="form-group row">
                                    <label for="jam_awal_pemakaian" class="col-sm-4 col-form-label">Jam Awal Pemakaian</label>
                                    <div class="col-sm-7">
                                        <input type="time" class="form-control" id="jam_awal_pemakaian" name="jam_awal_pemakaian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jam_akhir_pemakaian" class="col-sm-4 col-form-label">Jam Akhir Pemakaian</label>
                                    <div class="col-sm-7">
                                        <input type="time" class="form-control" id="jam_akhir_pemakaian" name="jam_akhir_pemakaian">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="spedometer_awal" class="col-sm-4 col-form-label">Spedometer Awal</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="spedometer_awal" name="spedometer_awal">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="spedometer_akhir" class="col-sm-4 col-form-label">Spedometer Akhir</label>
                                    <div class="col-sm-7">
                                        <input type="number" class="form-control" id="spedometer_akhir" name="spedometer_akhir">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="pengguna" class="col-sm-4 col-form-label">Pengguna</label>
                                    <div class="col-sm-7">
                                        <select class="form-control" id="pengguna" name="pengguna">
                                            <option value="">Pilih Penanggungjawab</option>
                                            <option value="Pengguna 1">Usman</option>
                                            <option value="Pengguna 2">Arapat</option>
                                            <option value="Pengguna 3">Fitrah</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                    <div class="col-sm-7">
                                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- Tutup Isi Bahan Bakar -->


                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
