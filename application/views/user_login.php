 <?php
    $this->load->view('partials/head'); ?>

 <body>
     <!-- header -->
     <?php $this->load->view('partials/header'); ?>
     <!-- //header -->

     <!-- inner banner -->
     <div class="inner-banner-w3ls py-5" id="home">
         <div class="container py-xl-5 py-lg-3">
             <!-- login  -->
             <div class="modal-body my-5 pt-4">
                 <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Login Now</h3>
                 <?php echo form_open('Welcome/login'); ?>
                 <div class="form-group">
                     <label class="col-form-label">Username</label>
                     <?php
                        echo form_input(array('name' => 'email', 'class' => 'form-control', 'placeholder' => 'Email', 'id' => 'email', 'value' => set_value('email', '')));

                        ?>
                 </div>
                 <div class="form-group">
                     <label class="col-form-label">Password</label>
                     <?php
                        echo form_password(array('name' => 'password', 'class' => 'form-control', 'placeholder' => '******', 'id' => 'password', 'value' => set_value('password', '')));
                        ?>
                 </div>
                 <button type="submit" class="btn button-style-w3">Login</button>
                 <div class="row sub-w3l mt-3 mb-5">
                     <div class="col-sm-6 sub-w3layouts_hub">
                         <input type="checkbox" id="brand1" value="">
                         <label for="brand1" class="text-li text-style-w3ls">
                             <span></span>Remember me?</label>
                     </div>
                     <div class="col-sm-6 forgot-w3l text-sm-right">
                         <a href="#" class="text-li text-style-w3ls">Forgot Password?</a>
                     </div>
                 </div>
                 <p class="text-center dont-do text-style-w3ls text-li">Don't have an account?
                     <a href="<?php base_url(); ?>Welcome/registration" class="font-weight-bold text-li">
                         Register Now</a>
                 </p>
                 <?php echo form_close(); ?>
             </div>
             <!-- //login -->
         </div>
     </div>
     <!-- //inner banner -->


     <!-- footer -->
     <?php $this->load->view('partials/footer');
        ?>
     <!-- //footer -->
     <!-- copyright -->
     <?php $this->load->view('partials/copyright'); ?>