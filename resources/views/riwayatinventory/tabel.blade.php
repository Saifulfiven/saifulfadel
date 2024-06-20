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
              <h6>Data Riwayat Aset</h6>
              </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0" id="tabel-data">
                  <thead>
                    <tr>
                      <th class="text-secondary">No</th>
                        <th class="text-secondary">nama Aset</th>
                        <th class="text-secondary">Kode</th>
                        <th class="text-secondary">Merk & Type</th>
                      <th class="text-secondary">Aksi</th>
                    </tr>
                  </thead>
                    <tbody>
                    <?php
                    $barang = [
                        ['nama' => 'Kursi Kayu', 'kode' => 'BRG001', 'tipe' => 'Furniture'],
                        ['nama' => 'Meja Belajar', 'kode' => 'BRG002', 'tipe' => 'Furniture'],
                        ['nama' => 'Lemari Pakaian', 'kode' => 'BRG003', 'tipe' => 'Furniture'],
                        ['nama' => 'Sofa', 'kode' => 'BRG004', 'tipe' => 'Furniture'],
                        ['nama' => 'Ranjang', 'kode' => 'BRG005', 'tipe' => 'Furniture'],
                        ['nama' => 'Rak Buku', 'kode' => 'BRG006', 'tipe' => 'Furniture'],
                        ['nama' => 'Komputer', 'kode' => 'BRG007', 'tipe' => 'Elektronik'],
                        ['nama' => 'Monitor', 'kode' => 'BRG008', 'tipe' => 'Elektronik'],
                        ['nama' => 'Keyboard', 'kode' => 'BRG009', 'tipe' => 'Elektronik'],
                        ['nama' => 'Mouse', 'kode' => 'BRG010', 'tipe' => 'Elektronik'],
                        ['nama' => 'Printer', 'kode' => 'BRG011', 'tipe' => 'Elektronik'],
                        ['nama' => 'Scanner', 'kode' => 'BRG012', 'tipe' => 'Elektronik'],
                        ['nama' => 'Speaker', 'kode' => 'BRG013', 'tipe' => 'Elektronik'],
                        ['nama' => 'Headset', 'kode' => 'BRG014', 'tipe' => 'Elektronik'],
                        ['nama' => 'Proyektor', 'kode' => 'BRG015', 'tipe' => 'Elektronik'],
                        ['nama' => 'Kamera', 'kode' => 'BRG016', 'tipe' => 'Elektronik'],
                        ['nama' => 'Lensa Kamera', 'kode' => 'BRG017', 'tipe' => 'Elektronik'],
                        ['nama' => 'Tripod', 'kode' => 'BRG018', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Microphone', 'kode' => 'BRG019', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Lampu', 'kode' => 'BRG020', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Charger', 'kode' => 'BRG021', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Power Bank', 'kode' => 'BRG022', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Flash Disk', 'kode' => 'BRG023', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Hard Disk Eksternal', 'kode' => 'BRG024', 'tipe' => 'Aksesoris'],
                        ['nama' => 'Laptop', 'kode' => 'BRG025', 'tipe' => 'Elektronik'],
                        ['nama' => 'Tablet', 'kode' => 'BRG026', 'tipe' => 'Elektronik'],
                        ['nama' => 'Smartphone', 'kode' => 'BRG027', 'tipe' => 'Elektronik'],
                        ['nama' => 'Smartwatch', 'kode' => 'BRG028', 'tipe' => 'Elektronik'],
                        ['nama' => 'Drone', 'kode' => 'BRG029', 'tipe' => 'Elektronik'],
                        ['nama' => 'VR Headset', 'kode' => 'BRG030', 'tipe' => 'Elektronik']
                    ];
                        ?>

                    @foreach ($barang as $index => $item)
                    <tr>
                        <td>{{ $index+1 }}</td>
                        <td>{{ $item['nama'] }}</td>
                        <td>{{ $item['kode'] }}</td>
                        <td>{{ $item['tipe'] }}</td>
                        <td class="text-center">
                            <a href="{{ url('admin/riwayat-Aset/lihat') }}" class="btn btn-sm btn-primary">Riwayat Aset</a>
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

