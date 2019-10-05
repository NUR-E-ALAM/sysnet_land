<?php $this->load->view("admin/partials/admin_header");?>
    <!-- [ Header ] end -->

    <!-- [ Main Content ] start -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="pcoded-inner-content">
                    <!-- [ breadcrumb ] start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-md-12">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">Edit Company Elements</h5>
                                    </div>
                                    <?php if (validation_errors()) : ?>
<p><?php echo validation_errors(); ?></p>
<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- [ breadcrumb ] end -->
                     <!-- [ breadcrumb ] end -->
                     <div class="main-body">
                        <div class="page-wrapper">
                            <!-- [ Main Content ] start -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                       
                                        <div class="card-body">
                                          
                                          
                                                <?php echo form_open('Footer/edit_company/'.$company->id); ?>


                                                <div class="row">
                                                
                                                <div class="col-md-6">
                                            
                
                                <div class="form-group">
                              
                                                            <label for="company_name">Company Name</label>
    <input type="text" name="company_name" class="form-control" id="company_name" placeholder="Company Name" value="<?php echo $company->company_name; ?>">
        </div>
                                                        <div class="form-group">
                                                            <label for="company_address">Company Address</label>
       
        <input type="text" name="company_address" class="form-control" id="company_address" placeholder="Company Address" value="<?php echo $company->company_address; ?>">
        </div>
        </div>

        <div class="col-md-6">
                    <div class="form-group">
                                                            <label for="company_email">Company Email</label>
     
        <input type="text" name="company_email" class="form-control" id="company_email" placeholder="Company Email" value="<?php echo $company->company_email; ?>">
        </div>
        <div class="form-group">
                                                            <label for="company_phone">Company Phone</label>
                                                            <input type="text" name="company_phone" class="form-control" id="company_phone" placeholder="Company Phone" value="<?php echo $company->company_phone; ?>">
        
        </div>
                    </div>

                    <div class="col-md-6">
                                    <div class="form-group">
    		<label for="happy" class="col-sm-4 col-md-4 control-label text-right">Are you Active ?</label>
    		
    			
            <div class="input-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-outline-primary btn-sm <?php if($company->status == 1){echo "active";} ?> " data-toggle="happy" data-title="1">YES</a>
    					<a class="btn btn-outline-primary btn-sm <?php if($company->status == 2){echo "active";} ?>" data-toggle="happy"  data-title="2">NO</a>
    				</div>
    				<input type="hidden" name="happy" value="<?php echo $company->status; ?>" id="happy">
    			</div>
    	
    	</div>
                                    </div> 

                                    </div>
                                     
                                     <?php echo form_submit(array('name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-primary mt-3')); ?>
                              
                              <?php echo form_close(); ?> 

               
      
 
                                                </div>
                                              
                                            </div>
                                     
                                         
                                         
                                        
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("admin/partials/admin_footer");?>