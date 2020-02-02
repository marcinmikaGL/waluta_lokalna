<?php
//error_reporting(0);
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
if(is_array($sort)){
$sort = array_filter(array_map('trim', $sort));
}
global $sql_error;

if($typ == 'users') { $query = DB::query("SELECT * FROM users ORDER BY id DESC"); }
 

    
if(empty($_SESSION['klient_id'])){ 
$klient_id = $_SESSION['user']['id'] ;
if(!empty($_SESSION['user']['id'])){
$query1a = DB::queryFirstRow("SELECT klient_id FROM users_group WHERE user_id=".$klient_id);
}
} else {
$klient_id = $_SESSION['klient_id']; 
$query1a = DB::queryFirstRow("SELECT klient_id FROM users_group WHERE id=".$klient_id);
}


// sortowanie tranzakcji 

$id = $query1a['klient_id']; 


if($sort['sort'] == 1){

$where = new WhereClause('OR'); 
if(!empty($sort['nazwa_sort'])) { $where->add('nazwa_a LIKE %s', '%'.$sort['nazwa_sort'].'%'); }
if(!empty($sort['nazwa_sort'])) { $where->add('nazwa_b LIKE %s', '%'.$sort['nazwa_sort'].'%'); }
if(!empty($sort['nr_konta'])) { $where->add('nip_a=%i',$sort['nr_konta']); } 
if(!empty($sort['nr_konta'])) { $where->add('nip_b=%i',$sort['nr_konta']); } 
if(!empty($sort['nr_konta'])) { $where->add('konto_a=%i',$sort['nr_konta']); } 
if(!empty($sort['nr_konta'])) { $where->add('konto_b=%i',$sort['nr_konta']); } 
if(!empty($sort['nr_karty'])) { $where->add('karta_a=%i',$sort['nr_karty']); }
if(!empty($sort['nr_karty'])) { $where->add('karta_b=%i',$sort['nr_karty']); }


if(!empty($sort['kwota_od']) && empty($sort['kwota_do'])) { $where->add('kwota >= %i',$sort['kwota_od']); }
if(!empty($sort['kwota_do']) && empty($sort['kwota_od'])) { $where->add('kwota <= %i',$sort['kwota_do']); }





if(!empty($sort['data_od']) && empty($sort['data_do'])) { $where->add('data >= %t',$data_od); }
if(!empty($sort['data_do']) && empty($sort['data_od'])) { $where->add('data <= %t',$data_do); }



if(!empty($sort['data_od']) && !empty($sort['data_do'])) { 

    
$data_od = data_pyt($sort['data_od']);
$data_do = data_pyt($sort['data_do']);
    
$daty = "AND data BETWEEN '".$data_od." 00:00:00' AND '".$data_do." 23:59:59'"; 

}

if(!empty($sort['kwota_od']) && !empty($sort['kwota_do'])) { 

$kwota = "AND kwota BETWEEN ".$sort['kwota_od']." AND ".$sort['kwota_do'] ;


}

$order = ' id DESC'; 
if(!empty($sort['sort_id']) && $sort['sort_id'] == 2 ) { $order = ' id'; }
if(!empty($sort['tytul']) && $sort['tytul'] == 1 ) { $order = 'tytul DESC'; }
if(!empty($sort['tytul']) && $sort['tytul'] == 2 ) { $order = 'tytul'; }

if(!empty($sort['a_nazwa']) && $sort['a_nazwa'] == 1 ) { $order = ' nazwa_a DESC'; }
if(!empty($sort['a_nazwa']) && $sort['a_nazwa'] == 2 ) { $order = ' nazwa_a'; }

if(!empty($sort['a_konto']) && $sort['a_konto'] == 1 ) { $order = ' konto_a DESC'; }
if(!empty($sort['a_konto']) && $sort['a_konto'] == 2 ) { $order = ' konto_a'; }

if(!empty($sort['a_nip']) && $sort['a_nip'] == 1 ) { $order = ' nip_a DESC'; }
if(!empty($sort['a_nip']) && $sort['a_nip'] == 2 ) { $order = ' nip_a'; }

if(!empty($sort['kwota']) && $sort['kwota'] == 1 ) { $order = ' kwota DESC'; }
if(!empty($sort['kwota']) && $sort['kwota'] == 2 ) { $order = ' kwota '; }

if(!empty($sort['kwota2']) && $sort['kwota2'] == 1 ) { $order = ' kwota DESC'; }
if(!empty($sort['kwota2']) && $sort['kwota2'] == 2 ) { $order = ' kwota '; }

if(!empty($sort['user_s']) && $sort['user_s'] == 1 ) { $order = ' user_id DESC'; }
if(!empty($sort['user_s']) && $sort['user_s'] == 2 ) { $order = ' user_id '; }


if(!empty($sort['b_nazwa']) && $sort['b_nazwa'] == 1 ) { $order = ' nazwa_b DESC'; }
if(!empty($sort['b_nazwa']) && $sort['b_nazwa'] == 2 ) { $order = ' nazwa_b'; }

if(!empty($sort['b_konto']) && $sort['b_konto'] == 1 ) { $order = ' konto_b DESC'; }
if(!empty($sort['b_konto']) && $sort['b_konto'] == 2 ) { $order = ' konto_b'; }

if(!empty($sort['b_nip']) && $sort['b_nip'] == 1 ) { $order = ' nip_b DESC'; }
if(!empty($sort['b_nip']) && $sort['b_nip'] == 2 ) { $order = ' nip_b'; }

if(!empty($sort['b_nip']) && $sort['b_nip'] == 1 ) { $order = ' nip_b DESC'; }
if(!empty($sort['b_nip']) && $sort['b_nip'] == 2 ) { $order = ' nip_b'; }

if(!empty($sort['saldo']) && $sort['saldo'] == 1 ) { $order = ' saldo_do_a DESC , saldo_do_b '; }
if(!empty($sort['saldo']) && $sort['saldo'] == 2 ) { $order = ' saldo_do_a , saldo_do_b DESC'; }

if(!empty($sort['data']) && $sort['data'] == 1 ) { $order = ' data DESC'; }
if(!empty($sort['data']) && $sort['data'] == 2 ) { $order = ' data'; }

if(!empty($sort['referencje']) && $sort['referencje'] == 1 ) { $order = ' ocena DESC'; }
if(!empty($sort['referencje']) && $sort['referencje'] == 2 ) { $order = ' ocena'; }


if(!empty($sort['prowizja_a']) && $sort['prowizja_a'] == 1 ) { $order = ' prowizja_a DESC'; }
if(!empty($sort['prowizja_a']) && $sort['prowizja_a'] == 2 ) { $order = ' prowizja_a'; }

if(!empty($sort['prowizja_b']) && $sort['prowizja_b'] == 1 ) { $order = ' prowizja_b DESC'; }
if(!empty($sort['prowizja_b']) && $sort['prowizja_b'] == 2 ) { $order = ' prowizja_b'; }




if($typ == 'tranzakcje') { $query = DB::query("SELECT * FROM tranzakcje WHERE %ls  ".$kwota." ".$daty." ORDER BY ".$order,$where); }

if($typ == 'tranzakcje2') {
$query = DB::query("SELECT * FROM tranzakcje WHERE (klient_a=".$id." OR klient_b=".$id.") AND  %ls  ".$kwota."  ".$daty." ORDER BY ".$order,$where);
}


} else {

if($typ == 'tranzakcje2') {    $query = DB::query("SELECT * FROM tranzakcje WHERE klient_a=".$id." OR klient_b=".$id." ORDER BY id DESC"); } 
if($typ == 'tranzakcje') {    $query = DB::query("SELECT * FROM tranzakcje ORDER BY id DESC"); }   
}

