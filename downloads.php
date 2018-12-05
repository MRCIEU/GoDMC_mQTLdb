<?php
require_once('authenticate.php');
?>
<?php 
include 'header.php';
?>

<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>Downloads</h2>
					
				</header>
				<div class="container">
					<section>
				<p>Downloads are supported using the GoDMC mQTLdb application programming interface (API). This is easily accessed using R, as demonstrated in the following example:</p>						
            
				<pre>
					<code>if(!require(jsonlite)){
    install.packages("jsonlite")
}
library(jsonlite)
mqtl_data <- fromJSON("http://api.godmc.org.uk/v0.1/assoc_meta/cpg/cg17242362")</code>
				</pre>
				<hr>
					<p>This is an API which is used to pull down results from the GoDMC meta analysis of genetic influences on DNA methylation levels.</p>
					<p>Most methods are using <code>get</code> - you put in a specific query and the result is returned</p>
					<p>There are also more complex queries that can be obtained using <code>post</code>. Here a json file needs to be built that describes the query</p>
					<p>All results are json format</p>
					<hr>
					<h2><a id="user-content-get-a-list-of-all-cohorts" class="anchor" aria-hidden="true" href="#get-a-list-of-all-cohorts">
					</a>Get a list of all cohorts</h2>
					<pre><code>/v0.1/cohorts
					</code></pre>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/cohorts" rel="nofollow">http://api.godmc.org.uk/v0.1/cohorts</a></p>
					<hr>
					<h2><a id="user-content-get-mqtls-for-a-specific-snp-or-cpg" class="anchor" aria-hidden="true" href="#get-mqtls-for-a-specific-snp-or-cpg">
					</a>Get mQTLs for a specific SNP or CpG</h2>
					<pre><code>/v0.1/assoc_meta/cpg/&lt;cpgid&gt;
/v0.1/assoc_meta/rsid/&lt;rsid&gt;
/v0.1/assoc_meta/snp/&lt;snpid&gt;</code></pre>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/assoc_meta/cpg/cg17242362" rel="nofollow">http://api.godmc.org.uk/v0.1/assoc_meta/cpg/cg17242362</a></p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/assoc_meta/rsid/rs6602381" rel="nofollow">http://api.godmc.org.uk/v0.1/assoc_meta/rsid/rs6602381</a></p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/assoc_meta/snp/chr10:10000018:SNP" rel="nofollow">http://api.godmc.org.uk/v0.1/assoc_meta/snp/chr10:10000018:SNP</a></p>
					<hr>
					<p>The -log10(p-values) for all associations with a particular SNP or CpG can be obtained in bed or BigBed format as:</p>
					<pre><code>/v0.1/dl/&lt;format&gt;/cpg/&lt;cpgid&gt;
