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
                                    <h5 class="m-b-10">Room Elements</h5>
                                </div>
                                <?php if (validation_errors()) : ?>
                                <h3>Whoops! There was an error:</h3>
                                <p><?php echo validation_errors(); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

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
                                                <?php echo form_open_multipart('Rooms/edit_room/' . $room->id); ?>
                                                <div class="form-group">
                                                    <label for="house_name">House Name</label>
                                                    <input type="text" name="house_name" class="form-control"
                                                        id="house_name" placeholder="Room Name"
                                                        value="<?php echo $room->house_name; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Description</label>
                                                    <?php echo $this->ckeditor->editor("house_description", $room->description); ?>

                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlTextarea1">Address</label>
                                                    <textarea class="form-control" name="address"
                                                        id="exampleFormControlTextarea1" placeholder="House Address"
                                                        rows="2"><?php echo $room->address; ?></textarea>


                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                                <div class="form-group">
                                                    <label for="bed_room">Bed Room</label>
                                                    <select class="form-control" name="bed_room" id="bed_room">
                                                        <option><?php echo $room->bed_room; ?></option>
                                                        <option>1 Bedroom</option>
                                                        <option>2 Bedroom</option>
                                                        <option>3 Bedroom</option>
                                                        <option>4 Bedroom</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="drawing_room" class="control-label text-right">
                                                        Drawing Room?</label>

                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->drawing_room == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="drawing_room" data-title="1">YES</a>
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->drawing_room == 2) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="drawing_room" data-title="2">NO</a>
                                                    </div>
                                                    <input type="hidden" name="drawing_room"
                                                        value="<?php echo $room->drawing_room; ?>" id="drawing_room">

                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="dining_room" class="control-label text-right"> Dining Room?</label>

                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->dining_room == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="dining_room" data-title="1">YES</a> <a
                                                            class="btn btn-outline-primary btn-xs <?php if ($room->dining_room == 2) {
                                                                                                                                                                                                        echo "active";
                                                                                                                                                                                                    } ?>"
                                                            data-toggle="dining_room" data-title="2">NO</a>
                                                    </div><input type="hidden" name="dining_room"
                                                        value="<?php echo $room->dining_room; ?>" id="dining_room">

                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="kitchen_room" class="control-label text-right">
                                                        Kitchen Room?</label>
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->kitchen == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="kitchen_room" data-title="1">YES</a><a
                                                            class="btn btn-outline-primary btn-xs <?php if ($room->kitchen == 2) {
                                                                                                                                                                                                        echo "active";
                                                                                                                                                                                                    } ?>"
                                                            data-toggle="kitchen_room" data-title="2">NO</a>
                                                    </div> <input type="hidden" name="kitchen_room"
                                                        value="<?php echo $room->kitchen; ?>" id="kitchen_room">

                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="attach_bath" class="control-label text-right">
                                                        Attach Bath?</label>
                                                    <div id="radioBtn" class="btn-group"><a
                                                            class="btn btn-outline-primary btn-xs <?php if ($room->attach_bath == 1) {
                                                                                                                                        echo "active";
                                                                                                                                    } ?>"
                                                            data-toggle="attach_bath" data-title="1">YES</a>
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->attach_bath == 2) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="attach_bath" data-title="2">NO</a>
                                                    </div><input type="hidden" name="attach_bath"
                                                        value="<?php echo $room->attach_bath ?>" id="attach_bath">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="common_bath" class="control-label text-right">
                                                        Common Bath ?</label>
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->common_bath == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="common_bath" data-title="1">YES</a>
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->common_bath == 2) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="common_bath" data-title="2">NO</a>
                                                    </div>
                                                    <input type="hidden" name="common_bath"
                                                        value="<?php echo $room->common_bath; ?>" id="common_bath">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="balcony" class="control-label text-right">Have a Balcony
                                                        ?</label>
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->balcony == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="balcony" data-title="1">YES</a>
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->balcony == 2) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="balcony" data-title="2">NO</a>
                                                    </div>
                                                    <input type="hidden" name="balcony"
                                                        value="<?php echo $room->balcony; ?>" id="balcony">
                                                </div>
                                            </div>

                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="lift" class="control-label text-right">Have a Lift
                                                        ?</label>
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->lift == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="lift" data-title="1">YES</a>
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->lift == 2) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="lift" data-title="2">NO</a>
                                                    </div>
                                                    <input type="hidden" name="lift" value="<?php echo $room->lift; ?>"
                                                        id="lift">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="generator" class="control-label text-right">Have a
                                                        Generator ?</label>
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->generator == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="generator" data-title="1">YES</a>
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->generator == 2) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="generator" data-title="2">NO</a>
                                                    </div>
                                                    <input type="hidden" name="generator"
                                                        value="<?php echo $room->generator; ?>" id="generator">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="parking" class="control-label text-right">Have a Parking
                                                        ?</label>
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->parking == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="parking" data-title="1">YES</a>
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->parking == 2) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="parking" data-title="2">NO</a>
                                                    </div>
                                                    <input type="hidden" name="parking"
                                                        value="<?php echo $room->parking ?>" id="parking">
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <label for="floor_type">Floor Type</label>
                                                    <select class="form-control" name="floor_type" id="floor_type">
                                                        <option><?php echo $room->floor_type; ?></option>
                                                        <option>Marble</option>
                                                        <option>Wood</option>
                                                        <option>Tiles</option>
                                                        <option>Mosaic</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-6">
                                                <div class="form-group">
                                                    <label for="floor_level">Floor Level</label>
                                                    <select class="form-control" name="floor_level" id="floor_level">
                                                        <option><?php echo $room->floor_level; ?></option>
                                                        <option>Ground Floor</option>
                                                        <option>1st Floor</option>
                                                        <option>2nd Floor</option>
                                                        <option>3rd Floor</option>
                                                        <option>4th Floor</option>
                                                        <option>5th Floor</option>
                                                        <option>6th Floor</option>
                                                        <option>7th Floor</option>
                                                        <option>8th Floor</option>
                                                        <option>9th Floor</option>
                                                        <option>10 th Floor</option>

                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-4">
                                                <div class="form-group">
                                                    <label for="happy" class="control-label text-right">Are you Active
                                                        ?</label>
                                                    <div id="radioBtn" class="btn-group">
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->status == 1) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="happy" data-title="1">YES</a>
                                                        <a class="btn btn-outline-primary btn-xs <?php if ($room->status == 2) {
                                                                                                        echo "active";
                                                                                                    } ?>"
                                                            data-toggle="happy" data-title="2">NO</a>
                                                    </div>
                                                    <input type="hidden" name="happy"
                                                        value="<?php echo $room->status; ?>" id="happy">
                                                </div>
                                            </div>

                                        </div>

                                        <?php echo form_submit(array('name' => 'submit', 'value' => 'Submit', 'class' => 'btn btn-success mt-3')); ?>
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