<div style="position: absolute; z-index: 1000">
<?php


if($_REQUEST['sort'] == 1){

$zdjecie = $_REQUEST['zdjecie'];
$nazwa_konta = $_REQUEST['nazwa_konta'];   
$nazwa_user = $_REQUEST['nazwa_user'];    
$poziom_a = $_REQUEST['poziom_a'];
$opisy = $_REQUEST['opisy'];
$branza_a = $_REQUEST['branza_a'];
$data_dodania = $_REQUEST['data_dodania'];
$data_edycji = $_REQUEST['data_edycji'];
$data_end = $_REQUEST['data_end'];





if(!is_array($sort)) { $sort = array(sort => $_REQUEST['sort']); }

if(!empty($zdjecie)){ $sort = array(sort => $_REQUEST['sort'],zdjecie =>$zdjecie);  }
if($sort['zdjecie'] == 1){ $zdjecie_s= 2;}else { $zdjecie_s= 1;}
$top_zdjecie = 'sort=1&zdjecie='.$zdjecie_s;
$top_zdjecie .= '&nazwa_konta=0&nazwa_user=0&poziom_a=0&branza_a=0&data_dodania=0&data_edycji=0';
$top_zdjecie .= '&data_end=0&opisy=0';



if(!empty($nazwa_konta)){ $sort = array(sort => $_REQUEST['sort'],nazwa_konta =>$nazwa_konta);  }
if($sort['nazwa_konta'] == 1){ $nazwa_konta_s= 2;}else { $nazwa_konta_s= 1;}
$top_nazwa_konta = 'sort=1&zdjecie=0';
$top_nazwa_konta .= '&nazwa_konta='.$nazwa_konta_s.'&nazwa_user=0&poziom_a=0&branza_a=0&data_dodania=0&data_edycji=0';
$top_nazwa_konta .= '&data_end=0&opisy=0';



if(!empty($nazwa_user)){ $sort = array(sort => $_REQUEST['sort'],nazwa_user =>$nazwa_user);  }
if($sort['nazwa_user'] == 1){ $nazwa_user_s= 2;}else { $nazwa_user_s= 1;}
$top_nazwa_user = 'sort=1&zdjecie=0';
$top_nazwa_user .= '&nazwa_konta=0&nazwa_user='.$nazwa_user_s.'&poziom_a=0&branza_a=0&data_dodania=0&data_edycji=0';
$top_nazwa_user .= '&data_end=0&opisy=0';




if(!empty($poziom_a)){ $sort = array(sort => $_REQUEST['sort'],poziom_a =>$poziom_a);  }
if($sort['poziom_a'] == 1){ $poziom_a_s= 2;}else { $poziom_a_s= 1;}
$top_poziom_a = 'sort=1&zdjecie=0';
$top_poziom_a .= '&nazwa_konta=0&nazwa_user=0&poziom_a='.$poziom_a_s.'&branza_a=0&data_dodania=0&data_edycji=0';
$top_poziom_a .= '&data_end=0&opisy=0';



if(!empty($branza_a)){ $sort = array(sort => $_REQUEST['sort'],branza_a =>$branza_a);  }
if($sort['branza_a'] == 1){ $branza_a_s= 2;}else { $branza_a_s= 1;}
$top_branza_a = 'sort=1&zdjecie=0';
$top_branza_a .= '&nazwa_konta=0&nazwa_user=0&poziom_a=0&branza_a='.$branza_a_s.'&data_dodania=0&data_edycji=0';
$top_branza_a .= '&data_end=0&opisy=0';


if(!empty($data_dodania)){ $sort = array(sort => $_REQUEST['sort'],data_dodania =>$data_dodania);  }
if($sort['data_dodania'] == 1){ $data_dodania_s= 2;}else { $data_dodania_s= 1;}
$top_data_dodania = 'sort=1&zdjecie=0';
$top_data_dodania .= '&nazwa_konta=0&nazwa_user=0&poziom_a=0&branza_a=0&data_dodania='.$data_dodania_s.'&data_edycji=0';
$top_data_dodania .= '&data_end=0&opisy=0';



if(!empty($data_edycji)){ $sort = array(sort => $_REQUEST['sort'],data_edycji =>$data_edycji);  }
if($sort['data_edycji'] == 1){ $data_edycji_s= 2;}else { $data_edycji_s= 1;}
$top_data_edycji = 'sort=1&zdjecie=0';
$top_data_edycji .= '&nazwa_konta=0&nazwa_user=0&poziom_a=0&branza_a=0&data_dodania=0&data_edycji='.$data_edycji_s ;
$top_data_edycji .= '&data_end=0&opisy=0';



if(!empty($data_end)){ $sort = array(sort => $_REQUEST['sort'],data_end =>$data_end);  }
if($sort['data_end'] == 1){ $data_end_s= 2;}else { $data_end_s= 1;}
$top_data_end = 'sort=1&zdjecie=0';
$top_data_end .= '&nazwa_konta=0&nazwa_user=0&poziom_a=0&branza_a=0&data_dodania=0&data_edycji=0' ;
$top_data_end .= '&data_end='.$data_end_s.'&opisy=0';




if(!empty($opisy)){ $sort = array(sort => $_REQUEST['sort'],opisy =>$opisy);  }
if($sort['opisy'] == 1){ $opisy_s= 2;}else { $opisy_s= 1;}
$top_opisy = 'sort=1&zdjecie=0';
$top_opisy .= '&nazwa_konta=0&nazwa_user=0&poziom_a=0&branza_a=0&data_dodania=0&data_edycji=0' ;
$top_opisy .= '&data_end=0&opisy='.$opisy_s;






$sort['nazwa'] = $_REQUEST['nazwa'];
$sort['tytul'] = $_REQUEST['tytul'];   
$sort['uzytkownik'] = $_REQUEST['uzytkownik'];
$sort['poziom'] = $_REQUEST['poziom'];
$sort['branza'] = $_REQUEST['branza'];
$sort['typ_daty'] = $_REQUEST['typ_daty'];
$sort['data_od'] = $_REQUEST['data_od'];
$sort['data_do'] = $_REQUEST['data_do'];

$other = '&nazwa='.$_REQUEST['nazwa'];
$other .='&tytul='.$_REQUEST['tytul'];
$other .='&uzytkownik='.$_REQUEST['uzytkownik'];    
$other .='&poziom='.$_REQUEST['poziom'];
$other .='&branza='. $_REQUEST['branza'];
$other .='&typ_daty='. $_REQUEST['typ_daty'];
$other .='&data_od='. $_REQUEST['data_od'];
$other .='&data_do='. $_REQUEST['data_do'];



}



