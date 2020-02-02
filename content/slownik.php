<?php if($_SESSION['user']['type'] == 0){ 
$poziom_rozliczen = sql_q('poziom_rozliczen');
$branza = sql_q('branze');
$typ_biz = sql_q('typ_biznesu');



if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '1'){ 
 echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';               

$sr = search_array($poziom_rozliczen,'poziom',$_POST['poziom'].'%');
if($sr[0]['id'] > 0) { $error = 1;}  
  
        
        
   if($error !=1){  

add_poziom($_POST['poziom'].'%');
?>    

<div class="alert alert-success alert_top">
Dodano poziom rozliczeń do słownika.  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>
<?php } else  { ?>

<div class="alert alert-danger alert_top">
Poziom  <?php echo $_POST['poziom'].'%'; ?> już istnieje wybierz inny .  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>    
        
<?php  } }
    


if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '2'){ 
 echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';               

$sr = search_array($branza,'nazwa',$_POST['branze']);
if($sr[0]['id'] > 0) { $error = 1;}  
  
        
        
   if($error !=1){  
add_brana($_POST['branze']);
?>    

<div class="alert alert-success alert_top">
Dodano branże do słownika.  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>
<?php } else  { ?>

<div class="alert alert-danger alert_top">
Branża o nazwie: <?php echo $_POST['branze']; ?> już istnieje wybierz inną .  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>    
        
<?php         
    }

   }



if((isset($_GET['add']) && !empty($_GET['add'])) && $_GET['add'] == '3'){ 
 echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';               

$sr = search_array($typ_biz,'nazwa',$_POST['typ_biznesu']);
if($sr[0]['id'] > 0) { $error = 1;}  
  
        
        
   if($error !=1){  
add_typ_biznesu($_POST['typ_biznesu']);
?>    

<div class="alert alert-success alert_top">
Dodano typ biznesu do słownika.  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>
<?php } else  { ?>

<div class="alert alert-danger alert_top">
typ biznesu: <?php echo $_POST['typ_biznesu']; ?> już istnieje wybierz inną .  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>    
        
<?php         
    }

   }
   

if((isset($_GET['update_r']) && !empty($_GET['update_r'])) && $_GET['update_r'] == '1'){ 
 echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';               

 update_poziom($_GET['id'],$_GET['poziom'].'%');
?>    

<div class="alert alert-success alert_top">
Zaktualizowano poziom rozliczeń w słowniku.  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>
<?php }
  


if((isset($_GET['update_r']) && !empty($_GET['update_r'])) && $_GET['update_r'] == '2'){ 
 echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';               

 update_branze($_GET['id'],$_GET['branze']);
?>    

<div class="alert alert-success alert_top">
Zaktualizowano branże w słowniku.  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>
<?php }


if((isset($_GET['update_r']) && !empty($_GET['update_r'])) && $_GET['update_r'] == '3'){ 
echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">';               

 update_biznes($_GET['id'],$_GET['biznes']);
?>    

<div class="alert alert-success alert_top">
Zaktualizowano typ biznesu w słowniku.  
<button type="button" class="close" data-dismiss="alert">x</button>
</div>
<?php }

  
?>

<div class="pole" style="width: 75%; margin-left: auto; margin-right: auto;">
 <div class="title-section"><div class="title"><p>Słownik</p></div></div>  
    <div class="row" style="margin: 0; padding-bottom: 30px;">
    
  <div class="col-md-4">
  <div class="pole spady">    
 <div class="title-section"><div class="title"><p>Poziom rozliczeń</p></div></div>        
 <form method="post" action="?page=slownik&add=1">
 <div class="control-group">
    <span style="margin-bottom:10px;"> 
        <select name="poziom_rozliczen" id="select_roz" style="width: 60%; float: left;" class="testsel">

 <?php
        
       
     $n = count($poziom_rozliczen);
     
       for($i=0;$i<$n;$i++){ ?>
     <option value="<?php echo $poziom_rozliczen[$i]['id']; ?>"> 
          <?php echo $poziom_rozliczen[$i]['poziom']; ?>
     </option>
         
          
          
       <?php }?>

        </select>
 <span class="btn" id="update_roz" style="width: 20%; cursor: pointer; padding: 6px; position: relative; z-index: 1000; margin-top:-40px; float: right;"> zmień </span>
  
    </span>

 </div>
   <div class="control-group">  
     <label class="control-label" for="user">Poziom rozliczeń</label>  
     <div class="input-group"> 
    <input class="form-control" maxlength="5" onkeypress="return cyfry2(this, event)" id="nazwa" placeholder="poziom rozliczeń" name="poziom" type="text">
   <span class="input-group-addon">%</span>
     </div>
   </div>  
<div class="control-group">
     <input style="width: 15%;" type="submit" value="dodaj" class="btn">
    </div>
 </form> 
 </div>      
     </div>

 
 
  <div class="col-md-4">
      <div class="pole spady"> 
<div class="title-section"><div class="title"><p>Branże</p></div></div>
<form method="post" action="?page=slownik&add=2"> 
<div class="control-group">
    <span style="margin-bottom:10px;">     
     
 <select name="branze_drop" id="select_branza"  style="width: 60%; float: left;" class="testsel">
 
 
 <?php
        
       
     $n = count($branza);
     
       for($i=0;$i<$n;$i++){ ?>
     <option value="<?php echo $branza[$i]['id']; ?>"> 
          <?php echo $branza[$i]['nazwa']; ?>
     </option>
         
          
          
       <?php }?>    
 
 
 </select>
 <span class="btn" id="update_branza" style="width: 20%; cursor: pointer; padding: 6px; position: relative; z-index: 1000; margin-top:-40px; float: right;"> zmień </span>
    </span>
 </div>   
 <div class="control-group">
   <label class="control-label" for="user">Branże</label>     
           <input maxlength="255" id="nazwa" placeholder="branża" name="branze" type="text">
           
     </div>
    <div class="control-group">
     <input style="width: 15%;" type="submit" value="dodaj" class="btn">
    </div>
</form>
    </div>
  </div>

  
  <div class="col-md-4">
  <div class="pole spady">    
 <div class="title-section"><div class="title"><p>Typ biznesu</p></div></div>    
<form method="post" action="?page=slownik&add=3">     
 <div class="control-group">
    <span style="margin-bottom:10px;">     
     
 <select name="biznes" id="select_biznes" style="width: 60%; float: left;" class="testsel">
 
 
 <?php
        
       
     $n = count($typ_biz);
     
       for($i=0;$i<$n;$i++){ ?>
     <option value="<?php echo $typ_biz[$i]['id']; ?>"> 
          <?php echo $typ_biz[$i]['nazwa']; ?>
     </option>
         
          
          
       <?php }?>
 
 
 </select>
 <span class="btn" id="update_biznes" style="width: 20%; cursor: pointer; padding: 6px; position: relative; z-index: 1000; margin-top:-40px; float: right;"> zmień </span>
   </span>
 </div>   
 <div class="control-group">
    <label class="control-label" for="user">typ biznesu</label>    
           <input maxlength="255" id="nazwa" placeholder="typ biznesu" name="typ_biznesu" type="text">
           
     </div>
    <div class="control-group">
     <input style="width: 15%;" type="submit" value="dodaj" class="btn">
    </div> 
</form> 
    </div>
</div>

    </div>
</div>



<?php 
if($_GET['update'] == 1){
include_once('./content/update_rozlicznia.php');

}
if($_GET['update'] == 2){
include_once('./content/update_branze.php');
}



if($_GET['update'] == 3){
include_once('./content/update_biznes.php');
}

       } else { include_once('./content/under.php');  } ?>
