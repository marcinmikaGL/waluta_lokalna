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
DB::$error_handler = false;
DB::$throw_exception_on_error = false;
//DB::debugMode();

function sql_q($typ) {
//DB::debugMode();
global $user_id;
global $login;
global $haslo;
global $sort ;
if(is_array($sort)){
$sort = array_filter(array_map('trim', $sort));
}
global $sql_error;

if($typ == 'users') { 
if($sort['sort'] == 1){

$where = new WhereClause('AND'); 
if(!empty($sort['login_top'])) { $where->add('login LIKE %s', '%'.$sort['login_top'].'%'); }
if(!empty($sort['email_top'])) { $where->add('email LIKE %s', '%'.$sort['email_top'].'%'); }
if(!empty($sort['miasto_top'])) { $where->add('miasto LIKE %s', '%'.$sort['miasto_top'].'%'); }
if(!empty($sort['imie_top'])) { $where->add('imie LIKE %s', '%'.$sort['imie_top'].'%'); }
if(!empty($sort['nazwisko_top'])) { $where->add('nazwisko LIKE %s', '%'.$sort['nazwisko_top'].'%'); }
if(!empty($sort['adres_top'])) { $where->add('adres LIKE %s', '%'.$sort['adres_top'].'%'); }
if(!empty($sort['telefon_top'])) { $where->add('telefon LIKE %s', '%'.$sort['telefon_top'].'%'); }
if(!empty($sort['typ_top']) && $sort['typ_top'] !=-1) { if($sort['typ_top'] == 10){ $sort['typ_top'] = 0; }  $where->add('type=%i',$sort['typ_top']); }     


$order = 'id DESC';
if(!empty($sort['typ_t']) && $sort['typ_t'] == 1 ) { $order = ' type DESC'; }
if(!empty($sort['typ_t']) && $sort['typ_t'] == 2 ) { $order = ' type'; }

if(!empty($sort['login_t']) && $sort['login_t'] == 1 ) { $order = ' login DESC'; }
if(!empty($sort['login_t']) && $sort['login_t'] == 2 ) { $order = ' login'; }

if(!empty($sort['imie_t']) && $sort['imie_t'] == 1 ) { $order = 'imie DESC'; }
if(!empty($sort['imie_t']) && $sort['imie_t'] == 2 ) { $order = 'imie'; }

if(!empty($sort['nazwisko_t']) && $sort['nazwisko_t'] == 1 ) { $order = 'nazwisko DESC'; }
if(!empty($sort['nazwisko_t']) && $sort['nazwisko_t'] == 2 ) { $order = 'nazwisko'; }


if(!empty($sort['email_t']) && $sort['email_t'] == 1 ) { $order = 'email DESC'; }
if(!empty($sort['email_t']) && $sort['email_t'] == 2 ) { $order = 'email'; }

if(!empty($sort['telefon_t']) && $sort['telefon_t'] == 1 ) { $order = 'telefon DESC'; }
if(!empty($sort['telefon_t']) && $sort['telefon_t'] == 2 ) { $order = 'telefon'; }

if(!empty($sort['adres_t']) && $sort['adres_t'] == 1 ) { $order = 'adres DESC'; }
if(!empty($sort['adres_t']) && $sort['adres_t'] == 2 ) { $order = 'adres'; }

if(!empty($sort['miasto_t']) && $sort['miasto_t'] == 1 ) { $order ='miasto DESC'; }
if(!empty($sort['miasto_t']) && $sort['miasto_t'] == 2 ) { $order = 'miasto'; }


if(!empty($sort['uwagi_t']) && $sort['uwagi_t'] == 1 ) { $order ='miasto DESC'; }
if(!empty($sort['uwagi_t']) && $sort['uwagi_t'] == 2 ) { $order = 'uwagi' ; }











 $query = DB::query("SELECT * FROM users WHERE %l ORDER BY ".$order ,$where); 
} else {
    
    
    
    
    $query = DB::query("SELECT * FROM users ORDER BY id DESC"); 


}




}
 

    
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

$where = new WhereClause('AND'); 
if(!empty($sort['nazwa_sort'])) { $where->add('nazwa_a LIKE %s OR nazwa_b LIKE %s ', '%'.$sort['nazwa_sort'].'%', '%'.$sort['nazwa_sort'].'%'); }
if(!empty($sort['nr_konta'])) { $where->add('nip_a=%i OR nip_b=%i',$sort['nr_konta'],$sort['nr_konta']); } 
if(!empty($sort['nr_konta'])) { $where->add('konto_a=%i OR konto_b=%i',$sort['nr_konta'],$sort['nr_konta']); } 

if(!empty($sort['nr_karty'])) { $where->add('karta_a=%i OR karta_b=%i',$sort['nr_karty'],$sort['nr_karty']); }



    
$data_od = data_pyt($sort['data_od']);
$data_do = data_pyt($sort['data_do']);
    


if(!empty($sort['data_od']) && empty($sort['data_do'])) { $where->add('data <= %t',$data_od); }
if(!empty($sort['data_do']) && empty($sort['data_od'])) { $where->add('data >= %t',$data_do); }



if(!empty($sort['data_od']) && !empty($sort['data_do'])) { 


$where->add('data BETWEEN %s  AND %s ',$data_od.' 00:00:00',$data_do.' 23:59:59'); 

}

if(!empty($sort['kwota_od']) && !empty($sort['kwota_do'])) { 

$where->add(' kwota BETWEEN %s AND %s',$sort['kwota_od'],$sort['kwota_do']) ;


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
if($typ == 'klienci_drop') {$query = DB::query('SELECT * FROM klienci ORDER BY id DESC'); } 
if($typ == 'uczestnicy') {$query = DB::query('SELECT * FROM klienci ORDER BY id DESC'); } 


if($typ == 'klienci') { 

if($sort !=0){


if(!empty($sort['ile_wyn'])) { $limit = ' LIMIT 0 , '.$sort['ile_wyn']; } 
else { $limit ='';}

if($sort['sort'] == 1){
//DB::debugMode();
$where = new WhereClause('and'); 
if(!empty($sort['sort_nazwa'])) { $where->add('nazwa LIKE %s', '%'.$sort['sort_nazwa'].'%'); }
if(!empty($sort['nip'])) { $where->add('nip=%i',$sort['nr_konta']); } 
if(!empty($sort['nr_konta_input'])) { $where->add('nr_umowy=%i',$sort['nr_konta_input']); } 
if(!empty($sort['nr_karty'])) { $where->add('nr_karty=%s',$sort['nr_karty']); }
if(!empty($sort['email'])) { $where->add('email_firmowy=%s',$sort['email']); }
if(!empty($sort['miasto'])) { $where->add('miasto1=%s OR miasto2= %s',$sort['miasto'],$sort['miasto']); }
if(!empty($sort['woj']) && $sort['woj'] != 0) { $where->add('woj1=%i OR woj2=%i',$sort['woj'],$sort['woj']); }

if(!empty($sort['uzytkownik']) && is_numeric($sort['uzytkownik'])){
    $user = DB::query('SELECT klient_id FROM users_group WHERE user_id = %i',$sort['uzytkownik']);

 foreach ($user as $klucze=>$id) {
    $i ++;
 if($i== 1){$ida .= 'id= '.$id['klient_id']; }    
$ida .= ' OR id= '.$id['klient_id'];
}

$where->add($ida);
       
    
}

if(!empty($sort['poziom'])){
 $poziom = poziom_rozliczen_id($sort['poziom']);
    $user = DB::query('SELECT klient_id FROM poziom_group WHERE poziom_id = %i',$poziom);

    if(count($user)!=0){
 foreach ($user as $klucze=>$id) {
    $i ++;
 if($i== 1){$ida .= 'id= '.$id['klient_id']; }    
$ida .= ' OR id= '.$id['klient_id'];
}

$where->add($ida);
    }
    
    
} 

if($_SESSION['user']['type'] != 2){

if(!empty($sort['broker']) && is_numeric($sort['broker'])){
$user = DB::query('SELECT klient_id FROM users_group WHERE user_id = %i',$sort['broker']);
 if(count($user)!=0){
foreach ($user as $klucze=>$id) {
    $i ++;
 if($i== 1){$ida .= 'id= '.$id['klient_id']; }    
$ida .= ' OR id= '.$id['klient_id'];
}

$where->add($ida);
}
}
    
} else {
     if(count($user)!=0){
 foreach ($user as $klucze=>$id) {
    $i++;
 if($i== 1){$ida .= 'id= '.$id['klient_id']; }    
$ida .= ' OR id= '.$id['klient_id'];
}

$where->add($ida);
     }


}    
    
    






if(!empty($sort['branza']) && is_numeric($sort['branza']) && $sort['branza'] ){
$branza = DB::query('SELECT klient_id FROM branza_group WHERE branza_id = %i',$sort['branza']);
$n = count($branza);
if($n == 0){ $where->add('id=%i',0);    } else {
$i = 0;
foreach ($branza as $klucze=>$id) {
    $i ++;
 if($i== 1){$ida .= 'id= '.$id['klient_id']; }    
$ida .= ' OR id= '.$id['klient_id'];
}

$where->add($ida);

}
}
 
//DB::debugMode();

  $data_od = data_pyt($sort['data_od']);
$data_do = data_pyt($sort['data_do']);

if(!empty($sort['data_od'])&& empty($sort['data_do'])){
$tranzakcje_od_a = DB::query('SELECT klient_a FROM tranzakcje WHERE data >= %t GROUP BY klient_a ',$data_od);
$n = count($tranzakcje_od_a);
$na = $n -1 ;
for($i=0;$i<$n;$i++){ 
 
    if($na != $i){
    $ds .= ' id= '.$tranzakcje_od_a[$i]['klient_a'] . ' OR ';   
    } else { $ds .= ' id= '.$tranzakcje_od_a[$i]['klient_a']; }
        
        
}   
$where->add($ds);
}


if(!empty($sort['data_do']) && strlen($sort['data_od']) ==0){
    
    $tranzakcje_do_a = DB::query('SELECT klient_a FROM tranzakcje WHERE data <= %t GROUP BY klient_a ',$data_do);

$n = count($tranzakcje_do_a);

$na = $n - 1 ;
for($i=0;$i<$n;$i++){ 
  
    if($na != $i ){
    $dsa .= ' id= '.$tranzakcje_do_a[$i]['klient_a'] . ' OR ';   
    } else { $dsa .= ' id= '.$tranzakcje_do_a[$i]['klient_a']; }
        
        
}   
$where->add($dsa);
}


//klienci
if(!empty($sort['data_do']) && !empty($sort['data_od']) ){


$tranzakcje_do_od_a = DB::query("SELECT klient_a , klient_b FROM tranzakcje WHERE data BETWEEN '".$data_od." 00:00:00' AND '".$data_do." 23:59:59'");

$i = 0;
foreach ($tranzakcje_do_od_a as $klucze=>$id) {
    $i ++;
 if($i== 1){$ida .= 'id= '.$id['klient_a']; }    
$ida .= ' OR id= '.$id['klient_a'];
}


$i = 0;
foreach ($tranzakcje_do_od_a as $klucze=>$id) {
    $i ++;
 if($i== 1){$idc .= 'id= '.$id['klient_b']; }    
$idc .= ' OR id= '.$id['klient_b'];
}



$where->add($ida.' OR   '.$idc);


}




if(!empty($sort['typ_umowy'])) { $where->add('typ_konta=%i',$sort['typ_umowy']-1); }







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


DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

try {
if(!empty($bro)){ $bros = 'WHERE '.$bro ; } 
      
 if($spec == 1){ $query = DB::query('SELECT * FROM klienci '.$bros.'   ORDER BY STR_TO_DATE(waznosc_debetu,"%d,%m,%Y") DESC'.$limit); }  
 if($spec == 2){ $query = DB::query('SELECT * FROM klienci '.$bros.'  ORDER BY STR_TO_DATE(waznosc_debetu,"%d,%m,%Y") '.$limit); }
  if($spec2 == 1){ $query = DB::query('SELECT * FROM klienci '.$bros.'  ORDER BY STR_TO_DATE(data_umowy,"%d,%m,%Y") DESC'.$limit); }  
 if($spec2 == 2){ $query = DB::query('SELECT * FROM klienci '.$bros.'  ORDER BY STR_TO_DATE(data_umowy,"%d,%m,%Y") '.$limit); }
 
if($spec != 2 && $spec != 1 && $spec2 !=2 && $spec2 !=1){
   
 
    
$query = DB::query("SELECT *  FROM klienci WHERE (%ls) ORDER BY ".$order." ".$limit,$where);    
}



} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}


DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
 

    

} else {
 
if($_SESSION['user']['type'] == 2) {    
$user = DB::query('SELECT klient_id FROM users_group WHERE user_id = %i',$_SESSION['user']['id']);


foreach ($user as $klucze=>$id) {
    $i ++;
 if($i== 1){$ida .= 'id= '.$id['klient_id']; }    
$ida .= ' OR id= '.$id['klient_id'];
}

$bro = 'WHERE '.$ida ;


}     
    
$query = DB::query("SELECT * FROM klienci ".$bro."  ORDER BY id DESC");    
    
}


}



if($typ == 'branze') { $query = DB::query("SELECT * FROM branze"); }


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

function opis_update($id,$opis,$zdjecie){
DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
  opis => $opis ,
  zdjecie_url=>  $zdjecie
));       
    
    
    
}



