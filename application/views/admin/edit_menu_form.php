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
                                        <h5 class="m-b-10">Form Elements</h5>
                                    </div>
                                    <?php if (validation_errors()) : ?>
<h3>Whoops! There was an error:</h3>
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
                                          
                                            <div class="row">
                                                <div class="col-md-6">
                                                <?php echo form_open('Menu/edit_menu/'.$menu->id); ?>
                                                        <div class="form-group">
                                                          
 
  <input type="text" name="menu_name" class="form-control" id="menu_name" placeholder="Menu Name" value="<?php echo $menu->menu_name; ?>">

                                                                  <div class="form-group">
    		<label for="happy" class="col-sm-4 col-md-4 control-label text-right">Are you Active ?</label>
    	
    			<div class="input-group">
    				<div id="radioBtn" class="btn-group">
    					<a class="btn btn-outline-primary btn-sm <?php if($menu->status == 1){echo "active";} ?> " data-toggle="happy" data-title="1">YES</a>
    					<a class="btn btn-outline-primary btn-sm <?php if($menu->status == 2){echo "active";} ?>" data-toggle="happy"  data-title="2">NO</a>
    				</div>
    				<input type="hidden" name="happy" value="<?php echo $menu->status; ?>" id="happy">
    			</div>
    		
    	</div>
                                                        </div>
                                                
        <?php echo form_submit(array('name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary mt-3')); ?>

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