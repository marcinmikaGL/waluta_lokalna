<?php

$debag = 0;
if(!empty($_REQUEST['del'])&& !empty($_REQUEST['ido'])){ usun_usergroup($_REQUEST['del']); }

if($_REQUEST['sort'] == 1){


$nr_karty = $_REQUEST['nr_karty'];
$nr_konta = $_REQUEST['nr_konta'];   
$sort_nazwa_top = $_REQUEST['sort_nazwa_top'];    
$saldo_b = $_REQUEST['saldo_b'];
$saldo_l = $_REQUEST['saldo_l'];
$saldo_d = $_REQUEST['saldo_d'];
$kwota_do_w = $_REQUEST['kwota_do_w'];
$kwota_do_p = $_REQUEST['kwota_do_p'];
$sort_prowizja = $_REQUEST['sort_prowizja'];
$tranzakcje_w = $_REQUEST['tranzakcje_w'];
$tranzakcje_w_sum = $_REQUEST['tranzakcje_w_sum'];
$tranzakcje_p = $_REQUEST['tranzakcje_p'];
$tranzakcje_p_sum = $_REQUEST['tranzakcje_p_sum'];
$waznosc_d = $_REQUEST['waznosc_d'];
$waznosc_k = $_REQUEST['waznosc_k'];
$data_r = $_REQUEST['data_r'];          





 



if(!is_array($sort)) { $sort = array(sort => $_REQUEST['sort']); }

if(!empty($nr_konta)){ $sort = array(sort => $_REQUEST['sort'],nr_konta =>$nr_konta);  }
if($sort['nr_konta'] == 1){ $nr_konta_s= 2;}else { $nr_konta_s= 1;}
$top_nr_konta = 'sort=1&nr_konta='.$nr_konta_s;
$top_nr_konta .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_nr_konta .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_nr_konta .= '&waznosc_d=0&waznosc_k=0';
$top_nr_konta .= '&data_r=0';

if(!empty($sort_nazwa_top)){ $sort = array(sort => $_REQUEST['sort'],sort_nazwa_top =>$sort_nazwa_top);  }
if($sort['sort_nazwa_top'] == 1){ $sort_nazwa_top_s= 2;}else { $sort_nazwa_top_s= 1;}
$top_sort_nazwa_top = 'sort=1&nr_konta=0';
$top_sort_nazwa_top .= '&sort_nazwa_top='.$sort_nazwa_top_s.'&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_sort_nazwa_top .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_sort_nazwa_top .= '&waznosc_d=0&waznosc_k=0';
$top_sort_nazwa_top .= '&data_r=0';

if(!empty($saldo_b)){ $sort = array(sort => $_REQUEST['sort'],saldo_b =>$saldo_b);  }
if($sort['saldo_b'] == 1){ $saldo_b_s= 2;}else { $saldo_b_s= 1;}
$top_saldo_b = 'sort=1&nr_konta=0';
$top_saldo_b .= '&sort_nazwa_top=0&saldo_b='.$saldo_b_s.'&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_saldo_b .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_saldo_b.= '&waznosc_d=0&waznosc_k=0';
$top_saldo_b .= '&data_r=0';

if(!empty($saldo_l)){ $sort = array(sort => $_REQUEST['sort'],saldo_l =>$saldo_l);  }
if($sort['saldo_l'] == 1){ $saldo_l_s= 2;}else { $saldo_l_s= 1;}
$top_saldo_l = 'sort=1&nr_konta=0';
$top_saldo_l .= '&sort_nazwa_top=0&saldo_b=0&saldo_l='.$saldo_l_s.'&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_saldo_l .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_saldo_l.= '&waznosc_d=0&waznosc_k=0';
$top_saldo_l .= '&data_r=0';


if(!empty($saldo_d)){ $sort = array(sort => $_REQUEST['sort'],saldo_d =>$saldo_d);  }
if($sort['saldo_d'] == 1){ $saldo_d_s= 2;}else { $saldo_d_s= 1;}
$top_saldo_d = 'sort=1&nr_konta=0';
$top_saldo_d .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d='.$saldo_d_s.'&kwota_do_w=0&kwota_do_p=0';
$top_saldo_d .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_saldo_d.= '&waznosc_d=0&waznosc_k=0';
$top_saldo_d .= '&data_r=0';


if(!empty($kwota_do_w)){ $sort = array(sort => $_REQUEST['sort'],kwota_do_w =>$kwota_do_w);  }
if($sort['kwota_do_w'] == 1){ $kwota_do_w_s= 2;}else { $kwota_do_w_s= 1;}
$top_kwota_do_w = 'sort=1&nr_konta=0';
$top_kwota_do_w .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w='.$kwota_do_w_s.'&kwota_do_p=0';
$top_kwota_do_w .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_kwota_do_w.= '&waznosc_d=0&waznosc_k=0';
$top_kwota_do_w .= '&data_r=0';


if(!empty($kwota_do_p)){ $sort = array(sort => $_REQUEST['sort'],kwota_do_p =>$kwota_do_p);  }
if($sort['kwota_do_p'] == 1){ $kwota_do_p_s= 2;}else { $kwota_do_p_s= 1;}
$top_kwota_do_p = 'sort=1&nr_konta=0';
$top_kwota_do_p .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p='.$kwota_do_p_s;
$top_kwota_do_p .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_kwota_do_p .= '&waznosc_d=0&waznosc_k=0';
$top_kwota_do_p .= '&data_r=0';


if(!empty($sort_prowizja)){ $sort = array(sort => $_REQUEST['sort'],sort_prowizja =>$sort_prowizja);  }
if($sort['sort_prowizja'] == 1){ $sort_prowizja_s= 2;}else { $sort_prowizja_s= 1;}
$top_sort_prowizja = 'sort=1&nr_konta=0';
$top_sort_prowizja .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_sort_prowizja .= '&sort_prowizja='.$sort_prowizja_s.'&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_sort_prowizja .= '&waznosc_d=0&waznosc_k=0';
$top_sort_prowizja .= '&data_r=0';

if(!empty($tranzakcje_w)){ $sort = array(sort => $_REQUEST['sort'],tranzakcje_w =>$tranzakcje_w);  }
if($sort['tranzakcje_w'] == 1){ $tranzakcje_w_s= 2;}else { $tranzakcje_w_s= 1;}
$top_tranzakcje_w = 'sort=1&nr_konta=0';
$top_tranzakcje_w .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_tranzakcje_w .= '&sort_prowizja=0&tranzakcje_w='.$tranzakcje_w_s.'&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_tranzakcje_w .= '&waznosc_d=0&waznosc_k=0';
$top_tranzakcje_w .= '&data_r=0';

if(!empty($tranzakcje_w_sum)){ $sort = array(sort => $_REQUEST['sort'],tranzakcje_w_sum =>$tranzakcje_w_sum);  }
if($sort['tranzakcje_w_sum'] == 1){ $tranzakcje_w_sum_s= 2;}else { $tranzakcje_w_sum_s= 1;}
$top_tranzakcje_w_sum = 'sort=1&nr_konta=0';
$top_tranzakcje_w_sum .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_tranzakcje_w_sum .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum='.$tranzakcje_w_sum_s.'&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_tranzakcje_w_sum .= '&waznosc_d=0&waznosc_k=0';
$top_tranzakcje_w_sum .= '&data_r=0';

if(!empty($tranzakcje_p)){ $sort = array(sort => $_REQUEST['sort'],tranzakcje_p =>$tranzakcje_p);  }
if($sort['tranzakcje_p'] == 1){ $tranzakcje_p_s= 2;}else { $tranzakcje_p_s= 1;}
$top_tranzakcje_p = 'sort=1&nr_konta=0';
$top_tranzakcje_p .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_tranzakcje_p .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p='.$tranzakcje_p_s.'&tranzakcje_p_sum=0';
$top_tranzakcje_p .= '&waznosc_d=0&waznosc_k=0';
$top_tranzakcje_p .= '&data_r=0';

if(!empty($tranzakcje_p_sum)){ $sort = array(sort => $_REQUEST['sort'],tranzakcje_p_sum =>$tranzakcje_p_sum);  }
if($sort['tranzakcje_p_sum'] == 1){ $tranzakcje_p_sum_s= 2;}else { $tranzakcje_p_sum_s= 1;}
$top_tranzakcje_p_sum = 'sort=1&nr_konta=0';
$top_tranzakcje_p_sum .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_tranzakcje_p_sum .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum='.$tranzakcje_p_sum_s;
$top_tranzakcje_p_sum .= '&waznosc_d=0&waznosc_k=0';
$top_tranzakcje_p_sum .= '&data_r=0';

if(!empty($waznosc_d)){ $sort = array(sort => $_REQUEST['sort'],waznosc_d =>$waznosc_d);  }
if($sort['waznosc_d'] == 1){ $waznosc_d_s= 2;}else { $waznosc_d_s= 1;}
$top_waznosc_d = 'sort=1&nr_konta=0';
$top_waznosc_d .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_waznosc_d .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_waznosc_d .= '&waznosc_d='.$waznosc_d_s.'&waznosc_k=0';
$top_waznosc_d .= '&data_r=0';

if(!empty($waznosc_k)){ $sort = array(sort => $_REQUEST['sort'],waznosc_k =>$waznosc_k);  }
if($sort['waznosc_k'] == 1){ $waznosc_k_s= 2;}else { $waznosc_k_s= 1;}
$top_waznosc_k = 'sort=1&nr_konta=0';
$top_waznosc_k .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_waznosc_k .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_waznosc_k .= '&waznosc_d=0&waznosc_k='.$waznosc_k_s;
$top_waznosc_k .= '&data_r=0';



if(!empty($data_r)){ $sort = array(sort => $_REQUEST['sort'],data_r =>$data_r);  }
if($sort['data_r'] == 1){ $data_r_s= 2;}else { $data_r_s= 1;}
$top_data_r = 'sort=1&nr_konta=0';
$top_data_r .= '&sort_nazwa_top=0&saldo_b=0&saldo_l=0&saldo_d=0&kwota_do_w=0&kwota_do_p=0';
$top_data_r .= '&sort_prowizja=0&tranzakcje_w=0&tranzakcje_w_sum=0&tranzakcje_p=0&tranzakcje_p_sum=0';
$top_data_r .= '&waznosc_d=0&waznosc_k=0';
$top_data_r .= '&data_r='.$data_r_s;




$sort['nr_konta_input'] = $_REQUEST['nr_konta_input'];
$sort['sort_nazwa'] = $_REQUEST['sort_nazwa'];
$sort['typ_umowy'] = $_REQUEST['typ_umowy'];    
$sort['numer'] = $_REQUEST['numer'];
$sort['email'] = $_REQUEST['email'];
$sort['miasto'] = $_REQUEST['miasto'];
$sort['woj'] = $_REQUEST['woj'];
$sort['ile_wyn'] = $_REQUEST['ile_wyn'];
$sort['branza'] = $_REQUEST['branza'];
$sort['kwota_typ'] = $_REQUEST['kwota_typ'];
$sort['kwota_od'] = $_REQUEST['kwota_od'];
$sort['kwota_do'] = $_REQUEST['kwota_do'];
$sort['data_od'] = $_REQUEST['data_od'];
$sort['data_do'] = $_REQUEST['data_do'];
$sort['uzytkownik'] = $_REQUEST['uzytkownik'];
$sort['poziom'] = $_REQUEST['poziom'];


$other = '&sort_nazwa='.$_REQUEST['sort_nazwa'];
$other .='&nr_konta_input='.$_REQUEST['nr_konta_input'];
$other .='&typ_umowy='.$_REQUEST['typ_umowy'];    
$other .='&numer='.$_REQUEST['numer'];
$other .='&email='. $_REQUEST['email'];
$other .='&miasto='. $_REQUEST['miasto'];
$other .='&branza='. $_REQUEST['branza'];
$other .='&woj='. $_REQUEST['woj'];
$other .='&ile_wyn='. $_REQUEST['ile_wyn'];
$other .='&data_od='. $_REQUEST['data_od'];
$other .='&data_do='. $_REQUEST['data_do'];
$other .='&uzytkownik='. $_REQUEST['uzytkownik'];
$other .='&poziom='.$_REQUEST['poziom'];
$other .='&broker='.$_REQUEST['broker'];
$other .='&branza='.$_REQUEST['branza'];
$other .='&nr_karty='.$_REQUEST['nr_karty'];

$sort['typ_umowy'] = $_REQUEST['typ_umowy'];    
$sort['email'] = $_REQUEST['email'];
$sort['branza'] = $_REQUEST['branza'];
$sort['poziom'] = $_REQUEST['poziom'];
$sort['broker'] =$_REQUEST['broker'];
$sort['branza'] =$_REQUEST['branza'];
$sort['nr_karty'] = $_REQUEST['nr_karty'];





} else {
$sort = 0 ;    
    
}


  if((isset($_REQUEST['add']) && !empty($_REQUEST['add'])) && $_REQUEST['add'] == '1' ){
         $dodaj_kontakt = array(
    'type'=> $_POST['user'] ,         
    'login'=> $_POST['loginy'] ,  
    'haslo'=> $_POST['hasloy'],
    'imie'=> $_POST['imie'] ,  
    'nazwisko'=> $_POST['nazwisko'],        
    'telefon'=> $_POST['telefon'],
    'email'=> $_POST['email'],        
    'adres'=> $_POST['adres'],
    'kod'=> $_POST['kod'],
    'miasto'=> $_POST['miasto'],
    'uwagi'=> $_POST['uwagi']         
                 
            ); 
sql_q('dodano_do_bazy');
             dodaj_kontakt($dodaj_kontakt);
  }
  
  // nie ruszamy to na update i add 
  


  $n = count($_POST['typ_konta']);
           
           
           for($i=0;$i<$n;$i++){
            if($_POST['typ_konta'][$i] == 1) { $wspol = 1 ; }
            if($_POST['typ_konta'][$i] == 2) { $zpp = 1 ; }
            if($_POST['typ_konta'][$i] == 3) { $zapot = 1 ; }
            if($_POST['typ_konta'][$i] == 4) { $przelew = 1 ; }
            if($_POST['typ_konta'][$i] == 5) { $historia = 1 ; }
            if($_POST['typ_konta'][$i] == 6) { $oferty = 1 ; }  
               
           }
              
        $nr_umowy_add = $_POST['nr_konta_add'];
           
        
         if(empty($nr_umowy_add)){
             
         $nr_umowy_add = $_POST['nr_umowy'];    
         }
         
          if($_POST['typ_konta_drop'] == 1) {
         $_POST['nip'] = $nr_umowy_add;   
         } 
         
         if(!empty($_POST['ids']) && isset($_POST['ids'])){
            $dane = klienci($_POST['ids']);
            
          if($dane['przyjecie'] <= 0){ $dane['przyjecie'] = 0;  } 
          $przyjecie = ($dane['przyjecie'] -$dane['limit']) +  $_POST['pojemnosc'] ;  
       
          if($dane['dowydania'] <= 0){ $dane['dowydania'] = 0;  }    
          $dowydania = ($dane['dowydania'] - $dane['debet']) + $_POST['debet'] ;  
          
          
         } else {
          $przyjecie =  $_POST['pojemnosc'];  
          $dowydania = $_POST['debet'];   
         }
