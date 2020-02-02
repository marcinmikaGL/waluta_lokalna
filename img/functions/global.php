<?php
error_reporting(0);
if(!isset($_SESSION)){
session_start();
}


DB::$user = my_user;
DB::$password = my_password;
DB::$dbName = my_db;
DB::$host = my_host; //defaults to localhost if omitted
DB::$port = my_db_port; // defaults to 3306 if omitted
DB::$encoding = my_encoding; 


function sql_q($typ) {
global $user_id;
global $login;
global $haslo;
global $sort ;
global $sql_error;

if($typ == 'users') { $query = DB::query("SELECT * FROM users"); }
if($typ == 'tranzakcje') { $query = DB::query("SELECT * FROM tranzakcje ORDER BY id DESC"); }
if($typ == 'tranzakcje3') { $query = DB::query("SELECT * FROM tranzakcje"); }
if($typ == 'tranzakcje2') { 
    
   $query2 = DB::queryFirstRow("SELECT klient_id FROM users_group WHERE user_id=".$_SESSION['user']['id']);
if(empty($user_get_id)){    
   $id= $query2['klient_id'];
} else {
    
   $id =  $user_get_id;
}

if(isset($_SESSION['user_klient_id'])){
    
$id =  $_SESSION['user_klient_id'];   
}
    $query = DB::query("SELECT * FROM tranzakcje WHERE klient_a=".$id." OR klient_b=".$id." ORDER BY id DESC"); 



}
if($typ == 'glowna'){   $query = DB::queryFirstRow("SELECT klient_id FROM users_group WHERE user_id=".$_SESSION['user']['id']);}
if($typ == 'user') { $query = DB::queryFirstRow("SELECT * FROM users WHERE login= %s", $login); } 
if($typ == 'users_group') { $query = DB::query("SELECT * FROM users_group WHERE user_id= %s",$_SESSION['user']['id']); }
if($typ == 'typ_biznesu') { $query = DB::query("SELECT * FROM typ_biznesu"); }
if($typ == 'branze') { $query = DB::query("SELECT * FROM branze"); }
if($typ == 'users_logs') { $query = DB::query("SELECT * FROM users_logs ORDER BY id DESC"); }
if($typ == 'poziom_rozliczen') { $query = DB::query("SELECT * FROM poziom_rozliczen"); }


print_r($sort);
if($typ == 'klienci') { 

if($sort !=0){


if(!empty($sort['ile_wyn'])) { $limit = ' LIMIT 0 , '.$sort['ile_wyn']; } 
else { $limit ='';}

if($sort['sort'] == 1){

$where = new WhereClause('OR'); 
if(!empty($sort['sort_nazwa'])) { $where->add('nazwa LIKE %s', '%'.$sort['sort_nazwa'].'%'); }
if(!empty($sort['nip'])) { $where->add('nip=%i',$sort['nr_konta']); } 
if(!empty($sort['nr_konta_input'])) { $where->add('nr_umowy=%i',$sort['nr_konta_input']); } 
if(!empty($sort['nr_karty'])) { $where->add('nr_karty=%i',$sort['nr_karty']); }
if(!empty($sort['email'])) { $where->add('email_firmowy=%s',$sort['email']); }
if(!empty($sort['miasto'])) { $where->add('miasto1=%s',$sort['miasto']); }
if(!empty($sort['miasto'])) { $where->add('miasto2=%s',$sort['miasto']); }
if(!empty($sort['woj'])) { $where->add('woj1=%i',$sort['woj']); }
if(!empty($sort['woj'])) { $where->add('woj2=%i',$sort['woj']); }
if(!empty($sort['typ_umowy'])) { $where->add('typ_umowy=%i',$sort['typ_umowy']-1); }





} else {

$where = 'id  > 0';

    
}

$order = 'ORDER BY id DESC';
    
if($sort['nr_konta'] == 1){ $order = 'ORDER BY nr_umowy DESC'; } 
if($sort['nr_konta'] == 2){ $order = 'ORDER BY nr_umowy ';  }

if($sort['sort_nazwa_top'] == 1){ $order = ' ORDER BY nazwa DESC'; } 
if($sort['sort_nazwa_top'] == 2){ $order = ' ORDER BY nazwa '; }

if($sort['saldo_b'] == 1){ $order = 'ORDER BY pojemnosc DESC'; } 
if($sort['saldo_b'] == 2){ $order = 'ORDER BY pojemnosc '; }

if($sort['saldo_l'] == 1){ $order = 'ORDER BY klienci.limit DESC'; } 
if($sort['saldo_l'] == 2){ $order = 'ORDER BY klienci.limit '; }

if($sort['saldo_d'] == 1){ $order = 'ORDER BY debet DESC'; } 
if($sort['saldo_d'] == 2){ $order = 'ORDER BY debet'; }

if($sort['kwota_do_w'] == 1){ $order = 'ORDER BY dowydania DESC'; } 
if($sort['kwota_do_w'] == 2){ $order = 'ORDER BY dowydania '; }

if($sort['kwota_do_p'] == 1){ $order = 'ORDER BY klienci.przyjecie DESC'; } 
if($sort['kwota_do_p'] == 2){ $order = 'ORDER BY klienci.przyjecie '; }

if($sort['sort_prowizja'] == 1){ $order = 'ORDER BY klienci.prowizja DESC'; } 
if($sort['sort_prowizja'] == 2){ $order = 'ORDER BY klienci.prowizja '; }

if($sort['tranzakcje_w'] == 1){ $order= 'ORDER BY klienci.wydanie DESC'; } 
if($sort['tranzakcje_w'] == 2){ $order= 'ORDER BY klienci.wydanie'; }

if($sort['tranzakcje_w_sum'] == 1){ $order = 'ORDER BY klienci.tranzakcje_w DESC'; } 
if($sort['tranzakcje_w_sum'] == 2){ $order = 'ORDER BY klienci.tranzakcje_w '; }

if($sort['tranzakcje_p'] == 1){ $order = 'ORDER BY klienci.trans_p DESC'; } 
if($sort['tranzakcje_p'] == 2){ $order = 'ORDER BY klienci.trans_p '; }

if($sort['tranzakcje_p_sum'] == 1){ $order ='ORDER BY klienci.tranzakcje_p DESC'; } 
if($sort['tranzakcje_p_sum'] == 2){ $order ='ORDER BY klienci.tranzakcje_p '; }


if($sort['waznosc_d'] == 1){ $order = 'ORDER BY klienci.waznosc_debetu DESC'; } 
if($sort['waznosc_d'] == 2){ $order = 'ORDER BY klienci.waznosc_debetu '; }

if($sort['waznosc_k'] == 1){ $order = 'ORDER BY klienci.data_umowy DESC'; } 
if($sort['waznosc_k'] == 2){ $order = 'ORDER BY klienci.data_umowy '; }

 

$query = DB::query("SELECT * FROM klienci WHERE %ls ".$order.' '.$limit,$where);    


} else {
 
$query = DB::query("SELECT * FROM klienci  ORDER BY id DESC");    
    
}





}





if($typ == 'cc') { $query = DB::query("SELECT * FROM klienci WHERE typ_klienta=2"); }
if($typ == 'logowanie') { 
$where = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
$where->add('login=%s', $login);
$where->add('haslo=%s',$haslo); 
$query = DB::query("SELECT * FROM users WHERE %l",$where); 
if(!empty($query)) { $query = 1 ;} 
} 




if($typ == 'wiadomosc') { 
$query = DB::query("SELECT * FROM users_news WHERE user_id=".$_SESSION['user']['id']);
}

if($typ == 'czas') { 
$query = DB::queryFirstRow("SELECT UTC_TIMESTAMP()");
}


// logi 
if($typ == 'logi_bladne_logownia') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'błędne logowanie login:'.$login.' hasło:'.$haslo,
  'zdarzenie_id' => 1,
  'ip'=> getRealIpAddr()
));
}

