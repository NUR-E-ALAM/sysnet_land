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
                            <h5> Logo </h5>
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
                                            <th>Images</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query->result() as $row) : ?>
                                        <tr>

                                            <td><?php echo $row->logo_name; ?></td>
                                            <td> <img width="100px" height="100px"
                                                    src="<?php echo base_url("admin_assets/images/upload_logo/" . $row->images); ?>" />
                                            </td>
                                            <td><?php echo $row->created; ?></td>
                                            <td>
                                                <a href='<?php echo site_url('Logo/edit_logo/' . $row->id) ?>'>Edit <i
                                                        class="fa fa-edit"></i></a>
                                                || <a onclick="return confirm('Are you sure You Delete This ?')"
                                                    class="disabled" href='#'>Delete<i class="fa fa-trash"></i></a>
                                                <!-- <?php echo site_url('Logo/delete_logo/' . $row->id) ?> -->
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