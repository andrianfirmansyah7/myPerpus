@extends('admin/template')
@section('isi_halaman')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Approval Membership Online</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Approval Membership Online</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
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
            <form method="post" action="{{ route('admin.addEmployee') }}">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Nama Karyawan</label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Nama Karyawan" name="nama_karyawan">
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
                  <label for="exampleSelectBorder">Jabatan</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder" name="jabatan">
                    <option value="staff">Staff</option>
                    <option value="pustakawan">Pustakawan</option>
                    <option value="kurir">Kurir</option>
                  </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <input type="submit" class="btn btn-primary" value="Tambah Karyawan">
            </div>
          </div>
          <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>

        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Pengajuan Membership Online</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="#" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary" style="margin-bottom: 8px;margin-top: -5px;"><i class="fas fa-plus"></i> Tambah</a>
                <a href="#" class="btn btn-success" style="margin-bottom: 8px;margin-top: -5px;"><i class="fas fa-table"></i> Cetak Excel</a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID Pengajuan</th>
                    <th>Nama Member</th>
                    <th>Jenis Membership</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $a = 1 ?>
                  @forelse ($data as $dt)
                  @foreach ($dati as $di)
                  <?php $email = $di->email ?>
                  @endforeach
                  <tr>
                    <td>{{ $dt->id }}</td>
                    <td>{{ $dt->nama_member }}</td>
                    <td>{{ $dt->pengajuan_membership }}</td>
                    <td>
                      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-detail{{$dt->id}}"><i class="fa fa-info"></i> Detail</a> 
                      <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modal-terima{{$dt->id}}"><i class="fa fa-check"></i> Terima</a> 
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus{{$dt->id}}"><i class="fa fa-times"></i> Tolak</a>
                    </td>
                  </tr>

        <div class="modal fade" id="modal-detail{{$dt->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Pengajuan</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">ID Pengajuan</label>
                  <p>{{ $dt->id }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Nama Member</label>
                  <p>{{ $dt->nama_member }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Jenis Pengajuan
                  </label>
                  <p>{{ $dt->jenis Pengajuan }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Bukti Transfer
                  </label>
                  <p>{{ $dt->bukti_transfer }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Tanggal Pengajuan
                  </label>
                  <p>{{ $dt->tanggal_pengajuan }}</p>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

    <div class="modal fade" id="modal-hapus{{$dt->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-warning">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Anda yakin ingin <b>menolak</b> pengajuan dari {{ $dt->nama_member }}? Menolak pengajuan ini tidak dapat dibatalkan</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
              <a href="/admin/rejectMembership/{{ $dt->id }}" class="btn btn-outline-dark">Yakin</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

    <div class="modal fade" id="modal-hapus{{$dt->id}}">
        <div class="modal-dialog">
          <div class="modal-content bg-warning">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Anda yakin ingin <b>menerima</b> pengajuan dari {{ $dt->nama_member }}? Silahkan cek terlebih dahulu bukti-bukti yang dibutuhkan</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
              <a href="/admin/approveMembership/{{ $dt->id }}" class="btn btn-outline-dark">Yakin</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                  @empty
                  <tr>
                    <td colspan="5"><center>Data Masih Kosong</center></td>
                  </tr>
                  @endforelse
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


@endsection  