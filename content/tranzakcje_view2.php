<div style="position: absolute; top:0; left: 3%; right: 3%; z-index: 2000;">
<div class="modal-dialog" style="width: 99%;">
    <div class="modal-content">
      <div class="modal-header">
               <button type="button" class="btn" style="margin-left: 99%; margin-top: -10px; margin-bottom: -10px;" onClick="location.href='?page=kli'"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>

      </div>
      <div class="modal-body" style="height: 700px; padding: 5px; overflow-y: scroll;">
        <?php 
       $klient = klienci($_GET['ids']);
        ?>
<div class="pole col-lg-12" style="margin-top: 0px;">  
<div class="title-section"><div class="title"><p>Historia transakcji klienta</p></div></div> 
      <div class="modal-body" style="padding: 5px;">
       <div class="containert" style="text-align: center;">
       
           
     <?php include('content/sort2.php'); ?>   
          
           <table style="width: 100%;">
        <thead>
            <tr class="spady">
                <th class="spady" colspan="12">Historia <br> transakcji</th>  
            </tr>
            <tr class="spady">
               <th class="spady" rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">lp<span id="nrKier"></span></th> 
               <th class="spady" rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">nr trans. w system<span id="nrKier"></span></th> 
               
               <th class="spady" rowspan="2" style="width: 250px;" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">tytuł transakcji<span id="nrKier"></span></th>   
              
                <th class="spady" colspan="3" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">Dane kontrahenta<span id="nrKier"></span></th>   
     
       <th class="spady" rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">użytkownik<span id="nrKier"></span></th>   
                   

                   <th class="spady" class="spady" rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">Prowizja<span id="nrKier"></span></th>  
                          <th class="spady" class="spady" rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">wydał<span id="nrKier"></span></th> 
         <th class="spady" rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">przyjął<span id="nrKier"></span></th> 
                <th class="spady" rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">saldo po transakcji<span id="nrKier"></span></th>                                  
                
                   <th class="spady" rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">data dodania<span id="nrKier"></span></th>   
     
            </tr>
            <tr>
                
                <th class="spady"  id="nrSort"  onclick="changeSort('nr',1)" title="Sortowanie po: numer">nazwa firmy<span id="nrKier"></span></th>   
                 <th class="spady" id="nrSort"  onclick="changeSort('nr',1)" title="Sortowanie po: numer">nr konta<span id="nrKier"></span></th>   
     <th class="spady"  onclick="changeSort('nr',1)" title="Sortowanie po: numer">NIP<span id="nrKier"></span></th>   
              
              </tr>   
        <tbody> 
 <?php            
$tranzakcje_view = sql_q('tranzakcje');


$n = count($tranzakcje_view); 
$in = 0;
for($i=0;$i<$n;$i++){
   
if($tranzakcje_view[$i]['klient_a'] == $_GET['ids']){
 $in ++ ;
// obciazajace
 
$klient_b  =klienci($tranzakcje_view[$i]['klient_b']);
?>
            <tr <?php if ($in % 2 == 0) {  ?> class="zolty" <?php } ?>>           
                <td><?php echo $in; ?></td>
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

                
                
                <?php }  if($tranzakcje_view[$i]['klient_b'] == $_GET['ids']) { 
$klient_b = klienci($tranzakcje_view[$i]['klient_a']);

// uznaniowe 
$in ++ ;
?>



            <tr <?php if ($in % 2 == 0) {  ?> class="zolty" <?php } ?>>           
                <td><?php echo $in; ?></td>
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
                <td colspan="7" style="text-align: right; margin-right: 5px;">SUMA: </td>
                <td class="zolty"><strong><?php echo number_format($prosum2+$prosum1,2); ?></strong></td>
                <td class="zolty"><strong> -<?php echo number_format($suma1,2); ?></strong></td>

                <td class="zolty"><strong><?php echo number_format($suma2,2); ?></strong></td>
                <td colspan="2"></td> 
            </tr>         
      </table>   
          
           
           
           
           
           
           
           
           
           
           
           
           
           
           
           
</div>

          
          
      </div></div>
  </div>
    
</div>
  </div>
</div>