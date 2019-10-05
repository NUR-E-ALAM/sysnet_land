<?php
$img_res = $this->db->query("SELECT image_id, images FROM room_images_tbl WHERE room_id=$room->id")->result();
$this->load->view("admin/partials/admin_header"); ?>
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
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <?php if (!empty($img_res)) {
                                                        foreach ($img_res as $r) { ?>
                                                    <img width="300px" height="300px"
                                                        src="<?php echo base_url("/backend_assets/images/room_images/" . $r->images); ?>" />
                                                    <?php }
                                                    } ?>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">

                                                    <h1> <?php echo $room->house_name; ?></h1>
                                                    <p><?php echo $room->description; ?></p>
                                                    <h5><?php echo $room->address; ?></h5>
                                                </div>



                                            </div>




                                        </div>
                                        <div class="col-md-12 col-sm-12">
                                            <div class="form-group">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">facility</th>
                                                            <th scope="col">#</th>
                                                            <th scope="col">facility</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">Bad Room</th>
                                                            <td><?php echo $room->bed_room; ?></td>
                                                            <th scope="row">Drawing Room</th>
                                                            <td> <?php if ($room->drawing_room == 1) {
                                                                        echo '<label class="badge badge-success">Yes</label>';
                                                                    } else {
                                                                        echo '<label class="badge badge-danger">No</label>';
                                                                    }
                                                                    ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Dining Room</th>
                                                            <td> <?php if ($room->dining_room == 1) {
                                                                        echo '<label class="badge badge-success">Yes</label>';
                                                                    } else {
                                                                        echo '<label class="badge badge-danger">No</label>';
                                                                    }
                                                                    ?></td>
                                                            <th scope="row">Kitchen</th>
                                                            <td> <?php if ($room->kitchen == 1) {
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
                                                            <th scope="row">Common Bath</th>
                                                            <td> <?php if ($room->common_bath == 1) {
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
                                                            <th scope="row">Lift</th>
                                                            <td> <?php if ($room->lift == 1) {
                                                                        echo '<label class="badge badge-success">Yes</label>';
                                                                    } else {
                                                                        echo '<label class="badge badge-danger">No</label>';
                                                                    }
                                                                    ?></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Floor Type</th>
                                                            <td><?php echo $room->floor_type; ?></td>
                                                            <th scope="row">Floor Level</th>
                                                            <td><?php echo $room->floor_level; ?></td>
                                                        </tr>


                                                        <tr>
                                                            <th scope="row">Generator</th>
                                                            <td> <?php if ($room->generator == 1) {
                                                                        echo '<label class="badge badge-success">Yes</label>';
                                                                    } else {
                                                                        echo '<label class="badge badge-danger">No</label>';
                                                                    }
                                                                    ?></td>
                                                            <th scope="row">Parking</th>
                                                            <td> <?php if ($room->parking == 1) {
                                                                        echo '<label class="badge badge-success">Yes</label>';
                                                                    } else {
                                                                        echo '<label class="badge badge-danger">No</label>';
                                                                    }
                                                                    ?></td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row">Status</th>
                                                            <td> <?php if ($room->status == 1) {
                                                                        echo '<label class="badge badge-success">Active</label>';
                                                                    } else {
                                                                        echo '<label class="badge badge-danger">Inactive</label>';
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <?php $this->load->view("admin/partials/admin_footer"); ?>