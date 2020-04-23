<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Web - 5</title>
	<script type="text/javascript" nonce="a4cf56125c194b4892514fa3c22" src="//local.adguard.org?ts=1585150839147&amp;type=content-script&amp;dmn=u20505.kubsu-dev.ru&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1"></script>
	<style>
	   .error {
            border: 2px solid red;
        }
	</style>
<script type="text/javascript" nonce="a4cf56125c194b4892514fa3c22" src="//local.adguard.org?ts=1585150839147&amp;name=AdGuard%20Popup%20Blocker&amp;name=AdGuard%20Assistant&amp;name=AdGuard%20Extra&amp;type=user-script"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-info">
    <?php
    if (!empty($messages)) {
      print('<div id="messages">');
      // Выводим все сообщения.
      foreach ($messages as $message) {
        print($message);
      }
      print('</div>');
    }
    ?>
	<div class="jumbotron w-50 mx-auto my-5">
	<?php if(!empty($_COOKIE[session_name()]) && !empty($_SESSION['login'])) {
                 echo '<div class="">
                          <form action="" method="POST">
                          <input name="requestMe" type="hidden" value="LO" />
                          <button type="submit" class="btn btn-danger">Log out</button>
                          </form>
                       </div>';
              } else{
                 echo '<div>
                          <form action="" method="POST">
                          <input name="requestMe" type="hidden" value="LI" />
                          <div class="d-flex justify-content-between">
                              <label>Do you have an account?</label>
                              <button type="submit" class="btn btn-success">Log In</button>
                          </div>
                          </form>
                       </div>'; 
              }
    ?>
		<form action="" method="POST">
			<div class="from-group d-flex flex-column">
				<div class="my-2">
					<label>First Name</label>
					<div class="col-sm-10">
        				<input type="text" name="Name" class="form-control" <?php if ($errors['Name']) {print 'class="error"';} ?>  value=" <?php print $values['Name'];?> " />
      				</div>
      			</div>
      			<div class="my-2">
      				<label>Email</label>
      				<div class="col-sm-10">
        				<input type="email" class="form-control" name="Email" aria-describedby="emailHelp" <?php if ($errors['Email']) {print 'class="error"';} ?> value="<?php print $values['Email']; ?>" />
      				</div>
      			</div>
      			<div class="my-2">
      				<label>Date of Birth</label>
      				<div class="d-flex flex-row justify-content-around">
      					<div class="d-flex flex-column">
      						<label>Day</label>
      						<input type="text" class="form-control" name="DD" <?php if ($errors['DD']) {print 'class="error"';} ?> value="<?php print $values['DD']; ?>">
      					</div>
      					<div class="d-flex flex-column">
      						<label>Month</label>
      						<input type="text" class="form-control" name="DM" <?php if ($errors['DM']) {print 'class="error"';} ?> value="<?php print $values['DM']; ?>">
      					</div>
      					<div class="d-flex flex-column">
      						<label>Year</label>
      						<input type="number" class="form-control" name="DY" <?php if ($errors['DY']) {print 'class="error"';} ?> value="<?php print $values['DY']; ?>">
      					</div>
      				</div>
      			</div>
      			<div class="my-2">
      				<label>Sex</label>
      				<div class="form-check">
        				<label class="form-check-label">
          					<input type="radio" class="form-check-input" name="Rad" id="SMale" value="MALE" <?php if ($values['PO']=='MALE') print 'checked=""'; ?>>Male
       					</label>
      				</div>
      				<div class="form-check">
      					<label class="form-check-label">
          					<input type="radio" class="form-check-input" name="Rad" id="SFe" value="FEMALE" <?php if ($values['PO']=='FEMALE') print 'checked=""'; ?>>Female
        				</label>
      				</div>
      			</div>
      			<div class="my-2">
      				<label>Number of limbs</label>
      				<div class="d-flex justify-content-between">
	      				<div class="form-check">
	        				<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="0" value="0" <?php if ($values['LI']=='0') print 'checked=""'; ?>>0
	       					</label>
	      				</div>
	      				<div class="form-check">
	      					<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="1" value="1" <?php if ($values['LI']=='1') print 'checked=""'; ?>>1
	        				</label>
	      				</div>
	      				<div class="form-check">
	      					<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="2" value="2" <?php if ($values['LI']=='2') print 'checked=""'; ?>>2
	        				</label>
	      				</div>
	      				<div class="form-check">
	      					<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="3" value="3" <?php if ($values['LI']=='3') print 'checked=""'; ?>>3
	        				</label>
	      				</div>
	      				<div class="form-check">
	      					<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="4" value="4" <?php if ($values['LI']=='4') print 'checked=""'; ?>>4
	        				</label>
	      				</div>
	      			</div>
      			</div>
      			<div class="my-2 jumbotron p-1" <?php if ($errors['SP']) {print 'class="error"';} ?>>
      				<div class="form-group" value="">
      					<label for="exampleSelect2">Superpowers</label>
      					<select multiple="" class="form-control" name="SP[]">
        				<option <?php for ($i=0;$i<count($values, COUNT_RECURSIVE)-10;$i++) if ($values['SP'][$i]=='Time freeze') print 'selected=""' ?>>Time freeze</option>
                		<option <?php for ($i=0;$i<count($values, COUNT_RECURSIVE)-10;$i++) if ($values['SP'][$i]=='Teleportation') print 'selected=""' ?>>Teleportation</option>
                		<option <?php for ($i=0;$i<count($values, COUNT_RECURSIVE)-10;$i++) if ($values['SP'][$i]=='Absolute knowledge') print 'selected=""' ?>>Absolute knowledge</option>
                		<option <?php for ($i=0;$i<count($values, COUNT_RECURSIVE)-10;$i++) if ($values['SP'][$i]=='Fundamental immortality') print 'selected=""' ?>>Fundamental immortality</option>
				      </select>
				    </div>
      			</div>
      			<div class="my-2">
      				<div class="form-group">
      					<label>Biography</label>
      					<textarea class="form-control" name="BG" rows="3" <?php if ($errors['BG']) {print 'class="error"';} ?>><?php print $values['BG']; ?></textarea>
    				</div>	
      			</div>
      			<div class="my-2 <?php if ($errors['CH']) {print 'class="error"';} ?>">
      				<div class="form-check">
        				<label><input class="form-check-input" type="checkbox" name="CH" <?php if ($errors['CH']) {print 'class="error"';} ?>  value="Yes" <?php print $values['CH']; ?>>I got acquainted with the contact
        				</label>
      				</div>
      			</div>
      			<input name="requestMe" type="hidden" value="OaI" />
      			<button type="submit" class="btn btn-dark">Send</button>
			</div>
		</form>
	</div>
</body>
</html>
