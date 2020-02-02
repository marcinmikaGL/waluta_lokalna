<?php include ('content/klient_menu.php');



if($_REQUEST['sort'] == 1){  

$typ_t = $_REQUEST['typ_t'];
$login_t = $_REQUEST['login_t'];
$imie_t = $_REQUEST['imie_t'];
$nazwisko_t = $_REQUEST['nazwisko_t'];
$email_t = $_REQUEST['email_t'];
$telefon_t = $_REQUEST['telefon_t'];
$adres_t = $_REQUEST['adres_t'];
$miasto_t = $_REQUEST['miasto_t'];
$uwagi_t = $_REQUEST['uwagi_t'];


if(!is_array($sort)) { $sort = array(sort => $_REQUEST['sort']); }



if(!empty($typ_t)){ $sort = array(sort => $_REQUEST['sort'],typ_t =>$typ_t);  }
if($sort['typ_t'] == 1){ $typ_t_s= 2;}else { $typ_t_s= 1;}
$top_typ_t = 'sort=1&typ_t='.$typ_t_s;
$top_typ_t .= '&login_t=0&imie_t=0&nazwisko_t=0&email_t=0&telefon_t=0&adres_t=0';
$top_typ_t .= '&miasto_t=0&uwagi_t=0';


if(!empty($login_t)){ $sort = array(sort => $_REQUEST['sort'],login_t =>$login_t);  }
if($sort['login_t'] == 1){ $login_t_s= 2;}else { $login_t_s= 1;}
$top_login_t = 'sort=1&typ_t=0';
$top_login_t .= '&login_t='.$login_t_s.'&imie_t=0&nazwisko_t=0&email_t=0&telefon_t=0&adres_t=0';
$top_login_t .= '&miasto_t=0&uwagi_t=0';


if(!empty($imie_t)){ $sort = array(sort => $_REQUEST['sort'],imie_t =>$imie_t);  }
if($sort['imie_t'] == 1){ $imie_t_s= 2;}else { $imie_t_s= 1;}
$top_imie_t = 'sort=1&typ_t=0';
$top_imie_t .= '&login_t=0&imie_t='.$imie_t_s.'&nazwisko_t=0&email_t=0&telefon_t=0&adres_t=0';
$top_imie_t .= '&miasto_t=0&uwagi_t=0';


if(!empty($nazwisko_t)){ $sort = array(sort => $_REQUEST['sort'],nazwisko_t =>$nazwisko_t);  }
if($sort['nazwisko_t'] == 1){ $nazwisko_t_s= 2;}else { $nazwisko_t_s= 1;}
$top_nazwisko_t = 'sort=1&typ_t=0';
$top_nazwisko_t .= '&login_t=0&imie_t=0&nazwisko_t='.$nazwisko_t_s.'&email_t=0&telefon_t=0&adres_t=0';
$top_nazwisko_t .= '&miasto_t=0&uwagi_t=0';

if(!empty($email_t)){ $sort = array(sort => $_REQUEST['sort'],email_t =>$email_t);  }
if($sort['email_t'] == 1){ $email_t_s= 2;}else { $email_t_s= 1;}
$top_email_t = 'sort=1&typ_t=0';
$top_email_t .= '&login_t=0&imie_t=0&nazwisko_t=0&email_t='.$email_t_s.'&telefon_t=0&adres_t=0';
$top_email_t .= '&miasto_t=0&uwagi_t=0';

if(!empty($telefon_t)){ $sort = array(sort => $_REQUEST['sort'],telefon_t =>$telefon_t);  }
if($sort['telefon_t'] == 1){ $telefon_t_s= 2;}else { $telefon_t_s= 1;}
$top_telefon_t = 'sort=1&typ_t=0';
$top_telefon_t .= '&login_t=0&imie_t=0&nazwisko_t=0&email_t=0&telefon_t='.$telefon_t_s.'&adres_t=0';
$top_telefon_t .= '&miasto_t=0&uwagi_t=0';



if(!empty($adres_t)){ $sort = array(sort => $_REQUEST['sort'],adres_t =>$adres_t);  }
if($sort['adres_t'] == 1){ $adres_t_s= 2;}else { $adres_t_s= 1;}
$top_adres_t = 'sort=1&typ_t=0';
$top_adres_t .= '&login_t=0&imie_t=0&nazwisko_t=0&email_t=0&telefon_t=0&adres_t='.$adres_t_s;
$top_adres_t .= '&miasto_t=0&uwagi_t=0';


if(!empty($miasto_t)){ $sort = array(sort => $_REQUEST['sort'],miasto_t =>$miasto_t);  }
if($sort['miasto_t'] == 1){ $miasto_t_s= 2;}else { $miasto_t_s= 1;}
$top_miasto_t = 'sort=1&typ_t=0';
$top_miasto_t .= '&login_t=0&imie_t=0&nazwisko_t=0&email_t=0&telefon_t=0&adres_t=0';
$top_miasto_t .= '&miasto_t='.$miasto_t_s.'&uwagi_t=0';


if(!empty($uwagi_t)){ $sort = array(sort => $_REQUEST['sort'],uwagi_t =>$uwagi_t);  }
if($sort['uwagi_t'] == 1){ $uwagi_t_s= 2;}else { $uwagi_t_s= 1;}
$top_uwagi_t = 'sort=1&typ_t=0';
$top_uwagi_t .= '&login_t=0&imie_t=0&nazwisko_t=0&email_t=0&telefon_t=0&adres_t=0';
$top_uwagi_t .= '&miasto_t=0&uwagi_t='.$uwagi_t_s;



$sort['login_top'] = $_REQUEST['login_top'];
$sort['email_top'] = $_REQUEST['email_top'];
$sort['miasto_top'] = $_REQUEST['miasto_top'];    
$sort['imie_top'] = $_REQUEST['imie_top'];
$sort['telefon_top'] = $_REQUEST['telefon_top'];
$sort['adres_top'] = $_REQUEST['adres_top'];
$sort['nazwisko_top'] = $_REQUEST['nazwisko_top'];
$sort['typ_top'] = $_REQUEST['typ_top'];


$other ='&login_top='.$_REQUEST['login_top'];
$other .='&email_top='.$_REQUEST['email_top'];
$other .='&miasto_top='.$_REQUEST['miasto_top'];    
$other .='&imie_top='.$_REQUEST['imie_top'];
$other .='&telefon_top='.$_REQUEST['telefon_top'];
$other .='&adres_top='.$_REQUEST['adres_top'];
$other .='&nazwisko_top='.$_REQUEST['nazwisko_top'];
$other .='&typ_top='.$_REQUEST['typ_top'];









    
}


     
if(!is_array($sort)) { $sort = array(sort => $_GET['sort']); }
// nr transakcji
if(!empty($sort_id)){ $sort = array(sort => $_GET['sort'],sort_id =>$sort_id);  }





   if((isset($_GET['adds']) && !empty($_GET['adds'])) && $_GET['adds'] == '1' ){
       $update_kontakt = array(
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
             update_users($update_kontakt,$_POST['ide']);
             
   $set = 1;          
             
  }


if(!empty($_GET['del'])&& !empty($_GET['ido'])){ usun_usergroup($_GET['del']); }


include('content/sort4.php');
?>



<?php if($set ==1){ 
echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">'; ?>
<div class="alert alert-success alert_top">
Zaktualizowano użytkownika. 
<button type="button" class="close" data-dismiss="alert">x</button>
</div>

<?php } ?>
<div style="margin-top: 10px;">    
<div class="pole" style="width: 99%; margin-left: auto; margin-right: auto;">  
<div class="title-section" style="float: left;"><div class="title"><p>Przeglądanie użytkowników</p></div></div> 
      <div class="spady">
          <table style="width: 99%; margin-left: auto; margin-right: auto;">
          <thead>
              <tr>
                  <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">lp<span id="nrKier"></span></th> 
 <th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_typ_t)){echo '&'.$top_typ_t; } else { ?>&sort=1&typ_t=1<?php } echo $other; ?>'">        
    typ 
    <span id="nrKier"<?php 
    if($sort['typ_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['typ_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>

 <th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_login_t)){echo '&'.$top_login_t; } else { ?>&sort=1&login_t=1<?php } echo $other; ?>'">        
    login
    <span id="nrKier"<?php 
    if($sort['login_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['login_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>
<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_imie_t)){echo '&'.$top_imie_t; } else { ?>&sort=1&imie_t=1<?php } echo $other; ?>'">        
    Imię
    <span id="nrKier"<?php 
    if($sort['imie_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['imie_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>


<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_nazwisko_t)){echo '&'.$top_nazwisko_t; } else { ?>&sort=1&nazwisko_t=1<?php } echo $other; ?>'">        
    nazwisko
    <span id="nrKier"<?php 
    if($sort['nazwisko_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['nazwisko_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>


<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_email_t)){echo '&'.$top_email_t; } else { ?>&sort=1&email_t=1<?php } echo $other; ?>'">        
    email
    <span id="nrKier"<?php 
    if($sort['email_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['email_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>


<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_telefon_t)){echo '&'.$top_telefon_t; } else { ?>&sort=1&telefon_t=1<?php } echo $other; ?>'">        
   telefon
    <span id="nrKier"<?php 
    if($sort['telefon_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['telefon_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>


<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_adres_t)){echo '&'.$top_adres_t; } else { ?>&sort=1&adres_t=1<?php } echo $other; ?>'">        
   adres
    <span id="nrKier"<?php 
    if($sort['adres_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['adres_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>


<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_miasto_t)){echo '&'.$top_miasto_t; } else { ?>&sort=1&miasto_t=1<?php } echo $other; ?>'">        
   miasto
    <span id="nrKier"<?php 
    if($sort['miasto_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['miasto_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>


<th class="spady sort" onClick="location.href='?page=<?php echo $_REQUEST['page'] ; if(!empty($top_uwagi_t)){echo '&'.$top_uwagi_t; } else { ?>&sort=1&uwagi_t=1<?php } echo $other; ?>'">        
   uwagi
    <span id="nrKier"<?php 
    if($sort['uwagi_t'] == 2){ echo 'class="glyphicon glyphicon-arrow-down"'; } 
    if($sort['uwagi_t'] == 1) { echo  'class="glyphicon glyphicon-arrow-up"'; }
    ?>>
    
    </span>
</th>


             <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer"> lista przypisanych klientów
         <span id="nrKier"></span></th> 
            <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">          historia <br> logów <span id="nrKier"></span></th> 
             <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">edytuj <span id="nrKier"></span></th></tr> 
              
          </thead>  
          <tbody>
       <?php 
       $user = sql_q('users');
       $n = count($user);
       for($i=0;$i<$n;$i++){ 
       
           ?> 
              <tr style='border:1px solid black;' class="spady"> 
                  <td><?php echo $n- $i; ?></td>
                  <td> <?php   echo typ_konta($user[$i]['type']); ?>[<?php echo $user[$i]['type']; ?>]  </td>
                   <td> <?php   echo $user[$i]['login']; ?>  </td>
  
                     <td> <?php   echo $user[$i]['imie']; ?>  </td>
                      <td> <?php   echo $user[$i]['nazwisko']; ?>  </td>
                       <td> <?php   echo $user[$i]['email']; ?>  </td>
                        <td> <?php   echo $user[$i]['telefon']; ?>  </td>
                         <td> <?php   echo $user[$i]['adres']; ?>  </td>
                          <td> <?php   echo $user[$i]['miasto']; ?>  </td>
                           <td> <?php   echo $user[$i]['uwagi']; ?>  </td>
                           <td class="spady"> <button onClick="location.href='?page=user_view&ido=<?php echo $user[$i]['id'];?>'">zobacz  przypisane konta</button> </td>
                           <td class="spady"><button onClick="location.href='?page=user_view&id=<?php echo $user[$i]['id'];?>'">zobacz  logi</button></td>
                           <td class="spady"><button onClick="location.href='?page=user_view&ide=<?php echo $user[$i]['id'];?>'">edytuj</button> <button>usuń</button> </td>
              
              </tr>             
       <?php } ?> 
          </tbody>      
             </table> 
      </div></div>
</div>

<?php
if(!empty($_GET['id'])){
include('content/users_logs.php');    
}

if(!empty($_GET['ido'])){
include('content/user_klient.php');    
}

if(!empty($_GET['ide'])){
include('content/user_edit.php');    
}

include('content/klient_footer.php');
?>