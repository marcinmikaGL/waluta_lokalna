<div style="position: absolute; top:1%; left: 10%; right: 10%; z-index: 1000;">
<div class="modal-dialog" style="width: 85%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" onClick="location.href='?page=user_view'" style="float: right; margin-top: -7px;"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body" style="height: 730px; padding: 5px;">

<div class="pole col-lg-12" style="margin-top: 0px; overflow-y: scroll;">  
<div class="title-section"><div class="title"><p>Logi</p></div></div> 
      <div class="modal-body" style="height: 600px; padding: 5px;">
    
          
<?php $logi = users_logs($_GET['id']); ?>
<table class="table table-hover">
 <thead>
        <tr>
          <th width="60">lp</th>
          <th width="333">Data zdarzenia</th>
          <th width="294">Użytkownik</th>
          <th width="120">Klient</th>
          <th width="120"> Opis zdarzenia</th>
          <th width="120"> Nr IP</th>
          
        </tr>
      </thead>
      <tbody>
         <?php $n = count($logi);

for($i=0;$i<$n;$i++){
$in = $i+1; ?>
        <tr>
            
          <th scope="row"><?php echo $in ;?></th>
          <td><?php echo $logi[$i]['time']; ?></td>
          <td><?php echo $logi[$i]['user_id']; ?></td>
          <td><?php echo $logi[$i]['id_zdarzenia']; ?></td>
          <td><?php echo $logi[$i]['zdarzenie']; ?></td>
          <td><?php echo $logi[$i]['ip']; ?></td>
  
        </tr>
<?php } ?>
      </tbody>
    </table>

          
          
      </div></div>
  </div>
    
</div>
  </div>
</div>
