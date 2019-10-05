<!DOCTYPE html>
<html lang="en">

<head>

    <base href="<?php echo base_url(); ?>login" />
    <title>Datta Able Free Bootstrap 4 Admin Template</title>
    <!-- HTML5 Shim and Respond.js IE10 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 10]>
		<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Datta Able Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, datta able, datta able bootstrap admin template, free admin theme, free dashboard template" />
    <meta name="author" content="CodedThemes" />

    <!-- Favicon icon -->
    <link rel="icon" href="<?php echo base_url(); ?>admin_assets/images/favicon.ico" type="image/x-icon">
    <!-- fontawesome icon -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/fonts/fontawesome/css/fontawesome-all.min.css">
    <!-- animation css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/plugins/animation/css/animate.min.css">
    <!-- vendor css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>admin_assets/css/style.css">

</head>

<body>
    <div class="auth-wrapper">
        <div class="auth-content">
            <div class="auth-bg">
                <span class="r"></span>
                <span class="r s"></span>
                <span class="r s"></span>
                <span class="r"></span>
            </div>
            <div class="card">
                <div class="card-body text-center">
                    <div class="mb-4">
                        <i class="feather icon-user-plus auth-icon"></i>
                        <?php if (validation_errors()) : ?>
                            <h3>Whoops! There was an error:</h3>
                            <p><?php echo validation_errors(); ?></p>
                        <?php endif; ?>
                    </div>
                    <h3 class="mb-4">Sign up</h3>
                    <?php echo form_open('Signup/registration'); ?>
                    <div class="input-group mb-3">
                        <?php echo form_input(array('name' => 'name', 'class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name', 'type' => 'text', 'value' => set_value('name', ''), 'required|min_length[5]|max_length[20]')); ?>
                    </div>
                    <div class="input-group mb-3">
                        <?php echo form_input(array('name' => 'email', 'class' => 'form-control', 'id' => 'email', 'placeholder' => 'Email', 'type' => 'email', 'value' => set_value('email', ''), 'required|min_length[10]|max_length[50]')); ?>
                    </div>
                    <div class="input-group mb-4">
                        <?php echo form_input(array('name' => 'password1', 'class' => 'form-control', 'id' => 'password1', 'placeholder' => 'Password', 'type' => 'password', 'value' => set_value('password1', ''), 'required|min_length[5]|max_length[9]')); ?>
                    </div>
                    <div class="input-group mb-4">
                        <?php echo form_input(array('name' => 'password2', 'class' => 'form-control', 'id' => 'password2', 'placeholder' => '  Confrim Password', 'type' => 'password', 'required|min_length[5]|max_length[9]')); ?>
                    </div>
                    <div class="form-group text-left">
                        <div class="checkbox checkbox-fill d-inline">
                            <input type="checkbox" name="checkbox-fill-1" id="checkbox-fill-1" checked="">
                            <label for="checkbox-fill-1" class="cr"> Save Details</label>
                        </div>
                    </div>


                    <input type="submit" name="register" class="btn btn-primary shadow-2 mb-4" value="Register Me" />
                    <?php echo form_close(); ?><br />
                    <p class="mb-0 text-muted">Allready have an account?
                        <?php echo anchor('Signup/login', 'Login here'); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js -->
    <script src="<?php echo base_url(); ?>admin_assets/js/vendor-all.min.js"></script>
    <script src="<?php echo base_url(); ?>admin_assets/plugins/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>