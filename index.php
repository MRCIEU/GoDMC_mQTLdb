<?php
require_once('authenticate.php');
?>
<?php 
include 'header.php';

?>

		<!-- Banner -->
		<section id="banner">
			<div class="inner">
				<p><i>Cis</i> and <i>trans</i> meta-analysis results from genome-wide scans of 420,509 DNA methylation sites</p>
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
		                Example searches:<br/>
		                <a href="<?php echo $hosturi; ?>/search?query=rs7105015" data-original-title="" title="SNP">rs7105015</a> <br/>
						<a href="<?php echo $hosturi; ?>/search?query=snp:6:16000000-17000000" data-original-title="" title="Chromosome position">snp:6:16000000-17000000</a><br/>
						<a href="<?php echo $hosturi; ?>/search?query=cg24851651" data-original-title="" title="CpG site">cg24851651</a><br/>
						<a href="<?php echo $hosturi; ?>/search?query=cpg:6:16000000-25000000" data-original-title="" title="Chromosome range around CpG (or SNP)">cpg:6:16000000-17000000</a><br/>
						<!-- <a href="<?php echo $hosturi; ?>/search?query=A1BG" data-original-title="" title="Gene name">A1BG</a>, -->
						<a href="<?php echo $hosturi; ?>/search?query=cg19104072,cg16950941" data-original-title="" title="Search on multiple comma-delimited variables">cg19104072,cg16950941</a>
		            </div>
				</form>
			</div>
		</section>
<!-- 		<section id="one" class="wrapper style1">
					

		</section>
		<section id="one" class="wrapper style1">
 -->			<!--<div class="container">
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
		<!-- </section> -->

<?php 
include 'footer.php';
?>
