<div style="width: 86%; position: absolute; z-index: 1000; top:-10px; left: 7%; right: 7%;">
<div class="modal-dialog" style="width: 100%;">
    <div class="modal-content">
      <div class="modal-header">
       <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onclick="location.href='?page=tranzakcje'"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      </div>
      <div class="modal-body" style="height: 430px; overflow-y: scroll; overflow-x: none; padding: 5px;">

<div class="pole col-lg-12" style="margin-top: 0px;">  
<div class="title-section"><div class="title"><p>Referencje</p></div></div> 
      <div class="modal-body" style="padding: 5px;">
       <div class="containert" style="text-align: center;">
           <table style="width: 99%; margin-left:auto; margin-right: auto;">
               <thead>
                   <tr class="spady">
                       <th class="spady">lp</th>
                       <th class="spady">nr trans. w system</th>
                       <th class="spady">nadawca</th>
                       <th class="spady">użytkownik</th>
                       <th class="spady">odbiorca</th>
                       <th class="spady">tytuł transakcji</th>
                       <th class="spady">data transakcji</th>
                       <th class="spady">data referencji</th>
                       <th class="spady">opis transakcji</th>
                       <th class="spady">ocena</th>
                       <th class="spady">edytuj</th>
                   </tr>                   
                   
               </thead>              
               
<?php if($_SESSION['user']['type'] == 0 || $_SESSION['user']['type'] == 1){
$tranzakcje_view = sql_q('tranzakcje');
} else {
$tranzakcje_view = sql_q('tranzakcje2');        
}

$n = count($tranzakcje_view); 
$in = $n +1 ;
for($i=0;$i<$n;$i++){
    
   $klient_a  = klienci($tranzakcje_view[$i]['klient_a']);
   $klient_b  =klienci($tranzakcje_view[$i]['klient_b']);
if($sort['sort_id'] == 2) {
$in = $i +1 ;    
    
} else {   
 $in -- ;
}

?>
               <tr>              
               <td class="spady"> <?php echo $in ; ?> </td>
               <td class="spady"><?php echo $tranzakcje_view[$i]['id'] ?></td>
                <td class="spady" style="text-align: left; margin-left: 2px;"><font <?php if($klient_a['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_a['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_a['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_a['nazwa'];  ?> 
        </font></td>
        <td class="spady"><?php echo user($tranzakcje_view[$i]['user_id']); ?></td>
        <td class="spady" style="text-align: left; margin-left:2px;">
<font <?php if($klient_b['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_b['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_b['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_b['nazwa'];  ?> 
        </font></td>
    <td class="spady"><?php echo  substr($tranzakcje_view[$i]['tytul'],0,12) ?></td>
     <td class="spady"><?php echo $tranzakcje_view[$i]['data'] ?></td>
               <td class="spady">   <?php echo $tranzakcje_view[$i]['data_ref']; ?></td>      
               <td class="spady" style="text-align: center;"><?php if(empty($tranzakcje_view[$i]['referencje'])){ echo "BRAK OPISU<br>REFERENCJI" ;}else { echo $tranzakcje_view[$i]['referencje']; } ?></td>        
            <td class="spady"><div style="margin-left:auto; margin-right: auto; margin-bottom: 2px;" class="exemple4" data-average="<?php echo $tranzakcje_view[$i]['ocena']; ?>" data-id="5"></div>

   </td>   
   <td class="spady">
   <?php  if($klienci_glowna['id'] == $klient_a['id'] || $_SESSION['user']['type'] == 0){   
      if(!empty($tranzakcje_view[$i]['ocena'])){  ?>
       <button class="btn" onclick="location.href='?page=tranzakcje&ref_w=1&ref=1&idt=<?php echo $tranzakcje_view[$i]['id']; ?>'">Edytuj</button></td>
     <?php } else { ?>   
     <button class="btn" onclick="location.href='?page=tranzakcje&ref_w=1&ref=1&idt=<?php echo $tranzakcje_view[$i]['id']; ?>'">dodaj referencje</button></td>
 
   <?php }} else { ?>
                 <strong> nie otrzymano referencji</strong>
              
<?php } ?>
 </tr>
     <?php           }  ?>         
           </table>
</div>

          
          
      </div></div>
  </div>
    
</div>
  </div>
</div>