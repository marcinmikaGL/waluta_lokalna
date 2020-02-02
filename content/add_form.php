<?php
if (!empty($_GET['id'])&& isset($_GET['id'])){ $set = 1;  $klienty = klienci($_GET['id']); } 
if($_GET['type'] == 0){
?>


<form class="add_user" id="konto_<?php if($set == 1){ echo update; } else {?>add<?php }?>" action="index.php?page=kli&add=<?php if($set == 1){ ?>3<?php }else { ?>2<?php } ?>" method="post"> 
      <div class="modal-content">
      <div class="modal-header">
    <?php      
    if (!empty($_GET['id'])&& isset($_GET['id'])){ ?><a href="?page=kli"><span style="float: right; margin-top:-13px; font-size: 18px; color:black;">x</span></a> <?php } else { ?>  
<button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onclick="location.href='?page=kli'"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
    <?php } 
   
    ?>
      </div>
<div class="modal-body row-fluid" style="height: 899px; padding: 5px; overflow-y: scroll;">
                     
                   
<div class="pole col-lg-7" style="margin-top: 0px; height: 180%;">  
<div class="title-section"><div class="title"><p>dodawanie konta biznesowego </p></div></div> 
<div class="spady">
<div class="control-group" style="margin-top: 0px;  <?php if(!empty($_GET['id'])){ ?> display:none; <?php  } ?> ">
  
    <label for="doradcaId">wybierz brokera</label></th><td>
    
    <select id="broker" name="uzytkownik" class="testsel">	
        <option>&nbsp;</option>
 <?php 
     $user_drop = sql_q('users');
     $n = count($user_drop);
       for($i=0;$i<$n;$i++){ 
         if($user_drop[$i]['type'] == 2){  
           ?>
         <option value="<?php echo $user_drop[$i]['id']; ?>">[<?php echo $user_drop[$i]['login']; ?>] <?php echo $user_drop[$i]['imie']; ?> <?php echo $user_drop[$i]['nazwisko']; ?></option>    
       <?php  } } ?> 
</select>
    </div>      
   
        

     
    
     <input name="typ_konta_drop" type="hidden" value="0">
     <input name="ids" value="<?php echo $_GET['id']; ?>" type="hidden">
         


                   <div class="control-group">        
                 <label class="control-label" for="nazwa_konta">nazwa konta<sup>*</sup>:</label>   
            <div class="input-group">
               
                <span class="input-group-addon"> <input  <?php if($set == 1 && $klienty['aktywny'] == 1 ){ ?> checked="checked" <?php } ?> name="akt"  value="1" type="checkbox"></span>
  <input maxlength="250" type="text" name="naz" id="naz" <?php if($set == 1){ ?> value="<?php echo $klienty['nazwa']; ?>" <?php } ?> placeholder="nazwa konta"  class="form-control"  />
</div>
                   </div>
               
               <div style="margin-top:10px;" class="control-group">
					<label class="control-label" for="nip">NIP<sup>*</sup>:</label>
					
                                        <input    title="format nieprawidłowy" <?php if($set == 1){ ?> value="<?php echo $klienty['nip']; ?>" <?php } ?> maxlength="10" onkeypress="return cyfry(this, event)" style="width: 65%;" type="text" id="nip" name="nip" placeholder="nip">
                                          <label style="margin-left: 2px; " class="control-label" for="user">typ umowy:</label>    
     <select style="width: 85px;" placeholder="typ umowy" name="typ_umowy">
         <option <?php if($set == 1 && $klienty['typ_umowy'] == 0){ ?> selected="selected" <?php } ?> value="0">biznes</option>    
         <option <?php if($set == 1 && $klienty['typ_umowy'] == 1){ ?> selected="selected" <?php } ?> v value="1">konsument</option> 
     </select>
                                              </div>
      <div class="control-group">
<label class="control-label" for="nr umowy">Numer konta:<sup>*</sup></label>
<input maxlength="12" style="width: 100%;" onkeypress="return cyfry(this, event)" <?php if($set == 1){ ?> value="<?php echo $klienty['nr_umowy']; ?>" <?php } ?> type="text" name="nr_konta_add" id="nr_konta" placeholder="numer konta" />
 </div>
             
              
               <div class="control-group">
<label class="control-label" for="nr umowy">Numer karty:</label>
<input maxlength="16" minlength="16" style="width: 100%;" <?php if($set == 1){ ?> value="<?php echo $klienty['nr_karty']; ?>" <?php } ?> onkeypress="return cyfry(this, event)" type="text" id="nr_karty" name="nr_karty" placeholder="numer karty">
 </div>
               <div class="control-group">
       <div style="float: left; width: 45%;">  
                <label class="control-label" for="nr_umowy">Data rejestracji:</label>
              
          <div  class='input-group date col-lg-12' id='datetimepicker1'>
            
                    <input placeholder="data opłaty" <?php if($set == 1){ ?> value="<?php echo $klienty['data_oplaty']; ?>" <?php } ?> name="data_oplaty" id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd/MM/yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-="true" close-text="Close"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
       </div>
              <div style="float: right; width: 45%;">     
                        <label class="control-label" for="nr_umowy">ważność konta:</label>
              
          <div  class='input-group date col-lg-12' id='datetimepicker1'>
            
                    <input placeholder="data umowy" <?php if($set == 1){ ?> value="<?php echo $klienty['data_umowy']; ?>" <?php } ?> name="data_umowy" id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd/MM/yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-="true" close-text="Close"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div> <br>
               </div>
              <div style="position: relative; top: 7px; width: 45%;">              
       <label class="control-label" for="user">branża<sup>*</sup>:</label>    
     <select multiple="multiple" placeholder="branża" name="typ_branza[]" class="testsel">
 <?php
        $branza = sql_q('branze');

     $n = count($branza);
     
       for($i=0;$i<$n;$i++){ 
      if(!empty($_GET['id'])){     
      $branze_select = klient_branze_select($_GET['id'],$branza[$i]['id']); 
      }
      ?>
         <option <?php if ($branze_select[0]['branza_id'] == $branza[$i]['id'] && !empty($_GET['id'])){ ?> selected="selected" <?php } ?> value="<?php echo $branza[$i]['id']; ?>"> 
          <?php echo $branza[$i]['nazwa']; ?>
     </option>
       <?php } ?> 
     </select>

 </div>
   
<div style="float: right; width: 45%; position: relative; margin-top: -43px;">            
  
              <label class="control-label" for="user">Poziom Rozliczeń:</label>    
              
            <?php $poziom_rozliczen = sql_q('poziom_rozliczen'); 
             $n = count($poziom_rozliczen);
            for($i=0;$i<$n;$i++){
                  $poziom_spr = poziom_group_id($_GET['id'],$poziom_rozliczen[$i]['id']);
                if ($poziom_spr == $poziom_rozliczen[$i]['id']){ ?>
             
              <input name="poz_roz_backup[]" value="<?php echo $poziom_rozliczen[$i]['id']; ?>" style="display:none;" type="hidden">  
            <?php }} ?> 
              <select multiple="multiple" name="poz_roz[]" class="testsel">
     <?php
       
    
       for($i=0;$i<$n;$i++){
             if(!empty($_GET['id'])){    
           $poziom_spr = poziom_group_id($_GET['id'],$poziom_rozliczen[$i]['id']);
             }
           ?>
         <option <?php if ($poziom_spr == $poziom_rozliczen[$i]['id']){ ?> selected="" <?php }?> value="<?php echo $poziom_rozliczen[$i]['id']; ?>"><?php echo $poziom_rozliczen[$i]['poziom']; ?></option>  
          
          
       <?php }?>
     </select>
              </div>
       <div class="control-group" style="margin-top:25px;">
					<label class="control-label" for="prowizja">Prowizja:</label>
					
                                        <div style="width: 45% !important;" class="input-group">
  <input maxlength="10" <?php if($set == 1){ ?> value="<?php echo $klienty['prowizja']; ?>" <?php } ?> style="width: 100%;"  onkeypress="return cyfry2(this, event)" type="text" id="prowizja" name="prowizja_b" placeholder="prowizja" class="form-control">
  <span class="input-group-addon">%</span>
</div>
       </div>                                        
    
                <div style="float: right; width: 45%; margin-top: -60px;">
					<label style="margin-top: 7px;" class="control-label" for="pojemnosc">Pojemność konta:</label>
					
					  <input <?php if($set == 1){ ?> value="<?php echo $klienty['limit']; ?>" <?php } ?>  maxlength="10" style="width: 100%;" onkeypress="return cyfry2(this, event)" type="text" id="pojemnosc" name="pojemnosc" placeholder="Pojemność konta">
                </div>
              
 
              
   <div class="control-group">
       <div style="width: 45%;">      
<label class="control-label" for="debet">Debet:</label>

<input maxlength="10" style="width: 100%;" <?php if($set == 1){ ?> value="<?php echo $klienty['debet']; ?>" <?php } ?>  onkeypress="return cyfry2(this, event)" type="text" id="debet" name="debet" placeholder="debet">
       </div>
       <div style="float: right; width: 45%; margin-top: -51px;">     
                        <label class="control-label" for="nr_umowy">Data ważności debetu:</label>
              
          <div  class='input-group date col-lg-12' id='datetimepicker1'>
            
                    <input <?php if($set == 1){ ?> value="<?php echo $klienty['waznosc_debetu']; ?>" <?php } ?> placeholder="data umowy" name="data_debetu" id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd/MM/yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-="true" close-text="Close"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
              </div> 
   
   </div>            
    
                   <div class="control-group">
					<label class="control-label" for="nazwa">Procent zwrotu:</label>                
                                        
                           
                                        <div class="input-group">
  <span class="input-group-addon"> <input nazwa= "procent_zwrotu_active" value="1" type="checkbox"></span>
  <input <?php if($set == 1){ ?> value="<?php echo $klienty['procet_zwrotu']; ?>" <?php } ?> maxlength="10" type="text" name="procet_zwrotu" onkeypress="return cyfry2(this, event)" class="form-control">
  <span class="input-group-addon">%</span>
</div>
                                        
				         </div>
                            
    <div class="control-group">
 	
       
 <label class="control-label" for="typ_konta ">Grupy:</label>    
     <select multiple="multiple" placeholder="typ konta" name="typ_konta[]" class="testsel">
         <option <?php if($set == 1 && $klienty['wspoldzielca'] == 1 ){ ?> selected="selected" <?php } ?> value="1">spółdzielca</option>    
         <option <?php if($set == 1 && $klienty['zpp'] == 1 ){ ?> selected="selected" <?php } ?> value="2">członek ZPP</option>
         <option <?php if($set == 1 && $klienty['zapotrzebowania'] == 1 ){ ?> selected="selected" <?php } ?> value="3">dodawanie zapotrzebowań</option>
         <option <?php if($set == 1 && $klienty['przelwy'] == 1 ){ ?> selected="selected" <?php } ?> value="4">wykonywanie przelewów</option>
         <option <?php if($set == 1 && $klienty['historie_tranzakcji'] == 1 ){ ?> selected="selected" <?php } ?> value="5">podgląd historii transakcji</option>
         <option <?php if($set == 1 && $klienty['oferty'] == 1 ){ ?> selected="selected" <?php } ?> value="6">dodawanie ofert</option>
     </select>

 </div>           
              
              
       <div class="control-group" >
    <label class="control-label" for="notatka">Notatka:</label>
    <textarea  maxlength="255" name="uwagi" id="notatka" style="width: 100%; height: 200px;" placeholder="Notatka"><?php if($set == 1){ echo $klienty['uwagi'];   } ?></textarea>     
</div> 
     
<div class="control-group" >
    <label class="control-label" for="komunikat">Komunikat techniczny:</label>
    <textarea  maxlength="255"  name="komunikat" id="komunikat" style="width: 100%; height: 200px;" placeholder="Komunikat techniczny"><?php if($set == 1){ echo $klienty['komunikat'];   } ?></textarea>     
</div>      
     
 <span id="alert" style="color:red;"></span> 
</div>
</div>
          <div class="prawo_klient col-lg-5">
       <div class="pole" style="margin-top: 0;">        
        
     <div class="title-section"><div class="title"><p>Adres rejestacji działalności</p></div></div> 
    <div class="spady control-group">
<label class="control-label" for="adres">Adres:</label>
<input <?php if($set == 1){ ?> value="<?php echo $klienty['adres1']; ?>" <?php } ?>  maxlength="200" style="width: 100%;" type="text" id="adres" name="adres1" placeholder="adres">
 </div>
<div class="spady control-group">
					<label class="control-label" for="kod">kod pocztowy<sup>*</sup>:</label>
					
					  <input <?php if($set == 1){ ?> value="<?php echo $klienty['kod1']; ?>" <?php } ?>  maxlength="6" style="width: 24%;" type="text" id="kod1" name="kod1" placeholder="kod pocztowy" />
                <div style="float: right; width: 53%;">
					<label style="margin-top: 5px;" class="control-label" for="miasto">Miasto:</label>
					
			
                                       <input <?php if($set == 1){ ?> value="<?php echo $klienty['miasto1']; ?>" <?php } ?>  maxlength="250" style="width: 80%; float: right;" type="text" id="miasto" name="miasto1" placeholder="miasto">
                </div>  
                </div>  
 <div class="control-group spady">   
     <label for="wojewodztwo">Województwo</label>
     <select id="wojewodztwo" name="woj1" class="testsel">
	<option value="0"></option>
	<option <?php if($set == 1 && $klienty['woj1'] == 1 ){ ?> selected="selected" <?php } ?>  value="1">dolnośląskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 2 ){ ?> selected="selected" <?php } ?> value="2">kujawsko-pomorskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 3 ){ ?> selected="selected" <?php } ?>  value="3">lubelskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 4 ){ ?> selected="selected" <?php } ?>  value="4">lubuskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 5 ){ ?> selected="selected" <?php } ?>  value="5">łódzkie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 6 ){ ?> selected="selected" <?php } ?>  value="6">małopolskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 7 ){ ?> selected="selected" <?php } ?>  value="7">mazowieckie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 8 ){ ?> selected="selected" <?php } ?>  value="8">opolskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 9 ){ ?> selected="selected" <?php } ?>  value="9">podkarpackie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 10 ){ ?> selected="selected" <?php } ?>  value="10">podlaskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 11 ){ ?> selected="selected" <?php } ?>  value="11">pomorskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 12 ){ ?> selected="selected" <?php } ?>  value="12">śląskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 13 ){ ?> selected="selected" <?php } ?>  value="13">świętokrzyskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 14 ){ ?> selected="selected" <?php } ?>  value="14">warmińsko-mazurskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 15 ){ ?> selected="selected" <?php } ?>  value="15">wielkopolskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 16 ){ ?> selected="selected" <?php } ?>  value="16">zachodniopomorskie</option>
	<option <?php if($set == 1 && $klienty['woj1'] == 17 ){ ?> selected="selected" <?php } ?>  value="17">INTERNATIONAL</option>
