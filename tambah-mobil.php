<?php 
// include head.php
include('head.php');
?>

<div class="container" style="margin-top: 20px">
	<h2>Tambah Mobil</h2>
	
	<hr>

	<form action="tambah-mobil-aksi.php" method="post">

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">No Plat</label>
			<div class="col-sm-10">
				<input type="text" name="no_plat" class="form-control" size="4" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Jenis</label>
			<div class="col-sm-10">
				<input type="text" name="jenis" class="form-control" size="4" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Merk</label>
			<div class="col-sm-10">
				<input type="text" name="merk" class="form-control" size="4" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tahun</label>
			<div class="col-sm-10">
				<input type="text" name="tahun" class="form-control" size="4" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Warna</label>
			<div class="col-sm-10">
				<input type="text" name="warna" class="form-control" size="4" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Harga</label>
			<div class="col-sm-10">
				<input type="text" name="harga" class="form-control" size="4" required>
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