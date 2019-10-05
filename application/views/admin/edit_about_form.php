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
                                            <div class="col-md-12">
                                                <?php echo form_open_multipart('About/edit_about/' . $about->id); ?>
                                                <div class="form-group">


                                                    <input type="text" name="about_name" class="form-control" id="about_name" placeholder="About Name" value="<?php echo $about->about_name; ?>">
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Description</label>
                                                    <textarea class="form-control" name="about_description" id="exampleFormControlTextarea1" placeholder="Description" rows="5"><?php echo $about->about_description; ?></textarea>


                                                </div>
                                                <div class="form-group">
                                                    <label class="file-upload btn btn-primary">
                                                        Browse for file ... <input name="image_name" id="imgInp" type="file" class="form-control">
                                                    </label>
                                                    New
                                                    <img width="100px" height="100px" id="img-upload" />
                                                    Old
                                                    <img width="100px" height="100px" alt="No Image Yet" src="<?php echo base_url("/admin_assets/images/upload_about/" . $about->images); ?>" />

                                                </div>
                                                <div class="form-group">
                                                    <label for="happy" class="col-sm-4 col-md-4 control-label text-right">Are you
                                                        Active ?</label>



                                                    <div class="input-group">
                                                        <div id="radioBtn" class="btn-group">
                                                            <a class="btn btn-outline-primary btn-sm <?php if ($about->status == 1) {
                                                                                                            echo "active";
                                                                                                        } ?> " data-toggle="happy" data-title="1">YES</a>
                                                            <a class="btn btn-outline-primary btn-sm <?php if ($about->status == 2) {
                                                                                                            echo "active";
                                                                                                        } ?>" data-toggle="happy" data-title="2">NO</a>
                                                        </div>
                                                        <input type="hidden" name="happy" value="<?php echo $about->status; ?>" id="happy">
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
<?php $this->load->view("admin/partials/admin_footer"); ?>