function faktura_data($id){
$query = DB::queryFirstRow('SELECT * FROM tranzakcje WHERE id = '.$id);    
    
 
return $query['data'];
}

function akt_fakture($id,$faktura,$klient_id){
 


$query = DB::queryFirstRow('SELECT * FROM tranzakcje WHERE id = '.$id);
if($query['klient_a'] == $klient_id){
DB::insertUpdate('tranzakcje', array(
  'id' => $id //primary key
  
), array(
  faktura_id_a => 1 ,
  faktura_a=>  $faktura
));    
    
    
return $query['prowizja_a'];
} if($query['klient_b'] == $klient_id){
DB::insertUpdate('tranzakcje', array(
  'id' => $id //primary key
  
), array(
  faktura_id_b => 1 ,
  faktura_b=>  $faktura
));
    
return $query['prowizja_b'];
}
}

    
    
    


function wystaw_fakture($id,$kwota,$ciag){
    
    $kwotax = $kwota * 1.23 ;
  $data_pla = date("Y-m-d", strtotime('+7 day'));
 echo '<div style="display:none;">';   
 $host = nazwa.'.fakturownia.pl';
$token = token ;
echo $json ='{ "api_token": "'.$token.'", "invoice": { "kind":"vat", "number": null, "sell_date": "'.date('Y-m-d').'", "issue_date": "'.date('Y-m-d').'", "payment_to": "'.$data_pla.'", "seller_name": "'.nazwa_firmy.'", "seller_tax_no": "'.nip.'", "buyer_name": "'. klienci($id)['nazwa'].'", "buyer_tax_no": "'. klienci($id)['nip'].'", "positions":[ '.$ciag.'] }}';
$c = curl_init();
curl_setopt($c, CURLOPT_URL, 'https://'.$host.'/invoices.json');
$head[] ='Accept: application/json';
$head[] ='Content-Type: application/json';
curl_setopt($c, CURLOPT_HTTPHEADER, $head);
curl_setopt($c, CURLOPT_POSTFIELDS, $json);
curl_exec($c);   
 echo '</div>';      

 
 $query = DB::queryFirstRow('SELECT prowizja_b FROM klienci WHERE id = '.$id);
 
 $prowizja =  $query['prowizja_b'] - $kwota; 
 
DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
 prowizja_b => $prowizja 
));
 
 
 
}

