<?php
if($_SERVER["HTTPS"] != "on")
{
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
} 
include_once('content/header.php'); 

if ($_SESSION['zalogowany'] == 1){ 
if(isset($_GET['page']) && $_GET['page'] == 'home'){ include_once('./content/home.php'); }
// nowy kontakt
if(isset($_GET['page']) && $_GET['page'] == 'kli'){ include_once('./content/klienci.php'); }

if(isset($_GET['page']) && $_GET['page'] == 'user_view'){ include_once('./content/user_view.php'); }
// klienci
if(isset($_GET['page']) &&  $_GET['page'] == 'oferty'){include_once('./content/oferty.php');}
//ksiegow
if(isset($_GET['page']) && $_GET['page'] == 'zapotrzebowania'){include_once('./content/zapotrzebowania.php');}
//pośrednicy
if(isset($_GET['page']) && $_GET['page'] == 'tranzakcje'){include_once('./content/tranzakcje.php');}
//potential_client

if(isset($_GET['page']) &&  $_GET['page'] == 'slownik'){include_once('./content/slownik.php');}
//wycena
if(isset($_GET['page']) &&  $_GET['page'] == 'wysylka'){include_once('./content/wysylka.php');}
//ustawienia
if(isset($_GET['page']) &&  $_GET['page'] == 'haslo'){include_once('./content/zmien_haslo.php');}

// strona głowna
  }
else { 
include_once('content/login.php'); 
    
}

include_once('content/footer.php');

?>