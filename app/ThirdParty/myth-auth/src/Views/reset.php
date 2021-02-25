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
				<form class="form-horizontal form-material" id="loginform" action="<?= route_to('reset-password') ?>" method="post">
					<?= csrf_field() ?>
					<h3 class="box-title m-b-20 text-center"><?=lang('Auth.resetYourPassword')?></h3>
                    <p class="text-muted"><?=lang('Auth.enterCodeEmailPassword')?></p>
					
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="token" type="text" required="" placeholder="<?=lang('Auth.token')?>" value="<?= old('token', $token ?? '') ?>">
                        </div>
                    </div>

                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="email" type="email" required=""  placeholder="<?=lang('Auth.email')?>" value="<?= old('email') ?>">
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="password" type="password" required="" id="password-field1" placeholder="<?=lang('Auth.newPassword')?>" >
                            <span toggle="#password-field1" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                    </div>
                    <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" name="pass_confirm" type="password" id="password-field" required="" placeholder="<?=lang('Auth.newPasswordRepeat')?>">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
                        </div>
                    </div>
					<div class="form-group text-center m-t-20">
                        <div class="col-xs-12">
							<button type="submit" class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light"><?=lang('Auth.resetPassword')?></button>
                        </div>
                    </div>
				</form>
			</div>
		</div>
	</section>
</div>

<?= $this->endSection() ?>
