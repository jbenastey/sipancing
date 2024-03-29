<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">Pilih Bulan</h4>
			<?php echo form_open('admin/laporan', array('class' => 'form forms-sample', 'id' => 'formValidation')) ?>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Tahun</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="nomorSurat" value="<?=date('Y')?>" name="tahun" required autocomplete="off">
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label">Bulan</label>
						<div class="col-sm-10">
							<select name="bulan" class="form-control" required>
								<option disabled selected>- Pilih Bulan -</option>
								<option value="01">Januari</option>
								<option value="02">Februari</option>
								<option value="03">Maret</option>
								<option value="04">April</option>
								<option value="05">Mei</option>
								<option value="06">Juni</option>
								<option value="07">Juli</option>
								<option value="08">Agustus</option>
								<option value="09">September</option>
								<option value="10">Oktober</option>
								<option value="11">November</option>
								<option value="12">Desember</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="form-group row">
						<label for="nomorSurat" class="col-sm-2 col-form-label"></label>
						<div class="col-sm-10">
							<a href="<?=base_url('admin')?>" class="btn btn-outline-primary">Kembali</a>
							<button type="submit" class="btn btn-primary" name="lihat">Lihat Laporan</button>
						</div>
					</div>
				</div>
			</div>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
