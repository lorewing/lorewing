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
<?php
/*Just for your server-side code*/
header('Content-Type: text/html; charset=ISO-8859-1');
?>
<div class="navbar">
  <?php 
$role_id=$this->session->userdata('role_id');   
  $site_logo=$this->general->getSettingValue("site_logo");?>
	<div><img src="<?php echo ImagePath().lang('header_image')?>"/>
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
        
        <?php if($role_id!=CUSTOMER_NAME) { ?>
         <li class="<?php echo setActive("user")?>"><a href="<?php echo base_url() ?>account/user/edit"><?php echo lang('profile');?></a></li>
         
         <?php }?>
           <li class="divider"></li>
          <li><a href="<?php echo base_url() ?>account/signin/logout"><?php echo lang('logout');?></a></li>
        </ul>
        

      </div>
      
       <?php if($role_id==CUSTOMER_NAME) { ?>
<?php /*?>	           <ul class="nav pull-right">
               
        <li class="<?php echo setActive("user")?>">
        
        <a href="<?php echo base_url() ?>account/signin/setLang/">
		
		<img src="<?php echo ImagePath().'login/'.lang('p_top_image_fr');?>" width="79" height="15" />
        
        </a>
        </li>
         </ul><?php */?>
         
         <?php }?>
	  
	  <div class="nav-collapse">

        <ul class="nav">
		<?php $parent_menus=$this->general->getMenus(true);
		
		if(!empty($parent_menus)){
			
			foreach($parent_menus as $parent_menu){ 

			?>
          <?php if($this->general->checkRoleMenu($parent_menu->id)){ 
			
			if($parent_menu->url_type=='external'){ 
				$main_menu_url=$parent_menu->url;
			}else{
				$main_menu_url=base_url().$parent_menu->url;
			}	          
          ?>
         <li class="dropdown"> <a data-toggle="dropdown" class="dropdown-toggle" href="<?php echo $main_menu_url;?>" target="<?php echo $parent_menu->target;?>">
         
		 
		 <?php if($this->session->userdata('lang')=='french'){ 
		 
		echo utf8_decode($parent_menu->title_fr);   
		
		}else{
			echo $parent_menu->title;   
		} 
			?>
			
			 
         </a>

		<?php $sub_menus=$this->general->getMenus(false,$parent_menu->id);
		
		if(!empty($sub_menus)){
			?><ul class="dropdown-menu">

			<?php foreach($sub_menus as $sub_menu){ 
			
			if($sub_menu->url_type=='external'){ 
				$menu_url=$sub_menu->url;
			}else{
				$menu_url=base_url().$sub_menu->url;
			}			
			
			?>
            <?php if($this->general->checkRoleMenu($sub_menu->id)){ ?>
             <li><a href="<?php echo $menu_url;?>" target="<?php echo $sub_menu->target;?>">

			 

		 <?php if($this->session->userdata('lang')=='french'){ 
		 
		echo utf8_decode($sub_menu->title_fr);   
		
		}else{
			echo $sub_menu->title;   
		} 
			?>
			

			 
			 
			 </a></li>
             
             <?php }?>
           
			<?php }?> </ul><?php }?>
          </li><?php }?>
		  <?php }}?>
        </ul>

      </div>
      <!--/.nav-collapse --> 
    </div>
  </div>
</div>
<div class="clr"></div>