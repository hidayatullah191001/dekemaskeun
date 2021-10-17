<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 textHead"><?=$title ?></h1>
    </div>
    <?=$this->session->flashdata('message') ?>

    <!-- Isi Content -->

    <!-- DataTales Example -->
    <div class="table-responsive">
        <table class="table table-hover " id="dataTable" width="100%" cellspacing="0">
            <thead class="warnaSidebar text-white">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Status</th>
                    <th>Date Created</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($userr as $us) : ?>
                 <tr>
                     <td><?=$i++ ?></td>
                     <td><?=$us['name'] ?></td>
                     <td><?=$us['email'] ?></td>
                     <td>
                        <?php if ($us['is_active'] == 1 ) {
                            echo "<span class='badge badge-success'>Aktif</span>";
                        }else{
                            echo "<span class='badge badge-danger'>Tidak Aktif</span>";
                        } 
                        ?>
                    </td>
                    <td><?php 
                    date_default_timezone_set('Asia/Jakarta');
                    echo date('d F Y H:i', $us['date_created']); ?> WIB</td>
                    <td>
                        <a href="<?=base_url('admin/manage_edit/').$us['id'] ?>" class="btn btn-circle btn-sm btn-primary"><i class="fas fa-fw fa-edit"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal<?php echo $us['id']; ?>" class="btn btn-circle btn-sm btn-danger"><i class="fas fa-fw fa-trash"></i></a>
                    </td>
                </tr>
                <?php include 'deleteuser_modal.php' ?>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
<!-- Akhir Content -->
</div>
</div>
<!-- End of Main Content-->
