<div class="row" style="margin-left: 5px; margin-right: 15px; margin-top: -30px; width: 99.3%; margin-bottom: 20px;">
<!-- sort4.php -->
    <div class="pole col-lg-12">
    
    <div class="title-section"><div class="title"><p>Szukaj</p></div></div>
<div class="row" style="margin:0; margin-top:-20px;">
    <form  action="index.php?page=<?php echo $_GET['page'];?>&sort=1" method="post" id="form">
        
        <div class="col-sm-4 spady"> 
     <div class="control-group">       
     <label for="numer">login:</label>
<input <?php if(!empty($_REQUEST['login_top'])){ echo 'value="'.$_REQUEST['login_top'].'"';} ?>  style="width: 100%; height: 33px; font-size: 12px; border:1px solid #075C57; margin-bottom: 0; margin-top: -1px;"  type="text" name="login_top" placeholder="login">
     </div>
<div class="control-group">
    <label for="nazwa">email:</label>
    <input <?php if(!empty($_REQUEST['email_top'])){ echo 'value="'.$_REQUEST['email_top'].'"';} ?> maxlength="255" id="nazwa" name="email_top" type="text" placeholder="email">
     </div>
            <div class="control-group">       
        
        
        <label for="miasto">Miasto:</label>
        <input <?php if(!empty($_REQUEST['miasto_top'])){ echo 'value="'.$_REQUEST['miasto_top'].'"';} ?> id="nr_karty" name="miasto_top" type="text" placeholder="miasto">
 </div>
     </div>     

 <div class="col-sm-4 spady">      
        <div class="control-group">       
        
        
        <label for="miasto">Imię:</label>
        <input <?php if(!empty($_REQUEST['imie_top'])){ echo 'value="'.$_REQUEST['imie_top'].'"';} ?> id="nr_karty" name="imie_top" type="text" placeholder="imie">
 </div>
        <div class="control-group">       
        
        
        <label for="telefon">Telefon:</label>
        <input <?php if(!empty($_REQUEST['telefon_top'])){ echo 'value="'.$_REQUEST['telefon_top'].'"';} ?> id="nr_karty" name="telefon_top" type="text" placeholder="telefon">
 </div>
        <div class="control-group">       
        
        
        <label for="adres">Adres:</label>
        <input <?php if(!empty($_REQUEST['adres_top'])){ echo 'value="'.$_REQUEST['adres_top'].'"';} ?> id="nr_karty" name="adres_top" type="text" placeholder="adres">
 </div>

     
     
     
     
     
    </div>
     <div class="col-sm-4 spady"> 
        <div class="control-group">       
        
        
        <label for="miasto">Nazwisko:</label>
        <input <?php if(!empty($_REQUEST['nazwisko_top'])){ echo 'value="'.$_REQUEST['nazwisko_top'].'"';} ?> id="nr_karty" name="nazwisko_top" type="text" placeholder="nazwisko">
 </div> 
 <div class="control-group">         
         
<label class="control-label" for="konto">typ konta:</label>    
     <select  placeholder="typ konta" name="typ_top" class="testsel" />
    
     <option value="-1"> &nbsp;</option>
     <option <?php if($_REQUEST['typ_top'] == 10){ ?> selected="selected"  <?php } ?> value="10">Admin</option>
     <option <?php if($_REQUEST['typ_top'] == 2){ ?> selected="selected"  <?php } ?> value="2">Broker</option>
     <option <?php if($_REQUEST['typ_top'] == 1){ ?> selected="selected"  <?php } ?> value="1">Rada</option>
     <option <?php if($_REQUEST['typ_top'] == 3){ ?> selected="selected"  <?php } ?> value="3">Klient</option>    
    
    
    
    

</select>
         
 </div>        
         <div class="control-group" style="margin-top:30px;"> 
    
    <input type="submit" value="wyszukaj" >   
   

</div>

</div>   
        
 </div>
   
 </div>
  
</form>
</div>  