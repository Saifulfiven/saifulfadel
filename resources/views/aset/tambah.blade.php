@extends('admindashboard.layout')

@section('content')

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-md-12">
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
                    <strong>Tambah Aset</strong>
                    <a href="/admin/aset" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                </div>
                <div class="card-body">
                    <form action="/admin/aset/tambah" method="post" enctype="multipart/form-data">
                        @csrf
                    <div class="row">
                        <div class="col-md-6 border border-primary shadow" style="border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 255, 0.3);">
                        
                        <strong>Informasi</strong>
                            <hr style="border-color: purple;border:2px">
                            <div class="form-group">
                                    <label for="judul" class="col-sm-4 col-form-label">Nama aset</label>
                                    <input type="text" name="judul" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="judul" class="col-sm-4 col-form-label">Kode aset</label>
                                    <input type="text" name="kodeaset" class="form-control" required>

                                </div>
                                <div class="form-group">
                                    <label for="judul" class="col-sm-4 col-form-label">Merk</label>
                                    <?php 
                                    $merk = [
                                        ['id' => '1', 'nama' => 'Elektronik'],
                                        ['id' => '2', 'nama' => 'Furniter'],
                                        ['id' => '3', 'nama' => 'Kendaraan'],
                                    ];
                                    ?>
                                    <select name="merk" class="form-control" required>
                                        <option value="">Pilih Merk</option>
                                        @foreach ($merk as $index => $item)
                                            <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                        @endforeach
                                    </select>
                                </div> 
                            </div>

                        <div class="col-md-5 border border-primary shadow" style="margin-left:20px;border-radius: 10px; box-shadow: 0px 0px 10px rgba(0, 0, 255, 0.3);">
                            <h5>Foto</h5>

                            <hr style="border-color: purple;border:2px">
                        <div class="col-md-6">
                                <img id="preview-image" src="/images/aset/laptop.jpg" alt="Placeholder" class="img-thumbnail" style="max-height: 500px;">
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewFile(this)">
                                        <label class="custom-file-label" for="gambar">Pilih Gambar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<br>
                        <button class="btn btn-primary">Tambah</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
