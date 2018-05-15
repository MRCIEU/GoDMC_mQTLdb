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

	if ($query != '') {
	
	    $querylines = preg_split( "/(\r\n|\n|\r|,)/", $query );
		$table = 'other';

		// Check query type to determine table header display option	    
	    foreach( $querylines as $entry ){
	        if (preg_match("/^(?![rs|cg|chr\d:|\d:]).*$/", $entry, $output)) {
	            $table = 'gene';
	        } 
	    }

	}

?>


		<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>GoDMC Search</h2>
					<form action="/mqtldb/search-results.php" name="searchform" id="searchform" method="get">
						<div class="input-group" id="search-box">
							<textarea class="form-control" placeholder="Search the GoDMC database" id="search" name="query"><?php echo $query; ?></textarea>
			                
			                <span class="input-group-btn">
			                    <button class="btn btn-default" type="submit" id="search-button">
			                        <span class="glyphicon glyphicon-search"></span>
			                    </button>
			                </span>
			            </div>

			            <div id="filters">
			            	<h4 id="toggleheader">Filters <i class="fas fa-plus-circle"></i></h4>
			            	<div id="togglefilters">
					            <div class="input-block">
					            	<!-- P-VAL -->
					            	<label for="pval">P-VAL</label>
					            	<input type="text" id="pval" name="pval" value="<?php echo isset($_GET['pval']) ? $_GET['pval'] : '';?>"/>
					            </div>
					            <div class="input-block">
					            	<!-- CISTRANS -->
					            	<label for="cistrans">CISTRANS</label>
					            	<div class="select-wrapper">

					            		<?php 
					            			if (isset($_GET['cistrans']) && $_GET['cistrans'] != '') {
					            				$cistrans = $_GET['cistrans'];
					            			} else {
					            				$cistrans = '';
					            			}
					            		?>

						                <select name="cistrans" id="cistrans">
						                	<option value="">Select:</option>
										  	<option value="cis" <?php echo ($cistrans == 'cis' ? 'selected="selected"' : ''); ?>>cis</option>
										  	<option value="trans"<?php echo ($cistrans == 'trans' ? 'selected="selected"' : ''); ?>>trans</option>
										  	<option value="cistrans"<?php echo ($cistrans == 'cistrans' ? 'selected="selected"' : ''); ?>>both</option>
										</select>
									</div>
								</div>
								<div class="input-block">
									<!-- Columns -->
									<h4>Select table columns</h4>
									<?php  
											$posscols = array("se_mre", "chunk", "hetchisq", "num_studies", "pval_mre", "samplesize", "beta_a1", "freq_se", "hetpval", "hetisq",  "pval_are", "direction", "cistrans", "allele1", "allele2", "se_are", "snp", "pval", "tausq", "cpg", "beta_are_a1", "freq_a1", "se");

											foreach ($posscols as $col) {
												echo '<input type="checkbox" name="columns[]" value="'.$col.'" id="'.$col.'chk"><label for="'.$col.'chk">'.$col.'</label>';
											}


										?>


								</div>
							</div>
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
				                <?php if ($table == 'other') :
				                	$min_cols = array("rsid","a1","a2","name");
				                	if (isset($_GET['columns'])) {
				                		$colarray = $_GET['columns'];
				                		$all_cols = array_merge($min_cols, $colarray);
				                	} else {
				                		$colarray = array("cpg", "allele1", "allele2", "se","samplesize", "pval" );	
				                		$all_cols = array_merge($min_cols, $colarray);
				                	}
				                	// 
				                	// error_log(print_r($all_cols,true));
				                	
				                	foreach ($all_cols as $column) {
				                		echo "<th>{$column}</th>";
				                	} ?>
								<?php elseif ( $table == 'gene' ) : ?>
									<th style="width: 100px!important">gene type</th>
									<th>name</th>
									<th>stop original</th>
									<th>source</th>
									<th>chr</th>
									<th>start pos</th>
									<th>strand original</th>
									<th>stop pos</th>
									<th>start original</th>
								<?php endif; ?>
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

					function getAllUrlParams(url) {

					  // get query string from url (optional) or window
					  var queryString = url ? url.split('?')[1] : window.location.search.slice(1);

					  // we'll store the parameters here
					  var obj = {};

					  // if query string exists
					  if (queryString) {

					    // stuff after # is not part of query string, so get rid of it
					    queryString = queryString.split('#')[0];

					    // split our query string into its component parts
					    var arr = queryString.split('&');

					    for (var i=0; i<arr.length; i++) {
					      // separate the keys and the values
					      var a = arr[i].split('=');

					      // in case params look like: list[]=thing1&list[]=thing2
					      var paramNum = undefined;
					      var paramName = a[0].replace(/\[\d*\]/, function(v) {
					        paramNum = v.slice(1,-1);
					        return '';
					      });

					      // set parameter value (use 'true' if empty)
					      var paramValue = typeof(a[1])==='undefined' ? true : a[1];

					      // (optional) keep case consistent
					      paramName = paramName.toLowerCase();
					      paramValue = paramValue.toLowerCase();

					      // if parameter name already exists
					      if (obj[paramName]) {
					        // convert value to array (if still string)
					        if (typeof obj[paramName] === 'string') {
					          obj[paramName] = [obj[paramName]];
					        }
					        // if no array index number specified...
					        if (typeof paramNum === 'undefined') {
					          // put the value on the end of the array
					          obj[paramName].push(paramValue);
					        }
					        // if array index number specified...
					        else {
					          // put the value at that index number
					          obj[paramName][paramNum] = paramValue;
					        }
					      }
					      // if param name doesn't exist yet, set it
					      else {
					        obj[paramName] = paramValue;
					      }
					    }
					  }

					  return obj;
					}


					var query = getUrlParameter('query');
					var pval = getUrlParameter('pval');
					var cistrans = getUrlParameter('cistrans');
					var columnschoice = getAllUrlParams().columns;

					//var colarray = ["se_mre", "chunk", "hetchisq", "num_studies", "pval_mre", "samplesize", "beta_a1", "freq_se", "hetpval", "hetisq", "rsid", "pval_are", "direction", "cistrans", "allele1", "allele2", "a1", "a2", "se_are", "snp", "name", "pval", "tausq", "cpg", "beta_are_a1", "freq_a1", "se"];
					
					var min_cols = ["rsid","a1","a2","name"];

					if (columnschoice && columnschoice.length > 1) {
						var colarray = columnschoice;
						//var colarray = colarray.filter(function (item, pos) {return colarray.indexOf(item) == pos});
					} else {
						var colarray = ["cpg", "allele1", "allele2", "se","samplesize", "pval"];
					}
					var allcols = min_cols.concat(colarray);
					var colindex;
					var dyn_cols = [];
					for (index = 0; index < allcols.length; ++index) {
    					//console.log(colarray[index]);
    					item = {};
    					item ["data"] = allcols[index];
						dyn_cols.push(item);


					}	
					console.log('cols:',dyn_cols);

					if (! /^(?![rs|cg|chr\d:|\d:]).*$/.test(query) ) {
						var columns = dyn_cols;

				    } else if ( /^(?![rs|cg|chr\d:|\d:]).*$/.test(query) ) {
				    	var columns = [
				    		{ "data" : "gene_type" },
							{ "data" : "name" },
							{ "data" : "stop_original" },
							{ "data" : "source" },
							{ "data" : "chr" },
							{ "data" : "start_pos" },
							{ "data" : "strand_original" },
							{ "data" : "stop_pos" },
							{ "data" : "start_original" },
				    	];
				    }


				    $('#results').DataTable( {
				    	"processing": true,
					    //"oSearch": {"sSearch": search },
				    	"searching" : true,
				        //"serverSide": true,
				        "oLanguage": {
						   "sSearch": "Search within the table:",
						   "loadingRecords" : "Records loading",
						},

				   		"ajax": {
				        	"url": "serverside-api.php",
				        	"type": "GET",
				        	"dataSrc": "data",
				        	"data": { 
				        		"query": query,
				        		"pval": pval,
				        		"cistrans": cistrans,
				        		"columnschoice": colarray
				        		} ,
				        	"cache": false,
				         	"headers": {
							 	'Cache-Control': 'no-cache, no-store, must-revalidate', 
							 	'Pragma': 'no-cache', 
							 	'Expires': '0'
							}
				        },
				         "columns": dyn_cols,
				         "columnDefs": [
						    { "width": "10%", "targets": 0 }
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

					// var table = $('#example').DataTable();
 
					// $('#container').css( 'display', 'block' );
					// table.columns.adjust().draw();

				   
				} );
		    </script>

	</body>
</html>