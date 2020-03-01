<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Admin Delete - Kenyon Portfolio Database</title>
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
						<h2>Admin Delete</h2>
                        </br></br>
					</header>
            <div class="box">

					<!-- Delete Investor Form -->
					<p>Delete Investor:</p>
                    <form method="post" action="delete_investor.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

								$sql = "SELECT investor_id, first_name, last_name FROM Investors;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='investor_id' id='investor_id'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
										echo "<option value='$investor_id'>$investor_id $first_name $last_name</option>";
                    				}
								}
								?></select>
							</div><br>
							<div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
						</div>
						</div>
					</form>
					


					

					<!-- Delete Fund Form -->
					<p>Delete Fund:</p>
                    <form method="post" action="delete_fund.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

								$sql = "SELECT pm_id, fund_name FROM Portfolio_Managers;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='pm_id' id='pm_id'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
										echo "<option value='$pm_id'>$pm_id $fund_name</option>";
                    				}
								}
								?></select>
							</div><br>
							<div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
                        </div>
					</form>
					
					

					

					<!-- Delete Category Form -->
					<p>Delete Category:</p>
                    <form method="post" action="delete_category.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

								$sql = "SELECT category_id, category_name FROM Categories;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='category_id' id='category_id'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
										echo "<option value='$category_id'>$category_id $category_name</option>";
                    				}
								}
								?></select>
							</div><br>
							<div class="col-12">
                                <ul class="actions">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
                        </div>
					</form>
					
					

					

					<!-- Delete Asset Form -->
					<p>Delete Asset:</p>
                    <form method="post" action="delete_asset.php">
                        <div class="row gtr-uniform gtr-50">
						<div class="col-6 col-12-mobilep">
							<?php
								require_once 'login_stephen.php';

								//Create the connection to the MySQL database
								$db_server = mysqli_connect($db_hostname, $db_username, $db_password, $db_database);
								if (!$db_server) die("Unable to connect to MySQL: " . mysqli_error($db_server));

								$sql = "SElECT asset_id, asset_name, symbol FROM Assets;";

								$result = mysqli_query($db_server, $sql);

								if($result)
								{	
									echo "<select name='asset_id' id='asset_id'>";
									while($row=mysqli_fetch_assoc($result))
                    				{
                    				    foreach($row as $key=>$value) ${$key}=$value;
										echo "<option value='$asset_id'>$asset_id $asset_name $symbol</option>";
                    				}
								}
								?></select>
							</div><br>
							<div class="col-12">
                                <ul class="actions special">
                                    <li><input type="submit" value="Submit" /></li>
									<li><input type="reset" value="Reset" class="alt" /></li>
								</ul>
                            </div>
                        </div>
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