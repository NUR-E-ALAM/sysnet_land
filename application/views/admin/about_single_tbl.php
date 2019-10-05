<?php $this->load->view("admin/partials/admin_header"); ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">


                <div class="main-body">
                    <div class="page-wrapper">
                        <!-- [ Main Content ] start -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card">

                                    <div class="card-body">

                                        <div class="row">
                                            <div class="form-group">
                                                <img width="300px" height="300px" src="<?php echo base_url("/admin_assets/images/upload_about/" . $about->images); ?>" />
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php if ($about->status == 1) {
                                                        echo '<label class="badge badge-success">Active</label>';
                                                    } else {
                                                        echo '<label class="badge badge-danger">Inactive</label>';
                                                    }
                                                    ?>

                                                </div>
                                                <div class="form-group">

                                                    <h1> <?php echo $about->about_name; ?></h1>

                                                </div>
                                                <div class="form-group">

                                                    <p><?php echo $about->about_description; ?></p>
                                                    <div class="form-group">


                                                    </div>




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