<?php  
// include head.php
include ('head.php');
?>
<div class="container" style="margin-top: 20px">
	<h2>Edit Admin</h2>

	<hr>

	<form action="update-admin.php" method="post">

	<!-- query dari database -->
	<?php  
	$id = $_GET['id_admin'];
	$data = mysqli_query($koneksi,"SELECT * FROM admin WHERE id_admin='$id'");

	while ($d = mysqli_fetch_array($data)) { ?>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Nama</label>
			<div class="col-sm-10">
				<input type="hidden" name="id_admin" value="<?php echo $d['id_admin']; ?>">
				<input type="text" name="nama_admin" class="form-control" size="4" value="<?php echo $d['nama_admin']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Username</label>
			<div class="col-sm-10">
				<input type="text" name="username" class="form-control" size="4" value="<?php echo $d['username']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Email</label>
			<div class="col-sm-10">
				<input type="text" name="email" class="form-control" size="4" value="<?php echo $d['email']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Password</label>
			<div class="col-sm-10">
				<input type="password" name="password" class="form-control" size="4" value="<?php echo $d['password']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">&nbsp;</label>
			<div class="col-sm-10">
				<input type="submit" name="submit" class="btn btn-primary" value="SIMPAN" onclick="return confirm('Apakah yakin data sudah benar ?')">
			</div>
			
		</div>
	<?php } ?>
	</form>
	
</div>
<?php include ('footer.php'); ?>