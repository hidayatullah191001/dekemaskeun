<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 textHead"><?=$title ?></h1>
    <div class="d-flex flex-row-reverse mt-3 ">
      <a data-toggle="modal" data-target="#pengumumanModal" class="btn btn-sm btn warnaSidebar text-white shadow-sm">
       <i class="fas fa-fw fa-plus text-white"></i>Tambah Pengumuman
     </a> 
   </div>
 </div>

 <?=$this->session->flashdata('message') ?>

 

 <?php if ($numrow == 0) : ?>
  <div class="alert alert-danger">Data pengumuman tidak ditemukan!</div>
  <?php else :  ?>
    <!-- Isi Content -->
    <?php foreach ($pengumuman as $pn) : ?>
      <div class="card shadow mb-3">
        <div class="card-header">
          Tanggal buat : <?php 
          date_default_timezone_set('Asia/Jakarta');
          echo date('d F Y H:i', $pn->tanggal); ?> WIB
        </div>
        <div class="card-body">
          <h5 class="card-title text-dark font-weight-bold"><?=$pn->judul?></h5>
          <p class="card-text">
            <?php
            $kalimat = $pn->isi;
            $max = 50;
            $cetak = substr($kalimat, 0, $max);
            if (strlen($kalimat)>$max) {
              echo $cetak.'...';
            }else{
              echo $cetak;
            }?>
          </p>
          <div class="d-flex justify-content-end">
            <a data-toggle="modal" data-target="#lihatModal<?php echo $pn->id; ?>" class="btn btn-info mr-2">Lihat</a>
            <a data-toggle="modal" data-target="#deleteModal<?php echo $pn->id; ?>" class="btn btn-danger">Hapus</a>
          </div>
        </div>
      </div>
      <?php include 'lihatpengumuman_modal.php' ?>
      <?php include 'deletepengumuman_modal.php' ?>
    <?php endforeach ?>

    <?=$this->pagination->create_links(); ?>
    <!-- Akhir Content -->
  <?php endif ?>
  </div>
</div>
<!-- End of Main Content-->

