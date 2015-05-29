<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Plaintech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A virtualisation platform created for . Copyright 2013 Hogeschool van Amsterdam & .">
    <meta name="author" content="Team VIRT6, ITopia">

    <!-- Stylesheets -->
    <link href="../../page_files/bootstrap/css//bootstrap.css" rel="stylesheet">
    <link href="../../page_files/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../../page_files/more.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
</head>

  <body style="padding-top: 60px;">

    <!-- NAVBAR
    ================================================== -->

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
            <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" href="../../index.html"><img src="../../page_files/logo.png"></a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="../../index.html">Home</a></li>
                <li><a href="../../pages/productinfowebhosting.php">Webhosting</a></li>
                <li><a href="../../pages/productinfoservers.php">Servers</a></li>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Plaintech<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="../../pages/login.php">Login</a></li>
                    <li><a href="../../pages/serveruptime.php">Current server status</a></li>
                  </ul>
                </li>
                
                <li><a href="../../pages/loginorregister.php">Order</a></li>
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="../../pages/contact.php">Contact form</a></li>
                    <li><a href="../../pages/faq.php">FAQ</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->




    <div class="container">

      <h1>vmstatus(</h1>
      <p>Blabla</p>



			<fieldset>

				<legend>This is the status of your server(s)</legend>
 						<a href="overview.php"><input type="button" class="btn btn-success" value="Management Menu"/></a>
					<div id ="ManagementPanel">

					<?php

		
						

session_start();
if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {

header ("Location: no_authentication.php");

}

echo "Welcome ".$_SESSION['username'];
echo "<br>";
echo "<br>";
echo "This in an overview of the servers you currently have";
echo "<br>";
echo "<br>";

include('dbcon.php');
$query = "SELECT * FROM vm_instance WHERE account_id = '$_SESSION[account_id]' AND state = 'RUNNING' OR account_id = '$_SESSION[account_id]' AND state = 'STOPPED' OR account_id = '$_SESSION[account_id]' AND state = 'STOPPING' OR account_id = '$_SESSION[account_id]' AND state = 'STARTING' ";
$mysqlquery = mysql_query($query);

echo "<table>
<tr>
<th>Name</th>
<th>IP Address</th>
<th>State</th>
<th>Advanced</th>

</tr>";


while($result = mysql_fetch_array($mysqlquery))

{
	//echo "Running Vm's of ".$_SESSION['username']; 

	echo "<td>" . $result['name'] . "</td>";
	echo "<td>" . $result['private_ip_address'] . "</td>";
	echo "<td>" . $result['state'] . "</td>";
	echo "<td>"
	?>
	
		<form name="input" method="POST" action="vmstatusnew.php">
		<input type="hidden" name="vmid" value="<?php echo $result["id"]; ?>" type="submit"/>
		<input type="submit" value="Advanced"> 
    </form>

<?php
"</td>";
	echo "</tr>";

	
}
echo "</table>";
?>				
					</div>										
			</fieldset>
</form>

      
      
      

    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../../page_files/jquery.js"></script>
    <script src="../../page_files/bootstrap-transition.js"></script>
    <script src="../../page_files/bootstrap-alert.js"></script>
    <script src="../../page_files/bootstrap-modal.js"></script>
    <script src="../../page_files/bootstrap-dropdown.js"></script>
    <script src="../../page_files/bootstrap-scrollspy.js"></script>
    <script src="../../page_files/bootstrap-tab.js"></script>
    <script src="../../page_files/bootstrap-tooltip.js"></script>
    <script src="../../page_files/bootstrap-popover.js"></script>
    <script src="../../page_files/bootstrap-button.js"></script>
    <script src="../../page_files/bootstrap-collapse.js"></script>
    <script src="../../page_files/bootstrap-carousel.js"></script>
    <script src="../../page_files/bootstrap-typeahead.js"></script>

  

</body></html>