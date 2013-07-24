<!-- Button to trigger modal --> 
					<a href="#myModal" role="button" class="btn-link headerLinks" data-toggle="modal">Login</a> <!-- Modal -->
					<div id="myModal" class="modal hide fade loginModal" tabindex="-1"
						role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
								aria-hidden="true">x</button>
							<h3 id="myModalLabel">User Login</h3>
						</div>

						<div class="modal-body">
							<div class="well">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#login" data-toggle="tab">Login</a>
									</li>
									<li><a href="#create" data-toggle="tab">Create Account</a></li>
								</ul>
								<div id="myTabContent" class="tab-content">
									<div class="tab-pane active in" id="login">
										<form class="form-horizontal"
											action="/../server/SessionBasedUserLogin.php" method="post">
											<fieldset>
												<div id="legend">
													<legend class="">Login</legend>
												</div>
												<div class="control-group">
													<!-- Username -->
													<label class="control-label" for="username">Username</label>
													<div class="controls">
														<input type="text" id="username" name="username"
															placeholder="Username" class="input-xlarge">
													
													</div>
												</div>

												<div class="control-group">
													<!-- Password-->
													<label class="control-label" for="password">Password</label>
													<div class="controls">
														<input type="password" id="password" name="password"
															placeholder="Password" class="input-xlarge">
													
													</div>
												</div>


												<div class="control-group">
													<!-- Button -->
													<div class="controls">
														<button class="offset1 btn btn-success btn-small" type="submit">login</button>
														<button class="btn btn-danger btn-small" type="button"
															onClick=location.reload()>cancel</button>
													</div>
												</div>
											</fieldset>
										</form>
									</div>
									<div class="tab-pane fade" id="create">

										<form class="form-horizontal" action="/../server/RegisterOnServer.php" method="post">
											<div class="control-group">
												<label class="control-label" for="inputUserName">Username</label>
												<div class="controls">
													<input name="inputUserName" type="text" id="inputUserName"
														placeholder="User">
												
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputVorname">Firstname</label>
												<div class="controls">
													<input name="inputVorname" type="text" id="inputVorname"
														placeholder="Firstname">
												
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputNachname">Lastname</label>
												<div class="controls">
													<input name="inputNachname" type="text" id="inputNachname"
														placeholder="Lastname">
												
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputEmail">Email</label>
												<div class="controls">
													<input name="inputEmail" type="email" id="inputEmail"
														placeholder="Email">
												
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputPassword">Password</label>
												<div class="controls">
													<input name="inputPassword" type="password" id="inputPassword"
														placeholder="Password">
												
												</div>
											</div>
											<div class="control-group">
												<label class="control-label" for="inputPassword2">Password
													wiederholen</label>
												<div class="controls">
													<input type="password" id="inputPassword2" name="inputPassword2"
														placeholder="Password">
												
												</div>
											</div>
											<div class="control-group">
												<div class="controls">
													<button class="btn btn-success btn-small" type="submit">register</button>
													<button class="btn btn-danger btn-small" type="button"
														onclick=location.reload()>cancel</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>

<?php

?>