</select>
  </div>    
      
     <br>
      </div>
          
              
                 <div class="pole">        
        
     <div class="title-section"><div class="title"><p>Adres wykonywania działalności</p></div></div> 
 <div class=" spady  control-group">
<label class="control-label" for="adres">Adres:</label>
<input <?php if($set == 1){ ?> value="<?php echo $klienty['adres2']; ?>" <?php } ?> style="width: 100%;" type="text" id="adres" name="adres2" placeholder="adres">
 </div>
<div class=" spady  control-group">
					<label class="control-label" for="kod2">kod pocztowy<sup>*</sup>:</label>
					
                                          <input <?php if($set == 1){ ?> value="<?php echo $klienty['kod2']; ?>" <?php } ?> maxlength="6" style="width: 24%;" type="text" id="kod2" name="kod2" placeholder="kod pocztowy" />
                <div style="float: right; width: 53%;">
					<label style="margin-top: 5px;" class="control-label" for="miasto">Miasto:</label>
					
			
                                       <input <?php if($set == 1){ ?> value="<?php echo $klienty['miasto2']; ?>" <?php } ?> maxlength="200" style="width: 80%; float: right;" type="text" id="miasto" name="miasto2" placeholder="miasto">
                </div>  
                </div>
<div class="control-group spady">   
     <label for="wojewodztwo">Województwo</label>
     <select id="wojewodztwo" name="woj2" class="testsel">
