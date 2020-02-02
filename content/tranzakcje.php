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

if($_REQUEST['sort'] == 1){  

$sort_id = $_REQUEST['sort_id']; 
$tytul  = $_REQUEST['tytul'];
$a_nazwa = $_REQUEST['a_nazwa'];
$a_konto = $_REQUEST['a_konto'];
$a_nip = $_REQUEST['a_nip'];
$kwota = $_REQUEST['kwota'];
$kwota2 = $_REQUEST['kwota2'];
$user_s = $_REQUEST['user_s'];
$b_nazwa = $_REQUEST['b_nazwa'];
$b_konto = $_REQUEST['b_konto'];
$b_nip = $_REQUEST['b_nip'];
$saldo = $_REQUEST['saldo'];
$data = $_REQUEST['data'];
$prowizja_a = $_REQUEST['prowizja_a'];
$prowizja_b = $_REQUEST['prowizja_b'];
$referencje = $_REQUEST['referencje'];  
    
    
     
if(!is_array($sort)) { $sort = array(sort => $_GET['sort']); }
// nr transakcji
if(!empty($sort_id)){ $sort = array(sort => $_GET['sort'],sort_id =>$sort_id);  }
if($sort['sort_id'] == 1){ $sort_id_s= 2;}else { $sort_id_s= 1;}
$top_sort_id = 'prowizja_a=0&prowizja_b=0&sort_id='.$sort_id_s.'&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=0&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;

// tytuł tranzakcji 
if(!empty($tytul)){ $sort = array(sort => $_GET['sort'],tytul =>  $tytul);  }   
if($sort['tytul'] == 1){ $tytul_s= 2;}else { $tytul_s= 1;}
$top_tytul = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul='.$tytul_s.'&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=0&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        

// nazwa nadawcy 
if(!empty($a_nazwa)){ $sort = array(sort => $_GET['sort'],a_nazwa =>  $a_nazwa);  } 
if($sort['a_nazwa'] == 1){ $a_nazwa_s= 2;}else { $a_nazwa_s= 1;}
$top_a_nazwa = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa='.$a_nazwa_s.'&a_konto=0&a_nip=0&kwota=0&user_s=0&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        


// nr konta nadawcy 
if(!empty($a_konto)){ $sort = array(sort => $_GET['sort'],a_konto =>  $a_konto);  } 
if($sort['a_konto'] == 1){ $a_konto_s= 2;}else { $a_konto_s= 1;}
$top_a_konto = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto='.$a_konto_s.'&a_nip=0&kwota=0&user_s=0&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        
 
// nr nip nadawcy 
if(!empty($a_nip)){ $sort = array(sort => $_GET['sort'],a_nip =>  $a_nip);  }     
if($sort['a_nip'] == 1){ $a_nip_s= 2;}else { $a_nip_s= 1;}
$top_a_nip = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip='.$a_nip_s.'&kwota=0&user_s=0&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        
 
// kwota tranzakcji 
 if(!empty($kwota)){ $sort = array(sort => $_GET['sort'],kwota =>  $kwota); }
if($sort['kwota'] == 1){ $kwota_s= 2;}else { $kwota_s= 1;}
$top_kwota = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota='.$kwota_s.'&user_s=0&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        

// kwota tranzakcji 
 if(!empty($kwota2)){ $sort = array(sort => $_GET['sort'],kwota2 =>  $kwota2); }
if($sort['kwota2'] == 1){ $kwota2_s= 2;}else { $kwota2_s= 1;}
$top_kwota2 = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota2='.$kwota2_s.'&user_s=0&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        



// użytkownik dokonujący tranakcję 
if(!empty($user_s)){ $sort = array(sort => $_GET['sort'],user_s => $user_s); }
if($sort['user_s'] == 1){ $user_s= 2;}else { $user_s= 1;}
$top_user_s = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s='.$user_s.'&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        


// nazwa odbiory 
if(!empty($b_nazwa)){ $sort = array(sort => $_GET['sort'],b_nazwa => $b_nazwa); }
if($sort['b_nazwa'] == 1){ $b_nazwa_s= 2;}else {$b_nazwa_s= 1;}
$top_b_nazwa = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=&b_nazwa='.$b_nazwa_s.'&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        

// konto odbiorcy 
if(!empty($b_konto)){ $sort = array(sort => $_GET['sort'],b_konto => $b_konto); }
if($sort['b_konto'] == 1){ $b_konto_s= 2;}else {$b_konto_s= 1;}
$top_b_konto = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=&b_nazwa=0&b_konto='.$b_konto_s.'&b_nip=0&saldo=0&data=0&referencje=0' ;                        

// nip odbiorcy
 if(!empty($b_nip)){ $sort = array(sort => $_GET['sort'],b_nip => $b_nip); }
if($sort['b_nip'] == 1){ $b_nip_s= 2;}else {$b_nip_s= 1;}
$top_b_nip = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=&b_nazwa=0&b_konto=0&b_nip='.$b_nip_s.'&saldo=0&data=0&referencje=0' ;                        

 // saldo po operacj
 if(!empty($saldo)){ $sort = array(sort => $_GET['sort'],saldo => $saldo); }
if($sort['saldo'] == 1){ $saldo_s= 2;}else {$saldo_s= 1;}
$top_saldo = 'prowizja_a=0&prowizja_b=0&prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=&b_nazwa=0&b_konto=0&b_nip=0&saldo='.$saldo_s.'&data=0&referencje=0' ;                        

 
 
// data 
 if(!empty($data)){ $sort = array(sort => $_GET['sort'],data => $data); }
 if($sort['data'] == 1){ $data_s= 2;}else {$data_s= 1;}
$top_data = 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data='.$data_s.'&referencje=0' ;                        

 



 if(!empty($referencje)){ $sort = array(sort => $_GET['sort'],referencje => $referencje); }
 if($sort['referencje'] == 1){ $referencje_s= 2;}else {$referencje_s= 1;}
$top_referencje= 'prowizja_a=0&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje='.$referencje_s ;                        

// prowizja b 
 if(!empty($prowizja_b)){ $sort = array(sort => $_GET['sort'],prowizja_b => $prowizja_b); }
 if($sort['prowizja_b'] == 1){ $prowizja_b_s= 2;}else {$prowizja_b_s= 1;}
$top_prowizja_b= 'prowizja_a=0&prowizja_b='.$prowizja_b_s.'&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        


// prowizja a 
 if(!empty($prowizja_a)){ $sort = array(sort => $_GET['sort'],prowizja_a => $prowizja_a); }
 if($sort['prowizja_a'] == 1){ $prowizja_a_s= 2;}else {$prowizja_a_s= 1;}
$top_prowizja_a= 'prowizja_a='.$prowizja_a_s.'&prowizja_b=0&sort_id=0&sort=1&tytul=0&a_nazwa=0&a_konto=0&a_nip=0&kwota=0&user_s=&b_nazwa=0&b_konto=0&b_nip=0&saldo=0&data=0&referencje=0' ;                        


 

}

