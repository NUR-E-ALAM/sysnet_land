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
                                        <h5 class="m-b-10">Company Elements</h5>
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
                                        <?php echo form_open('Footer/insert_company'); ?>
                                            <div class="row">
                                                
                                                <div class="col-md-6">
                                            
                
                                <div class="form-group">
                              
                                                            <label for="company_name">Company Name</label>
        <?php echo form_input(array('name' => 'company_name', 'id' => 'company_name','value' => set_value('company_name', ''), 'placeholder' =>'Company Name', 'class' => 'form-control', )); ?>
        </div>
                                                        <div class="form-group">
                                                            <label for="company_address">Company Address</label>
        <?php echo form_input(array('name' => 'company_address', 'id' => 'company_address','value' => set_value('company_address', ''), 'placeholder' =>'Company Address', 'class' => 'form-control', )); ?>
        </div>
        </div>
                                              
                    <div class="col-md-6">
                    <div class="form-group">
                                                            <label for="company_email">Company Email</label>
        <?php echo form_input(array('name' => 'company_email', 'id' => 'company_email','value' => set_value('company_email', ''), 'placeholder' =>'Company Email', 'class' => 'form-control', )); ?>
        </div>
        <div class="form-group">
                                                            <label for="company_phone">Company Phone</label>
        <?php echo form_input(array('name' => 'company_phone', 'id' => 'company_phone','value' => set_value('company_phone', ''), 'placeholder' =>'Company Phone', 'class' => 'form-control', )); ?>
        </div>
                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
    		<label for="happy" class="col-sm-4 col-md-4 control-label text-right">Are you Active ?</label>
    		
    			<div class="form-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-outline-primary btn-sm notActive" data-toggle="happy" data-title="1">YES</a>
    					<a class="btn btn-outline-primary btn-sm active" data-toggle="happy"  data-title="2">NO</a>
    				</div>
    				<input type="hidden" name="happy" value="2" id="happy">
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
                            <!-- [ Main Content ] end -->
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("admin/partials/admin_footer");?>