<option value="0"></option>
	<option <?php if($set == 1 && $klienty['woj2'] == 1 ){ ?> selected="selected" <?php } ?>  value="1">dolnośląskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 2 ){ ?> selected="selected" <?php } ?> value="2">kujawsko-pomorskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 3 ){ ?> selected="selected" <?php } ?>  value="3">lubelskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 4 ){ ?> selected="selected" <?php } ?>  value="4">lubuskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 5 ){ ?> selected="selected" <?php } ?>  value="5">łódzkie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 6 ){ ?> selected="selected" <?php } ?>  value="6">małopolskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 7 ){ ?> selected="selected" <?php } ?>  value="7">mazowieckie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 8 ){ ?> selected="selected" <?php } ?>  value="8">opolskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 9 ){ ?> selected="selected" <?php } ?>  value="9">podkarpackie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 10 ){ ?> selected="selected" <?php } ?>  value="10">podlaskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 11 ){ ?> selected="selected" <?php } ?>  value="11">pomorskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 12 ){ ?> selected="selected" <?php } ?>  value="12">śląskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 13 ){ ?> selected="selected" <?php } ?>  value="13">świętokrzyskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 14 ){ ?> selected="selected" <?php } ?>  value="14">warmińsko-mazurskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 15 ){ ?> selected="selected" <?php } ?>  value="15">wielkopolskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 16 ){ ?> selected="selected" <?php } ?>  value="16">zachodniopomorskie</option>
	<option <?php if($set == 1 && $klienty['woj2'] == 17 ){ ?> selected="selected" <?php } ?>  value="17">INTERNATIONAL</option>
