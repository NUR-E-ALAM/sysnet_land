<?php $this->load->view("admin/partials/admin_header"); ?>
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
                                    <h5 class="m-b-10">Edit Logo Form Elements</h5>
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
                                            <div class="col-md-12">
                                                <?php echo form_open_multipart('Logo/edit_logo/' . $logo->id); ?>
                                                <div class="form-group">


                                                    <input type="text" name="logo_name" class="form-control"
                                                        id="logo_name" placeholder="Logo Name"
                                                        value="<?php echo $logo->logo_name; ?>">
                                                </div>



                                                <div class="form-group">
                                                    <label class="file-upload btn btn-primary">
                                                        Browse for file ... <input name="image_name" id="imgInp"
                                                            type="file" class="form-control">
                                                    </label>
                                                    New
                                                    <img width="100px" height="100px" id="img-upload" />
                                                    Old
                                                    <img width="100px" height="100px"
                                                        src="<?php echo base_url("/admin_assets/images/upload_logo/" . $logo->images); ?>" />
                                                </div>
                                            </div>

                                        </div>
                                        <?php echo form_submit(array('name' => 'submit', 'value' => 'Update', 'class' => 'btn btn-primary mt-3')); ?>

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
<?php $this->load->view("admin/partials/admin_footer"); ?>