
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">
				Data Produk
			</h4>
			<div class="table-responsive">
				<table id="order-listing" class="table table-bordered">
					<a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px"><strong>+</strong> Tambah Produk</a>
					<thead>
					<tr>
						<th style="width: 1%;">No</th>
						<th>Nama Produk</th>
						<th>Kategori</th>
						<th>Harga</th>
						<th style="text-align: center"><i class="icon-settings"></i></th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($produk as $key=>$value):
						?>
						<tr>
							<td><?=$key+1?></td>
							<td><?=$value['produk_nama']?></td>
							<td><?=$value['kategori_nama']?></td>
							<td><?=$value['produk_harga']?></td>
							<td><a href="#">Lihat</a></td>
						</tr>
					<?php
					endforeach;
					?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
