<div class="modal fade" id="lihatModal<?php echo $testi->id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Nama : <?=$testi->nama ?></h5>
                <button class="close text-white" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col">
                        <img style="height: 250px; object-fit: cover" src="<?=base_url('assets/img/testimoni/').$testi->foto ?>" class="gambar card-img-top cover" alt="<?=$testi->foto ?>">
                    </div>
                    <div class="col">
                        Tanggal buat : <?php 
                        date_default_timezone_set('Asia/Jakarta');
                        echo date('d F Y H:i', $testi->tanggal); ?> WIB
                        <br>
                        <br>
                        <p>Varian : <span class="badge badge-warning text-dark"><?=$testi->varian ?></span></p>
                        <textarea class="form-control" rows="4" readonly=""><?=$testi->text ?></textarea>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Selesai</button>
            </div>
        </div>
    </div>
</div>