if($typ == 'logi_zalogowany') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'zalogowano do systemu',
  'zdarzenie_id' => 2,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'logi_wylogowany') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'Wylogowano z systemu ',
  'zdarzenie_id' => 0,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'logi_przekroczony_czas') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'przekroczono czas wylogowano',
  'zdarzenie_id' => 3,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}


if($typ == 'dodano_do_bazy') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'dodano użytkownika do bazy',
  'zdarzenie_id' => 4,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'dodano_do_bazy_klient') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'dodano klienta do bazy',
  'zdarzenie_id' => 5,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'klient_update') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'zaktualizowano klinta w bazie',
  'zdarzenie_id' => 6,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'dokonano_tranzakcji') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'dokonano tranzakcji',
  'zdarzenie_id' => 7,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}



if($typ == 'dokonano_branze') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'dokonano branze',
  'zdarzenie_id' => 8,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'dokonano_rozliczenie') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'dokonano rozliczenie',
  'zdarzenie_id' => 9,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'dokonano_typ_biznesu') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'dokonano typ biznesu',
  'zdarzenie_id' => 10,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'zatualizowano_rozliczenie') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'zakutalizowano poziom rozliczenia',
  'zdarzenie_id' => 11,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}

if($typ == 'zmiana_haslo') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'zmieniono hasło',
  'zdarzenie_id' => 12,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
}




