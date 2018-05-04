<?php 
include 'header.php';
?>

		<!-- Banner -->
		<section id="banner">
			<div class="inner">
				<h2>GoDMC Database</h2>
				<p style="width: 50%; margin-left: auto; margin-right: auto">Genetics of DNA Methylation Consortium (GoDMC)</p>
				<form action="/mqtldb/search-results.php" name="searchform" id="searchform" method="get">
					<div class="input-group">
		                <!-- <input type="text" class="form-control" placeholder="Search the GoDMC database" id="search" name="query"> -->
		                <textarea class="form-control" placeholder="Search the GoDMC database" id="search" name="query"></textarea>
		                <span class="input-group-btn">
		                    <button class="btn btn-default" type="submit" id="search-button">
		                        <span class="glyphicon glyphicon-search"></span>
		                    </button>
		                </span>
		            </div>
		            <div class="examples">
		                <strong>Possible searches:</strong>
		                <ul>
		                	<li>SNP name: e.g. <a href="/mqtldb/search-results.php?query=rs7105015" data-original-title="" title="">rs7105015</a></li>
		                	<li>CpG name: e.g. <a href="/mqtldb/search-results.php?query=cg24851651" data-original-title="" title="">cg24851651</a></li>
		                	<li>Chromosome position: e.g. <a href="/mqtldb/search-results.php?query=1:160000" data-original-title="" title="">1:160000</a></li>
		                	<li>Chromosome range: e.g. <a href="/mqtldb/search-results.php?query=cpg:6:160000-250000" data-original-title="" title="">cpg:6:16000000-25000000</a></li>
		                	<li>Gene name: e.g. <a href="/mqtldb/search-results.php?query=vincent" data-original-title="" title="">vincent</a></li>
		                	<li>Search on multiple variables by entering on separate lines or delimit with a comma: e.g. <a href="/mqtldb/search-results.php?query=cg19104072,cg16950941" data-original-title="" title="">cg19104072,cg16950941</a></li>
		                </ul>
		            </div>
				</form>
			</div>
		</section>

<?php 
include 'footer.php';
?>