function pobierz_fakture(){
    
$json_url ='https://'.nazwa.'.fakturownia.pl/invoices.json?period=this_month&api_token='.token;

// Initializing curl
$ch = curl_init( $json_url );

// Configuring curl options
$options = array(
CURLOPT_RETURNTRANSFER => true,
CURLOPT_HTTPHEADER => array('Content-type: application/json') ,
);

// Setting curl options
curl_setopt_array( $ch, $options );

// Getting results
$result =  curl_exec($ch); // Getting JSON result string

$data = json_decode($result);

ksort($data, "Total");

return $data ;


}







function broker ($id,$klient){
$user = DB::query('SELECT klient_id FROM users_group WHERE user_id = '.$id.' AND klient_id= '.$klient);    
    
return count($user);    
 

}


function referencje_upade ($array,$id){    
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;




try {
  if($_SESSION['user']['id'] > 0){ 
    DB::insertUpdate('tranzakcje', array(
  'id' => $id //primary key
  
),$array);
    
    sql_q('zmiana_haslo'); 
  }
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


function ilosc_ofert($id,$typ){
   // DB::debugMode();
 $query = DB::query("SELECT id FROM oferty WHERE Klient_id = ".$id." AND typ= ".$typ); 
 return count($query);  
    
}


function ilosc_referencji($id,$typ){
if($typ == 1) { $query = DB::query("SELECT id FROM tranzakcje WHERE klient_a = ".$id." AND data_ref is not null"); } 
if($typ == 2) { $query = DB::query("SELECT id FROM tranzakcje WHERE klient_b = ".$id." AND data_ref is not null"); }
    
    return count($query);  
    
}



function woj($id){

         if($id==1){return "dolnośląskie" ; }
	 if($id==2){return "returnkujawsko-pomorskie" ; }
	 if($id==3){return "return lubelskie" ; }
	 if($id==4){return "lubuskie" ; }
	 if($id==5){return "łódzkie" ; }
	 if($id==6){return "małopolskie" ; }
	 if($id==7){return "mazowieckie" ; }
	 if($id==8){return "opolskie" ; }
	 if($id==9){return "podkarpackie" ; }
	 if($id==10){return "podlaskie" ; }
	 if($id==11){return "pomorskie" ; }
	 if($id==12){return "śląskie" ; }
	 if($id==13){return "świętokrzyskie" ; }
	 if($id==14){return "warmińsko-mazurskie" ; }
	 if($id==15){return "wielkopolskie" ; }
	 if($id==16){return "zachodniopomorskie" ; }
	 if($id==17){return "INTERNATIONAL" ; }    
    
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
 if($_SESSION['user']['id'] > 0){  
if($query['aktywny'] == 1) {    

DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
  aktywny => 0      
)); 
 }
 
 }
} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    



 }
 
