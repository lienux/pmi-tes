<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
    <p class="text-center small">Enter your username & password to login</p>
</div>

<?php if(session()->getFlashdata('msg')):?>
    <div class="alert alert-danger"><?= session()->getFlashdata('msg') ?></div>
<?php endif;?>

<form class="row g-3 needs-validation" action="<?=base_url('authentication/login/do')?>" method="post" novalidate>
    <div class="col-12">
        <label for="email" class="form-label">Email</label>
        <div class="input-group has-validation">
            <span class="input-group-text" id="inputGroupPrepend">@</span>
            <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
            <div class="invalid-feedback">Please enter your email.</div>
        </div>
    </div>

    <div class="col-12">
        <label for="password" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="password" required>
        <div class="invalid-feedback">Please enter your password!</div>
    </div>

    <div class="col-12">
        <div class="form-check">
        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
        <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>
    </div>
    <div class="col-12">
        <button class="btn btn-primary w-100" type="submit">Login</button>
    </div>
    <div class="col-12">
        <p class="small mb-0">Don't have account? <a href="<?=base_url('authentication/register');?>">Create an account</a></p>
    </div>
</form>