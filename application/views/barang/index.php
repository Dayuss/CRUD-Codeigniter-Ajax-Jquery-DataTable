
	<a href="add" id="btnAdd" class="btn btn-primary btn-sm mt-4 mb-4">Tambah Barang</a>
	<table class="table table-hover" id="tblBarang">
		<thead>
			<tr>
				<th>No</th>
				<th>Kode</th>
				<th>Nama Barang</th>
				<th>Kategori</th>
				<th>Tanggal Beli</th>
				<th>#</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1</td>
				<td>S001</td>
				<td>Monitor LG l300</td>
				<td>Monitor</td>
				<td>27/06/2018</td>
				<td>
					<a href="#" class="badge badge-primary">Edit</a>
					<a href="#" class="badge badge-danger">Hapus</a>
				</td>
			</tr>
		</tbody>
	</table>

<!-- Modal -->
<div class="modal fade" id="mBarang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="mTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" >
				<div id="mBody"></div>
				<div id="form">
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Kode Barang</label>
								<input type="text" class="form-control" id="kode_barang" placeholder="Kode barang">
							</div>
							<div class="form-group">
										<label for="exampleInputEmail1">Nama Barang</label>
										<input type="text" class="form-control" id="nama_barang" placeholder="Nama barang">
							</div>
							<div class="form-group">
										<label for="exampleInputEmail1">Kategori</label>
										<input type="text" class="form-control" id="kategori" placeholder="Kategori">
							</div>
							<div class="form-group">
										<label for="exampleInputEmail1">Tanggal Beli</label>
										<input type="date" class="form-control" id="tgl_beli" placeholder="Tanggal Beli">
							</div>
						</form>

				</div>
			</div>
      <div class="modal-footer">
        <a id="btnsave" class="btn btn-primary">Save changes</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
