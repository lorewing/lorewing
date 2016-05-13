<style>
img.member-box-avatar {
    border: 1px solid #CCCCCC;
    border-radius: 3px;
    height: 96px !important;
    width: 150px !important;
}

img.member-box-avatar {
    float: left;
    height: 86px;
    margin-right: 5px;
    padding: 2px;
    width: 50px;
}
</style>
<div class="navbar">
  <?php $site_logo=$this->general->getSettingValue("site_logo");?>
	<div><img src="<?php echo ImagePath().$site_logo ?>" />
	 <?php $user_id=$this->session->userdata('user_id');?></div>
  <div class="navbar-inner">
  <?php $site_logo=$this->general->getSettingValue("site_logo");?>
    <div class="container-fluid"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a>
      <div class="btn-group pull-right"> <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
       <?php $user_id=$this->session->userdata('user_id');
        $first_name=$this->general->getFieldValueById(TBL_USER_INFORMATION,array('tbl_users_id '=>$user_id),'first_name');
        $last_name=$this->general->getFieldValueById(TBL_USER_INFORMATION,array('tbl_users_id'=>$user_id),'last_name'); echo ucwords($first_name.' '.$last_name);?>
		 <i class="icon-user"></i> 
      <span class="caret"></span>
      </a>
        <ul class="dropdown-menu">
         <li class="<?php echo setActive("user")?>"><a href="<?php echo base_url() ?>account/user/edit">Profile</a></li>
           <li class="divider"></li>
          <li><a href="<?php echo base_url() ?>account/signin/logout">Logout</a></li>
        </ul>
      </div>
	  
	  
	  <div class="nav-collapse">

        <ul class="nav">

         <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Admin Setup<b class="caret"></b></a>

            <ul class="dropdown-menu">

             <li><a href="<?php echo base_url() ?>admin/maintain_power_user"><i class="icon-user icon-large icon-Black"></i>  Maintain Power User</a></li>

              <li><a href="<?php echo base_url() ?>admin/maintain_sales_director"><i class="icon-user icon-large icon-Black"></i>  Maintain Sales Director</a></li>

              <li><a href="<?php echo base_url() ?>admin/maintain_sales_manager"><i class="icon-user icon-large icon-Black"></i>  Maintain Sales Manager</a></li>

              <li><a href="<?php echo base_url() ?>admin/maintain_sales_reprasentive"><i class="icon-user icon-large icon-Black"></i>  Maintain Sales Representative</a></li>

              <li><a href="<?php echo base_url() ?>admin/global_s"><i class="icon-user icon-large icon-Black"></i>  Global Settings</a></li>

             <li class="<?php echo setActive("stores")?>"><a href="<?php echo base_url() ?>admin/stores"><i class="icon-th"></i> Maintain Stores</a></li>

            </ul>

          </li>

          <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Account Setup<b class="caret"></b></a>

            <ul class="dropdown-menu">

              <li><a href="<?php echo base_url() ?>admin/manage_user_account"><i class="icon-cog icon-large icon-Black"></i>  Manage User Account</a></li>

              <li><a href="<?php echo base_url() ?>admin/manage_client_account"><i class="icon-cog icon-large icon-Black"></i>  Manage Client Account</a></li>

              <li><a href="<?php echo base_url() ?>admin/reset_password"><i class="icon-lock icon-large icon-Black"></i>  Reset Password</a></li>

            </ul>

          </li>

          <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Event Setup<b class="caret"></b></a>
            <ul class="dropdown-menu">
			<li><a href="<?php echo base_url() ?>admin/venues"><i class="icon-home icon-large icon-Black"></i>  Maintain Event Venue</a></li>
              <li><a href="<?php echo base_url() ?>admin/event_setup"><i class="icon-edit icon-large icon-Black"></i>  Maintain Event Session</a></li>
            </ul> 
          </li>
           <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Event Management<b class="caret"></b></a>
            <ul class="dropdown-menu">
			<li><a href="<?php echo base_url() ?>admin/invitation_url"><i class="icon-plus icon-large icon-Black"></i>  Invitation URL</a></li>
              <li><a href="<?php echo base_url() ?>admin/email_notice_to_clients"><i class="icon-pencil  icon-large icon-Black"></i>  Email Notice to Clients</a></li>
			  <li><a href="<?php echo base_url() ?>admin/attendance_check"><i class="icon-check icon-large icon-Black"></i>  Attendance Check</a></li>
			  <li><a href="<?php echo base_url() ?>admin/session_summary"><i class="icon-list icon-large icon-Black"></i>  Session Summary</a></li>
			  <li><a href="<?php echo base_url() ?>admin/email_unregistered_customers"><i class="icon-pencil  icon-large icon-Black"></i>  Email to Unregistered Customers</a></li>
			  <li><a href="<?php echo base_url() ?>admin/unregistered_customers_report"><i class="icon-list icon-large icon-Black"></i>  Unregistered Customers Report</a></li>
			  <li><a href="<?php echo base_url() ?>admin/onsite_registration"><i class="icon-plus icon-large icon-Black"></i>  Onsite Registration</a></li>
            </ul> 
          </li>
		  
		  <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Report<b class="caret"></b></a>
            <ul class="dropdown-menu">
			<li><a href="<?php echo base_url() ?>admin/registration_chun_report"><i class="icon-list icon-large icon-Black"></i>  Registration Chun Report</a></li>
              <li><a href="<?php echo base_url() ?>admin/email_notice_to_client"><i class="icon-pencil  icon-large icon-Black"></i>  Email Notice to Clients</a></li>
			  <li><a href="<?php echo base_url() ?>admin/attendance_vs_registration_report"><i class="icon-list icon-large icon-Black"></i>  Attendance vs Registration Report</a></li>
			  <li><a href="<?php echo base_url() ?>admin/dashboard"><i class="icon-home icon-large icon-Black"></i>  Dashboard</a></li>
			  
            </ul> 
          </li>
		  
		  <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:void(0)">Master<b class="caret"></b></a>
            <ul class="dropdown-menu">
			<li><a href="<?php echo base_url() ?>admin/roles"><i class="icon-th"></i>Role</a></li>
            <?php /*<li class="<?php echo setActive("countries")?>"><a href="<?php echo base_url() ?>admin/countries"><i class="icon-th"></i>Country</a></li>*/?>
            <li><a href="<?php echo base_url() ?>admin/states"><i class="icon-th"></i>State</a></li>
            <li><a href="<?php echo base_url() ?>admin/cities"><i class="icon-th"></i>City</a></li>
			<li><a href="<?php echo base_url() ?>admin/bulk_registrations"><i class="icon-th"></i>Bulk Registration</a></li>
            </ul> 
          </li>
		  
        </ul>

      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<div class="clr"></div>