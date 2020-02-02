<div class="pole " style="width: 99%; margin-bottom: 10px; margin-top:-15px; margin-left: auto; margin-right: auto;">
    
    <div class="title-section"><div class="title"><p>Szukaj</p></div></div>
<div class="row" style="margin:0; margin-top:-20px;">
    <form  action="index.php?page=kli" method="POST" id="form">
        <input type="hidden" name="page" value="<?php echo$_REQUEST['page']; ?>">
        <input type="hidden" name="sort" value="1">
      
        
        <div class="col-sm-3 spady"> 
     <div class="control-group">       
     <label for="numer">Numer konta / NIP</label>
<input name="nr_konta_input" onkeypress="return cyfry(this, event)"  <?php if(!empty($_REQUEST['nr_konta_input'])){ ?>  value="<?php echo $_REQUEST['nr_konta_input']; ?>"  <?php } ?> >
     </div>
<div class="control-group">
    <label for="nazwa">Nazwa klienta</label>
    <input  <?php if(!empty($_REQUEST['sort_nazwa'])){ ?>  value="<?php echo $_REQUEST['sort_nazwa']; ?>"  <?php } ?> id="nazwa" name="sort_nazwa" type="text">
     </div>
  
   <div class="control-group">  
       <label for="typ_umowy">Typ konta</label>
    <select name="typ_umowy" class="testsel">     
            <option <?php if($_REQUEST['typ_umowy'] == 0){ ?> selected="selected" <?php } ?> value="0"> &nbsp;</option>
	<option <?php if($_REQUEST['typ_umowy'] == 1){ ?> selected="selected" <?php } ?> value="1">biznes</option>
	<option <?php if($_REQUEST['typ_umowy'] == 2){ ?>  selected="selected" <?php } ?>  value="2">konsument</option>
	
</select>
    </div>  
            
     </div>     
 <div class="col-sm-3 col spady">        
            
 <div class="control-group">       
        
        
   
        <label for="nip">Nr karty</label>
        <input onkeypress="return cyfry(this, event)" <?php if(!empty($_REQUEST['nr_karty']) && empty($_GET['add'])){ ?>  value="<?php echo $_REQUEST['nr_karty']; ?>"  <?php } ?>  id="nr_karty" name="nr_karty" type="text">
 </div>                
      
  <div class="control-group">  
    <label for="email">E-mail firmowy</label>
    <input maxlength="255" id="email" <?php if(!empty($_REQUEST['email'])){ ?>  value="<?php echo $_REQUEST['email']; ?>"  <?php } ?> name="email" type="text">
  </div>           

     <div class="control-group">
      <label for="poziom">Poziom rozliczeń</label>    
      <select id="poziom" name="poziom" class="testsel">
      <option>&nbsp;</option>
        <?php
        $poziom_rozliczen = sql_q('poziom_rozliczen');
       
     $n = count($poziom_rozliczen);
       for($i=0;$i<$n;$i++){ ?>
      <option <?php if($_REQUEST['poziom'] == $poziom_rozliczen[$i]['poziom']){ ?> selected="" <?php } ?>id="<?php echo $poziom_rozliczen[$i]['id']; ?>"><?php echo $poziom_rozliczen[$i]['poziom']; ?></option>  
          
          
       <?php }?>
      </select>
</div>
  
 
       
        </div>           
 <div class="col-sm-2 spady">     
 
<div class="control-group" <?php if($_SESSION['user']['type'] == 2){ echo 'style="display:none;"'; }  ?>>
  
    <label for="doradcaId">Broker</label></th><td>
    
    <select id="broker" name="broker"  placeholder="wybierz brokera"  class="chosen-select">
<option>&nbsp;</option>	
 <?php 
     $user_drop = sql_q('users');
     $n = count($user_drop);
       for($i=0;$i<$n;$i++){ 
         if($user_drop[$i]['type'] == 2){  
           ?>
         <option <?php if($_REQUEST['broker'] == $user_drop[$i]['id']){ ?> selected="" <?php } ?> value="<?php echo $user_drop[$i]['id']; ?>">[<?php echo $user_drop[$i]['login']; ?>] <?php echo $user_drop[$i]['imie']; ?> <?php echo $user_drop[$i]['nazwisko']; ?></option>    
       <?php  } } ?> 
</select>
    </div>                
      <div class="control-group" <?php if($_SESSION['user']['type'] == 2){ echo 'style="display:none;"'; }  ?>
 	
   
 <label class="control-label" for="user">Użytkownik</label>    
 <select  placeholder="wybierz użytkownika" name="uzytkownik" class="chosen-select">
     <option> &nbsp; </option>    
 <?php 
     $user_drop = sql_q('users');
     $n = count($user_drop);
       for($i=0;$i<$n;$i++){ 
         if($user_drop[$i]['type'] != 2){  
           ?>
         <option  <?php if($_REQUEST['uzytkownik'] == $user_drop[$i]['id']){ ?> selected="" <?php } ?> value="<?php echo $user_drop[$i]['id']; ?>">[<?php echo $user_drop[$i]['login']; ?>] <?php echo $user_drop[$i]['imie']; ?> <?php echo $user_drop[$i]['nazwisko']; ?></option>    
       <?php  } } ?> 
     </select>

 </div>

 <div class="control-group"> 
        <label for="ile_wyn">Ilość wyświetleń</label>    
    <select id="ile_wyn" name="ile_wyn" class="testsel">
        <option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 10 ){ ?>  selected <?php } ?> value="10">10</option>
	<option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 25 ){ ?>  selected <?php } ?> value="25">25</option>
	<option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 50 ){ ?>  selected <?php } ?> value="50">50</option>
	<option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 100 ){ ?>  selected <?php } ?> value="100">100</option>
	<option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 250 ){ ?>  selected <?php } ?> value="250">250</option>
	<option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 500 ){ ?>  selected <?php } ?> value="500">500</option>
	<option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 1000 ){ ?>  selected <?php } ?> value="1000">1000</option>
	<option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 2500 ){ ?>  selected <?php } ?> value="2500">2500</option>
	<option <?php if(!empty($_REQUEST['ile_wyn']) && $_REQUEST['ile_wyn'] == 5000 ){ ?>  selected <?php } ?> value="5000">5000</option>
	<option <?php if(empty($_REQUEST['ile_wyn']) || $_REQUEST['ile_wyn'] == 9999 ){ ?>  selected <?php } ?>  value="9999">wszystko</option>
