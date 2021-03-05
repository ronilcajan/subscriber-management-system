<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>

<body class="mini-sidebar">
    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <section id="wrapper" class="login-register">
        <div class="login-box">
            <div class="white-box">
				<div class="text-center">
					<img class="img-fluid" src="<?= site_url('images/logo.jpg') ?>" width="150" >
				</div>
				<?= view('Myth\Auth\Views\_message_block') ?>
				<form class="form-horizontal form-material" id="loginform" action="<?= route_to('login') ?>" method="post">
					<?= csrf_field() ?>
					<h3 class="box-title text-center m-b-20 m-t-20">Please Login Here</h3>
					
					<div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="login" type="text" required="" value="<?= old('login') ?>" placeholder="<?=lang('Auth.email')?> or Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <input class="form-control" type="password" name="password" id="password-field" required=""  placeholder="<?= lang('Auth.password')?>">
							<span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                    </div>
					<div class="form-group">
                        <div class="col-md-12">
						<?php if ($config->allowRemembering): ?>
                            <div class="checkbox checkbox-primary pull-left p-t-0">
                                <input id="checkbox-signup" type="checkbox" name="remember" <?php if(old('remember')) : ?> checked <?php endif ?>>
                                <label for="checkbox-signup"> <?=lang('Auth.rememberMe')?> </label>
							</div>
						<?php endif; ?>
                            <a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot password?</a> </div>
                    </div>
					<div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
							<button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"><?=lang('Auth.loginAction')?></button>
                        </div>
                    </div>
				</form>

				<form class="form-horizontal" id="recoverform" action="<?= route_to('forgot') ?>" method="POST">
				<?= csrf_field() ?>
					<div class="form-group ">
						<div class="col-xs-12">
							<h4><?=lang('Auth.forgotPassword')?></h4>
							<p class="text-muted"><?=lang('Auth.enterEmailForInstructions')?></p>
						</div>
					</div>
					<div class="form-group ">
						<div class="col-xs-12">
							<input class="form-control" type="email" name="email" required="" placeholder="<?=lang('Auth.emailAddress')?>">
						</div>
					</div>
					<div class="form-group text-center m-t-20">
						<div class="col-xs-12">
							<button class="btn btn-primary btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"><?=lang('Auth.sendInstructions')?></button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>
