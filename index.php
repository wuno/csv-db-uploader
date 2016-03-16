<?php
$assetPath = "inventory-load.php";
$searchPath = "inventory-search.php";
?>
<html>
<head>
<title>CSV Uploader Application By Wuno, Inc. | https://www.wuno.com</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="js/jquery-1.12.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" media="all">
<link type="image/x-icon" href="icons/favicon.ico" rel="shortcut icon">
</head>

<body>
<div class="container">
<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

  <h1>CSV Uploader</h1>

<form method="POST" action="wuno-uploader.php">
    <label for="wuno-inventory">Submit to install CSV file on server</label>
    <input type="hidden" name="wuno-inventory" id="wuno-inventory" value="inventory.csv">
    <input type="submit" value="Install" class="button button-primary button-large">
</form>
<p>Please upload your csv file to the server in the root directory.<br> 
Once the  submit button is clicked the program will install the csv file to the database.<br>
Name the file inventory.csv
</p>
		<div id="inventory" class="table-responsive center-table">

			<div class="form-group pull-right">
    				<input type="text" name="itemID" id="itemID" class="search form-control" placeholder="Search product number">
			</div>
	
			<table id="prods" class="display table center-table" width="100%" >
   				<thead>  
          				<tr>  
            				<th>Product #</th>  
            				<th>Alternate #</th>  
            				<th>Description</th>  
            				<th>On Hand</th>  
	    				      <th>Condition</th>
          				</tr>  
        			</thead>  

				<tbody id="productResults"> 
	
				</tbody>

			</table>
<div id="loader_image"></div>
<div id="loader_message"></div>
		</div>
	   </main><!-- .site-main -->
</div><!-- .content-area -->
</div>
<script type="text/javascript">
var busy = true;
var limit = 15;
var offset = 0;
var itemID = $("#itemID").val();
var assetPath = "<?php echo $assetPath ?>";
var searchPath = "<?php echo $searchPath ?>"; 
</script>
<script type="text/javascript" src="js/loading-scroll.js"></script>
<script type="text/javascript" src="js/load-db.js"></script>
<script type="text/javascript" src="js/search-ajax.js"></script>
<script type="text/javascript" src="js/load-db-ajax.js"></script>
</body>
</html>            


