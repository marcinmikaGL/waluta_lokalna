

<div style="position: absolute; top:0.1%; left: 2%; right: 2%; z-index: 1000;">
<div class="modal-dialog" style="width: 98%;">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onclick="location.href='?page=<?php echo $_GET['page']; ?>'"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
 
      </div>
      <div class="modal-body" style="min-height: 530px; padding: 5px;">

      <div class="modal-body" style="min-height: 510px; padding: 5px;">
       <div class="containert" style="text-align: center;">
    <div class="pole" style="width: 100%; min-height: 510px; margin-top:-5px;">
        
 <div class="title-section"><div class="title"><p>Wystawianie faktury</p></div></div>
 <div class="spady">
     
    <?php
$id = $_GET['idf'];
$ciag= '';
if($_GET['faktura']== '1'){
    $nr_faktury = implode(',',$_POST['faktura_id']);
 if(!empty($_POST['faktura_id'])){   
   $faktura_id = $_POST['faktura_id'];
   $n = count($faktura_id); 
   for($i=0;$i<$n;$i++){
   $cena = akt_fakture($faktura_id[$i],$nr_faktury,$id);     
   $data = faktura_data($faktura_id[$i]);
   $kwota += $cena;     
   $ciag .= '{"name":"tranzakcja: '.$faktura_id[$i].' data : '.$data.' ", "tax":23, "total_price_gross":'.$cena.', "quantity":1},';   
   if($n-1 == $i){
       
    $ciag .= '{"name":"tranzakcja numer: '.$faktura_id[$i].' data : '.$data.'  ", "tax":23, "total_price_gross":'.$cena.', "quantity":1}';     
       
   }
   }
     wystaw_fakture($id,$kwota,$ciag);
echo '<div class="alert alert-success" style="display:block !important;" role="alert">Została wygenerowana faktura na kwotę: <strong>'.$kwota.'</strong> </div>';
} else { echo '<div class="alert alert-danger" style="display:block !important;" role="alert">Nie wybrałeś pozycji z tabeli .</div>'; }
}
?>
     <h3 style="margin-top:-10px;">Dane do faktury</h3>
     Nazwa firmy :<strong><?php echo klienci($id)['nazwa']; ?></strong> <br>
     NIP :<strong><?php echo klienci($id)['nip']; ?></strong> <br>
     Prowizja :<strong><?php echo klienci($id)['prowizja_b']; ?></strong> <br>
     Adres: <strong><?php echo klienci($id)['adres1']; ?></strong> <strong><?php echo klienci($id)['kod1']; ?></strong>  <strong><?php echo klienci($id)['miasto1']; ?></strong> <br>
     <br>
     
 <form method="post" action="index.php?page=<?php echo $_GET['page'];?>&idf=<?php echo $id;?>&faktura=1">
 <table style="width: 100%;">
        <thead>
            <tr class="spady">
                <th class="spady" colspan="13">Historia <br> transakcji</th>  
            </tr>
            <tr class="spady">
               <th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">lp<span id="nrKier"></span></th> 
               <th rowspan="2" id="nrSort" class="sort" >&nbsp;</th> 
               <th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">nr trans. w system<span id="nrKier"></span></th> 
               
               <th rowspan="2" style="width: 250px;" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">tytuł transakcji<span id="nrKier"></span></th>   
              
                <th colspan="3" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">Dane kontrahenta<span id="nrKier"></span></th>   
     
       <th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">użytkownik<span id="nrKier"></span></th>   
                   

                   <th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">Prowizja<span id="nrKier"></span></th>  
                          <th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">wydał<span id="nrKier"></span></th> 
         <th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">przyjął<span id="nrKier"></span></th> 
                <th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">saldo po transakcji<span id="nrKier"></span></th>                                  
                
                   <th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">data dodania<span id="nrKier"></span></th>   
     
            </tr>
            <tr>
                
                <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">nazwa firmy<span id="nrKier"></span></th>   
                 <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">nr konta<span id="nrKier"></span></th>   
     <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">NIP<span id="nrKier"></span></th>   
              
              </tr>   
        <tbody> 
 <?php            
$tranzakcje_view = tranzakcje3($_GET['idf']);


$n = count($tranzakcje_view); 

