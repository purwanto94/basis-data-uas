<?php  
// include head.php
include ('head.php');
?>
<div class="container" style="margin-top: 20px">
	<h2>Edit Mobil</h2>

	<hr>

	<form action="update-mobil.php" method="post">

	<!-- query dari database -->
	<?php  
	$id = $_GET['id_mobil'];
	$data = mysqli_query($koneksi,"SELECT * FROM mobil WHERE id_mobil='$id'");

	while ($d = mysqli_fetch_array($data)) { ?>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">No Plat</label>
			<div class="col-sm-10">
				<input type="hidden" name="id_mobil" value="<?php echo $d['id_mobil']; ?>">
				<input type="text" name="no_plat" class="form-control" size="4" value="<?php echo $d['no_plat']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Jenis</label>
			<div class="col-sm-10">
				<input type="text" name="jenis" class="form-control" size="4" value="<?php echo $d['jenis']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Merk</label>
			<div class="col-sm-10">
				<input type="text" name="merk" class="form-control" size="4" value="<?php echo $d['merk']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Tahun</label>
			<div class="col-sm-10">
				<input type="text" name="tahun" class="form-control" size="4" value="<?php echo $d['tahun']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Warna</label>
			<div class="col-sm-10">
				<input type="text" name="warna" class="form-control" size="4" value="<?php echo $d['warna']; ?>" required>
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label">Harga</label>
			<div class="col-sm-10">
				<input type="text" name="harga" class="form-control" size="4" value="<?php echo $d['harga']; ?>" required>
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