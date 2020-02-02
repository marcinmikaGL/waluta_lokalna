<form class="add_user" id="pry_add" action="?page=kli&add=<?php if($set == 1){echo 3;} else { echo 2; } ?>" method="POST">
     
    
     <input name="typ_konta_drop" type="hidden" value="1">
     <input name="ids" value="<?php echo $_GET['id']; ?>" type="hidden">

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
   

  <?php if($set != 1){ ?> 
              <div class="control-group">
 	
   
 <label class="control-label" for="user">wybierz użytkownika<sup>*</sup>:</label>    
     <select id="user_prv" placeholder="wybierz użytkownika" name="uzytkownik" class="testsel" required/>
     <option value="0">&nbsp;</option>
         <?php 
     $user_drop = sql_q('users');
     $n = count($user_drop);
       for($i=0;$i<$n;$i++){ 
     if($user_drop[$i]['type'] == 3) {   
           ?>
         <option value="<?php echo $user_drop[$i]['id']; ?>">[<?php echo $user_drop[$i]['login']; ?>] <?php echo $user_drop[$i]['imie']; ?> <?php echo $user_drop[$i]['nazwisko']; ?></option>    
       <?php  }} ?> 
     </select>

 </div>
  <?php } ?>
                   <div class="control-group">        
                 <label class="control-label" for="nazwa_konta">nazwa konta:</label>   
            <div class="input-group">
               
  <span class="input-group-addon"> <input name="akt" <?php if($set == 1 && $klienty['aktywny'] == 1 ){ ?> checked="checked" <?php } ?>  value="1" type="checkbox"></span>
  <input maxlength="250" readonly="readonly" <?php if($set == 1){ ?> value="<?php echo $klienty['nazwa']; ?>" <?php } ?> type="text" name="naz" id="naz_prv"  placeholder="nazwa konta"  class="form-control">
</div>
                   </div>
              
               
      <div class="control-group">
<label class="control-label" for="nr umowy">Numer umowy:<sup>*</sup></label>
<input maxlength="15" style="width: 100%;" onkeypress="return cyfry(this, event)" <?php if($set == 1){ ?> value="<?php echo $klienty['nr_umowy']; ?>" <?php } ?> type="text" id="nr_umowy" name="nr_umowy" placeholder="numer umowy" required/>
 </div>
              
              
               <div class="control-group">
<label class="control-label" for="nr umowy">Numer karty:<sup>*</sup></label>
<input maxlength="16" style="width: 100%;" <?php if($set == 1){ ?> value="<?php echo $klienty['nr_karty']; ?>" <?php } ?> onkeypress="return cyfry(this, event)" type="text" id="nr_karty" name="nr_karty" placeholder="numer karty" required/>
 </div>
               <div class="control-group">
       <div style="float: left; width: 45%;">  
                <label class="control-label" for="nr_umowy">Data opłaty:</label>
              
          <div  class='input-group date col-lg-12' id='datetimepicker1'>
            
                    <input placeholder="data opłaty" name="data_oplaty" <?php if($set == 1){ ?> value="<?php echo $klienty['data_oplaty']; ?>" <?php } ?>  id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd/MM/yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-required="true" close-text="Close"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>   
       </div>
              <div style="float: right; width: 45%;">     
                        <label class="control-label" for="nr_umowy">Data ważności konta:</label>
              
          <div  class='input-group date col-lg-12' id='datetimepicker1'>
            
                    <input placeholder="data umowy" <?php if($set == 1){ ?> value="<?php echo $klienty['data_umowy']; ?>" <?php } ?>  name="data_umowy" id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd/MM/yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-required="true" close-text="Close"  />
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
  
              <label class="control-label" for="user">Poziom Rozliczeń<sup>*</sup>:</label>    
     <select multiple="multiple" name="poz_roz[]" class="testsel">
     <?php
       $poziom_rozliczen = sql_q('poziom_rozliczen'); 
             $n = count($poziom_rozliczen);
    
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
                                            <input style="width: 100%;" maxlength="5"  onkeypress="return cyfry2(this, event)" type="text" <?php if($set == 1){ ?> value="<?php echo $klienty['prowizja']; ?>" <?php } ?>  id="prowizja" name="prowizja_b" placeholder="prowizja" class="form-control">
  <span class="input-group-addon">%</span>
</div>

                <div style="float: right; width: 45%; margin-top: -60px;">
					<label style="margin-top: 7px;" class="control-label" for="pojemnosc">Pojemność konta:</label>
					
					  <input style="width: 100%;" <?php if($set == 1){ ?> value="<?php echo $klienty['limit']; ?>" <?php } ?>  onkeypress="return cyfry2(this, event)" type="text" id="pojemnosc" name="pojemnosc" placeholder="Pojemność konta">
                </div>
                </div> 
              
              
               
              
                   <div class="control-group">
					<label class="control-label" for="nazwa">Procent zwrotu:</label>                
                                        
                           
                                        <div class="input-group">
  <span class="input-group-addon"> <input nazwa= "procent_zwrotu_active" value="1" type="checkbox"></span>
  <input type="text" name="procet_zwrotu" <?php if($set == 1){ ?> value="<?php echo $klienty['procent_zwrotu']; ?>" <?php } ?>  onkeypress="return cyfry2(this, event)" class="form-control">
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
    <textarea maxlength="255" name="uwagi" <?php if($set == 1){ ?> value="<?php echo $klienty['uwagi']; ?>" <?php } ?>  id="notatka" style="width: 100%; height: 200px;" placeholder="Notatka"></textarea>     
</div>
     
     <div class="control-group" >
    <label class="control-label" for="komunikat">Komunikat techniczny:</label>
    <textarea  maxlength="255"  name="komunikat" id="komunikat" style="width: 100%; height: 200px;" placeholder="Komunikat techniczny"><?php if($set == 1){ echo $klienty['komunikat'];   } ?></textarea>     
</div> 
  
     <div class="control-group" >
         <input type="hidden" name="nip" value="0">
   <?php if($_GET['type'] != 1){ ?>           
         <input class="btn" style="width: 15%; float: left;" type="submit" value="dodaj">    
   <?php  } else { ?>
            <input class="btn" style="width: 15%; float: left;" type="submit" value="zmień">    
             
     <?php    }
          ?>
     </div>
         
              
      </div>             
               
    
      </div>
            
            </form>
          