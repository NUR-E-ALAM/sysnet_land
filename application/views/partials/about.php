 <section class="w3ls-bnrbtm py-5" id="about">
     <div class="container py-xl-5 py-lg-3">
         <h3 class="title-w3 mb-md-5 mb-4 text-center text-bl font-weight-bold">Welcome To Our <span>Land
                 Site</span></h3>
         <?php if ($query_about->num_rows() > 0) : ?>
         <?php foreach ($query_about->result() as $row) : ?>
         <div class="row">
             <div class="col-lg-6 text-center">
                 <img src="<?php echo base_url("admin_assets/images/upload_about/" . $row->images); ?>" alt="about"
                     class="img-fluid" />

             </div>
             <div class="col-lg-6 pr-xl-5 mt-xl-4 mt-lg-0 mt-4">
                 <h3 class="title-sub mb-4"><?php echo $row->about_name; ?></span></h3>
                 <p class="sub-para pt-4 mt-4 border-top"><?php echo $row->about_description; ?> </p>
             </div>
         </div>
         <?php endforeach; ?>
         <?php endif; ?>
     </div>
 </section>