$sort['nr_konta'] = $_REQUEST['nr_konta'];
$sort['nazwa_sort'] = $_REQUEST['nazwa_sort'];
$sort['nr_karty'] = $_REQUEST['nr_karty'];
$sort['data_od'] = $_REQUEST['data_od'];
$sort['data_do'] = $_REQUEST['data_do'];
$sort['kwota_od'] = $_REQUEST['kwota_od'];
$sort['kwota_do'] = $_REQUEST['kwota_do'];


$other = '&nazwa_sort='.$_REQUEST['nazwa_sort'];
$other .= '&nr_konta='.$_REQUEST['nr_konta'];
$other .= '&nr_karty='.$_REQUEST['nr_karty'];
$other .='&data_od='.$_REQUEST['data_od'];
$other .='&data_do='.$_REQUEST['data_do'];
$other .='&kwota_od='.$_REQUEST['kwota_od'];
$other .='&kwota_do='.$_REQUEST['kwota_do'];
$other .='&nr_karty='.$_REQUEST['nr_karty'];



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

// user -> nadawca 
// klidnt -> odbiora 

if($dowydania_usera < 0 && isset($_POST['typ_konta_drop'])) { $error = 1 ; $komunikat = 'Kwota przekracza limit do wydania';}
if($doprzyjecie_klienta < 0 && isset($_POST['typ_konta_drop'])) { $error = 1 ; $komunikat = 'przelew przekracza limit odbiorcy';}