</select>
  </div>     
     <br>   
      </div>
              
              
                 <div class="pole">        
        
     <div class="title-section"><div class="title"><p>Dane kontaktowe działalności</p></div></div> 
     <div class="spady control-group">
<label class="control-label" for="telefon">Telefon firmowy:</label>
<input <?php if($set == 1){ ?> value="<?php echo $klienty['telefon_firmowy']; ?>" <?php } ?>  maxlength="20" style="width: 100%;"  onkeypress="return cyfry(this, event)" type="text" id="telefon" name="telefon_firmowy" placeholder="telefon">
 </div>
 <div class="spady control-group">
<label class="control-label" for="email">Email firmowy:</label>
<input maxlength="200" style="width: 100%;" <?php if($set == 1){ ?> value="<?php echo $klienty['email_firmowy']; ?>" <?php } ?>  type="email" id="email" name="email_firmowy" placeholder="email">
 </div>
   <div class="spady control-group">
<label class="control-label" for="telefon">fax/stacjonarny:</label>
<input maxlength="20" style="width: 100%;" <?php if($set == 1){ ?> value="<?php echo $klienty['fax']; ?>" <?php } ?>   onkeypress="return cyfry(this, event)" type="text" id="telefon" name="fax" placeholder="telefon">
 </div>
       <div class="spady control-group">
