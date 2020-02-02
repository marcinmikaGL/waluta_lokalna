<div class="container" style="width: 100%;">

 <?php   if($_SESSION['user']['type'] != 3) { ?>
    <div class="pole" style="width: 100%;">
 <div class="title-section"><div class="title"><p>Komunikaty techniczne</p></div></div>  
 <div class="spady">
     - Brak <br>
 </div>
</div>
 <?php } else { ?>  
 <div class="row">   
    <?php
if(!empty($_GET['id'])&& $_GET['limit'] == 1){ limit($_GET['id'],1000);   echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">'; } ?> 
     
    <div class="col-lg-6" style="min-height: 450px;">
    <div class="pole" style="width: 100%;">
     <div class="title-section"><div class="title"><p>Dane konta</p></div></div>  
         <div class="row spady" style="min-height: 338px;">
           
    <div class="control-group spady col-lg-11" style="margin-top:-15px; margin-left: 10px; margin-bottom: 20px; width: 97%;">
<form  action="?page=<?php echo $_GET['page']; ?>&klient=1" method="post">	
   
 <label class="control-label" for="konto">wybierz konto do którego jesteś przypisany:</label>    
     <select  placeholder="typ konta" name="typ_konta_drop" class="chosen-select" required/>
    
     <?php 
     $user_group = sql_q('users_group');
     
$n = count($user_group); 

for($i=0;$i<$n;$i++){
   $klia = klienci($user_group[$i]['klient_id']);  
      
     ?>
     <option <?php if($klia['aktywny'] == 0) { echo 'style="color:red;"'; } ?>  <?php if($_SESSION['klient_id'] == $user_group[$i]['id']){ ?> selected="selected"  <?php } ?> value="<?php echo $user_group[$i]['id'] ;?>"><?php echo $user_group[$i]['nazwa'];  ?> </option>    
    
<?php 

} ?>
</select>
 <input style="margin-top: 10px;" type="submit" value="zmień">
</form>
 </div>
             
             
   <div class="row" style="margin-left: 5px; font-size:17px; ">
   <div class="col-sm-6">     
         Nazwa konta : <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['nazwa']; ?> </strong> <br>
         Status konta : <strong style="color:#09726B !important;"><?php if($klienci_glowna['aktywny']==0){echo '<font color="red"> NIE AKTYWNE </font>'; } else { echo 'aktywne'; }  ?>  </strong> <br>
         Saldo bieżące : <strong style=" <?php if($klienci_glowna['pojemnosc'] <0){ ?> color:#ff0000 !important;  <?php } else { ?>color:#09726B !important;<?php } ?>"> <?php echo $klienci_glowna['pojemnosc']; ?> </strong> <br>
         Pojemność konta: <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['limit']; ?> </strong> 
        <?php if($klienci_glowna['aktywny'] == 1){ if($klienci_glowna['limit'] < 49999){ ?><br> zwiększ pojemność konta:  <button onClick="location.href='?page=home&limit=1&id=<?php echo $klienci_glowna['id']; ?>'" id="limit" value="<?php echo $klienci_glowna['id']; ?>">+1000</button> <?php } }?> <br>
        Ilość dokonanych transakcji : <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['tranzakcje_w'] + $klienci_glowna['tranzakcje_p']; ?> </strong> <br>     
        Dodaj opis : <button onclick="location.href='?page=home&opis_add=1&ids=<?php echo $klienci_glowna['id']; ?>'">dodaj</button>  <br>
        
         
         </div>
             <div class="col-sm-6">
                 typ konta:  <strong style="color:#09726B !important;"> <?php echo typ_klient($klienci_glowna['typ_konta']); ?> </strong> <br>
                  Możesz przyjąć : <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['przyjecie']; ?> </strong> <br>
         Możesz wydać : <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['dowydania']; ?> </strong> <br>
   
         Debet : <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['debet']; ?> </strong> <br>
         Data ważności debetu : <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['waznosc_debetu']; ?> </strong> <br>
         Data ważności konta : <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['data_umowy']; ?> </strong> <br>
         Data podpisania umowy : <strong style="color:#09726B !important;"> <?php echo $klienci_glowna['data_oplaty']; ?> </strong> <br>
        Dodaj zdjęcie : <button onclick="location.href='?page=home&zdjecie_add=1&ids=<?php echo $klienci_glowna['id']; ?>'">dodaj</button>  
                 
             </div>
             
   </div>     
         </div>    
     </div>
    </div> 
   
 
     
     <div class="col-lg-3" style="font-size:16px;">
    <div class="pole" style="width: 100%; min-height: 160px;">
     <div class="title-section"><div class="title"><p>Zapotrzebowanie i transakcje</p></div></div>  
     <div class="spady" style="margin-top:-10px;">    
         Ilość wystawionych ofert: <strong style="color:#09726B !important;"><?php echo ilosc_ofert($klienci_glowna['id'],1); ?></strong> <br>
         Ilość wystawionych zapotrzebowań: <strong style="color:#09726B !important;"><?php echo ilosc_ofert($klienci_glowna['id'],2); ?></strong> <br>
         Ilość wystawionych referencji: <strong style="color:#09726B !important;"> <?php echo ilosc_referencji($klienci_glowna['id'], 1)  ;?></strong> <br>
         Ilość otrzymanych referencji: <strong style="color:#09726B !important;"> <?php echo ilosc_referencji($klienci_glowna['id'], 2)  ;?></strong> <br>
       
           </div>  
     </div>    
  <div class="pole" style="width: 100%; font-size:16px; min-height: 220px;">
     <div class="title-section"><div class="title"><p>Komunikat techniczny</p></div></div>  
     <div class="spady" style="margin-top:-10px;">    
         <?php echo $klienci_glowna['komunikat']; ?>
     </div>  
     </div>   
                
 </div>
  
 <div class="col-lg-3">
    <div class="pole" style="width: 100%; height: 390px;">
     <div class="title-section"><div class="title"><p>Dane teleadresowe</p></div></div>  
     <div class="spady" style="margin-top:-15px;">
    <?php  if ($klienci_glowna['typ_konta'] == 0 ) { ?> 
         
         
         NIP:  <strong style="color:#09726B !important;"><?php echo $klienci_glowna['nip']; ?></strong> <br>
         Numer konta:  <strong style="color:#09726B !important;"><?php echo $klienci_glowna['nr_umowy']; ?></strong> <br>
         Telefon kontaktowy: <strong style="color:#09726B !important;"><?php echo $klienci_glowna['telefon_firmowy']; ?></strong> <br>
         Telefon stacjonarny / faks : <strong style="color:#09726B !important;"><?php echo $klienci_glowna['fax']; ?></strong> <br>
         Email kontaktowy : <strong style="color:#09726B !important;"><a href="mailto:<?php echo $klienci_glowna['email_firmowy']; ?>"><?php echo $klienci_glowna['email_firmowy']; ?></a></strong> <br>
         Strona internetowa : <strong style="color:#09726B !important;"><a href="<?php echo $klienci_glowna['www']; ?>"><?php echo $klienci_glowna['www']; ?></a></strong> <br>
         
         
         <hr style="margin-bottom: 5px; margin-top: 5px;">
         <strong style="color:#09726B !important;">Adres rejestracji działalności</strong>  <br>
         Ulica : <strong style="color:#09726B !important;"><?php echo $klienci_glowna['adres1']; ?></strong> <br>
         Miasto : <strong style="color:#09726B !important;"><?php echo $klienci_glowna['kod1']; ?> <?php echo $klienci_glowna['miasto1']; ?></strong> <br>
         Województwo : <strong style="color:#09726B !important;"> <?php echo woj($klienci_glowna['woj1']); ?> </strong>
         <hr style="margin-bottom: 5px; margin-top: 5px;">
         <strong style="color:#09726B !important;">Adres prowadzenia działalności</strong>  <br>
             Ulica : <strong style="color:#09726B !important;"><?php echo $klienci_glowna['adres2']; ?></strong> <br>
         Miasto : <strong style="color:#09726B !important;"><?php echo $klienci_glowna['kod2']; ?> <?php echo $klienci_glowna['miasto1']; ?></strong> <br>
         Województwo : <strong style="color:#09726B !important;"> <?php echo woj($klienci_glowna['woj2']); ?> </strong> <br>
         Faktury: <button onclick="location.href='?page=home&faktury_view=1&ids=<?php echo $klienci_glowna['id']; ?>'" type="button">zobacz</button> <br>
    <?php } else { ?>
   Numer umowy : <strong style="color:#09726B !important;"><?php echo $klienci_glowna['nr_umowy']; ?></strong> <br>
   Numer karty : <strong style="color:#09726B !important;"><?php echo $klienci_glowna['nr_karty']; ?></strong> <br>
       
       
    <?php } ?>
     </div>    
     
    </div>
     
       
     
 </div>
     
     
 </div>
 </div>
 <?php } ?>
</div>

  <?php if($_GET['opis_add']==1){ include('content/opis_add.php'); } ?>
  <?php if($_GET['zdjecie_add']==1){ include('content/zdjecie_add.php'); } ?>
  <?php if($_GET['faktury_view']==1){ include('content/faktury_view.php'); } ?>
