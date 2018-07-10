<?php 
include 'header.php';

if (isset($_GET['cpg']) && $_GET['cpg'] != '') {
	$query =  $_GET['cpg'];
	$showquery = $query;
} else {
	$query = '';
	$showquery = 'No CPG provided';
}
?>

<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>Visualization</h2>
					
				</header>
				<div class="container">
					<section>
						

            			<script language="javascript" src="//www.biodalliance.org/release-0.13/dalliance-compiled.js"></script>
						<script language="javascript">
						  new Browser({
						    chr:          '22',
						    viewStart:    30700000,
						    viewEnd:      30900000,

						    coordSystem: {
						      speciesName: 'Human',
						      taxon: 9606,
						      auth: 'GRCh',
						      version: '37',
						      ucscName: 'hg19'
						    },

						    sources:     [{name:                 'Genes',
						                   desc:                 'Gene structures from GENCODE 19',
						                   bwgURI:               'http://api.godmc.org.uk/v0.1/dl/bed/cpg/cg17242362',
						                   stylesheet_uri:       '//www.biodalliance.org/stylesheets/gencode.xml',
						                   collapseSuperGroups:  true,
						                   trixURI:              '//www.biodalliance.org/datasets/geneIndex.ix'},
						                  ],

						  });
						</script>

						<div id="svgHolder"></div>







					</section>
				</div>
			</section>

<?php 
include 'footer.php';
?>