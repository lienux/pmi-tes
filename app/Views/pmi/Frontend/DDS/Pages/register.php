<div class="pt-4 pb-2">
	<h5 class="card-title text-center pb-0 fs-4">Donor Darah Sukarelawan</h5>
	<p class="text-center small">Daftar diri anda sebagai Donor Darah Sukarelawan.</p>
</div>

<?php if(isset($validation)):?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif;?>

<div class="collapse" id="modal_loader_input">
    <div class="d-flex justify-content-center mt-2">
        <div class="spinner-border text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
</div>
<div class="" id="modal_input">
	<form class="row g-3 needs-validation" id="form_input">
		<div class="col-12">
			<label for="nik" class="form-label">NIK</label>
			<input type="text" name="nik" class="form-control" id="nik" required>
			<div class="invalid-feedback">Please, enter your name!</div>
		</div>

		<div class="col-12">
			<label class="form-label">No HP</label>
			<input type="text" name="noHP" class="form-control" id="noHP" required>
			<div class="invalid-feedback">Please enter a valid Email adddress!</div>
		</div>

		<div class="col-12">
			<label for="password" class="form-label">Lokasi Donor</label>
			<select class="form-control" name="lokasi">
				<option value="" selected disabled>Pilih Lokasi</option>
				<option value="jkt">Jakarta</option>
				<option value="sby">Surabaya</option>
			</select>
		</div>

		<div class="col-12 py-4">
			<!-- <button class="btn btn-primary w-100" type="submit">Submit</button> -->
			<!-- <a href="#" class="btn btn-primary w-100" onclick="do_create();">Submit</a> -->
			<a href="#" id="btn_submit" class="btn btn-primary">Submit</a>
		</div>
	</form>
</div>

<script>
	base_url = '<?=base_url();?>';
</script>
<script src="<?=base_url();?>/pmi/app/frontend/dds/ajax.js"></script>
<script src="<?=base_url();?>/pmi/app/frontend/dds/help.js"></script>
<script src="<?=base_url();?>/pmi/app/frontend/dds/register.js"></script>