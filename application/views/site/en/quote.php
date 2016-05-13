
	<div class="blog-single page">

		<div class="section-title">
			<h1 class="title">Request a Website Development Quote</h1>
			<p class="description">There are many aspects of web site development, that determine the cost to build it. Some things you need to consider are: website design, logo design, PHP programming, database development, content management, and ecommerce/credit card processing. All of these things need taken into consideration when forming a website quote to build.

The more detail you provide about your website development needs, the better I can understand and can give you an accurate estimate to what it will cost to develop your website.

Receiving a web development quote from submitting this form in no way obligates you to any web development services. To request a quote to build your website, please fill in the form below.

* fields are required. The more details you provide to me though, the more accurate cost I can provide.</p>
		</div>

		<div class="container">
        <div class="blog-main three-fourths">
		<?php // Change the css classes to suit your needs    
            
            $attributes = array('class' => '', 'id' => '');
            echo form_open_multipart('en/Quote', $attributes);
			
				echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
			 ?>
            
            <h4 class="sub-title">Contact Information</h4>
            <p>
                    <label for="name">Name <span class="required">*</span></label>
                    <?php echo form_error('name'); ?>
                    <input id="name" type="text" name="name" maxlength="100" value="<?php echo set_value('name'); ?>"  />
            </p>
            
            <p>
                    <label for="email">Email <span class="required">*</span></label>
                    <?php echo form_error('email'); ?>
                    <input id="email" type="text" name="email" maxlength="100" value="<?php echo set_value('email'); ?>"  />
            </p>
            
            <p>
                    <label for="phone">Phone</label>
                    <?php echo form_error('phone'); ?>
                    <input id="phone" type="text" name="phone" maxlength="50" value="<?php echo set_value('phone'); ?>"  />
            </p>
            
            <p>
                   <br /> 
       	  <h4 class="sub-title">Website Information</h4>
                   <label for="project_type">Project Type</label>
                    <?php echo form_error('project_type'); ?>
                    
                            <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                            <br>
          <input id="project_type" name="project_type" type="radio" class="" value="New Website" <?php echo $this->form_validation->set_radio('project_type', 'New Website', TRUE); ?> />
          <label for="project_type" class="">New Website</label>
            
                            <input id="project_type" name="project_type" type="radio" class="" value="Website Redesign" <?php echo $this->form_validation->set_radio('Website Redesign', 'option2'); ?> />
                            <label for="project_type" class="">Website Redesign</label>
                            
                            <input id="project_type" name="project_type" type="radio" class="" value="New Features Added to an Existing Website" <?php echo $this->form_validation->set_radio('New Features Added to an Existing Website', 'option2'); ?> />
                            <label for="project_type" class="">New Features Added to an Existing Website</label>
            </p>
            
            
            <p>
                    <label for="domain_name">Domain Name</label>
                    <?php echo form_error('domain_name'); ?>
                    <input id="domain_name" type="text" name="domain_name" maxlength="150" value="<?php echo set_value('domain_name'); ?>"  />
            </p>
            
            <p>
                    <label for="is_domain_name_purchased">Is Domain Name Purchased? <span class="required">*</span></label>
                    <br>
              <?php echo form_error('is_domain_name_purchased'); ?>
                    
                            <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                            <input id="is_domain_name_purchased" name="is_domain_name_purchased" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('is_domain_name_purchased', 'Yes'); ?> />
                            <label for="is_domain_name_purchased" class="">Yes</label>
            
                            <input id="is_domain_name_purchased" name="is_domain_name_purchased" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('is_domain_name_purchased', 'No'); ?> />
                            <label for="is_domain_name_purchased" class="">No</label>
            </p>
            
            
            <p>
                    <label for="do_you_have_web_hosting">Do You Have Web Hosting</label>
                    <br>
              <?php echo form_error('do_you_have_web_hosting'); ?>
                    
                            <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                            <input id="do_you_have_web_hosting" name="do_you_have_web_hosting" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('do_you_have_web_hosting', 'Yes'); ?> />
                            <label for="do_you_have_web_hosting" class="">Yes</label>
            
                            <input id="do_you_have_web_hosting" name="do_you_have_web_hosting" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('do_you_have_web_hosting', 'No'); ?> />
                            <label for="do_you_have_web_hosting" class="">No</label>
            </p>
            
            
            <p>
                    <label for="web_hosting_package">If yes, web hosting company name and package</label>
                    <?php echo form_error('web_hosting_package'); ?>
                    <input id="web_hosting_package" type="text" name="web_hosting_package" maxlength="200" value="<?php echo set_value('web_hosting_package'); ?>"  />
            </p>
            
            <p>
                
                <br>
          <h4 class="sub-title">Website Project Details</h4>
                 <p>
                   <label for="project_type">Web Development Services Needed</label>
                   <br>
                   <?php echo form_error('web_development_services_needed'); ?>
                   
                   <?php // Change the values/css classes to suit your needs ?>
                   <input type="checkbox" id="Web_Hosting" name="Web_Hosting" value="Web Hosting" class="" <?php echo set_checkbox('Web_Hosting', 'Web Hosting'); ?>>               
                   <label for="Web_Hosting">Web Hosting</label>
                   <br>
