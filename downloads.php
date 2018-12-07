<?php
require_once('authenticate.php');
?>
<?php 
include 'header.php';
?>

<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>Downloads</h2>
					
				</header>
				<div class="container">
					<section>
						<p>The GoDMC phase 2 meta analysis results are available for download here:</p>
						<p><ul>
							<li><a href="/path/to/assoc_meta_all.csv.gz" download>assoc_meta_all.csv.gz</a> 8Gb</li>
							<li><a href="/path/to/assoc_meta_all.csv.gz.md5" download>assoc_meta_all.csv.gz.md5</a></li>
						</ul></p>

						<p>These data, along with richer information regarding SNP and chromosome positions can be accessed programmatically via a RESTful API, full details are available here:</p>
						<p><ul>
							<li><a href="http://api.godmc.org.uk/v0.1">http://api.godmc.org.uk/v0.1</a></li>
						</ul></p>
						<p>In addition, follow up analyses including enrichments, colocalisations and MR can be queried programmatically through a Neo4j graph database:</p>
						<p><ul>
							<li>Web interface: <a href="http://hostname:port">hostname:port</a></li>
							<li>Bolt connection: <a href="bolt://hostname:port">hostname:port</a></li>
						</ul></p> 
					</section>
				</div>
			</section>

<?php 
include 'footer.php';
?>
