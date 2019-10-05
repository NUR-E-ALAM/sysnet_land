 <section class="contact py-5" id="contact">
     <div class="container py-xl-5 py-lg-3">
         <h3 class="title-w3 mb-2 text-center text-wh font-weight-bold">Contact <span>Us</span></h3>
         <p class="text-center text-li title-w3 mb-md-5 mb-4">Excepteur sint occaecat cupidatat</p>
         <?php if (validation_errors()) : ?>
         <h3 class="bg-danger">Whoops! There was an error:</h3>
         <p><?php echo validation_errors(); ?></p>
         <?php endif; ?>
         <div class="contact_grid_right pt-4">
             <?php echo form_open('Forntend_user/insert_user'); ?>
             <div class="row contact_left_grid">
                 <div class="col-lg-6 con-left">
                     <div class="form-group">

                         <?php echo form_input(array(
                                'name' => 'user_name', 'id' => 'user_name',
                                'value' => set_value('user_name', ''), 'placeholder' => 'Name', 'class' => 'form-control',
                            )); ?>
                     </div>
                     <div class="form-group">
                         <?php echo form_input(array(
                                'name' => 'user_email', 'id' => 'user_email',
                                'value' => set_value('user_email', ''), 'placeholder' => 'Email', 'class' => 'form-control',
                            )); ?>
                     </div>
                     <div class="form-group">
                         <?php echo form_input(array(
                                'name' => 'user_subject', 'id' => 'user_subject',
                                'value' => set_value('user_subject', ''), 'placeholder' => 'Subject', 'class' => 'form-control',
                            )); ?>
                     </div>
                 </div>
                 <div class="col-lg-6 con-right">
                     <div class="form-group">
                         <textarea id="textarea" name="user_message" placeholder="Message"
                             required=""><?php echo set_value('user_message'); ?></textarea>
                     </div>
                     <button class="form-control btn" type="submit">Submit</button>
                 </div>
             </div>
             <?php echo form_close(); ?>
         </div>
     </div>
 </section>