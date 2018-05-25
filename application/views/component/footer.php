    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<script>	
		$(document).ready( function () {
			var table = $('#tblBarang').DataTable( {
    ajax: "http://localhost/CI-Ajax/index.php/barang/getbarang",
    columns: [
        { data: 'id_barang' },
        { data: 'kode_barang' },
        { data: 'nama_barang' },
        { data: 'kategori' },
        { data: 'tgl_beli' },
        { data: null }
    ]
} );
		} );
	</script>
  </body>
</html>