if($error !== 1 && $spr == 1 && isset($_POST['typ_konta_drop'])){ 
     
$ok = 1; 
$komunikat = 'Dokonano pomyślnie transakcji na kwotę   <strong>'.$_POST['kwota'].' PLN</strong> transakcji';



if($_GET['add'] == 1) {
    echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';
print_r($_POST);
    przelew($_POST['kwota'],$_POST['tytul'],$_POST['obdiorca'],$user_id,$klient_id['id'],$prowizja_klientx,$prowizja_userx,$pojemnosc_usera,$pojemnosc_klienta);

    $kom = komunikat(2);  $message = $kom['opis'];
$message = $kom."dokonano transakcji w systemie zielony kwota : ".$_POST['kwota']." tytułem: ".$_POST['tytul']." ";

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
  <div class="navbar-inner" style="width:40%; margin-top:-20px; padding:10px 1px 10px 1px; margin-left: auto; margin-right: auto;">

      <ul class="nav">
        <li><button class="btn"  onClick="location.href='?page=tranzakcje&trans=1'">dokonaj transakcji</button></li> 
        <li><button class="btn"  onclick="location.href='?page=tranzakcje&ref_w=1'" data-toggle="modal" data-target="#referencje_add">Referencje</button></li> 
 
    </ul>
  
  </div>
</div>
 <?php } ?>
    <?php    include_once ('./content/sort2.php'); 
if($_GET['ref'] == 1){    
    include('./content/referencja.php');
}


if($_SESSION['user']['type'] != 3) { 

    ?>
<table style="width: 99%; margin-left:auto; margin-right: auto;">
<thead>
    <tr>
<th rowspan="2"  class="spady">LP <span id="nrKier"></span></th>
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_sort_id)){echo '&'.$top_sort_id; } else { ?>&sort=1&sort_id=1&<?php } echo $other; ?>'" title="Sortowanie po: numer">nr trans. w system 
    <span id="nrKier"<?php 
    if($_REQUEST['sort_id'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['sort_id'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>



</th>
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_tytul)){echo '&'.$top_tytul; } else { ?>&sort=1&tytul=1&<?php } echo $other; ?>'" title="Sortowanie po: numer">
    tytuł  transakcji
    
    <span id="nrKier"<?php 
    if($sort['tytul'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['tytul'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>
<th colspan="<?php if($_SESSION['user']['type'] == 0){  echo '5'; } else { echo '4' ;}?>" id="idSort" title="Sortowanie po: numer">dane  nadawca <span id="nrKier"></span></th>
<th rowspan="2" id="idSort" class="sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_user_s)){echo '&'.$top_user_s; } else { ?>&sort=1&user_s=1&<?php } echo $other;?>'" title="Sortowanie po: numer">
    użytkownik
    <span id="nrKier"<?php 
    if($sort['user_s'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['user_s'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>


</th>
<th colspan="<?php if($_SESSION['user']['type'] == 0){  echo '5'; } else { echo '4' ;}?>" id="idSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">dane odbiorcy <span id="nrKier"></span></th>
<?php if($_SESSION['user']['type'] == 3){ ?>
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_saldo)){echo '&'.$top_saldo; } else { ?>&sort=1&saldo=1&<?php } echo $other;?>'" title="Sortowanie po: numer">
    saldo po operacji
    
   
  <span id="nrKier"<?php 
    if($sort['saldo'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['saldo'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>



    
</th>
<?php } ?>
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_data)){echo '&'.$top_data; } else { ?>&sort=1&data=1&<?php } echo $other;?>'" title="Sortowanie po: numer">
    data transakcji
    
    <span id="nrKier"<?php 
    if($sort['data'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['data'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>


</th>
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_referencje)){echo '&'.$top_referencje; } else { ?>&sort=1&referencje=1&<?php } echo $other;?>'" title="Sortowanie po: numer">
    
    
    referencje  
    <span id="nrKier"<?php 
    if($sort['referencje'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['referencje'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>

</th>

    </tr>
<tr>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_a_nazwa)){echo '&'.$top_a_nazwa; } else { ?>&sort=1&a_nazwa=1&<?php } echo $other;?>'">
        Nazwa firmy
    <span id="nrKier"<?php 
    if($sort['a_nazwa'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['a_nazwa'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
        
    </th>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_a_konto)){echo '&'.$top_a_konto; } else { ?>&sort=1&a_konto=1&<?php } echo $other;?>'">
    nr konta
    
    <span id="nrKier"<?php 
    if($sort['a_konto'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['a_konto'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    
    </th>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_a_nip)){echo '&'.$top_a_nip; } else { ?>&sort=1&a_nip=1&<?php } echo $other;?>'">
   
     Nip
    <span id="nrKier"<?php 
    if($sort['a_nip'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['a_nip'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>

    
    </th>
    <?php if($_SESSION['user']['type'] == 0){ ?>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_prowizja_a)){echo '&'.$top_prowizja_a; } else { ?>&sort=1&prowizja_a=1&<?php } echo $other;?>'">
       
       prowizja 
   
   <span id="nrKier"<?php 
    if($sort['prowizja_a'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['prowizja_a'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>

   
   
   
   </th>
    <?php } ?>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_kwota)){echo '&'.$top_kwota; } else { ?>&sort=1&kwota=1&<?php } echo $other;?>'">
        
    
        wydał
  <span id="nrKier"<?php 
    if($sort['kwota'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['kwota'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>

        
    </th>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_b_nazwa)){echo '&'.$top_b_nazwa; } else { ?>&sort=1&b_nazwa=1&<?php } echo $other;?>'">
        Nazwa firmy
    <span id="nrKier"<?php 
    if($sort['b_nazwa'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['b_nazwa'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
        
    </th>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_b_konto)){echo '&'.$top_b_konto; } else { ?>&sort=1&b_konto=1&<?php } echo $other;?>'">
    nr konta
    
    <span id="nrKier"<?php 
    if($sort['b_konto'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['b_konto'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    
    </th>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_b_nip)){echo '&'.$top_b_nip; } else { ?>&sort=1&b_nip=1&<?php } echo $other;?>'">
   
     Nip
    <span id="nrKier"<?php 
    if($sort['b_nip'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['b_nip'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>

    
    </th>    <?php if($_SESSION['user']['type'] == 0){ ?>
   <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_prowizja_b)){echo '&'.$top_prowizja_b; } else { ?>&sort=1&prowizja_b=1&<?php } echo $other;?>'">
       
       prowizja 
   
   <span id="nrKier"<?php 
    if($sort['prowizja_b'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['prowizja_b'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>

   
   
   
   </th>
    <?php } ?>
 <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_kwota2)){echo '&'.$top_kwota2; } else { ?>&sort=1&kwota2=1&<?php } echo $other;?>'">
        
    
        przyjął 
  <span id="nrKier"<?php 
    if($sort['kwota2'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['kwota2'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>

        
    </th>  
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
    <td class="spady"><?php echo  substr($tranzakcje_view[$i]['tytul'],0,12) ?></td>
    <td class="spady" style="text-align: left; margin-left: 2px;"><font <?php if($klient_a['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_a['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_a['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_a['nazwa'];  ?> 
        </font></td>
    <td class="spady"><?php echo $tranzakcje_view[$i]['konto_a']; ?></td>
    <td class="spady"> <?php if($klient_a['typ_konta'] == 0){ echo $tranzakcje_view[$i]['nip_a']; } else { echo '[konto prywatne]';} ?></td>
   
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
    <td class="spady"><?php echo $tranzakcje_view[$i]['konto_b']; ?></td>
    <td class="spady"><?php if($klient_b['typ_konta'] == 0){ echo $tranzakcje_view[$i]['nip_b']; } else { echo '[konto prywatne]';}; ?></td>
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


<?php } else { ?>


<table style="width: 99%; margin-left:auto; margin-right: auto;">
<thead>
    <tr>
<th rowspan="2"  class="spady">LP <span id="nrKier"></span></th>
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_sort_id)){echo '&'.$top_sort_id; } else { ?>&sort=1&sort_id=1&<?php } echo $other; ?>'" title="Sortowanie po: numer">nr trans. w system 
    <span id="nrKier"<?php 
    if($_REQUEST['sort_id'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['sort_id'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>



</th>
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_tytul)){echo '&'.$top_tytul; } else { ?>&sort=1&tytul=1&<?php } echo $other; ?>'" title="Sortowanie po: numer">
    tytuł  transakcji
    
    <span id="nrKier"<?php 
    if($sort['tytul'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['tytul'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>
<th colspan="3" id="idSort" title="Sortowanie po: numer">dane kontrahenta <span id="nrKier"></span></th>
<th rowspan="2" id="idSort" class="sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_user_s)){echo '&'.$top_user_s; } else { ?>&sort=1&user_s=1&<?php } echo $other;?>'" title="Sortowanie po: numer">
    użytkownik
    <span id="nrKier"<?php 
    if($sort['user_s'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['user_s'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>


</th>


<th rowspan="2" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_kwota)){echo '&'.$top_kwota; } else { ?>&sort=1&kwota=1&<?php } echo $other;?>'">
        
    
        wydał
  <span id="nrKier"<?php 
    if($sort['kwota'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['kwota'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>

        
    </th>

    
    <th rowspan="2" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_kwota2)){echo '&'.$top_kwota2; } else { ?>&sort=1&kwota2=1&<?php } echo $other;?>'">
        
    
        przyjął 
  <span id="nrKier"<?php 
    if($sort['kwota2'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['kwota2'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>

        
    </th>
    
    <th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_saldo)){echo '&'.$top_saldo; } else { ?>&sort=1&saldo=1&<?php } echo $other;?>'" title="Sortowanie po: numer">
    saldo po operacji
    
   
  <span id="nrKier"<?php 
    if($sort['saldo'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['saldo'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>



    
</th>
    
    
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_data)){echo '&'.$top_data; } else { ?>&sort=1&data=1&<?php } echo $other;?>'" title="Sortowanie po: numer">
    data transakcji
    
    <span id="nrKier"<?php 
    if($sort['data'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['data'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>


</th>
    
    
<th rowspan="2" id="idSort" class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_referencje)){echo '&'.$top_referencje; } else { ?>&sort=1&referencje=1&<?php } echo $other;?>'" title="Sortowanie po: numer">
    
    
    referencje  
    <span id="nrKier"<?php 
    if($sort['referencje'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['referencje'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>

</th>

    </tr>
<tr>
 
       <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_b_nazwa)){echo '&'.$top_b_nazwa; } else { ?>&sort=1&b_nazwa=1&<?php } echo $other;?>'">
        Nazwa firmy
    <span id="nrKier"<?php 
    if($sort['b_nazwa'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['b_nazwa'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
        
    </th>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_b_konto)){echo '&'.$top_b_konto; } else { ?>&sort=1&b_konto=1&<?php } echo $other;?>'">
    nr konta
    
    <span id="nrKier"<?php 
    if($sort['b_konto'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['b_konto'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    
    </th>
    <th class="spady sort" onClick="location.href='?page=<?php echo $_GET['page'] ; if(!empty($top_b_nip)){echo '&'.$top_b_nip; } else { ?>&sort=1&b_nip=1&<?php } echo $other;?>'">
   
     Nip
    <span id="nrKier"<?php 
    if($sort['b_nip'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['b_nip'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>

    
    </th>    
 
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
    <td class="spady"><?php echo  substr($tranzakcje_view[$i]['tytul'],0,12) ?></td>
    <td class="spady" style="text-align: left; margin-left: 2px;">
    <?php if($klienci_glowna['id'] != $klient_a['id']){  ?>    
        
        <font <?php if($klient_a['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_a['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_a['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_a['nazwa'];  ?> 
       </font>
    <?php } else { ?>
    <font <?php if($klient_b['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_b['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_b['wspoldzielca'] == 1){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_b['nazwa'];  ?> 
        </font>
    <?php } ?>
    </td>
    <td class="spady">
     <?php if($klienci_glowna['id'] != $klient_a['id']){ 
        echo $tranzakcje_view[$i]['konto_a']; 
     } else {
       echo $tranzakcje_view[$i]['konto_b']; 
     }
       
       ?> 
    </td>
    <td class="spady"> 
    <?php if($klienci_glowna['id'] != $klient_a['id']){     
       if($klient_a['typ_konta'] == 0){ echo $tranzakcje_view[$i]['nip_a']; } else { echo '[konto prywatne]';} 
   
}else {
    
    if($klient_b['typ_konta'] == 0){ echo $tranzakcje_view[$i]['nip_b']; } else { echo '[konto prywatne]';}; 
    
    }
    ?>
    </td>
  
   <td class="spady"><?php echo user($tranzakcje_view[$i]['user_id']); ?></td>

   
    <td class="spady">
    <?php if($klienci_glowna['id'] == $klient_a['id']){ 
    
    echo '<font color="red">-'.number_format($tranzakcje_view[$i]['kwota'],2).'</font>';
    $suma_wy +=$tranzakcje_view[$i]['kwota'];
    
    } else { echo '-' ; } ?>
   
    
    </td>
  
     <td class="spady">
     <?php if($klienci_glowna['id'] != $klient_a['id']){  
     
     echo number_format($tranzakcje_view[$i]['kwota'],2); 
     $suma_przy += $tranzakcje_view[$i]['kwota'];
     
     } else { echo '-'; }
     ?></td>
     
     <td>
     <?php if($klienci_glowna['nr_umowy'] == $klient_a['nr_umowy']) {  ?>
         <font <?php if($tranzakcje_view[$i]['saldo_do_b'] < 0 ){echo 'class="czerwony"';} ?>> <?php echo $tranzakcje_view[$i]['saldo_do_b']; ?></font> </td>
     <?php } else { ?>
        <font <?php if($tranzakcje_view[$i]['saldo_do_a'] < 0 ){echo 'class="czerwony"';} ?>> <?php echo $tranzakcje_view[$i]['saldo_do_a']; ?></font> </td>
     
     
     
     <?php  }    ?>
    
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
      
     
  <td colspan="7" style="text-align:right;">suma:</td>
  <td class="zolty"><strong><font color="red">-<?php echo number_format($suma_wy,2);?></font></strong></td>
  <td class="zolty"><strong><?php echo number_format($suma_przy,2);?></strong></td>
          
               <td colspan="3"> &nbsp;</td>      
</table>


















<?php } ?>


    <?php    
    if(($_GET['trans'] == 1 || $error == 1) && $_GET['klient']!=1){
    include_once('./content/tranzakcja_add.php');
    
    }
    if(($_GET['trans'] == 2 && $error != 1) && $_GET['klient']!=1 ){
    include_once('./content/tranzakcja_add2.php');
    
    }
if($_GET['ref_w'] == 1){
    include_once('./content/referencja_view.php');
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