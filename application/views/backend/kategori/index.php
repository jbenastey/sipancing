
<div class="col-12">
	<div class="card">
		<div class="card-body">
			<h4 class="card-title">
				Data Kategori
			</h4>
			<div class="table-responsive">
				<table id="order-listing" class="table table-bordered">
					<a href="<?= base_url('admin/kategori/tambah') ?>" class="btn btn-primary btn-sm" style="float: right; margin-left: 5px"><strong>+</strong> Tambah Kategori</a>
					<thead>
					<tr>
						<th style="width: 1%;">No</th>
						<th>Nama Kategori</th>
						<th style="text-align: center"><i class="icon-settings"></i></th>
					</tr>
					</thead>
					<tbody>
					<?php
					foreach ($kategori as $key=>$value):
					?>
					<tr>
						<td><?=$key+1?></td>
						<td><?=$value['kategori_nama']?></td>
						<td>
							<a href="<?=base_url('admin/kategori/ubah/'.$value['kategori_id'])?>" class="badge badge-success"><i class="fa fa-edit"> </i> Ubah</a>
							<a href="<?=base_url('admin/kategori/hapus/'.$value['kategori_id'])?>" onclick="return confirm('Hapus ?')" class="badge badge-danger"><i class="fa fa-trash"> </i> Hapus</a>
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
</div>
