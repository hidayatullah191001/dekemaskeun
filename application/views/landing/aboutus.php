<div class="container">
	<section>
		<h1>Tentang Kami</h1><br><br>
		<h2><a id="dekemaskeun">De Kemaskeun</a> adalah sebuah perusahaan yang bergerak di bidang pembuatan kemasan untuk tiap jenis makanan dan minuman.
			Yang membuat <a id="dekemaskeun">De Kemaskeun</a> unik adalah kemasan yang dihasilkan tidak mengandung plastik. Sangat ramah lingkungan bukan? Tunggu apa lagi ayo pesan sekarang!
		</h2>
		<br>
		<h1>Contact Us!</h1>
		<div class="icon">
			<ul>
				<?php foreach ($kontak as $kt) : ?>
					<li><a href="<?=$kt['instagram'] ?>" target="_blank" style="text-decoration: none;"><i class="fab fa-instagram"></i></a></li>
					<li><a target="_blank" href="https://api.whatsapp.com/send?phone=<?=$kt['phone'] ?>&text=Halo, saya ingin memesan kemasan di dikemaskeun."><i class="fab fa-whatsapp"></i></a></li>
					<li><a target="_blank" href="https://mail.google.com/<?=$kt['email'] ?>"><i class="fas fa-envelope"></i></a></li>
				<?php endforeach ?>
			</ul>
		</div>
		<!-- <p style="font-family: 'Lato-Light'; text-align: center;">Email : dekemaskeun@gmail.com</p> -->

	</section>
</div>
</div>