<?php
	include 'header.php';
	include 'datatables_inc.php';
?>



		<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>GoDMC Search</h2>
					<p><strong>Results for </strong> 
						<?php 
						if (isset($_GET['query']) && $_GET['query'] != '') {
							echo $_GET['query'];
						} else {
							
							echo '<em>no search term</em>';
						}
						?>
					</p>
				</header>
				<div class="container">
					<section>
						
						<table class="display nowrap" cellspacing="0" id="results">
				            <thead>
				                <tr>
				                    <th>Timepoint</th>
				                    <th>SNP</th>
				                    <th>SNP Chr</th>
				                    <th>SNP Pos</th>
				                    <th>A1</th>
				                    <th>A2</th>
				                    <th>MAF</th>
				                    <th>CpG</th>
				                    <th>CpG Chr</th>
				                    <th>CpG Pos</th>
				                    <th>beta</th>
				                    <th>t-stat</th>
				                    <th>Effect Size</th>
				                    <th>p-value</th>
				                    <th>Trans</th>
				                    <!-- <th>Timepoint2</th> -->
				                </tr>
				            </thead>

				            <!-- Datatables embeds the table body dynamically -->

						</table>
            
					</section>
					<section>
					<div>
						<p id="reference"></p>
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

						    sources:     [{name:                 'Genome',
						                   twoBitURI:            '//www.biodalliance.org/datasets/hg19.2bit',
						                   tier_type:            'sequence'},
						                  {name:                 'Genes',
						                   desc:                 'Gene structures from GENCODE 19',
						                   bwgURI:               '//www.biodalliance.org/datasets/gencode.bb',
						                   stylesheet_uri:       '//www.biodalliance.org/stylesheets/gencode.xml',
						                   collapseSuperGroups:  true,
						                   trixURI:              '//www.biodalliance.org/datasets/geneIndex.ix'},
						                  {name:                 'Repeats',
						                   desc:                 'Repeat annotation from Ensembl',
						                   bwgURI:               '//www.biodalliance.org/datasets/repeats.bb',
						                   stylesheet_uri:       '//www.biodalliance.org/stylesheets/bb-repeats.xml'},
						                  {name:                 'Conservation',
						                   desc:                 'Conservation', 
						                   bwgURI:               '//www.biodalliance.org/datasets/phastCons46way.bw',
						                   noDownsample:         true}],

						  });
						</script>

						<div id="svgHolder"></div>

					</div>
				</section>
				</div>
			</section>

			

					

		<!-- Footer -->
			<footer id="footer">
				<div class="container">
					<div class="row double">
						<div class="6u">
							<div class="row collapse-at-2">
								<div class="6u">
									<h3>Accumsan</h3>
									<ul class="alt">
										<li><a href="#">Nascetur nunc varius</a></li>
										<li><a href="#">Vis faucibus sed tempor</a></li>
										<li><a href="#">Massa amet lobortis vel</a></li>
										<li><a href="#">Nascetur nunc varius</a></li>
									</ul>
								</div>
								<div class="6u">
									<h3>Faucibus</h3>
									<ul class="alt">
										<li><a href="#">Nascetur nunc varius</a></li>
										<li><a href="#">Vis faucibus sed tempor</a></li>
										<li><a href="#">Massa amet lobortis vel</a></li>
										<li><a href="#">Nascetur nunc varius</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="6u">
							<h2>Aliquam Interdum</h2>
							<p>Blandit nunc tempor lobortis nunc non. Mi accumsan. Justo aliquet massa adipiscing cubilia eu accumsan id. Arcu accumsan faucibus vis ultricies adipiscing ornare ut. Mi accumsan justo aliquet.</p>
							<ul class="icons">
								<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
								<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
								<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
								<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
								<li><a href="#" class="icon fa-pinterest"><span class="label">Pinterest</span></a></li>
							</ul>
						</div>
					</div>
					<ul class="copyright">
						<li>&copy; Untitled. All rights reserved.</li>
						<li>Design: <a href="http://templated.co">TEMPLATED</a></li>
						<li>Images: <a href="http://unsplash.com">Unsplash</a></li>
					</ul>
				</div>
			</footer>
			<script type="text/javascript" class="init">
		        $(document).ready(function() {

		        	

					var getUrlParameter = function getUrlParameter(sParam) {
					    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
					        sURLVariables = sPageURL.split('&'),
					        sParameterName,
					        i;

					    for (i = 0; i < sURLVariables.length; i++) {
					        sParameterName = sURLVariables[i].split('=');

					        if (sParameterName[0] === sParam) {
					            return sParameterName[1] === undefined ? true : sParameterName[1];
					        }
					    }
					};

					var query = getUrlParameter('query');
					
					// if (typeof query == 'undefined') {
					// 	query = '';

					// }

				    $('#results').DataTable( {
				    	"processing": true,
					    //"oSearch": {"sSearch": search },
				    	"searching" : true,
				        "serverSide": true,
				        "oLanguage": {
						   "sSearch": "Search within the table:"
						},

				        "ajax": {
				        	"url": "serverside.php",
				        	"type": "GET",
				        	"data": { "query": query } ,
				        	"cache": false,
				        	"headers": {
								'Cache-Control': 'no-cache, no-store, must-revalidate', 
								'Pragma': 'no-cache', 
								'Expires': '0'
							}
				        },
				        lengthMenu: [
				            [ 10, 25, 50 ],
				            [ '10 rows', '25 rows', '50 rows' ]
				        ],
				        dom: 'Bfrtip',
				        buttons: ['pageLength',
				        		{
				                    extend: 'csv',
				                    text: 'Export as CSV',
				                    filename: 'export'
				                }]
				    } );
				    
				    $(document).on("click", "a.daliance", function(e){
					    var txt = $(this).text();
					    console.log(txt);
					    $('#reference').html(txt);

					    e.preventDefault();
					});

				   
				} );
		    </script>

	</body>
</html>