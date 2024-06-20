@extends('admindashboard.layout')

@section('content')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />
<?php
    $data = [
        ['kode_aset' => 'BRG001A','sejak_tanggal' => '2021-01-01', 'kembali_tanggal' => '2021-01-15', 'penanggungjawab' => 'Saiful', 'kondisisebelum' => 'Baik', 'kondisisesudah' => 'Rusak', 'keterangan' => ''],
        ['kode_aset' => 'BRG001B','sejak_tanggal' => '2021-01-10', 'kembali_tanggal' => '2021-01-20', 'penanggungjawab' => 'Arapat', 'kondisisebelum' => 'Buruk', 'kondisisesudah' => 'Lumayan', 'keterangan' => 'Memperbaiki mesin'],
        ['kode_aset' => 'BRG001C','sejak_tanggal' => '2021-02-01', 'kembali_tanggal' => '2021-02-15', 'penanggungjawab' => 'Hairsan', 'kondisisebelum' => 'Lumayan', 'kondisisesudah' => 'Baik', 'keterangan' => ''],
        ['kode_aset' => 'BRG001D','sejak_tanggal' => '2021-02-10', 'kembali_tanggal' => '', 'penanggungjawab' => 'Fandi Ibrahim', 'kondisisebelum' => 'Buruk', 'kondisisesudah' => 'Rusak', 'keterangan' => 'Mengganti bahan'],
        ['kode_aset' => 'BRG001E','sejak_tanggal' => '2021-03-01', 'kembali_tanggal' => '2021-03-15', 'penanggungjawab' => 'Fandi Ibrahim', 'kondisisebelum' => 'Baik', 'kondisisesudah' => 'Lumayan', 'keterangan' => 'Melakukan perbaikan'],
        ['kode_aset' => 'BRG001F','sejak_tanggal' => '2021-03-10', 'kembali_tanggal' => '2021-03-20', 'penanggungjawab' => 'Olivia', 'kondisisebelum' => 'Lumayan', 'kondisisesudah' => 'Baik', 'keterangan' => ''],
        ['kode_aset' => 'BRG001G','sejak_tanggal' => '2021-04-01', 'kembali_tanggal' => '2021-04-15', 'penanggungjawab' => 'Andi Haedar', 'kondisisebelum' => 'Buruk', 'kondisisesudah' => 'Lumayan', 'keterangan' => 'Memperbaiki koneksi'],
        ['kode_aset' => 'BRG001H','sejak_tanggal' => '2021-04-10', 'kembali_tanggal' => '2021-04-20', 'penanggungjawab' => 'Andi Haedar', 'kondisisebelum' => 'Rusak', 'kondisisesudah' => 'Baik', 'keterangan' => ''],
        ['kode_aset' => 'BRG001I','sejak_tanggal' => '2021-05-01', 'kembali_tanggal' => '2021-05-15', 'penanggungjawab' => 'Fandi Ibrahim', 'kondisisebelum' => 'Baik', 'kondisisesudah' => 'Lumayan', 'keterangan' => 'Memperbaiki pengaturan'],
        ['kode_aset' => 'BRG001J','sejak_tanggal' => '2021-05-10', 'kembali_tanggal' => '2021-05-20', 'penanggungjawab' => '', 'kondisisebelum' => 'Lumayan', 'kondisisesudah' => 'Buruk', 'keterangan' => ''],
        ['kode_aset' => 'BRG001K','sejak_tanggal' => '2021-06-01', 'kembali_tanggal' => '2021-06-15', 'penanggungjawab' => 'Faril Syukur', 'kondisisebelum' => 'Rusak', 'kondisisesudah' => 'Baik', 'keterangan' => 'Mengganti baterai'],
        ['kode_aset' => 'BRG001L','sejak_tanggal' => '2021-06-10', 'kembali_tanggal' => '2021-06-20', 'penanggungjawab' => 'Arapat', 'kondisisebelum' => 'Baik', 'kondisisesudah' => '', 'keterangan' => '']
    ];
