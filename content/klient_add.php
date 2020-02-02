

<!-- klient_add.php -->
<?php if($_SESSION['user']['type'] == 0){ ?>
<div style="position: absolute; top:-1px; left: 1%; right: 1%; z-index: 1000;">
  
    <div class="modal-dialog" style="width: 98%;">
   <div id="add_load">
       
<?php 

include('content/add_form.php'); ?>
   </div>      
  </div>
  </div>
<?php } else { include_once('./content/under.php');  } ?>