if(!empty($_POST['poz_roz'])){
      $poziomy = implode(",",$_POST['poz_roz']);
}

//if($_REQUEST['add'] !=3 ){         
        $dodaj_kontakt = array(
        'aktywny'=>  $_POST['akt'],
        'nazwa'=> $_POST['naz'] , 
        'nip'=>  $_POST['nip'] ,
        'nr_umowy'=> $nr_umowy_add ,    
        'limit'=>  floatval($_POST['pojemnosc']) ,
        'przyjecie'=>  floatval($przyjecie) ,
        'prowizja'=>  floatval($_POST['prowizja_b']) ,
        'telefon_firmowy'=> $_POST['telefon_firmowy'] ,
        'fax'=> $_POST['fax'] ,
        'www'=> $_POST['www'] ,
        'telefon1'=> $_POST['telefon_k1'] ,
        'telefon2'=> $_POST['telefon_k2'] ,
        'telefon3'=> $_POST['telefon_k3'] ,
        'telefon4'=> $_POST['telefon_k4'] ,
        'email_firmowy'=> $_POST['email_firmowy'] ,   
        'email1'=> $_POST['email_k1'] ,
        'email2'=> $_POST['email_k2'] ,
        'email3'=> $_POST['email_k3'] ,
        'email4'=> $_POST['email_k4'] ,
        'imie1'=> $_POST['imie_k1'] ,
        'imie2'=> $_POST['imie_k2'] ,
        'imie3'=> $_POST['imie_k3'] ,
        'imie4'=> $_POST['imie_k4'] ,
        'nazwisko1'=> $_POST['nazwisko_k1'] ,
        'nazwisko2'=> $_POST['nazwisko_k2'] ,
        'nazwisko3'=> $_POST['nazwisko_k3'] ,
        'nazwisko4'=> $_POST['nazwisko_k4'] ,
        'typ_umowy'=> $_POST['typ_umowy'] ,
        'typ_konta'=> $_POST['typ_konta_drop'] ,
        'nr_karty'=> $_POST['nr_karty'] ,
        'data_oplaty'=> $_POST['data_oplaty'] ,
        'data_umowy'=> $_POST['data_umowy'] ,  
        'waznosc_debetu'=> $_POST['data_debetu'] ,    
        'procet_zwrotu'=> floatval($_POST['procet_zwrotu']) ,    
        'adres1'=> $_POST['adres1'] ,
        'miasto1'=> $_POST['miasto1'],
        'kod1'=>$_POST['kod1'] ,
       'adres2'=> $_POST['adres2'], 
       'miasto2'=> $_POST['miasto2'],
       'woj1'=> $_POST['woj1'],
       'woj2'=> $_POST['woj2'],
       'debet'=> $_POST['debet'],
       'dowydania'=> $dowydania,     
      'kod2'=>  $_POST['kod2'],
       'zpp'=> $zpp ,
       'wspoldzielca'=> $wspol,
       'oferty'=>  $oferty , 
       'przelwy'=> $przelew ,
       'zapotrzebowania' => $zapot ,    
       'historie_tranzakcji'=> $historia,
       'uwagi'=> $_POST['uwagi'],
       'komunikat'=>$_POST['komunikat'],     
       'poziomy'=> $poziomy     
 );
        
     

 

  
  if((isset($_REQUEST['add']) && !empty($_REQUEST['add'])) && $_REQUEST['add'] == 2){
 
sql_q('dodano_do_bazy_klient');
 dodaj_klienta($dodaj_kontakt);
 $klienta = klienci_id($_POST['nip']); 
 
 
 
klient_group2($_POST['uzytkownik'],$_POST['nip'],$_POST['naz'],$klienta,2);  

 
  if(!empty($_POST['typ_branza'])){ $n = count($_POST['typ_branza']); for($i=0;$i<$n;$i++){ branza_group($_POST['typ_branza'][$i],$klienta); } }
   if(!empty($_POST['poz_roz'])){ $n= count($_POST['poz_roz']); for($i=0;$i<$n;$i++){poziom_group($_POST['poz_roz'][$i],$klienta); } }
   
 
 
  }
  
  $klienta = klienci_id($_POST['nip']);  
  
  
   

 
