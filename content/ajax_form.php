<?php
error_reporting(0);
include_once('../config/config.php');
include_once('../lib/meekrodb.2.3.class.php');
include_once('../functions/global.php');

$nr_nip_klienta = $_POST['nip'];

if (stripos($nr_nip_klienta, "NIP:") !== false) { 
$nip = str_replace("NIP:",'',$nr_nip_klienta); 
$klient_id = klienci_ids($nip);
}
if (stripos($nr_nip_klienta, "NR UMOWY:") !== false) { 
$nip = str_replace("NR UMOWY:",'',$nr_nip_klienta);
$klient_id = klienci_nr_umowy($nip);

}

if(!empty($klient_id['nazwa'])){ echo 'nazwa firmy: '.$klient_id['nazwa']."\n"; }
if(!empty($klient_id['nip'])){  echo 'NIP: '.$klient_id['nip']."\n"; }
if(!empty($klient_id['nr_umowy'])){ echo 'nr konta: '.$klient_id['nr_umowy']."\n"; }
if(!empty($klient_id['adres1'])){ echo "adres korespondencji \n"; echo 'adres: '.$klient_id['adres1']."\n"; }
if(!empty($klient_id['miasto1'])){ echo 'miasto: '.$klient_id['miasto1']."\n"; }
if(!empty($klient_id['kod1'])){ echo 'kod pocztowy: '.$klient_id['kod1']."\n"; }
if(!empty($klient_id['aktywny'])){ 
if($klient_id['aktywny'] == 1) { echo '[KONTA AKTYWNE]';} else {
echo '[KONTO NIE AKTYWNE]';    
    
}
}

?>