function tranzakcje_ile($id,$typ,$f){ 
//DB::debugMode();

    global $sort ;
   // print_r($sort);
 
  $data_od = data_pyt($sort['data_od']);
$data_do = data_pyt($sort['data_do']);

  $where = new WhereClause('AND'); 

if(!empty($sort['data_od'])&& empty($sort['data_do'])){

    $where->add("data >= %t",$data_od);
}


if(!empty($sort['data_do']) && strlen($sort['data_od']) ==0){
    

  
$where->add("data <= %t",$data_do);
}
  
  
  
  
if(!empty($sort['data_do']) && !empty($sort['data_od']) ){
$where-> add("data BETWEEN '".$data_od." 00:00:00' AND '".$data_do." 23:59:59'");
}

if($typ == 1) { $where-> add("klient_a = %i",$id); }
if($typ == 2) { $where-> add("klient_b = %i",$id); }
    



 $query = DB::query("SELECT * FROM tranzakcje WHERE %ls",$where);  

 if($f == 0){
 return count($query);
 }
 
 if($f == 1){
 return $query;    
 }
 
  if($f == 2){
 return $query;    
 }
 
     
     
 
 
    
}


function add_jpg (){
    
global $_FILES;

    $target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["files"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["files"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }
    
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    $uploadOk = 0;
}
$radek = rand(0,9999);
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    //echo "Plik jest za duży.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    //echo "Przepraszamy ale plik nie jest zdjęciem.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    //echo "Przepraszamy ale zdjęcie nie zostało dodane.";
// if everything is ok, try to upload file
} else {
    
    if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
       rename($target_dir.basename($_FILES["files"]["name"]),$target_dir.$radek.basename( $_FILES["files"]["name"]));
        //"Plik ". basename( $_FILES["files"]["name"]). " został .";
    } else {
        //echo "Błąd .";
    }
}
  if(!empty($_FILES["files"]["name"])){ $zdjecie = $radek.$_FILES["files"]["name"]; }
    
    

