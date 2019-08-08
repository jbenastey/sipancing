<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Masukkan Data Kategori</h4>
			<?php echo form_open('admin/kategori/tambah', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Nama Kategori</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nomorSurat" placeholder="Masukkan Nama Kategori" name="nama" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<a href="<?=base_url('admin/kategori')?>" class="btn btn-outline-primary">Kembali</a>
							<button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
