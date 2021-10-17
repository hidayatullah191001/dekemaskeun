<!-- Tambah Katalog Modal-->

<div class="modal fade" id="katalogModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header warnaSidebar text-white">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Katalog</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=base_url('content/tambah_katalog') ?>" enctype="multipart/form-data">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Nama Produk</label>
                            <input id="nama_produk" type="text" class="form-control" name="nama_produk" placeholder="Masukkan nama produk...">
                            <small class="form-text text-danger"><?= form_error('email'); ?></small>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Deskripsi Produk</label>
                            <textarea id="deskripsi" class="form-control" name="deskripsi" rows="7" placeholder="Masukkan Deskripsi produk..."></textarea>
                            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Kategori</label>
                            <select name="kategori_id" class="form-control" id="kategori_id">
                              <?php foreach ($kategori as $kg) : ?>
                                <option value="<?=$kg['id']?>"><?=$kg['kategori'] ?></option>
                            <?php endforeach ?>
                        </select>
                        <small class="form-text text-danger"><?= form_error('kategori_id'); ?></small>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipe</label>
                        <select name="tipe" class="form-control" id="tipe">
                              <?php foreach ($tipe as $tp) : ?>
                                <option value="<?=$tp['id']?>"><?=$tp['tipe'] ?></option>
                            <?php endforeach ?>
                      </select>
                      <small class="form-text text-danger"><?= form_error('tipe'); ?></small>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Harga</label>
                    <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan harga produk...">
                     <small class="form-text text-danger"><?= form_error('harga'); ?></small>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlFile1">Gambar</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                     <small class="form-text text-danger"><?= form_error('image'); ?></small>
                </div>
            </div>
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