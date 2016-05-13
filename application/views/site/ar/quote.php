
	<div class="blog-single page">

		<div class="section-title">
			<h1 class="title">طلب تطوير/صيانة موقع </h1>
			<p align="center" dir="rtl">هناك  العديد من العوامل التي تؤثر علي  تطوير  المواقع على شبكة الإنترنت ، بناء علي هذه العوامل يمكن تحديد تكلفة تطوير الموقع.<br />
			  أرسل لنا معلومات الموقع الذي تريده عبر النموذج التالي و سنتواصل معك بأقرب وقت  ممكن.</p>
<p class="description">&nbsp;</p>
		</div>

		<div class="container">
        <div class="blog-main three-fourths">

		<?php // Change the css classes to suit your needs    
            
            $attributes = array('class' => '', 'id' => '');
            echo form_open_multipart('Quote', $attributes);
			
				echo $this->session->flashdata('message');
						if(!empty($error)){
							echo $error;
							}
			 ?>
            
            <h4 class="sub-title">معلومات الاتصال</h4>
            <p>
                    <label for="name">الاسم <span class="required">*</span></label>
                    <?php echo form_error('name'); ?>
                    <input id="name" type="text" name="name" maxlength="100" value="<?php echo set_value('name'); ?>"  />
            </p>
            
            <p>
                    <label for="email">البريد الالكتروني  <span class="required">*</span></label>
                    <?php echo form_error('email'); ?>
                    <input id="email" type="text" name="email" maxlength="100" value="<?php echo set_value('email'); ?>"  />
            </p>
            
            <p>
                    <label for="phone">هاتف</label>
                    <?php echo form_error('phone'); ?>
                    <input id="phone" type="text" name="phone" maxlength="50" value="<?php echo set_value('phone'); ?>"  />
            </p>
            
            <p>
                   <br /> 
       	  <h4 class="sub-title">بيانات الموقع الالكتروني</h4>
                   <label for="project_type">نوع المشروع</label>
                   
                    <?php /*?><?php echo form_error('project_type'); ?>
                    
                            <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                            <br>
          <input id="project_type" name="project_type" type="radio" class="" value="New Website" <?php echo $this->form_validation->set_radio('project_type', 'New Website', TRUE); ?> />
          <label for="project_type" class="">موقع جديد</label>
            
                            <input id="project_type" name="project_type" type="radio" class="" value="Website Redesign" <?php echo $this->form_validation->set_radio('Website Redesign', 'option2'); ?> />
                            <label for="project_type" class="">إعادة تصميم الموقع</label>
                            
                            <input id="project_type" name="project_type" type="radio" class="" value="New Features Added to an Existing Website" <?php echo $this->form_validation->set_radio('New Features Added to an Existing Website', 'option2'); ?> />
                            <label for="project_type" class="">ميزات جديدة يراد إضافتها إلى الموقع الحالي</label>
            </p><?php */?>
            
            <?php echo form_error('project_type'); ?>
                    
                            <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                            <br>
          <input id="project_type" name="project_type" type="radio" class="" value="New Website" <?php echo $this->form_validation->set_radio('project_type', 'New Website', TRUE); ?> />
          <label for="project_type" class="">موقع جديد</label>
            
                            <input id="project_type" name="project_type" type="radio" class="" value="Website Redesign" <?php echo $this->form_validation->set_radio('Website Redesign', 'option2'); ?> />
                            <label for="project_type" class="">إعادة تصميم الموقع</label>
                            
                            <input id="project_type" name="project_type" type="radio" class="" value="New Features Added to an Existing Website" <?php echo $this->form_validation->set_radio('New Features Added to an Existing Website', 'option2'); ?> />
                            <label for="project_type" class="">ميزات جديدة يراد  إضافتها إلى الموقع الحالي</label>
            </p>
            
            
            <p>
                    <label for="domain_name">اسم الدومين</label>
                    <?php echo form_error('domain_name'); ?>
                    <input id="domain_name" type="text" name="domain_name" maxlength="150" value="<?php echo set_value('domain_name'); ?>"  />
            </p>
            
            <p>
                    <label for="is_domain_name_purchased">هل تم شراء الدومين؟ <span class="required">*</span></label>
                    <br>
              <?php echo form_error('is_domain_name_purchased'); ?>
                    
                            <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                            <input id="is_domain_name_purchased" name="is_domain_name_purchased" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('is_domain_name_purchased', 'Yes'); ?> />
                            <label for="is_domain_name_purchased" class="">نعم</label>
            
                            <input id="is_domain_name_purchased" name="is_domain_name_purchased" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('is_domain_name_purchased', 'No'); ?> />
                            <label for="is_domain_name_purchased" class="">لا</label>
            </p>
            
            
            <p>
                    <label for="do_you_have_web_hosting">هل لديك استضافة للموقع ؟</label>
                    <br>
              <?php echo form_error('do_you_have_web_hosting'); ?>
                    
                            <?php // Change or Add the radio values/labels/css classes to suit your needs ?>
                            <input id="do_you_have_web_hosting" name="do_you_have_web_hosting" type="radio" class="" value="Yes" <?php echo $this->form_validation->set_radio('do_you_have_web_hosting', 'Yes'); ?> />
                            <label for="do_you_have_web_hosting" class="">نعم</label>
            
                            <input id="do_you_have_web_hosting" name="do_you_have_web_hosting" type="radio" class="" value="No" <?php echo $this->form_validation->set_radio('do_you_have_web_hosting', 'No'); ?> />
                            <label for="do_you_have_web_hosting" class="">لا</label>
            </p>
            
            
            <p>
                    <label for="web_hosting_package">إذا كانت الإجابة بنعم، نرجو تحديد نوع الإستضافة و اسم شركة الاستضافه</label>
                    <?php echo form_error('web_hosting_package'); ?>
                    <input id="web_hosting_package" type="text" name="web_hosting_package" maxlength="200" value="<?php echo set_value('web_hosting_package'); ?>"  />
            </p>
            
            <p>
                
                <br>
          <h4 class="sub-title">تفاصيل الموقع المراد إنشاؤه</h4>
                 <p>
                   <label for="project_type">الخدمات البرمجيه المطلوبه</label>
                   <br>
                   <?php echo form_error('web_development_services_needed'); ?>
                   
                   <?php // Change the values/css classes to suit your needs ?>
                   <input type="checkbox" id="Web_Hosting" name="Web_Hosting" value="Web Hosting" class="" <?php echo set_checkbox('Web_Hosting', 'Web Hosting'); ?>>               
                   <label for="Web_Hosting">إستضافه</label>
                   <br>
