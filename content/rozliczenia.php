<div class="container">

<div class="pole" style="width: 100%;">
 <div class="title-section"><div class="title"><p> Rozliczenia</p></div></div> 
 
<head>


</head>
<?php $n = count($logi); 

for($i=0;$i<$n;$i++){
    $in = $i+1;  ?>

<?php } ?>



<body>
<?php $logi = sql_q('users_logs'); ?>
<table class="table table-hover">
 </thead>
 <thead>
    <tr>
                  <th  id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer">lp<span id="nrKier"></span></th> 
                  <th  id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer">miniatura zdjęcia<span id="nrKier"></span></th>   
            <th  id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">temat<span id="nrKier"></span></th>
                         <th  id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer">oferty <span id="nrKier"></span></th>
                         <th id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer">branża <span id="nrKier"></span></th>
              <th id="nrSort" class="sort" onclick="changeSort('nr',1)" title="Sortowanie po: numer">użytkownik <span id="nrKier"></span></th> 
              <th  id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer">klient <span id="nrKier"></span></th> 
              <th id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer"> zapotrzebowanie<span id="nrKier"></span></th> 
              <th  id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer">data publikacji <span id="nrKier"></span></th> 
             <th id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer">data wygaśnięcia zapotrzebowania <span id="nrKier"></span></th>
              <th id="nrSort" class="spady" onclick="changeSort('nr',1)" title="Sortowanie po: numer">poziom rozliczeń<span id="nrKier"></span></th> 
                      
    </thead>    
          <tbody>
        <tr style='border:1px solid black;' class="spady"> <tr>
            
          <td scope="row"><?php echo $in ;?></td> 
          <td class="spady"><button onClick="location.href='?page=user_view&id=6'">zobacz </button></td>
   <td class="spady"><?php echo $logi[$i]['temat']; ?></td>
   <td class="spady"><?php echo $logi[$i]['oferta_id']; ?></td>
   <td class="spady"><?php echo $logi[$i]['branza_id']; ?></td>
   <td class="spady"><?php echo $logi[$i]['uzytkownik_id']; ?></td>
   <td class="spady"><?php echo $logi[$i]['klient_id']; ?></td>
   <td class="spady"><?php echo $logi[$i]['zapotrzebowanie']; ?></td>
   <td class="spady"><?php echo $logi[$i]['Data publikacji']; ?></td>
   <td class="spady"><?php echo $logi[$i]['data wygasniecia zapotrzebowania']; ?></td>
<td><?php echo $logi[$i]['poziom rozliczen']; ?></td>   
    
          </tbody>      
             </table>
			 </body>
</html>
