 <?php
    $this->load->view('partials/head'); ?>

 <body>
     <!-- header -->
     <?php $this->load->view('partials/header'); ?>
     <!-- //header -->
     <!-- inner banner -->
     <div class="inner-banner-w3ls py-5" id="home">
         <div class="container py-xl-5 py-lg-3">
             <!-- register  -->
             <div class="modal-body mt-md-2 mt-5">
                 <h3 class="title-w3 mb-5 text-center text-wh font-weight-bold">Register Now</h3>
                 <?php echo form_open('Welcome/registration'); ?>
                 <div class="form-group">
                     <label class="col-form-label">Username</label>
                     <input type="text" class="form-control" placeholder="Username" name="name" required="">
                 </div>
                 <div class="form-group">
                     <label class="col-form-label">Email</label>
                     <input type="email" class="form-control" placeholder="loremipsum@email.com" name="email"
                         required="">
                 </div>
                 <div class="form-group">
                     <label class="col-form-label">Password</label>
                     <input type="password" class="form-control" placeholder="*****" name="password1" required="">
                 </div>
                 <div class="form-group">
                     <label class="col-form-label">Confirm Password</label>
                     <input type="password" class="form-control" placeholder="*****" name="password2" required="">
                 </div>
                 <div class="sub-w3l my-3">
                     <div class="sub-w3layouts_hub">
                         <input type="checkbox" id="brand1" value="">
                         <label for="brand1" class="text-li text-style-w3ls">
                             <span></span>I Accept to the Terms & Conditions</label>
                     </div>
                 </div>
                 <button type="submit" name="register" class="btn button-style-w3">Register</button>
                 <?php echo form_close(); ?>
             </div>
             <!-- //register -->
         </div>
     </div>
     <!-- //inner banner -->

     <!-- footer -->
     <?php $this->load->view('partials/footer'); ?>
     <!-- //footer -->
     <!-- copyright -->
     <?php $this->load->view('partials/copyright'); ?>