if($_GET['oferty_add'] == 1) {
$target_dir = "upload/";
$target_file = $target_dir . basename($_FILES["files"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["files"]["tmp_name"]);
    if($check !== false) {
        //echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
      //  echo "File is not an image.";
        $uploadOk = 0;
    }
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
       echo  rename($target_dir.basename($_FILES["files"]["name"]),$target_dir.$radek.basename( $_FILES["files"]["name"]));
        echo "Plik ". basename( $_FILES["files"]["name"]). " został .";
    } else {
        echo "Błąd .";
    }
}


if(empty($_POST['ofeta'])) { $_POST['ofeta'] = 0; } else {
    
    $_POST['data_waznosci'] = 0 ;
} 
    
  if(!empty($_FILES["files"]["name"])){ $zdjecie = $radek.$_FILES["files"]["name"]; }
$opis = preg_replace('~[\r\n]+~', '', $_POST['opis']);    
if(empty($opis)){ $opis = 0 ;}
$czas = sql_q('czas');
$klient = klienci($_POST['id']); 
$branza= branza($_POST['branza']);
$oferta = array ( 
 nazwa_klienta=> $klient['nazwa'] ,
 aktywny=> 1,     
 tytul => $_POST['temat'],
 opis =>  $opis ,
 zdjecie_url => $zdjecie,   
 branza_group_id=> $_POST['branza'] ,
 branza_nazwa => $branza['nazwa'],    
 waznosc_oferty=> data_pyt($_POST['data_waznosci']).' 23:59:59' , 
 data_edycji => $czas['CURRENT_TIMESTAMP()'],   
 oferta_stala => $_POST['ofeta'] ,    
 typ => 2 ,   
 klient_id => $_POST['id'],   
rozliczenia => $_POST['poziom'],
urzytkownik_id =>$_SESSION['user']['id']    
)   ; 


if(empty($_POST['ids'])){ dodaj_oferte($oferta); }else { update_oferte($_POST['ids'],$oferta); }
    
}


 $oferty = oferta(0);
 $na= count($oferty);

?>
</div>
  <?php if($_GET['oferty_add']==2){ include('content/oferta_add.php'); } ?>

