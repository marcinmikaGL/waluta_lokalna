<?php
$nr_nip_usera = $_POST['typ_konta_drop'];
$user_id = klienci_id($nr_nip_usera);
$user_id = klienci($user_id);
$nr_konta = $_POST['nr_konta'];
 
if (stripos($nr_konta, "NIP:") !== false) { 
$nip = str_replace("NIP:",'',$nr_konta); 
$klient_id = klienci_ids($nip);
$spr = 1;

}
if (stripos($nr_konta, "NR UMOWY:") !== false) { 
$nip = str_replace("NR UMOWY:",'',$nr_konta);
$klient_id = klienci_nr_umowy($nip);
$spr = 1;
}



?>
<div style="position: absolute;  z-index: 1000; width: 98%; top:1%; left: 1%;"> 
<div class="modal-dialog" style="width: 79%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onClick="location.href='?page=tranzakcje'"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
         
      </div>
      <div class="modal-body" style="height: 370px; padding: 5px;">

<div class="pole" style="margin-top: 0px; height: 343px;">  
<div class="title-section"><div class="title"><p>Potwierdzenie transakcji</p></div></div> 
      <div class="modal-body" style="padding: 5px;">
       
             
           <div class="row spady" style="margin-left: auto; margin-top: -15px; margin-right: auto;">
               
           <div class="row spady" style="margin-left:0px; width: 103%;"> 
             <div class="pole col-lg-5" style="margin-top: 0px; width: 44%;">
           <div class="title-section"><div class="title"><p>Dane nadawcy</p></div></div>     
           <div class="spady" style="margin-top: -15px !important;">
               Nazwa firmy : <strong><?php echo $user_id['nazwa']; ?></strong> <br>
           NIP : <strong> <?php echo $user_id['nip']; ?></strong> <br>
           nr konta : <strong><?php echo $user_id['nr_umowy']; ?></strong> <br>
           </div>
           </div>       
               
               
           <div class="pole col-lg-5" style="margin-top: 0px; width: 44%; margin-left:9%;">
           <div class="title-section"><div class="title"><p>Dane odbiorcy</p></div></div>  
           <div class="spady" style="margin-top:-15px !important;">
               Nazwa firmy : <strong> <?php echo $klient_id['nazwa']; ?></strong> <br>
           NIP : <strong> <?php echo $klient_id['nip']; ?></strong> <br>
           Nr konta : <strong><?php echo $klient_id['nr_umowy']; ?></strong> <br>
           </div>
           </div>
        <div class=" spady pole col-lg-12" style=" width: 97%; height: 120px;">
            Użytkownik dokonujący przelew : <strong> <?php echo user($_SESSION['user']['id']); ?></strong> <br> 
          Tytuł przelewu : <strong> <?php echo $_POST['tytul'] ; ?></strong> <br>
           Kwota : <strong> <?php echo $_POST['kwota'] ; ?> PLN</strong> <br>
           </div>
               
           </div>    
       <form id="tranzakcja" name="tranzakcja" method="post" action="index.php?page=tranzakcje&add=1">    
           <input type="hidden" name="nr_konta" value="<?php echo $_POST['nr_konta'] ; ?>">
           <input type="hidden" name="obdiorca" value="<?php echo $_POST['odbiorca'] ; ?>">
           <input type="hidden" name="tytul" value="<?php echo $_POST['tytul'] ; ?>">
           <input type="hidden" name="kwota" value="<?php echo $_POST['kwota'] ; ?>">
           <input type="hidden" name="typ_konta_drop" value="<?php echo $_POST['typ_konta_drop'];?>">
               
           <input class="btn" type="submit" value="tak" >  
      <button class="btn" onClick="location.href='?page=tranzakcje'">nie</button>
       </form>
      </div>
  </div>
    
</div>
  </div>
</div>