<label class="control-label" for="telefon">Adres strony:</label>
<input maxlength="200" <?php if($set == 1){ ?> value="<?php echo $klienty['www']; ?>" <?php } ?>  style="width: 100%;" type="text" id="telefon" name="www" placeholder="strona www">
 </div>
     
     
      </div>
            
         <div class="pole">        
        
     <div class="title-section"><div class="title"><p>Osoby do kontaktu</p></div></div> 
     <?php for($i=1;$i<=4;$i++)  { ?>
     <div id="kontakt<?php echo $i; ?>">
     <div class="spady control-group">
           <div style="float: left; width: 50%;">
					<label class="control-label" for="imie">Imię:</label>
					
					  <input <?php if($set == 1){ ?> value="<?php echo $klienty['imie'.$i]; ?>" <?php } ?>  maxlength="200" style="width: 72%;" type="text" id="imie" name="imie_k<?php echo $i; ?>" placeholder="imię">
           </div> 
        
                <div style="float: right; width:50%;">
					<label maxlength="200" style="margin-top: 5px;" class="control-label" for="nazwisko">Nazwisko:</label>
					
					  <input <?php if($set == 1){ ?> value="<?php echo $klienty['nazwisko'.$i]; ?>" <?php } ?>  style="width: 72%; float: right;" type="text" id="nazwisko" name="nazwisko_k<?php echo $i; ?>" placeholder="nazwisko">
                </div>
                </div>
 <div class="spady control-group" style="margin-top:-5px;">
<label class="control-label" for="telefon">Telefon:</label>
<input <?php if($set == 1){ ?> value="<?php echo $klienty['telefon'.$i]; ?>" <?php } ?>  maxlength="20" style="width: 100%;"  onkeypress="return cyfry(this, event)" type="tel" id="telefon" name="telefon_k<?php echo $i; ?>" placeholder="telefon">
 </div>
       
         <div class="spady control-group" style="margin-top:-5px;">
<label class="control-label" for="telefon">email:</label>
<input <?php if($set == 1){ ?> value="<?php echo $klienty['email'.$i]; ?>" <?php } ?>  style="width: 100%;" type="email" id="email" name="email_k<?php echo $i; ?>" placeholder="email">
 </div>
         
         
     </div>    
 <?php } ?>    
     
     <div class="row spady"> 
         <div class="col-lg-1" style="float: right; margin-right:30px;">      
     <select id="telefony_ile">
