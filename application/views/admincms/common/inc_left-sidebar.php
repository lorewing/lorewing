<?php /*?><div class="span2">
 <?php $user_id=$this->session->userdata('user_id');?>
  <div class="member-box round-all"> <a><img src="<?php echo ImagePath() ?>member_ph.png" class="member-box-avatar" /></a> <span> 
    <a><?php echo $this->session->userdata('username')?></a><br/>
     <?php 	$user_id=$this->session->userdata('user_id');?>
    <span class="member-box-links"><a href="<?php echo base_url() ?>account/signin/logout">Logout</a></span> </span> </div>
    <?php $selectedMenu=$this->session->userdata('selectedMenu');?>
      <div class="sidebar-nav">
        <div class="well" style="padding: 8px 0;">
          <ul class="nav nav-list">
            <li class="nav-header">Master</li>
			<?php if(isset($admin_setup)){?>
			<li class="<?php echo setActive("maintain_power_user")?>"><a href="<?php echo base_url() ?>admin/maintain_power_user"><i class="icon-user icon-large icon-Black"></i>  Maintain Power User</a></li>

              <li class="<?php echo setActive("maintain_sales_director")?>"><a href="<?php echo base_url() ?>admin/maintain_sales_director"><i class="icon-user icon-large icon-Black"></i>  Maintain Sales Director</a></li>

              <li class="<?php echo setActive("maintain_sales_manager")?>"><a href="<?php echo base_url() ?>admin/maintain_sales_manager"><i class="icon-user icon-large icon-Black"></i>  Maintain Sales Manager</a></li>

              <li class="<?php echo setActive("maintain_sales_representative")?>"><a href="<?php echo base_url() ?>admin/maintain_sales_representative"><i class="icon-user icon-large icon-Black"></i>  Maintain Sales Representative</a></li>

              <li class="<?php echo setActive("maintain_session_type")?>"><a href="<?php echo base_url() ?>admin/maintain_session_type"><i class="icon-user icon-large icon-Black"></i>  Maintain Session Type</a></li>
			  
			  
			  
			<li class="<?php echo setActive("stores")?>"><a href="<?php echo base_url() ?>admin/stores"><i class="icon-th"></i> Maintain Stores</a></li>

			<?php }else if(isset($account_setup)){?>
			<li class="<?php echo setActive("manage_user_account")?>"><a href="<?php echo base_url() ?>admin/manage_user_account"><i class="icon-cog icon-large icon-Black"></i>  Manage User Account</a></li>

              <li class="<?php echo setActive("manage_client_account")?>"><a href="<?php echo base_url() ?>admin/manage_client_account"><i class="icon-cog icon-large icon-Black"></i>  Manage Client Account</a></li>

              <li class="<?php echo setActive("reset_password")?>"><a href="<?php echo base_url() ?>admin/reset_password"><i class="icon-lock icon-large icon-Black"></i>  Reset Password</a></li>
			<?php }else if(isset($event_setup)){?>
			<li class="<?php echo setActive("maintain_event_value")?>"><a href="<?php echo base_url() ?>admin/maintain_event_value"><i class="icon-home icon-large icon-Black"></i>  Maintain Event Venue</a></li>
              <li class="<?php echo setActive("maintain_event_session")?>"><a href="<?php echo base_url() ?>admin/event_setup"><i class="icon-edit icon-large icon-Black"></i>  Maintain Event Session</a></li>
			<?php }else if(isset($event_management)){?>
			<li class="<?php echo setActive("invitation_url")?>"><a href="<?php echo base_url() ?>admin/invitation_url"><i class="icon-plus icon-large icon-Black"></i>  Invitation URL</a></li>
              <li class="<?php echo setActive("email_notice_to_clients")?>"> <a href="<?php echo base_url() ?>admin/email_notice_to_clients"><i class="icon-pencil  icon-large icon-Black"></i>  Email Notice to Clients</a></li>
			  <li class="<?php echo setActive("attendance_check")?>"><a href="<?php echo base_url() ?>admin/attendance_check"><i class="icon-check icon-large icon-Black"></i>  Attendance Check</a></li>
			  <li class="<?php echo setActive("session_summary")?>"><a href="<?php echo base_url() ?>admin/session_summary"><i class="icon-list icon-large icon-Black"></i>  Session Summary</a></li>
			  <li class="<?php echo setActive("email_unregistered_customers")?>"><a href="<?php echo base_url() ?>admin/email_unregistered_customers"><i class="icon-pencil  icon-large icon-Black"></i>  Email to Unregistered Customers</a></li>
			  <li class="<?php echo setActive("unregistered_customers_report")?>"><a href="<?php echo base_url() ?>admin/unregistered_customers_report"><i class="icon-list icon-large icon-Black"></i>  Unregistered Customers Report</a></li>
			  <li class="<?php echo setActive("onsite_registration")?>"><a href="<?php echo base_url() ?>admin/onsite_registration"><i class="icon-plus icon-large icon-Black"></i>  Onsite Registration</a></li>
			<?php }elseif(isset($report)){?>
			<li class="<?php echo setActive("registration_chun_report")?>"><a href="<?php echo base_url() ?>admin/registration_chun_report"><i class="icon-list icon-large icon-Black"></i>  Registration Chun Report</a></li>
              <li class="<?php echo setActive("email_notice_to_client")?>"><a href="<?php echo base_url() ?>admin/email_notice_to_client"><i class="icon-pencil  icon-large icon-Black"></i>  Email Notice to Clients</a></li>
			  <li class="<?php echo setActive("attendance_vs_registration_report")?>"><a href="<?php echo base_url() ?>admin/attendance_vs_registration_report"><i class="icon-list icon-large icon-Black"></i>  Attendance vs Registration Report</a></li>
			  <li class="<?php echo setActive("dashboard")?>"><a href="<?php echo base_url() ?>admin/dashboard"><i class="icon-home icon-large icon-Black"></i>  Dashboard</a></li>
			<?php }else{?>
			<li class="<?php echo setActive("roles")?>"><a href="<?php echo base_url() ?>admin/roles"><i class="icon-th"></i>Role</a></li>
            <?php /*<li class="<?php echo setActive("countries")?>"><a href="<?php echo base_url() ?>admin/countries"><i class="icon-th"></i>Country</a></li>*/?>
         <?php /*?>   <li class="<?php echo setActive("states")?>"><a href="<?php echo base_url() ?>admin/states"><i class="icon-th"></i>State</a></li>
            <li class="<?php echo setActive("cities")?>"><a href="<?php echo base_url() ?>admin/cities"><i class="icon-th"></i>City</a></li>
            <li class="<?php echo setActive("venues")?>"><a href="<?php echo base_url() ?>admin/venues"><i class="icon-th"></i>Venue</a></li>
			<?php }?>
          </ul>
       </div>
      </div>
  <!--/.well --> 
</div><?php */?>
