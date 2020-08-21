<?php 
include 'header.php';
?>

<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>Resources</h2>
					
				</header>
				<div class="container">
					<section>
						<h3>Downloads</h3>
						<p>The GoDMC mQTL meta-analysis results are available for download here:</p>
						<p><ul>
							<li><a href="http://fileserve.mrcieu.ac.uk/mqtl/assoc_meta_all.csv.gz" download>assoc_meta_all.csv.gz</a> 5.9Gb</li>
							<li><a href="http://fileserve.mrcieu.ac.uk/mqtl/assoc_meta_all.csv.gz.md5" download>assoc_meta_all.csv.gz.md5</a></li>
							<li><a href="http://fileserve.mrcieu.ac.uk/mqtl/README">README</a></li>
						</ul></p>
						<p>We also performed meta analysis of associations of ~25k SNPs (pre-selected based on GWAS catalog etc) against all CpGs. This is a very large amount of data and we are working on making it openly available, likely upon publication. Access can be granted to cohorts on a per-request basis for the time being, please see the <a href="http://godmc.org.uk/projects.html">project proposal page</a> for more information.
						</p><br/>
<!-- 						<p>Replication analysis of all independent top hits from the discovery were performed in the Generation Scotland data comprising 5101 participants:</p>
						<p><ul>
							<li><a href="/path/to/replication.csv.gz" download>replication.csv.gz</a> 5.9Gb</li>
							<li><a href="/path/to/replication.csv.gz.md5" download>replication.csv.gz.md5</a></li>
						</ul></p>
-->					</section>
					<section>
						<h3>Interfaces</h3>
						<p>These data, along with richer information regarding SNP and chromosome positions can be accessed programmatically via a RESTful API, full details are available here:</p>
						<p><ul>
							<li><a href="http://api.godmc.org.uk/v0.1">http://api.godmc.org.uk/v0.1</a></li>
						</ul></p>
<!-- 						<p>In addition, follow up analyses including enrichments, colocalisations and MR can be queried programmatically through a Neo4j graph database:</p>
						<p><ul>
							<li>Web interface: <a href="http://hostname:port">hostname:port</a></li>
							<li>Bolt connection: <a href="bolt://hostname:port">hostname:port</a></li>
							<li>Raw downloads: <a href="/path/to/neo4jdb.zip">neo4jdb.zip</a></li>
						</ul></p>
 -->					</section>
					<section>
						<h3>Software</h3>
						<ul>
							<li><a href="https://github.com/mrcieu/godmc">https://github.com/mrcieu/godmc</a> - per-cohort analysis pipeline</li>
							<li><a href="https://github.com/mrcieu/godmc_phase1_analysis">https://github.com/mrcieu/godmc_phase1_analysis</a> - Stage one mQTL discovery</li>
							<li><a href="https://github.com/mrcieu/godmc_phase2_analysis">https://github.com/mrcieu/godmc_phase2_analysis</a> - Stage two mQTL meta analysis and follow up analyses</li>
							<li><a href="https://github.com/mrcieu/godmc-api">https://github.com/mrcieu/godmc-api</a> - GoDMC API</li>
							<li><a href="https://github.com/mrcieu/godmc_mqtldb">https://github.com/mrcieu/godmc_mqtldb</a> - This website</li>
							<li><a href="https://github.com/mrcieu/godmc-database">https://github.com/mrcieu/godmc-database</a> - Database underlying this website</li>
						</ul>
						<p>GoDMC is entering a new phase of analyses. We are very open to collaboration, and welcoming new cohorts. Please do get in touch, or submit a <a href="http://godmc.org.uk/projects.html">project proposal</a>.
					</section>
				</div>
			</section>

<?php 
include 'footer.php';
?>