$klient_id =  klienci_nr() ;
    
 

      if((isset($_REQUEST['add']) && !empty($_REQUEST['add'])) && $_REQUEST['add'] == '3' ){
  echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_REQUEST['page'].'">'; 
      

     
konto_klient_update($_POST['ids'],$dodaj_kontakt);


$ids = $_POST['ids'];

if(!empty($_POST['typ_branza'])){ 
    $n = count($_POST['typ_branza']);
     branza_group_del($_POST['ids']);
 
     for($i=0;$i<$n;$i++){ if($_POST['typ_branza'][$i] != 0){  branza_group($_POST['typ_branza'][$i],$_POST['ids']); }  
     
     
     
     } }

     
     $poziom = poziom_group_klient_row($ids); 
$n= count($_POST['poz_roz']);
      if(!empty($_POST['poz_roz'])){  
   poziom_group_del($_POST['ids']);
      for($i=0;$i<$n;$i++){poziom_group($_POST['poz_roz'][$i],$_POST['ids']); } 
      } 
          
          
          
      
     
sql_q('klient_update');
     


      }
 

      
  if((isset($_REQUEST['add']) && !empty($_REQUEST['add'])) && $_REQUEST['add'] == 4){ 
 
 klient_group2($_POST['uzytkownik'],$_POST['nip'],$_POST['nazwa'],$_POST['id'],$_POST['typ']); 
      
  } 
   
     
 
  
