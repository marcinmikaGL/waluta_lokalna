 <?php
if($_GET['add_klient2'] == 1) {
 include_once('./content/klient_add.php');
}
include_once('./content/user_dodaj.php');
include_once('./content/dodaj_pry.php');
include_once('./content/zap_view.php');
include_once('./content/klienci_konta.php');
if(!empty($_GET['ids'])){
include_once('./content/tranzakcje_view.php');
}
?>