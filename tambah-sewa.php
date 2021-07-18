<?php 
// include head.php
include('head.php');
?>

<div class="container" style="margin-top: 20px">
	<h2>Tambah Sewa</h2>
	
	<hr>

	<form action="tambah-sewa-aksi.php" method="post">
	<div class="form-group row">
			<label class="col-sm-2 col-form-label">Customer</label>
			<div class="col-sm-10">
				<input type="text" name="pelanggan" class="form-control" size="4" value="" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">No HP</label>
			<div class="col-sm-10">
				<input type="text" name="hp" class="form-control" size="4" value="" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Mobil</label>
			<div class="col-sm-10">
				<select class="form-control" name="id_mobil">
					<?php
						$result = mysqli_query($koneksi,"SELECT * FROM mobil");
						while ($rows = mysqli_fetch_array($result)) {
							echo "<option value=" .$rows['id_mobil']. ">" .$rows['merk']. "</option>";
						}
					?>
				</select>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tgl Pinjam</label>
			<div class="col-sm-10">
				<input type="date" name="tgl_pinjam" class="form-control" size="4" value="" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tgl Kembali</label>
			<div class="col-sm-10">
				<input type="date" name="tgl_kembali" class="form-control" size="4" value="" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">&nbsp;</label>
			<div class="col-sm-10">
				<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN">
			</div>
			
		</div>
	</form>
</div>