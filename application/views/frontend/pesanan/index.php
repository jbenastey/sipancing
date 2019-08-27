<div class="container">
	<header class="page-header">
		<h1 class="page-title"><?=$pesanan['produk_nama']?></h1>
		<ol class="breadcrumb page-breadcrumb">
			<li><a href="#">Home</a>
			</li>
			<li><a href="#"><?=$pesanan['kategori_nama']?></a>
			</li>
			<li class="active"><?=$pesanan['produk_nama']?></li>
		</ol>
	</header>
	<div class="row">
		<?= form_open('pesan/'.$pesanan['produk_id'] , array('enctype' => 'multipart/form-data')) ?>
		<div class="col-md-5">
			<h4>Gambar</h4>
			<div class="product-page-product-wrap jqzoom-stage">
				<div class="clearfix">
					<a href="<?= base_url('assets/images/produk/' . $pesanan['produk_foto']) ?>" id="jqzoom" data-rel="gal-1">
						<img src="<?= base_url('assets/images/produk/' . $pesanan['produk_foto']) ?>" alt="Image Alternative text" title="Image Title" />
					</a>
				</div>
			</div>
		</div>
		<div class="col-md-7">
			<h4>Detail Pesanan</h4>
			<div class="row" data-gutter="10">
				<div class="col-md-8">
					<div class="box">
						<p class="product-page-desc"><?=$pesanan['produk_deskripsi']?></p>
						<p class="product-page-desc">Stok : <?=$pesanan['produk_stok']?></p>
						<p class="product-page-desc">Harga : Rp.<?=nominal($pesanan['produk_harga'])?></p>
						<input type="hidden" id="harga" value="<?=$pesanan['produk_harga']?>">
						<p class="product-page-desc">Jumlah (pcs) :
							<select name="jumlah" id="jumlah" onchange="showTotal()" required>
								<option disabled selected>- Pilih Jumlah -</option>
								<?php for ($i = 1; $i <= $pesanan['produk_stok']; $i++):?>
									<option value="<?=$i?>"><?=$i?></option>
								<?php endfor;?>
							</select>
						</p>
					</div>
				</div>
				<div class="col-md-4">
					<div class="box-highlight">
						<h4>Total</h4>
						<div id="total"><h3>0</h3></div>
						<button type="submit" class="btn btn-block btn-primary" name="keranjang"><i
								class="fa fa-shopping-cart"></i>Add to cart
						</button>
						<?= form_close() ?>
						<div class="product-page-side-section">
							<h5 class="product-page-side-title">Share This Item</h5>
							<ul class="product-page-share-item">
								<li>
									<a class="fa fa-facebook" href="#"></a>
								</li>
								<li>
									<a class="fa fa-twitter" href="#"></a>
								</li>
								<li>
									<a class="fa fa-pinterest" href="#"></a>
								</li>
								<li>
									<a class="fa fa-instagram" href="#"></a>
								</li>
								<li>
									<a class="fa fa-google-plus" href="#"></a>
								</li>
							</ul>
						</div>
						<div class="product-page-side-section">
							<h5 class="product-page-side-title">Shipping & Returns</h5>
							<p class="product-page-side-text">In the store of your choice in 3-5 working days</p>
							<p class="product-page-side-text">STANDARD 4.95 USD FREE (ORDERS OVER 50 USD) In 2-4 working
								days*</p>
							<p class="product-page-side-text">EXPRESS 9.95 USD In 24-48 hours (working days)*</p>
							<p class="product-page-side-text">* Except remote areas</p>
							<p class="product-page-side-text">You have one month from the shipping confirmation
								email.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="gap"></div>
	<div class="tabbable product-tabs">
		<ul class="nav nav-tabs" id="myTab">
			<li class="active"><a href="#tab-3" data-toggle="tab"><i class="fa fa-star nav-tab-icon"></i>Testimoni</a>
			</li>
		</ul>
		<div class="tab-content">
			<div class="tab-pane fade in active" id="tab-3">
				<div class="row">
					<div class="col-md-4">
						<button type="button" class="btn btn-primary"  data-toggle="modal" data-target="#testimoni">Tulis Testimoni</button>
					</div>
				</div>
				<hr />
				<table id="komentar" style="width: 100%">
					<thead>
					<tr>
						<td class="text-center"></td>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($testimoni as $key=>$value):
					?>
					<tr>
						<td>
							<hr>
							<article class="product-review">
								<div class="product-review-content">
									<p class="product-review-meta">by <?=$value['pengguna_nama']?> on <?=$value['testimoni_date_created']?></p>
									<p class="product-review-body"><?=$value['testimoni_isi']?></p>
								</div>
							</article>
						</td>
					</tr>
					<?php
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
</div>

	<!-- Modal -->
	<div class="modal fade" id="testimoni" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<?= form_open('testimoni/'.$pesanan['produk_id']) ?>
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tulis testimoni anda</h5>
				</div>
				<div class="modal-body">
					<textarea name="isi" class="form-control" id="" cols="30" rows="10"></textarea>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" name="testimoni" class="btn btn-primary">Kirim</button>
				</div>
				<?= form_close()?>
			</div>
		</div>
	</div>
