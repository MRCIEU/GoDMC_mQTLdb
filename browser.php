<?php 
include 'header.php';
ini_set("auto_detect_line_endings", true);


if (isset($_GET['cpg']) && $_GET['cpg'] != '') {
	$query =  $_GET['cpg'];
	$cpg = $query;
} else {
	$query = '';
	$cpg = 'No CPG provided';
}

if ($query != '') {
	$filenamebb = './data/'.$query.'.bb';
}


// Get BIGBED file if not already downloaded and write to filesystem
if (file_exists($filenamebb)) {
    //echo "The file $filenamebb exists";
} else {
    //echo "The file $filenamebb does not exist, downloading.";
    $url = 'http://api.godmc.org.uk/v0.1/dl/bigbed/cpg/'.$query;
	$file = basename($url);
	$fp = fopen($filenamebb, 'w');
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_FILE, $fp);
	$data = curl_exec($ch);
	curl_close($ch);
	fclose($fp);
}

// Read first line of BED file to get CHR and start/end values
$handle = fopen("http://api.godmc.org.uk/v0.1/dl/bed/cpg/".$query, "r");
$line = fgets($handle);
$pieces = explode("\t", $line);
$chr = str_replace("chr","",$pieces[0]);
$start = $pieces[1];
$end = $pieces[2];


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

						    chr:          '<?php echo $chr; ?>',
						    viewStart:    <?php echo $start; ?>,
						    //viewEnd:      <?php echo $end; ?>,
						    viewEnd:      99999999,
						    cookieKey:    'human-grc_h38',   

							coordSystem: {
						    	speciesName: 'Human',
						    	taxon: 9606,
						    	auth: 'GRCh',
						    	version: '38',
						    	ucscName: 'hg38',
						    },

						    sources: [ 
						    	
						    	{	name:                 'Genome',
									twoBitURI:            '//www.biodalliance.org/datasets/hg38.2bit',
									tier_type:            'sequence'},

								{	name:                 'Genes',
									desc:                 'Gene structures from GENCODE 19',
									bwgURI:               '//www.biodalliance.org/datasets/gencode.bb',
									stylesheet_uri:       '//www.biodalliance.org/stylesheets/gencode.xml',
									collapseSuperGroups:  true,
									trixURI:              '//www.biodalliance.org/datasets/geneIndex.ix'},

							   {	name:                 'Repeats',
									desc:                 'Repeat annotation from Ensembl',
									bwgURI:               '//www.biodalliance.org/datasets/repeats.bb',
									stylesheet_uri:       '//www.biodalliance.org/stylesheets/bb-repeats.xml'},

								{	name:                 'Conservation',
									desc:                 'Conservation', 
									bwgURI:               '//www.biodalliance.org/datasets/phastCons46way.bw',
									noDownsample:         true},

						    	{ 	name: '<?php echo $query; ?>',
                   					bwgURI: '//<?php echo $hosturi; ?>/data/<?php echo $query; ?>.bb',
									stylesheet_uri:  '//<?php echo $hosturi; ?>/scatter.xml',
									collapseSuperGroups:  true,
                   				},	
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