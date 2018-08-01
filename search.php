<?php
	include 'header.php';
	include 'datatables_inc.php';
?>

<?php 
	$table = 'default';

	if (isset($_GET['query']) && $_GET['query'] != '') {
		$query =  $_GET['query'];
		$showquery = $query;
	} else {
		$query = '';
		$showquery = 'no search term';
	}

	if ($query != '') {
	
	    $querylines = preg_split( "/(\r\n|\n|\r|,)/", $query );
		$table = 'default';

		// Check query type to determine table header display option	    
	    foreach( $querylines as $entry ){

	        if (preg_match("/^(?![rs|cg|chr\d:|\d:]).*$/", $entry, $output)) {
	            $table = 'gene';
	            error_log($table);
	        } elseif (preg_match("/^(cpg|snp)\:((\d+)\:(\d+)\-(\d+))$/", $entry, $output)) {
	        	$table = 'chrpos';
	        	error_log($table);
	        }
	    }

	}

?>


		<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>GoDMC Search</h2>
					<form action="<?php echo $hosturi; ?>/search-results.php" name="searchform" id="searchform" method="get">
						<div class="input-group" id="search-box">
							<textarea class="form-control" placeholder="Search the GoDMC database" id="search" name="query"><?php echo $query; ?></textarea>
			                
			                <span class="input-group-btn">
			                    <button class="btn btn-default" type="submit" id="search-button">
			                        <span class="glyphicon glyphicon-search"></span>
			                    </button>
			                </span>
			            </div>

			            <div class="filters">
			            	<h4 id="togglefiltersheader">Filter values <i class="fas fa-plus-circle"></i></h4>
			            	<div id="togglefilters">
					            <div id="filter-pval" class="input-block">
					            	<!-- P-VAL -->
					            	<label for="pval">P-VAL</label>
					            	<input type="text" id="pval" name="pval" value="<?php echo isset($_GET['pval']) ? $_GET['pval'] : '';?>"/>
					            </div>
					            <div id="filter-cistrans" class="input-block">
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
						                	<option value="both"<?php echo ($cistrans == '' ? 'selected="selected"' : ''); ?>>Default</option>
										  	<option value="cis" <?php echo ($cistrans == 'cis' ? 'selected="selected"' : ''); ?>>Cis</option>
										  	<option value="trans"<?php echo ($cistrans == 'trans' ? 'selected="selected"' : ''); ?>>Trans</option>
										</select>
									</div>
								</div>
								<div id="filter-clumped" class="input-block">
					            	<!-- CLUMPED -->
					            	<label for="clumped">CLUMPED</label>
					            	<div class="select-wrapper">
					            		<?php 
					            			if (isset($_GET['clumped']) && $_GET['clumped'] != '') {
					            				$clumped = $_GET['clumped'];
					            			} else {
					            				$clumped = '';
					            			}
					            		?>
						                <select name="clumped" id="clumped">
						                	<option value="">Select:</option>
						                	<option value=""<?php echo ($clumped == '' ? 'selected="selected"' : ''); ?>>Default</option>
										  	<option value="1" <?php echo ($clumped == '1' ? 'selected="selected"' : ''); ?>>Yes</option>
										  	<option value="0"<?php echo ($clumped == '0' ? 'selected="selected"' : ''); ?>>No</option>
										</select>
									</div>

					            </div>
							</div>
						</div>
						<div class="filters">
							<h4 id="togglecolsheader">Filter table colums <i class="fas fa-plus-circle"></i></h4>
			            	<div id="togglecols">
								<div id="filter-cols" class="input-block">
									<!-- Columns -->
									<h4>Select table columns</h4>
									<?php  
											$posscols = array("se_mre", "chunk", "hetchisq", "num_studies", "pval_mre", "samplesize", "beta_a1", "freq_se", "hetpval", "hetisq",  "pval_are", "direction", "cistrans","se_are", "snp", "pval", "tausq", "cpg", "beta_are_a1", "freq_a1", "se", "clumped");

											if (isset($_GET['columns'])) {
												$cols = $_GET['columns'];
											} else {
												$cols = array();
											}

											foreach ($posscols as $col) {
												$checked = '';
												if (in_array($col,$cols)) $checked = 'checked="checked"';						

												if ($table == 'chrpos' and in_array($col, ['name'])) {
													echo '<input type="checkbox" name="columns[]" value="'.$col.'" id="'.$col.'chk" disabled="disabled" '.$checked.'><label for="'.$col.'chk">'.$col.'</label>';
												} else {
													echo '<input type="checkbox" name="columns[]" value="'.$col.'" id="'.$col.'chk" '.$checked.'><label for="'.$col.'chk">'.$col.'</label>';	
												}
												
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
				                <?php 
				                	if ($table == 'default') :
					                	$min_cols = array("rsid","a1","a2","name");
					                	if (isset($_GET['columns'])) {
					                		$colarray = $_GET['columns'];
					                		$all_cols = array_merge($min_cols, $colarray);
					                	} else {
					                		$colarray = array("cpg", "beta_a1",  "se", "samplesize", "pval", "cistrans", "clumped", "hetisq", "direction" );	
					                		$all_cols = array_merge($min_cols, $colarray);
					                	}
					                	foreach ($all_cols as $column) {
					                		echo "<th>{$column}</th>";
					                	} 
					                elseif ($table == 'chrpos') :
					                	$min_cols = array("rsid","a1","a2","name");
					                	if (isset($_GET['columns'])) {
					                		$colarray = $_GET['columns'];
					                		$all_cols = array_merge($min_cols, $colarray);
					                	} else {
					                		$colarray = array("cpg", "beta_a1",  "se", "samplesize", "pval", "cistrans", "clumped", "hetisq", "direction" );
					                		$all_cols = array_merge($min_cols, $colarray);
					                	}			 
					                	$all_cols = array_diff($all_cols, ['name']);
               	
					                	foreach ($all_cols as $column) {
					                		echo "<th>{$column}</th>";
					                	} 	
									elseif ( $table == 'gene' ) : ?>
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


					function getURLParam(key,target){
					    var values = [];
					    if (!target) target = decodeURIComponent(location.search);

					    key = key.replace(/[\[]/, "\\\[").replace(/[\]]/, "\\\]");

					    var pattern = key + '=([^&#]+)';
					    var o_reg = new RegExp(pattern,'ig');
					    while (true){
					        var matches = o_reg.exec(target);
					        if (matches && matches[1]){
					            values.push(matches[1]);
					        } else {
					            break;
					        }
					    }

					    if (!values.length){
					        return null;   
					    } else {
					        return values.length == 1 ? values[0] : values;
					    }
					}

					if (!Array.prototype.remove) {
					  Array.prototype.remove = function(vals, all) {
					    var i, removedItems = [];
					    if (!Array.isArray(vals)) vals = [vals];
					    for (var j=0;j<vals.length; j++) {
					      if (all) {
					        for(i = this.length; i--;){
					          if (this[i] === vals[j]) removedItems.push(this.splice(i, 1));
					        }
					      }
					      else {
					        i = this.indexOf(vals[j]);
					        if(i>-1) removedItems.push(this.splice(i, 1));
					      }
					    }
					    return removedItems;
					  };
					}

					var query = getUrlParameter('query');				
					var pval = getUrlParameter('pval');
					var cistrans = getUrlParameter('cistrans');
					if (cistrans == 'both') {
						cistrans = '';
					}
					var clumped = getUrlParameter('clumped');
					var columnschoice = getURLParam('columns[]')

					//var colarray = ["se_mre", "chunk", "hetchisq", "num_studies", "pval_mre", "samplesize", "beta_a1", "freq_se", "hetpval", "hetisq", "rsid", "pval_are", "direction", "cistrans", "allele1", "allele2", "a1", "a2", "se_are", "snp", "name", "pval", "tausq", "cpg", "beta_are_a1", "freq_a1", "se"];
					
					if (/^(cpg|snp)\:((\d+)\:(\d+)\-(\d+))$/.test(query)) {
						var min_cols = ["rsid","a1","a2"];
						if (columnschoice && columnschoice.length > 1) {
							var colarray = columnschoice;
							// Remove cols not returned by the API for this search
							colarray.remove(['name']);
							//var colarray = colarray.filter(function (item, pos) {return colarray.indexOf(item) == pos});
						} else {
							//var colarray = ["cpg", "se","samplesize", "pval"];
							var colarray = ["cpg", "beta_a1", "se", "samplesize", "pval", "cistrans", "clumped", "hetisq", "direction" ];
						}
					} else if (! /^(?![rs|cg|chr\d:|\d:]).*$/.test(query) ) {
						var min_cols = ["rsid","a1","a2","name"];
						if (columnschoice && columnschoice.length > 1) {
							var colarray = columnschoice;
							//var colarray = colarray.filter(function (item, pos) {return colarray.indexOf(item) == pos});
						} else {
							var colarray = ["cpg", "beta_a1", "se", "samplesize", "pval", "cistrans", "clumped", "hetisq", "direction" ];
						}
					}



					var allcols = min_cols.concat(colarray);
					
					var colindex;
					var dyn_cols = [];
					for (index = 0; index < allcols.length; ++index) {
    					item = {};
    					item ["data"] = allcols[index];
    					// if (allcols[index] == 'clumped' || allcols[index] == 'cistrans') {
    					// 	item ["render"] = function (data, type, row) {
         //                  		return (data === true) ? 'true' : 'false';}
         //                  	}
                        if (allcols[index] == 'rsid') {
                        	item ["render"] = function (data, type, row) {
                          		return '<a href="browser.php?cpg='+row.cpg+'" class="dalliance">' + data + '</a>';
                          	}
                        }
						dyn_cols.push(item);
					}	

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
				        		"clumped": clumped,
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
				    
				   
				} );
		    </script>

	</body>
</html>