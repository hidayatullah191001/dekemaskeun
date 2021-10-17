<!-- kategori Modal-->

<div class="modal fade" id="kategoriModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header warnaSidebar text-white">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=base_url('content/tambah_kategori') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlSelect2">List Kategori yang disimpan</label>
                    <select multiple class="form-control" id="exampleFormControlSelect2">
                        <?php foreach ($kategori as $kg) : ?>
                            <option><?=$kg['nama_kategori'] ?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Kategori Baru</label>
                    <input type="text" class="form-control" name="kategori" placeholder="Masukkan kategori baru...">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Gambar</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                     <small class="form-text text-danger"><?= form_error('image'); ?></small>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-success" type="submit">Tambah</button>
            </div>
        </form>
    </div>
</div>
</div>

<!-- End Modal Kategori -->