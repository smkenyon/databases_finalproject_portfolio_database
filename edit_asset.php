<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Edit Asset - Kenyon Portfolio Database</title>
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
					$asset = $_POST['asset_name'];
					$asset_id = $_POST['asset_id'];
					$symbol = $_POST['symbol'];
					$category_name = $_POST['category_name'];

					// get category_id for category_name
					$sql_cid = "SELECT category_id FROM Categories WHERE category_name = '$category_name';";
					$result_cid = mysqli_query($db_server, $sql_cid);
					while($row=mysqli_fetch_assoc($result_cid))
					{
						foreach($row as $key=>$value) ${$key}=$value;
						$category_id = $row['category_id'];
					}

					if($result_cid)
					{
						$sql = "UPDATE Assets SET asset_name = '$asset', symbol = '$symbol', category_id = '$category_id' WHERE asset_id = '$asset_id';";
						$result = mysqli_query($db_server, $sql);
						if($result) echo "<p>Successfully edited asset $asset $symbol $category_name to the database</p>";
						else echo "<p>Failed to edit asset to the database</p>";
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