<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 textHead
    mb-4"><?=$title ?></h1>
  </div>


  <div class="row">
    <div class="col-lg">
     <div class="card shadow mb-4">
      <div class="card-header py-2 mt-2">
        <h6 class="mt-0 font-weight-bold text-primary"><a class="mr-3" href="<?=base_url('admin/user_management') ?>"><i class="fas fa-fw fa-arrow-left"></i></a>Kembali ke user management</h6>
      </div>
      <div class="card-body">
        <form method="post" action="">
          <input type="hidden" name="id" value="<?= $edit['id']; ?>">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama </label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="name" name="name" value="<?= $edit['name'];?>" readonly>
              <small class="form-text text-danger"><?= form_error('name'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" id="email" name="email" value="<?= $edit['email'];?>" readonly>
              <small class="form-text text-danger"><?= form_error('email'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Role_id</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" id="role_id" name="role_id" value="<?= $edit['role_id'];?>" readonly>
              <small class="form-text text-danger"><?= form_error('role_id'); ?></small>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2">Status</label>
            <div class="col-sm-10">
              <div class="checkbox">
                <?php if ($edit['is_active'] == 0): ?>
                  <?= form_checkbox('is_active','1',FALSE)."Aktif kan Akun";?>
                <?php endif ?>

                <?php if ($edit['is_active'] == 1): ?>
                  <?= form_checkbox('is_active','1',TRUE)."Aktif kan Akun";?>
                <?php endif ?>
              </div>
              <button type="submit" class="btn btn-primary float-right">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Akhir Content -->
</div>
</div>
<!-- End of Main Content-->