<input type="checkbox" id="Domain_Registration" name="Domain_Registration" value="Domain Registration" class="" <?php echo set_checkbox('Domain_Registration', 'Domain Registration'); ?>>               
                   <label for="Domain_Registration">Domain Registration</label>
                   
                   <br>
                   <input type="checkbox" id="Website_Design" name="Website_Design" value="Website Design" class="" <?php echo set_checkbox('Website_Design', 'Website Design'); ?>>               
                   <label for="web_development_services_needed">Website Design</label>
                   
                   <br>
                   <input type="checkbox" id="Website_Re_Design" name="Website_Re_Design" value="Website Re-Design" class="" <?php echo set_checkbox('Website_Re_Design', 'Website Re-Design'); ?>>               
                   <label for="Website_Re_Design">Website Re-Design</label>
                   <br>
                   <br/> 
                   
                   <input type="checkbox" id="SEO" name="SEO" value="SEO" class="" <?php echo set_checkbox('SEO', 'SEO'); ?>>               
                   <label for="SEO">SEO<br>
                   </label>
                   
                   <input type="checkbox" id="Database_Developmen" name="Database_Developmen" value="Database Developmen" class="" <?php echo set_checkbox('Database_Developmen', 'Database Developmen'); ?>>               
                   <label for="Database_Developmen">Database Development</label>
                   
                   <br>
                   <input type="checkbox" id="Bug_Fixing" name="Bug_Fixing" value="Bug Fixing" class="" <?php echo set_checkbox('Bug_Fixing', 'Bug Fixing'); ?>>               
                   <label for="Bug_Fixing">Bug Fixing</label>
                   <br>
                   <br/> 
                   
                   <input type="checkbox" id="Custom_Web_Forms" name="Custom_Web_Forms" value="Custom Web Forms" class="" <?php echo set_checkbox('Custom_Web_Forms', 'Custom Web Forms'); ?>>               
                   <label for="Custom_Web_Forms">Custom Web Forms<br>
                   </label>
                   
                   <input type="checkbox" id="Content_Management_System" name="Content_Management_System" value="Content Management System" class="" <?php echo set_checkbox('Content_Management_System', 'Content Management System'); ?>>               
                   <label for="Content_Management_System">Content Management System<br>
                   </label>
                   
                   <input type="checkbox" id="Online_Store" name="Online_Store" value="Online Store" class="" <?php echo set_checkbox('Online_Store', 'Online Store'); ?>>               
                   <label for="Online_Store">Online Store<br>
                   </label>
                   
                   <input type="checkbox" id="Credit_Card_Processing" name="Credit_Card_Processing" value="Credit Card Processing" class="" <?php echo set_checkbox('Credit_Card_Processing', 'Credit Card Processing'); ?>>               
                   <label for="Credit_Card_Processing">Credit Card Processing</label>  
                   <br>
                   <br/> 
                   
                   <input type="checkbox" id="Photo_Galleries" name="Photo_Galleries" value="Photo Galleries" class="" <?php echo set_checkbox('Photo_Galleries', 'Photo Galleries'); ?>>               
                   <label for="Photo Galleries">Photo Galleries</label>
                   
                   <br>
                   <input type="checkbox" id="Ongoing_Maintenance" name="Ongoing_Maintenance" value="Ongoing Maintenance" class="" <?php echo set_checkbox('Ongoing_Maintenance', 'Ongoing Maintenance'); ?>>               
                   <label for="Ongoing_Maintenance">Ongoing Maintenance<br>
                   </label>
                    
   
                   <br>
                   <br/> 
                   
                   <input type="checkbox" id="Fix_Hacked_Website" name="Fix_Hacked_Website" value="Fix a Hacked Website" class="" <?php echo set_checkbox('Fix_Hacked_Website', 'Fix a Hacked Website'); ?>>               
                   <label for="Fix_Hacked_Website">Fix a Hacked Website<br>
                   </label>
                   
                   <input type="checkbox" id="Virus_Removal" name="Virus_Removal" value="Website Virus Removal" class="" <?php echo set_checkbox('Virus_Removal', 'Website Virus Removal'); ?>>               
                   <label for="Virus_Removal">Website Virus Removal</label>
                   
                   
                    <br/>
                   
                   
                   </p> 
                 </p>
            </p>
            <p>
              <label for="describe_project">Describe your web development project in detail below. The more details you can supply to me, the more accurately I can give a estimate of time and cost to build your website project.</label>
                <?php echo form_error('describe_project'); ?>
                
                                        
                <?php echo form_textarea( array( 'name' => 'describe_project', 'rows' => '5', 'cols' => '80', 'value' => set_value('describe_project') ) )?>
            </p>
            <p>
                    <label for="project_spec">Project Spec</label>
                    <br>
                    <label>If you have a website project spec that you would like to include, upload it here. 
