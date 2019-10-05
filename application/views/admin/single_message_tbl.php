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
                                        <div class="col-md-12">
                                            
                                                <div class="form-group">
                                                    Subject : <h4><?php echo $message->user_subject; ?></h4>
                                                    Message : <p><?php
                                                                    echo $message->user_message; ?></p>
                                                </div>
                                               </div>
                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <h4>Name :<?php echo $message->user_name; ?></h4>
                                                    <h5> Email : <?php echo $message->user_email; ?>
                                                    </h5>



                                                    Created Time : <p><?php echo $message->created; ?></p>
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
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    /* Popup container - can be anything you want */
    .popup {
        position: relative;
        display: inline-block;
        cursor: pointer;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* The actual popup */
    .popup .popuptext {
        visibility: hidden;
        width: 160px;
        background-color: #555;
        color: #fff;
        text-align: center;
        border-radius: 6px;
        padding: 8px 0;
        position: absolute;
        z-index: 1;
        bottom: 125%;
        left: 50%;
        margin-left: -80px;
    }

    /* Popup arrow */
    .popup .popuptext::after {
        content: "";
        position: absolute;
        top: 100%;
        left: 50%;
        margin-left: -5px;
        border-width: 5px;
        border-style: solid;
        border-color: #555 transparent transparent transparent;
    }

    /* Toggle this class - hide and show the popup */
    .popup .show {
        visibility: visible;
        -webkit-animation: fadeIn 1s;
        animation: fadeIn 1s;
    }

    /* Add animation (fade in the popup) */
    @-webkit-keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }

    @keyframes fadeIn {
        from {
            opacity: 0;
        }

        to {
            opacity: 1;
        }
    }
    </style>
</head>

<body style="text-align:center">

    <h2>Popup</h2>

    <div class="popup" onclick="myFunction()">Click me to toggle the popup!
        <span class="popuptext" id="myPopup">A Simple Popup!rftytttttty</span>
    </div>

    <script>
    // When the user clicks on div, open the popup
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
    </script>

</body>

</html>
<?php $this->load->view("admin/partials/admin_footer"); ?>