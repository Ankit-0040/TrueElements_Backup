<?php echo $quick_header; ?>
 <style>
@media (max-width: 320px) {
    .clockwrapper .userinput .inline.field>label.small {
        display: none;
    }
    
}

@media (min-width: 820px) {
    input{
       width: 31%; 
    }
    input[type="submit"]{
        width: 12%;
    }
}


@media (max-width: 819px) {
    input{
       width: 65%; 
    }
    input[type="submit"]{
        width: 35%;
    }
}


img.wave {
    position: fixed;
    bottom: 0;
    right: 0;
    width: 100%;
    height: auto;
    z-index: -10;
}
.fixedcenter {
    text-align: center;
    display: block;
} 
.clockinout {
    padding: 5px;
    background: white;
    border-radius: 7px;
    display: inline-block;
    margin-top: 5%;
}  
.clockwrapper {
    position: relative;
}
.input-div {
    margin-bottom: 2%;
}
h2.title, h1.title {
        text-align: center;
        color: #676767;
        font-size: 3.2em;
        font-weight: 700;
        padding: 0;
        line-height: 1em;
        margin-bottom : 3%;
    }
 </style>  
 
  <img src="image/clock-background.png" class="wave">
    <div class="container-fluid"> 
    <div class="fixedcenter">
    <br/>
    <?php if ($error_warning) { ?>
        <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>

    <div id="success"></div><div id="not_success"></div>
        <div class="heading">
            <h1 class="title">Map Manger Employee </h1>
        </div>
            <div class="clockwrapper">
                <div class="userinput">
                   <form action="<?php echo $empman; ?>" method="post" enctype="multipart/form-data">
                    <div class="input-div">
                     <div class="div">
                         Employee email 
                        <input class="input" type="text" name="empemail">
                        <input class="hidden" type="text" name="employee_id">
                        <?php if ($error_empid) { ?>
                            <span class="error"><?php echo $error_empid; ?></span>
                        <?php } ?>
                     </div>
                  </div>
                  <div class="input-div">
                     <div class="div">
                         Manager email &nbsp;
                        <input class="input" name="manageremail">
                        <input class="hidden" type="text" name="manager_id">
                        <?php if ($error_managerid) { ?>
                            <span class="error"><?php echo $error_managerid; ?></span>
                        <?php } ?>
                     </div>
                  </div>              
                  <input type="submit" class="btn" value="Assign">
                </form>  
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