</select>
       </div>        
         
     
               
 </div>     
 <div class="col-sm-2 spady">     
  <div class="control-group">   
     
     <label for="miasto">Miasto</label>
     <input  <?php if(!empty($_REQUEST['miasto'])){ ?> value="<?php echo $_REQUEST['miasto']; ?>" <?php } ?> id="miasto" name="miasto" type="text">
  </div> 
       <div class="control-group">
               <label for="tranzacja">Data transakcji od</label>    
     <div  class="input-group date" id="datetimepicker1">
      
         <input placeholder="od" name="data_od" <?php if(!empty($_REQUEST['data_od'])){ ?> value="<?php echo $_REQUEST['data_od']; ?>"  <?php } ?>id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd,mm,yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-required="true" close-text="Close"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
       </div>
     
  <div class="control-group">   
     <label for="woj">Województwo</label>
     <select id="woj" name="woj" class="testsel">
        <option <?php if($_REQUEST['woj']!=0){?> selected="selected" <?php } ?> value="0">wszystkie</option>
	<option <?php if($_REQUEST['woj']==1){?> selected="selected" <?php } ?> value="1">dolnośląskie</option>
	<option <?php if($_REQUEST['woj']==2){?> selected="selected" <?php } ?> value="2">kujawsko-pomorskie</option>
	<option <?php if($_REQUEST['woj']==3){?> selected="selected" <?php } ?> value="3">lubelskie</option>
	<option <?php if($_REQUEST['woj']==4){?> selected="selected" <?php } ?> value="4">lubuskie</option>
	<option <?php if($_REQUEST['woj']==5){?> selected="selected" <?php } ?> value="5">łódzkie</option>
	<option <?php if($_REQUEST['woj']==6){?> selected="selected" <?php } ?> value="6">małopolskie</option>
	<option <?php if($_REQUEST['woj']==7){?> selected="selected" <?php } ?> value="7">mazowieckie</option>
	<option <?php if($_REQUEST['woj']==8){?> selected="selected" <?php } ?> value="8">opolskie</option>
	<option <?php if($_REQUEST['woj']==9){?> selected="selected" <?php } ?> value="9">podkarpackie</option>
	<option <?php if($_REQUEST['woj']==10){?> selected="selected" <?php } ?> value="10">podlaskie</option>
	<option <?php if($_REQUEST['woj']==11){?> selected="selected" <?php } ?> value="11">pomorskie</option>
	<option <?php if($_REQUEST['woj']==12){?> selected="selected" <?php } ?> value="12">śląskie</option>
	<option <?php if($_REQUEST['woj']==13){?> selected="selected" <?php } ?> value="13">świętokrzyskie</option>
	<option <?php if($_REQUEST['woj']==14){?> selected="selected" <?php } ?> value="14">warmińsko-mazurskie</option>
	<option <?php if($_REQUEST['woj']==15){?> selected="selected" <?php } ?> value="15">wielkopolskie</option>
	<option <?php if($_REQUEST['woj']==16){?> selected="selected" <?php } ?> value="16">zachodniopomorskie</option>
	<option <?php if($_REQUEST['woj']==17){?> selected="selected" <?php } ?> value="17">INTERNATIONAL</option>
</select>
  </div>
  </div>     
 <div class="col-sm-2 spady">      
     
<div class="control-group">       
<label for="branza">Branża</label>
<select name="branza" id="branza" class="testsel">
    <option>&nbsp;</option>
 <?php
        $branza = sql_q('branze');
       
     $n = count($branza);
     
       for($i=0;$i<$n;$i++){ ?>
     <option <?php if($_REQUEST['branza'] == $branza[$i]['id']){ ?> selected="" <?php } ?> value="<?php echo $branza[$i]['id']; ?>"> 
          <?php echo $branza[$i]['nazwa']; ?>
     </option>
       <?php } ?>    


</select>
</div>
 <div class="control-group">     
  

    <label for="tranzacja">Data transakcji do</label>
    <div>
    
      <div  class="input-group date" id='datetimepicker1'>
            
                    <input placeholder="do" name="data_do" <?php if(!empty($_REQUEST['data_do'])){ ?> value="<?php echo $_REQUEST['data_do']; ?>"  <?php } ?> id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd,mm,yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-required="true" close-text="Close"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    
    </div>
 </div>
     <div class="control-group" style="margin-top:30px;"> 
    
    <input type="submit" value="wyszukaj" >   
   

</div>

 </div>   
  
 </div>

</div>
</form>
</div>
</div> 