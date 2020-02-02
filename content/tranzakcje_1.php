<?php
// rererencje 
if(isset($_GET['idt'])&& !empty($_GET['rate'])){
$ref_update = array (   
ocena => $_GET['rate'] ,    
referencje => $_GET['opis'],
data_ref => date('Y-m-d h:m:s')        
       
        ) ; 
referencje_upade ($ref_update,$_GET['idt']);    
    echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';

}

// sortowanie 

if($_GET['sort'] == 1){  

$sort_id = $_REQUEST['sort_id']; 
$tytul  = $_REQUEST['tytul'];
$a_nazwa = $_REQUEST['a_nazwa'];
$a_konto = $_REQUEST['a_konto'];
$a_nip = $_REQUEST['a_nip'];
$kwota = $_REQUEST['kwota'];
$user_s = $_REQUEST['user_s'];
$b_nazwa = $_REQUEST['b_nazwa'];
$b_konto = $_REQUEST['b_konto'];
$b_nip = $_REQUEST['b_nip'];
$saldo = $_REQUEST['saldo'];
$data = $_REQUEST['data'];
$referencje = $_REQUEST['referencje'];  
    
    
    
    
    
 if(
!empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],sort_id =>  $sort_id);  }                       

 if(
empty($sort_id) && 
!empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],tytul =>  $tytul);  }   


 if(
empty($sort_id) && 
empty($tytul)   && 
!empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],a_nazwa =>  $a_nazwa);  } 

 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
!empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],a_konto =>  $a_konto);  } 


 
 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
!empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],a_nip =>  $a_nip);  }     
    
 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
!empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],kwota =>  $kwota); }



 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
!empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],user_s => $user_s); }



 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
!empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],b_nazwa => $b_nazwa); }

if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
!empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],b_konto => $b_konto); }

 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
!empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],b_nip => $b_nip); }

 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
!empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],saldo => $saldo); }


 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
!empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort'],data => $data); }



 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
!empty($referencje) 
){ $sort = array(sort => $_GET['sort'],referencje => $referencje); }


 if(
empty($sort_id) && 
empty($tytul)   && 
empty($a_nazwa) &&
empty($a_konto) &&
empty($a_nip) &&
empty($kwota)  && 
empty($user_s) &&
empty($b_nazwa) &&
empty($b_konto) &&
empty($b_nip) &&
empty($saldo)  && 
empty($data) &&
empty($referencje) 
){ $sort = array(sort => $_GET['sort']); }

$sort['nr_konta'] = $_REQUEST['nr_konta'];
$sort['nazwa_sort'] = $_REQUEST['nazwa_sort'];
$sort['nr_karty'] = $_REQUEST['nr_karty'];
$sort['data_od'] = $_REQUEST['data_od'];
$sort['data_do'] = $_REQUEST['data_do'];
$sort['kwota_od'] = $_REQUEST['kwota_od'];
$sort['kwota_do'] = $_REQUEST['kwota_do'];



}



?>

<div style="position: absolute; display: none;  z-index: 1000; top:1%; left:60%; background-color: #fff;">
<?php


// dokonywanie tranzakcji 

$nr_nip_usera = $_POST['typ_konta_drop'];
$user_id = klienci_id($nr_nip_usera);
$nr_konta = $_POST['nr_konta'];
 
if (stripos($nr_konta, "NIP:") !== false) { 
$nip = str_replace("NIP:",'',$nr_konta); 
$klient_id = klienci_ids($nip);
$spr = 1;

}
if (stripos($nr_konta, "NR UMOWY:") !== false) { 
$nip = str_replace("NR UMOWY:",'',$nr_konta);
$klient_id = klienci_nr_umowy($nip);
$spr = 1;
}

if($spr !== 1 && isset($_POST['typ_konta_drop'])){ $error = 1; $komunikat = 'Błędny nr NIP/NR KONTA'; }
if(stripos($nr_nip_klienta,$nr_nip_usera) == 1){  $error = 1; $komunikat = 'Nie możesz przelać środków sam sobie<br> Numery <strong>NIP</strong> obiory i nadawcy są takie same.';}
$nr_nip_klienta = preg_replace('/\s+/', '', $nr_nip_klienta);

if($user_id == $klient_id['id'] && isset($_POST['typ_konta_drop'])){ $error = 1; $komunikat = 'Nie możesz przelać środków sam sobie'; }

// osoba która przelewa
$user_array = klienci($user_id);

