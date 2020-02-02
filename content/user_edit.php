<div style="top:0.1%; position: absolute;  left:10%; right: 10%;">
<!-- user_edit.php -->
    <div class="modal-dialog" style="width: 55%;">
    <div class="modal-content">
      <div class="modal-header">
         <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onClick="location.href='?page=user_view'"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body" style="height: 810px; padding: 5px;">

<div class="pole col-lg-12" style="margin-top: 0px;">  
    <div class="title-section"><div class="title"><p>Edycja użytkownika  [<strong style="color:#dca7a7;"><?php echo user($_GET['ide']) ;?></strong>]</p></div></div> 
      <div class="modal-body" style="height: 740px; padding: 5px;">

   
 <?php include('content/user_add_form.php'); ?>          
           
           


          
          
      </div></div>
  </div>
    
</div>
  </div>
</div>