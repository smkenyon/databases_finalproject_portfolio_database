<!DOCTYPE HTML>
<!--
	Alpha by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Investor Edit Execution - Kenyon Portfolio Database</title>
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
						$open = $_POST['open_date'];
						$close = $_POST['close_date'];
						$purchase = $_POST['purchase_price'];
						$close_price = $_POST['close_price'];
						$quantity = $_POST['quantity'];
						$portfolio_name = $_POST['portfolio_name'];
						$trade_id = $_POST['trade_id'];
						
						$sql = "SELECT asset_id, symbol FROM Assets WHERE asset_name = '$asset';";
						$result = mysqli_query($db_server, $sql);
						if($result)
						{
							while($row=mysqli_fetch_assoc($result))
                    		{
                    		    foreach($row as $key=>$value) ${$key}=$value;
								$asset_id = $row['asset_id'];
								$symbol = $row['symbol'];
							}

							$sql_background = "SELECT portfolio_id FROM Portfolios WHERE portfolio_name = '$portfolio_name';";
							$result_background = mysqli_query($db_server, $sql_background);

							while($row=mysqli_fetch_assoc($result_background))
							{
								foreach($row as $key=>$value) ${$key}=$value;
								$portfolio_id = $row['portfolio_id'];
							}

							// need to store current portfolio_id and asset_id into a temp variable
							$sql_temp = "SELECT portfolio_id, asset_id FROM Trades WHERE trade_id='$trade_id';";
							$result_temp =mysqli_query($db_server, $result_temp);
							while($row=mysqli_fetch_assoc($result_temp))
							{
								foreach($row as $key=>$value) ${$key}=$value;
								$portfolio_id_temp = $row['portfolio_id'];
								$asset_id_temp = $row['asset_id'];
							}

							// need to get Portfolio_Assets id to update portfolio_id and asset_id
							$sql_portfolio_assets = "SELECT Portfolios_Assets.portfolio_asset_id 
													FROM Portfolios_Assets INNER JOIN Trades
													ON Portfolios_Assets.portfolio_id = Trades.portfolio_id
													WHERE Trades.trade_id='$trade_id';";
							$result_portfolio_assets = mysqli_query($db_server, $sql_portfolio_assets);

							while($row=mysqli_fetch_assoc($result_portfolio_assets))
							{
								foreach($row as $key=>$value) ${$key}=$value;
								$portfolio_asset_id = $row['portfolio_asset_id'];
							}
							
							/* update trades table */
							if($close_price >=0) $sql = "UPDATE Trades SET open_date='$open', close_date='$close', quantity='$quantity', purchase_price='$purchase', close_price='$close_price', asset_id='$asset_id', portfolio_id='$portfolio_id' WHERE trade_id='$trade_id';";
							else $sql = "UPDATE Trades SET open_date='$open', quantity='$quantity', purchase_price='$purchase', asset_id='$asset_id', portfolio_id='$portfolio_id' WHERE trade_id='$trade_id';";
							$result = mysqli_query($db_server, $sql);

							// update Portfolio_Assets
							$sql4 = "UPDATE Portfolios_Assets SET portfolio_id='$portfolio_id', asset_id='$asset_id' WHERE portfolio_asset_id='$portfolio_asset_id';";
							$result4 = mysqli_query($db_server, $sql4);

							if($result4) echo "<p>Successfully updated position and updated database</p>";
							else echo "<p>Failed to update position. Please try again</p>";
						}
						else echo "<p>Failed to update position. Please try again</p>";
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