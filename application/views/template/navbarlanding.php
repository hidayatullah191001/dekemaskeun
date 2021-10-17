<div id="wrap">
		<nav>
			<div class="logo">
				De Kemaskeun
			</div>
			<div class="logo2">
				E - C a t a l o g u e
			</div>
			<button type="button" class="btn-hamburger" data-action="nav-toggle">
				<span></span>
				<span></span>
				<span></span>
				<span></span>
				<span></span>
			</button>
			<ul class="nav-menu">
				<li class="nav-item"><a href="<?=base_url('landing') ?>">Beranda</a></li>
				<li class="nav-item dropdown">
					<a href="#" data-action="dropdown-toggle">Katalog</a>
					<div class="dropdown-menu">
						<?php foreach ($kategori as $kg): ?>
						<a class="dropdown-item" href="<?=base_url('landing/list_itemdetail/').$kg['id']?>"><?=$kg['kategori'] ?></a>
						<?php endforeach ?>
					</div>
				</li>
				<li class="nav-item"><a href="<?=base_url('landing/about') ?>">Tentang Kami</a></li>
				<li class="nav-item"><a href="https://api.whatsapp.com/send?phone=6282181872936&text=Halo">Pesan Sekarang</a></li>
			</ul>
		</nav>