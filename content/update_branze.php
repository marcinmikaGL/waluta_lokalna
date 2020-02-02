<div style="position: absolute; top:10%; left: 10%; right: 10%">

<div class="modal-dialog" style="width: 15%;">
    <div class="modal-content">
      <div class="modal-header">
        <button style="float: right; margin-top:-11px; " type="button" onClick="location.href='?page=slownik'"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body" style="height: 205px; padding: 5px;">

<div class="pole col-lg-12" style="margin-top: 0px;">  
<div class="title-section"><div class="title"><p>Poziom rozliczeń</p></div></div> 
      <div class="modal-body" style="height: 140px; padding: 5px;">
          <div class="control-group" style="text-align: center; margin-top:-15px;">
              Stara branża:  <font color="red"><?php echo $_GET['opis']; ?> </font>     
              
              
          </div>
          <form action="index.php?page=slownik" action="get">         
              <input type="hidden" value="slownik" name="page">
               <input type="hidden" value="2" name="update_r">
              <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id">
                  
<div class="control-group">
<label class="control-label" for="nr umowy">Nowa branża:<sup>*</sup></label>
<div class="input-group"> 
    <input id="nazwa" placeholder="braża" name="branze" type="text">
   
     </div>
 </div>

<div class="control-group" style="margin-top:25px;">
    <input type="submit" value="zmień">   
    

</div>
          
          
    </form>          
          
      </div></div>
  </div>
    
</div>
  </div>
</div>