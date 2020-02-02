<?php 
if($_SESSION['user']['type'] == 0){
         $klienci_glowna = klienci($_GET['ids']);
}


if(!empty($_POST['typ_konta_drop'])){
$klienci_glowna['id'] = $_POST['typ_konta_drop'];
$klienci_glowna['nazwa'] = 'admin';

}       
      
?>

<div style="position: absolute; top:0.1%; left: 4%; right: 4%; z-index: 1000;">
<div class="modal-dialog" style="width: 96%;">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onclick="location.href='?page=<?php echo $_GET['page']; ?>'"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body" style="min-height: 730px; padding: 5px;">

      <div class="modal-body" style="min-height: 710px; padding: 5px;">
       <div class="containert" style="text-align: center;">
    <div class="pole" style="width: 100%; min-height: 710px; margin-top:-5px;">
 <div class="title-section"><div class="title"><p>dodawanie 
 <?php if($_GET['page'] == 'zapotrzebowania') { $zz = 1; $zap = 'zapotrzebowania'; } else { $zap= 'ofert'; }  ?>          
             
             <?php echo $zap; ?> jako <?php echo $klienci_glowna['nazwa']; ?></p></div></div>    

 <form action="?page=<?php echo $_GET['page']; ?>&oferty_add=1" method="post" id="oferta_form"  enctype="multipart/form-data">

     <input type="hidden" name="id" value="<?php echo $klienci_glowna['id'] ?>">
      <input type="hidden" name="ids" value="<?php echo $_GET['ids']; ?>">
    <div class=" spady control-group" style="margin-top:-10px;">   
     <label class="control-label" for="temat">Temat<sup>*</sup>:</label>      
    
     
      <?php $oferta_info = oferta($_GET['ids']) ; 
      
     
      ?>
        
        <div class="input-group">
            <input style="height: 45px; width: 100%;" <?php if(!empty($oferta_info['tytul'])){ echo 'value="'.$oferta_info['tytul'].'"'; }?> class="form-control" name="temat" typ="text" required=""> 
  <span class="input-group-btn" style="background-color: #F5F5F5; padding: 2px; padding-left: 5px; padding-right: 5px; border: 1px solid #075c57;">
       <span class="btn btn-success fileinput-button">
   
                <i class="glyphicon glyphicon-plus"></i>
        <span>Dodaj zdjęcie...</span>
        <!-- The file input field used as target for the file upload widget -->
      <input id="fileupload" type="file" name="files"> 
    </span>
      </span>
        </div>

 </div>       

      <div class="spady control-group">  
          <textarea name="opis" rows="14" maxlength="255" class="edytor pole" style="width:99%;"><?php if(!empty($oferta_info['opis'])){ echo $oferta_info['opis'] ; }?></textarea>
      </div>
    <div class="spady" style="margin-top:-5px;">    
       <div class="row">
            <div class="col-lg-6">
                
    &nbsp;
                
           </div>             
           
        
           
           <div class="col-lg-4 col-lg-offset-2" style="margin-top:-5px;">
<div class="control-group">       
<label for="branza">Branża</label>
<select name="branza" id="branza" class="testsel">
 <?php
        $branza = sql_q('branze');
        
     $n = count($branza);
       
       if($_SESSION['user']['type'] != 0){   
       for($i=0;$i<$n;$i++){
        $branze_select = klient_branze_select($klienci_glowna['id'],$branza[$i]['id']);
       if($_GET['page'] == 'oferty'){
       if($branze_select[0]['branza_id'] == $branza[$i]['id']) {
       ?>
    <option <?php if($oferta_info['branza_group_id']== $branza[$i]['id']){ echo 'selected=""'; } ?> value="<?php echo $branza[$i]['id']; ?>"> 
          <?php echo $branza[$i]['nazwa']; ?>
     </option>
       <?php }}else { ?>
       <option <?php if($oferta_info['branza_group_id']== $branza[$i]['id']){ echo 'selected=""'; } ?> value="<?php echo $branza[$i]['id']; ?>"> 
          <?php echo $branza[$i]['nazwa']; ?>
     </option>
       <?php }}} else { 
     
       for($i=0;$i<$n;$i++){ ?>
      <option <?php if($oferta_info['branza_group_id']== $branza[$i]['id']){ echo 'selected=""'; } ?> value="<?php echo $branza[$i]['id']; ?>"> 
          <?php echo $branza[$i]['nazwa']; ?>
          
         
     </option>
       <?php }} ?>


</select>
</div>     
               <input type="hidden" value="<?php echo $klienci_glowna['id']; ?>" name="id">
                    <div class="control-group">
      <label for="poziom">Poziom rozliczeń </label>    
      <select  id="poziom" name="poziom" class="testsel">
      
        <?php
        $poziom_rozliczen = sql_q('poziom_rozliczen');
        
     $n = count($poziom_rozliczen);
       for($i=0;$i<$n;$i++){
     $poziom_spr = poziom_group_id($klienci_glowna['id'],$poziom_rozliczen[$i]['id']);      
    if(($poziom_spr == $poziom_rozliczen[$i]['id'] || $zz == 1) || $_SESSION['user']['type'] == 0){  
    
     ?>
          <option id="<?php echo $poziom_rozliczen[$i]['id']; ?>"><?php echo $poziom_rozliczen[$i]['poziom']; ?></option>  
          
          
       <?php }}
       
       
       
       
       ?>
      </select>
</div>
  <div  class='input-group date col-lg-5' style="float: left; margin-top:13px; <?php if($oferta_info['oferta_stala'] > 0){ ?> display:none;  <?php } ?> width: 48% !important;" id='datetimepicker1'>
            
      
                    <input " placeholder="data ważności"  <?php if(!empty($oferta_info['waznosc_oferty'])){ echo 'value="'.$oferta_info['waznosc_oferty'].'"'; }?> name="data_waznosci" id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd,mm,yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-required="true" close-text="Close"  />
                    <span id="addon" class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                                  
  </div>       <div id="oferta_stala" style="float: right; margin-top: 19px;">
      <input type="checkbox" id="oferta_stala" value="1" <?php if($oferta_info['oferta_stala'] > 0){ ?> checked="" <?php } ?> name="ofeta"> oferta stała 
  </div>
               <button id="stala" style="text-align:right; display: none; width: 100%; padding: 5px;">oferta zmienna</button>
               </div>      

              
          </div>         
          
          
      </div>
         <div class="spady control-group" style="height: 50px;  width: 100%; padding: 5px;"> 
<button  type="submit" class="btn" name="dodaj" style="margin-top:-5px;"><?php if(empty($_GET['ids'])){ ?>dodaj <?php } else { ?> zmień <?php }?></button>
<span style="float: right; margin-top:8px;"><strong style="color:red;">*</strong>- pola oznaczone czerwoną gwiazdką są obowiązkowe</span>
                                        </div>
         
        
    </form>
    
</div>
</div>

</div>
          
          
      </div></div>
  </div>
    
</div>
<script>
     $("#oferta_stala").change(function () {
        $('#datetimepicker1').toggle();

     });

</script>
