<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Tambah Data Produk</h4>
			<?php echo form_open('admin/produk/ubah/'.$produk['produk_id'], array('class' => 'form forms-sample', 'id' => 'formValidation','enctype' => 'multipart/form-data')) ?>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" value="<?=$produk['produk_nama']?>" id="nomorSurat" placeholder="Masukkan Nama Produk" name="nama" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Kategori</label>
						<div class="col-sm-10">
							<select name="kategori" id="" required class="form-control" >
								<option value="" selected disabled>- Pilih Kategori -</option>
								<?php
								foreach ($kategori as $key=>$value):
									?>
									<option value="<?=$value['kategori_id']?>"
										<?php
										if ($produk['produk_kategori_id'] == $value['kategori_id']) echo 'selected'
										?>
									><?=$value['kategori_nama']?></option>
								<?php
								endforeach;
								?>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Harga</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="" value="<?=$produk['produk_harga']?>" placeholder="Masukkan Harga Produk" name="harga" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Deskripsi</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="" placeholder="Masukkan Deskripsi Produk" name="deskripsi" required autocomplete="off" rows="4"><?=$produk['produk_deskripsi']?></textarea>
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
							<button type="button"  class="btn btn-outline-primary btn-xs" onclick="showInput()">Ganti Foto ?</button>
							<br>
							<div id="ganti-foto" style="display: none">
								<input type="file" class="dropify" name="foto">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Stok</label>
						<div class="col-sm-10">
							<input type="number" class="form-control" id="" value="<?=$produk['produk_stok']?>" placeholder="Masukkan Stok" name="stok" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Diskon (%)</label>
						<div class="col-sm-10">
							<input type="number" max="99" class="form-control" id="" value="<?=$produk['produk_diskon']?>" placeholder="Masukkan Diskon" name="diskon" required autocomplete="off">
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
							<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
