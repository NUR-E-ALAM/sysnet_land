<footer class="py-5">
    <div class="container py-xl-4 py-lg-3">
        <div class="row footer-grids">


            <div class="col-lg-2 col-6 footer-grid">
                <h3 class="mb-sm-4 mb-3 pb-lg-3"> Company</h3>
                <?php if ($query_company->num_rows() > 0) : ?>
                <?php foreach ($query_company->result() as $row) : ?>
                <ul class="list-unstyled">
                    <li>
                        <a href="#find"><?php echo $row->company_name; ?></a>
                        <br><?php echo $row->company_address; ?>
                    </li>



                </ul>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
			<hr>
            <div class="col-lg-2 col-6 footer-grid footer-contact mt-lg-0 mt-4">
                <h3 class="mb-sm-4 mb-3 pb-lg-3"> Email Address</h3>
                <?php if ($query_company->num_rows() > 0) : ?>
                <?php foreach ($query_company->result() as $row) : ?>
                <ul class="list-unstyled">

                    <li>
                        <a href="#find"><?php echo $row->company_email; ?></a>
                    </li>
                </ul>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>
			<hr>
            <div class="col-lg-2 col-6 footer-grid text-lg-right">
                <h3 class="mb-sm-4 mb-3 pb-lg-3"> Contact Us</h3>
                <?php if ($query_company->num_rows() > 0) : ?>
                <?php foreach ($query_company->result() as $row) : ?>
                <ul class="list-unstyled">

                    <li>
                        <a href="#find"><?php echo $row->company_phone; ?></a>
                    </li>
                </ul>
                <?php endforeach; ?>
                <?php endif; ?>
            </div>

            <div class="col-lg-2 col-6 footer-grid text-lg-right">
                <ul class="list-unstyled">
                    <li>
                        <a href="#facts">Statistical Facts</a>
                    </li>
                    <li>
                        <a href="#find">Find a Property</a>
                    </li>
                    <li>
                        <a href="#testi">Testimonials</a>
                    </li>
                    <li>
                        <a href="#apps">Apps</a>
                    </li>
                </ul>
            </div>
            <div class="col-lg-4 footer-grid mt-lg-0 mt-4">
                <div class="footer-logo">
                    <h2 class="text-lg-center text-center">
                        <a class="logo text-wh font-weight-bold" href="index.html"><span class="text-bl">L</span>and</a>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</footer>