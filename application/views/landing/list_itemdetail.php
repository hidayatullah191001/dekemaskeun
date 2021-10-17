<div class="container">
	<section>
		<h1>Kemasan <?=$nama_kategori->kategori
		?></h1>
	</section>
	<main class="grid">
		<?php foreach ($katalog as $katalog) : ?>
			<?php if ($id == $katalog['kategori_id']) : ?>

				<article>
					<img src="<?=base_url('assets/img/produk/').$katalog['image'] ?>" alt="">
					<div class="text">
						<h5>Keterangan : </h5>
						<h5>Nama : <?=$katalog['nama_produk'] ?></h5>
						<h5>Harga : <?=$katalog['harga'] ?></h5>
						<?php foreach ($tipe as $tp) : ?>
							<?php if ($katalog['tipe'] == $tp['id']) : ?>
								<h5>Tipe : <?=$tp['tipe'] ?></h5>
							<?php endif ?>
						<?php endforeach ?>
						<h5><?=$katalog['deskripsi'];?></h5>
						<br><br><br>
						<?php foreach ($kontak as $ktk): ?>
						<a target="_blank" href=" https://api.whatsapp.com/send?phone=<?=$ktk['phone']?>&text=Link image : <?=base_url('assets/img/produk/').$katalog['image'] ?> Halo, saya ingin menanyakan produk <?=$katalog['nama_produk'] ?>, Harga : <?=$katalog['harga'] ?>, dengan Tipe : 
							<?php foreach ($tipe as $tp) : ?>
								<?php if ($katalog['tipe'] == $tp['id']) : ?>
									<?=$tp['tipe']?>
								<?php endif ?>
							<?php endforeach ?> apakah masih ada?"><button><i class="fas fa-shopping-cart"></i>   Pesan</button></a>
						<?php endforeach ?>
					</div>
				</article>
			<?php endif ?>
		<?php endforeach ?>
	</main>
</div>
</div>