return $zdjecie ;
  

  }

function uczestnicy($id,$branza) {  
//DB::debugMode();
 DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
 
 
try {

     
if($branza !=0) {      
 $query = DB::query('SELECT klient_id FROM branza_group WHERE branza_id = '.$branza); 
$branza = '( ';
$na = count($query);
if($na == 0) { $block = 0; }

for($i=0;$i<$na;$i++){
$branza .= ' id= '.$query[$i]['klient_id'];  
if($i != $na-1){ $branza .= ' OR '; }    
}
$branza .= ') AND';

$where = 'WHERE '.$branza.' typ_konta = 0 AND aktywny=1'; 
}
if($branza ==0){ $branza = ''; }
    
     
 
 if($id >0){  $where = 'WHERE aktywny=1 AND typ_konta = 0 AND id ='.$id;  } 

 $query = DB::query('SELECT * FROM klienci '.$where.' ORDER BY id DESC'); 
 return $query ;  
 


} catch(MeekroDBException $e) {
  //$sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
} 
 
} 

function uczestnik($id){ 

 $query = DB::queryFirstRow('SELECT * FROM klienci WHERE id='.$id);     
    return $query;
    echo 'ssssss';
}


function waznosc_konta($id){

DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;



// aktywacja konta 
try {
$query = DB::queryFirstRow("SELECT * FROM klienci WHERE id = ".$id);
 if($query['aktywny'] == 1) {    
 if($_SESSION['user']['id'] > 0){ 
DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
  aktywny => 0      
));   
 }
$kom = komunikat(2);  $message = $kom['opis'];

if(!empty($query['email_firmowy'])){
mail($query['email_firmowy'], 'Deaktywacja konta  dezaktywowane ', $message);
$email_user = users($_SESSION['user']['id']);

}

$email_user = users($_SESSION['user']['id']);
if(!empty($email_user)){
mail($email_user['email'], 'Deaktywacja konta  dezaktywowane ', $message);
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
 if($_SESSION['user']['id'] > 0){ 
DB::insertUpdate('klienci', array(
  'id' => $id //primary key
  
), array(
  debet_akt => 0      
));   
 }
$kom = komunikat(3);  $message = $kom['opis'];


if(!empty($query['email_firmowy'])){
mail($query['email_firmowy'], 'Deaktywacja konta  dezaktywowane ', $message);


}
$email_user = users($_SESSION['user']['id']);
if(!empty($email_user)){
mail($email_user['email'], 'Deaktywacja konta  dezaktywowane ', $message);
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
 if($_SESSION['user']['id'] > 0){ 
DB::insertUpdate('oferty', array(
  'id' => $id //primary key
  
), array(
  aktywny => 0      
));   
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

function branze_select_klient ($id){

 $query = DB::query("SELECT * FROM branza_group WHERE klient_id = ".$id."  ORDER BY id DESC");

return $query ;
   
    
}



function klients_group_id($id){
 
$query = DB::query("SELECT * FROM users_group WHERE klient_id = ".$id." ORDER BY id DESC");

return $query ;    
    
}


function branza_sel($id){
 
$query = DB::query("SELECT * FROM branza_group WHERE klient_id = ".$id." ORDER BY id DESC");

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
 if($_SESSION['user']['id'] > 0){ 
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
 if($_SESSION['user']['id'] > 0){ 
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
 if($_SESSION['user']['id'] > 0){   
$query = DB::queryFirstRow("SELECT * FROM branza_group WHERE klient_id= %i", $id);  

$n = count($query);
if($n > 0){
    DB::insertUpdate('branza_group', array(
  'klient_id' => $id //primary key
  
), array(
  'branza_id' => $branza,
  'user_id'=> $_SESSION['user']['id']      
));
    
} else {
 DB::insert('branza_group', array(   
    'branza_id' => $branza,
  'user_id'=> $_SESSION['user']['id'],
     'klient_id' => $id
    
    ));
}
    
    sql_q('zatualizowano_rozliczenie'); 
 }
} catch(MeekroDBException $e) {
  $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    

    
}


function poziom_rozliczen_id ($poziom){
$query = DB::queryFirstRow("SELECT id FROM poziom_rozliczen  WHERE poziom = '".$poziom."'");    
 
return $query['id'];
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

$poziom = str_replace('%','',$sort['poziom']);

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









//oferty 
    
    //DB::debugMode();
    if($id != 0){
$query = DB::queryFirstRow("SELECT * FROM oferty WHERE id = ".$id." ORDER BY id DESC");
} else {
    
}
if($id == 0){    
$query = DB::query("SELECT * FROM oferty  WHERE (%l)  ".$daty." AND typ = 2 ORDER BY ".$order,$where);    
} 
if($id == 2){ 
$query = DB::query("SELECT * FROM oferty  WHERE (%l)  ".$daty." AND typ = 1 ORDER BY ".$order,$where);   
}

return $query ;    
    
}    


function usun_oferte ($id){
  DB::delete('oferty', "id=%s",$id);    
    
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
      if($_SESSION['user']['id'] > 0){ 
     if(!empty($typ)){
    DB::insertUpdate('komunikaty', array(
  'id' => $typ, //primary key
  'typ' => $typ          
  
),array('opis'=>$opis)); 
    
    
     }
    
     
    
      }
} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    
}


function oferty_all($kat,$typ){
if($kat !=0) {$katy  = "branza_group_id = ".$kat." AND"; }
$query = DB::query("SELECT * FROM oferty WHERE ".$katy." typ = ".$typ." AND aktywny = 1 ORDER BY id DESC"); 
    
return $query ;
    
}



function oferta_view($typ,$id){
if($kat !=0) {$katy  = "typ = ".$typ." AND"; }
$query = DB::queryFirstRow("SELECT * FROM oferty WHERE ".$katy." id = ".$id." AND aktywny = 1"); 
    
return $query ;
    
}





function update_oferte($id,$tab){
     DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
 try {
 if($_SESSION['user']['id'] > 0){      
    DB::insertUpdate('oferty', array(
  'id' => $id //primary key
  
),$tab); 
 }
    

      
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
 if($_SESSION['user']['id'] > 0){ 
     
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
 if($_SESSION['user']['id'] > 0){ 
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

 if($_SESSION['user']['id'] > 0){    
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
 if($_SESSION['user']['id'] > 0){    
   DB::insert('branze', array(
  'nazwa' => $nazwa     
)); 
    sql_q('dodano_branze'); 
 }
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
   if($_SESSION['user']['id'] > 0){  
   DB::insert('poziom_rozliczen', array(
  'poziom' => $nazwa,
  'user_id'=> $_SESSION['user']['id']      
)); 
    sql_q('dodano_rozliczenie'); 
   }
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
    if($_SESSION['user']['id'] > 0){ 
    DB::insertUpdate('poziom_rozliczen', array(
  'id' => $id //primary key
  
), array(

  'poziom' => $nazwa,
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
$kom = komunikat(1);  $message = $kom['opis'];
    $email_user = users($_SESSION['user']['id']);
if(!empty($email_user)){
mail($email_user['email'], 'Dokonano transakcji ', $message);
}

    
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
//DB::debugMode();
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




function klient_group3($user_id,$nip,$nazwa,$id,$typ){
//DB::debugMode();
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

    
try {     
    

DB::insert('users_group', array(
  'user_id' => $user_id,
  'nip' => $nip,
  'nazwa'=>$nazwa ,
  'typ'=> $typ ,  
  'klient_id' => $id,
  ));

} catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
 

DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;    
    





}






function branza_group_del($id){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;
try {  
DB::delete('branza_group', "klient_id=".$id);           
}
catch(MeekroDBException $e) {
    $sql_error = $e->getMessage().'query: '.$e->getQuery();
    sql_error($sql_error);
}
DB::$error_handler = 'meekrodb_error_handler';
DB::$throw_exception_on_error = false;   

 }


function branza_group($nazwa,$id){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;

    
try {    

DB::insert('branza_group', array(
  'user_id' => $_SESSION['user']['id'],
  'branza_id'=>$nazwa ,
  'klient_id' => $id
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




function poziom_group_klient($id){
$id = DB::query("SELECT poziom_id FROM poziom_group WHERE klient_id=".$id);        
    
return $id ;    
}


function poziom_group_klient_row($id){
$id = DB::queryFirstRow("SELECT * FROM poziom_group WHERE klient_id=".$id);        
    
return $id ;    
}



function poziom_group_del($id){
DB::delete('poziom_group', "klient_id=".$id);      
    
}

function poziom_group($nazwa ,$id){
DB::$error_handler = false; // since we're catching errors, don't need error handler
DB::$throw_exception_on_error = true;


try {    
  
  

DB::insert('poziom_group', array(
  'user_id' => $_SESSION['user']['id'],
  'poziom_id'=>$nazwa ,
  'klient_id' => $id
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


function typ_klient($id){
    
    if($id == 0){ return 'biznes'; }
    if($id == 1){ return 'konsument'; }
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
DB::debugMode(false);   
?>