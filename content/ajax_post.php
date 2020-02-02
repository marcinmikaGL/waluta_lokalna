<?php 


  if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '1' ){
         $dodaj_kontakt = array(
    'type'=> $_POST['user'] ,         
    'login'=> $_POST['login'] ,  
    'haslo'=> $_POST['haslo'],
    'imie'=> $_POST['imie'] ,  
    'nazwisko'=> $_POST['nazwisko'],        
    'telefon'=> $_POST['telefon'],
    'email'=> $_POST['email'],        
    'adres'=> $_POST['adres'],
    'kod'=> $_POST['kod'],
    'miasto'=> $_POST['miasto'],
    'uwagi'=> $_POST['uwagi']         
                 
            ); 

             dodaj_kontakt($dodaj_kontakt);
  }
    if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '2' ){
        
          
   $n = count($_POST['typ_konta']);
           
           
           for($i=0;$i<$n;$i++){
            if($_POST['typ_konta'][$i] == 1) { $wspol = 1 ; }
            if($_POST['typ_konta'][$i] == 2) { $zpp = 1 ; }
            if($_POST['typ_konta'][$i] == 3) { $zapot = 1 ; }
            if($_POST['typ_konta'][$i] == 4) { $przelew = 1 ; }
            if($_POST['typ_konta'][$i] == 5) { $historia = 1 ; }
            if($_POST['typ_konta'][$i] == 6) { $oferty = 1 ; }  
               
           }
               
      
        
        
        $dodaj_kontakt = array(
        'aktywny'=>  $_POST['akt'],
        'nazwa'=> $_POST['naz'] , 
        'nip'=>  $_POST['nip'] ,
        'limit'=>  $_POST['pojemnosc'] ,
        'przyjecie'=>  $_POST['pojemnosc'] ,
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
        'typ'=> $_POST['typ_konta_drop'] ,
        'nr_umowy'=> $_POST['nr_umowy'] ,
        'nr_karty'=> $_POST['nr_karty'] ,
        'data_oplaty'=> $_POST['data_oplaty'] ,
        'data_umowy'=> $_POST['data_oplaty'] ,  
        'procet_zwrotu'=> $_POST['procet_zwrotu'] ,    
        'adres1'=> $_POST['adres1'] ,
        'miasto1'=> $_POST['miasto1'],
        'kod1'=>$_POST['kod1'] ,
       'adres2'=> $_POST['adres2'], 
       'miasto2'=> $_POST['miasto2'], 
      'kod2'=>  $_POST['kod2'],
       'zpp'=> $zpp ,
       'wspoldzielca'=> $wspol,
       'oferty'=>  $oferty , 
       'przelwy'=> $przelew ,
       'historie_tranzakcji'=> $historia,
       'uwagi'=> $_POST['uwagi']
 );
        
  
        $n = count($_POST['uzytkownik']);
           
           
           for($i=0;$i<$n;$i++){
     
               
               
//               
           }

        
        
   

 dodaj_klienta($dodaj_kontakt);
     
 echo '<br>' ; 
      
      
      
  

        
    }
  
  
?>