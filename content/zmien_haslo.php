<div class="pole" style="margin-left:auto; margin-right:auto; width:98%">
<div class="title-section"><div class="title"><p>Zmień hasło</p></div></div>
 <div id="container spady">
<?php
if($_POST['haslo1'] == $_POST['haslo2'] && $_GET['add'] == 1){
$ok = 1 ;    
  haslo($_POST['haslo1']);  
} else {
 if($_GET['add'] == 1)  { $error = 1;  }
}

?>
     
 <?php if ($ok == 1){ 
     echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">'; ?>
<div class="row spady" style="margin:20px;">     
<div class="alert alert-success alert_top">
Hasło zostało zmienione.  <?php echo $error ; ?>
<button type="button" class="close" data-dismiss="alert">x</button>
</div>
 <?php } 
 
  if ($error == 1){ echo '<META HTTP-EQUIV="refresh" CONTENT="1; URL=?page='.$_GET['page'].'">'; ?>
<div class="alert alert-danger alert_top" style="margin:20px;">
Hasła nie zgadzają się.  <?php echo $error ; ?>
<button type="button" class="close" data-dismiss="alert">x</button>
</div>
 <?php } ?>  
</div>    

    <div class="spady row">
        <div class="col-md-2">    
<form id="form1" name="form1" method="post" action="index.php?page=haslo&add=1"> 
  <div class="control-group">        
                 <label class="control-label" for="nazwa_konta">hasło<sup>*</sup>:</label>    
  <input type="password" placeholder="hasło" name="haslo1" id="tresc" >
   
  </div>
    <div class="control-group">        
                 <label class="control-label" for="nazwa_konta">powtórz hasło<sup>*</sup>:</label> 
   <input type="password" placeholder="powtórz hasło" name="haslo2" id="tresc"> 
    </div>
   <div class="control-group">        
           
        <input type="submit" class="btn" value="zmień">
   </div>       
        </form>
        </div>

    </div>
</div>
</div>
  
