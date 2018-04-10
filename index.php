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
		                <input type="text" class="form-control" placeholder="Search the GoDMC database" id="search" name="query">
		                <span class="input-group-btn">
		                    <button class="btn btn-default" type="submit" id="search-button">
		                        <span class="glyphicon glyphicon-search"></span>
		                    </button>
		                </span>
		            </div>
		            <div class="examples">
		                Example searches:
		                <a href="/mqtldb/search-results.php?query=rs7105015" data-original-title="" title="">rs7105015</a>,
		                <a href="/mqtldb/search-results.php?query=cg24851651" data-original-title="" title="">cg24851651</a>,
		                <a href="/mqtldb/search-results.php?query=6:16000000-25000000" data-original-title="" title="">6:16000000-25000000</a>
		            </div>
				</form>
			</div>
		</section>

<?php 
include 'footer.php';
?>