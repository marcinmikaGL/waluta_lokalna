<?php 
//error_reporting(0);

session_start();


include_once('./config/config.php');
include_once('./lib/meekrodb.2.3.class.php');
include_once('./functions/global.php'); 
include_once('./functions/session.php');

if(isset($_SESSION['user']['id'])){
           $klient_id_glowna = sql_q('glowna'); 
         $klienci_glowna = klienci($klient_id_glowna['klient_id']);
  }
if($_GET['klient'] == 1 && !empty($_POST['typ_konta_drop'])) {  $_SESSION['klient_id'] = $_POST['typ_konta_drop'] ;  
echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">'; 
     

}      



 $ilewyn = $_GET['ile_wyn'] ;
?> 
<!doctype html>
<html lang="pl">
  <head>
    <title>Zielony [<?php if(isset($_GET['page'])){ echo $_GET['page']; } ?>] <?php echo $_SESSION['user']['id']; ?></title>
    <meta charset="<?php echo my_encoding; ?>">
    <link REL="SHORTCUT ICON" HREF="favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-59299632-1', 'auto');
  ga('send', 'pageview');

</script>  


    <link rel="stylesheet" href="css/prism.css">
  <link rel="stylesheet" href="css/chosen.css">
  <style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
  </style>
  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
   <script src="js/lokalna.js"></script> 
    <script src="js/jquery.sumoselect.min.js"></script>
   <script src="js/jquery.plugin.js"></script>
    <script src="js/jquery.datepick.js"></script>
<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
  <script type="text/javascript" src="js/jquery.mockjax.js"></script>
    <script type="text/javascript" src="js/jquery.autocomplete.js"></script>
  <link rel="stylesheet" href="js/jRating.jquery.css" type="text/css" />
    <script type="text/javascript">

   

 
 
 
                
  var countries = {      
  <?php  $klient_view = sql_q('klienci');
$n = count($klient_view); 
for($i=0;$i<$n;$i++){
if($klient_view[$i]['aktywny'] == 1) {    
if($klienci_glowna['nip'] != $klient_view[$i]['nip'] && $klienci_glowna['nr_umowy'] != $klient_view[$i]['nr_umowy'] ){   
if ( $klient_view[$i]['typ_konta'] == 0) { echo  '"bb'.$klient_view[$i]['id'].$i.'":"NIP: '.$klient_view[$i]['nip'].'",' ; }
echo "\r\n";
echo '"aa'.$i.'":"NR UMOWY:'.$klient_view[$i]['nr_umowy'].'",';
echo "\r\n";
    
}}}
    ?>
"%":"%"    
    
    
    }

 


    </script>
    <script type="text/javascript" src="js/demo.js"></script>
    <link rel="stylesheet" href="js/jRating.jquery.css" type="text/css" /> 
    <link href="css/bootstrap.min.css" rel="stylesheet">
      <link href="css/style.css" rel="stylesheet">
<link href="css/sumoselect.css" rel="stylesheet" />
 <script type="text/javascript">    
        $(document).ready(function () {
            $('.testsel').SumoSelect();
            
            
        });
$(function() {
	$('[id="popupDatepicker"]').datepick();
	$('[id="popupDatepicker"]').datepick({onSelect: showDate});
});


function showDate(date) {
	alert('The date chosen is ' + date);
}

tinymce.init({
    selector: ".edytor",
   menubar : false,
    language : 'pl'
    });
    
    $(document).on('change', '.btn-file :file', function() {
    var input = $(this),
        numFiles = input.get(0).files ? input.get(0).files.length : 1,
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
    input.trigger('fileselect', [numFiles, label]);
});






$(document).ready( function() {
    $('.btn-file :file').on('fileselect', function(event, numFiles, label) {
        console.log(numFiles);
        console.log(label);
    });
    
    
});



$(selector).autocomplete(options); 
 
 

 

 </script>

  </head>
  <body>
      <header>
          &nbsp;
        
              <div class="header"><?php //echo $_SESSION['user']['type']; ?>
              
              </div>   
    
      </header>	
 <?php  if ($_SESSION['zalogowany'] == 1){ ?>     
  
  <nav>
<div class="ctn">
<div class="navbar">
  <div class="navbar-inner">

    <ul class="nav">
<li <?php if (isset($_GET['page']) && $_GET['page'] == 'home') { ?>class="active"<?php $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?page=home">Strona główna</a></li>
<?php if($_SESSION['user']['type'] != 3){ ?> <li <?php if(isset($_GET['page']) &&  $_GET['page'] == 'kli' ||  $_GET['page'] == 'user_view') { ?> class="active" <?php $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?page=kli">Konta</a></li> <?php } ?>
<?php if($_SESSION['user']['type'] != 1 && $_SESSION['user']['type'] != 2){ ?><li <?php if(isset($_GET['page']) &&  $_GET['page'] == 'tranzakcje'){ ?> class="active"<?php $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?page=tranzakcje">Transakcje</a></li> <?php } ?>
<?php if($_SESSION['user']['type'] != 1 && $_SESSION['user']['type'] != 2){ ?><li <?php if(isset($_GET['page']) &&  $_GET['page'] == 'oferty'){ ?>  class="active"<?php $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?page=oferty">Oferty</a></li>  <?php } ?>
<?php if($_SESSION['user']['type'] != 1 && $_SESSION['user']['type'] != 2 ){ ?><li <?php if(isset($_GET['page']) &&  $_GET['page'] == 'zapotrzebowania'){ ?> class="active"<?php $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?page=zapotrzebowania">Zapotrzebowanie</a></li> <?php } ?>
<?php if($_SESSION['user']['type'] == 0) { ?><li <?php if(isset($_GET['page']) &&  $_GET['page'] == 'slownik'){ ?>class="active"<?php $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?page=slownik">Słownik</a></li><?php } ?>
<?php if($_SESSION['user']['type'] == 0){ ?><li <?php if(isset($_GET['page']) &&  $_GET['page'] == 'wysylka'){ ?> class="active"<?php $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?page=wysylka">Wysyłka</a></li> <?php } ?>
<li <?php if(isset($_GET['page']) &&  $_GET['page'] == 'haslo'){ ?> class="active"<?php $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?page=haslo">Zmień hasło</a></li>
<li <?php if(isset($_GET['page']) &&  $_GET['page'] == 'wyloguj'){ ?> class="active"<?php  $_SESSION['LAST_ACTIVITY'] = time(); } ?>><a href="?logout=1">Wyloguj</a></li>    
    </ul>
  </div>
</div>
</div>
    </nav>
 <?php 
 
}  
 // zalogowany koniec 
 ?>