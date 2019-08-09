<div class="col-12">
	<?php
	if ($this->session->flashdata('alert') == 'login_sukses'):
		?>
		<div class="alert alert-success alert-dismissible animated fadeInDown"
			 style="position: absolute; width: 100%; z-index: 2" id="feedback"
			 role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			Berhasil Login
		</div>
	<?php
	elseif ($this->session->flashdata('alert') == 'sudah_login'):
		?>
		<div class="alert alert-warning alert-dismissible animated fadeInDown"
			 style="position: absolute; width: 100%; z-index: 2" id="feedback"
			 role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
			Sudah Login
		</div>
	<?php
	endif;
	?>
	<div class="row">
		<div class="col-md-6 col-lg-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-md-center">
						<a href="<?=base_url('admin/kategori')?>"><i class="mdi mdi-layers icon-lg text-primary"></i></a>
						<div class="ml-3">
							<p class="mb-0">Jumlah Kategori</p>
							<h6><?=count($kategori)?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-md-center">
						<a href="<?=base_url('admin/produk')?>"><i class="mdi mdi-fish icon-lg text-success"></i></a>
						<div class="ml-3">
							<p class="mb-0">Jumlah Produk</p>
							<h6><?=count($produk)?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-md-center">
						<a href="<?=base_url('admin/pelanggan')?>"><i class="mdi mdi-account-multiple icon-lg text-warning"></i></a>
						<div class="ml-3">
							<p class="mb-0">Jumlah Pelanggan</p>
							<h6>
								<?php
								$jumlah = 0;
								foreach ($pelanggan as $value){
									if ($value['pengguna_level'] == 'pemesan'){
										$jumlah = $jumlah + 1;
									}
								}
								echo $jumlah;
								?>
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6 col-lg-3 grid-margin stretch-card">
			<div class="card">
				<div class="card-body">
					<div class="d-flex align-items-center justify-content-md-center">
						<a href="<?=base_url('admin/transaksi')?>"><i class="mdi mdi-currency-usd icon-lg text-danger"></i></a>
						<div class="ml-3">
							<p class="mb-0">Transaksi Selesai</p>
							<h6><?php
								$jumlah = 0;
								foreach ($transaksi as $value){
									if ($value['faktur_status'] == 'sudah'){
										$jumlah = $jumlah + 1;
									}
								}
								echo $jumlah;
								?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