?>


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

                <div class="row">
                    <div class="col-md-12 mb-3 mt-3" style="text-align: right;">
                        <a href="{{ url()->previous() }}" class="btn btn-primary">Kembali</a>
                    </div>

                    <div class="col-md-5 border border-primary rounded p-4 bg-white" style="box-shadow: 0px 0px 10px rgba(0,0,0,0.2);">
                        <div style="display: flex; justify-content: space-between;">
                            <div>
                                <h4> Data Aset </h4>
                            </div>
                            <div>
                                <a href="/admin/aset/tambah" class="btn btn-primary">Tambah</a>
                            </div>
                        </div>                        

                        <table>
                        <tr style="font-weight: bold"><td> Nama Aset </td><td> : </td><td>  Laptop </td></tr>
                        <tr><td> Kode Aset </td><td> : </td><td>  BRG001</td></tr>
                        <tr><td> Jumlah </td><td> : </td><td>  10</td></tr>
                        <tr><td> Kategori </td><td> : </td><td>  Elektronik</td></tr>

                        </table>
                        <br>
                        
                            <img id="preview-image" src="/images/aset/laptop.jpg" alt="Placeholder" class="img-thumbnail" style="max-height: 500px;">
                        
                        
                        <button type="button" class="btn btn-primary" onclick="toggleContent('representsinger')">Riwayat Inventory</button>
                        
                        <script>
                            function toggleContent(id) {
                                var content = document.getElementById(id);
                                if (content.style.display === 'none') {
                                    content.style.display = 'block';
                                    content.style.opacity = 0;
                                    content.style.transition = 'opacity 0.5s ease-in-out';
                                    setTimeout(function() {
                                        content.style.opacity = 1;
                                    }, 10);
                                } else {
                                    content.style.opacity = 1;
                                    content.style.transition = 'opacity 0.5s ease-in-out';
                                    content.style.opacity = 0;
                                    setTimeout(function() {
                                        content.style.display = 'none';
                                    }, 500);
                                }
                            }
                        </script>
                    </div>
                    
                    <div class="col-md-6 border border-primary rounded p-4 bg-white"  style="box-shadow: 0px 0px 10px rgba(0,0,0,0.2); margin-left: 20px;">
                        <h4> + Riwayat </h4>
                        <form>

                        <div class="form-group">
                                <label for="exampleInputPassword1">Pilih aset</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">BRG001A</option>
                                    <option value="2">BRG001B</option>
                                    <option value="3">BRG001C</option>
                                    <option value="2">BRG001D</option>
                                    <option value="3">BRG001E</option>
                                    <option value="2">BRG001F</option>
                                    <option value="3">BRG001G</option>
                                    <option value="2">BRG001H</option>
                                    <option value="2">BRG001J</option>
                                    <option value="2">BRG001K</option>
                                    <option value="2">BRG001L</option>
                                    
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sejak Tanggal</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Penganggungjawab</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option value="1">Fandi Ibrahim</option>
                                <option value="2">Arapat</option>
                                <option value="3">Hairsan</option>
                                <option value="4">Olivia</option>
                                <option value="5">Andi Haedar</option>
                                <option value="6">Saiful</option>
                                <option value="7">Faril Syukur</option>

                            </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kondisi Sebelum</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">Lumayan</option>
                                    <option value="2">Baik</option>
                                    <option value="3">Rusak</option>
                                    
                                </select>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">Kembali Tanggal</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Kondisi Sesudah</label>
                                <select class="form-control" id="exampleFormControlSelect1">
                                    <option value="1">Lumayan</option>
                                    <option value="2">Baik</option>
                                    <option value="3">Rusak</option>
                                    
                                </select>
                            </div>


                        </form>
                        </div>
                    </div>
                    <div id="representsinger" class="col-md-12 border border-primary rounded p-4 bg-white "
                    style="box-shadow: 0px 0px 10px rgba(0,0,0,0.2);margin-top:20px;margin-left:-10px;display: none; transition: all 0.5s ease-in-out;">
                   <h5>Riwayat Aset</h5>
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0" id="tabel-data">
                        <thead>
                            <tr>
                            <th class="text-secondary">No</th>
                            <th class="text-secondary">Kode</th>
                            <th class="text-secondary">Sejak Tanggal</th>
                                <th class="text-secondary">Kembali Tanggal</th>
                                <th class="text-secondary">Penganggujawab</th>
                                <th class="text-secondary">Kondisi Sebeum</th>
                                <th class="text-secondary">Kondisi Sesudah</th>
                                <th class="text-secondary">Keterangan</th>
                            <th class="text-secondary">Aksi</th>
                            </tr>
                        </thead>
                            <tbody>
                            <?php $no = 1;foreach($data as $d) : ?>
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{$d['kode_aset']}} </td>
                                    <td>{{$d['sejak_tanggal']}} </td>
                                    <td>{{$d['kembali_tanggal']}} </td>
                                    <td>{{$d['penanggungjawab']}} </td>
                                    <td>{{$d['kondisisebelum']}} </td>
                                    <td>{{$d['kondisisesudah']}} </td>
                                    <td>{{$d['keterangan']}} </td>
                                    <td><a href="/admin/riwayatinventory/edit" class="btn btn-primary">Edit</a></td>

                                </tr>
                                
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>

                            </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<!--   Core JS Files   -->
    <script src="{{ asset('assetsadmin/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assetsadmin/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assetsadmin/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assetsadmin/js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

<script>
    $(document).ready(function(){
        $('#tabel-data').DataTable();
    });

    window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
    }, 2000);
</script>
@endsection

