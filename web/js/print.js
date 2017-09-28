	$('.print').on('click', function(){		
		html2canvas(document.body, {
	        onrendered: function(canvas) {
	        	
	        	$("#page").hide();
	            document.body.appendChild(canvas);
	            window.print();
	            $('canvas').remove();
	            $("#page").show();
	        }
	    });
	    
	});