for($i = $n;$i>=0;$i--){

  
    
if($tranzakcje_view[$i]['klient_a'] == $_GET['idf'] && $tranzakcje_view[$i]['faktura_id_a'] != 1){
  
// obciazajace
 
$klient_b  =klienci($tranzakcje_view[$i]['klient_b']);
?>
            <tr <?php if ($in % 2 == 0) {  ?> class="zolty" <?php } ?>>           
                <td><?php echo $i +1; faktura_id ?></td>
                <td><input name="faktura_id[]" value="<?php echo $tranzakcje_view[$i]['id']; ?>" type="checkbox"></td>
                <td><?php echo $tranzakcje_view[$i]['id'] ?></td>
    <td><?php echo substr($tranzakcje_view[$i]['tytul'],0,40); ?></td>
    <td class="spady" style="text-align: left; "><font <?php if($klient_b['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_b['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_b['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_b['nazwa'];  ?> 
        </font></td>
                <td><?php echo $klient_b['nr_umowy'] ?></td>
    <td><?php if($klient_b['typ_konta'] == 0){ echo $klient_b['nip']; } else { echo '[konto prywatne]';}; ?></td>
     <td><?php echo user($tranzakcje_view[$i]['user_id']); ?></td>
     <td><?php $prosum1 +=  $tranzakcje_view[$i]['prowizja_a']; echo  number_format($tranzakcje_view[$i]['prowizja_a'],2) ; ?></td>
      
     <td><font color="red">-<?php $suma1 += $tranzakcje_view[$i]['kwota']; echo number_format($tranzakcje_view[$i]['kwota'],2); ?></font></td>
  <td>-</td>
  <td><font <?php  if($tranzakcje_view[$i]['saldo_do_b']<0){ echo 'color="red" >'; } else { echo '>'; } echo $tranzakcje_view[$i]['saldo_do_b'];  ?></font></td>     
  <td><?php echo $tranzakcje_view[$i]['data'] ?></td>
           
            </tr>         

                
                
                <?php }  if($tranzakcje_view[$i]['klient_b'] == $_GET['idf'] && $tranzakcje_view[$i]['faktura_id_b'] != 1) { 
$klient_b = klienci($tranzakcje_view[$i]['klient_a']);

// uznaniowe 
?>



            <tr <?php if ($in % 2 == 0) {  ?> class="zolty" <?php } ?>>           
                <td><?php echo $i + 1; ?></td>
                <td><input name="faktura_id[]" value="<?php echo $tranzakcje_view[$i]['id']; ?>" type="checkbox"></td>
                <td><?php echo $tranzakcje_view[$i]['id'] ?></td>
    <td><?php echo substr($tranzakcje_view[$i]['tytul'],0,40); ?></td>
    <td class="spady" style="text-align: left;"><font <?php if($klient_b['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_b['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_b['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_b['nazwa'];  ?> 
        </font></td>
                <td><?php echo $klient_b['nr_umowy'] ?></td>
    <td><?php if($klient_b['typ_konta'] == 0){ echo $klient_b['nip']; } else { echo '[konto prywatne]';}; ?></td>
     <td><?php echo user($tranzakcje_view[$i]['user_id']); ?></td>
      <td><?php $prosum2 +=  $tranzakcje_view[$i]['prowizja_b'] ; echo  number_format($tranzakcje_view[$i]['prowizja_b'],2) ; ?></td>
  <td>-</td>
      <td><?php $suma2 += $tranzakcje_view[$i]['kwota']; echo number_format($tranzakcje_view[$i]['kwota'],2); ?></td>
   
      <td><font <?php  if($tranzakcje_view[$i]['saldo_do_a']<0 ){ echo 'color="red" >'; } else { echo '>'; } echo $tranzakcje_view[$i]['saldo_do_a'] ; ?> </font></td>  
   <td><?php echo $tranzakcje_view[$i]['data'] ?></td>
     
   
     
            </tr>         
<?php   } }?>          
            <tr  style="background-color: #808080;">
                <td></td>
                <td><input type="checkbox" id="checkAll"></td>
                <td colspan="6" style="text-align: right; margin-right: 5px;">SUMA: </td>
                <td class="zolty"><strong><?php echo number_format($prosum2+$prosum1,2); ?></strong></td>
                <td class="zolty"><strong> -<?php echo number_format($suma1,2); ?></strong></td>

                <td class="zolty"><strong><?php echo number_format($suma2,2); ?></strong></td>
                <td>&nbsp;</td>
                <td  style="text-align: center;" class="zolty spady"> <?php if($n >0){ ?><input id="gen" class="btn" type="submit" value="generuj fakturę"><?php } ?></td> 
            </tr>         
      </table>   
          
     
 </form>
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
   // print_r($pob_fakture);
    
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
<script>
    $("#checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
            </script>
  