<?php
$this->load->view("admin/partials/admin_header"); ?>
<style>
* {
    margin: 0;
    padding: 0;
}

.messages {
    padding: 5px;
}

.status {
    border: 1px solid #ec0000;
    background: #ffabab;
    [color=red]height: 30px;
    margin-top: 20px;
    [/color]
}

img#imgb_<?php echo $img_id;

?> {
    cursor: pointer;
    [color=red]position: relative;
    top: -50px;
    height: 20px;
    [/color]
    /* Move it up the exact amount of px of the height of the <p> AND the margin*/
}
</style>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <!-- [ breadcrumb ] start -->

                <!-- [ breadcrumb ] end -->
                <!-- [ breadcrumb ] end -->
                <div class="col-xl-12">
                    <div class="card">
                        <!-- Display status message -->
                        <?php if (!empty($success_msg)) { ?>
                        <div class="col-xs-12">
                            <div class="alert alert-success"><?php echo $success_msg; ?></div>
                        </div>
                        <?php } elseif (!empty($error_msg)) { ?>
                        <div class="col-xs-12">
                            <div class="alert alert-danger"><?php echo $error_msg; ?></div>
                        </div>
                        <?php } ?>
                        <div class="card-header" id="messages">
                            <?php foreach ($img as $r) { ?>

                            <img id="imgb_<?php echo $r->image_id; ?>" width="100px" height="100px"
                                src="<?php echo base_url("/backend_assets/images/room_images/" . $r->images); ?>" />
                            <button onclick="deleteImage('<?php echo $r->image_id; ?>', '<?php echo $r->images; ?>')" <i
                                class="fa fa-trash"></i></button>

                            <?php } ?>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <div class="row" style="margin:0px; background-color:#e3e3e3;text-align:center;">
                                    <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                                        <h3>Click on a ADD FILE button to add more files</h3>

                                    </div>
                                </div>
                                <?php echo form_open_multipart('Rooms/add_images/' . $id); ?>
                                <div class="row" style="margin:0px;padding:20px 0px;fornt-size:18px;text-align:center;">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                        <button id="ADDFILE" class="btn btn-danger">Add File</button>
                                    </div>
                                </div>
                                <div class="row" style="margin:0px;padding:20px 0px;fornt-size:18px;text-align:center;">
                                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                                        <div id="uploadFileContainer">

                                        </div>
                                        <div id="submit" style="display:none">
                                            <input type="submit" value="Submit" name="submit" class="brn btn-primary">
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <?php form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
function deleteImage(image_id, image_name) {
    //alert('salam');
    var result = confirm("Are you sure to delete?");
    if (result) {
        $.post("<?php echo base_url('rooms/delete_img'); ?>", {
            img_id: image_id,
            img_name: image_name

        }, function(resp) {
            if (resp == 'ok') {
                $('#imgb_' + image_id).remove();
                alert('The image has been removed from the gallery');
            } else {
                alert('Some problem occurred, please try again.');
            }
        });
    }
}

jQuery(document).ready(function($) {
    $(document).on('click', 'button#ADDFILE', function(event) {
        event.preventDefault();

        $("div#submit").css("display", "block");

        addFileInput();
    });

    function addFileInput() {
        var html = '';
        html += '<div class = "alert alert-info">';
        html +=
            '<button type ="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>';
        html += '<strong>Upload file</strong>';
        html += '<input type ="file" id="imgInp" name="multipleFiles[]">';
        html += '</div>';


        $("div#uploadFileContainer").append(html);

    }

});
</script>
<?php $this->load->view("admin/partials/admin_footer"); ?>