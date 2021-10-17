<!-- kategori Modal-->

<div class="modal fade" id="pengumumanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header warnaSidebar text-white">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Pengumuman</h5>
            <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <form method="post" action="<?=base_url('content/tambah_pengumuman') ?>">
                <div class="form-group">
                    <label for="exampleFormControlInput1">Judul Pengumuman</label>
                    <input type="text" class="form-control" name="judul" placeholder="Masukkan judul...">
                </div>
                <div class="form-group">
                    <label for="isi">Isi Pengumuman</label>
                    <textarea class="form-control" id="isi" rows="3" name="isi" placeholder="Masukkan isi pengumuman..."></textarea>
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