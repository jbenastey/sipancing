<?php
if ($keranjang == !null):
	?>
	<div class="container">
		<header class="page-header">
			<h1 class="page-title">Keranjang</h1>
		</header>
		<div class="row">
			<div class="col-md-10">
				<table class="table table-bordered table-shopping-cart">
					<thead>
					<tr>
						<th style="text-align: center" width="15%">Foto</th>
						<th style="text-align: center" >Nama</th>
						<th style="text-align: center" >Kategori</th>
						<th style="text-align: center" >Jumlah</th>
						<th style="text-align: center" >Total</th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($pesanan as $key => $value):
						?>
						<tr>
							<td><img src="<?= base_url('assets/images/produk/') . $value['produk_foto'] ?>" alt="foto"
									 style="width: 100%"></td>
							<td><?= $value['produk_nama'] ?> </td>
							<td><?= $value['kategori_nama'] ?> </td>
							<td><?= $value['pesanan_jumlah'] ?></td>
							<td style="text-align: right"> Rp.<?= nominal($value['pesanan_total']) ?></td>
						</tr>
					<?php
					endforeach;
					?>
					</tbody>
				</table>
				<div class="gap gap-small"></div>
			</div>
			<div class="col-md-2">
				<h4>Total</h4>
				<h3>Rp. <?= nominal($keranjang['keranjang_total']) ?></h3>
				<a class="btn btn-primary" href="<?= base_url('bayar/' . $keranjang['keranjang_id']) ?>">Bayar</a>
			</div>
		</div>
	</div>
<?php
else:
	?>
	<div class="container">
		<div class="text-center"><i class="fa fa-cart-arrow-down empty-cart-icon"></i>
			<p class="lead">Keranjang Kamu Kosong</p><a class="btn btn-primary btn-lg" href="<?= base_url() ?>">Pesan
				Sekarang <i class="fa fa-long-arrow-right"></i></a>
		</div>
	</div>
<?php
endif;
?>
