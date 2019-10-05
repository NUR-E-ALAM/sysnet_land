<?php
$img_res = $this->db->query("SELECT image_id, images FROM room_images_tbl WHERE room_id=$room->id")->result();
$this->load->view('partials/head'); ?>

<body>
    <!-- header -->
    <?php $this->load->view('partials/header'); ?>
    <!-- //header -->
    <!-- banner -->
    <?php $this->load->view("partials/banner"); ?>
    <!-- //banner -->


    <!-- [ Main Content ] start -->




    <!-- [ Main Content ] start -->

    <hr>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12">
                <div class="form-group">
                    <div class="tab-content" id="pills-tabContent">
                        <?php if (!empty($img_res)) {
                            foreach ($img_res as $r) { ?>
                        <div class="tab-pane fade show" id="<?php echo $r->image_id; ?>" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <p class="mb-0">
                                <img width="500px" height="340px"
                                    src="<?php echo base_url("/backend_assets/images/room_images/" . $r->images); ?>" />
                            </p>
                        </div>
                        <?php }
                        } ?>
                    </div>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <?php if (!empty($img_res)) {
                            foreach ($img_res as $r) { ?>
                        <li class="nav-item">
                            <a class="nav-link" id="home-tab" data-toggle="tab" href="#<?php echo $r->image_id; ?>"
                                role="tab" aria-controls="home" aria-selected="true">
                                <img width="100px" height="100px"
                                    src="<?php echo base_url("/backend_assets/images/room_images/" . $r->images); ?>" />
                            </a>
                        </li>
                        <?php }
                        } ?>
                    </ul>
                </div>

            </div>
            <div class="col-md-6 col-sm-12 col-xs-12">


                <h1> <?php echo $room->house_name; ?></h1>
                <p><?php echo $room->description; ?></p>
                <h5><?php echo $room->address; ?></h5>
                <h6>Floor Level :<?php echo $room->floor_level; ?></h6>
                <h6>Floor Type : <?php echo $room->floor_type; ?></h6>
                <h6>Status :<?php if ($room->status == 1) {
                                echo '<label class="badge badge-success">Active</label>';
                            } else {
                                echo '<label class="badge badge-danger">Inactive</label>';
                            }
                            ?></h6>

            </div>



        </div>




    </div>
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="col-sm-12 mb-3">
            <button class="btn btn-primary" type="button" data-toggle="collapse" data-target=".multi-collapse"
                aria-expanded="false" aria-controls="multiCollapseExample1 multiCollapseExample2">Facilities</button>
            <div class="row">
                <div class="col">
                    <div class="collapse multi-collapse mt-2" id="multiCollapseExample1">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>

                                    <th scope="col">#</th>
                                    <th scope="col">facility</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <th scope="row">Drawing Room</th>
                                    <td> <?php if ($room->drawing_room == 1) {
                                                echo '<label class="badge badge-success">Yes</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">No</label>';
                                            }
                                            ?></td>
                                </tr>

                                <tr>

                                    <th scope="row">Kitchen</th>
                                    <td> <?php if ($room->kitchen == 1) {
                                                echo '<label class="badge badge-success">Yes</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">No</label>';
                                            }
                                            ?></td>
                                </tr>
                                <tr>

                                    <th scope="row">Common Bath</th>
                                    <td> <?php if ($room->common_bath == 1) {
                                                echo '<label class="badge badge-success">Yes</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">No</label>';
                                            }
                                            ?></td>
                                </tr>
                                <tr>

                                    <th scope="row">Lift</th>
                                    <td> <?php if ($room->lift == 1) {
                                                echo '<label class="badge badge-success">Yes</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">No</label>';
                                            }
                                            ?></td>
                                </tr>


                                <tr>

                                    <th scope="row">Parking</th>
                                    <td> <?php if ($room->parking == 1) {
                                                echo '<label class="badge badge-success">Yes</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">No</label>';
                                            }
                                            ?></td>
                                </tr>



                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="col">
                    <div class="collapse multi-collapse mt-2" id="multiCollapseExample2">

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">facility</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Bad Room</th>
                                    <td><?php echo $room->bed_room; ?></td>

                                </tr>

                                <tr>
                                    <th scope="row">Dining Room</th>
                                    <td> <?php if ($room->dining_room == 1) {
                                                echo '<label class="badge badge-success">Yes</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">No</label>';
                                            }
                                            ?></td>

                                </tr>
                                <tr>
                                    <th scope="row">Attach Bath</th>
                                    <td> <?php if ($room->attach_bath == 1) {
                                                echo '<label class="badge badge-success">Yes</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">No</label>';
                                            }
                                            ?></td>

                                </tr>
                                <tr>
                                    <th scope="row">Balcony</th>
                                    <td> <?php if ($room->balcony == 1) {
                                                echo '<label class="badge badge-success">Yes</label>';
                                            } else {
                                                echo '<label class="badge badge-danger">No</label>';
                                            }
                                            ?></td>


                                </tr>






                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>




    </div>

    <!-- [ Main Content ] end -->




    <!-- footer -->
    <?php $this->load->view('partials/footer'); ?>
    <!-- //footer -->
    <?php $this->load->view('partials/copyright'); ?>