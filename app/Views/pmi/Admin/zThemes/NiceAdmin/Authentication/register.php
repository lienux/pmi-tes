<div class="pt-4 pb-2">
	<h5 class="card-title text-center pb-0 fs-4">Create an Account</h5>
	<p class="text-center small">Enter your personal details to create account</p>
</div>

<?php if(isset($validation)):?>
    <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
<?php endif;?>

<form class="row g-3 needs-validation" action="<?=base_url('authentication/register/save')?>" method="post" novalidate>
	<div class="col-12">
		<label for="name" class="form-label">Name</label>
		<input type="text" name="name" class="form-control" id="name" required>
		<div class="invalid-feedback">Please, enter your name!</div>
	</div>

	<div class="col-12">
		<label for="email" class="form-label">Email</label>
		<input type="email" name="email" class="form-control" id="email" required>
		<div class="invalid-feedback">Please enter a valid Email adddress!</div>
	</div>

	<div class="col-12">
		<label for="password" class="form-label">Password</label>
		<input type="password" name="password" class="form-control" id="password" required>
		<div class="invalid-feedback">Please enter your password!</div>
	</div>

	<div class="col-12">
		<div class="form-check">
			<input class="form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required>
			<label class="form-check-label" for="acceptTerms">I agree and accept the <a href="#">terms and conditions</a></label>
			<div class="invalid-feedback">You must agree before submitting.</div>
		</div>
	</div>
	<div class="col-12">
		<button class="btn btn-primary w-100" type="submit">Create Account</button>
	</div>
	<div class="col-12">
		<p class="small mb-0">Already have an account? <a href="<?=base_url('login');?>">Log in</a></p>
	</div>
</form>