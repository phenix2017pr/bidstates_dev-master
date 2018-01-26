<div class="header">
  <nav class="navbar   navbar-site navbar-default" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a class="navbar-brand logo logo-title" href="<?php echo base_url();?>"> <img src="<?php echo base_url();?>images/blue-white.png"> </a>
        
      </div>
      <div class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
          <?php 
		   
		    if($this->session->userdata('login_type')){ ?>
          <li><a href="<?php echo base_url();?>login/logout">Logout</a></li>
          <li><a href="<?php echo base_url();?>account">Account</a></li>
          <?php } else{ ?>
          <li><a href="<?php echo base_url();?>login">Login</a></li>
          <li><a href="<?php echo base_url();?>login/signup">Signup</a></li>
          <li class="postadd"> <a class="btn btn-block btn-post" style="background-color: #163F68;" href="<?php echo base_url();?>login/signup">Join Our Directory</a> </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </nav>
</div>
