<!-- Logout Modal-->
        <div class="modal fade" id="deleteModal<?php echo $pn->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header bg-danger text-white">
                        <h5 class="modal-title" id="exampleModalLabel">Kamu yakin ingin hapus pengumuman <?=$pn->judul ?> ?</h5>
                        <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Pilih "Hapus" jika data benar</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-danger" href="<?=base_url('content/hapus_pengumuman/').$pn->id ?>">Hapus</a>
                    </div>
                </div>
            </div>
        </div>