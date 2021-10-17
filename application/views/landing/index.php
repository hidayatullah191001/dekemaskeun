	<div class="container">
		<section>
			<img class="profil" src="<?=base_url('assetslanding/') ?>logo/kemaskeun.png" alt="">
			<h2><a id="dekemaskeun">De Kemaskeun</a> adalah sebuah perusahaan yang bergerak di bidang pembuatan kemasan untuk tiap jenis makanan dan minuman.
				Yang membuat <a id="dekemaskeun">De Kemaskeun</a> unik adalah kemasan yang dihasilkan tidak mengandung plastik. Sangat ramah lingkungan bukan? Tunggu apa lagi ayo pesan sekarang!
			</h2><br><br>
			<h1>Ragam Kemasan</h1>
		</section>

		<main class="grid">
			<?php foreach ($kategori as $kg) : ?>
				<article>
					<img src="<?=base_url('assets/img/kategori/').$kg['image'] ?>" alt="<?=$kg['kategori'] ?>">
					<div class="text">
						<h5><?=$kg['kategori'] ?></h5>
						<a href="<?=base_url('landing/list_itemdetail/').$kg['id'] ?>"><button>Detail</button></a>
					</div>
				</article>
			<?php endforeach ?>
		</main>
		<section>
			<h1>Testimoni Pelanggan</h1><br><br>
			<div class="wrapper">
				<div class="carousel owl-carousel">
					<?php foreach ($testimoni as $testi) : ?>
						<div class="card">
							<img style="height: 250px; object-fit: cover"  src="<?=base_url('assets/img/testimoni/').$testi['foto'] ?>" alt="">	
							<div class="card-body">
								<h3><?=$testi['nama'] ?></h3>
								<br>
								<h4 class="stabilo">Varian : <?=$testi['varian'] ?></h4>
								<br>
								<h4>Pesan : <?=$testi['text'] ?></h4>
								<br>
							</div>
						</div>
					<?php endforeach ?>
				</div>
			</div>
		</section>
	</div>
</div>