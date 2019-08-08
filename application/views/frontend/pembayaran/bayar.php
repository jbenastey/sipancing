<div class="container">
	<header class="page-header">
		<h1 class="page-title">Checkout Pesanan</h1>
	</header>
	<div class="row row-col-gap" data-gutter="60">
		<div class="col-md-8">
			<h3 class="widget-title">Info Pesanan</h3>
			<div class="box">
				<table class="table">
					<thead>
					<tr>
						<th style="text-align: center" >Nama</th>
						<th style="text-align: center" >Kategori</th>
						<th style="text-align: center" >Jumlah</th>
						<th style="text-align: center" >Harga</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($pesanan as $key => $value):
						?>
						<tr>
							<td><?= $value['produk_nama'] ?> </td>
							<td><?= $value['kategori_nama'] ?> </td>
							<td><?= $value['pesanan_jumlah'] ?></td>
							<td style="text-align: right"> Rp.<?= nominal($value['pesanan_total']) ?></td>
						</tr>
					<?php
					endforeach;
					?>
					</tbody>
					<tfoot>
					<tr>
						<td colspan="3">Total</td>
						<td style="text-align: right">Rp. <?= nominal($keranjang['keranjang_total']) ?></td>
					</tr>
					</tfoot>
				</table>
			</div>
		</div>
		<div class="col-md-4">
			<h3 class="widget-title">Pembayaran</h3>
			<div class="box">
				<?=form_open('bayar/'.$keranjang['keranjang_id'])?>
				<p>Pilih Jenis Pembayaran</p>
				<input type="radio" name="tipebayar" value="cod" required> Bayar ditempat <br>
				<input type="radio" name="tipebayar" value="bri" required> Transfer Bank BRI <br>
				<input type="radio" name="tipebayar" value="bni" required> Transfer Bank BNI <br>
				<br>
				<button type="submit" class="btn btn-primary" name="selesai">Selesai</button>
				<div class="gap gap-small"></div>
				<?=form_close()?>
			</div>
		</div>
	</div>
</div>