/v0.1/dl/&lt;format&gt;/snp/&lt;snpid&gt;</code></pre>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/dl/bigbed/cpg/cg17242362" rel="nofollow">http://api.godmc.org.uk/v0.1/dl/bigbed/cpg/cg17242362</a></p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/dl/bed/snp/chr10:10000018:SNP" rel="nofollow">http://api.godmc.org.uk/v0.1/dl/bed/snp/chr10:10000018:SNP</a></p>
					<hr>
					<h2><a id="user-content-get-all-mqtls-where-a-snp-or-cpg-is-within-some-range" class="anchor" aria-hidden="true" href="#get-all-mqtls-where-a-snp-or-cpg-is-within-some-range">
					</a>Get all mQTLs where a SNP or CpG is within some range</h2>
					<pre><code>/v0.1/assoc_meta/range/&lt;attribute&gt;/&lt;chrrange&gt;</code></pre>
					<p>Note: this is a bit slow due to database, needs to be improved</p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/assoc_meta/range/cpg/10:10000000-10100000" rel="nofollow">http://api.godmc.org.uk/v0.1/assoc_meta/range/cpg/10:10000000-10100000</a></p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/assoc_meta/range/snp/10:10000000-10100000" rel="nofollow">http://api.godmc.org.uk/v0.1/assoc_meta/range/snp/10:10000000-10100000</a></p>
					<hr>
					<h2><a id="user-content-get-all-mqtls-where-a-snp-or-cpg-is-within-25kb-of-a-gene-start-site" class="anchor" aria-hidden="true" href="#get-all-mqtls-where-a-snp-or-cpg-is-within-25kb-of-a-gene-start-site">
					</a>Get all mQTLs where a SNP or CpG is within 25kb of a gene start site</h2>
					<pre><code>/v0.1/assoc_meta/gene/&lt;attribute&gt;/&lt;gene&gt;</code></pre>
					<p>Note: this is a bit slow due to database, needs to be improved</p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/assoc_meta/gene/cpg/A1BG" rel="nofollow">http://api.godmc.org.uk/v0.1/assoc_meta/gene/cpg/A1BG</a></p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/assoc_meta/gene/snp/A1BG" rel="nofollow">http://api.godmc.org.uk/v0.1/assoc_meta/gene/snp/A1BG</a></p>
					<hr>
					<h2><a id="user-content-get-a-list-of-all-genes" class="anchor" aria-hidden="true" href="#get-a-list-of-all-genes">
					</a>Get a list of all genes</h2>
					<pre><code>/v0.1/list/gene</code></pre>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/list/gene" rel="nofollow">http://api.godmc.org.uk/v0.1/list/gene</a></p>
					<hr>
					<h2><a id="user-content-get-information-about-a-snp-cpg-or-gene" class="anchor" aria-hidden="true" href="#get-information-about-a-snp-cpg-or-gene">
					</a>Get information about a SNP, CpG or gene</h2>
					<pre><code>/v0.1/info/&lt;attribute&gt;/&lt;item&gt;
					</code></pre>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/info/cpg/cg26866020" rel="nofollow">http://api.godmc.org.uk/v0.1/info/cpg/cg26866020</a></p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/info/gene/A1BG" rel="nofollow">http://api.godmc.org.uk/v0.1/info/gene/A1BG</a></p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/info/rsid/rs234" rel="nofollow">http://api.godmc.org.uk/v0.1/info/rsid/rs234</a></p>
					<p>e.g. <a href="http://api.godmc.org.uk/v0.1/info/snp/chr7:105561135:SNP" rel="nofollow">http://api.godmc.org.uk/v0.1/info/snp/chr7:105561135:SNP</a></p>
					<hr>
					<h2><a id="user-content-more-complex-queries" class="anchor" aria-hidden="true" href="#more-complex-queries">
					</a>More complex queries</h2>
					<p>There is a limit to the length of a URL, so if you want to extract a large list of SNPs then we need to post the query details through a file. This can be done through <code>curl</code> e.g. using:</p>
					<div class="highlight highlight-source-shell"><pre>curl -i -H <span class="pl-s"><span class="pl-pds">"</span>Content-Type: application/json<span class="pl-pds">"</span></span> -X POST -d @test.json http://api.godmc.org.uk/v0.1/query</pre></div>
					<p>Here we are posting the <code>test.json</code> file that contains the details of the query. Examples below</p>
					<hr>
					<p>Query multiple SNPs, <code>test.json</code>:</p>
					<div class="highlight highlight-source-json"><pre>{
					    <span class="pl-s"><span class="pl-pds">"</span>snps<span class="pl-pds">"</span></span>: [<span class="pl-s"><span class="pl-pds">"</span>chr10:100003302:SNP<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>chr10:99954538:INDEL<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>chr10:99981275:SNP<span class="pl-pds">"</span></span>]
					}</pre></div>
					<p>Query multiple rsids, <code>test.json</code>:</p>
					<div class="highlight highlight-source-json"><pre>{
					    <span class="pl-s"><span class="pl-pds">"</span>rsids<span class="pl-pds">"</span></span>: [<span class="pl-s"><span class="pl-pds">"</span>rs6602381<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>rs72828459<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>rs234<span class="pl-pds">"</span></span>]
					}</pre></div>
					<p>Query multiple CpGs, <code>test.json</code>:</p>
					<div class="highlight highlight-source-json"><pre>{
					    <span class="pl-s"><span class="pl-pds">"</span>cpgs<span class="pl-pds">"</span></span>: [<span class="pl-s"><span class="pl-pds">"</span>cg14380065<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>cg12715136<span class="pl-pds">"</span></span>]
					}</pre></div>
					<p>Query mQTLs for rsids and CpGs, (i.e. get all results where an mQTL contains a SNP and a CpG specified in the lists), <code>test.json</code>:</p>
					<div class="highlight highlight-source-json"><pre>{
					    <span class="pl-s"><span class="pl-pds">"</span>rsids<span class="pl-pds">"</span></span>: [<span class="pl-s"><span class="pl-pds">"</span>rs6602381<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>rs72828459<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>rs234<span class="pl-pds">"</span></span>],
					    <span class="pl-s"><span class="pl-pds">"</span>cpgs<span class="pl-pds">"</span></span>: [<span class="pl-s"><span class="pl-pds">"</span>cg14380065<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>cg12715136<span class="pl-pds">"</span></span>]
					}</pre></div>
					<p>As in the third example but set p-value threshold, only return cis effects, return only clumped rows, and specify which columns to return, <code>test.json</code>:</p>
					<div class="highlight highlight-source-json"><pre>{
					    <span class="pl-s"><span class="pl-pds">"</span>cpgs<span class="pl-pds">"</span></span>: [<span class="pl-s"><span class="pl-pds">"</span>cg02518338<span class="pl-pds">"</span></span>, <span class="pl-s"><span class="pl-pds">"</span>cg12715136<span class="pl-pds">"</span></span>],
					    <span class="pl-s"><span class="pl-pds">"</span>pval<span class="pl-pds">"</span></span>: <span class="pl-c1">1e-10</span>,
					    <span class="pl-s"><span class="pl-pds">"</span>cistrans<span class="pl-pds">"</span></span>: <span class="pl-s"><span class="pl-pds">"</span>cis<span class="pl-pds">"</span></span>,
					    <span class="pl-s"><span class="pl-pds">"</span>clumped<span class="pl-pds">"</span></span>: <span class="pl-c1">1</span>,
					    <span class="pl-s"><span class="pl-pds">"</span>columns<span class="pl-pds">"</span></span>: <span class="pl-s"><span class="pl-pds">"</span>pval, cpg, cistrans, clumped<span class="pl-pds">"</span></span>
					}</pre></div>
					<p>Note that if the <code>clumped</code> and <code>cistrans</code> fields are not set then no filtering is done. If <code>clumped = 0</code> then only the unclumped results are returned. If <code>cistrans = ""</code> then both cis and trans results are returned. Similarly, if the <code>pval</code> field is not set then no filter is applied.</p>



					</section>
				</div>
			</section>

<?php 
include 'footer.php';
?>
