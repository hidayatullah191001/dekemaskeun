<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 textHead"><?=$title ?></h1>
        <div class="d-flex flex-row-reverse mt-3 ">
            <a data-toggle="modal" data-target="#katalogModal" class="btn btn-sm btn warnaSidebar text-white shadow-sm">
               <i class="fas fa-fw fa-plus text-white"></i>Tambah Katalog
           </a>
    </div>
</div>

<?=$this->session->flashdata('message') ?>

<?php if ($count == 0): ?>
    <div class="alert alert-danger">Data katalog tidak ditemukan</div>
<?php else: ?>

<div class="mb-4 mt-3">
    <div class="row">
        <div class="col col-lg">
            <h4><span class="badge badge-dark">Jumlah Katalog : <?=$count ?></span></h4>
        </div>
    </div>
</div>

<!-- Isi Content -->
<div class="row">
    <?php foreach ($katalog as $katalog) : ?>
        <div class="col-6 col-md-6 col-lg-4 mb-4">
            <div class="card shadow">
                <img style="height: 250px; object-fit: cover" src="<?=base_url('assets/img/produk/').$katalog['image'] ?>" class="gambar card-img-top cover" alt="<?=$katalog['image'] ?>">
                <div class="card-body">
                    <h5 class="card-title"><?= $katalog['nama_produk'] ?></h5>
                    <?php foreach ($kategori as $kg) : ?>
                        <?php if ($katalog['kategori_id'] == $kg['id']) : ?>
                            <h6 class="card-title badge badge-primary"><?=$kg['kategori'] ?></h6>
                        <?php endif ?>
                    <?php endforeach ?>

                    <?php foreach ($tipe as $tp) : ?>
                        <?php if ($katalog['tipe'] == $tp['id']) : ?>
                            <h6 class="card-title badge badge-warning text-dark"><?=$tp['tipe'] ?></h6>
                        <?php endif ?>
                    <?php endforeach ?>
                    <p class="card-text">Harga : Rp.<?=$katalog['harga']?>/Pcs</p>
                </div>
                <div class="card-footer d-flex justify-content-end">
                    <a href="<?=base_url('content/edit_katalog/').$katalog['id'] ?>" class="btn btn-primary btn-sm mr-1">Edit</a>
                    <a data-toggle="modal" data-target="#deleteModal<?php echo $katalog['id']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                </div>
            </div>
        </div>
        <?php include 'deletekatalog_modal.php' ?>
    <?php endforeach ?>
</div>
<?=$this->pagination->create_links(); ?>
<!-- Akhir Content -->
<?php endif ?>
</div>
</div>
<!-- End of Main Content-->
    