return $query;
}



function tranzakcje_referencje ($id) {
 
$query = DB::queryFirstRow("SELECT * FROM tranzakcje WHERE id = ".$id);

return $query ;    
    
    
}


function referencje_upade ($array,$id){    
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;




try {
   
    DB::insertUpdate('tranzakcje', array(
  'id' => $id //primary key
  
),$array);
    
    sql_q('zmiana_haslo'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}
    



function tranzakcje3 ($id) {  $query = DB::query("SELECT * FROM tranzakcje WHERE klient_a = ".$id." OR klient_b = ".$id);

return $query ;


}


function spr_data ($twojString) {
$rok = substr($twojString,6,strlen($twojString));
$dzien = substr($twojString,0,2);
$miesiac = substr($twojString,3,2);

if($rok > date('Y'))     { return 1; } else {
if($rok < date('Y'))     { return 0; } else { 
if($miesiac < date('m')) { return 1; } else {
if($miesiac == date('m')){
if($dzien < date('d'))  { return 0; } else { return 1; }
} else { return 1; }


 }}}

}


function waznosc_konta($id){

DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;



// aktywacja konta 
try {
$query = DB::queryFirstRow("SELECT * FROM klienci WHERE id = ".$id);
 if($query['aktywny'] == 1) {    

DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
  aktywny => 0      
));   

$message = 'Twoje konto w system zielony.biz.pl zostało dezaktywowane.';

if(!empty($query['email_firmowy'])){
mail($query['email_firmowy'], 'Deaktywacja konta  dezaktywowane ', $message);
}


 } 
} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}


function waznosc_debetu($id){

DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;



// aktywacja konta 
try {
$query = DB::queryFirstRow("SELECT * FROM klienci WHERE id = ".$id);
 if($query['debet_akt'] == 1) {    

DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
  debet_akt => 0      
));   

$message = 'Twoje konto w system zielony.biz.pl zostało dezaktywowane.';

if(!empty($query['email_firmowy'])){
mail($query['email_firmowy'], 'Deaktywacja konta  dezaktywowane ', $message);
}


 } 
} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}












function users_logs($id) 
{ $query = DB::query("SELECT * FROM users_logs WHERE user_id = ".$id." ORDER BY id DESC");

return $query ;

}


function klient_branze_select ($id,$branza){

 $query = DB::query("SELECT * FROM branza_group WHERE klient_id = ".$id." AND branza_id = ".$branza."  ORDER BY id DESC");

return $query ;
   
    
}

function branze_select ($id){

 $query = DB::query("SELECT * FROM branza_group WHERE branza_id = ".$id."  ORDER BY id DESC");

return $query ;
   
    
}



function klients_group_id($id){
 
$query = DB::query("SELECT * FROM users_group WHERE klient_id = ".$id." ORDER BY id DESC");

return $query ;    
    
}


function klients_group_id_user($id){
 
$query = DB::query("SELECT * FROM users_group WHERE user_id = ".$id." ORDER BY id DESC");

return $query ;    
    
}




function sql_error($sql_error){
    
 DB::insert('users_logs', array(
  'zdarzenie' => 'błąd bazydanych :'.$sql_error,
  'zdarzenie_id' => 6,
  'ip'=> getRealIpAddr(),
  'user_id'=> $_SESSION['user']['id']
));
echo '<div class="alert alert-danger" role="alert">
Błąd : '.$sql_error.'    
<button type="button" class="close" data-dismiss="alert">x</button>
</div>'; 
$error = 1;
}   





