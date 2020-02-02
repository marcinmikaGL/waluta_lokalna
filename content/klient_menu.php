<?php 
if($_SESSION['user']['type'] == 0){ ?>

<div class="navbar">
  <div class="navbar-inner" style="width: 610px; margin-top:-20px; padding:10px 1px 10px 13px; margin-left: auto; margin-right: auto;">
    <ul class="nav">
        <li><button class="btn"  data-toggle="modal" data-target="#user_add">dodaj użytkownika</button></li> 
        <li><button class="btn" id="biznes" onClick="location.href='?page=kli&add_klient2=1'">dodaj konto biznes</button></li> 
        <li><button class="btn" data-toggle="modal" data-target="#dodaj_pry">dodaj konto konsument</button></li> 
        <li><button class="btn" onClick="location.href='?page=user_view'">przeglądaj użytkowników</button></li>  
         </ul>
  </div>
</div>
<?php }


if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '1' ){
    
?>
<div class="alert alert-success alert_top">
Dodano użytkownika do systemu.  <?php echo $error ; ?>
<button type="button" class="close" data-dismiss="alert">x</button>
</div>

    <?php }
    
    if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '2' ){
    
?>
<div class="alert alert-success alert_top">
Dodano konto do systemu. <?php echo $error ; ?>   
<button type="button" class="close" data-dismiss="alert">x</button>
</div>

    <?php }
    
    if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '3' ){
    
?>
<div class="alert alert-success alert_top">
Dane zostały pomyślnie zmienione.  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>

    <?php }
    
    
    
if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '4' ){
    
?>
<div class="alert alert-success alert_top">
Przypisanio użytkownika do klienta.  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>

    <?php }    
    