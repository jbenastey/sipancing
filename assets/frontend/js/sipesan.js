$(document).ready(function () {
	var root = window.location.origin + '/sipesan/';

	setTimeout(function () {
	$('.hide-it').addClass('fadeOutUpBig')
	},5000);

	$('#komentar').DataTable({
		"lengthChange": false,
		"searching" : false,
		"language": {
			"emptyTable": "Testimoni belum ada . . . "
		}
	});

});

function showTotal() {
	var jumlah = $('#jumlah').val();
	var harga = $('#harga').val();
	var total = jumlah * harga;
	var html = '' +
		'<h3> Rp. '+formatRupiah(total.toString())+'</h3>';
	$('#total').html(html);
}


function showInput() {
	document.getElementById('ganti-foto').style.display = "block";
}

// ------------------------------------------------------------------------------------------
// Fungsi-fungsi
// ------------------------------------------------------------------------------------------

function formatRupiah(angka, prefix){
	var number_string = angka.replace(/[^,\d]/g, '').toString(),
		split   		= number_string.split(','),
		sisa     		= split[0].length % 3,
		rupiah     		= split[0].substr(0, sisa),
		ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

	// tambahkan titik jika yang di input sudah menjadi angka ribuan
	if(ribuan){
		separator = sisa ? '.' : '';
		rupiah += separator + ribuan.join('.');
	}

	rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
	return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}
