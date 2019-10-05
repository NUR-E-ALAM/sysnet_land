<?php
$this->load->view("admin/partials/admin_header"); ?>
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
                            <h5> Rooms </h5>
                            <span class="d-block m-t-5"><code>
                                    Daynamic About which show front-end</code></span>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <?php if (!empty($query)) { ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>


                                                <th>User Name</th>
                                                <th>house_name</th>
                                                <!-- <th>description</th> -->
                                                <th>address</th>
                                                <th>floor_type</th>
                                                <th>floor_level</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($query as $row) { ?>
                                                <tr>

                                                    <td><?php echo $row->username; ?></td>
                                                    <td><?php echo $row->house_name; ?></td>

                                                    <!-- <td><?php $des = $row->description;
                                                                        echo word_limiter($des, 5); ?>
                                            </td> -->
                                                    <td><?php $address = $row->address;
                                                                echo word_limiter($address, 3);
                                                                ?></td>
                                                    <td><?php echo $row->floor_type; ?></td>
                                                    <td><?php echo $row->floor_level; ?>

                                                    </td>

                                                    <td>
                                                        <a href='<?php echo site_url('Rooms/show_single/' . $row->id) ?>'">Details<i
                                                        class=" feather icon-file-text"></i> </a> ||
                                                        <a href='<?php echo site_url('Rooms/edit_room/' . $row->id) ?>'>Edit <i class=" fa fa-edit"></i></a>
                                                        ||
                                                        <a onclick="return confirm('Are you sure You Delete This ?')" href='<?php echo site_url('Rooms/delete_room/' . $row->id) ?>'>Delete
                                                            <i class="fa fa-trash"></i></a>

                                                    </td>

                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view("admin/partials/admin_footer"); ?>