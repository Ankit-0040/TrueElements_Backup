<?php echo $new_header; ?>
  <link rel="stylesheet" href="catalog/view/theme/default/stylesheet/new/assign.css"  media="screen" />
 <div class="col-xxl-12 col-xl-12 col-12 mb-3">
    <div class="page_header p-1 bg-light text-center"><p class="mb-1 fs-6 fw-bold">Map Manager Employee</p>
    </div>
</div>
 
  <!--<img src="image/clock-background.png" class="wave">-->
    <div class="container-fluid"> 
    <div class="fixedcenter">
    <br/>
    <?php if ($error_warning) { ?>
        <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>

    <div id="success"></div><div id="not_success"></div>
            <div class="clockwrapper">
                <div class="userinput">
                       <form class="text-start mx-auto p-4 border rounded-3 bg-light" style="width: 500px;"action="<?php echo $empman; ?>" method="post" enctype="multipart/form-data">
                    <div class="input-div">
                        
                            <div class=" col-xxl-8 col-xl-8 col-lg-8 col-md-8 co-sm-8 col-12 mb-3 mb-lg-2">
                     <div class="div">
                         Employee email 
                        <input class="input form-control mb-2 mb-md-3 mt-1" type="text" name="empemail">
                        <input class="d-none" type="text" name="employee_id">
                        <?php if ($error_empid) { ?>
                            <span class="error"><?php echo $error_empid; ?></span>
                        <?php } ?>
                     </div>
                  </div>
                  
                  </div>
                  
                  <div class="input-div">

                            <div class="col-xxl-8 col-xl-8 col-lg-8 col-md-8 co-sm-8 col-12 mb-3 mb-lg-2">
                     <div class="div">
                         Manager email &nbsp;
                        <input class="input  form-control mb-2 mb-md-3 mt-1" name="manageremail">
                        <input class="d-none" type="text" name="manager_id">
                        <?php if ($error_managerid) { ?>
                            <span class="error"><?php echo $error_managerid; ?></span>
                        <?php } ?>
                     </div>
                  </div>    
                 
                  
                  </div>
                  
                  <input type="submit" id="submit-btn" class="submit_btn btn btn-default bg-dark-org text-white" value="Assign">
                </form>  
                  </div>
                </div>
            </div>
        </div> 
    </div>


<script type="text/javascript"><!--
$('input[name=\'manageremail\']').autocomplete({
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=account/assign/getuser&empemail=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item.email,
						value: item.customer_id
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('input[name=\'manageremail\']').val(ui.item.label);
		$('input[name=\'manager_id\']').val(ui.item.value);
		
		 
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});

$('input[name=\'empemail\']').autocomplete({
	source: function(request, response) {
		$.ajax({
			url: 'index.php?route=account/assign/getuser&empemail=' +  encodeURIComponent(request.term),
			dataType: 'json',
			success: function(json) {
				response($.map(json, function(item) {
					return {
						label: item.email,
						value: item.customer_id
					}
				}));
			}
		});
	},
	select: function(event, ui) {
		$('input[name=\'empemail\']').val(ui.item.label);
		$('input[name=\'employee_id\']').val(ui.item.value);
		
		 
		return false;
	},
	focus: function(event, ui) {
      	return false;
   	}
});
</script>



<!-- 
#submit-btn:hover{
   background: #000; 
}

.clockwrapper {
    position: relative;
}
.fixedcenter {
    text-align: center;
    display: block;
} 

.input-div {
    margin-bottom: 2%;
}

.clockinout {
    padding: 5px;
    background: white;
    border-radius: 7px;
    display: inline-block;
    margin-top: 5%;
}   -->