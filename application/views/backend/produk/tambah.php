<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Tambah Data Produk</h4>
			<?php echo form_open('admin/produk/tambah', array('class' => 'form forms-sample', 'id' => 'formValidation','enctype' => 'multipart/form-data')) ?>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Nama</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nomorSurat" placeholder="Masukkan Nama Produk" name="nama" required autocomplete="off">
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
								<option value="<?=$value['kategori_id']?>"><?=$value['kategori_nama']?></option>
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
							<input type="number" class="form-control" id="" placeholder="Masukkan Harga Produk" name="harga" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Deskripsi</label>
						<div class="col-sm-10">
							<textarea class="form-control" id="" placeholder="Masukkan Deskripsi Produk" name="deskripsi" required autocomplete="off" rows="4"></textarea>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Foto</label>
						<div class="col-sm-10">
							<input type="file" class="dropify" name="foto">
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
