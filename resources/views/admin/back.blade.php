@extends('admin/template')
@section('isi_halaman')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Peminjaman Buku (Online)</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/librarian">Home</a></li>
              <li class="breadcrumb-item active">Peminjaman Buku (Online)</li>
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
                <h3 class="card-title">Peminjaman Buku (Online)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="#" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary" style="margin-bottom: 8px;margin-top: -5px;"><i class="fas fa-plus"></i> Tambah</a>
                <a href="#" class="btn btn-success" style="margin-bottom: 8px;margin-top: -5px;"><i class="fas fa-table"></i> Cetak Excel</a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID Peminjaman</th>
                    <th>Nama Peminjam</th>
                    <th>Buku Dipinjam</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Tanggal Akhir</th>
                    <th>Status</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $a = 1 ?>
                  @forelse ($data as $dt)
                  <tr>
                    <td><a href="#" data-toggle="modal" data-target="#modal-detail{{ $dt->id }}">{{ $dt->id }}</a></td>
                    <td>{{ $dt->peminjam }}</td>
                    <td>{{ $dt->buku }}</td>
                    <td>{{ $dt->awal_peminjaman }}</td>
                    <td>{{ $dt->akhir_peminjaman }}</td>
                    <td>
                      <a href="/librarian/accept/{{ $dt->id }}" class="btn btn-success" data-toggle="modal" data-target="#modal-hapus{{$dt->id}}"><i class="fas fa-check"></i> Terima</a>
                      <a href="/librarian/decline/{{ $dt->id }}" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus{{$dt->id}}"><i class="fas fa-times"></i> Tidak</a>
                    </td>
                  </tr>

      <div class="modal fade" id="modal-detail{{$dt->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Detail Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Nama Buku</label>
                  <p>{{ $dt->nama_buku }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Penulis
                  </label>
                  <p>{{ $dt->penulis }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Penerbit
                  </label>
                  <p>{{ $dt->penerbit }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Jumlah Halaman
                  </label>
                  <p>{{ $dt->jumlah_halaman }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Ikhtisar</label>
                  <p>{{ $dt->ikhtisar }}</p>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Genre</label>
                  <p>{{ $dt->Genre }}</p>
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
              <p>Anda yakin ingin <b>menghapus</b> {{ $dt->nama_buku }} dari daftar buku? Menghapus data buku ini tidak dapat dibatalkan</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Batal</button>
              <a href="/librarian/deleteBook/{{ $dt->id }}" class="btn btn-outline-dark">Yakin</a>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
                  @empty
                  <tr>
                    <td colspan="6"><center>Data Masih Kosong</center></td>
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
