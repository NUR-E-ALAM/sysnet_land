<?php $this->load->view("admin/partials/admin_header"); ?>

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
                        <div class="card-header">
                            <h5> Menus</h5>
                            <span class="d-block m-t-5"><code>
                                    Daynamic menus which show front-end</code></span>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <div class="row" style="margin:0px; background-color:#e3e3e3;text-align:center;">
                                    <div class="col-xs-12 col-sm-6 col-md-12 col-lg-12">
                                        <h3>Click on a ADD FILE button to add more files</h3>
                                    </div>
                                </div>
                                <?php echo form_open_multipart('Rooms/add_images/' . $rid); ?>
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






                <input type="file" id="imgInp" name="multipleFiles[]">


                <img id="img-upload" />





            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
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


$(document).ready(function() {
    $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
    });

    $('.btn-file :file').on('fileselect', function(event, label) {

        var input = $(this).parents('.input-group').find(':text'),
            log = label;

        if (input.length) {
            input.val(log);
        } else {
            if (log) alert(log);
        }

    });

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-upload').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function() {
        readURL(this);
    });
});
</script>
<?php $this->load->view("admin/partials/admin_footer"); ?>