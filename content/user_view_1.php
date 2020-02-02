<div class="popups modal fade"  id="user_view" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="width: 85%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" id="zapisz2" style="margin-top: -10px;" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
       
      </div>
      <div class="modal-body" style="height: 730px; padding: 5px;">

<div class="pole col-lg-12" style="margin-top: 0px;">  
<div class="title-section"><div class="title"><p>Przeglądanie użytkoniwków</p></div></div> 
      <div class="modal-body" style="height: 600px; padding: 5px;">
          <table style="width: 99%; margin-left: auto; margin-right: auto;">
          <thead>
              <tr>
                  <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">lp<span id="nrKier"></span></th> 
                  <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">typ<span id="nrKier"></span></th>   
            <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">login <span id="nrKier"></span></th>
              <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">hasło <span id="nrKier"></span></th>
              <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">imię <span id="nrKier"></span></th>
              <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">nazwisko <span id="nrKier"></span></th> 
              <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">email <span id="nrKier"></span></th>
              <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">telefon <span id="nrKier"></span></th> 
             <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">adres <span id="nrKier"></span></th>
              <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">miasto (kod) <span id="nrKier"></span></th> 
             <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">uwagi <span id="nrKier"></span></th>
              <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">edytuj <span id="nrKier"></span></th></tr> 
              
          </thead>  
          <tbody>
       <?php 
       $user = sql_q('users');
       $n = count($user);
       for($i=0;$i<$n;$i++){ 
       
           ?> 
              <tr style='border:1px solid black;'> 
                  <td><?php echo $i+ 1; ?></td>
                  <td> <?php   echo typ_konta($user[$i]['type']); ?>[<?php echo $user[$i]['type']; ?>]  </td>
                   <td> <?php   echo $user[$i]['login']; ?>  </td>
                    <td> <?php   echo $user[$i]['haslo']; ?>  </td>
                     <td> <?php   echo $user[$i]['imie']; ?>  </td>
                      <td> <?php   echo $user[$i]['nazwisko']; ?>  </td>
                       <td> <?php   echo $user[$i]['email']; ?>  </td>
                        <td> <?php   echo $user[$i]['telefon']; ?>  </td>
                         <td> <?php   echo $user[$i]['adres']; ?>  </td>
                          <td> <?php   echo $user[$i]['miasto']; ?>  </td>
                           <td> <?php   echo $user[$i]['uwagi']; ?>  </td>
                           <td><button>edytuj</button> </td>
              
              </tr>             
       <?php } ?> 
          </tbody>      
             </table> 
      </div></div>
  </div>
    
</div>
  </div>
</div>