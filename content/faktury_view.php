<?php $id = $_GET['ids']; ?>
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
        <div class="title-section"><div class="title"><p>faktury</p></div></div>
    <div class="spady">    
   <h3 style="margin-top:-10px;">Dane do faktury</h3>
     Nazwa firmy :<strong><?php echo klienci($id)['nazwa']; ?></strong> <br>
     NIP :<strong><?php echo klienci($id)['nip']; ?></strong> <br>
     Prowizja :<strong><?php echo klienci($id)['prowizja_b']; ?></strong> <br>
     Adres: <strong><?php echo klienci($id)['adres1']; ?></strong> <strong><?php echo klienci($id)['kod1']; ?></strong>  <strong><?php echo klienci($id)['miasto1']; ?></strong> <br>
     <br>
        
        
        <?php

$pob_fakture = pobierz_fakture();
?>
     <div class="clear"></div>
  <table  style="background-color: #fff; width: 100%;">  
  <thead>
     <tr>
           <td>lp</td> 
           <td class="spady"><strong>numer <br> faktury</td>
                   <td class="spady"><strong>kwota  faktury <br> (brutto)</strong></td>
                   <td class="spady"><strong>do kiedy  <br>płatna</strong></td>
                   <td class="spady"><strong>data <br> wystawienia</strong></td>
                   <td class="spady"><strong>zobacz <br> fakturę</strong></td>
     </tr>
     
     </thead>
     <tbody>
     <?php 
     //print_r($pob_fakture);
 
     //print_r(pobierz_pdf());
    $n= count($pob_fakture); 
    $in = 0;
     for($i=0;$i<$n;$i++){
     if(klienci($id)['nip'] == $pob_fakture[$i]->buyer_tax_no){
         $in ++ ;
     ?> 
     <tr>
         <td style="text-align: center;"><?php echo $i +1 ; ?></td>
         <td style="text-align: center;"><?php echo $pob_fakture[$i]->number; ?> </td>
         <td><?php echo $pob_fakture[$i]->price_gross; ?></td>
         <td><?php echo $pob_fakture[$i]->payment_to; ?></td>
         <td><?php echo $pob_fakture[$i]->sell_date; ?></td>
         <td><a target="_blank" href="https://<?php echo nazwa; ?>.fakturownia.pl/invoice/<?php echo $pob_fakture[$i]->token; ?>.pdf">pobierz</a></td>
     </tr>
     <?php }
     
     
     }
     
     if($in == 0){
     ?>
         
    <tr>
        <td colspan="6" style="text-align: center;" class="spady"><strong>BRAK FAKTUR</strong></td>
    
    </tr>     
    <?php      
     }
     
     
     
     ?>
     </tbody>    
      
  </table>
    </div>
       </div>
      </div>
      </div>
    </div>
</div>
</div>
     
</div>