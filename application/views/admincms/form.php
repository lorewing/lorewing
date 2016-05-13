		
			<div class="row" id='admin_section'>
				
				<div class="row">
				
					
					<div class="large-8 columns text-justify" id="content_portal">
					
						<h3>Add Project</h3>
						
						<?= form_open('admincms/form'); ?>
						
							<?php echo $this->session->flashdata('project_added'); ?>
							
							<?php echo validation_errors('<p class=\'error\'>'); ?>
						
							<ul class="no-bullet">
							
								<li>	
									<label>Project Name</label>
									<?= form_input(array('placeholder' => 'Project Name', 'type' => 'text', 'name' => 'project_name', 'value' => set_value('project_name'))); ?>
								</li>
								
								<li>	
									<label>Project Start Date</label>
									<?= form_input(array('placeholder' => 'Project Start Date', 'type' => 'text', 'name' => 'project_start', 'id' => 'project_start_date', 'value' => set_value('project_start'))); ?>
								</li>
								
								<li>	
									<label>Project End Date</label>
									<?= form_input(array('placeholder' => 'Project End Date', 'type' => 'text', 'name' => 'project_end', 'id' => 'project_end_date', 'value' => set_value('project_end'))); ?>
								</li>
								
								<li>	
									<label>Project Landing Page URL</label>
									<?= form_input(array('placeholder' => 'Project Landing URL', 'type' => 'text', 'name' => 'landing_page_url', 'value' => set_value('landing_page_url'))); ?>
								</li>
								
								<li>
									<label>Project Name in OpenEMS. Must match OpenEMS exactly.</label>
									<?= form_input(array('placeholder' => 'Project Name in OpenEMS and Landing Page. Example: Garrison', 'type' => 'text', 'name' => 'project_name_openems', 'value' => set_value('project_name_openems'))); ?>
								</li>
								
								<li>
									<label>Mailing List ID for Project.</label>
									<?= form_input(array('placeholder' => 'Mailing List ID for Flyer to Send. Example: 51', 'type' => 'text', 'name' => 'project_mailinglist_id', 'value' => set_value('project_mailinglist_id'))); ?>
								</li>

								<li>
									<label>Mailing ID for Agent Flyer.</label>
									<?= form_input(array('placeholder' => 'Mailing ID to send Flyer to Agent. Example: 52', 'type' => 'text', 'name' => 'agent_mailing_id', 'value' => set_value('agent_mailing_id'))); ?>
								</li>

								<li>
									<label>Mailing ID for Investor Flyer.</label>
									<?= form_input(array('placeholder' => 'Mailing ID to send Flyer to Investor. Example: 53', 'type' => 'text', 'name' => 'investor_mailing_id', 'value' => set_value('investor_mailing_id'))); ?>
								</li>
                                
                                <li>
									<label>Project Download URL</label>
									<?= form_input(array('placeholder' => 'Project Download URL', 'type' => 'text', 'name' => 'project_url', 'value' => set_value('project_url'))); ?>
								</li>
                                								
								<li>
									<?= form_submit(array('value' => 'Add Project', 'name' => 'save_profile', 'class' => 'button radius tiny right')); ?>
								</li>
							
							</ul>
						
						<?= form_close(); ?>
					
					</div>
				
				</div>			
								
			</div>
			