<option value="2">1</option> 
<option value="3">2</option>   
<option value="4">3</option>   
<option value="5">4</option>   
     </select>    
     </div>
     </div> 
      </div>       
              
          
          
          </div>
          <div class="pole col-lg-12">
          <div class="spady control-group" style="height: 50px; padding: 5px;"> 
</form>
              <?php if($set == 1){ 
 if($_SESSION['user']['type'] == 0){ 
    
     ?>
<button class="btn" id="potwierdz"> zmień </button> 
     
     <?php } }else { ?>              
<button   class="btn" id="potwierdz" name="dodaj"> dodaj </button> <?php } ?>
   
<span style="float: right; margin-top:8px;">
     
    <strong style="color:red;">*</strong>- pola oznaczone czerwoną gwiazdką są obowiązkowe</span>
                                        </div>     
                                         
          </div>          
      </div>

  </div>



<?php } else {
    ?>
<div class="modal-content" style="width: 60%; margin-left: auto; margin-right: auto;">
      <div class="modal-header">
    <?php      
    if (!empty($_GET['id'])&& isset($_GET['id'])){ ?><a href="?page=kli"><span style="float: right; margin-top:-13px; font-size: 18px; color:black;">x</span></a> <?php } else { ?>  
        <button type="button" id="zapisz2" style="margin-top: -10px;" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <?php } 
   
    ?>
      </div>
<div class="modal-body row-fluid" style="height: 780px; width: 100%; padding: 5px; overflow-y: scroll;">
         
              
              
              
<div class="pole col-lg-12" style="margin-top: 0px; height: 180%;">  
<div class="title-section"><div class="title"><p>dodawanie konta klienckiego</p></div></div> 
<div class="spady">
      
        <?php
 include('content/add_from_pry.php'); 
    
} ?>
</div>
</div>
</div>
  </div>