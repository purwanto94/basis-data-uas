<?php 
// include head.php
include('head.php');
?>

<div class="container" style="margin-top: 20px">
	<h2>Tambah Admin</h2>
	
	<hr>

	<form action="tambah-admin-aksi.php" method="post">

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="text" name="nama_admin" class="form-control" size="4" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" size="4" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" name="email" class="form-control" size="4" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" size="4" required>
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