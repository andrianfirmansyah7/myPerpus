@extends('admin/template')
@section('isi_halaman')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Manajemen Karyawan</a></li>
              <li class="breadcrumb-item">Tambah Karyawan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Karyawan</h3><br>
                <small style="color:grey">Silahkan Masukkan Data Karyawan yang Akan Anda Tambahkan</small>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form method="post" action="{{ route('admin.addEmployee') }}">
                @csrf
                <div class="form-group">
                  <label>Nama Karyawan</label>
                  <input type="text" class="form-control form-control-border border-width-2" placeholder="Nama Karyawan" name="nama_karyawan">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    No Telepon
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Nomer Telepon" name="no_hp">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Alamat Email
                  </label>
                  <input type="email" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Tanggal Lahir
                  </label>
                  <input type="date" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" name="tanggal_lahir">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Alamat
                  </label>
                  <textarea class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" row="3" style="resize:none"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Jabatan</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder" name="jabatan">
                    <option value="staff">Staff</option>
                    <option value="pustakawan">Pustakawan</option>
                    <option value="kurir">Kurir</option>
                  </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Tambah Karyawan">
              </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>  
  </div>


@endsection  