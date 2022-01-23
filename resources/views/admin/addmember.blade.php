@extends('admin/template')
@section('isi_halaman')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen Member Perpustakaan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Member Perpustakaan</li>
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Member Perpustakaan</h3>
              </div>
              <div class="card-body">
                <form method="post" action="{{ route('librarian.addMember') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Nama Member</label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Nama Member" name="nama_member">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Alamat Email
                  </label>
                  <input type="email" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    No Telepon
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Nomer Telepon" name="no_hp">
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Jenis Kelamin</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder" name="jenis_kelamin">
                    <option value="laki-laki">Laki-Laki</option>
                    <option value="perempuan">Perempuan</option>
                  </select>
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
                  <textarea class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" row="3" style="resize:none" name="alamat"></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Jenis Membership</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder" name="jenis_membership">
                    <option value="basic">Basic</option>
                    <option value="silver">Silver</option>
                    <option value="gold">Gold</option>
                  </select>
                </div>
                <input type="submit" class="btn btn-primary" value="Tambah Member">

              </div>
            </form>
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