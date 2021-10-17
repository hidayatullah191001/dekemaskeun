	<div class="row justify-content-md-center">
		<div class="col-lg-5 mt-5 mb-5">
			<div class="transparan">
				<div class="p-3">
					<div class="mt-2 text-center">
						<div class="row d-flex align-items-center">
							<div class="col-4">
								<img style="width: 150px;" src="<?=base_url('assets/img/ico-1.png') ?>">
							</div>
							<div class="col">
								<img style="width: 240px;" src="<?=base_url('assets/img/ico-0.png') ?>">
							</div>
						</div>
					</div>
					<div class="card-body">
						<form method="post" action="<?=base_url('auth/register') ?>">
							<div class="form-group">
								<label for="">Nama Lengkap</label>
								<input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" value="<?=set_value('name') ?>">
								<?= form_error('name', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="form-group">
								<label for="">Email address</label>
								<input type="text" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="<?=set_value('email') ?>">
								<?= form_error('email', '<small class="text-danger">', '</small>') ?>
							</div>
							<div class="row">
								<div class="col">
									<div class="form-group">
										<label for="">Password</label>
										<input type="password" class="form-control" id="password1" name="password1">
										<?= form_error('password1', '<small class="text-danger">', '</small>') ?>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<label for="">Ulangi Password</label>
										<input type="password" class="form-control" id="password2" name="password2">
									</div>
								</div>
							</div>

							<div class="form-check mb-4">
								<input type="checkbox" class="form-check-input" id="lihatPass">
								<label class="form-check-label" for="">Lihat Password</label>
							</div>

							<div class="form-group">
								Sudah punya akun? <a href="<?=base_url('auth') ?>">Login</a>
							</div>

							<div class="d-flex flex-row-reverse">
								<button type="submit" class="btn btn-warning">Daftar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>	
	</div>