?>


             


<?php 
include ('content/klient_menu.php');
include_once ('./content/sort.php');
//echo 'posty : ';
//print_r($_REQUEST);

?>
   
<table style="width: 99%; margin-left:auto; margin-right: auto;">
<thead>
    <tr>
<th rowspan="2" id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">LP <span id="nrKier"></span></th>
<th rowspan="2" colspan="2" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_nr_konta)){echo '&'.$top_nr_konta; } else { ?>&sort=1&nr_konta=1&<?php } echo $other;?>'">        
    numer konta <?php ?>
    <span id="nrKier"<?php 
    if($sort['nr_konta'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['nr_konta'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>



<th rowspan="2"  class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_sort_nazwa_top)){echo '&'.$top_sort_nazwa_top; } else { ?>&sort=1&sort_nazwa_top=1&<?php } echo $other;?>'">        
    nazwa klienta <?php ?>
    <span id="nrKier"<?php 
    if($sort['sort_nazwa_top'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['sort_nazwa_top'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>

<th colspan="3">saldo</th><th colspan="2">kwota do</th>
<th colspan="2">prowizja</th><th colspan="4">transakcje</th><th colspan="2">ważność</th>
<?php if($_SESSION['user']['type'] == 1 || $_SESSION['user']['type'] == 2){ ?>
<th rowspan="2" style="width: 90px;" class="spady sort">
data podpisania umowy    
    
</th>
<?php } ?>
  <?php if($_SESSION['user']['type'] == 1 && $_SESSION['user']['type'] == 2){  ?>
<th rowspan="2"  class="sort"> data dodania</th>
<?php  } ?> 
<?php if($_SESSION['user']['type'] != 1 && $_SESSION['user']['type'] != 2){ ?>
<th rowspan="2" colspan="7"><span class="glyphicon glyphicon-cog"></span></th>
<?php  } ?>    
  

    </tr>
    <tr>
<th id="baSort" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_saldo_b)){echo '&'.$top_saldo_b; } else { ?>&sort=1&saldo_b=1&<?php } echo $other;?>'">
bieżące
 <span id="nrKier"<?php 
    if($sort['saldo_b'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['saldo_b'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>


</th>
<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_saldo_l)){echo '&'.$top_saldo_l; } else { ?>&sort=1&saldo_l=1&<?php } echo $other;?>'">
limit<span <?php 
    if($sort['saldo_l'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['saldo_l'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 <th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_saldo_d)){echo '&'.$top_saldo_d; } else { ?>&sort=1&saldo_d=1&<?php } echo $other;?>'">
 debet
     
     <span <?php 
    if($sort['saldo_d'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['saldo_d'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>
 
 
 
 </th>
<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_kwota_do_w)){echo '&'.$top_kwota_do_w; } else { ?>&sort=1&kwota_do_w=1&<?php } echo $other;?>'">
wydania

 <span <?php 
    if($sort['kwota_do_w'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['kwota_do_w'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>

</th>
<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_kwota_do_p)){echo '&'.$top_kwota_do_p; } else { ?>&sort=1&kwota_do_p=1&<?php } echo $other;?>'">
przyjecia
 <span <?php 
    if($sort['kwota_do_p'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['kwota_do_p'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>

</th>
        
<th  colspan="2" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_sort_prowizja)){echo '&'.$top_sort_prowizja; } else { ?>&sort=1&sort_prowizja=1&<?php } echo $other;?>'">
PLN
 <span <?php 
    if($sort['sort_prowizja'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['sort_prowizja'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>



</th>
<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_tranzakcje_w)){echo '&'.$top_tranzakcje_w; } else { ?>&sort=1&tranzakcje_w=1&<?php } echo $other;?>'">
wydał 
<span <?php 
    if($sort['tranzakcje_w'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['tranzakcje_w'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>

</th>
        
<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_tranzakcje_w_sum)){echo '&'.$top_tranzakcje_w_sum; } else { ?>&sort=1&tranzakcje_w_sum=1&<?php } echo $other;?>'">
Σ
<span <?php 
    if($sort['tranzakcje_w_sum'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['tranzakcje_w_sum'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>

</th>
   

       <th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_tranzakcje_p)){echo '&'.$top_tranzakcje_p; } else { ?>&sort=1&tranzakcje_p=1&<?php } echo $other;?>'"> 
           przyjął
<span <?php
    if($sort['tranzakcje_p'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['tranzakcje_p'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>

</th> 
    
<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_tranzakcje_p_sum)){echo '&'.$top_tranzakcje_p_sum; } else { ?>&sort=1&tranzakcje_p_sum=1&<?php } echo $other;?>'"> 
Σ
<span <?php
    if($sort['tranzakcje_p_sum'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['tranzakcje_p_sum'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>

</th> 

<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_waznosc_d)){echo '&'.$top_waznosc_d; } else { ?>&sort=1&waznosc_d=1&<?php } echo $other;?>'"> 
debetu
<span <?php
    if($sort['waznosc_d'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['waznosc_d'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>

</th>

<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_waznosc_k)){echo '&'.$top_waznosc_k; } else { ?>&sort=1&waznosc_k=1&<?php } echo $other;?>'"> 
konta
<span <?php
    if($sort['waznosc_k'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['waznosc_k'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span>

</th>




</thead>
<tbody>
<?php 
$klient_view = sql_q('klienci');
$n = count($klient_view); 

//print_r(broker($_SESSION['user']['id'])) ;




if($n > 0){
for($i=0;$i<$n;$i++){
  $in = $n-$i;

if(broker($_SESSION['user']['id'],$klient_view[$i]['id']) == 1 || $_SESSION['user']['type'] !=2) {
 
?>
    <tr <?php if ($in % 2 == 0) {  ?> class="zolty" <?php } ?>> 
    <td id="lp"><?php echo $in; ?></td>     
  
    
    <td id="nr_umowy"><?php echo $klient_view[$i]['nr_umowy']; ?> 

    
    
    </td>
    <td> 
   <?php if(broker_test($klient_view[$i]['id']) !=1) { waznosc_brokera($klient_view[$i]['id']); echo '<strong style="font-size:22px; color:red;">*</strong>'; } ?>      
        
        <?php if($klient_view[$i]['aktywny'] == 0){ ?> <img class="spady" style="border:1px solid black; background-color: #FFF" height="28" src="img/stop.jpg">  <?php } ?>    </td>
    <td id="nazwa" style="text-align: left;" class="spady">
<?php if($_SESSION['user']['type'] != 1 &&  $_SESSION['user']['type'] !=2){ ?>	
        <a href="?page=<?php echo $_REQUEST['page'];?>&id=<?php echo $klient_view[$i]['id']; ?>&type=<?php echo $klient_view[$i]['typ_konta']; ?>" style="cursor: pointer;">       
<?php } ?>
        <font <?php if($klient_view[$i]['aktywny'] == 0){ ?> class="czerwony" <?php } ?>>
   <?php if($klient_view[$i]['zpp']==1){?> <span title="zpp"  style="background-color: #3c763d; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
   <?php if($klient_view[$i]['wspoldzielca'] == 1 ){?> <span title="spółdzielca" style="background-color: #003399; border:1px solid black;">&nbsp;&nbsp;</span><?php }  ?>
 <?php echo $klient_view[$i]['nazwa'];  ?> 
        </font>
    <?php if($_SESSION['user']['type'] != 1  || $_SESSION['user']['type'] != 2){ ?>
        </a>
    <?php } ?>
    </td>
    <td id="saldo_bierzace"><span <?php if($klient_view[$i]['pojemnosc']<0){ $pojemnosc_minus += ($klient_view[$i]['pojemnosc']* -1); ?> class="czerwony" <?php }else { $pojemnosc_plusy += $klient_view[$i]['pojemnosc'];  } ?>> <?php echo number_format($klient_view[$i]['pojemnosc'],2);  ?></span></td>
   <td id="saldo_limit"><?php echo number_format($klient_view[$i]['limit'],2);  ?></td>
   <td id="saldo_debet"><?php echo number_format($klient_view[$i]['debet'],2);  ?></td>
   <td id="kwota_do_wydania"><span <?php if($klient_view[$i]['dowydania']<0)  { $kwota_do_wydania_minus += ($klient_view[$i]['dowydania']* -1); ?> class="czerwony" <?php } else { $kwota_do_wydania_plus += ($klient_view[$i]['dowydania']) ; }  ?>><?php echo number_format($klient_view[$i]['dowydania'],2);  ?></span></td>
   <td id="kwota_do_przyjecia"><span <?php if($klient_view[$i]['przyjecie']<0){ $kwota_do_przyjecia_minus += ($klient_view[$i]['przyjecie']* -1);  ?> class="czerwony" <?php } ?>><?php echo number_format($klient_view[$i]['przyjecie'],2);  ?></span></td>
   <td id="prowizja_zl" colspan="2"><?php echo number_format($klient_view[$i]['prowizja_b'],2);  ?></td>
   <td id="tranzakcje_w"><?php echo number_format($klient_view[$i]['wydanie'],2);  ?></td>
   <td>(<?php echo tranzakcje_ile($klient_view[$i]['id'],1,0);  ?>) </td>
   <td id="tranzakce_p"><?php echo number_format($klient_view[$i]['trans_p'],2);  ?></td>
   <td>(<?php echo tranzakcje_ile($klient_view[$i]['id'],2,0);  ?>)</td>
   <td><?php 
   if(!empty($klient_view[$i]['waznosc_debetu'])){
   if(spr_data($klient_view[$i]['waznosc_debetu'])==0 ){ waznosc_debetu($klient_view[$i]['id']); echo '<font color="red">'; echo $klient_view[$i]['waznosc_debetu']; echo '</font>'; } else {
       echo $klient_view[$i]['waznosc_debetu'];   
   }} else { 
       waznosc_debetu($klient_view[$i]['id']);
       echo '<strong style="color:red;">brak daty</strong>'; }
   ?>
   </td>
   <td>
   <?php    
   if(!empty($klient_view[$i]['data_umowy'])){    
   if(spr_data($klient_view[$i]['data_umowy'])==0 ){ waznosc_konta($klient_view[$i]['id']); echo '<font color="red">';    
   echo $klient_view[$i]['data_umowy']; echo '</font>'; } else {  echo $klient_view[$i]['data_umowy']; }   
   } else { 
       waznosc_konta($klient_view[$i]['id']);
       echo '<strong style="color:red;">brak daty</strong>';}
   
   ?></td>
   <?php if($_SESSION['user']['type'] == 1 || $_SESSION['user']['type'] == 2){  ?>
   <td> <?php echo $klient_view[$i]['data_oplaty']; ?> </td>
   <?php } ?>
   <?php if($_SESSION['user']['type'] != 1 && $_SESSION['user']['type'] != 2){ ?>
   <td><a title="historia transakcji" style="cursor: pointer;" onClick="location.href='?page=kli&ids=<?php echo $klient_view[$i]['id']; ?>'"><img id="tranzakcje_button" style="width: 25px;" src="img/z.png" class="glyphicon spady"></span></a></td>
   <td><a style="cursor: pointer;" onClick="location.href='?page=kli&idf=<?php echo  $klient_view[$i]['id']; ?>'" title="wystaw fakturę"><span class="glyphicon glyphicon-file"></span></a></td>
   <td><a title="przypisz użytkownika" style="cursor: pointer;"  onClick="location.href='?page=kli&add_klient=1&ido=<?php echo $klient_view[$i]['id']; ?>'"><span id="tranzakcje_button" class="glyphicon glyphicon-user spady"></span></a></td>
   <td><a title="oferty i referencje" style="cursor: pointer;" data-toggle="modal" data-target="#zap_view"><span id="oferty_button" class="glyphicon glyphicon-book spady"></span></a></td>
   <?php } ?>
    </tr>
   
<?php
    $saldo_bierzace += $klient_view[$i]['pojemnosc'];
    $saldo_limit += $klient_view[$i]['limit'];
    $saldo_debet += $klient_view[$i]['debet'];
    $kwota_do_wydania += $klient_view[$i]['wydanie'];
   $kwota_do_przyjecia += $klient_view[$i]['przyjecie'];
  $prowizja_user += $klient_view[$i]['prowizja_b'] ;
  $tranzakcje_w += $klient_view[$i]['tranzakcje_w'];
  $tranzakcje_p += $klient_view[$i]['tranzakcje_p'];
  $trans_p += $klient_view[$i]['trans_p'];
 $dowydania += $klient_view[$i]['dowydania'];
  
} }} else { 
 ?>
<td colspan="18" class="spady" style="height: 150px;" rowspan="3">
    <strong> BRAK WYNIKÓW </strong>   
    
</td>       
    
<?php } ?>
<tfoot>
    <tr>
        <td colspan="4" style="text-align:right;"> suma</td>    
        <td class="zolty"><strong><?php echo number_format($saldo_bierzace,2); ?></strong></td>
        <td class="zolty"><strong><?php echo number_format($saldo_limit,2); ?></strong></td>
        <td class="zolty"><strong><?php echo number_format($saldo_debet,2); ?></strong></td>
        <td class="zolty"><strong><?php echo number_format($dowydania,2); ?></strong></td>
        <td class="zolty"><strong><?php echo number_format($kwota_do_przyjecia,2); ?></strong></td>
        <td class="zolty" colspan="2"><strong><?php echo number_format($prowizja_user,2); ?></strong></td>
          <td class="zolty"><strong><?php echo number_format($kwota_do_wydania,2); ?></strong></td>
            <td class="zolty"><strong>(<?php echo $tranzakcje_w  ; ?>)</strong></td>
            <td class="zolty"><strong><?php echo number_format($trans_p,2);?></strong></td>
                 <td class="zolty"><strong>(<?php echo $tranzakcje_p ; ?>)</strong></td>   
                  <td colspan="6"> &nbsp;</td>    
    </tr>    
    
    
        <tr>
        <td colspan="4" style="text-align:right;"> suma plusy</td>    
        <td class="zolty"><strong><?php echo number_format($pojemnosc_plusy,2); ?></strong></td>
        <td  colspan="2"></td>
        <td class="zolty"><strong><?php  echo number_format($kwota_do_wydania_plus,2); ?></strong></td>
        <td class="zolty"><strong><?php echo number_format($kwota_do_przyjecia - $kwota_do_przyjecia_minus ,2); ?></strong></td>
        
                  <td colspan="12"> &nbsp;</td>    
    </tr>    
    
    
        <tr>
        <td colspan="4" style="text-align:right;"> suma minusy</td>    
        <td class="zolty"><strong>- <?php echo number_format($pojemnosc_minus,2); ?></strong></td>
        <td  colspan="2"></td>
        <td class="zolty"><strong>- <?php  echo number_format($kwota_do_wydania_minus,2); ?></strong></td>
        <td class="zolty"><strong>- <?php echo number_format($kwota_do_przyjecia_minus,2); ?></strong></td>
      
                  <td colspan="12"> &nbsp;</td>    
    </tr>    
    
</tfoot>
    
</tbody>
</table>
 

<?php include('content/klient_footer.php');

if(!empty($_GET['idf'])){
include_once('content/faktury.php');
}
?>





<?php if (!empty($_REQUEST['id'])&& isset($_REQUEST['id']) && !isset($_REQUEST['add']) && empty($_REQUEST['add']) && $_REQUEST['add'] != '3') { ?>
<div style="position: absolute; top:5%; width: 98%; left: 1%; z-index: 1000;">
<?php
$branza = sql_q('branze');
$n_branze = count($branza);
$poziom_rozliczen = sql_q('poziom_rozliczen');
$n_poziom = count($poziom_rozliczen);    

include('./content/add_form.php');

?>
</div>
<?php }