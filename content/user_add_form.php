<!-- user_add_form.php -->
<form class="add_user" id="user_add" <?php if(!empty($_GET['ide'])){ echo 'action="?page=user_view&adds=1"'; } else { ?> action="?page=kli&add=1" <?php } ?> method="post"> 
    <input type="hidden" name="ide" value="<?php echo $_GET['ide']; ?>">
    <div class=" spady control-group">
     <?php $user_form = users($_GET['ide']) ; ?>
	
   
 <label class="control-label" for="user">typ użytkownika<sup>*</sup>:</label>    
     <select placeholder="typ użytkownika" name="user" class="testsel">
         <option <?php if(!empty($_GET['ide']) && $user_form['type'] == 0){ ?>  selected="selected"  <?php } ?>  value="0">admin</option>    
         <option <?php if(!empty($_GET['ide']) && $user_form['type'] == 1){ ?>  selected="selected"  <?php } ?> value="1">rada</option> 
         <option <?php if(!empty($_GET['ide']) && $user_form['type'] == 2){ ?>  selected="selected"  <?php } ?> value="2">broker</option>
         <option <?php if(!empty($_GET['ide']) && $user_form['type'] == 3){ ?>  selected="selected"  <?php } ?> value="3">klient</option>  
     </select>

 </div>    
	  <div class="spady control-group">
					<label class="control-label" for="login">Login<sup>*</sup>:</label>
					
                                        <input <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['login']; ?>" <?php } ?> style="width: 39%;" type="text" id="login" name="loginy" placeholder="login" required/>
                                          <div style="float: right; width: 53%;">
					<label style="margin-top: 5px;" class="control-label" for="haslo">Hasło<sup>*</sup>:</label>
					  <input <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['haslo']; ?>" <?php } ?> style="width: 83%; float: right;" type="password" id="haslo" name="hasloy" placeholder="hasło" required/>
                                          </div>
                        </div>	     

 <div class="spady control-group">
					<label class="control-label" for="imie">Imię:</label>
					
					  <input <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['imie']; ?>" <?php } ?> style="width: 39%;" type="text" id="imie" name="imie" placeholder="imię">
                <div style="float: right; width: 55%;">
					<label style="margin-top: 5px;" class="control-label" for="nazwisko">Nazwisko:</label>
					
					  <input <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['nazwisko']; ?>" <?php } ?> style="width: 80%; float: right;" type="text" id="nazwisko" name="nazwisko" placeholder="nazwisko">
                </div>
                </div>
 <div class="spady control-group">
<label class="control-label" for="telefon">Telefon:</label>
<input style="width: 100%;" <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['telefon']; ?>" <?php } ?>  onkeypress="return cyfry(this, event)" type="text" id="telefon" name="telefon" placeholder="telefon">
 </div>
 <div class="spady control-group">
<label class="control-label" for="email">Email:</label>
<input <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['email']; ?>" <?php } ?> style="width: 100%;" type="email" id="email" name="email" placeholder="email">
 </div>

 <div class="spady control-group">
<label class="control-label" for="adres">Adres:</label>
<input <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['adres']; ?>" <?php } ?> style="width: 100%;" type="text" id="adres" name="adres" placeholder="adres">
 </div>
<div class="spady control-group">
					<label class="control-label" for="kod">kod pocztowy<sup>*</sup>:</label>
					
					  <input <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['kod']; ?>" <?php } ?> style="width: 24%;" type="text" id="kod" name="kod" placeholder="kod pocztowy" required/>
                <div style="float: right; width: 53%;">
					<label style="margin-top: 5px;" class="control-label" for="miasto">Miasto:</label>
					
			
                                       <input <?php if(!empty($_GET['ide'])){ ?> value="<?php echo $user_form['miasto']; ?>" <?php } ?> style="width: 83%; float: right;" type="text" id="miasto" name="miasto" placeholder="miasto">
                </div>  
                </div>

<div class="spady control-group">
    <label class="control-label" for="notatka">Notatka:</label>
    <textarea name="uwagi" id="notatka" style="width: 100%; height: 200px;" placeholder="Notatka"><?php if(!empty($_GET['ide'])){  echo $user_form['uwagi'];  } ?></textarea>     
</div> 
<div class="spady control-group" style="height: 50px; padding: 5px;">
<?php if(!empty($_GET['ide'])){ ?>      
    <input value="zmień" style="width: 20%;" class="btn" type="submit"> 

<?php } else {  ?>
<button  id="klient_add" class="btn" name="dodaj">dodaj</button>
<?php } ?>
<span style="float: right; margin-top:8px;"><strong style="color:red;">*</strong>- pola oznaczone czerwoną gwiazdką są obowiązkowe</span>
                                        </div>    
    
</form>