// osoba co otrzymuje 
$klient_array = $klient_id;

if($klient_array['aktywny'] == 0 && isset($_POST['typ_konta_drop'])) { $error = 1; $komunikat = 'Konto odbiorcy jest nieaktywne';}

echo '<div style="padding:20px;">';
//saldo bierzace
echo 'poj usera '.$pojemnosc_usera = $user_array['pojemnosc'] - $_POST['kwota'];
echo '<br>';
echo 'poj klienta '.$pojemnosc_klienta = $klient_array['pojemnosc'] + $_POST['kwota'];
echo '<br> <hr> <br>';
echo 'wydania usera '.$wydanie_usera = $user_array['wydanie'] + $_POST['kwota'];
echo '<br>';
echo 'przyjecie klienta '.$przyjecie_klinta = $klient_array['trans_p'] + $_POST['kwota'];
echo '<br><hr><br>';
echo 'transakcje w user '.$tranzakcje_w = $user_array['tranzakcje_w'] + 1  ;
echo '<br>';
echo 'transakcje p klient '.$tranzakcje_p = $klient_array['tranzakcje_p'] + 1  ;
echo '<br><hr><br>';
echo 'do przyjecia klient '.$doprzyjecie_klienta = $klient_array['przyjecie'] - $_POST['kwota'];
echo '<br>';
echo 'do wydania klient '.$dowydania_klient= $klient_array['dowydania'] + $_POST['kwota'];
echo '<br>';
echo 'do przyjecia usera '.$doprzyjecie_usera = $user_array['przyjecie'] + $_POST['kwota'];
echo '<br>';
echo 'do wydania usera '.$dowydania_usera = $user_array['dowydania'] - $_POST['kwota'];
echo '<br>';
echo 'prowizja klient '.$prowizja_klient = (($klient_array['prowizja']/100) * $_POST['kwota']) + $klient_array['prowizja_b']  ;
echo '<br>';
echo 'prowizja user '.$prowizja_user = (($user_array['prowizja']/100) * $_POST['kwota']) + $user_array['prowizja_b']  ;

echo '<br>';
$prowizja_userx = (($user_array['prowizja']/100) * $_POST['kwota']);
$prowizja_klientx = (($klient_array['prowizja']/100) * $_POST['kwota']);

echo '</div>';

if($doprzyjecie_usera <= 0 && isset($_POST['typ_konta_drop'])) { $error = 1 ; $komunikat = 'Kwota przekracza limit do przyjęcia';}
if($dowydania_usera <= 0 && isset($_POST['typ_konta_drop'])) { $error = 1 ; $komunikat = 'Kwota przekracza limit do wydania';}
if($doprzyjecie_klienta <= 0 && isset($_POST['typ_konta_drop'])) { $error = 1 ; $komunikat = 'przelew przekracza limit odbiory';}


if($error !== 1 && $spr == 1 && isset($_POST['typ_konta_drop'])){ 
     
$ok = 1; 
$komunikat = 'Dokonano pomyślnie transakcji na kwotę   <strong>'.$_POST['kwota'].' PLN</strong> transakcji';



if($_GET['add'] == 1) {
    //echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';
print_r($_POST);
    przelew($_POST['kwota'],$_POST['tytul'],$_POST['obdiorca'],$user_id,$klient_id['id'],$prowizja_klientx,$prowizja_userx,$pojemnosc_usera,$pojemnosc_klienta);

$message = "dokonano tranzakcji w systemie zielony.pl kwota : ".$_POST['kwota']." tytułem: ".$_POST['tytul']." ";

// W przypadku każdej linii dłuższej niż 70 znaków powinniśmy użyć funkcji wordwrap()

// Wyślij
if(!empty($user_array['email_firmowy'])){
mail($user_array['email_firmowy'], 'Transakcja w systemie zielonny ', $message);
}
if(!empty($klient_array['email_firmowy'])){
mail($klient_array['email_firmowy'], 'Transakcja w systemie zielonny ', $message);
}




obciazenie($user_id,$pojemnosc_usera,$wydanie_usera,$tranzakcje_w,$doprzyjecie_usera,$dowydania_usera,$prowizja_user);
uznanie($klient_id['id'],$pojemnosc_klienta,$przyjecie_klinta,$tranzakcje_p,$doprzyjecie_klienta,$dowydania_klient,$prowizja_klient);
  
}

}



