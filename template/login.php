<div class="modal fade" id="loginPopup" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-body">
				<form role="loginform" method="POST" action="../POST/login.php">
					<div class="form-group">
						<label for="usrname"><span class="glyphicon glyphicon-user"></span> Email</label>
						<input type="text" class="form-control" id="loginEmail" name="loginEmail" placeholder="voer email in">
						<small id="loginEmailError" class="redLetters" hidden="true">Het emailadres is niet ingevuld</small>
					</div>
					<div class="form-group">
						<label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Wachtwoord</label>
						<input type="password" class="form-control" id="loginWachtwoord" name="loginWachtwoord"
							   placeholder="voer wachtwoord in" autocomplete="off">
						<small id="loginPasswordError" class="redLetters" hidden="true">Het wachtwoord is niet ingevuld</small>
					</div>
					<button type="submit" class="btn btn-default btn-block buttoncolorgray"><span
								class="glyphicon glyphicon-off"></span> Login
					</button>
				</form>
			</div>
			<div class="modal-footer">
			</div>
		</div>
	</div>
</div>
