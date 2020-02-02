<div style="position: absolute; top:10%; left: 10%; right: 10%; z-index: 2000;">

<div class="modal-dialog" style="width: 85%;">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn" style="margin-left: 97%; margin-top: -10px; margin-bottom: -10px;" onclick="location.href='?page=tranzakcje&ref_w=<?php echo $_GET['ref_w']; ?>'"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>

      </div>
      <div class="modal-body" style="height: 390px; padding: 5px;">

      <div class="modal-body" style="height: 355px; padding: 5px;">
   <?php
   $tranzacje = tranzakcje_referencje($_GET['idt']);
   $klient = klienci($tranzacje['klient_b']);

   ?>
    <div class="row" style="">
   <div class="col-md-12">
    <div class="pole" style="height:350px;">
    <div class="title-section"><div class="title"><p>Wystaw referencje</p></div></div>
    <div class="spady" style="margin-top:-10px;">
        Nazwa odbiorcy : <strong><?php echo $klient['nazwa'];  ?></strong> <br>
        Numer konta : <strong><?php echo $klient['nr_umowy'];  ?></strong> <br>
        numer transakcji : <strong> <?php echo $_GET['idt']; ?> </strong>  <br>
            tytuł transakcjci : <strong> <?php echo  substr($tranzacje['tytul'],0,20); ?> </strong> <br>
        przyjął : <strong><?php echo $tranzacje['kwota']; ?></strong>  <br>
            <form action="index.php?page=tranzacje&referencje=1&ref_w=<?php echo $_GET['ref_w']; ?>">

<div class="control-group">
<label class="control-label" for="nr umowy">Komentarz:</label>
<textarea id="referencja" rows="5" style="width: 100%;" name="referecja"><?php if($_GET['ref_w']==1){ echo $tranzacje['referencje'] ; } ?></textarea>
</div>
</form>
  <div class="control-group">
    <div style="float: right;" class="exemple8" data-average="0" data-id="4"></div>
    <font color="red" id="kom" style="margin-left:70%;"> oceń odbiorcę -> </font>
        <button class="btn" id="ref" style="float: left; display:none; width: 20%;"> dodaj </button>


                </div>

</div>

<!-- JS to add -->
<script type="text/javascript">
  $(document).ready(function(){
    $(".exemple8").jRating({
	  step:true,
	  length : 5,
          showRateInfo:false,
	  canRateAgain : true ,
	  nbRates : 99999,
       onClick : function(element,rate){
    $('[id="ref"]').show();
    $('[id="kom"]').hide();
    var ref = $('[id="referencja"]').val();
  $('[id="ref"]').click(function(){ window.location = 'index.php?page=tranzakcje&idt=<?php echo $_GET['idt'];?>&rate='+ rate+ '&opis=' + ref ; });
    }
	});


    });


</script>

<?php $_GET['id']; ?>




    </div>
    </div>

    </div>
    </div>
</div>



      </div></div>
  </div>
