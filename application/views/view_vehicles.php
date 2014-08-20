<!DOCTYPE html>
<html lang="en"> 
    <!--
        Vehicle View File
        WJD : 08/12/2014
    -->
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>"> 
    
    <!-- Load DataTable JavaScript -->
    <script type="text/javascript" language="javascript" src="<?php echo $this->config->item('base_url') ; ?>application/views/DataTables/media/js/jquery.js"></script>
    <script type="text/javascript" language="javascript" src="<?php echo $this->config->item('base_url') ; ?>application/views/DataTables/media/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf-8">
            $(document).ready(function() {
		$('#example').dataTable();
            } );
    </script>
    
     <!-- Override some default bootstrap colors -->
     <!-- Load DataTable CSS -->
     <style type="text/css">
        @import "<?php echo $this->config->item('base_url') ; ?>application/views/DataTables/media/css/demo_page.css";
	@import "<?php echo $this->config->item('base_url') ; ?>application/views/DataTables/media/css/jquery.dataTables.css"; 
        
        body { background:lightgray }
        .page-header{background-color:#269abc}
     </style>
</head>
<body>    
<div id="wrapper">   
<div id="page-content-wrapper"> 
<div class="content-header">  
<div class="page-content inset"> 
<div class="row"> 
<div class="col-md-12"> 
<div class="col-md-12">    
<!-- 
    If we have query return values then build a table and 
    list the values
--> 

<?php echo $table ; ?>

<!-- This form handles the events for querying for data -->
<form role="form" action=<?php echo base_url(); ?> method="post">
   <div class="form-group">
       <br> 
          Vehicle Stock Number: <input type="text" name="vehicle">
          <input type="submit" value="Submit">
   </div>   
   <div class="form-group">  
          Vehicle Make: <input type="text" name="make">
          Vehicle Model: <input type="text" name="model">
          <input type="submit" value="Submit" width="48">      
   </div>
   <button name="full" type="submit" value="full" class="btn btn-default">Full Listing</button>
   <button name="highlow" type="submit" value="highlow" class="btn btn-default">Invoice Price High-Low</button>
   <button name="lowhigh" type="submit" value="lowhigh" class="btn btn-default">Invoice Price Low-High</button>
</form>  
</div> 
</div>
</div>
</div>
</div> 
</div> 
</div>    
</body>    
</html>
