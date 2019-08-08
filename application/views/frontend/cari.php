<div class="gap"></div>
<div class="container" id="semua">
	<h3 class="widget-title-lg"><?= $kategori ?></h3>
	<div class="row" data-gutter="15">
		<?php
		if ($produk != null):
			?>
			<?php
			foreach ($produk as $key => $value):
				?>
				<div class="col-md-3">
					<div class="product ">
						<ul class="product-labels"></ul>
						<div class="product-img-wrap">
							<img class="product-img-primary"
								 src="<?= base_url('assets/images/produk/' . $value['produk_foto']) ?>"
								 alt="Image Alternative text" title="Image Title"/>
							<img class="product-img-alt"
								 src="<?= base_url('assets/images/produk/' . $value['produk_foto']) ?>"
								 alt="Image Alternative text"
								 title="Image Title"/>
						</div>
						<a class="product-link" href="<?= base_url('pesan/' . $value['produk_id']) ?>"></a>
						<div class="product-caption">
							<h5 class="product-caption-title"><?= $value['produk_nama'] ?></h5>
							<div class="product-caption-price"><span
									class="product-caption-price-new">Rp. <?= nominal($value['produk_harga']) ?></span>
							</div>
							<ul class="product-caption-feature-list">
								<li><?= $value['kategori_nama'] ?></li>
							</ul>
						</div>
					</div>
				</div>
			<?php
			endforeach;
			?>
		<?php
		else:
			?>
			<div class="alert-danger" style="float: left">
				<i class="fa fa-warning"></i> Produk Habis
			</div>
		<?php
		endif;
		?>
	</div>
</div>
