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
                            <h5> About </h5>
                            <span class="d-block m-t-5"><code>
                                    Daynamic About which show front-end</code></span>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <?php if ($query->num_rows() > 0) : ?>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>

                                                <th>Name</th>
                                                <th>Description</th>
                                                <th>Images</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($query->result() as $row) : ?>
                                                <tr>

                                                    <td><?php echo $row->about_name; ?></td>
                                                    <td><?php $des = $row->about_description;
                                                                echo word_limiter($des, 5); ?>
                                                        <a href='<?php echo site_url('About/show_single/' . $row->id) ?>'">Show More </a>
                                            
                                            </td>
                                            <td> <img width=" 100px" height="100px" src="<?php echo base_url("admin_assets/images/upload_about/" . $row->images); ?>" />
                                                    </td>

                                                    <td>
                                                        <?php if ($row->status == 1) {
                                                                    echo '<label class="badge badge-success">Active</label>';
                                                                } else {
                                                                    echo '<label class="badge badge-danger">Inactive</label>';
                                                                }
                                                                ?>

                                                    </td>
                                                    <td><?php echo $row->created; ?></td>
                                                    <td>
                                                        <a href='<?php echo site_url('About/edit_about/' . $row->id) ?>'>Edit <i class="fa fa-edit"></i></a>
                                                        ||
                                                        <a onclick="return confirm('Are you sure You Delete This ?')" href='<?php echo site_url('About/delete_about/' . $row->id) ?>'>Delete
                                                            <i class="fa fa-trash"></i></a>

                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<?php $this->load->view("admin/partials/admin_footer"); ?>