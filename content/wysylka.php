<?php 
if($_GET['edit'] == 1){
   komunikat_udate(1,$_POST['opis']);

    
}

if($_GET['edit'] == 2){
   komunikat_udate(2,$_POST['opis']);
}


if($_GET['edit'] == 3){
    komunikat_udate(3,$_POST['opis']);
}

?>
<div style="margin-top: 0px; width: 99.5%; margin-left: auto; margin-right: auto;">  
<div  style="margin-top: 0px;">   
<div class="spady row" style="margin-bottom: 30px; margin-left: 0px; margin-right: 0px;">
<div class="pole col-md-4" style="padding-bottom: 10px; width: 32%; margin-right: 1%;">
<div class="title-section"><div class="title"><p>Komunikat o dokonaniu transakcji</p></div></div>
<form action="index.php?page=<?php echo $_GET['page']; ?>&edit=1" method="post">    
<div class="spady control-group">  
          <textarea name="opis" rows="14" maxlength="255" class="edytor pole" style="width:99%;"><?php $kom = komunikat(1);  echo $kom['opis']; ?></textarea>
      </div>
        <div class="spady control-group" >
            <input type="submit" style="width: 20%; float: left;" value="zmień">   
            
        </div>    
    </form>
</div>
    
<div class="pole col-md-4" style="padding-bottom: 10px; width: 32%; margin-right: 1%;">
<div class="title-section"><div class="title"><p>Komunikat o wygaśnięciu konta</p></div></div>
    
    
    <form action="index.php?page=<?php echo $_GET['page']; ?>&edit=2"  method="post">
<div class="spady control-group">  
          <textarea name="opis" rows="14" maxlength="255" class="edytor pole" style="width:99%;"><?php $kom = komunikat(2);  echo $kom['opis']; ?></textarea>
      </div>
    <div class="spady control-group">
            <input type="submit" style="width: 20%; float: left;" value="zmień">   
            
        </div>
    </form>
</div>
    
  <div class="pole col-md-4" style="padding-bottom: 10px; width: 32%; margin-right: 1%;">
<div class="title-section"><div class="title"><p>Komunikat o wygaśnięciu debetu</p></div></div>
   <form action="index.php?page=<?php echo $_GET['page']; ?>&edit=3"  method="post">     
<div class="spady control-group">  
          <textarea name="opis" rows="14" maxlength="255" class="edytor pole" style="width:99%;"><?php $kom = komunikat(3);  echo $kom['opis']; ?></textarea>
      </div>
    <div class="spady control-group">
            <input type="submit" style="width: 20%; float: left;" value="zmień">   
            
        </div>
   </form>
</div>
    
</div>   
</div>   
</div>