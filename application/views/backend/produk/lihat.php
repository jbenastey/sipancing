<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Lihat Data Produk</h4>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" readonly value="<?=$produk['produk_nama']?>" id="nomorSurat" placeholder="Masukkan Nama Produk" name="nama" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Kategori</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" readonly value="<?=$produk['kategori_nama']?>" id="nomorSurat" placeholder="Masukkan Nama Produk" name="nama" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Harga</label>
						<div class="col-sm-10">
							<input type="number" readonly class="form-control" id="" value="<?=$produk['produk_harga']?>" placeholder="Masukkan Harga Produk" name="harga" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Deskripsi</label>
						<div class="col-sm-10">
							<textarea  readonly class="form-control" id="" placeholder="Masukkan Deskripsi Produk" name="deskripsi" required autocomplete="off" rows="4"><?=$produk['produk_deskripsi']?></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Foto</label>
						<div class="col-sm-10">
							<img src="<?=base_url('assets/images/produk/'.$produk['produk_foto'])?>" width="70%" alt="Foto"><br>

						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Stok</label>
						<div class="col-sm-10">
							<input type="number" readonly class="form-control" id="" value="<?=$produk['produk_stok']?>" placeholder="Masukkan Stok" name="stok" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Diskon (%)</label>
						<div class="col-sm-10">
							<input type="number" readonly class="form-control" id="" value="<?=$produk['produk_diskon']?>" placeholder="Belum ada diskon" name="stok" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<a href="<?=base_url('admin/produk')?>" class="btn btn-outline-primary">Kembali</a>
							<a href="<?=base_url('admin/produk/ubah/'.$produk['produk_id'])?>" class="btn btn-success"><i class="fa fa-edit"> </i> Ubah</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
