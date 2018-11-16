<?php
require_once('authenticate.php');
?>
<?php 
include 'header.php';

?>

		<!-- Banner -->
		<section id="banner">
			<div class="inner">
				<h2>GoDMC Database</h2>
				<p style="width: 50%; margin-left: auto; margin-right: auto">Genetics of DNA Methylation Consortium (GoDMC)</p>
				<form action="<?php echo $hosturi; ?>/search" name="searchform" id="searchform" method="get">
					<div class="input-group" id="search-box">
		                <!-- <input type="text" class="form-control" placeholder="Search the GoDMC database" id="search" name="query"> -->
		                <input class="form-control" placeholder="Search the GoDMC database" id="search" name="query" style="width:100%;">
		                <span class="input-group-btn">
		                    <button class="btn btn-default" type="submit" id="search-button">
		                        <span class="glyphicon glyphicon-search"></span>
		                    </button>
		                </span>
		            </div>
		            <div class="examples">
		                <strong>Possible searches:</strong>
		                <a href="<?php echo $hosturi; ?>/search?query=rs7105015" data-original-title="" title="SNP">rs7105015</a>, 
						<a href="<?php echo $hosturi; ?>/search?query=cg24851651" data-original-title="" title="CpG site">cg24851651</a>,
						<a href="<?php echo $hosturi; ?>/search?query=1:160000" data-original-title="" title="Chromosome position">1:160000</a>,
						<a href="<?php echo $hosturi; ?>/search?query=cpg:6:160000-250000" data-original-title="" title="Chromosome range around CpG (or SNP)">cpg:6:16000000-25000000</a>,
						<a href="<?php echo $hosturi; ?>/search?query=A1BG" data-original-title="" title="Gene name">A1BG</a>,
						<a href="<?php echo $hosturi; ?>/search?query=cg19104072,cg16950941" data-original-title="" title="Search on multiple comma-delimited variables">cg19104072,cg16950941</a>
		            </div>
				</form>
			</div>
		</section>

		<section id="one" class="wrapper style1">
			<header class="major">
				<p>More information about GoDMC can be found on the <a href="http://godmc.org.uk/">project website</a></p>
			</header>
			<!--<div class="container">
				<div class="row">
					<div class="4u">
						<section class="special box">
							<i class="icon fa-area-chart major"></i>
							<h3>Justo placerat</h3>
							<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
						</section>
					</div>
					<div class="4u">
						<section class="special box">
							<i class="icon fa-refresh major"></i>
							<h3>Blandit quis curae</h3>
							<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
						</section>
					</div>
					<div class="4u">
						<section class="special box">
							<i class="icon fa-cog major"></i>
							<h3>Amet sed accumsan</h3>
							<p>Eu non col commodo accumsan ante mi. Commodo consectetur sed mi adipiscing accumsan ac nunc tincidunt lobortis.</p>
						</section>
					</div>
				</div>
			</div>-->
		</section>

<?php 
include 'footer.php';
?>