function haslo($haslo){
 
    
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;




try {
   
    DB::insertUpdate('users', array(
  'id' => $_SESSION['user']['id'] //primary key
  
), array(
  'haslo' => $haslo      
));
    
    sql_q('zmiana_haslo'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}




function limit($id,$kwota){
 
    
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;


try {
  
$query = DB::queryFirstRow("SELECT * FROM klienci WHERE id= %i", $id);

$limit = $query['limit'];

$kwota_d = $limit + $kwota ;

if($kwota_d > 50000){ $kwota_d = $limit ; } 

    DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
  limit => $kwota_d      
));
    

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}





    
    
    

function update_branza_group($id,$branza){
 
    
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

 
try {
   
    DB::insertUpdate('branza_group', array(
  'klient_id' => $id //primary key
  
), array(
  'branza_id' => $branza,
  'user_id'=> $_SESSION['user']['id']      
));
    
    sql_q('zatualizowano_rozliczenie'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}
    
    






function typ_konta ($id){

if($id == 0) { $nazwa = 'admin';}
if($id == 1) { $nazwa = 'rada';}
if($id == 2) { $nazwa = 'broker';}
if($id == 3) { $nazwa = 'klient';}
    
return $nazwa ;
}

function dodaj_kontakt($dodaj_kontakt){
    
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
    
    
try {     
    
DB::insert('users', $dodaj_kontakt);  
    
} catch(MeekroDBException $e) {
   
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error); 
}

}


function dodaj_klienta($dodaj_kontakt){
   
    
 DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;


 
try {

     
DB::insert('klienci', $dodaj_kontakt); 

} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}



function klienci_id($nip) { 
if(!empty($nip)){    
$query = DB::queryFirstRow("SELECT id FROM klienci WHERE nip= ".$nip); 

return $query['id'];
} 


}

function usun_usergroup($id){
DB::delete('users_group', "id=%s",$id);    
    
}


function klienci_nr() {
$query = DB::queryFirstRow("SELECT id FROM klienci ORDER BY id DESC"); 

return $query['id'];

}



function klienci_ids($nip) { 
$query = DB::queryFirstRow("SELECT * FROM klienci WHERE nip=".$nip); 

return $query;
}

function klienci($id) { 
    if(!empty($id)){
    $query = DB::queryFirstRow("SELECT * FROM klienci WHERE id=".$id); 

return $query;
    }
}





function add_brana($nazwa){
 
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

 
try {
   
   DB::insert('branze', array(
  'nazwa' => $nazwa     
)); 
    sql_q('dodano_branze'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}    


function add_poziom($nazwa){
 
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

 
try {
   
   DB::insert('poziom_rozliczen', array(
  'poziom' => $nazwa,
  'user_id'=> $_SESSION['user']['id']      
)); 
    sql_q('dodano_rozliczenie'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}





function update_poziom($id,$nazwa){
 
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

 
try {
   
    DB::insertUpdate('poziom_rozliczen', array(
  'id' => $id //primary key
  
), array(

  'poziom' => $nazwa,
  'user_id'=> $_SESSION['user']['id']      
));
    
    sql_q('zatualizowano_rozliczenie'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}




function update_branze($id,$nazwa){
 
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

 
try {
   
    DB::insertUpdate('branze', array(
  'id' => $id //primary key
  
), array(

  'nazwa' => $nazwa     
));
    
    sql_q('zatualizowano_rozliczenie'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}





function  update_biznes($id,$nazwa){
 
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

 
try {
   
    DB::insertUpdate('typ_biznesu', array(
  'id' => $id //primary key
  
), array(

  'nazwa' => $nazwa     
));
    
    sql_q('zatualizowano_rozliczenie'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}











function search_array($array, $key, $value)
{
    $results = array();

    if (is_array($array))
    {
        if (isset($array[$key]) && $array[$key] == $value)
            $results[] = $array;

        foreach ($array as $subarray)
            $results = array_merge($results, search_array($subarray, $key, $value));
    }

    return $results;
} 





function add_typ_biznesu($nazwa){
 
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

 
try {
   
   DB::insert('typ_biznesu', array(
  'nazwa' => $nazwa,      
)); 
    sql_q('dodano_typ_biznesu'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}    













function klienci_nr_umowy($nr_umowy) {
$query = DB::queryFirstRow("SELECT * FROM klienci WHERE nr_umowy=".$nr_umowy); 

return $query;    
    
}



function przelew($kwota,$tytul,$odbi,$user_id,$klient_id,$prowizja_klient,$pozizja_user,$saldo_a,$saldo_b){
 
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
 
try {
   
   DB::insert('tranzakcje', array(
  'klient_a' => $user_id,
  'klient_b' => $klient_id,
  'tytul'=> $tytul,
  'kwota'=> $kwota ,
  'adres'=> $odbi,
  'user_id' => $_SESSION['user']['id'],
  'prowizja_a' =>  $pozizja_user ,
  'prowizja_b' => $prowizja_klient , 
  'saldo_do_a' => $saldo_b,
  'saldo_do_b' => $saldo_a      
           
)); 
    sql_q('dodano_tranzakcje'); 

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}    
    
 
    





function uznanie($klient_id,$pojemnosc_klienta,$przyjecie_klinta,$tranzakcje_p,$doprzyjecie_klienta,$dowydania_klient,$prowizja_klient){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

    
    
try {    
    
DB::insertUpdate('klienci', array(
  'id' => $klient_id //primary key
  
), array(
  'pojemnosc'=>$pojemnosc_klienta,
  'trans_p' => $przyjecie_klinta,  
  'tranzakcje_p' => $tranzakcje_p,
  'przyjecie' => $doprzyjecie_klienta,
  'dowydania'=> $dowydania_klient,
  'prowizja_b'=> $prowizja_klient    
        
        ));

} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}


function obciazenie($user_id,$pojemnosc_usera,$wydanie_usera,$tranzakcje_w,$doprzyjecie_usera,$dowydania_usera,$prowizja_user){
    
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
    
    
try {    
DB::insertUpdate('klienci', array(
  'id' => $user_id //primary key
  
), array(
  'pojemnosc'=>$pojemnosc_usera,
  'wydanie'=>   $wydanie_usera,   
  'tranzakcje_w' => $tranzakcje_w,
  'przyjecie' => $doprzyjecie_usera,
  'dowydania'=> $dowydania_usera ,
  'prowizja_b'=> $prowizja_user      
        
        ));
 

} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}





function konto_klient_update ($id,$array){

    DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

    
 try {   
    DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), $array );
    
 } catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}





function klienci_update($id,$tablica) { 
$query = DB::queryFirstRow("SELECT * FROM klienci WHERE id= %s", $id); 

return $query;
}


function klient_group($user_id,$nip,$nazwa){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

    
try {     
    
$klient_id = DB::queryFirstRow("SELECT id FROM klienci ORDER BY id DESC");    

DB::insert('users_group', array(
  'user_id' => $user_id,
  'nip' => $nip,
  'nazwa'=>$nazwa ,
  'klient_id' => $klient_id['id']+1,
  ));
} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}


function update_users($users,$id){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;




try {
   
    DB::insertUpdate('users', array('id' => $id), $users);
     

} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

       
    
}



function spr_klient_group($id,$user_id){

$query = DB::queryFirstRow("SELECT user_id FROM users_group WHERE klient_id=".$id." AND user_id =".$user_id  ); 

return $query['user_id'];    
    
}

function klient_group2($user_id,$nip,$nazwa,$id){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

    
try {     
    
$klient_id = DB::queryFirstRow("SELECT id FROM klienci ORDER BY id DESC");    

DB::insert('users_group', array(
  'user_id' => $user_id,
  'nip' => $nip,
  'nazwa'=>$nazwa ,
  'klient_id' => $id,
  ));
} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}





function branza_group($nazwa){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

    
try {    
$klient_id = DB::queryFirstRow("SELECT id FROM klienci ORDER BY id DESC");    
    
DB::insert('branza_group', array(
  'user_id' => $_SESSION['user']['id'],
  'branza_id'=>$nazwa ,
  'klient_id' => $klient_id['id']
  ));

} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}


function poziom_group($nazwa){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;


try {    
$klient_id = DB::queryFirstRow("SELECT id FROM klienci ORDER BY id DESC");          
DB::insert('poziom_group', array(
  'user_id' => $_SESSION['user']['id'],
  'poziom_id'=>$nazwa ,
  'klient_id' => $klient_id['id']
  ));
} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}





function spr_kontakt($telefon,$email,$nazwa){   
 $where = new WhereClause('or'); 
$where->add('telefon=%s', $telefon);
$where->add('email=%s',$email); 
$where->add('nazwa=%s',$nazwa); 
$query = DB::query("SELECT * FROM klienci WHERE %l",$where); 
if(!empty($query)) { $query = 1 ;}  
return $query ; 
}

function users_groups ($id){
$query = DB::query("SELECT * FROM users_group WHERE klient_id= %s", $id); 

return $query;    
    
    
}

function user ($id){
     $query = DB::queryFirstRow("SELECT * FROM users WHERE id= %s", $id); 
     return $query['login'];
}

function users($id){
     $query = DB::queryFirstRow("SELECT * FROM users WHERE id= %s", $id); 
     return $query;
}



function getRealIpAddr(){
    if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
    {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else
    {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
?>