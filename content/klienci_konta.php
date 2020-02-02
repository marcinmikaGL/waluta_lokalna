<?php if($_GET['add_klient'] == 1) { ?>

  <?php
  $user_array = klienci($_GET['ido']);
  ?>
<div style="position: absolute; top:1%; left: 5%; z-index: 3000; right: 5%;">
<!-- klienci_konta.php -->
    <div class="modal-dialog" style="width: 78%;">
    <div class="modal-content">
      <div class="modal-header">
           <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onClick="location.href='?page=kli'"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body" style="height: 500px; padding: 5px;">

<div class="pole col-lg-12" style="margin-top: 0px;">  
<div class="title-section"><div class="title"><p>Użytkownicy przypisani do konta <?php echo $user_array['nazwa']; ?></p></div></div> 
      <div class="modal-body" style="height: 430px; padding: 5px;">
       <div class="containert" style="text-align: center;">
        <div class="row">
         <div class="col-md-<?php if($_SESSION['user']['type'] != 1){ ?>6<?php } else { ?>12 <?php } ?>">   
           <table style="width: 100%;">
        <thead>
            <tr class="spady">
                <th colspan="5">Lista użytkowników <br> przypisanych do konta</th>  
            </tr>
            <tr class="spady">
               
                <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">lp<span id="nrKier"></span></th> 
                 <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">typ konta<span id="nrKier"></span></th> 
                  <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">nazwa konta<span id="nrKier"></span></th>   
                  <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">data dodania<span id="nrKier"></span></th>   
                   <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">usuwanie<span id="nrKier"></span></th>   
              
              </tr>   
        <tbody>              
<?php 
            $klients_group_id = klients_group_id($_GET['ido']);
           
     $n = count($klients_group_id);
       for($i=0;$i<$n;$i++){ 
            $user_status = users($klients_group_id[$i]['user_id']);
            if($user_status['type'] != 3) { $broker = 1 ; } 
           $ni = $i + 1;
      ?> 
            <tr>
                <td><?php echo $ni; ?></td>  
                <td><?php echo typ_konta($user_status['type']); ?></td>
                <td><?php echo user($klients_group_id[$i]['user_id']);  ?></td>
                <td><?php echo $klients_group_id[$i]['timestamp'];  ?></td>
                <td class="spady"><?php if($_SESSION['user']['type'] != 1){ ?> <button onClick="location.href='?page=kli&add_klient=1&ido=<?php echo $_GET['ido']; ?>&del=<?php echo $klients_group_id[$i]['id'];?>'">usuń</button> <?php } ?> </td>
            </tr>      
      <?php     
       }
           ?>
           </tbody>     
              </table>
         </div>  
   <?php if($_SESSION['user']['type'] != 1){ ?>           
   <div class="col-md-6">         
           <div class="control-group">	

   <div class="pole" style="margin-top:-8px; height: 170px;">
 <div class="title-section"><div class="title"><p>Wybierz klienta</p></div></div>       
 <div class="spady">                  
                        <form action="?page=kli&add=4" method="post">
                            <input type="hidden" value="<?php echo $_GET['ido']; ?>" name="id"> 
                            <input type="hidden" value="<?php echo  $user_array['nip']; ?>" name="nip"> 
                            <input type="hidden" value="<?php echo  $user_array['nazwa']; ?>" name="nazwa"> 
                            <input type="hidden" value="3" name="typ"> 
                         
 <label class="control-label" for="user">wybierz użytkownika i przypisz do konta:</label>    
     <select placeholder="wybierz użytkownika" name="uzytkownik" class="testsel" required/>
     <?php 
     $user_drop = sql_q('users');
     $n = count($user_drop);
       for($i=0;$i<$n;$i++){
     if(spr_klient_group($_GET['ido'],$user_drop[$i]['id']) != $user_drop[$i]['id']){
     $user_status_drop = users($user_drop[$i]['id']);
            if($user_status_drop['type'] == 3) {  
         ?>
         <option value="<?php echo $user_drop[$i]['id']; ?>">[<?php echo $user_drop[$i]['login']; ?>] <?php echo $user_drop[$i]['imie']; ?> <?php echo $user_drop[$i]['nazwisko']; ?></option>    
       <?php  } }}?> 
     </select>
 <div style="width: 40%; float: left;" class="control-group spady">	
 <input type="submit" value="wyślij">
  </div>
                        </form>
 
 </div>
           </div>
               <?php } ?>
           </div>
      
 <?php if($broker != 1){ ?>           
            <div class="pole" style="margin-top:10px; height: 170px;">
 <form action="?page=kli&add=4" method="post">
     <input type="hidden" value="<?php echo $_GET['ido']; ?>" name="id"> 
                            <input type="hidden" value="<?php echo  $user_array['nip']; ?>" name="nip"> 
                            <input type="hidden" value="<?php echo  $user_array['nazwa']; ?>" name="nazwa"> 
                              <input type="hidden" value="2" name="typ"> 
                          
        <div class="title-section"><div class="title"><p>Wybierz brokera</p></div></div>       
 <div class="spady" style="margin-top:-10px;">  
                <div class="control-group">
  
    <label for="doradcaId">wybierz brokera i przypisz do konta</label></th><td>
    
    <select id="broker" name="uzytkownik" class="testsel">	
 <?php 
     $user_drop = sql_q('users');
     $n = count($user_drop);
       for($i=0;$i<$n;$i++){ 
         if($user_drop[$i]['type'] == 2){  
           ?>
         <option value="<?php echo $user_drop[$i]['id']; ?>">[<?php echo $user_drop[$i]['login']; ?>] <?php echo $user_drop[$i]['imie']; ?> <?php echo $user_drop[$i]['nazwisko']; ?></option>    
       <?php  } } ?> 
</select>
    </div>                

      <div style="width: 40%; float: left;" class="control-group spady">	
 <input type="submit" value="wyślij">

  </div>
 
 </div>
 </form>           
        
            </div>        
 <?php } ?>
          
          
      </div></div>
  </div>
</div>
      </div>
</div>
  </div>
</div>
</div>
    <?php  } ?>