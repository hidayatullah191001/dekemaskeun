<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 textHead"><?=$title ?></h1>
    <div class="d-flex flex-row-reverse mt-3 ">
      <a data-toggle="modal" data-target="#testimoniModal" class="btn btn-sm btn warnaSidebar text-white shadow-sm">
        <i class="fas fa-fw fa-plus text-white"></i>Tambah Testimoni
      </a> 
    </div>
  </div>

  <?=$this->session->flashdata('message') ?>
  <?php if ($numrow == 0) : ?>
    <div class="alert alert-danger">Data testimoni tidak ditemukan!</div>
    <?php else :  ?>
      <!-- Isi Content -->
      <div class="row">
        <?php foreach ($testimoni as $testi) :?>
          <div class="col-6 col-md-6 col-lg-4 mb-4">
            <div class="card shadow">
              <img style="height: 250px; object-fit: cover" src="<?=base_url('assets/img/testimoni/').$testi->foto ?>" class="gambar card-img-top cover" alt="<?=$testi->foto ?>">
              <div class="card-body">
                <h5 class="card-title"><?= $testi->nama ?></h5>
                <h6 class="card-title badge badge-warning text-dark"><?=$testi->varian ?></h6>
                <p class="card-text"><?php
                $kalimat = $testi->text;
                $max = 25;
                $cetak = substr($kalimat, 0, $max);
                if (strlen($kalimat)>$max) {
                  echo $cetak.'...';
                }else{
                  echo $cetak;
                }?></p>
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col"><?php 
                  date_default_timezone_set('Asia/Jakarta');
                  echo date('d F Y H:i', $testi->tanggal); ?> WIB
                </div>
                <div class="col d-flex justify-content-end align-items-center">
                  <a data-toggle="modal" data-target="#lihatModal<?php echo $testi->id; ?>" class="btn btn-info btn-sm mr-2">Lihat</a>
                  <a data-toggle="modal" data-target="#deleteTestimoni<?php echo $testi->id; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include "deleteTestimoni_modal.php" ?>
        <?php include "lihatTestimoni_modal.php" ?>
      <?php endforeach ?>
    </div>
    <?=$this->pagination->create_links(); ?>
    <!-- Akhir Content -->
  <?php endif ?>
</div>
</div>
<!-- End of Main Content-->

