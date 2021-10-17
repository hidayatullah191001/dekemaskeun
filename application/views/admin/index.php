<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 textHead">Dashboard</h1>
    </div>

    <div class="card shadow mb-3" style="max-width: 540px;">
        <div class="row">
          <div class="col-6 col-md-4">
            <img style="padding:0.5rem" src="<?=base_url('assets/img/profile/') . $user['image'] ?>" class="card-img" alt="...">
        </div>
        <div class="col-6 col-md-8">
            <div class="card-body">
              <h4 class="card-title"><?=$user['name'] ?></h4>
              <p class="card-text"><?=$user['email'] ?></p>
              <p class="card-text"><small class="text-muted">Bergabung sejak <?= date('d F Y', $user['date_created']) ?></small></p>
          </div>
      </div>
  </div>
</div>

<br>
<br>

<!-- Content Row -->
<div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-6 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah User
                        </div>
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?=$dataUser ?></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-user fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Katalog</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$katalog ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-images fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Kategori</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$kategori ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-images fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-6 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Pengumuman</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$pengumuman ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-bullhorn fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Pending Requests Card Example -->
    <div class="col-6 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Jumlah Testimoni</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?=$testimoni ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-fw fa-comments fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->