<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Plaintech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A virtualisation platform created for . Copyright 2013 Hogeschool van Amsterdam & .">
    <meta name="author" content="Team VIRT6, ITopia">

    <!-- Stylesheets -->
    <link href="../page_files/bootstrap/css//bootstrap.css" rel="stylesheet">
    <link href="../page_files/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
    <link href="../page_files/more.css" rel="stylesheet">

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
            <a class="brand" href="/../index.html"><img src="/page_files/logo.png"></a>
            <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
            <div class="nav-collapse collapse">
              <ul class="nav">
         
             

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Plaintech<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/../loginportal.php">Login</a></li>
                    
                  </ul>
                </li>
                
                <li><a href="/pages/loginorregister.php">Order</a></li>
                
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact<b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li><a href="/pages/contact.php">Contact form</a></li>
                    <li><a href="/pages/faq.php">FAQ</a></li>
                  </ul>
                </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!-- /.navbar-inner -->
        </div><!-- /.navbar -->

      </div> <!-- /.container -->
    </div><!-- /.navbar-wrapper -->



    <div class="container">

      <h1>Contact</h1>
      <p>Use this form to get in contact with Plaintech.</p>
      
<?php
session_start(); // zorg ervoor dat session_start ALTIJD bovenaan ALLES van je pagina staat, anders werkt het niet!
 

// E-mailadres van de ontvanger
$mail_ontv = 'plaintech@druif.eu'; // <<<----- voer jouw e-mailadres hier in!

// Speciale checks voor naam en e-mailadres
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    // naam controle
    if (empty($_POST['naam']))
        $naam_fout = 1;
    // e-mail controle
    if (function_exists('filter_var') && !filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            $email_fout = 1;
    // antiflood controle
    if (!empty($_SESSION['antiflood']))
    {
        $seconde = 20; // 20 seconden voordat dezelfde persoon nog een keer een e-mail mag versturen
        $tijd = time() - $_SESSION['antiflood'];
        if($tijd < $seconde)
            $antiflood = 1;
    }
}

// Kijk of alle velden zijn ingevuld - naam mag alleen uit letters bestaan en het e-mailadres moet juist zijn
if (($_SERVER['REQUEST_METHOD'] == 'POST' && (!empty($antiflood) || empty($_POST['naam']) || !empty($naam_fout) || empty($_POST['mail']) || !empty($email_fout) || empty($_POST['bericht']) || empty($_POST['onderwerp']))) || $_SERVER['REQUEST_METHOD'] == 'GET')
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if (!empty($naam_fout))
            echo '<p>Uw naam is niet ingevuld.</p>';
        elseif (!empty($email_fout))
            echo '<p>Uw e-mailadres is niet juist.</p>';
        elseif (!empty($antiflood))
            echo '<p>U mag slechts &eacute;&eacute;n bericht per ' . $seconde . ' seconde versturen.</p>';
        else
            echo '<p>U bent uw naam, e-mailadres, onderwerp of bericht vergeten in te vullen.</p>';
    }
        
  // HTML e-mail formlier
  echo '<form method="post" action="' . $_SERVER['REQUEST_URI'] . '" />
  <p>
  <div class="controls">
      <label for="naam">Name:</label>
      <input class="span5" type="text" id="naam" name="naam" value="' . (isset($_POST['naam']) ? htmlspecialchars($_POST['naam']) : '') . '" /><br />
      
      <label for="mail">E-mailadres:</label>
      <input class="span5" type="text" id="mail" name="mail" value="' . (isset($_POST['mail']) ? htmlspecialchars($_POST['mail']) : '') . '" /><br />
      
      <label for="onderwerp">Subject:</label>
      <input class="span5" type="text" id="onderwerp" name="onderwerp" value="' . (isset($_POST['onderwerp']) ? htmlspecialchars($_POST['onderwerp']) : '') . '" /><br />
      
      <label for="bericht">Message:</label>
      <textarea class="span5" id="bericht" name="bericht">' . (isset($_POST['bericht']) ? htmlspecialchars($_POST['bericht']) : '') . '</textarea><br />
      
      <input class="btn btn-success" type="submit" name="submit" value=" Versturen " />
 </div>
  </p>
  </form>';
}
// versturen naar
else
{      
  // set datum
  $datum = date('d/m/Y H:i:s');
    
  $inhoud_mail = "===================================================\n";
  $inhoud_mail .= "Ingevulde contact formulier " . $_SERVER['HTTP_HOST'] . "\n";
  $inhoud_mail .= "===================================================\n\n";
  
  $inhoud_mail .= "Naam: " . htmlspecialchars($_POST['naam']) . "\n";
  $inhoud_mail .= "E-mail adres: " . htmlspecialchars($_POST['mail']) . "\n";
  $inhoud_mail .= "Bericht:\n";
  $inhoud_mail .= htmlspecialchars($_POST['bericht']) . "\n\n";
    
  $inhoud_mail .= "Verstuurd op " . $datum . " via het IP adres " . $_SERVER['REMOTE_ADDR'] . "\n\n";
    
  $inhoud_mail .= "===================================================\n\n";
  
  // --------------------
  // spambot protectie
  // ------
  // van de tutorial: http://www.phphulp.nl/php/tutorial/beveiliging/spam-vrije-contact-formulieren/340/
  // ------
  
  $headers = 'From: ' . htmlspecialchars($_POST['naam']) . ' <' . $_POST['mail'] . '>';
  
  $headers = stripslashes($headers);
  $headers = str_replace('\n', '', $headers); // Verwijder \n
  $headers = str_replace('\r', '', $headers); // Verwijder \r
  $headers = str_replace("\"", "\\\"", str_replace("\\", "\\\\", $headers)); // Slashes van quotes
  
  $_POST['onderwerp'] = str_replace('\n', '', $_POST['onderwerp']); // Verwijder \n
  $_POST['onderwerp'] = str_replace('\r', '', $_POST['onderwerp']); // Verwijder \r
  $_POST['onderwerp'] = str_replace("\"", "\\\"", str_replace("\\", "\\\\", $_POST['onderwerp'])); // Slashes van quotes
  
  if (mail($mail_ontv, $_POST['onderwerp'], $inhoud_mail, $headers))
  {
      // zorg ervoor dat dezelfde persoon niet kan spammen
      $_SESSION['antiflood'] = time();
      
      echo '<h1>Het contactformulier is verzonden</h1>
      
      <p>Bedankt voor het invullen van het contactformulier. We zullen zo spoedig mogelijk contact met u opnemen.</p>';
  }
  else
  {
      echo '<h1>Het contactformulier is niet verzonden</h1>
      
      <p><b>Onze excuses.</b> Het contactformulier kon niet verzonden worden.</p>';
  }
}
?>




    </div> <!-- /container -->

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="../page_files/jquery.js"></script>
    <script src="../page_files/bootstrap-transition.js"></script>
    <script src="../page_files/bootstrap-alert.js"></script>
    <script src="../page_files/bootstrap-modal.js"></script>
    <script src="../page_files/bootstrap-dropdown.js"></script>
    <script src="../page_files/bootstrap-scrollspy.js"></script>
    <script src="../page_files/bootstrap-tab.js"></script>
    <script src="../page_files/bootstrap-tooltip.js"></script>
    <script src="../page_files/bootstrap-popover.js"></script>
    <script src="../page_files/bootstrap-button.js"></script>
    <script src="../page_files/bootstrap-collapse.js"></script>
    <script src="../page_files/bootstrap-carousel.js"></script>
    <script src="../page_files/bootstrap-typeahead.js"></script>

  

</body></html>