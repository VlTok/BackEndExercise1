<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Web - 3</title>
	<script type="text/javascript" nonce="a4cf56125c194b4892514fa3c22" src="//local.adguard.org?ts=1585150839147&amp;type=content-script&amp;dmn=u20505.kubsu-dev.ru&amp;css=1&amp;js=1&amp;gcss=1&amp;rel=1&amp;rji=1"></script>
<script type="text/javascript" nonce="a4cf56125c194b4892514fa3c22" src="//local.adguard.org?ts=1585150839147&amp;name=AdGuard%20Popup%20Blocker&amp;name=AdGuard%20Assistant&amp;name=AdGuard%20Extra&amp;type=user-script"></script><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="bg-info">
	<div class="jumbotron w-50 mx-auto my-5">
		<form action="" method="POST">
			<div class="from-group d-flex flex-column">
				<div class="my-2">
					<label>First Name</label>
					<div class="col-sm-10">
        				<input type="text" class="form-control" name="Name" placeholder="Vladimir">
      				</div>
      			</div>
      			<div class="my-2">
      				<label>Email</label>
      				<div class="col-sm-10">
        				<input type="email" class="form-control" name="Email" aria-describedby="emailHelp" placeholder="Enter email">
      				</div>
      			</div>
      			<div class="my-2">
      				<label>Date of Birth</label>
      				<div class="d-flex flex-row justify-content-around">
      					<div class="d-flex flex-column">
      						<label>Day</label>
      						<input type="text" class="form-control" name="DD" placeholder="10">
      					</div>
      					<div class="d-flex flex-column">
      						<label>Month</label>
      						<input type="text" class="form-control" name="DM" placeholder="05">
      					</div>
      					<div class="d-flex flex-column">
      						<label>Year</label>
      						<input type="number" class="form-control" name="DY" placeholder="2000">
      					</div>
      				</div>
      			</div>
      			<div class="my-2">
      				<label>Sex</label>
      				<div class="form-check">
        				<label class="form-check-label">
          					<input type="radio" class="form-check-input" name="Rad" id="SMale" value="MALE" checked="">Male
       					</label>
      				</div>
      				<div class="form-check">
      					<label class="form-check-label">
          					<input type="radio" class="form-check-input" name="Rad" id="SFe" value="FEMALE">Female
        				</label>
      				</div>
      			</div>
      			<div class="my-2">
      				<label>Number of limbs</label>
      				<div class="d-flex justify-content-between">
	      				<div class="form-check">
	        				<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="0" value="0" checked="">0
	       					</label>
	      				</div>
	      				<div class="form-check">
	      					<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="1" value="1">1
	        				</label>
	      				</div>
	      				<div class="form-check">
	      					<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="2" value="2">2
	        				</label>
	      				</div>
	      				<div class="form-check">
	      					<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="3" value="3">3
	        				</label>
	      				</div>
	      				<div class="form-check">
	      					<label class="form-check-label">
	          					<input type="radio" class="form-check-input" name="Limbs" id="4" value="4">4
	        				</label>
	      				</div>
	      			</div>
      			</div>
      			<div class="my-2">
      				<div class="form-group">
      					<label for="exampleSelect2">Superpowers</label>
      					<select multiple="" class="form-control" name="SP[]">
        				<option>Time freeze</option>
       					<option>Teleportation</option>
				        <option>Absolute knowledge</option>
				        <option>Fundamental immortality</option>
				      </select>
				    </div>
      			</div>
      			<div class="my-2">
      				<div class="form-group">
      					<label>Biography</label>
      					<textarea class="form-control" name="BG" rows="3"></textarea>
    				</div>	
      			</div>
      			<div class="my-2">
      				<div class="form-check">
        				<label><input class="form-check-input" type="checkbox" name="CH" value="Yes" checked="">I got acquainted with the contact
        				</label>
      				</div>
      			</div>
      			<button type="submit" class="btn btn-dark">Send</button>
			</div>
		</form>
	</div>
</body>
</html>