<div style="position: absolute; z-index: 1000; width: 98%; top:1%; left: 1%;"> 
<div class="modal-dialog" style="width: 69%;">
    <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onClick="location.href='?page=tranzakcje'"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body row-fluid" style="height: 780px; padding: 5px; overflow-y: scroll;">
         
              
              
              

<div class="pole">        
        
     <div class="title-section"><div class="title"><p>Wypełnij dane do przelewu</p></div></div>  

<form id="tranzakcja" name="tranzakcja" method="post" action="index.php?page=tranzakcje&trans=2">

    <div class="control-group spady" style="margin-top:-5px;">
        
        <div <?php if($ok !== 1) { ?> style='display: none;'  <?php } ?>class="alert alert-success" id="alert" role="alert">
<?php echo $komunikat; ?>

</div>    
        
        
        
        
        
<div <?php if($error !== 1) { ?> style='display: none;'  <?php } ?>class="alert alert-danger" id="alert" role="alert">
<?php echo $komunikat; ?>

</div>    
    </div>    
<div class="control-group spady" style="margin-top:-5px;">
 <?php      $user_group = klients_group_id_user($_SESSION['user']['id']);
  
 

 ?>
   
 <label class="control-label" for="konto">wybierz konto do którego jesteś przypisany<sup>*</sup>:</label>    
     <select  placeholder="typ konta" name="typ_konta_drop" class="chosen-select" required/>

     <?php
     if($_SESSION['user']['type'] == 0){
    
   $kliencia =  sql_q('klienci_drop');
 //print_r($kliencia);
 $n = count($kliencia); 
    
    for($i=0;$i<$n;$i++){ ?>
 <option value="<?php echo $kliencia[$i]['nip'] ;?>">
[<?php echo $kliencia[$i]['nazwa'];  ?>] NIP:<?php echo $kliencia[$i]['nip'] ?>
 
 </option>    
    
  <?php      
    }
    
    } else {
        $n = count($user_group);
    for($i=0;$i<$n;$i++){
   $klia = klienci($user_group[$i]['klient_id']);  
if($klia['aktywny'] == 1 && $klia['przelwy'] == 1 ){   
     ?>
 <option value="<?php echo $user_group[$i]['nip'] ;?>">
[<?php echo $user_group[$i]['nazwa'];  ?>] NIP:<?php echo $user_group[$i]['nip'] ?>
 
 </option>    
    
    <?php } }

} ?>
</select>

 </div>     
    
 <div class="spady control-group">
<label class="control-label" for="nip">NIP/NR KONTA<sup>*</sup>:</label>
<input style="width: 100%; <?php if($spr !== 1 && isset($_POST['typ_konta_drop'])){ echo 'background-color:red;'; } ?>"  onkeypress="return cyfry(this, event)" type="text" name="nr_konta" placeholder="NIP/NR KONTA" id="autocomplete-ajax" style="position: absolute; z-index: 2; background: transparent;" required/>
 </div>
    
  
               
       <div class="control-group spady">
    <label class="control-label" for="nazwa">nazwa i adres odbiorcy<sup>*</sup>:</label>
    <textarea name="obdiorca" id="nazwa_loader" readonly="readonly" style="width: 100%; height: 200px;" placeholder="Nazwa i adres odbiorcy"></textarea>     
</div>     
    
            
       <div class="control-group spady">
    <label class="control-label" for="nazwa">tytuł przelewu<sup>*</sup>:</label>
    <textarea name="tytul" id="notatka" style="width: 100%; height: 200px;" placeholder="tytuł przelewu" required/></textarea>     
</div>     
  <div class="spady">
    <label for="kwota">Kwota:<sup>*</sup></label>
    <input name="kwota" onkeypress="return cyfry2(this, event)" placeholder="kwota" type="text" class="kwota" required/>
   PLN
    <p>&nbsp; </p>
    <p>
  </div>     
  <button type="submit" class="btn btn-primary btn-sm">Wyślij</button>
</p>

    
</form>    
</div>
 </div>
</div>
</div>

</div>
 
</script>    