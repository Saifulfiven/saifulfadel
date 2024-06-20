@extends('admindashboard.layout')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
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
                        <strong>Tambah Barang Masuk</strong>
                        <a href="/admin/barangmasuk" class="btn btn-sm btn-primary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                            
                    <button class="btn btn-primary" onclick="informasibarang()">Informasi Barang</button>
                    <button class="btn btn-primary" onclick="tambahbarang()">Tambah Barang</button>

                    
                    <div id="informasibarang" style="margin-bottom:20px">
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="card border border-primary shadow p-3" style="border: 1px solid; padding: 10px;">
                                <strong>Informasi</strong>
                                <hr style="border-color: purple;border:2px solid">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Kode Barang</label>
                                        <input type="text" name="kodebarang" class="form-control" value="BRG007" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Nama Barang</label>
                                        <input type="text" name="judul" class="form-control" value="Komputer">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Kategori</label>
                                        <?php 
                                        $merk = [
                                            ['id' => '1', 'nama' => 'Elektronik'],
                                            ['id' => '2', 'nama' => 'Furniter'],
                                            ['id' => '3', 'nama' => 'Kendaraan'],
                                        ];
                                        ?>
                                        <select name="merk" class="form-control" required>
                                            @foreach ($merk as $index => $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div> 


                                    <div class="form-group">
                                        <button class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="card border border-primary shadow p-3" style="border: 1px solid; padding: 10px;">
                                <strong>Foto</strong>
                                    <hr style="border-color: purple;border:2px solid">
                                <div class="card-body">
                                    <div class="col-md-12">
                                        <img id="preview-image" src="/images/barang/laptop.jpg" alt="Placeholder" class="img-thumbnail" style="max-height: 500px;">
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewFile(this)">
                                                <label class="custom-file-label" for="gambar">Ganti Gambar</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                    </div>

                    <div id="tambahbarang"  style="display:none;margin-bottom:20px">
                    <div class="row">
                        <div class="col-md-6" >
                            <div class="card border border-primary shadow p-3" style="border: 1px solid; padding: 10px;">
                                Tambah Data Barang

                                <hr style="border-color: purple;border:2px solid">
                                
                                <div class="card-body">
                                <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Nama Barang</label>
                                        <input type="text" name="judul" class="form-control" value="Komputer">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Kategori</label>
                                        <?php 
                                        $merk = [
                                            ['id' => '1', 'nama' => 'Elektronik'],
                                            ['id' => '2', 'nama' => 'Furniter'],
                                            ['id' => '3', 'nama' => 'Kendaraan'],
                                        ];
                                        ?>
                                        <select name="merk" class="form-control" required>
                                            @foreach ($merk as $index => $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div> 

                                    
                                    <div class="form-group">
                                        <img id="preview-image" src="/images/barang/laptop.jpg" alt="Placeholder" class="img-thumbnail" style="max-height: 500px;">
                                    </div>
                                    <div class="form-group">
                                            <label for="gambar" class="col-sm-4 col-form-label">Gambar</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewFile(this)">
                                                <label class="custom-file-label" for="gambar">Simpan Gambar</label>
                                            </div>
                                        </div>


                                    <div class="form-group">
                                        <button class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card border border-primary shadow p-3" style="border: 1px solid; padding: 10px;">
                                Tabel Data Barang
                                <hr style="border-color: purple;border:2px solid">
                                <div class="card-body">
                                    <table class="table table-bordered table-striped"  id="tabel-data">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @for ($i = 0; $i < 10; $i++)
                                            <tr>
                                                <td>Nama Barang {{ $i+1 }}</td>
                                                <td>{{ rand(1, 100) }}</td>
                                            </tr>
                                        @endfor
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                                    </div>

                        
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-md-6">
                            <div class="card border border-primary shadow p-3" style="border: 1px solid; padding: 10px;">
                                    <strong>Pembelian</strong>
                                    <hr style="border-color: purple;border:2px solid">
                                    <div class="card-body">

                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Tanggal Beli</label>
                                        <input type="date" name="kodebarang" class="form-control" value="BRG007" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Toko Distributor</label>
                                        <input type="text" name="judul" class="form-control" value="ND Komputer Jaya">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">No Invoice</label>
                                        <input type="text" name="judul" class="form-control" value="XYZ20022024">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Jumlah</label>
                                        <input type="number" name="judul" class="form-control" value="5">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Harga Satuan</label>
                                        <input type="number" name="judul" class="form-control" value="900.000">
                                    </div>
                                    <div class="form-group">
                                        <label for="judul" class="col-sm-4 col-form-label">Harga Total</label>
                                        Rp.4.500.000
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
                                            @foreach ($merk as $index => $item)
                                                <option value="{{ $item['id'] }}">{{ $item['nama'] }}</option>
                                            @endforeach
                                        </select>
                                    </div> 

                                    <div class="form-group">
                                        <button class="btn btn-primary">Tambah</button>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="card border border-primary shadow p-3" style="border: 1px solid; padding: 10px;">
                                    <strong>Lampiran</strong>
                                    <hr style="border-color: purple;border:2px solid">
                                    <div class="card-body">

                                    <div class="col-md-6">
                                        <img id="preview-image" src="/images/lampiran/dokumen.jpg" alt="Placeholder" class="img-thumbnail" style="max-height: 500px;">
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="gambar" class="col-sm-8 col-form-label">Lampiran</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="gambar" name="gambar" onchange="previewFile(this)">
                                                <label class="custom-file-label" for="gambar">Ganti Gambar</label>
                                            </div>
                                        </div>


                                    <div class="form-group">
                                        <label for="judul" class="col-sm-12 col-form-label">Keterangan Tambahan</label>
                                        <textarea name="deskripsi" class="form-control" style="width:400px" rows="5"></textarea> 
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                
                          
                </div>
            </div>
        </div>
    </div>


<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>

<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });

    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
    }, 2000);

    
    function informasibarang() {
        document.getElementById('tambahbarang').style.display = 'none';
        document.getElementById('informasibarang').style.display = 'block';
    }

    function tambahbarang() {
        document.getElementById('tambahbarang').style.display = 'block';
        document.getElementById('informasibarang').style.display = 'none';
    }
</script>
@endsection

