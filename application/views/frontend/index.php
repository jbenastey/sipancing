<div class="owl-carousel owl-loaded owl-nav-dots-inner" data-options='{"items":1,"loop":true}'>
	<div class="owl-item">
		<div class="slider-item" style="background-image:url(<?= base_url() ?>assets/frontend/img/sipesan/fishing-background.jpg);">
			<div class="container">
				<div class="slider-item-inner">
					<div class="slider-item-caption-left slider-item-caption-white">
						<h4 class="slider-item-caption-title">Menjual Berbagai Alat Pancing</h4>
						<p class="slider-item-caption-desc">Dengan Harga Terjangkau</p><a
							class="btn btn-lg btn-ghost btn-white" href="#semua" >Belanja Sekarang</a>
					</div>
					<img class="slider-item-img-right" src="<?= base_url() ?>assets/frontend/img/sipesan/fishing-icon.png"
						 alt="Image Alternative text" title="Mancing Yuk" style="top: 60%; width: 56%;"/>
				</div>
			</div>
		</div>
	</div>
	<div class="owl-item">
		<div class="slider-item"
			 style="background-image:url(<?= base_url() ?>assets/frontend/img/concert_2_1200x500.jpg);">
			<div class="container">
				<div class="slider-item-inner">
					<div class="slider-item-caption-right slider-item-caption-white">
						<h4 class="slider-item-caption-title">Tersedia Juga Berbagai Makanan</h4>
						<p class="slider-item-caption-desc">Untuk Berbagai Macam Peliharaan Anda</p><a
							class="btn btn-lg btn-ghost btn-white" href="#semua">Belanja Sekarang</a>
					</div>
					<img class="slider-item-img-left" src="<?= base_url() ?>assets/frontend/img/sipesan/bird-food.png"
						 alt="Image Alternative text" title="Makanan Burung"
						 style="transform:translateY(-50%) rotate(14deg); "/>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="gap"></div>
<div class="container" id="semua">
	<h3 class="widget-title-lg">Best Seller</h3>
	<div class="row" data-gutter="15">
		<?php
		foreach ($best_seller as $key=>$value):
		?>
		<div class="col-md-3">
			<div class="product ">
				<ul class="product-labels"></ul>
				<div class="product-img-wrap">
					<img class="product-img-primary" src="<?=base_url('assets/images/produk/'.$value['produk_foto'])?>"
						 alt="Image Alternative text" title="Image Title"/>
					<img class="product-img-alt" src="<?=base_url('assets/images/produk/'.$value['produk_foto'])?>" alt="Image Alternative text"
						 title="Image Title"/>
				</div>
				<a class="product-link" href="<?=base_url('pesan/'.$value['produk_id'])?>"></a>
				<div class="product-caption">
					<h5 class="product-caption-title"><?=$value['produk_nama']?></h5>
					<div class="product-caption-price"><span class="product-caption-price-new">Rp. <?=nominal($value['produk_harga'])?></span>
					</div>
					<ul class="product-caption-feature-list">
						<li><?=$value['kategori_nama']?></li>
					</ul>
				</div>
				<div class="product-caption">
					<ul class="product-caption-feature-list">
						<li>Terjual : <?=$value['jumlah_pesanan']?></li>
					</ul>
				</div>
			</div>
		</div>
		<?php
		if ($key == 3){
			break;
		}
		endforeach;
		?>
	</div>
</div>

<div class="gap"></div>
<div class="container" id="semua">
	<h3 class="widget-title-lg">Semua Kategori</h3>
	<div class="row" data-gutter="15">
		<?php
		foreach ($produk as $key=>$value):
		?>
		<div class="col-md-3">
			<div class="product ">
				<ul class="product-labels"></ul>
				<div class="product-img-wrap">
					<img class="product-img-primary" src="<?=base_url('assets/images/produk/'.$value['produk_foto'])?>"
						 alt="Image Alternative text" title="Image Title"/>
					<img class="product-img-alt" src="<?=base_url('assets/images/produk/'.$value['produk_foto'])?>" alt="Image Alternative text"
						 title="Image Title"/>
				</div>
				<a class="product-link" href="<?=base_url('pesan/'.$value['produk_id'])?>"></a>
				<div class="product-caption">
					<h5 class="product-caption-title"><?=$value['produk_nama']?></h5>
					<div class="product-caption-price"><span class="product-caption-price-new">Rp. <?=nominal($value['produk_harga'])?></span>
					</div>
					<ul class="product-caption-feature-list">
						<li><?=$value['kategori_nama']?></li>
					</ul>
				</div>
			</div>
		</div>
		<?php
		endforeach;
		?>
	</div>
</div>
