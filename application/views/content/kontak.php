<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 textHead"><?=$title ?></h1>
</div>

<?=$this->session->flashdata('message') ?>

<?php if ($kontak_num == 0): ?>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tambah Kontak</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone : </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="phone" name="phone">
                              <small class="form-text text-danger"><?= form_error('phone'); ?></small>
                          </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email : </label>
                        <div class="col-sm-9">
                          <input class="form-control" type="text" id="email" name="email">
                          <small class="form-text text-danger"><?= form_error('email'); ?></small>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Intagram : </label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" id="instagram" name="instagram" >
                      
                  </div>
              </div>
              <small class="text-danger">Phone : 62856xxxxxxx</small>
              <button type="submit" class="btn btn-primary float-right">Tambah</button>
          </div>
      </div>
  </form>
</div>
</div>
<?php else : ?>
    <div class="row">
        <div class="col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Kontak</h6>
                </div>
                <div class="card-body">
                    <form method="post" action="<?=base_url('content/edit_kontak/').$dataKontak['id'] ?>">
                        <input type="hidden" id="id" name="id" value="<?=$dataKontak['id'] ?>">
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Phone : </label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="phone" name="phone" value="<?=$dataKontak['phone'] ?>">
                              <small class="form-text text-danger"><?= form_error('phone'); ?></small>
                          </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Email : </label>
                        <div class="col-sm-9">
                          <input class="form-control" type="text" id="email" name="email" value="<?=$dataKontak['email'] ?>">
                          <small class="form-text text-danger"><?= form_error('email'); ?></small>
                      </div>
                  </div>

                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Intagram : </label>
                    <div class="col-sm-9">
                      <input class="form-control" type="text" id="instagram" name="instagram" value="<?=$dataKontak['instagram'] ?>">
                      <small class="form-text text-danger"><?= form_error('instagram'); ?></small>
                  </div>
              </div>
              <small class="text-danger">Phone : 62856xxxxxxx</small>
              <button type="submit" class="btn btn-primary float-right">Edit</button>
              <a type="button" class="btn btn-danger float-right mr-2" href="<?=base_url('content/delete_kontak/').$dataKontak['id'] ?>">Hapus</a>
          </div>
      </div>
  </form>
</div>
</div>

<?php endif ?>
<!-- Isi Content -->

<!-- Akhir Content -->
</div>
</div>
<!-- End of Main Content-->

