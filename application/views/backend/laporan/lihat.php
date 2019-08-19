<style>
	.laporan-header {
		text-align: center;
	}
</style>
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<div class="row d-print-none">
				<div class="col-6">
					<a href="<?=base_url('admin/laporan')?>" class="btn btn-sm btn-outline-primary"><i class="fa fa-arrow-left"></i></a>
				</div>
				<div class="col-6">
					<button style="float: right" type="button" onclick="window.print()"
							class="btn btn-primary btn-sm"><i class="fa fa-print"></i></button>
				</div>
			</div>
			<br>
			<div>
				<div class="laporan-header"><h3>Toko Aj. Pancing</h3></div>
				<?php
				if ($bulan != null):
				?>
				<div class="laporan-header"><h4>Laporan Bulan <?= $bulan ?> <?= $tahun ?></h4></div>
				<?php
				else:
				?>
					<div class="laporan-header"><h4>Laporan Tanggal <?= date_indo($tanggal) ?> </h4></div>
				<?php
				endif;
				?>
				<table class="table table-bordered">
					<thead>
					<tr>
						<th>No</th>
						<th>Nama Pemesan</th>
						<th>Tanggal Pemesanan</th>
						<th>Total</th>
					</tr>
					</thead>
					<?php
					if ($laporan != null):
						?>
						<tbody>
						<?php
						$total = 0;
						$no = 1;
						foreach ($laporan as $key => $value):
							?>
							<tr>
								<td><?= $no ?></td>
								<td><?= $value['pengguna_nama'] ?></td>
								<td>
									<?php
									$datetime = explode(' ',$value['faktur_date_created']);
									echo date_indo($datetime[0]).' - '. $datetime[1];
									?>
								</td>
								<td>Rp. <?= nominal($value['keranjang_total']) ?></td>
							</tr>
							<?php
							$total = $total + $value['keranjang_total'];
							$no++;
						endforeach;?>
						</tbody>
						<tfoot>
						<tr>
							<td colspan="3">TOTAL</td>
							<td>Rp. <?= nominal($total) ?></td>
						</tr>
						</tfoot>
						<?php
					else:
						?>
						<tr>
							<td colspan="4" class="text-center">Belum ada transaksi</td>
						</tr>
						</tbody>
					<?php
					endif;
					?>
				</table>
			</div>
		</div>
	</div>
</div>