<div class="row spady" style="margin-left: 5px; margin-top:-20px; margin-bottom:10px;  margin-right: 5px;">
<div class="pole col-md-8" style="width: 73%;">    
<div class="title-section"><div class="title"><p>Szukaj</p></div></div>    
<div class="spady" style="min-height: 185px;">
<div class="row" style="margin-top:-20px;">   
    <form action="index.php?page=<?php echo $_GET['page']; ?>&sort=1" method="post">    
    <div class="col-md-4">    
    <div class="control-group">
        <label for="nazwa">nazwa konta</label>
        <input name="nazwa" <?php if(!empty($_REQUEST['nazwa'])){ ?> value="<?php echo $_REQUEST['nazwa']; ?>" <?php } ?> >   
        
        
  

        
    </div> 
     <div class="control-group">
             <label for="tytul">Tytuł zapotrzebowania</label>      
             <input type="text" name="tytul" <?php if(!empty($_REQUEST['tytul'])){ ?> value="<?php echo $_REQUEST['tytul']; ?>" <?php } ?>>
             
             
         </div>         
            
        
        
     
  
   </div>
     <div class="col-md-4">    
       <div class="control-group">
 	
   
 <label class="control-label" for="user">Użytkownik</label>    
 <select  placeholder="wybierz użytkownika" name="uzytkownik" class="chosen-select">
     <option> &nbsp; </option>    
 <?php 
     $user_drop = sql_q('users');
     $n = count($user_drop);
       for($i=0;$i<$n;$i++){ 
         if($user_drop[$i]['type'] != 2){  
           ?>
     <option <?php if($_REQUEST['uzytkownik']== $user_drop[$i]['id']){ ?> selected="" <?php } ?> value="<?php echo $user_drop[$i]['id']; ?>">[<?php echo $user_drop[$i]['login']; ?>] <?php echo $user_drop[$i]['imie']; ?> <?php echo $user_drop[$i]['nazwisko']; ?></option>    
       <?php  } } ?> 
     </select>

 </div>
          <div class="control-group">
      <label for="poziom">Poziom rozliczeń</label>    
      <select id="poziom" name="poziom" class="testsel">
      <option>&nbsp;</option>
        <?php
        $poziom_rozliczen = sql_q('poziom_rozliczen');
       
     $n = count($poziom_rozliczen);
       for($i=0;$i<$n;$i++){ ?>
          <option <?php if($_REQUEST['poziom'] == $poziom_rozliczen[$i]['poziom']){ ?> selected="" <?php } ?>  id="<?php echo $poziom_rozliczen[$i]['id']; ?>"><?php echo $poziom_rozliczen[$i]['poziom']; ?></option>  
          
          
       <?php }?>
      </select>
</div>    
         
<div class="control-group" style="margin-top:10px;">       
<label for="branza">Branża</label>
<select name="branza" id="branza" class="testsel">
    <option>&nbsp;</option>
 <?php
        $branza = sql_q('branze');
       
     $n = count($branza);
     
       for($i=0;$i<$n;$i++){ ?>
     <option <?php if($_REQUEST['branza']== $branza[$i]['id']){ ?> selected="" <?php } ?> value="<?php echo $branza[$i]['id']; ?>"> 
          <?php echo $branza[$i]['nazwa']; ?>
     </option>
       <?php } ?>    


</select>
</div>
   </div>
     <div class="col-md-4">    
<div class="control-group">
<label for="typ_daty">typ daty</label>
<select name="typ_daty" id="typ_daty" class="testsel">
    <option <?php if($_REQUEST['typ_daty']== 1){ ?> selected="" <?php } ?>  value="1">Data dodania</option>
    <option <?php if($_REQUEST['typ_daty']== 2){ ?> selected="" <?php } ?> value="2">Data data edycji</option>
    <option <?php if($_REQUEST['typ_daty']== 3){ ?> selected="" <?php } ?> value="3">Data wygaśnięcia</option>
