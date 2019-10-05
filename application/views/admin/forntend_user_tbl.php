<?php $this->load->view("admin/partials/admin_header"); ?>
<!-- [ Header ] end -->

<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
    <div class="pcoded-wrapper">
        <div class="pcoded-content">
            <div class="pcoded-inner-content">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5> Company</h5>
                            <span class="d-block m-t-5"><code>
                                    Daynamic menus which show front-end</code></span>
                        </div>
                        <div class="card-block table-border-style">
                            <div class="table-responsive">
                                <?php if ($query->num_rows() > 0) : ?>
                                <table class="table table-hover">
                                    <thead>
                                        <tr>

                                            <th> Name</th>
                                            <th> Email</th>
                                            <th>Subjects</th>
                                            <th>Massages</th>
                                            <th>Created</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($query->result() as $row) : ?>
                                        <tr>

                                            <td><?php echo $row->user_name; ?></td>
                                            <td><?php echo $row->user_email; ?></td>
                                            <td><?php echo $row->user_subject; ?></td>
                                            <td><?php $mes = $row->user_message;
                                                                echo word_limiter($mes, 5); ?>
                                                <a href='<?php echo site_url('Forntend_user/show_single_message/' . $row->id) ?>'">Show More </a>
                                        </td>
                                            <td><?php echo $row->created; ?></td>
                                            <td>
                                                <a onclick=" return confirm('Are you sure?')"
                                                    href='<?php echo site_url('Forntend_user/delete_user/' . $row->id) ?>'>Delete
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