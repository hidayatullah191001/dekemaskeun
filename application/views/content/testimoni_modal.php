<!-- Tambah Katalog Modal-->

<div class="modal fade" id="testimoniModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header warnaSidebar text-white">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Testimoni</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=base_url('content/tambah_testimoni') ?>" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input id="nama_produk" type="text" class="form-control" name="nama" placeholder="Nama orang/perusahan/usaha">
                    <small class="form-text text-danger"><?= form_error('email'); ?></small>
                </div>
                <div class="form-group">
                   <label for="exampleFormControlSelect1">Varian</label>
                   <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <select name="kategori_id" class="form-control" id="kategori_id">
                              <?php foreach ($kategori as $kg) : ?>
                                <option value="<?=$kg['kategori']?>"><?=$kg['kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('kategori_id'); ?></small>
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <select name="tipe" class="form-control" id="tipe">
                          <?php foreach ($tipe as $tp) : ?>
                            <option value="<?=$tp['tipe']?>"><?=$tp['tipe'] ?></option>
                        <?php endforeach ?>
                    </select>
                    <small class="form-text text-danger"><?= form_error('tipe'); ?></small>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">Isi</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" name="text" rows="3"></textarea>
    </div>
    <div class="form-group">
        <label for="exampleFormControlFile1">Gambar</label>
        <input type="file" name="foto" class="form-control-file" id="foto">
        <small class="form-text text-danger"><?= form_error('foto'); ?></small>
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