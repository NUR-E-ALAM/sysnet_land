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
                                    <h5 class="m-b-10">About Elements</h5>
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
                                        <?php
                                        if (isset($error)) {
                                            echo $error;
                                        }
                                        ?>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <?php echo form_open_multipart('About/insert_about'); ?>
                                                <div class="form-group">
                                                    <label for="about_name">About Title</label>
                                                    <?php echo form_input(array(
                                                        'name' => 'about_name', 'id' => 'manu_name',
                                                        'value' => set_value('about_name', ''), 'placeholder' => 'About Name', 'class' => 'form-control',
                                                    )); ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Description</label>
                                                    <textarea class="form-control" name="about_description"
                                                        id="exampleFormControlTextarea1" placeholder="Description"
                                                        rows="3"></textarea>


                                                </div>
                                                <div class="form-group">
                                                    <label class="file-upload btn btn-primary">
                                                        Browse for file ... <input name="image_name" id="imgInp"
                                                            type="file" class="form-control">
                                                    </label>
                                                    <img width="100px" height="100px" id="img-upload" />
                                                </div>
                                                <div class="form-group">
                                                    <label for="happy"
                                                        class="col-sm-4 col-md-4 control-label text-right">Are you
                                                        Active ?</label>
                                                    <div class="col-sm-6 col-md-6">
                                                        <div class="input-group">
                                                            <div id="radioBtn" class="btn-group">
                                                                <a class="btn btn-outline-primary btn-sm notActive"
                                                                    data-toggle="happy" data-title="1">YES</a>
                                                                <a class="btn btn-outline-primary btn-sm active"
                                                                    data-toggle="happy" data-title="2">NO</a>
                                                            </div>
                                                            <input type="hidden" name="happy" value="2" id="happy">
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
<?php $this->load->view("admin/partials/admin_footer"); ?>