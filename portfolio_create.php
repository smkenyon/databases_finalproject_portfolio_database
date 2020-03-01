<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Portfolio Creation - Kenyon Portfolio Database</title>
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
					<?php
						require_once 'login_stephen.php';

						//Create the connection to the MySQL database
						$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
						if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));
						
						foreach($_POST as $key=>$value) ${$key}=$value;

						$fname = $_POST['first_name'];
						$lname = $_POST['last_name'];
						$portfolio_name = $_POST['portfolio_name'];
					
						$sql = "SELECT investor_id FROM Investors WHERE ((first_name = '$fname') AND (last_name = '$lname'));";
						$result = mysqli_query($db_server, $sql);
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
                    		{
                    		    foreach($row as $key=>$value) ${$key}=$value;
								$investor_id = $row['investor_id'];
							}

							
							// update Portfolios
							$sql4 = "INSERT INTO Portfolios (portfolio_name, investor_id) VALUES ('$portfolio_name', $investor_id);";
							$result4 = mysqli_query($db_server, $sql4);

							if($result4) echo "<p>Successfully added portfolio and updated database</p>";
							else echo "<p>Failed to add portfolio. Please try again</p>";
						}
						else echo "<p>Failed to add portfolio. Please try again</p>";
					?>
					<!-- Return Submission Form -->
					
					<form method="post" action="investor_submission.php">
					<input type="hidden" name="investor_name" id="investor_name" value=<?php foreach($_POST as $key=>$value) ${$key}=$value; $fname = $_POST['first_name']; $lname = $_POST['last_name']; $investor_name = ($fname . '|' . $lname); echo $investor_name;?> />
						<ul class="actions">
							<li><input type="submit" value="Return" class="primary button" /></li>
						</ul>
					</form>
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