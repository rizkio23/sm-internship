<script src="<?php echo base_url().'assets/plugin/js/bootstrap.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/jquery-ui.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/jquery.validate.min.js';?>"></script>
<!-- DATATABLE PLUGINS -->
<script src="<?php echo base_url().'assets/plugin/js/datatables/media/js/jquery.dataTables.min.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/datatables/plugins/bootstrap/dataTables.bootstrap.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/table-managed.js';?>"></script>
<script src="<?php echo base_url().'assets/plugin/js/datatable.js';?>"></script>
<!-- END DATATABLE PLUGINS -->
<script>

	// Datatable
    $(document).ready(function() { 
  		TableManaged.init();
    });

	// Flashdata
	$(document).ready(function(){
      $('.flashdata').delay(2000).fadeOut('slow');
    });

	// Datepicker
	$(document).ready(function(){
		$( "#datepicker" ).datepicker();
	});
	
	// Toggle Visibility Table
	$('#tg').click(function(){
		$('.shows').toggle('fade');
	});

	// Disabled/Undisabled Checkbox
	$(document).on('change','.chkView',function(){
		var row = $(this).closest('tr');
		if($(this).is(':checked'))
		{
			$(row).find('.chkC,.chkR,.chkU,.chkD').prop("disabled",false); 
		}
		else
		{
			$(row).find('.chkC,.chkR,.chkU,.chkD').prop("disabled",true);
		}
			if ($(this).is(':unchecked'))
			{
				$(row).find('.chkC,.chkR,.chkU,.chkD').prop("checked",false);
			}
	});

</script>
</body>
</html>  