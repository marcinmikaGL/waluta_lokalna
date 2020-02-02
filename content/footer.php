<footer>
 <span style="font-size:14px; color:red;"><strong>
   [przerwa techniczna do 7:30 ] <br>
         
         Dostęp tylko dla użytkowników z podpisanymi umowami
     <br>
 Dostęp dla użytkowników prywatnych będzie przygotowany w najbliższym czasie.
</strong>
 
 </span> <br>
 Zielony <?php echo date('Y'); ?> ver 1.4 beta 
 
</footer>
<script type="text/javascript" src="js/jRating.jquery.js"></script>

  <script src="js/chosen.jquery.js" type="text/javascript"></script>
  <script src="js/prism.js" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:false},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'nic nie znaleziono'},
      '.chosen-select-width'     : {width:"95%"}
 
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
     
  </script>
<script>
<?php if($_SESSION['user']['type'] == 1){  ?>
    
    $.each($('[id="konto_update"]').serializeArray(), function(index, value){
    $('[name="' + value.name + '"]').attr('readonly', 'readonly');
    
    
});

    $.each($('[id="pry_add"]').serializeArray(), function(index, value){
    $('[name="' + value.name + '"]').attr('readonly', 'readonly');
    
    
});



<?php } ?>   
    
    
$("[name='target']").click(function() {
 var valek =  $(this).attr('id');
 load(valek);
 
});



 $('[id="potwierdz"]').on('click',function( event ) {
event.preventDefault();   
var ilosc = $('[id="nip"]').attr('maxlength') ;
var dlugosc = $('[id="nip"]').val().length;   
if (dlugosc == ilosc) { var ok = 1; console.log("nip ok"); } else {  var error1 = 1 ; var error = 1 ; }  


var ilosc2 = $('[id="nr_konta"]').attr('maxlength') ;
var dlugosc2 = $('[id="nr_konta"]').val().length;   
if (dlugosc2 == ilosc2) { var ok = 1; console.log("nr kotna ok"); } else { var error = 1 ;  var error2 = 1 ; }  



if(error1 == 1) {
$('[id="nip"]').addClass("cyfry_spr");
var nip_error = '<strong>-nip jest nieprawidłowy musi zawierać 10 cyfr</strong><br>';
} else {  var nip_error = ''; }

if(error2 == 1) {
$('[id="nr_konta"]').addClass("cyfry_spr");
var konto_error = '<strong>-numer konta jest nieprawidłowy musi zawierać 12 cyfr</strong><br>';
} else {  var konto_error = ''; } 

if ($('[id="naz"]').val().length == 0) {
var error = 1 ;    
$('[id="naz"]').addClass("cyfry_spr");
var nazwa_error = '<strong>-pole nazwa firmy nie może być puste</strong><br>';
 
} else {
var ok = 1;    
var nazwa_error = '';
}

if ($('[id="kod1"]').val().length != 6) {
var error = 1 ;    
$('[id="kod1"]').addClass("cyfry_spr");
var kod1_error = '<strong>-kod pocztowy rejestracji działalności jest nieprawidłowy</strong><br>';
} else { var ok = 1 ; var error = ''; var kod1_error = '';   }


if ($('[id="kod2"]').val().length != 6) {
var error = 1 ;    
$('[id="kod2"]').addClass("cyfry_spr");
var kod2_error = '<strong>-kod pocztowy wykonywania działalności jest nieprawidłowy</strong><br>';
} else { var ok = 1 ; var error = ''; var kod2_error = ''; }

if(error == 1){
$('[id="alert"]').html('<span style="color:black">Komnikat o błędzie :</span> <br>' + nip_error + konto_error + nazwa_error + kod1_error + kod2_error);    
}

console.log("nazwa:"  + nazwa_error);
   console.log("ok:"  + ok);
   console.log("błąd:" + error);
if(ok == 1 && error !=1){    $("#konto_add").submit();  $("#konto_update").submit();   } 
        
        });
   
      

 function load(valek){
 $.ajax({
        type: "POST",
        url: "content/add_form.php",
        data: {
            ids: valek,
            type: 5
        },
      
        success: function(result) {

             
        
        $('#add_load'+valek).html(result); 
        },
        error: function() {
                alert( "Wystąpił błąd w połączniu :(");
        }
    });    
     
     
 }
 
 
$('[id="user_prv"]').change( function(){
$('[id="naz_prv"]').val($('[id="user_prv"] option:selected').text()); 
});
 
 $('[id="update_roz"]').click( function(){
var valek2 = $.trim($('[id="select_roz"] option:selected').text());
var valek = $.trim($('[id="select_roz"]').val());
 location.href=$.trim('?page=slownik&update=1&id='+valek+"&opis="+valek2);
    });
    
    
    

 $('[id="update_branza"]').click( function(){
var valek2 = $.trim($('[id="select_branza"] option:selected').text());
var valek = $.trim($('[id="select_branza"]').val());
 location.href=$.trim('?page=slownik&update=2&id='+valek+"&opis="+valek2);
    });    
    


 $('[id="update_biznes"]').click( function(){
var valek2 = $.trim($('[id="select_biznes"] option:selected').text());
var valek = $.trim($('[id="select_biznes"]').val());
 location.href=$.trim('?page=slownik&update=3&id='+valek+"&opis="+valek2);
    });    
    

 
    
$("[name='target']").click(function() {
 var valek =  $(this).attr('id');
 load(valek);
 
});

            $('[id="telefony_ile"]').change(function(){  
                var ai =  $(this).val(); 
   if (ai > 1) { document.getElementById("kontakt1").style.display="block"; } else { document.getElementById("kontakt1").style.display="none"; }
   if (ai > 2) { document.getElementById("kontakt2").style.display="block"; } else { document.getElementById("kontakt2").style.display="none"; }
   if (ai > 3) { document.getElementById("kontakt3").style.display="block"; } else { document.getElementById("kontakt3").style.display="none"; }
   if (ai > 4) { document.getElementById("kontakt4").style.display="block"; } else { document.getElementById("kontakt4").style.display="none"; }
    });  
$('#autocomplete').autocomplete({
    serviceUrl: '/autocomplete/countries',
    onSelect: function (suggestion) {
        alert('You selected: ' + suggestion.value + ', ' + suggestion.data);
    }
});
</script>    
</body>
</html>
      
<?php 
//SELECT e.id , e.tytul,e.kwota,e.user_id , e.klient_a , CONCAT(a.nazwa) AS 'nazwa_a', CONCAT(a.nip) AS 'nip_a' , CONCAT(a.nr_karty) AS 'nr_karty'   FROM tranzakcje e 
//LEFT JOIN klienci a  ON  e.klient_a = a.id   

?>