@extends('admindashboard.layout')

@section('content')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />

<div class="container-fluid py-4">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            @if (session('error'))
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif

            <div class="card-header pb-0 position-relative mb-5">
              <h6>Data Barang Masuk</h6>
              <a href="{{ url('admin/barangmasuk/tambah') }}" class="btn btn-success position-absolute end-0 top-0 mt-3 me-3">+ Barang Masuk</a>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tabel-data">
                  <thead>
                    <tr>
                      <th class="text-secondary">No</th>
                        <th class="text-secondary">nama Barang</th>
                        <th class="text-secondary">Jumlah</th>
                        <th class="text-secondary">Kategori</th>
                      <th class="text-secondary">Created at</th>
                      <th class="text-secondary text-center">Aksi</th>
                    </tr>
                  </thead>
                    <tbody>
                    <?php
                    $barang = [
                        ['nama' => 'Kursi Kayu', 'jumlah' => '3', 'tipe' => 'Furniture'],
                        ['nama' => 'Meja Belajar', 'jumlah' => '5', 'tipe' => 'Furniture'],
                        ['nama' => 'Lemari Pakaian', 'jumlah' => '8', 'tipe' => 'Furniture'],
                        ['nama' => 'Sofa', 'jumlah' => '3', 'tipe' => 'Furniture'],
                        ['nama' => 'Ranjang', 'jumlah' => '12', 'tipe' => 'Furniture'],
                        ['nama' => 'Rak Buku', 'jumlah' => '64', 'tipe' => 'Furniture'],
                        ['nama' => 'Komputer', 'jumlah' => '45', 'tipe' => 'Elektronik'],
                        ['nama' => 'Monitor', 'jumlah' => '22', 'tipe' => 'Elektronik'],
                        ['nama' => 'Keyboard', 'jumlah' => '32', 'tipe' => 'Elektronik'],
                        ['nama' => 'Mouse', 'jumlah' => '23', 'tipe' => 'Elektronik'],
                        ['nama' => 'Printer', 'jumlah' => '54', 'tipe' => 'Elektronik'],
                        ['nama' => 'Scanner', 'jumlah' => '43', 'tipe' => 'Elektronik'],
                        ['nama' => 'Speaker', 'jumlah' => '22', 'tipe' => 'Elektronik'],
                        ['nama' => 'Headset', 'jumlah' => '55', 'tipe' => 'Elektronik'],
                        ['nama' => 'Proyektor', 'jumlah' => '34', 'tipe' => 'Elektronik'],
                        ['nama' => 'Kamera', 'jumlah' => '23', 'tipe' => 'Elektronik'],
                        ['nama' => 'Lensa Kamera', 'jumlah' => '23', 'tipe' => 'Elektronik'],
                        ['nama' => 'Tripod', 'jumlah' => '11', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Microphone', 'jumlah' => '32', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Lampu', 'jumlah' => '43', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Charger', 'jumlah' => '5', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Power Bank', 'jumlah' => '6', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Flash Disk', 'jumlah' => '2', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Hard Disk Eksternal', 'jumlah' => 'BRG024', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Laptop', 'jumlah' => '34', 'tipe' => 'Elektronik'],
                        ['nama' => 'Tablet', 'jumlah' => '334', 'tipe' => 'Elektronik'],
                        ['nama' => 'Smartphone', 'jumlah' => '33', 'tipe' => 'Elektronik'],
                        ['nama' => 'Smartwatch', 'jumlah' => '32', 'tipe' => 'Elektronik'],
                        ['nama' => 'Drone', 'jumlah' => '43', 'tipe' => 'Elektronik'],
                        ['nama' => 'VR Headset', 'jumlah' => '23', 'tipe' => 'Elektronik']
                    ];
                        ?>

                    @foreach ($barang as $index => $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['jumlah'] }}</td>
                        <td>{{ $item['tipe'] }}</td>
                        <td>2020-06-03</td>
                        <td class="text-center">
                            <a href="{{ url('admin/barang/ubah/2') }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ url('admin/barang/hapus/2') }}" class="btn btn-sm btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>

      <footer class="footer pt-3  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              <div class="copyright text-center text-sm text-muted text-lg-start">
                © <script>
                  document.write(new Date().getFullYear())
                </script>,
                made with <i class="fa fa-heart"></i> by
                <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
                for a better web.
              </div>
            </div>
            <div class="col-lg-6">
              <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                <li class="nav-item">
                  <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative Tim</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted" target="_blank">About Us</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/blog" class="nav-link text-muted" target="_blank">Blog</a>
                </li>
                <li class="nav-item">
                  <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted" target="_blank">License</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </footer>
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

