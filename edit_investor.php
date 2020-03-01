<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Edit Investor - Kenyon Portfolio Database</title>
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
					$investor_id = $_POST['investor_id'];
					$fname = $_POST['first_name'];
					$lname = $_POST['last_name'];
					$address = $_POST['address'];
					$city = $_POST['city'];
					$state = $_POST['state'];
					$country = $_POST['country'];
					$zip = $_POST['zip'];
					$fund_name = $_POST['fund_name'];

					// get pm_id for fund_name
					$sql_pmid = "SELECT pm_id FROM Portfolio_Managers WHERE fund_name = '$fund_name';";
					$result_pm = mysqli_query($db_server, $sql_pmid);
					while($row=mysqli_fetch_assoc($result_pm))
					{
						foreach($row as $key=>$value) ${$key}=$value;
						$pm_id = $row['pm_id'];
					}

					if($result_pm)
					{
						$sql = "UPDATE Investors SET first_name = '$fname', last_name = '$lname', address = '$address', city = '$city', state = '$state', country = '$country', zip = '$zip', pm_id = '$pm_id' WHERE investor_id = '$investor_id';";
						$result = mysqli_query($db_server, $sql);
						if($result) echo "<p>Successfully updated investor '$fname' '$lname' to the database</p>";
						else echo "<p>Failed to update investor to the database</p>";
					}
				?>
				<ul class="actions special">
						<li><a href="admin_edit.php" class="button primary">Return</a></li>
				</ul>
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