if($typ == 'tranzakcje3') { $query = DB::query("SELECT * FROM tranzakcje"); }


if($typ == 'glowna'){   

if(empty($_SESSION['klient_id'])){ 
$klient_id = $_SESSION['user']['id'] ;
$query = DB::queryFirstRow("SELECT klient_id FROM users_group WHERE user_id=".$klient_id);

} else {
$klient_id = $_SESSION['klient_id']; 
$query = DB::queryFirstRow("SELECT klient_id FROM users_group WHERE id=".$klient_id);
}





}
if($typ == 'user') { $query = DB::queryFirstRow("SELECT * FROM users WHERE login= %s", $login); } 
if($typ == 'users_group') { $query = DB::query("SELECT * FROM users_group WHERE user_id= %s",$_SESSION['user']['id']); }
if($typ == 'typ_biznesu') { $query = DB::query("SELECT * FROM typ_biznesu"); }
if($typ == 'branze') { $query = DB::query("SELECT * FROM branze"); }
if($typ == 'users_logs') { $query = DB::query("SELECT * FROM users_logs ORDER BY id DESC"); }
if($typ == 'poziom_rozliczen') { $query = DB::query("SELECT * FROM poziom_rozliczen"); }



if($typ == 'klienci') { 

if($sort !=0){


if(!empty($sort['ile_wyn'])) { $limit = ' LIMIT 0 , '.$sort['ile_wyn']; } 
else { $limit ='';}

if($sort['sort'] == 1){
print_r($sort);
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

if(!empty($sort['uzytkownik'])){
$user = DB::query('SELECT klient_id FROM users_group WHERE user_id = %i',$sort['uzytkownik']);
$n = count($user);
for($i=0;$i<$n;$i++){$where->add('id=%i',$user[$i]['klient_id']); }   
    
}

if(!empty($sort['broker'])){
$user = DB::query('SELECT klient_id FROM users_group WHERE user_id = %i',$sort['broker']);
$n = count($user);
for($i=0;$i<$n;$i++){$where->add('id=%i',$user[$i]['klient_id']); }      
}


if(!empty($sort['branza']) && $ok =1){
    $branza = DB::query('SELECT klient_id FROM branza_group WHERE branza_id = %i',$sort['branza']);
$n = count($branza);
for($i=0;$i<$n;$i++){$where->add('id=%i',$branza[$i]['klient_id']); }      
}





if(!empty($sort['data_od'])&& empty($sort['data_do'])){
$tranzakcje_od_a = DB::query('SELECT klient_a FROM tranzakcje WHERE data >= %t GROUP BY klient_a ',$sort['data_od']);
$n = count($tranzakcje_od_a);
for($i=0;$i<$n;$i++){ $where->add('id=%i',$tranzakcje_od_a[$i]['klient_a']); }   

}

if(!empty($sort['data_do']) && empty($sort['data_od']) ){
$tranzakcje_do_a = DB::query('SELECT klient_a FROM tranzakcje WHERE data <= %t GROUP BY klient_a ',$sort['data_do']);
$n = count($tranzakcje_do_a);
for($i=0;$i<$n;$i++){ $where->add('id=%i',$tranzakcje_od_a[$i]['klient_a']); }   
}

if(!empty($sort['data_do']) && !empty($sort['data_od']) ){

$data_od = data_pyt($sort['data_od']);
$data_do = data_pyt($sort['data_do']);
    

$tranzakcje_do_od_a = DB::query("SELECT klient_a FROM tranzakcje WHERE data BETWEEN '".$data_od." 00:00:00' AND '".$data_do." 23:59:59'");
$n = count($tranzakcje_do_od_a);
for($i=0;$i<$n;$i++){ $where->add('id=%i',$tranzakcje_do_od_a[$i]['klient_a']); }   
}




if(!empty($sort['typ_umowy'])) { $where->add('typ_umowy=%i',$sort['typ_umowy']-1); }







} else {

$where = 'id  > 0';

    
}

$order = 'id DESC';
    
if($sort['nr_konta'] == 1){ $order = 'nr_umowy DESC'; } 
if($sort['nr_konta'] == 2){ $order = 'nr_umowy ';  }

if($sort['sort_nazwa_top'] == 1){ $order = 'nazwa DESC'; } 
if($sort['sort_nazwa_top'] == 2){ $order = 'nazwa '; }

if($sort['saldo_b'] == 1){ $order = 'pojemnosc DESC'; } 
if($sort['saldo_b'] == 2){ $order = 'pojemnosc '; }

if($sort['saldo_l'] == 1){ $order = 'klienci.limit DESC'; } 
if($sort['saldo_l'] == 2){ $order = 'klienci.limit '; }

if($sort['saldo_d'] == 1){ $order = 'debet DESC'; } 
if($sort['saldo_d'] == 2){ $order = 'debet'; }

if($sort['kwota_do_w'] == 1){ $order = 'dowydania DESC'; } 
if($sort['kwota_do_w'] == 2){ $order = 'dowydania '; }

if($sort['kwota_do_p'] == 1){ $order = 'klienci.przyjecie DESC'; } 
if($sort['kwota_do_p'] == 2){ $order = 'klienci.przyjecie '; }

if($sort['sort_prowizja'] == 1){ $order = 'klienci.prowizja_b DESC'; } 
if($sort['sort_prowizja'] == 2){ $order = 'klienci.prowizja_b '; }

if($sort['tranzakcje_w'] == 1){ $order= 'klienci.wydanie DESC'; } 
if($sort['tranzakcje_w'] == 2){ $order= 'klienci.wydanie'; }

if($sort['tranzakcje_w_sum'] == 1){ $order = 'klienci.tranzakcje_w DESC'; } 
if($sort['tranzakcje_w_sum'] == 2){ $order = 'klienci.tranzakcje_w '; }

if($sort['tranzakcje_p'] == 1){ $order = 'klienci.trans_p DESC'; } 
if($sort['tranzakcje_p'] == 2){ $order = 'klienci.trans_p '; }

if($sort['tranzakcje_p_sum'] == 1){ $order ='klienci.tranzakcje_p DESC'; } 
if($sort['tranzakcje_p_sum'] == 2){ $order ='klienci.tranzakcje_p '; }


if($sort['waznosc_d'] == 1){ $spec = 1;  } 
if($sort['waznosc_d'] == 2){ $spec = 2;  }

if($sort['waznosc_k'] == 1){  $spec2 = 1; } 
if($sort['waznosc_k'] == 2){  $spec2 = 2; }


DB::debugMode();  
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

try {
    
 if($spec == 1){ $query = DB::query('SELECT * FROM klienci  ORDER BY STR_TO_DATE(waznosc_debetu,"%d,%m,%Y") DESC'.$limit); }  
 if($spec == 2){ $query = DB::query('SELECT * FROM klienci  ORDER BY STR_TO_DATE(waznosc_debetu,"%d,%m,%Y") '.$limit); }
  if($spec2 == 1){ $query = DB::query('SELECT * FROM klienci  ORDER BY STR_TO_DATE(data_umowy,"%d,%m,%Y") DESC'.$limit); }  
 if($spec2 == 2){ $query = DB::query('SELECT * FROM klienci  ORDER BY STR_TO_DATE(data_umowy,"%d,%m,%Y") '.$limit); }
 
if($spec != 2 && $spec != 1 && $spec2 !=2 && $spec2 !=1){
   
$query = DB::query("SELECT *  FROM klienci WHERE %ls ORDER BY ".$order." ".$limit,$where);    
}



} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}


DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
DB::debugMode(false);    

    

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
$query = DB::queryFirstRow("SELECT CURRENT_TIMESTAMP()");
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


if($typ == 'limit') { 
DB::insert('users_logs', array(
  'zdarzenie' => 'zwiększono limit',
  'zdarzenie_id' => 12,
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


function data_pyt ($twojString) {
$rok = substr($twojString,6,strlen($twojString));
$dzien = substr($twojString,0,2);
$miesiac = substr($twojString,3,2);

return $rok.'-'.$miesiac.'-'.$dzien ;

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

function branza($id){
$query = DB::queryFirstRow("SELECT * FROM branze WHERE id = ".$id);    
    
return $query ;    
}


function waznosc_brokera($id){

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
 }
} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    



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

$kom = komunikat(3);  $message = $kom['opis'];

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

$kom = komunikat(3);  $message = $kom['opis'];


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




function waznosc_oferty($id){

DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;



// aktywacja konta 
try {
$query = DB::queryFirstRow("SELECT * FROM oferty WHERE id = ".$id);
 if($query['aktywny'] == 1) {    

DB::insertUpdate('oferty', array(
  'id' => $id //primary key
  
), array(
  aktywny => 0      
));   


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

function branze_select_klient ($id){

 $query = DB::query("SELECT * FROM branza_group WHERE klient_id = ".$id."  ORDER BY id DESC");

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
//echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">'; 
$error  = 1;
}   



global $error  ;

function haslo($haslo){
 
    
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;




try {
if(empty($error) && $error  !=1){   
    DB::insertUpdate('users', array(
  'id' => $_SESSION['user']['id'] //primary key
  
), array(
  'haslo' => $haslo      
));
    
    sql_q('zmiana_haslo'); 
}
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
$przyjecie = $query['przyjecie'];

$kwota_d = $limit + $kwota ;

$kwota_k = $kwota + $przyjecie ;

if($kwota_d > 50000){ $kwota_d = $limit ; } 
if($kwota_d > 50000){ $kwota_k = $przyjecie ; } 

sql_q('limit');
if(empty($error) && $error  !=1){
    DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
  limit => $kwota_d,
  przyjecie => $kwota_k
));
}   

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
   if(empty($error) && $error  !=1){
    DB::insertUpdate('branza_group', array(
  'klient_id' => $id //primary key
  
), array(
  'branza_id' => $branza,
  'user_id'=> $_SESSION['user']['id']      
));
    
    sql_q('zatualizowano_rozliczenie'); 
   }
} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}
    
function oferta ($id){

 global $sort ;
 if(is_array($sort)){
 $sort = array_filter(array_map('trim', $sort));
 }
    $data_od = data_pyt($sort['data_od']);
$data_do = data_pyt($sort['data_do']);


    $where = new WhereClause('OR'); 
 if($sort['sort'] !=1){   $where->add('id > 0'); }
if(!empty($sort['nazwa'])) { $where->add('nazwa_klienta LIKE %s', '%'.$sort['nazwa'].'%'); }
if(!empty($sort['tytul'])) { $where->add('tytul LIKE %s', '%'.$sort['tytul'].'%'); }
if(!empty($sort['uzytkownik'])) { $where->add('urzytkownik_id=%i',$sort['uzytkownik']); } 

echo $poziom = str_replace('%','',$sort['poziom']);

if(!empty($sort['poziom'])) { $where->add('rozliczenia=%i',$poziom); } 
if(!empty($sort['branza'])) { $where->add('branza_group_id=%i',$sort['branza']); }

if($sort['typ_daty'] == 1){
if(!empty($sort['data_od']) && empty($sort['data_do'])) { $where->add('data<= %t',$data_od); } 
if(!empty($sort['data_do']) && empty($sort['data_od'])) { $where->add('data>= %t',$data_do); }
if(!empty($sort['data_do']) && !empty($sort['data_od'])) { $daty = "AND data BETWEEN '".$data_od." 00:00:00' AND '".$data_do." 23:59:59'"; }
}


if($sort['typ_daty'] == 2){
if(!empty($sort['data_od']) && empty($sort['data_do'])) { $where->add('data_edycji<= %t',$data_od); } 
if(!empty($sort['data_do']) && empty($sort['data_od'])) { $where->add('data_edycji>= %t',$data_do); }
if(!empty($sort['data_do']) && !empty($sort['data_od'])) { $daty = "AND data_edycji BETWEEN '".$data_od." 00:00:00' AND '".$data_do." 23:59:59'"; }
}


if($sort['typ_daty'] == 3){
if(!empty($sort['data_od']) && empty($sort['data_do'])) { $where->add('waznosc_oferty<= %t',$data_od); } 
if(!empty($sort['data_do']) && empty($sort['data_od'])) { $where->add('waznosc_oferty>= %t',$data_do); }
if(!empty($sort['data_do']) && !empty($sort['data_od'])) { $daty = "AND waznosc_oferty BETWEEN '".$data_od." 00:00:00' AND '".$data_do." 23:59:59'"; }
}




$order  = 'id DESC';
if($sort['zdjecie'] == 1){ $order = 'zdjecie_url DESC'; }
if($sort['zdjecie'] == 2){ $order = 'zdjecie_url '; }

if($sort['nazwa_konta'] == 1){ $order = 'nazwa_klienta DESC'; }
if($sort['nazwa_konta'] == 2){ $order = 'nazwa_klienta '; }


if($sort['nazwa_user'] == 1){ $order = 'urzytkownik_id DESC'; }
if($sort['nazwa_user'] == 2){ $order = 'urzytkownik_id '; }


if($sort['nazwa_user'] == 1){ $order = 'urzytkownik_id DESC'; }
if($sort['nazwa_user'] == 2){ $order = 'urzytkownik_id '; }


if($sort['poziom_a'] == 1){ $order = 'rozliczenia DESC'; }
if($sort['poziom_a'] == 2){ $order = 'rozliczenia '; }

if($sort['opisy'] == 1){ $order = 'opis DESC'; }
if($sort['opisy'] == 2){ $order = 'opis '; }

if($sort['branza_a'] == 1){ $order = 'branza_nazwa DESC'; }
if($sort['branza_a'] == 2){ $order = 'branza_nazwa '; }

if($sort['data_dodania'] == 1){ $order = 'data DESC'; }
if($sort['data_dodania'] == 2){ $order = 'data '; }

if($sort['data_edycji'] == 1){ $order = 'data_edycji DESC'; }
if($sort['data_edycji'] == 2){ $order = 'data_edycji '; }

if($sort['data_end'] == 1){ $order = 'waznosc_oferty DESC'; }
if($sort['data_end'] == 2){ $order = 'waznosc_oferty '; }










    
    
    if($id != 0){
$query = DB::queryFirstRow("SELECT * FROM oferty WHERE id = ".$id." ORDER BY id DESC");
} else {
$query = DB::query("SELECT * FROM oferty  WHERE (%l)  ".$daty." ORDER BY ".$order,$where);    
    
}

return $query ;    
    
}    



function zapotrzebowanie ($id){
 
    if($id != 0){
$query = DB::queryFirstRow("SELECT * FROM oferty WHERE id = ".$id." AND typ=2 ORDER BY id DESC");
} else {
$query = DB::query("SELECT * FROM oferty WHERE typ=2 ORDER BY id DESC");    
    
}

return $query ;    
    
} 


function komunikat($typ){
$query = DB::queryFirstRow("SELECT * FROM komunikaty WHERE typ = ".$typ);    
 
return $query ;
}


function komunikat_udate ($typ,$opis){
      DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
 try {
     if(!empty($typ)){
    DB::insertUpdate('komunikaty', array(
  'id' => $typ, //primary key
  'typ' => $typ          
  
),array('opis'=>$opis)); 
    
    
     }
    
    
    
} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    
}



function update_oferte($id,$tab){
     DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
 try {
    DB::insertUpdate('oferty', array(
  'id' => $id //primary key
  
),$tab); 
    
    

    
    
    
} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

 
    
}   


function dodaj_oferte($tab){
   
    
 DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;


 
try {

     if(empty($error)){
DB::insert('oferty', $tab); 


     }
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
  if(empty($error) && $error  !=1){  
DB::insert('users', $dodaj_kontakt);  
  }
} catch(MeekroDBException $e) {
   
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error); 
}

}


function dodaj_klienta($dodaj_kontakt){
   
    
 DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;


 
try {

   if(empty($error) && $error  !=1){    
DB::insert('klienci', $dodaj_kontakt); 
   }
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
   
    $user_all = klienci($user_id);
    $klient_all = klienci($klient_id);
   DB::insert('tranzakcje', array(
  'klient_a' => $user_id,
  'karta_a' => $user_all['nr_karty'],
  'nazwa_a' => $user_all['nazwa'],
  'nip_a' => $user_all['nip'],
  'konto_a' => $user_all['nr_umowy'],     
  'klient_b' => $klient_id,
  'karta_b' => $klient_all['nr_karty'],    
  'nazwa_b' => $klient_all['nazwa'],
  'nip_b' => $klient_all['nip'],
  'konto_b' => $klient_all['nr_umowy'],     
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

if(!empty($nazwa)){
DB::insert('users_group', array(
  'user_id' => $user_id,
  'nip' => $nip,
  'nazwa'=>$nazwa ,
  'klient_id' => $klient_id['id']+1,
  ));
}
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

function rozdiel ($array){
    
    
    foreach ($array as $broker)
{
    $brokerList .= $prefix . '"' . $broker . '"';
    $prefix = ', ';
}

return $brokerList ;
}

function broker_test ($id) {
    
   $klients_group_id = klients_group_id($id);
           
     $n = count($klients_group_id);
     
       for($i=0;$i<$n;$i++){if($klients_group_id[$i]['typ']==2){ $broker = 1; break; }  
          
       }
       
 return $broker ;
}



function spr_klient_group($id,$user_id){

$query = DB::queryFirstRow("SELECT user_id FROM users_group WHERE klient_id=".$id." AND user_id =".$user_id  ); 

return $query['user_id'];    
    
}

function klient_group2($user_id,$nip,$nazwa,$id,$typ){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

    
try {     
    
$klient_id = DB::queryFirstRow("SELECT id FROM klienci ORDER BY id DESC");
$klient_id_spr = DB::queryFirstRow("SELECT user_id FROM users_group WHERE klient_id= ".$id);


if(!empty($nazwa) && $klient_id_spr['user_id'] != $user_id) {
DB::insert('users_group', array(
  'user_id' => $user_id,
  'nip' => $nip,
  'nazwa'=>$nazwa ,
  'typ'=> $typ ,  
  'klient_id' => $id,
  ));
}
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


function poziom_group_id($id,$poziom){
 
 if(!empty($poziom) && !empty($id)){   
$id = DB::queryFirstRow("SELECT poziom_id FROM poziom_group WHERE klient_id=".$id." AND poziom_id=".$poziom);        
 
return $id['poziom_id'] ;
}}

function poziom_group_delete($id){
    
    
}


function poziom_group_klient($id){
$id = DB::query("SELECT poziom_id FROM poziom_group WHERE klient_id=".$id);        
    
return $id ;    
}


function poziom_group_klient_row($id){
$id = DB::queryFirstRow("SELECT * FROM poziom_group WHERE klient_id=".$id);        
    
return $id ;    
}




function poziom_group($nazwa ,$nip,$id){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;


try {    
  if($nip != 0){ $klient_id =  klienci_ids($nip); 
  $klient_id = $klient_id['id'];
  
  } else { $klient_id = $id ;}  
  

DB::insert('poziom_group', array(
  'user_id' => $_SESSION['user']['id'],
  'poziom_id'=>$nazwa ,
  'klient_id' => $klient_id
  ));

DB::delete('poziom_group', "poziom_id=0"); 

  } catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}




function poziom_group_update($poziom_id,$klient_id){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;


try {  

     DB::insertUpdate('poziom_group', array(
'klient_id'=> $klient_id   
    
), array(
  'user_id' => $_SESSION['user']['id'],
  'poziom_id'=>$poziom_id 
  ));



DB::delete('poziom_group', "poziom_id=0"); 
}

 catch(MeekroDBException $e) {
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