(pdf, doc ,txt, rtf,xls,psd, jpg, png only please) </label>
	<input type="file" name="userfile" size="20" />

                    <?php echo form_error('project_spec'); ?>
                    
                     </p>                                             
                                    
            <p>
                
                    <?php echo form_error('project_timeline'); ?>
                    
                    <?php // Change the values/css classes to suit your needs ?>
                    <label for="project_type">Project Timeline</label>
                   <br>
                   
              		<input id="project_timeline" name="project_timeline" type="radio" class="" value="ASAP" <?php echo $this->form_validation->set_radio('project_timeline', 'ASAP'); ?> />
                    <label for="project_timeline" class="">ASAP<br>
                    </label>
                            
                    <input id="project_timeline" name="project_timeline" type="radio" class="" value="Start Soon" <?php echo $this->form_validation->set_radio('project_timeline', 'Start Soon'); ?> />
                    <label for="project_timeline" class="">Start Soon<br>
                    </label>
                        
                      <input id="project_timeline" name="project_timeline" type="radio" class="" value="I have a Specific Due Date" <?php echo $this->form_validation->set_radio('project_timeline', 'I have a Specific Due Date'); ?> />
                    <label for="project_timeline" class="">I have a Specific Due Date</label>
                    <br>
<input id="project_timeline" name="project_timeline" type="radio" class="" value="No Rush/No Timeline Set" <?php echo $this->form_validation->set_radio('project_timeline', 'No Rush/No Timeline Set'); ?> />
              <label for="project_timeline" class="">No Rush/No Timeline Set</label>
                       
          </p> 
            <p>
                
                    <?php echo form_error('project_budget'); ?>
                    <label for="project_type">Project Budget</label>
                   <br>
              <?php // Change the values/css classes to suit your needs ?>
              
              <input id="project_budget" name="project_budget" type="radio" class="" value="Less than $1,000" <?php echo $this->form_validation->set_radio('project_budget', 'Less than $1,000'); ?> />
              <label for="project_budget" class="">< $1,000<br>
                    </label>
                            
                    <input id="project_budget" name="project_budget" type="radio" class="" value="$1,000 - $2,500" <?php echo $this->form_validation->set_radio('project_budget', '$1,000 - $2,500'); ?> />
              <label for="project_budget" class="">$1,000 - $2,500<br>
                    </label>
                        
                      <input id="project_budget" name="project_budget" type="radio" class="" value="$2,500 - $5,000" <?php echo $this->form_validation->set_radio('project_budget', '$2,500 - $5,000'); ?> />
                    <label for="project_budget" class="">$2,500 - $5,000</label>
                    <br>
                    <input id="project_budget" name="project_budget" type="radio" class="" value="$5,000 - $7,500" <?php echo $this->form_validation->set_radio('project_budget', '$5,000 - $7,500'); ?> />
                      <label for="project_budget" class="">$5,000 - $7,500<br>
                      </label>
                      
                      <input id="project_budget" name="project_budget" type="radio" class="" value="More than $7,500" <?php echo $this->form_validation->set_radio('project_budget', 'More than $7,500'); ?> />
              <label for="project_budget" class="">> $7,500</label>
                       
          </p> 
            <p>
             <?php echo form_error('g-recaptcha-response'); ?>
     		 <div class="g-recaptcha" data-sitekey="6Lem8Q8TAAAAAFMS3YRKB16yPzQjPtRyiw9VWfa5"></div>
            </p> 
            
            <p>
                    <?php echo form_submit( 'submit', 'Submit'); ?>
            </p>
            
            <?php echo form_close(); ?>          

<?php
  $this->load->view('site/includes/sidebar');
?>