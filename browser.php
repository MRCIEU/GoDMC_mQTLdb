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


// Get info on cgp

$str = file_get_contents('http://api.godmc.org.uk/v0.1/info/cpg/'.$query);
$json = json_decode($str, true); // decode the JSON into an associative array
$chr = $json[0]['chr'];
$start = intval($json[0]['pos']) - 500000;
$end = intval($json[0]['pos']) + 500000;
if (intval($start) < 1) {
	$start = 1;
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
						  var browser = new Browser({		   

						    chr:          '<?php echo $chr; ?>',
						    viewStart:    <?php echo $start; ?>,
						    viewEnd:      <?php echo $end; ?>,
						    cookieKey:    'human-grc_h37',
                                                    maxHeight:    '600',
							
						//	chr:          '3',
						//    viewStart:    16853842,
						//    viewEnd:      16876919,
						//    cookieKey:    'human-grc_h37',   

							coordSystem: {
						    	speciesName: 'Human',
						    	taxon: 9606,
						    	auth: 'GRCh',
						    	version: '37',
						    	ucscName: 'hg37',
						    },

						    sources: [ 
						    	
						    	{	name:                 'Genome',
									twoBitURI:            '//www.biodalliance.org/datasets/hg38.2bit',
									tier_type:            'sequence'},

                                                                {name:                 'mQTL for <?php echo $query; ?>',
                                                                desc:                 '<?php echo $query; ?>',
                                                                //uri:               '<?php echo $hosturi; ?>/data/<?php echo $query; ?>.bed',
                                                                uri:               'http://api.godmc.org.uk/v0.1/dl/bed/cpg/<?php echo $query; ?>',
                                                                tier_type:                        'memstore',
                                                                stylesheet_uri:  '<?php echo $hosturi; ?>/scatter.xml',
                                                                payload:                          'bed'},

                                                                {name:                 'GWAS catalog',
                                                                desc:                 'Hits from the NHGRI-EBI GWAS catalog',
                                                                bwgURI:               '<?php echo $hosturi; ?>/data/gwasCatalog_sorted.bb',
                                                                stylesheet_uri:  '<?php echo $hosturi; ?>/data/dstyle_GWAShits.xml',
                                                                },

                                                                {name:                 'EWAS catalog',
                                                                desc:                 'Hits from the MRC-IEU EWAS catalog',
                                                                bwgURI:               '<?php echo $hosturi; ?>/data/ewasCatalog_sorted.bb',
                                                                stylesheet_uri:  '<?php echo $hosturi; ?>/data/dstyle_xWAShits.xml',
                                                                },

                                                                {name:                 'ChromHMM',
                                                                desc:                 'Chromatin state from ChromHMM',
                                                                bwgURI:               '<?php echo $hosturi; ?>/data/gm12878.ChromHMM.bb',
                                                                stylesheet_uri:  '<?php echo $hosturi; ?>/data/dstyle_ChromHMM.xml',
                                                                },

							   {	name:                 'Repeats',
									desc:                 'Repeat annotation from Ensembl',
									bwgURI:               '//www.biodalliance.org/datasets/repeats.bb',
									stylesheet_uri:       '//www.biodalliance.org/stylesheets/bb-repeats.xml'},

								{	name:                 'Conservation',
									desc:                 'Conservation', 
									bwgURI:               '//www.biodalliance.org/datasets/phastCons46way.bw',
									noDownsample:         true},

//						    	{ 	name: '<?php echo $query; ?>',
//                   					bwgURI: '<?php echo $hosturi; ?>/data/<?php echo $query; ?>.bb',
//									stylesheet_uri:  '<?php echo $hosturi; ?>/scatter.xml',
//									collapseSuperGroups:  true,
//                   				},
								

                                                                {       name:                 'Genes',
                                                                        desc:                 'Gene structures from GENCODE 19',
                                                                        bwgURI:               '//www.biodalliance.org/datasets/gencode.bb',
                                                                        stylesheet_uri:       '//www.biodalliance.org/stylesheets/gencode.xml',
                                                                        collapseSuperGroups:  true,
                                                                        trixURI:              '//www.biodalliance.org/datasets/geneIndex.ix'
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
