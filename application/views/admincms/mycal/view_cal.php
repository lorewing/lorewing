<?php $this->load->view("admincms/includes/top.php"); ?>
<style type="text/css">
		.calendar {
			font-family: Arial; font-size: 12px;
		}
		table.calendar {
			margin: auto; border-collapse: collapse;
		}
		.calendar .days td {
			width: 80px; height: 80px; padding: 4px;
			border: 1px solid #999;
			vertical-align: top;
			background-color: #DEF;
		}
		.calendar .days td:hover {
			background-color: #FFF;
		}
		.calendar .highlight {
			font-weight: bold; color: #00F;
		}
	</style>
    
	<div id="content_container" class="row">
		
		<div class="columns large-12">
		
			<p>Welcome to the <?= $this->config->item('site_title'); ?> Content Management System.</p>
			
            <?php echo $calendar; ?>
		
		</div>
	</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('.calendar .day').click(function() {
			day_num = $(this).find('.day_num').html();
			day_data = prompt('Enter Stuff', $(this).find('.content').html());
			if (day_data != null) {
				
				$.ajax({
					url: window.location,
					type: 'POST',
					data: {
						day: day_num,
						data: day_data
					},
					success: function(msg) {
						location.reload();
					}						
				});
				
			}
			
		});
		
	});
		
	</script>
<?php $this->load->view("admincms/includes/footer.php"); ?>