</select>
</div>
         
         <div class="control-group">

    <label for="tranzacja">Data dodania zapotrzebowania</label>
    <div>
    <div  class='input-group date col-lg-5' style="float: left; width: 48% !important;" id='datetimepicker1'>
            
                    <input placeholder="od" <?php if(!empty($_REQUEST['data_od'])){ echo 'value="'.$_REQUEST['data_od'].'"';} ?>  name="data_od" id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd,mm,yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-required="true" close-text="Close"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
      <div  class='input-group date col-lg-5' style="float: right;  width: 48% !important;" id='datetimepicker1'>
            
                    <input placeholder="do" name="data_do" <?php if(!empty($_REQUEST['data_do'])){ echo 'value="'.$_REQUEST['data_do'].'"';} ?> id="popupDatepicker" type='text' class="form-control" datepicker-popup="dd,mm,yyyy" ng-model="myDate" is-open="data.isOpen" ng-click="data.isOpen=true" datepicker-options="myDateOptions" ng-required="true" close-text="Close"  />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
    
    </div>
    
        
    </div> 
         
         <div class="control-group" >
             <input type="submit" style="margin-top:28px;" value="wyszukaj">          
             
         </div>       
         
   </div>
        
    </form>       
</div>
</div>    
</div>    
    
    
<div class="pole col-md-3 col-lg-offset-1" style="margin-left: 2%;">    
<div class="title-section"><div class="title"><p>Dane klienta</p></div></div>    
<div class="spady" style="min-height: 185px;">
   
             <div class="control-group spady col-lg-12" style="margin-top:-28px; margin-left: -5px;">
                 <div class="spady">
<?php      if($_SESSION['user']['type'] != 0){  ?>
                     Nazwa konta : <strong><?php if($klienci_glowna['aktywny']==0){echo '<font color="red"> '.$klienci_glowna['nazwa'].' NIE AKTYWNE  </font>'; } else { echo $klienci_glowna['nazwa'].' aktywne'; }  ?>  </strong> <br>
         Status konta : <strong><?php if($klienci_glowna['aktywny']==0){echo '<font color="red"> NIE AKTYWNE </font>'; } else { echo 'aktywne'; }  ?>  </strong> <br>
         Dodawanie zapotrzebowanie: <strong> <?php if($klienci_glowna['oferty'] ==1 && $klienci_glowna['aktywny']==1 ){ echo 'aktywne' ; } else { echo '<font color="red"> nie aktywne</font>' ; }?> </strong>       
         
         
<?php if($klienci_glowna['oferty'] ==1 && $klienci_glowna['aktywny']== 1 ){ ?>   
<button class="btn"  onClick="location.href='?page=<?php echo $_GET['page']; ?>&oferty_add=2'">dodaj zapotrzebowanie</button>
<?php } else  {  ?>  <br><?php } } else { ?>         
Aby dodać zapotrzbowanie jako administator wybierz konto.<br>
&nbsp;
<?php } ?>
                 </div> 	
   
<form  <?php if($_SESSION['user']['type'] != 0){ ?> action="?page=<?php echo $_GET['page']; ?>&klient=1"<?php  } else { ?> action="?page=<?php echo $_GET['page']; ?>&oferty_add=2"  <?php } ?>method="post">	
 <?php if($_SESSION['user']['type'] == 0){ echo  '<label class="control-label" for="konto">wybierz konto z którego dodasz zapotrzebowanie   :</label>';  } 
 
 else {
 ?>  
 <label class="control-label" for="konto">wybierz konto do którego jesteś przypisany:</label> 
 <?php } ?>
     <select  placeholder="typ konta" name="typ_konta_drop" class="chosen-select" required/>
    
     <?php
     
      if($_SESSION['user']['type'] == 0){
    
   $kliencia =  sql_q('klienci_drop');
 //print_r($kliencia);
 $n = count($kliencia); 
    
    for($i=0;$i<$n;$i++){ ?>
 <option value="<?php echo $kliencia[$i]['id'] ;?>">
<?php echo $kliencia[$i]['nazwa'];  ?>
 
 </option>    
    
  <?php      
    }
    
    } else {
     
     $user_group = sql_q('users_group');
     
$n = count($user_group); 

for($i=0;$i<$n;$i++){
   $klia = klienci($user_group[$i]['klient_id']);  
 
     ?>
     <option <?php if($_SESSION['klient_id'] == $user_group[$i]['id']){ ?> selected="selected"  <?php } ?> value="<?php echo $user_group[$i]['id'] ;?>"><?php echo $user_group[$i]['nazwa'];  ?></option>    
    
<?php 

}  } ?>
</select>
 <?php if($_SESSION['user']['type'] != 0){ ?> 
 <input style="margin-top: 5px;" type="submit" value="zmień">
 <?php } else { ?>
 <br>
 <input style="margin-top: 15px;" class="btn" type="submit" value="dodaj zapotrzebowanie"> 
 <?php } ?>
