<?php
	include 'header.php';
	include 'datatables_inc.php';
?>

<?php 
	if (isset($_GET['query']) && $_GET['query'] != '') {
		$query =  $_GET['query'];
		$showquery = $query;
	} else {
		$query = '';
		$showquery = 'no search term';
	}
?>


		<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>GoDMC Search</h2>
					<form action="/mqtldb/search-results.php" name="searchform" id="searchform" method="get">
						<div class="input-group">
							<textarea class="form-control" placeholder="Search the GoDMC database" id="search" name="query"><?php echo $query; ?></textarea>
			                
			                <span class="input-group-btn">
			                    <button class="btn btn-default" type="submit" id="search-button">
			                        <span class="glyphicon glyphicon-search"></span>
			                    </button>
			                </span>
			            </div>
		        	</form>
					<p><strong>Results for </strong> 
						<em><?php echo $showquery; ?></em>
					</p>
				</header>
				<div class="container results">
					<section>
						
						<table class="display nowrap" cellspacing="0" id="results">
				            <thead>
				                <tr>
				                    <th>se_mre</th>
									<th>chunk</th>
									<th>hetchisq</th>
									<th>num_studies</th>
									<th>pval_mre</th>
									<th>samplesize</th>
									<th>beta_a1</th>
									<th>freq_se</th>
									<th>hetpval</th>
									<th>hetisq</th>
									<th>rsid</th>
									<th>pval_are</th>
									<th>direction</th>
									<th>cistrans</th>
									<th>a1</th>
									<th>a2</th>
									<th>se_are</th>
									<th>snp</th>
									<th>pval</th>
									<th>tausq</th>
									<th>cpg</th>
									<th>beta_are_a1</th>
									<th>freq_a1</th>
									<th>se</th>
				                </tr>
				            </thead>

				            <!-- Datatables embeds the table body dynamically -->

						</table>
            
					</section>
					<section>
					
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
				        //"serverSide": true,
				        "oLanguage": {
						   "sSearch": "Search within the table:",
						   "loadingRecords" : "Records loading",
						},


				   //      "ajax": {
				   //      	"url": "serverside-api.php",
				   //      	"type": "GET",
				   //      	"data": { "query": query } ,
				   //      	"cache": false,
				   //      	"headers": {
							// 	'Cache-Control': 'no-cache, no-store, must-revalidate', 
							// 	'Pragma': 'no-cache', 
							// 	'Expires': '0'
							// }
				   //      },

				   		"ajax": {
				        	"url": "serverside-api.php",
				        	"type": "GET",
				        	"dataSrc": "data",
				        	"data": { "query": query } ,
				        	"cache": false,
				         	"headers": {
							 	'Cache-Control': 'no-cache, no-store, must-revalidate', 
							 	'Pragma': 'no-cache', 
							 	'Expires': '0'
							}
				        },
				         "columns": [
				            { "data": "se_mre" },
							{ "data": "chunk" },
							{ "data": "hetchisq" },
							{ "data": "num_studies" },
							{ "data": "pval_mre" },
							{ "data": "samplesize" },
							{ "data": "beta_a1" },
							{ "data": "freq_se" },
							{ "data": "hetpval" },
							{ "data": "hetisq" },
							{ "data": "rsid" },
							{ "data": "pval_are" },
							{ "data": "direction" },
							{ "data": "cistrans" },
							{ "data": "a1" },
							{ "data": "a2" },
							{ "data": "se_are" },
							{ "data": "snp" },
							{ "data": "pval" },
							{ "data": "tausq" },
							{ "data": "cpg" },
							{ "data": "beta_are_a1" },
							{ "data": "freq_a1" },
							{ "data": "se" },
				        ],
				        lengthMenu: [
				            [ 10, 25, 50, 100 ],
				            [ '10 rows', '25 rows', '50 rows', '100 rows' ]
				        ],
				        
				        dom: 'Bfrtip',
				        buttons: ['pageLength',
			        		{
			                    extend: 'csv',
			                    text: 'Export as CSV',
			                    filename: 'export'
			                }],
			            
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