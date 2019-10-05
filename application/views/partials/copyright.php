 <!-- copyright -->
 <div class="copyright-w3ls py-4">
     <div class="container">
         <div class="row">
             <!-- copyright -->
             <p class="col-lg-8 copy-right-grids text-wh text-lg-left text-center mt-lg-2">© 2019 Land. All
                 Rights Reserved | Design by
                 <a href="#" target="_blank">SYSnet DoT NET</a>
             </p>
             <!-- //copyright -->
             <!-- social icons -->
             <div class="col-lg-4 w3social-icons text-lg-right text-center mt-lg-0 mt-3">
                 <ul>
                     <li>
                         <a href="#" class="rounded-circle">
                             <span class="fa fa-facebook-f"></span>
                         </a>
                     </li>
                     <li class="px-2">
                         <a href="#" class="rounded-circle">
                             <span class="fa fa-google-plus"></span>
                         </a>
                     </li>
                     <li>
                         <a href="#" class="rounded-circle">
                             <span class="fa fa-twitter"></span>
                         </a>
                     </li>
                     <li class="pl-2">
                         <a href="#" class="rounded-circle">
                             <span class="fa fa-dribbble"></span>
                         </a>
                     </li>
                 </ul>
             </div>
             <!-- //social icons -->
         </div>
     </div>
 </div>
 <!-- //copyright -->
 <!-- move top icon -->
 <a href="#home" class="move-top text-center">
     <span class="fa fa-angle-double-up" aria-hidden="true"></span>
 </a>
 <!-- //move top icon -->
 <!-- Required Js -->
 <script type="text/javascript">
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
 <script src="<?php echo base_url(); ?>forntend_assets/js/bootstrap.min.js"></script>
 <script src="<?php echo base_url(); ?>forntend_assets/js/pcoded.min.js"></script>
 </body>

 </html>