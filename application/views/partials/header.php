  <header>
      <div class="container">
          <div class="header d-lg-flex justify-content-between align-items-center py-2 px-sm-2 px-1">
              <!-- logo -->
              <div id="logo">
                  <h1><a href="#">
                          <?php if ($query->num_rows() > 0) : ?>
                          <?php foreach ($query->result() as $row) : ?>
                          <span class="text-bl"></span>
                          <?php echo $row->logo_name; ?>
                          <img width="100px" height="100px"
                              src="<?php echo base_url("admin_assets/images/upload_logo/" . $row->images); ?>" />
                          <?php endforeach; ?>
                          <?php endif; ?>
                      </a>
                  </h1>
              </div>
              <!-- //logo -->
              <!-- nav -->
              <div class="nav_w3ls ml-lg-5">
                  <nav>
                      <label for="drop" class="toggle">Menu</label>
                      <input type="checkbox" id="drop" />
                      <ul class="menu">
                          <li><a href="<?php base_url(); ?>Welcome">Home</a></li>
                          <li><a href="#find">Find a Property</a></li>
                          <li>
                              <!-- First Tier Drop Down -->
                              <label for="drop-2" class="toggle toogle-2">Pages <span class="fa fa-angle-down"
                                      aria-hidden="true"></span>
                              </label>
                              <a href="#">Pages <span class="fa fa-angle-down" aria-hidden="true"></span></a>
                              <input type="checkbox" id="drop-2" />
                              <ul>
                                  <li><a href="#about" class="drop-text">About Us</a></li>
                                  <li><a href="#services" class="drop-text">Services</a></li>
                                  <li><a href="#gallery" class="drop-text">Gallery</a></li>
                              </ul>
                          </li>
                          <li><a href="#blog">Blog</a></li>
                          <li><a href="#contact">Contact Us</a></li>
                          <li><a href="<?php base_url(); ?>Signup/login">Admin Login</a></li>
                          <li><a href="<?php base_url(); ?>Welcome/login">Login</a></li>
                          <li><a href="<?php base_url(); ?>Welcome/registration">Register</a></li>
                      </ul>
                  </nav>
              </div>
              <!-- //nav -->
          </div>
      </div>
  </header>