 <section>
 <?php       
 if(isset($_POST['phone']) && !empty($_POST['phone']) || isset($_POST['email']) && !empty($_POST['email'])  ){    
       
       
  ?>     
       
  <div class="ctn">
		<div class="row-fluid">
		  		  <div class="span12">
            <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
              <?php echo readFromXML('msg','menu','pl')['info2'][$_SESSION['user']['jezyk']];?>
        </div>
                <form class="form-horizontal" method="post" action="?page=new_contact">
        <input type="hidden" value="2" name="pm" />
        <input type="hidden" value="" name="countPhones" id="countPhones" />
                    <table width="99%" style="margin-top: 30px;">
        <tr><td colspan="3">
                <div class="control-group">
                    <label class="control-label" for="inputMemo">Wazna Notatka</label>
                    <div class="controls">
                        <input type="text" id="inputMemo" name="memo" style="width:100%;" value="" placeholder="Wazna Notatka">
                    </div>
                </div>
            </td>
        </tr>
        <tr><td width="450">
<div class="pole">
<div class="title-section"><div class="title"><p>Dodaj Nowy Kontakt</p></div></div>
     
                <div class="control-group">
                    <label class="control-label" for="inputType">Typ</label>
                    <div class="controls">
                        <select name="type">
                            <option value="0">kontakt</option>                            <option value="1">potencjalny klient</option>                            <option value="2">klient</option>                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputCountry">Typ Biznesu</label>
                    <div class="controls">
                          
                        <select name="businessType" id="businessType">

                             
                                
                                                                    <option value="0"  selected>test-A</option>
                                                                    <option value="1" >test-b</option>
                                                                    <option value="2" >test-c</option>
                                                                    <option value="3" >malina</option>
                                                                    <option value="4" >niedowiarek</option>
                                                                    <option value="5" >miki</option>
                                                                    <option value="6" >sprytny sposob</option>
                                                                    <option value="7" >serek</option>
                                                                    <option value="8" >topiony</option>
                                                                                        <option value="-1">Inny</option>
                        </select>
                    </div>
                </div>
                <div class="control-group" id="control-othersB"  style="display:none;">
                    <label class="control-label" for="inputothersB"></label>
                    <div class="controls">
                        <input id="inputothersB" name="othersB" placeholder="Typ Biznesu">                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputCardNo">Numer Karty</label>
                    <div class="controls">
                        <input type="text" id="inputCardNo" name="cardno" value="" placeholder="Numer Karty">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputName">nazwa firmy</label>
                    
                    
                    <div class="controls">
                        <input type="text" id="inputName" name="name" value="<?php echo $_POST['name']; ?>" placeholder="nazwa firmy">
                    </div>
                </div>
  
</div>                
<div class="pole">
                <div class="title-section"><div class="title"><p>Siedziba Firmy</p></div></div>

                <div class="control-group">
                    <label class="control-label" for="inputAddress2">Adres  1</label>
                    <div class="controls">
                        <input id="inputAddress1" type="text" name="address1" value="" placeholder="Adres " />
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputAddress2">Adres  2</label>
                    <div class="controls">
                        <input id="inputAddress2" type="text" name="address2" value="" placeholder="Adres " />
                        &nbsp;<button type="button" class="btn" name="btnCopyAddress" id="btnCopyAddress">Kopiuj<i class="icon-chevron-right"></i></button>

                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputCity">Miasto</label>
                    <div class="controls">
                        <input type="text" id="inputCity" name="city" value="" placeholder="Miasto">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputZip">Kod Pocztowy</label>
                    <div class="controls">
                        <input type="text" id="inputZip" name="zip" value="" placeholder="Kod Pocztowy">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputCountry">kraj</label>
                    <div class="controls">
                        <select name="country">
                                                                                                <option value="3">Polska, Polski czas standard, +1, +48</option>
                                                                                                                                <option value="4">Rosja, 39, +2, +7</option>
                                                                                                                                <option value="1">USA, CST, -6, +1</option>
                                                                                                                                <option value="2">USA, PST, -8, +1</option>
                                                                                    </select>
                    </div>
                </div>
</div>
<div class="pole">                
                <div class="title-section"><div class="title"><p>Elektroniczne kontakty</p></div></div>

                <div class="control-group">
                    <label class="control-label" for="inputPhone">telefon 1</label>
                    <div class="controls">
                        <input type="text" id="inputPhone" name="phone" value="<?php echo $_POST['phone']; ?>" placeholder="telefon">
                        <select name="typePhone1" style="width:131px;">
                            <option value="0">Telefon stacjonarny</option>
                            <option value="1">Bezposredni</option>
                            <option value="2">Firmowa Komorka</option>
                            <option value="3">Komorka Personalna</option>
                            
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPhone2">telefon 2</label>
                    <div class="controls">
                        <input type="text" id="inputPhone2" name="phone2" value="" placeholder="telefon">
                        <select name="typePhone2" style="width:131px;">
                            <option value="0">Telefon stacjonarny</option>
                            <option value="1">Bezposredni</option>
                            <option value="2">Firmowa Komorka</option>
                            <option value="3">Komorka Personalna</option>
                            
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPhone2">telefon 3</label>
                    <div class="controls">
                        <input type="text" id="inputPhone2" name="phone3" value="" placeholder="telefon">
                        <select name="typePhone3" style="width:131px;">
                            <option value="0">Telefon stacjonarny</option>
                            <option value="1">Bezposredni</option>
                            <option value="2">Firmowa Komorka</option>
                            <option value="3">Komorka Personalna</option>
                            
                        </select>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <button type="button" class="btn btn-small" id="btnAddPhones" name="btnAddPhones">+ Wiecej</button>
                    </div>
                </div>
                <div id="additionalPhones" style="display:none;">
                    <div id="onlyPhones">

                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <button type="button" class="btn btn-small" id="btnMorePhones" name="btnMorePhones">+ Wiecej</button>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputFax">telefony</label>
                    <div class="controls">
                        <input type="text" id="inputPhoneBase" name="phoneBase" class="input-small" value="" placeholder="Podstawa">
                        <input type="text" id="inputPhoneBase" name="phonePart1" class="input-small" value="" placeholder="Od">
                        <input type="text" id="inputPhoneBase" name="phonePart2" class="input-small" value="" placeholder="Do">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputFax">Fax</label>
                    <div class="controls">
                        <input type="text" id="inputFax" name="fax" value="" placeholder="Fax">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail">e-mail </label>
                    <div class="controls">
                        <input type="text" id="inputEmail" name="email" value="<?php echo $_POST['email']; ?>" placeholder="e-mail ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail2">e-mail </label>
                    <div class="controls">
                        <input type="text" id="inputEmail2" name="email2" value="" placeholder="">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputEmail3">e-mail </label>
                    <div class="controls">
                        <input type="text" id="inputEmail3" name="email3" value="" placeholder="">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputWebsite">Website</label>
                    <div class="controls">
                        <input type="text" id="inputWebsite" name="website" value="" placeholder="Website">
                    </div>
                </div>
</div>
<div class="pole">                
                <div class="title-section"><div class="title"><p>Osoba Kontaktowa</p></div></div>

                <div class="control-group">
                    <label class="control-label" for="inputFirstName">imię</label>
                    <div class="controls">
                        <input type="text" id="inputFirstName" style="width:150px;" name="firstName" value="" placeholder="imię">
                        &nbsp;<input type="text" id="inputSecondName" style="width:150px;" name="secondName" value="" placeholder="Drugie Imię ">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputLastName">Nazwisko</label>
                    <div class="controls">
                        <input type="text" id="inputLastName" name="lastName" value="" placeholder="Nazwisko">
                        <input type="text" id="inputBirthDate" class="datepicker" name="birthc" style="width:100px;" value="" placeholder="Urodziny">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label" for="inputPosition">Stanowisko</label>
                    <div class="controls">
                        <input type="text" id="inputPosition" name="position" value="" placeholder="Stanowisko">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputPhoneC">telefon</label>
                    <div class="controls">
                        <input type="text" id="inputPhoneC" name="phonec" value="" placeholder="telefon">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputEmailc">e-mail </label>
                    <div class="controls">
                        <input type="text" id="inputEmailc" name="emailc" value="" placeholder="">
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label" for="inputIM">Chat</label>
                    <div class="controls">
                        <input type="text" id="inputIM" name="im" value="" placeholder="Chat">
                        <select name="im_type" style="width:80px;">
                            <option value="0">Skype</option>
                            <option value="1">ICQ</option>
                            <option value="2">Yahoo</option>
                        </select>
                    </div>
                </div>
</div>
                
                
                
                
                
                
                
            </td><td width="10">&nbsp;</td>
            <td width="700" valign="top">
                <!-- 2nd column -->
                <div style="width: 100%; height: 335px;">                
<div class="pole" style="float: left; width: 49%;">
                <div class="title-section"><div class="title"><p>Informacje&nbsp;Finansowe</p></div></div>
                
                            <div class="control-group">
                                <label class="control-label" for="inputBank">Bank</label>
                                <div class="controls">
                                    <input type="text" id="inputBank" style="width:130px;" name="bank" value="" placeholder="Bank">
                                </div>
                            </div>
                         
                      
                            <div class="control-group" style="width:200px;">
                                <label class="control-label" for="inputAccountNo">Numer Konta</label>
                                <div class="controls">
                                    <input type="text" id="inputAccountNo" style="width:200px;" name="accountno" value="" placeholder="Numer Konta">
                                </div>
                            </div>
                    
                            <div class="control-group">
                                <label class="control-label" for="inputRS">R/S</label>
                                <div class="controls">
                                    <input type="text" id="inputRS" style="width:130px;" name="rs" value="" placeholder="R/S">
                                </div>
                            </div>
                        
                            <div class="control-group" style="width:200px;">
                                <label class="control-label" for="inputAccountNo">Sposob Platnosci</label>
                                <div class="controls">
                                    <select name="paymenttype" style="width:180px;">
                                        <option value="0">Natychmiastowa</option>
                                        <option value="1">14 Dni</option>
                                        <option value="2">Linia Kredytowa</option>
                                    </select>
                                </div>
                            </div>
                 
                            <div class="control-group">
                                <label class="control-label" for="inputRS">K/S</label>
                                <div class="controls">
                                    <input type="text" id="inputKS" style="width:130px;" name="ks" value="" placeholder="K/S">
                                </div>
                            </div>
</div> 
<div class="pole" style="float: right; width: 48%;">                
<div class="title-section"><div class="title"><p>Adres Rejestracji</p></div></div>
<div class="control-group">
<label class="control-label" style="width:60px;" for="inputAddress1r">Adres  1</label>
<div class="controls">
<input type="text" id="inputAddress1r" name="address_r_1" value="" placeholder="Adres " />
</div>
</div> 
<div class="control-group">
<label class="control-label" style="width:60px;" for="inputAddress2r">Adres  2</label>
<div class="controls">
<input type="text" id="inputAddress2r" name="address_r_2" value="" placeholder="Adres " />
</div>
</div>
 <div class="control-group">                                       
<label class="control-label" style="width:60px;" for="inputCityr">Miasto</label>
<div class="controls">
<input type="text" id="inputCityr" name="city_r" value="" placeholder="Miasto">
</div>
 </div>
<div class="control-group">
<label class="control-label" style="width:60px;" for="inputZip_r">Kod Pocztowy</label>
<div class="controls">    
<input type="text" id="inputZipr" name="zip_r" value="" placeholder="Kod Pocztowy">
</div>
</div>
 <div class="control-group">                               
<label class="control-label" style="width:50px;" for="inputKPP">KPP</label>
<div class="controls">    
<input type="text" id="inputKPP" style="width:80px;" name="kpp" value="" placeholder="KPP">
</div>
 </div>
  <div class="control-group">                                              
      <label class="control-label" style="width:50px;" for="inputKPP">INN</label>
  <div class="controls">    
      <input type="text" id="inputINN" style="width:80px;" name="inn" value="" placeholder="INN">                   
  </div>
  </div>


 
</div>
</div>                     

<div class="pole">  

                <div class="title-section"><div class="title"><p>Prezesi</p></div></div>
                <div>
                    <a name="hpres"></a>
                    <input type="hidden" name="pres_lines" value="1">
                                            <div style="margin-bottom:2px;">
                            <input type="text" style="width:70px;" name="pres_fname_0" value="" placeholder="imię">
                            <input type="text" style="width:70px;" name="pres_lname_0" value="" placeholder="Nazwisko">
                            <input type="text" style="width:70px;" name="pres_sname_0" value="" placeholder="Drugie Imię ">
                            <input type="text" style="width:70px;" name="pres_title_0" value="" placeholder="">
                            <input type="text" style="width:70px;" name="pres_phone_0" value="" placeholder="telefon">
                            <input type="text" style="width:70px;" name="pres_email_0" value="" placeholder="e-mail ">
                            <input type="text" style="width:70px;" name="pres_im_0" value="" placeholder="Chat">
                            <select name="pres_im_type0" style="width:80px;">
                                <option value="0" selected="1">Skype</option>
                                <option value="1">ICQ</option>
                                <option value="2">Yahoo</option>
                            </select>
                            <input type="text" style="width:70px;" name="pres_BirthDate_0" class="datepicker" value="" placeholder="Urodziny">
                        </div>
                                    </div>
                <div style="margin:10px 0px 10px 0px;"><button type="submit" class="btn" name="btnPresAddLine">Dodaj Linie</button></div>
</div>               
 <div class="pole">                 
                <div class="title-section"><div class="title"><p>Menadzerowie</p></div></div>
                <div>
                    <a name="hmanag"></a>
                    <input type="hidden" name="manag_lines" value="1">
                                            <div style="margin-bottom:2px;">
                            <input type="text" style="width:70px;" name="manag_fname_0" value="" placeholder="imię">
                            <input type="text" style="width:70px;" name="manag_lname_0" value="" placeholder="Nazwisko">
                            <input type="text" style="width:70px;" name="manag_sname_0" value="" placeholder="Drugie Imię  ">
                            <input type="text" style="width:70px;" name="manag_title_0" value="" placeholder="">
                            <input type="text" style="width:70px;" name="manag_phone_0" value="" placeholder="telefon">
                            <input type="text" style="width:70px;" name="manag_email_0" value="" placeholder="e-mail ">
                            <input type="text" style="width:70px;" name="manag_im_0" value="" placeholder="Chat">
                            <select name="manag_IM_type0" style="width:80px;">
                                <option value="0" selected="1">Skype</option>
                                <option value="1">ICQ</option>
                                <option value="2">Yahoo</option>
                            </select>
                            <input type="text" style="width:70px;" name="manag_BirthDate_0" class="datepicker" value="" placeholder="Urodziny">
                        </div>
                                    </div>
               
                <div style="margin:10px 0px 10px 0px;"><button type="submit" class="btn" name="btnManagAddLine">Dodaj Linie</button></div>
                
  </div>
  <div style="width: 100%; height: 395px;">  
                
 <div class="pole" style="float: left; width: 49%;"> 
                <div class="title-section"><div class="title"><p>Pozostale Informacje</p></div></div>

                            <div class="control-group">
                                <label class="control-label" for="inputSourceContact">Zgoda na Biuletyn</label>
                                <div class="controls">
                                    <input type="checkbox" name="bulletin" value="1" />
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="inputSourceContact">Zrodlo kontaktu</label>
                                <div class="controls">
                                    <input type="text" id="inputSourceContact" name="sourceContact" value="" placeholder="Zrodlo kontaktu">
                                </div>
                            </div>
                            <label class="control-label" for="partners_selector">Posrednik/Referal: &nbsp;</label>
                            <select id="partners_selector" style="margin-bottom: 10px;">
                                <option id="partners_selector1">Posrednik</option>
                                <option id="partners_selector2">Referal</option>    

                            </select> 
                             <div id="partners_box1" class="control-group">

    <label class="control-label" for="inputSourceContact">Posrednik</label>
    <div  class="controls">
		  <select  name="partner">
		<option value="0">--- ustaw pośrednika ---</option>
				  		  <option value="2">AAA1</option>
		  				  		  <option value="3">Cass1</option>
		  				  		  <option value="5">Cogito Group</option>
		  				  		  <option value="1">Tom Nowak</option>
		  				  </select>
    </div>
  </div>
 <div id="partners_box2" class="control-group">
    <label class="control-label" for="inputReferal">Referal</label>
    <div  class="controls">
		<select  name="referal">
		<option value="0">---  ---</option>
 <option value="4"> gg</option>
	
 <option value="6"> gg</option>
	
		</select>
    </div>
  </div>

                            <div  class="control-group">

                                <div  class="controls">
                                    <input style="float: left;  margin-left: -10px; width: 170px;" value="" name="title_umowa" placeholder="Tytul do Umowy" >  <br> <br>  
                                    <input style="float: left; margin-left: -10px;  width: 170px;" value="" name="nazwisko_umowa" placeholder="Nazwisko do Umowy" > <br> <br>
                                      
                                        <button style="float:left; " id="dodaj_umowe">Dodaj Umowe</button>

                                    
                                    <input  type="file" id="umowa" name="umowa">  

                                </div>
                            </div>
                            <div class="control-group" style="width:200px; float: left; ">
                                <label class="control-label" for="language_type">Jezyk Umowy</label>
                                <div class="controls">
                                    <select name="language_type" style="width:120px; position: relative; z-index: 10;">
                                        <option value="0">Angielski</option>
                                        <option value="1">Polski</option>
                                        <option value="2" selected>Rosyjski</option>
                                    </select>
                                </div>
                            </div> 

                            <div class="control-group" style="width:100px; float: left;   margin-left: -70px;">
                                <div class="controls">
                                 
                                    <select name="exp_typ" style="width:120px; margin-right: -80px;">
                                        <option value="1">Experta</option>
                                        <option value="0" selected>Experta1</option>


                                    </select>


                                </div>
                            </div>                

             
                            <div class="control-group" style="width:200px;">
                                <label class="control-label" for="inputStatus">status </label>
                                <div class="controls">
                                    <select name="status" style="width:120px;">
                                        <option value="2">Standard</option>
                                        <option value="1">Silver</option>
                                        <option value="0">Gold</option>
                                    </select>
                                </div>
                            </div>
                            <div class="control-group" style="width:200px;">
                                <label class="control-label" for="inputaccount_manager">Menager Konta</label>
                                <div class="controls">
                                    <input type="text" id="inputaccount_manager" style="width:130px;" name="account_manager" value="" placeholder="Menager Konta">
                                </div>
                            </div>
                            <div class="control-group" style="float: left; margin-left: -100px">
        <div class="controls">
            <button type="submit" class="btn" name="btnSaveNC">zapisz</button>
        </div>
    </div>
                </div>

<div class="pole" style="float: right; width: 48%;">
<div class="title-section"><div class="title"><p>Numer OGPN</p></div></div>
<div class="control-group">   
<label class="control-label" for="inputogrnNum">Numer OGPN</label>
<div class="controls"> 
<input type="text" id="inputogrnNum" style="width:130px;" name="ogrnNum" value="" placeholder="Numer OGPN">
</div>
</div>
<div class="control-group"> 
<label class="control-label" for="inputogrnDate">Data OGPN</label>
<div class="controls"> 
<input type="text" id="inpuogrnDate" class="datepicker" style="width:130px;" name="ogrnDate" value="" placeholder="Data OGPN">
</div>
</div>
<div class="control-group"> 
<label class="control-label" for="inputogrnBy">Wydano</label>
<div class="controls"> 
<input type="text" id="inputogrnBy" style="width:130px;" name="ogrnBy" value="" placeholder="Wydano">
</div>
</div>

   </div>                          
  </div>             
                
                <!-- 2nd column -->
       
                                       
   


</form>

		
		</div>
                </div>            
  </div>
 </section>   
 <?php } // koniec warunku 
 else {
 ?> 


<section>
  <div class="ctn">
		<div class="row-fluid">
		  		  <div class="span12">
                                      <?php   
 if(isset($_POST['phone']) && empty($_POST['phone']) || isset($_POST['email']) && empty($_POST['email'])  ){
 ?>
              <div class="alert alert-error">
            <button type="button" class="close" data-dismiss="alert">×</button>

       <?php echo readFromXML('msg','menu','pl')['info4'][$_SESSION['user']['jezyk']];?> 
           
              <?php 
              // inieje juz taki klient 
              echo readFromXML('msg','menu','pl')['info15']['pl'];?>      
        </div> 
  <?php } ?>   
<div class="pole" style="width: 400px;">
<div class="title-section"><div class="title"><p><?php lang('pages','cpc','p_dodajkontakt','name');?></p></div></div>    
		        
                        
                   
                     
<form class="form-horizontal" method="post" action="?page=new_contact">
    
        <input type="hidden" value="0" name="pm" />
        <input type="hidden" value="" name="countPhones" id="countPhones" />
                    <div class="control-group">
                        
                         
                <label class="control-label" for="inputPhone"><?php lang('pages','cpc','komunikacja','label','telefony');?></label>
                <div class="controls">
                    <input type="text" onkeypress="return cyfry(this, event)" id="inputPhone" name="phone" value="" placeholder="<?php lang('pages','cpc','komunikacja','label','telefony');?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputEmail"><?php lang('pages','cpc','komunikacja','label','email');?></label>
                <div class="controls">
                    <input type="text" id="inputEmail" name="email" value="" placeholder="<?php lang('pages','cpc','komunikacja','label','email');?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputName"><?php lang('pages','cpc','komunikacja','label','nazwa_firmy');?></label>
                <div class="controls">
                    <input type="text" id="inputName" name="name" value="" placeholder="<?php lang('pages','cpc','komunikacja','label','nazwa_firmy');?>">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn" name="btnNextNC"><?php lang('global','button','dalej','',''); ?></button>
                </div>
            </div>
                </form>

		  </div>
		</div>
             
  </div>   
  
</section>
 <?php } ?>