<html lang="en">
<head>
  <meta charset="utf-8">
  <title>jQuery UI Datepicker - Default functionality</title>

</head>
<body>
 
<p>Date: <input type="text" id="datepicker"></p>
 
 <script src="<?php echo base_url().'assets/plugin/js/jquery-2.1.4.js';?>"></script>
 <script src="<?php echo base_url().'assets/plugin/js/jquery-ui.min.js';?>"></script>
 <script>
 $(function() {
   $( "#datepicker" ).datepicker();
 });
 </script>
</body>
</html>