<?php
/* 
 * obsługa sesji 
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if ((isset($_POST['login']) && !empty($_POST['login']))  || (isset($_POST['password']) &&  !empty($_POST['login']))) {
$login = $_POST['login'];
$haslo = $_POST['password'];
$_SESSION['user'] = sql_q('user');
if(sql_q('logowanie') == 1) {   
    $_SESSION['zalogowany'] = 1 ; 
    sql_q('logi_zalogowany');




}
else {
sql_q('logi_bladne_logownia');    
echo '<script> alert("Błędny login lub hasło"); </script>';    
}

 }

// liczenie
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > (session_time*60))) {

    session_unset();     // unset $_SESSION variable for the run-time 
    session_destroy();   // destroy session data in storage
    sql_q('logi_przekroczony_czas');
    
}
$_SESSION['LAST_ACTIVITY'] = time(); // update last activity time stamp


// wylogowywanie 
if ($_GET['logout'] == 1) { 
    $_SESSION['zalogowany'] = 0 ;  
$_SESSION['user'] = 0 ;
session_destroy(); 

sql_q('logi_wylogowany');
}
    


?>