<input type="checkbox" id="Domain_Registration" name="Domain_Registration" value="Domain Registration" class="" <?php echo set_checkbox('Domain_Registration', 'Domain Registration'); ?>>               
                   <label for="Domain_Registration">حجز دومين</label>
                   
                   <br>
                   <input type="checkbox" id="Website_Design" name="Website_Design" value="Website Design" class="" <?php echo set_checkbox('Website_Design', 'Website Design'); ?>>               
                   <label for="web_development_services_needed">تصميم موقع</label>
                   
                   <br>
                   <input type="checkbox" id="Website_Re_Design" name="Website_Re_Design" value="Website Re-Design" class="" <?php echo set_checkbox('Website_Re_Design', 'Website Re-Design'); ?>>               
                   <label for="Website_Re_Design">إعاده تصميم موقع</label>
                   <br>
                   <br/> 
                   
                   <input type="checkbox" id="SEO" name="SEO" value="SEO" class="" <?php echo set_checkbox('SEO', 'SEO'); ?>>               
                   <label for="SEO">SEO<br>
                   </label>
                   
                   <input type="checkbox" id="Database_Developmen" name="Database_Developmen" value="Database Developmen" class="" <?php echo set_checkbox('Database_Developmen', 'Database Developmen'); ?>>               
                   <label for="Database_Developmen">تطوير قاعدة البيانات</label>
                   
                   <br>
                   <input type="checkbox" id="Bug_Fixing" name="Bug_Fixing" value="Bug Fixing" class="" <?php echo set_checkbox('Bug_Fixing', 'Bug Fixing'); ?>>               
                   <label for="Bug_Fixing">إصلاح خلل في الموقع</label>
                   <br>
                   <br/> 
                   
                   <input type="checkbox" id="Custom_Web_Forms" name="Custom_Web_Forms" value="Custom Web Forms" class="" <?php echo set_checkbox('Custom_Web_Forms', 'Custom Web Forms'); ?>>               
                   <label for="Custom_Web_Forms">تصميم نموذج خاص<br>
                   </label>
                   
                   <input type="checkbox" id="Content_Management_System" name="Content_Management_System" value="Content Management System" class="" <?php echo set_checkbox('Content_Management_System', 'Content Management System'); ?>>               
                   <label for="Content_Management_System"> نظام إدارة المحتوى<br>
                   </label>
                   
                   <input type="checkbox" id="Online_Store" name="Online_Store" value="Online Store" class="" <?php echo set_checkbox('Online_Store', 'Online Store'); ?>>               
                   <label for="Online_Store">متجر الكتروني<br>
                   </label>
                   
                   <input type="checkbox" id="Credit_Card_Processing" name="Credit_Card_Processing" value="Credit Card Processing" class="" <?php echo set_checkbox('Credit_Card_Processing', 'Credit Card Processing'); ?>>               
                   <label for="Credit_Card_Processing">بطاقه إئتمانيه</label>  
                   <br>
                   <br/> 
                   
                   <input type="checkbox" id="Photo_Galleries" name="Photo_Galleries" value="Photo Galleries" class="" <?php echo set_checkbox('Photo_Galleries', 'Photo Galleries'); ?>>               
                   <label for="Photo Galleries">البوم للصور</label>
                   
                   <br>
                   <input type="checkbox" id="Ongoing_Maintenance" name="Ongoing_Maintenance" value="Ongoing Maintenance" class="" <?php echo set_checkbox('Ongoing_Maintenance', 'Ongoing Maintenance'); ?>>               
                   <label for="Ongoing_Maintenance">عقد صيانه للموقع<br>
                   </label>
                    
   
                   <br>
                   <br/> 
                   
                   <input type="checkbox" id="Fix_Hacked_Website" name="Fix_Hacked_Website" value="Fix a Hacked Website" class="" <?php echo set_checkbox('Fix_Hacked_Website', 'Fix a Hacked Website'); ?>>               
                   <label for="Fix_Hacked_Website">إصلاح اخترق الموقع<br>
                   </label>
                   
                   <input type="checkbox" id="Virus_Removal" name="Virus_Removal" value="Website Virus Removal" class="" <?php echo set_checkbox('Virus_Removal', 'Website Virus Removal'); ?>>               
                   <label for="Virus_Removal">إزالة الفيروسات من علي السيرفر او الموقع</label>
                   
                   
                    <br/>
                   
                   
                   </p> 
                 </p>
            </p>
            <p>
              <label for="describe_project">يمكنك كتابه تفاصيل أكثر عن الموقع الذي ترغب بإنشائه في هذا المربع ، كلما كتبت تفاصيل أكثر كلما أستطعنا إعطائك عرض أفضل.</label>
                <?php echo form_error('describe_project'); ?>
                
                                        
                <?php echo form_textarea( array( 'name' => 'describe_project', 'rows' => '5', 'cols' => '80', 'value' => set_value('describe_project') ) )?>
            </p>
            <p>
                    <label for="project_spec">مواصفات المشروع </label>
                    <br>
                    <label>أذا كان لديك ملف للمشروع يمكنك رفعه من هنا . 
