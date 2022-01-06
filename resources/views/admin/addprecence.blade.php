@extends('admin/template')
@section('isi_halaman')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Karyawan</li>
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
                <h3 class="card-title">Data Karyawan Perpustakaan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="#" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary" style="margin-bottom: 8px;margin-top: -5px;"><i class="fas fa-plus"></i> Tambah</a>
                <a href="#" class="btn btn-success" style="margin-bottom: 8px;margin-top: -5px;"><i class="fas fa-table"></i> Cetak Excel</a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Jabatan</th>
                    <th>Divisi</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>Fauzi Toldo</td>
                    <td>Pustakawan</td>
                    <td>Perpustakaan</td>
                    <td>
                      <a href="/admin/editKaryawan" class="btn btn-warning"><i class="fas fa-pen"></i> Ubah</a> 
                      <a href="/admin/hapusKaryawan" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Fabio Mahseradjan
                    </td>
                    <td>Kurir</td>
                    <td>Pengiriman</td>
                    <td>
                      <a href="/admin/editKaryawan" class="btn btn-warning"><i class="fas fa-pen"></i> Ubah</a> 
                      <a href="/admin/hapusKaryawan" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
                  </tfoot>
                </table>
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

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Karyawan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Nama Karyawan</label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder=".form-control-border.border-width-2">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Alamat Email
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder=".form-control-border.border-width-2">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                  
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder=".form-control-border.border-width-2">
                </div>
                <div class="form-group">
                  <label for="exampleInputRounded0">Flat <code>.rounded-0</code></label>
                  <input type="text" class="form-control rounded-0" id="exampleInputRounded0" placeholder=".rounded-0">
                </div>
                <h4>Custom Select</h4>
                <div class="form-group">
                  <label for="exampleSelectBorder">Bottom Border only <code>.form-control-border</code></label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder">
                    <option>Value 1</option>
                    <option>Value 2</option>
                    <option>Value 3</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorderWidth2">Bottom Border only <code>.form-control-border.border-width-2</code></label>
                  <select class="custom-select form-control-border border-width-2" id="exampleSelectBorderWidth2">
                    <option>Value 1</option>
                    <option>Value 2</option>
                    <option>Value 3</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleSelectRounded0">Flat <code>.rounded-0</code></label>
                  <select class="custom-select rounded-0" id="exampleSelectRounded0">
                    <option>Value 1</option>
                    <option>Value 2</option>
                    <option>Value 3</option>
                  </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <button type="button" class="btn btn-primary">Tambah Karyawan</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
@endsection  