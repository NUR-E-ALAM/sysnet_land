 <div class="w3pvtits-services py-5" id="services">
     <div class="container py-xl-5 py-lg-3">
         <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold">We Provide The <span>Best Services</span>
         </h3>
         <p class="text-li text-center title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p>

         <div class="row">
             <?php if ($query_room->num_rows() > 0) : ?>
                 <?php foreach ($query_room->result() as $row) : ?>
                     <div class="col-lg-4 col-sm-6">
                         <div class="w3pvtits-services-grids">

                             <div class="icon-effect-wthree">
                                 <span class="fa fa-home ser-icon"></span>
                                 <!-- <img src="<?php echo base_url("backend_assets/images/room_images/" . $row1->images); ?>"
                                alt="about" class="img-fluid" /> -->
                             </div>

                             <h4 class="text-bl my-4"><?php echo $row->house_name; ?></h4>
                             <p class="text-left"><?php $des = $row->description;
                                                            echo character_limiter($des, 150);
                                                            ?></p>
                             Address: <h6><?php echo $row->address; ?></h6>
                             <a class="service-btn btn mt-xl-5 mt-4" href="<?php echo site_url('Welcome/room/' . $row->id) ?>">Read More<span class="fa fa-long-arrow-right ml-2"></span></a>

                         </div>
                     </div>
                 <?php endforeach; ?>
             <?php endif; ?>
         </div>

     </div>
     <img src="<?php echo base_url(); ?>forntend_assets/images/img.png" alt="services" class="img-fluid img-posi-w3pvt" />
 </div>