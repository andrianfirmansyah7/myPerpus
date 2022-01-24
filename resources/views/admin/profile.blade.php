@extends('admin/template')
@section('isi_halaman')
<?php

$dataPoints = array(
  array("label"=>"Hadir", "y"=>50),
  array("label"=>"Tidak Hadir", "y"=>25),
  array("label"=>"Sakit", "y"=>25),
)

?>

<script>
window.onload = function() {


var chart = new CanvasJS.Chart("chartContainer", {
  animationEnabled: true,
  data: [{
    type: "pie",
    yValueFormatString: "#,##0.00\"%\"",
    indexLabel: "{label} ({y})",
    dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
  }]
});
chart.render();

}
</script>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Profile</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Profile</li>
            </ol>
          </div>
        </div>
      </div>
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            @foreach($data as $dt)
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                       src="/dist/img/{{ $dt->foto }}"
                       alt="User profile picture">
                </div>
                <h3 class="profile-username text-center">{{ $dt->nama_karyawan }}</h3>
                <p class="text-muted text-center">{{ ucfirst($dt->jabatan) }}</p>
              </div>
            </div>
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <div class="card-body">
                <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
                <p class="text-muted">{{ $dt->alamat }}</p>
                <hr>
                <strong><i class="fas fa-venus-mars mr-1"></i> Jenis Kelamin</strong>
                <p class="text-muted">{{ $dt->jenis_kelamin }}</p>
                <hr>
              </div>
            </div>
          </div>
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Ubah Password</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">
                    <form class="form-horizontal" method="post" action="/admin/changePassword/{{ $dt->id_akun }}">
                      @csrf
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <p>{{ $dt->nama_karyawan }}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <p>{{ $dt->email }}</p>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputName2" name="password" placeholder="Password Baru">
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName2" class="col-sm-2 col-form-label">Konfirmasi Password Baru</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" id="inputName2" name="Konfirmasi" placeholder="Konfirmasi Password Baru">
                        </div>
                      </div>
                      <div class="form-group row">
                        <div class="offset-sm-2 col-sm-10">
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </div>
                    </form>
                </div>
                        </div>
                      </div>
                      <!-- /.row -->
                    </div>
                    <!-- /.post -->
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
        @endforeach
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
@endsection
