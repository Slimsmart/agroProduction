<?php
//start session
session_start();
include('../includes/database.php');

//database connection
$object = new Database();
$error = null;

    $acreage = 10;
  //Displaying all the machines
   	$machinery = mysql_query("SELECT count(id) from machinery;");
        $mac = mysql_result($machinery, 0);	
    
  //Total seeds in kgs
  $seeds = mysql_query("SELECT sum(quantity) from seeds;");
    $seed =mysql_result($seeds, 0);
  
  //Total Fertilizers
  	$fertilizers = mysql_query("SELECT sum(quantity) from fertilizers;");
      $fert = mysql_result($fertilizers, 0);	
				
  //Total chemicals (litres)
  $chemicals = mysql_query("SELECT sum(quantity) from chemicals;");
      $chem = mysql_result($chemicals, 0);
      
  //Total Number of Employees
  $employees = mysql_query("SELECT count(id) from users;");
      $emp = mysql_result($employees, 0);
      
  //Total fuel in litres
  $fuels = mysql_query("SELECT sum(quantity) from fuel;");
      $fuel = mysql_result($fuels, 0);
      
      
   //Used estimates
    $useeds = mysql_query("SELECT sum(seeds) from plant;");
      $useed = mysql_result($useeds, 0);
      
    $ufertilizers = mysql_query("SELECT sum(fertilizers) from plant;");
      $ufertilizer = mysql_result($ufertilizers, 0);
      
    $uchemicals = mysql_query("SELECT sum(chemicals) from spray;");
      $uchemical = mysql_result($uchemicals, 0);
      
    $ufuels_plant = mysql_query("SELECT sum(fuel) from plant;");
      $ufuel_plant = mysql_result($ufuels_plant, 0);
      
    $ufuels_tills = mysql_query("SELECT sum(fuel) from till;");
      $ufuel_till = mysql_result($ufuels_tills, 0);
      
    $ufuels_sprays = mysql_query("SELECT sum(fuel) from spray;");
      $ufuels_spray = mysql_result($ufuels_sprays, 0);
      
    $ufuels_harvests = mysql_query("SELECT sum(fuel) from harvest;");
      $ufuels_harvest = mysql_result($ufuels_harvests, 0);
      
    $total_fuel =$ufuel_plant + $ufuel_till + $ufuels_spray + $ufuels_harvest;//For planting, tilling, spraying, harvesting
?>
	

<html>
<head>
<title></title>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<link href="../css/login.css" rel="stylesheet" type="text/css">
<script src="../javascript/currentdate.js"></script>
<link type="text/css" href="../jquery-ui/css/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />	
		<script type="text/javascript" src="../jquery-ui/js/jquery-1.6.2.min.js"></script>
		<script type="text/javascript" src="../jquery-ui/js/jquery-ui-1.8.16.custom.min.js"></script>
		<script type="text/javascript">
			$(function(){

				// Accordion
				$("#accordion").accordion({ header: "h3" });
	
				// Tabs
				$('#tabs').tabs();
				
			});
		</script>
		

</head>
<body>
<div id="cont">
	<div id="header">
	
	</div>
	<div id="menu">
	<?php
	$mn="admin_menu.php";
	if(file_exists($mn) && is_readable($mn))
	{
	 include_once($mn);
	}
	
	?>
	</div>
	<div id="submenu1">
	<?php
	$admn="admsubmenu.php";
	if(file_exists($admn) && is_readable($admn))
	{
	 include_once($admn);
	}
	
	?>
	</div>
	<div id="content">
	<div id="error" style="color: red;" style="size: a4;">
			
    </div>
	<div id="accordion">
	
	     <div>
			
			<fieldset>
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Summary of Stocks:</a></h3></legend>
				<div>
				<form name="stocks" action="" method="post">
						<table align="center">
						
                 	<tr>               
                	<th>Seeds</th>
                    <td><input type="text" value="<?php echo $seed . " Naira"; ?>" readonly="readonly"/></td>
						<th><label>Fertilizers</label></th>
						<td><input type="text" value="<?php echo $fert . " Naira"; ?>" autofocus=""></td>
						<th><label>Chemicals</label></th>
						<td><input type="text" value="<?php echo $chem . " Litres" ; ?>" readonly=""></td>
						</tr>
                        
                	<tr>               
                	<th>Total Employees</th>
                    <td><input type="text" value="<?php echo $emp ; ?>" readonly="readonly"/></td>
						<th><label>Fuel</label></th>
						<td><input type="text" value="<?php echo $fuel . " Litres"; ?>" autofocus=""></td>
						<th><label>Machineries</label></th>
						<td><input type="text" value="<?php echo $mac; ?>" readonly=""></td>
						</tr>
					
					</table>
					
				</form>
    </fieldset>
    <fieldset>
			
			<legend>	<h3><a href="#" style="color: yellowgreen;">Used Inputs:</a></h3></legend>
				<div>
				<form action="" method="post">
						<table align="center">
						
                       
            	<tr>               
                	<th>Seeds</th>
                    <td><input type="text" value="<?php echo $useed . " Kgs"; ?>" readonly="readonly"/></td>
						<th><label>Fertilizers</label></th>
						<td><input type="text" value="<?php echo $ufertilizer . " Kgs"; ?>" autofocus=""></td>
					
						</tr>
                        
                	<tr>               
                	<th>Chemicals</th>
                    <td><input type="text" value="<?php echo $uchemical. " Litres"; ?>" readonly="readonly"/></td>
						
						<th><label>Fuel</label></th>
						<td><input type="text" value="<?php echo $total_fuel . " Litres"; ?>" readonly=""></td>
						</tr>
					
					</table>
					
				</form>
    </fieldset>
    
    
   
</div>			
</div>
</div>
</div>
<div id="footer">

	<?php
	$foot="../footer.php";
	if(file_exists($foot) && is_readable($foot))
	{
	 include_once($foot);
	}
	?>
</div>
</div>
</body>
</html>