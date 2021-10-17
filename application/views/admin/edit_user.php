         <!-- Begin Page Content -->
         <div class="container-fluid">

         	<!-- Page Heading -->
         	<h1 class="h3 mb-4 textHead"><?=$title ?></h1>

<?=$this->session->flashdata('message') ?>
         	<div class="row">
         		<div class="col-sm col-lg-8">
         			<?= form_open_multipart('admin/edit_profile') ?>
         			<div class="form-group row">
         				<label for="email" class="col-sm-2 col-form-label">Email</label>
         				<div class="col-sm-10">
         					<input type="text" class="form-control" id="email" name="email" value="<?= $user['email']?>" readonly>
         				</div>
         			</div>
         			<div class="form-group row">
         				<label for="name" class="col-sm-2 col-form-label">Full name</label>
         				<div class="col-sm-10">
         					<input type="text" class="form-control" id="name" name="name" value="<?= $user['name']?>">
                        <?= form_error('name', '<small class="text-danger">', '</small>') ?>
                     </div>
                  </div>
                  <div class="form-group row">
                    <div class="col-sm-2">Picture</div>
                    <div class="col col-sm-10">
                      <div class="row">
                        <div class="col-5 col-sm-3">
                          <img src="<?= base_url('assets/img/profile/').$user['image'] ?>" class="img-thumbnail">
                       </div>
                       <div class="col col-sm-9 col-sm-9 mt-3">
                          <div class="custom-file">
                           <input type="file" class="tambah-file custom-file-input" name="image" id="image">
                            <label class="custom-file-label" for="file">Choose file</label>
                            <small class="form-text text-danger"><?= form_error('file'); ?></small>
                         </div>
                      </div>
                   </div>
                </div>
             </div>
             <div class="form-group d-flex flex-row-reverse">
                <button class="ml-2 btn btn-primary" type="submit">Edit</button>
                <a class="btn btn-danger" type="submit" href="<?=base_url('admin/hapusGambar/').$user['id'] ?>">Hapus</a>
          </div>
       </form>
    </div>	
 </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

