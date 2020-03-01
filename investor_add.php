<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Investor Add Position - Kenyon Portfolio Database</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1><a href="index.html">Portfolio Database</a> by Stephen Kenyon</h1>
					<nav id="nav">
						<ul>
							<li><a href="index.html">Home</a></li>
							<li>
								<a href="#" class="icon solid fa-angle-down">User Roles</a>
								<ul>
									<li><a href="investors.php">Investor</a></li>
									<li><a href="portfolio_managers.php">Portfolio Manager</a></li>
									<li><a href="administrator.html">Administrator</a></li>
								</ul>
							</li>
						</ul>
					</nav>
                </header>
                <!-- Main -->
				<section id="main" class="container">
                    <header>
						<?php
						foreach($_POST as $key=>$value) ${$key}=$value;
                        $fname = $_POST['first_name'];
						echo "<h2>$fname,</h2>";
						?>
						<h2>Add a Position</h2>
                        <p>Fill out the form below for the position you would like to add</p>
                        </br></br>
					</header>
                    <div class="box">

                    <!-- Add Position Form -->
                    <form method="post" action="investor_add_execute.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
                                <label>Portfolio Name:</label>

								<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
									
								foreach($_POST as $key=>$value) ${$key}=$value;
							
								$fname = $_POST['first_name'];
								$lname = $_POST['last_name'];

								$sql = "SELECT p.portfolio_name FROM Portfolios AS p INNER JOIN Investors AS i ON p.investor_id = i.investor_id WHERE ((i.first_name = '$fname') AND (i.last_name = '$lname'));";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='portfolio_name' id='portfolio_name'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
                    				    echo "<option value='$portfolio_name'>$portfolio_name</option>";
                    				}
								}
								?>
								</select>
							</div>
							
                            <div class="col-6 col-12-mobilep">
								<label>Asset Name:</label>
								
								<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

								$sql = "SELECT asset_name FROM Assets ORDER BY asset_name;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='asset_name' id='asset_name'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
                    				    echo "<option value='$asset_name'>$asset_name</option>";
                    				}
								}
								?>
								</select>
                            </div>
                            
							<div class="col-6 col-12-mobilep">
                                <label>Open Date:</label><input type="date" name="open_date" id="open_date" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>Close Date:</label><input type="date" name="close_date" id="close_date" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>Purchase Price:</label><input type="number" step=".01" name="purchase_price" id="purchase_price" placeholder="" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>Close Price:</label><input type="number" step=".01" name="close_price" id="close_price" placeholder="" />
							</div>
							<div class="col-6 col-12-mobilep">
                                <label>Quantity:</label><input type="number" step="1" name="quantity" id="quantity" placeholder="1" />
							</div>
							<input type="hidden" name="first_name" id="first_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $fname = $_POST['first_name']; echo $fname;?> />
							<input type="hidden" name="last_name" id="last_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $lname = $_POST['last_name']; echo $lname;?> />
                            <div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
                        </div>
					</form>
					<form method="post" action="investor_submission.php">
						<input type="hidden" name="investor_name" id="investor_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $fname = $_POST['first_name']; $lname = $_POST['last_name']; $investor_name = ($fname . '|' . $lname); echo $investor_name;?> />
						<ul class="actions">
							<li><input type="submit" value="Return" class="primary button" /></li>
						</ul>
					</form>
                    </div>
        </section>
        <!-- Footer -->
                <footer id="footer">
					<ul class="copyright">
						<li>&copy;2019 Stephen Kenyon. All rights reserved.</li><li>Design Template: <a href="http://html5up.net">HTML5 UP</a></li>
					</ul>
				</footer>
		</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
    </body>
</html>