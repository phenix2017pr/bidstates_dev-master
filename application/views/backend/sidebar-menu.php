<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
<div class="menu_section">
<h3>General</h3>
<ul class="nav side-menu">
<li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
<li><a href="index.html">Dashboard</a></li>
</ul>
</li>
<li><a><i class="fa fa-edit"></i> Manage Accounts <span class="fa fa-chevron-down"></span></a>
<ul class="nav child_menu">
    <li><a href="<?php echo base_url(); ?>admin/accounts">Manage Contractor</a></li>
    <li><a href="#">Add Contractor</a></li>
    <li><a href="<?php echo base_url(); ?>admin/customers">Manage Customer</a></li>
    <li><a href="#">Add Customer</a></li>
    <li><a href="<?php echo base_url(); ?>contractor/userInfo">Stripe  Customers </a> </li>
    <li><a href="<?php echo base_url(); ?>contractor/userCharges">Stripe  Customers Charges </a> </li>

</ul>
</li>

    <li><a><i class="fa fa-cc-mastercard"></i> Payment Method <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu">
            <li><a href="<?php echo base_url(); ?>contractor/paymentDetails"> Add new Stripe Customer </a> </li>


        </ul>
    </li>


</ul>

</div>

</div>
