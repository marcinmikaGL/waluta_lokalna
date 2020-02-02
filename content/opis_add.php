<?php 
if(!empty($_POST['typ_konta_drop'])){
$klienci_glowna['id'] = $_POST['typ_konta_drop'];
$klienci_glowna['nazwa'] = 'admin';

}       
 $url = $klienci_glowna['zdjecie_url'];

        
?>
<div style="position: absolute; top:0.1%; left: 4%; right: 4%; z-index: 1000;">
<div class="modal-dialog" style="width: 96%;">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onclick="location.href='?page=<?php echo $_GET['page']; ?>'"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
 
      </div>
      <div class="modal-body" style="min-height: 530px; padding: 5px;">

      <div class="modal-body" style="min-height: 510px; padding: 5px;">
       <div class="containert" style="text-align: center;">
    <div class="pole" style="width: 100%; min-height: 510px; margin-top:-5px;">
 <div class="title-section"><div class="title"><p>dodawanie 
opisu działalności      
             
             <?php echo $zap; ?> jako <?php echo $klienci_glowna['nazwa']; ?></p></div></div>    
 
  
  <?php  

if($_GET['update']== 1){
 echo '<META HTTP-EQUIV="refresh" CONTENT="2; URL=?page='.$_REQUEST['page'].'&opis_add=1">';
 echo '<div class="alert alert-success" style="display:block !important;" role="alert">Opis zostały zaktualizowane.</div>';
$opis = preg_replace('~[\r\n]+~', '', $_POST['opis']);    
if(empty($opis)){ $opis = 0 ;}
    
    
    
opis_update($klienci_glowna['id'],$opis,$klienci_glowna['zdjecie_url']);    
    
}
?>
 <form action="?page=<?php echo $_GET['page']; ?>&opis_add=1&update=1" method="post" id="oferta_form"  enctype="multipart/form-data">

     <input type="hidden" name="id" value="<?php echo $klienci_glowna['id'] ?>">
      <input type="hidden" name="ids" value="<?php echo $_GET['ids']; ?>">
    <div class=" spady control-group" style="margin-top:-10px;">      

      <?php 
      
     
      
      
      ?>
        
        
 </div>       

      <div class="spady control-group">  
          <textarea name="opis" rows="14" maxlength="255" class="edytor pole" style="width:99%;"><?php if(!empty($klienci_glowna['opis'])){ echo $klienci_glowna['opis'] ; }?></textarea>
      </div>
      <div class="spady">                 
      <input type="submit" value="aktualizuj">
      </div>
 </form>         


    </div>
    
</div>

      </div>
          
      </div>

    </div>

</div>

</div>