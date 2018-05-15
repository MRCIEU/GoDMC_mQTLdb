/*
	Ion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/

(function($) {

	skel.init({
		reset: 'full',
		breakpoints: {
			
			// Global.
				global: {
					range: '*',
					href: 'css/style.css',
					//containers: 1400,
					grid: {
						gutters: {
							vertical: '4em',
							horizontal: 0
						}
					}
				},

			// XLarge.
				xlarge: {
					range: '-1680',
					href: 'css/style-xlarge.css',
					//containers: 1200
				},

			// Large.
				large: {
					range: '-1280',
					href: 'css/style-large.css',
					//containers: 960,
					grid: {
						gutters: {
							vertical: '2.5em'
						}
					},
					viewport: {
						scalable: false
					}
				},

			// Medium.
				medium: {
					range: '-980',
					href: 'css/style-medium.css',
					//containers: '90%',
					grid: {
						collapse: 1
					}
				},

			// Small.
				small: {
					range: '-736',
					href: 'css/style-small.css',
					//containers: '90%',
					grid: {
						gutters: {
							vertical: '1.25em'
						}
					}
				},

			// XSmall.
				xsmall: {
					range: '-480',
					href: 'css/style-xsmall.css',
					grid: {
						collapse: 2
					}
				}

		},
		plugins: {
			layers: {
				
				// Config.
					config: {
						transform: true
					},
				
				// Navigation Panel.
					navPanel: {
						animation: 'pushX',
						breakpoints: 'medium',
						clickToHide: true,
						height: '100%',
						hidden: true,
						html: '<div data-action="moveElement" data-args="nav"></div>',
						orientation: 'vertical',
						position: 'top-left',
						side: 'left',
						width: 250
					},

				// Navigation Button.
					navButton: {
						breakpoints: 'medium',
						height: '4em',
						html: '<span class="toggle" data-action="toggleLayer" data-args="navPanel"></span>',
						position: 'top-left',
						side: 'top',
						width: '6em'
					}

			}
		}
	});

	$(function() {
		
		// jQuery ready stuff.
		$('#search-box').on( 'change keyup keydown paste cut', 'textarea', function (){
			console.log(this.scrollHeight-14);
		    $(this).height(0).height(this.scrollHeight-14);
		}).find( 'textarea' ).change();

		$("#toggleheader").click(function(event) {
	        $('#togglefilters').toggle();
	        $('#toggleheader').find('i').toggleClass('fa-plus-circle fa-minus-circle')
	    });

	 //    var inp = $("input#pval");
		// if(inp.val() != "") {
		// 	$('#togglefilters').show();
		// 	if ($('#toggleheader').find('i').hasClass('fa-plus-circle')) {
		// 		$('#toggleheader').find('i').toggleClass('fa-plus-circle fa-minus-circle')
		// 	}
		// }
		// $('#cistrans option').each(function() {
		//     console.log();
		//     if (this.selected && $(this).val() !== '') {

		//  		$('#togglefilters').show();
		// 		if ($('#toggleheader').find('i').hasClass('fa-plus-circle')) {
		// 			$('#toggleheader').find('i').toggleClass('fa-plus-circle fa-minus-circle')
		// 		}
		//     }
		// });

		

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

		
	});

})(jQuery);