<?php 

include 'header.php';

// Get JSON from API
$url = 'http://api.godmc.org.uk/v0.1/cohorts';
$content = file_get_contents($url);
$data = json_decode($content,true);

?>

<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>Cohorts</h2>
					
				</header>
				<div class="container">
					<section>

						<p>Select a cohort to see the details</p>

					<?php

            			if (count($data)) {
					        // Open the list
					        echo '<ul id="cohortlist">';

					        // Cycle through the array
					        foreach ($data as $cohort) {
					        	echo '<li>';
					        	echo '<a href="#'.$cohort['name'].'" onclick="toggle_visibility(\''.strtolower($cohort['name']).'\')"><h3 class="togglecohort">'.$cohort['name'].'</h3></a>';
					        	echo '<div class="tablehide" id="'.strtolower($cohort['name']).'">';
					        	echo '<table>';
					        	foreach ($cohort as $key=>$value) {
    
						            if ($key == 'name') {
					        			continue;
					        		}
					        		$title = str_replace('_', ' ', $key);
						            echo '<tr><th>'.ucfirst($title).'</th><td>'.$value.'</td></tr>';					        
						        }
						        echo "</table>";
						        echo '</div>';
						        echo '</li>';
					        }

					        echo '</ul>';

					        
					        
					    }

					?>





					</section>
				</div>
			</section>

<?php 
include 'footer.php';
?>
<script type="text/javascript">
<!--
    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
//-->
</script>