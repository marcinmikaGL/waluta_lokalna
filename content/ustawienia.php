<section>
  <div class="ctn">
		<div class="row-fluid">
		  		  <div class="span2">
			  			  			  <ul class="nav nav-tabs nav-stacked">
				  <li class="active"><a href="?page=settings&op=timezone">Strefa czasowa</a></li>				  <li><a href="?page=settings&op=group">Grupa</a></li>				  <li><a href="?page=settings&op=department">Departamenty</a></li>				  <li><a href="?page=settings&op=language">Ustawienia Jezykowe</a></li>				  <li><a href="?page=settings&op=material_group">Grupy materialow </a></li>
				  <li><a href="?page=settings&op=certificates">Certificat</a></li>
			  </ul>
			  			  
		  </div>
		  		  <div class="span10">
		    <h5>Ustawienia</h5>

<form class="form-horizontal" method="post">
  <div class="control-group">
    <label class="control-label" for="inputName">kraj</label>
    <div class="controls">
      <input type="text" id="inputName" name="name" value="" placeholder="kraj">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputAreacode">Numer Kierunkowy</label>
    <div class="controls">
      <input type="text" id="inputAreacode" class="input-small" name="areacode" value="" placeholder="+__">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputTimezone">Panstwa</label>
    <div class="controls">
      <input type="text" id="inputTimezone" class="input-small" name="timezone" value="" placeholder="GMT">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputnameTimezone">Nazwa strefy czasowej</label>
    <div class="controls">
      <input type="text" id="inputnameTimezone" class="input-small" name="nametimezone" value="" placeholder="">
    </div>
  </div>
  <div class="control-group">
	<div class="controls">
	  	  <button type="submit" class="btn" name="btnAddTimezone">Dodaj</button>	  	  
	</div>
  </div>
</form>

<h5>Dostępne państwa(4)</h5>
<table class="table table-striped" style="width:370px;">
		  		    <tr>
		      <td width="100">Polska</td>
			  <td>Polski czas standard</td>
		      <td width="55">GMT+1</td>
			  <td>+48</td>
		      <td width="50"><a href="?page=settings&op=timezone&op2=edit&id=3">edytuj</a></td>
		      <td width="50"><a href="?page=settings&op=timezone&op2=delete&id=3">Usun</a></td>
		    </tr>
		  		    <tr>
		      <td width="100">Rosja</td>
			  <td>39</td>
		      <td width="55">GMT+2</td>
			  <td>+7</td>
		      <td width="50"><a href="?page=settings&op=timezone&op2=edit&id=4">edytuj</a></td>
		      <td width="50"><a href="?page=settings&op=timezone&op2=delete&id=4">Usun</a></td>
		    </tr>
		  		    <tr>
		      <td width="100">USA</td>
			  <td>CST</td>
		      <td width="55">GMT-6</td>
			  <td>+1</td>
		      <td width="50"><a href="?page=settings&op=timezone&op2=edit&id=1">edytuj</a></td>
		      <td width="50"><a href="?page=settings&op=timezone&op2=delete&id=1">Usun</a></td>
		    </tr>
		  		    <tr>
		      <td width="100">USA</td>
			  <td>PST</td>
		      <td width="55">GMT-8</td>
			  <td>+1</td>
		      <td width="50"><a href="?page=settings&op=timezone&op2=edit&id=2">edytuj</a></td>
		      <td width="50"><a href="?page=settings&op=timezone&op2=delete&id=2">Usun</a></td>
		    </tr>
		  </table>
 <!-- timezones -->
 <!--pri -->

 <!-- groups -->
 <!-- pri -->

 <!-- departments -->

<!-- languages -->
 <!-- pri -->


		  </div>
		</div>
             
  </div>
</section>
