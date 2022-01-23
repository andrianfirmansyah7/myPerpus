@extends('admin/template')
@section('isi_halaman')
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Manajemen Buku</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/librarian">Home</a></li>
              <li class="breadcrumb-item active">Manajemen Buku</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

      <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('librarian.addBook') }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Kode ISBN</label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Kode ISBN" name="isbn" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Nama Buku
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Nama Buku" name="nama_buku" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Penulis
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Penulis" name="penulis" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Penerbit
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Penerbit" name="penerbit" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Tahun Terbit
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Tahun Terbit" name="tahun_terbit" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Ikhtisar
                  </label>
                  <textarea class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" row="3" style="resize:none" name="ikhtisar" required></textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Jumlah Halaman
                  </label>
                  <input type="number" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Jumlah Halaman" name="jumlah_halaman" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Stok
                  </label>
                  <input type="number" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Stok" name="stok" required>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Genre</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder" name="genre" required>
                    <option value="pengetahuan">Pengetahuan</option>
                    <option value="romance">Romance</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Cover Buku
                  </label>
                  <input type="file" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Email" name="cover_buku" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    File PDF Buku
                  </label>
                  <input type="file" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Email" name="pdf_buku" required>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <input type="submit" class="btn btn-primary" value="Tambah Buku">
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
                <h3 class="card-title">Data Buku</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <a href="#" data-toggle="modal" data-target="#modal-lg" class="btn btn-primary" style="margin-bottom: 8px;margin-top: -5px;"><i class="fas fa-plus"></i> Tambah</a>
                <a href="#" class="btn btn-success" style="margin-bottom: 8px;margin-top: -5px;"><i class="fas fa-table"></i> Cetak Excel</a>
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Cover Buku</th>
                    <th>No ISBN</th>
                    <th>Nama Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $a = 1 ?>
                  @forelse ($data as $dt)
                  <tr>
                    <td>{{ $a++ }}</td>
                    <td><a href="#" data-toggle="modal" data-target="#modal-detail{{ $dt->id }}">{{ $dt->id }}</a></td>
                    <td>{{ $dt->nama_buku }}</td>
                    <td>{{ $dt->penulis }}</td>
                    <td>{{ $dt->penerbit }}</td>
                    <td>
                      <a href="#" class="btn btn-warning" data-toggle="modal" data-target="#modal-edit{{$dt->id}}"><i class="fas fa-pen"></i> Ubah</a> 
                      <a href="#" class="btn btn-danger" data-toggle="modal" data-target="#modal-hapus{{$dt->id}}"><i class="fas fa-trash"></i> Hapus</a>
                    </td>
                  </tr>
        <div class="modal fade" id="modal-edit{{$dt->id}}">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Ubah Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="post" action="{{ route('librarian.editBook',$dt->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">Nama Buku</label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Nama Karyawan" name="nama_buku" value="{{ $dt->nama_buku }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Penulis
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="penulis" name="penulis" value="{{ $dt->penulis }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Penerbit
                  </label>
                  <input type="text" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Email" name="penerbit" value="{{ $dt->penerbit }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Tahun Terbit
                  </label>
                  <input type="number" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" name="tahun_terbit" value="{{ $dt->tahun_terbit }}">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Ikhtisar
                  </label>
                  <textarea class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" row="3" style="resize:none" name="ikhtisar">{{ $dt->ikhtisar }}</textarea>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Jumlah Halaman
                  </label>
                  <input type="number" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Jumlah Halaman" name="jumlah_halaman" value="{{ $dt->jumlah_halaman }}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Stok
                  </label>
                  <input type="number" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Stok" name="stok" value="{{ $dt->stok }}" required>
                </div>
                <div class="form-group">
                  <label for="exampleSelectBorder">Genre</label>
                  <select class="custom-select form-control-border" id="exampleSelectBorder" name="genre" required>
                    <option value="pengetahuan">Pengetahuan</option>
                    <option value="romance">Romance</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    Cover Buku
                  </label>
                  <input type="file" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Email" name="cover_buku">
                </div>
                <div class="form-group">
                  <label for="exampleInputBorderWidth2">
                    File PDF Buku
                  </label>
                  <input type="file" class="form-control form-control-border border-width-2" id="exampleInputBorderWidth2" placeholder="Email" name="pdf_buku">
                </div>

            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
              <input type="submit" class="btn btn-primary" value="Ubah Buku">
            </div>
          </div>
          <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>

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
                  <center>
                  <img src="/buku/cover/{{ $dt->cover_buku }}" alt="">
                  </center>
                </div>
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
                  <p>{{ ucfirst($dt->genre) }}</p>
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