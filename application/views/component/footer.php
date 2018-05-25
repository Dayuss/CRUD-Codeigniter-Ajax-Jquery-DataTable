    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
		<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
		<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		
		<!-- sekarang langsung konfigurasi datatable -->
		<script>	
			var base_url = "http://localhost/CI-Ajax/index.php/barang/"
			$(document).ready(function() {
				var table = 	$('#tblBarang').DataTable( {
							//link source ajax
							"ajax": base_url+"getbarang",
							// kolom dan nama kolom dari database
							"columns": [
									{ "data": "id_barang" },
									{ "data": "kode_barang" },
									{ "data": "nama_barang" },
									{ "data": "kategori" },
									{ "data": "tgl_beli" },
									{ "data": null,
										render: function(data, type, row){
												return '<a href="'+data.id_barang+'" id="btnEdit" class="badge badge-primary">Edit</a> '+
																'<a href="'+data.id_barang+'" id="btnDel" class="badge badge-danger">Hapus</a>'
										} 
									}
							]
					} );

				$("#btnAdd").on("click", function(e){
					e.preventDefault()
					// kostumisasi ketika tombol tambah di tekan
					$("#mTitle").text("Tambah Barang")
					$("#mBarang").modal("show")
					$("#btnsave").text("tambah")
					
					// ketika tombol save di tekan
					$("#btnsave").on("click").click(function (e) {
						e.preventDefault()
						var data = {
							kode_barang : $("#kode_barang").val(),
							nama_barang : $("#nama_barang").val(),
							kategori : $("#kategori").val(),
							tgl_beli : $("#tgl_beli").val()
						}
						// mengirim data ke function store di controller
						$.ajax( {
							url: base_url + "store",
		          type: 'POST',
							dataType: 'json',
		          data: data,
		          success: function (res) {
									$("#mBarang").modal("hide")
									table.ajax.reload();
									if (res.status == 'success')
		              	toastr.success(res.msg, 'Berhasil!')
									else
										toastr.error(res.msg, 'Gagal!')
		          }
		        })
					})
				})

				$('#tblBarang').on('click', 'a#btnEdit', function (e) {
					e.preventDefault()
					// menangkap attribut href yang mempunyai ID
					var id = $(this).attr('href')

					// kostumisasi tombol edit
					$("#mBarang").modal("show")
					$("#mTitle").text("Edit Barang")
					$("#btnsave").text("update")
					
					// memanggil data dengan id
					getbyid(id)

					// ketika button save di tekan
					$("#btnsave").on("click").click(function (e) {
						e.preventDefault()
						// kita menambahkan id disini untuk mengupdate data yang kita inginkan
						var data = {
							id : id,
							kode_barang : $("#kode_barang").val(),
							nama_barang : $("#nama_barang").val(),
							kategori : $("#kategori").val(),
							tgl_beli : $("#tgl_beli").val()
						}

						$.ajax( {
							url: base_url + "update",
		          type: 'POST',
							dataType: 'json',
		          data: data,
		          success: function (res) {
									$("#mBarang").modal("hide")
									table.ajax.reload();
									if (res.status == 'success')
		              	toastr.success(res.msg, 'Berhasil!')
									else
										toastr.error(res.msg, 'Gagal!')
		          }
		        })
					})
				})

			$('#tblBarang').on('click', 'a#btnDel', function (e) {
					e.preventDefault()
					// mengambil ID dari attribut href
					var id = $(this).attr('href')
					// kostumisasi aksi tombol delete ketika di tekan
					$("#mBarang").modal("show")
					$("#mTitle").text("Hapus Barang")
					$("#mBody").html("Anda yakin akan menghapus barang?")
					// kita hilangkan form karena delete tidak memerlukan form
					$("#form").hide()
					$("#btnsave").text("hapus")
					$("#btnsave").on("click").click(function (e) {
						e.preventDefault()
						// disini kita hanya akan mengirim data id untuk menghapus data spesifik
						var data = {
							id : id,
						}

						$.ajax( {
							url: base_url + "destroy",
		          type: 'POST',
							dataType: 'json',
		          data: data,
		          success: function (res) {
									$("#mBarang").modal("hide")
									table.ajax.reload();
									if (res.status == 'success')
		              	toastr.success(res.msg, 'Berhasil!')
									else
										toastr.error(res.msg, 'Gagal!')
		          }
		        })
					})
				})
				$('#mBarang').on('hidden.bs.modal', function () {
					// setiap modal ditutup, value kembali ke default
						id = null
						$("#mBody").html("")
						$("#form").show()
						$("#kode_barang").val("")
						$("#nama_barang").val("")
						$("#kategori").val("")
						$("#tgl_beli").val("")
				})
			})

			// fungsi ini untuk mengambil data barang berdasarkan ID yang spesifik
		function getbyid(id){
			$.ajax({
				url: base_url + "getbarang/" + id,
		    type: "GET",
		    dataType: "json",
		    success: function (res){
					var data = res[0]
					$("#kode_barang").val(data.kode_barang)
					$("#nama_barang").val(data.nama_barang)
					$("#kategori").val(data.kategori)
					$("#tgl_beli").val(data.tgl_beli)
				}
			})
		}
		</script>
  </body>
</html>