</form>
 </div>
         
         
</div>
</div>
</div>            

</div>

<table style="width: 99%; margin-left:auto; margin-right: auto;">
<thead>
    <tr>
<th rowspan="1"  class="spady">LP <span id="nrKier"></span></th>

<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_zdjecie)){echo '&'.$top_zdjecie; } else { ?>&sort=1&zdjecie=1&<?php } echo $other;?>'">
zdjecie<span <?php 
    if($sort['zdjecie'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['zdjecie'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
 <th colspan="2" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_nazwa_konta)){echo '&'.$top_nazwa_konta; } else { ?>&sort=1&nazwa_konta=1&<?php } echo $other;?>'">
nazwa konta<span <?php 
    if($sort['nazwa_konta'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['nazwa_konta'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
 
 <th rowspan="1" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_nazwa_user)){echo '&'.$top_nazwa_user; } else { ?>&sort=1&nazwa_user=1&<?php } echo $other;?>'">
użytkownik<span <?php 
    if($sort['nazwa_user'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['nazwa_user'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
 
 
 <th rowspan="1" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_poziom_a)){echo '&'.$top_poziom_a; } else { ?>&sort=1&poziom_a=1&<?php } echo $other;?>'">
procent rozliczeń<span <?php 
    if($sort['poziom_a'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['poziom_a'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
 
 <th rowspan="1" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_opisy)){echo '&'.$top_opisy; } else { ?>&sort=1&opisy=1&<?php } echo $other;?>'">
Treść zapotrzebowania<span <?php 
    if($sort['opisy'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['opisy'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
 
 <th rowspan="1" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_branza_a)){echo '&'.$top_branza_a; } else { ?>&sort=1&branza_a=1&<?php } echo $other;?>'">
branża<span <?php 
    if($sort['branza_a'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['branza_a'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
 
 
 <th rowspan="1" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_data_dodania)){echo '&'.$top_data_dodania; } else { ?>&sort=1&data_dodania=1&<?php } echo $other;?>'">
data dodania<span <?php 
    if($sort['data_dodania'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['data_dodania'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
 
 <th rowspan="1" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_data_edycji)){echo '&'.$top_data_edycji; } else { ?>&sort=1&data_edycji=1&<?php } echo $other;?>'">
data edycji<span <?php 
    if($sort['data_edycji'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['data_edycji'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
 
 <th rowspan="1" class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_data_end)){echo '&'.$top_data_end; } else { ?>&sort=1&data_end=1&<?php } echo $other;?>'">
data wygaśnięcia<span <?php 
    if($sort['data_end'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['data_end'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>> </span> 
 </th>
 
<th rowspan="1"  class="spady">edytuj<span id="nrKier"></span></th>
    </tr>
<tbody>
 <?php
$z = 1;
$x =1 ;
 
if ($_SESSION['user']['type'] == 3){  
 
     for($i=0;$i<$na;$i++){
            if($klienci_glowna['id'] == $oferty[$i]['klient_id']) {

     ?>   
    <tr>
    <td class="spady"><?php echo $na - $i ; ?></td>
    <td class="spady"><?php  if(empty($oferty[$i]['zdjecie_url'])){ ?> <span class="glyphicon glyphicon-remove-sign spady"></span> <?php }else { ?>
        <img width="30" height="30" src="upload/<?php echo $oferty[$i]['zdjecie_url']; ?>">
 
    <?php } 
    
      $klient = klienci($oferty[$i]['klient_id']);
    ?>
    </td>
    <td> <?php if($oferty[$i]['aktywny'] == 0){ ?> <img class="spady" style="border:1px solid black; background-color: #FFF" height="28" src="img/stop.jpg">  <?php } ?></td>
    <td class="spady"><?php echo $oferty[$i]['nazwa_klienta']  ?></td>
    <td class="spady"><?php echo user($oferty[$i]['urzytkownik_id']) ; ?></td> 
     
    <td class="spady"><?php 
    if(!empty($oferty[$i]['rozliczenia'])){
    echo $oferty[$i]['rozliczenia'].'%' ; 
    } else {
        echo '<font color="red">brak</font>';
    waznosc_oferty($oferty[$i]['id']);
    
    } ?>
    </td>
    <td class="spady" ><?php echo substr ($oferty[$i]['opis'],0,40) ;  ?></td>
     <td class="spady"> <?php echo $oferty[$i]['branza_nazwa'] ; ?>  </td>
    <td class="spady"><?php echo substr($oferty[$i]['data'],0,10) ; ?></td>
    <td class="spady"><?php echo substr($oferty[$i]['data_edycji'],0,10) ; ?></td>
    <td class="spady"><?php if($oferty[$i]['oferta_stala'] == 1){ echo 'Oferta stała'; }
    else {  
        
  if(date('Y-m-d')>$oferty[$i]['waznosc_oferty']){ 
      echo '<font color="red">'; 
      if($oferty[$i]['waznosc_oferty'] == 0){ echo 'brak daty'; } else {
        echo substr($oferty[$i]['waznosc_oferty'],0,10) ; 
    echo '</font>';
    
    waznosc_oferty($oferty[$i]['id']);
      }
    } else { 
    
        echo substr($oferty[$i]['waznosc_oferty'],0,10) ; 
    }}
    ?>
    
    
    </td>    
    <td class="spady">
        <button onClick="location.href='?page=oferty&oferty_add=2&ids=<?php echo $oferty[$i]['id']; ?>'" class="btn">edytuj</button>
            <button onClick="location.href='?page=oferty&oferty_usun=1&ids=<?php echo $oferty[$i]['id']; ?>'" class="btn">usuń</button>
    </td> 
        </tr>
     <?php } }   
        
        
        
    }  else {   
          for($i=0;$i<$na;$i++){
     

     ?>   
    <tr>
    <td class="spady"><?php echo $na - $i; ?></td>
    <td class="spady"><?php  if(empty($oferty[$i]['zdjecie_url'])){ ?> <span class="glyphicon glyphicon-remove-sign spady"></span> <?php }else { ?>
        <img width="30" height="30" src="upload/<?php echo $oferty[$i]['zdjecie_url']; ?>">
 
    <?php } 
    
      $klient = klienci($oferty[$i]['klient_id']);
    ?>
    </td>
    <td> <?php if($oferty[$i]['aktywny'] == 0){ ?> <img class="spady" style="border:1px solid black; background-color: #FFF" height="28" src="img/stop.jpg">  <?php } ?></td>
    <td class="spady"><?php echo $oferty[$i]['nazwa_klienta']  ?></td>
    <td class="spady"><?php echo user($oferty[$i]['urzytkownik_id']) ; ?></td> 
     
    <td class="spady"><?php 
    if(!empty($oferty[$i]['rozliczenia'])){
    echo $oferty[$i]['rozliczenia'].'%' ; 
    } else {
        echo '<font color="red">brak</font>';
    waznosc_oferty($oferty[$i]['id']);
    
    } ?>
    </td>
    <td class="spady" ><?php echo substr ($oferty[$i]['opis'],0,40) ;  ?></td>
     <td class="spady"> <?php echo $oferty[$i]['branza_nazwa'] ; ?>  </td>
    <td class="spady"><?php echo substr($oferty[$i]['data'],0,10) ; ?></td>
    <td class="spady"><?php echo substr($oferty[$i]['data_edycji'],0,10) ; ?></td>
    <td class="spady"><?php if($oferty[$i]['oferta_stala'] == 1){ echo 'Oferta stała'; }
    else {  
        
  if(date('Y-m-d')>$oferty[$i]['waznosc_oferty']){ 
      echo '<font color="red">'; 
      if($oferty[$i]['waznosc_oferty'] == 0){ echo 'brak daty'; } else {
        echo substr($oferty[$i]['waznosc_oferty'],0,10) ; 
    echo '</font>';
    
    waznosc_oferty($oferty[$i]['id']);
      }
    } else { 
    
        echo substr($oferty[$i]['waznosc_oferty'],0,10) ; 
    }}
    ?>
    
    
    </td>    
    <td class="spady">
        <button onClick="location.href='?page=oferty&oferty_add=2&ids=<?php echo $oferty[$i]['id']; ?>'" class="btn">edytuj</button>
            <button onClick="location.href='?page=oferty&oferty_usun=1&ids=<?php echo $oferty[$i]['id']; ?>'" class="btn">usuń</button>
    </td> 
        </tr>
 <?php  }} ?>   
        </tbody>

</table>
<?php
if($_GET['oferty_usun'] == 1){
      echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_REQUEST['page'].'">'; 
    usun_oferte($_GET['ids']); 
}

?>