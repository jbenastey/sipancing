<style>
	@media print {
		body * {
			visibility: hidden;
		}

		#section-to-print, #section-to-print * {
			visibility: visible;
		}

		#section-to-print {
			position: absolute;
			left: 0;
			top: 0;
		}
	}
</style>
<div class="gap"></div>
<div class="container">
	<div class="row row-col-gap" data-gutter="60">
		<div class="col-md-3">
			<h3 class="widget-title"><?= $this->session->userdata('session_username'); ?></h3>
			<div class="box">
				<a href="<?= base_url('profil') ?>" class="btn btn-default btn-block" style="text-align: left"><i
						class="fa fa-user-circle"></i> Profil</a>
				<a href="#" class="btn btn-primary btn-block" style="text-align: left"><i class="fa fa-list"></i> Data
					Pemesanan</a>
				<a href="<?= base_url('logout') ?>" onclick="return confirm('Logout? ')"
				   class="btn btn-default btn-block" style="text-align: left"><i class="fa fa-sign-out"></i> Logout</a>
			</div>
		</div>
		<div class="col-md-9">
			<h3 class="widget-title"><i class="fa fa-list"></i> Detail Pemesanan</h3>
			<div class="box">
				<button type="button" class="btn btn-primary" style="float: right" onclick="window.print()"><i
						class="fa fa-print"></i></button>
				<div id="section-to-print" style="width: 100%">
					<table>
						<tr>
							<td>Nomor Faktur</td>
							<td> :</td>
							<td>&nbsp;&nbsp;<?= $pesanan['faktur_id'] ?></td>
						</tr>
						<tr>
							<td>Status Pemesanan &nbsp;</td>
							<td> :</td>
							<td>&nbsp;
								<?php if ($pesanan['faktur_status'] == 'belum'): ?>
									<label class="label label-warning">Belum dikonfirmasi</label>
									<a href="<?= base_url('konfirmasi/' . $pesanan['faktur_id'] . '/' . $pesanan['faktur_bank']) ?>"
									   class="label label-primary">Konfirmasi Pembayaran</a>
								<?php elseif ($pesanan['faktur_status'] == 'sudah'): ?>
									<label class="label label-primary">Selesai</label>
								<?php elseif ($pesanan['faktur_status'] == 'tunggu'): ?>
									<label class="label label-primary">Menunggu</label>
								<?php endif; ?>
							</td>
						</tr>
						<tr>
							<td>Nama Pemesan</td>
							<td> :</td>
							<td>&nbsp;
								<?= $this->session->userdata('session_nama') ?>
							</td>
						</tr>
						<tr>
							<td>Nomor HP</td>
							<td> :</td>
							<td>&nbsp;
								<?= $this->session->userdata('session_nomor_hp') ?>
							</td>
						</tr>
						<tr>
							<td>Waktu Pemesanan</td>
							<td> :</td>
							<td>&nbsp;
								<?php
								$tanggal = explode(" ", $pesanan['faktur_date_created']);
								echo $tanggal[1] . ', ' . date_indo($tanggal[0]);
								?>

							</td>
						</tr>
						<tr>
							<td>Metode Pembayaran &nbsp;</td>
							<td> :</td>
							<td>&nbsp;
								<?php
								if ($pesanan['faktur_bank'] == 'cod'):
									?>
									Bayar Ditempat
								<?php
								elseif ($pesanan['faktur_bank'] == 'bri'):
									?>
									Transfer BRI
								<?php
								elseif ($pesanan['faktur_bank'] == 'bni'):
									?>
									Transfer BNI
								<?php
								endif;
								?>
							</td>
						</tr>
					</table>
					<hr>
					<table width="100%">
						<tr>
							<td><b>Status Pembayaran &nbsp; :</b>
								<?php if ($pesanan['faktur_status'] == 'belum'): ?>
									<label class="label label-warning">Belum Lunas</label>
								<?php elseif ($pesanan['faktur_status'] == 'sudah'): ?>
									<label class="label label-success">Lunas</label>
								<?php elseif ($pesanan['faktur_status'] == 'tunggu'): ?>
									<label class="label label-success">Lunas</label>
								<?php endif; ?>
							</td>
							<td style="float: right"><b>Total Pembayaran :
									Rp. <?= nominal($pesanan['keranjang_total']) ?></b></td>
						</tr>
					</table>
					<hr>
					<table class="table">
						<thead>
						<tr>
							<th>Nama</th>
							<th>Kategori</th>
							<th>Jumlah</th>
							<th style="text-align: center">Harga</th>
						</tr>
						</thead>
						<tbody>
						<?php
						foreach ($produk as $key => $value):
							?>
							<tr>
								<td><?= $value['produk_nama'] ?> </td>
								<td><?= $value['kategori_nama'] ?> </td>
								<td><?= $value['pesanan_jumlah'] ?></td>
								<td> Rp. <?= nominal($value['pesanan_total']) ?></td>
							</tr>
						<?php
						endforeach;
						?>
						</tbody>
						<tfoot>
						<tr>
							<td colspan="3">Total</td>
							<td>Rp. <?= nominal($pesanan['keranjang_total']) ?></td>
						</tr>
						</tfoot>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
