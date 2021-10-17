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
        <h6 class="mt-0 font-weight-bold text-primary"><a class="mr-3" href="<?=base_url('content/katalog') ?>"><i class="fas fa-fw fa-arrow-left"></i></a>Kembali ke Katalog</h6>
      </div>
      <div class="card-body">

        <form method="post" action="" enctype="multipart/form-data">

          <input hidden="" name="id" value="<?= $katalog['id']; ?>">

          <div class="form-group">
            <label for="exampleFormControlInput1">Nama Produk</label>
            <input id="nama_produk" type="text" value="<?=$katalog['nama_produk'] ?>" class="form-control" name="nama_produk" placeholder="Masukkan nama produk..."  >
            <small class="form-text text-danger"><?= form_error('nama_produk'); ?></small>
          </div>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi Produk</label>
            <textarea id="deskripsi" class="form-control" name="deskripsi" rows="7" placeholder="Masukkan Deskripsi produk..."><?=$katalog['deskripsi'] ?></textarea>
            <small class="form-text text-danger"><?= form_error('deskripsi'); ?></small>
          </div>

          
          <div class="form-group">
            <label for="exampleFormControlSelect1">Kategori</label>
            <select name="kategori_id" class="form-control" id="kategori_id" >
              <?php foreach ($kategori as $rl) :?>
                <?php if ($katalog['kategori_id'] == $rl['id']) { 
                  echo "<option selected value='".$rl['id']."'>".$rl['nama_kategori']."</option>";
                }else{
                  echo "<option value='".$rl['id']."'>".$rl['nama_kategori']."</option>";
                }?>
              <?php endforeach ?>
            </select>
            <small class="form-text text-danger"><?= form_error('kategori_id'); ?></small>
          </div>

          <div class="form-group">
            <label for="exampleFormControlSelect1">Tipe</label>
            <select name="tipe" class="form-control" id="tipe">
              <?php foreach ($tipe as $tp) : ?>
                <?php if ($katalog['tipe'] == $tp['id']) { 
                  echo "<option selected value= '".$tp['id']."'>".$tp['tipe']."</option>";
                }else{
                  echo "<option value= '".$tp['id']."'>".$tp['tipe']."</option>";
                }?>
              <?php endforeach ?>
            </select>
            <small class="form-text text-danger"><?= form_error('tipe'); ?></small>
          </div>

          <div class="form-group">
            <label for="exampleFormControlInput1">Harga</label>
            <input type="text" class="form-control" name="harga" id="harga" placeholder="Masukkan harga produk..." value="<?=$katalog['harga'] ?>">
            <small class="form-text text-danger"><?= form_error('harga'); ?></small>
          </div>

          
          <div class="row">
            <div class="col col-md-4 mb-2">
              <p>Preview Gambar Lama</p>
              <img style="width: 340px; height: 185px; object-fit: cover" src="<?=base_url('assets/img/produk/').$katalog['image'] ?>" alt="..." class="img-thumbnail">
            </div>

            <div class="col-lg-6">

              <div class="form-group">
                <p>File Sekarang</p>
                <input readonly=""type="text" class="form-control" name="oldfile" id="oldfile" value="<?=$katalog['image'] ?>" >
                <small class="form-text text-danger"><?= form_error('image'); ?></small>
              </div>

              <div class="form-group">
                <div class="custom-file">
                  <input type="file" class="tambah-file custom-file-input" name="image" id="image">
                  <label class="custom-file-label" for="file">Choose file</label>
                  <small class="form-text text-danger"><?= form_error('image'); ?></small>
                </div>
              </div>

            </div>
          </div>
          <hr>
          <div class="d-flex flex-row-reverse">
            <button type="submit" class="btn btn-primary">Edit</button>
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