?>
</div>
</div>

   <?php if($_SESSION['user']['type'] != 1){ ?> 

<div class="navbar">
  <div class="navbar-inner" style="width:18%; margin-top:-20px; padding:10px 1px 10px 1px; margin-left: auto; margin-right: auto;">

      <ul class="nav">
        <li><button class="btn"  onClick="location.href='?page=tranzakcje&trans=1'">dokonaj transakcji</button></li> 
        <li><button class="btn"  data-toggle="modal" data-target="#referencje_add">Referencje</button></li> 
 
    </ul>
  
  </div>
</div>
 <?php } ?>
    <?php    include_once ('./content/sort2.php'); 
if($_GET['ref'] == 1){    
    include_once ('./content/referencja.php');
}
    ?>
<table style="width: 99%; margin-left:auto; margin-right: auto;">
<thead>
    <tr>
<th rowspan="2"  class="spady">LP <span id="nrKier"></span></th>
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(is_array($sort)) { echo '&'; foreach ($sort as $key=> $value) { echo $key.'='.$value.'&'; } }else { echo '&sort=1&'; }?>sort_id=<?php if($sort['sort_id'] == 1){ echo 2;}else { echo 1;} ?>'" title="Sortowanie po: numer">nr trans. w system 
    <span id="nrKier"<?php 
    if($sort['sort_id'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['sort_id'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>



</th>
<th rowspan="2" style='width: 250px;' id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(is_array($sort)) { echo '&'; foreach ($sort as $key=> $value) { echo $key.'='.$value.'&'; } }else { echo '&sort=1&'; }?>tytul=<?php if($sort['tytul'] == 1){ echo 2;}else { echo 1;} ?>'" title="Sortowanie po: numer">
    tytuł  transakcji
    
    <span id="nrKier"<?php 
    if($sort['tytul'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['tytul'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>
<th colspan="<?php if($_SESSION['user']['type'] == 0){  echo '5'; } else { echo '4' ;}?>" id="idSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">dane  nadawca <span id="nrKier"></span></th>
<th rowspan="2" id="idSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">użytkownik<span id="nrKier"></span></th>
<th colspan="<?php if($_SESSION['user']['type'] == 0){  echo '5'; } else { echo '4' ;}?>" id="idSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">dane odbiorcy <span id="nrKier"></span></th>
<?php if($_SESSION['user']['type'] == 3){ ?>
<th rowspan="2" id="idSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">saldo po operacji<span id="nrKier"></span></th>
<?php } ?>
<th rowspan="2" id="idSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">data transakcji<span id="nrKier"></span></th>
<th rowspan="2" id="idSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">referencje<span id="nrKier"></span></th>

    </tr>
<tr>
    <th class="spady">Nazwa firmy</th>
    <th class="spady">nr konta</th>
    <th class="spady">Nip</th>
    <?php if($_SESSION['user']['type'] == 0){ ?>
    <th class="spady">prowizja</th>
    <?php } ?>
    <th class="spady">wydał</th>
    <th class="spady">Nazwa firmy</th>
    <th class="spady">nr konta</th>
    <th class="spady">Nip</th>
    <?php if($_SESSION['user']['type'] == 0){ ?>
   <th class="spady">prowizja</th>
    <?php } ?>
   <th class="spady">przyjął</th>
</tr>  
</thead>        
<tbody>
 
<?php
if($_SESSION['user']['type'] == 0 || $_SESSION['user']['type'] == 1){
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
    <tr <?php if ($in % 2 == 0) {  ?> class="zolty" <?php } ?>> 
        <td class="spady" id="lp"><?php echo $in; ?></td>     
    <td class="spady"><?php echo $tranzakcje_view[$i]['id'] ?></td>
    <td class="spady"><?php echo $tranzakcje_view[$i]['tytul'] ?></td>
    <td class="spady" style="text-align: left; margin-left: 2px;"><font <?php if($klient_a['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_a['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_a['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_a['nazwa'];  ?> 
        </font></td>
    <td class="spady"><?php echo $klient_a['nr_umowy']; ?></td>
    <td class="spady"> <?php if($klient_a['typ_konta'] == 0){ echo $klient_a['nip']; } else { echo '[konto prywatne]';} ?></td>
   
    <?php if($_SESSION['user']['type'] == 0){ ?>
    <td class="spady"> <?php $klient_a_sum += $tranzakcje_view[$i]['prowizja_a']; echo number_format($tranzakcje_view[$i]['prowizja_a'],2); ?> </td>
    <?php } ?>
    <td class="spady"><?php echo '<font color="red">-'.number_format($tranzakcje_view[$i]['kwota'],2).'</font>'; ?></td>
   <td class="spady"><?php echo user($tranzakcje_view[$i]['user_id']); ?></td>
    <td class="spady" style="text-align: left; margin-left:2px;">
<font <?php if($klient_b['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_b['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_b['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_b['nazwa'];  ?> 
        </font></td>
    <td class="spady"><?php echo $klient_b['nr_umowy'] ?></td>
    <td class="spady"><?php if($klient_b['typ_konta'] == 0){ echo $klient_b['nip']; } else { echo '[konto prywatne]';}; ?></td>
    <?php if($_SESSION['user']['type'] == 0){ ?>
    <td class="spady"> <?php $klient_b_sum += $tranzakcje_view[$i]['prowizja_b']; echo number_format($tranzakcje_view[$i]['prowizja_b'],2); ?> </td> 
    <?php } ?>
    
    
     <td><?php $suma += $tranzakcje_view[$i]['kwota']; echo number_format($tranzakcje_view[$i]['kwota'],2); ?></td>
     <?php if($_SESSION['user']['type'] == 3){ ?>
     <td>
     <?php if($klienci_glowna['nr_umowy'] == $klient_a['nr_umowy']) {  ?>
         <font <?php if($tranzakcje_view[$i]['saldo_do_b'] < 0 ){echo 'class="czerwony"';} ?>> <?php echo $tranzakcje_view[$i]['saldo_do_b']; ?></font> </td>
     <?php } else { ?>
        <font <?php if($tranzakcje_view[$i]['saldo_do_a'] < 0 ){echo 'class="czerwony"';} ?>> <?php echo $tranzakcje_view[$i]['saldo_do_a']; ?></font> </td>
     
     
     
     <?php  }   } ?>
     <td><?php echo $tranzakcje_view[$i]['data'] ?></td>
   <td class="spady">
       
       <?php if (!empty($tranzakcje_view[$i]['data_ref'])) { ?>
   <div style="margin-left:auto; margin-right: auto; margin-bottom: 2px;" class="exemple4" data-average="<?php echo $tranzakcje_view[$i]['ocena']; ?>" data-id="5"></div>
   <?php echo $tranzakcje_view[$i]['data_ref']; ?>
       <?php } else { ?>
<?php if($_SESSION['user']['type'] == 3){
    if($klienci_glowna['id'] == $klient_a['id']){
    ?>
   <button class="btn" onclick="location.href='?page=tranzakcje&ref=1&idt=<?php echo $tranzakcje_view[$i]['id']; ?>'">dodaj referencje</button>
    <?php } else { ?>  <strong> nie otrzymano referencji</strong> <?php } ?>   
       <?php } else { echo 'brak referencji'; } } ?>
   </td>
       
       <?php }  ?>   
</tbody>
  <tfoot>
    <tr>
        <?php if($_SESSION['user']['type'] == 0){ ?>
        <td colspan="6" style="text-align:right;">suma:</td>    
        <td class="zolty"><strong><?php echo number_format($klient_a_sum,2); ?></strong></td>
        <td class="zolty"><strong><font color="red">-<?php echo number_format($suma,2);?></font></strong></td>
        
              <td  style="text-align:right;" colspan=4>suma:</td>
              
              <td class="zolty"><strong><?php echo number_format($klient_b_sum,2); ?></strong></td>
               
             <td class="zolty"><strong><?php echo number_format($suma,2);?></strong></td>
             
               <td colspan="4"> &nbsp;</td>    
    </tr>    
              <?php  } else { ?>
     
  <td colspan="6" style="text-align:right;">suma:</td>
  <td class="zolty"><strong><font color="red">-<?php echo number_format($suma,2);?></font></strong></td>
  <td colspan="4" style="text-align:right;">suma:</td>
  <td class="zolty"><strong><?php echo number_format($suma,2);?></strong></td>
          
               <td colspan="3"> &nbsp;</td>      
 <?php
 }
 
 ?>
</table>

    <?php    
    if(($_GET['trans'] == 1 || $error == 1) && $_GET['klient']!=1){
    include_once('./content/tranzakcja_add.php');
    
    }
    if(($_GET['trans'] == 2 && $error != 1) && $_GET['klient']!=1 ){
    include_once('./content/tranzakcja_add2.php');
    
    }
    
    
    ?>


<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
	$(".exemple4").jRating({
	  isDisabled : true,
          type:'small'
	});
  });
</script>