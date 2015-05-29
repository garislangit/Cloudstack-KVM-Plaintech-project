

<!--Welcome to the index page of the Plaintech order process. The code that is used in this page is licenced by Plaintech, copyright 2013.-->
<!DOCTYPE html>
<html>
<head>

<title>Contact Form</title>

<link href="style.css" rel="stylesheet" type="text/css" /> <!-- Load stylesheer -->
<script type="text/javascript" src="js/jquery-latest.js"></script> <!-- Load jQuery -->
<script type="text/javascript" src="js/jquery-ui.min.js"></script> <!-- Load Ajax --> <!-- Load general animation settings -->

<!--  Load HTML5 script compactibility for older browsers -->
<!--[if IE]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

</head>
<body>

	<section id="contact"> 

		<header>
       <div class="portalmenu"><a href="logout.php">Log out</a> |
                                <a href="contact.php">Contact</a></div>
			<img src="images/plaintechlogo.jpg" width="640" height="150" alt="test">
		</header>
		<fieldset>
		<legend> Please ask your question. We are happy to help!</legend>
        <a href="management.php"><input type="button" value="Management Menu"/></a>
    
    <fieldset>
<?php
if ($_POST["email"]<>'') {
    $ToEmail = 'plaintech@druif.eu';
    $EmailSubject = 'Contact Form Comment';
    $mailheader = "From: ".$_POST["email"]."\r\n";
    $mailheader .= "Reply-To: ".$_POST["email"]."\r\n";
    $mailheader .= "Content-type: text/html; charset=iso-8859-1\r\n";
    $MESSAGE_BODY = "Name: ".$_POST["name"]."\r\n";
    $MESSAGE_BODY .= "Email: ".$_POST["email"]."\r\n";
    $MESSAGE_BODY .= "Comment: ".nl2br($_POST["comment"])."\r\n";
    mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure");
?>
Your message was sent
<?php
} else {
?>
<form action="contact.php" method="post">
<table width="400" border="0" cellspacing="2" cellpadding="0">
<tr>
<td width="29%" class="bodytext">Your name:</td>
<td width="71%"><input name="name" type="text" id="name" size="32"></td>
</tr>
<tr>
<td class="bodytext">Email address:</td>
<td><input name="email" type="text" id="email" size="32"></td>
</tr>
<tr>
<td class="bodytext">Your Question or Comment:</td>
<td><textarea name="comment" cols="45" rows="6" id="comment" class="bodytext"></textarea></td>
</tr>
<tr>
<td class="bodytext"> </td>
<td align="left" valign="top"><input type="submit" name="Submit" value="Send"></td>
</tr>
</table>
</form>
<?php
};
?>


</html>