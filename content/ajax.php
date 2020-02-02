<div class="popups modal fade"  id="ajax" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 95%;">
   <div id="add_load <?php echo$klient_view[$i]['id']; ?>">
<?php include('content/add_form.php'); ?>
   </div>      
  </div>
  </div>



<?php if($set == 1 && $klienty['aktywny'] == 1 ){ ?> checked="checked" <?php } ?>


<?php if($set == 1){ ?> value="<?php echo $klienty['nazwa']; ?>" <?php } ?>