<br/>(pdf, doc ,txt, rtf,xls,psd, jpg, png only please) </label>
	<br/> <input type="file" name="userfile" size="20" />

                    <?php echo form_error('project_spec'); ?>
                    
                     </p>                                             
                                    
            <p>
                
                    <?php echo form_error('project_timeline'); ?>
                    
                    <?php // Change the values/css classes to suit your needs ?>
                    <label for="project_type">الجدول الزمني</label>
                   <br>
                   
              		<input id="project_timeline" name="project_timeline" type="radio" class="" value="ASAP" <?php echo $this->form_validation->set_radio('project_timeline', 'ASAP'); ?> />
                    <label for="project_timeline" class="">أريد البدء في المشروع مباشرة<br>
                    </label>
                            
                    <input id="project_timeline" name="project_timeline" type="radio" class="" value="Start Soon" <?php echo $this->form_validation->set_radio('project_timeline', 'Start Soon'); ?> />
                    <label for="project_timeline" class="">سوف أبدء قريبا<br>
                    </label>
                        
                      <input id="project_timeline" name="project_timeline" type="radio" class="" value="I have a Specific Due Date" <?php echo $this->form_validation->set_radio('project_timeline', 'I have a Specific Due Date'); ?> />
                    <label for="project_timeline" class="">لدي تاريخ محدد للبدء بالمشروع</label>
                    <br>
<input id="project_timeline" name="project_timeline" type="radio" class="" value="لا Rush/لا Timeline Set" <?php echo $this->form_validation->set_radio('project_timeline', 'لا Rush/لا Timeline Set'); ?> />
              <label for="project_timeline" class="">لايوجد جدول زمني محدد</label>
                       
          </p> 
            <p>
                
                    <?php echo form_error('project_budget'); ?>
                    <label for="project_type">ميزانية المشروع</label>
                   <br>
              <?php // Change the values/css classes to suit your needs ?>
              
              <input id="project_budget" name="project_budget" type="radio" class="" value="Less than $1,000" <?php echo $this->form_validation->set_radio('project_budget', 'Less than $1,000'); ?> />
              <label for="project_budget" class="">أقل من 1,000$<br>
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
              <label for="project_budget" class="">أكبر من 7,500$</label>
                       
          </p> 
            <p>
             <?php echo form_error('g-recaptcha-response'); ?>
     		 <div class="g-recaptcha" data-sitekey="6Lem8Q8TAAAAAFMS3YRKB16yPzQjPtRyiw9VWfa5"></div>
            </p> 
            
            <p>
                    <?php echo form_submit( 'submit', 'إرسال'); ?>
            </p>
            
            <?php echo form_close(); ?>          

<?php
  $this->load->view('site/includes_ar/sidebar');
?>