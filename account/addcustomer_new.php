<?php echo $new_header; ?>
<link href="catalog/view/theme/default/stylesheet/new/add_customer.css" rel="stylesheet" media="screen" />

<div class="col-xxl-12 col-xl-12 col-12 mb-3">
    <div class="page_header p-1 bg-light text-center"><p class="mb-1 fs-6 fw-bold">Registration</p>
  </div>
  </div>

  <article>

      <div class="container"> 
            <?php if ($error_warning) { ?>
	        <div class="warning"><?php echo $error_warning; ?></div>
	    <?php } ?>
      <?php if ($success) { ?>
	        <div class="success"><?php echo $success; ?></div>
	    <?php } ?>
        <?php if($email != '') { ?>
        <div class="py-3 px-lg-1 px-xl-2 px-xxl-3 px-1 pe-3 ps-3 shadow rounded-4 bg-white"> 
 <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <div class="text-center">
                <h4 class="title text-muted">Partner Registration</h4>
            </div>
        </div>
    </div>
            
            <form action="<?php echo $action; ?>" class="form-horizontal" method="post" enctype="multipart/form-data" align="center">
                   
               <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>" />
               
               
               
              <div class="form-group">
<div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 ">
    <!--//hide it later-->
    <select name="customer_group_id" class="form-control form-control-sm d-none">
        <?php foreach ($customer_groups as $customer_group) { ?>
            <?php if ($customer_group['customer_group_id'] == 21) { ?>
                <?php if ($customer_group['customer_group_id'] == $customer_group_id) { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>" selected="selected"><?php echo $customer_group['name']; ?> (<?php echo round($customer_group['discount'], 1)."%"; ?>)</option>
                <?php } else { ?>
                    <option value="<?php echo $customer_group['customer_group_id']; ?>"><?php echo $customer_group['name']; ?> (<?php echo round($customer_group['discount'], 1)."%"; ?>)</option>
                <?php } ?>
            <?php } ?>
        <?php } ?>
    </select>
    <?php if ($error_customer_group_id) { ?>
        <div class="text-danger form-text"><span class="error"><?php echo $error_customer_group_id; ?></span></div>
    <?php } ?>
</div>
</div>

            
            <!--Ankit Work from Here-->
   <div class="form-group my-1">
    <div class="col-lg-6 col-md-8 col-sm-10 col-12">
        <input class="form-control" name="company" placeholder="Company Name *" value="<?php echo $company; ?>" />
        <?php if ($error_company) { ?>
        <div class="text-danger form-text"><span class="error"><?php echo $error_company; ?></span></div>
        <?php } ?>
    </div>
   
</div>

            
            <div class="form-group row">
                <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">
        <input class="form-control" name="firstname" placeholder="Contact Person Firstname *" value="<?php echo $firstname; ?>" />
        <?php if ($error_firstname) { ?>
            <div class="text-danger form-text"><span class="error"><?php echo $error_firstname; ?></span></div>
        <?php } ?>
    </div>
                   
               <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                     <input  class="form-control" name="lastname" placeholder="Contact Person Lastname *" value="<?php echo $lastname; ?>" />
                        <?php if ($error_lastname) { ?>
                           <div class="text-danger form-text"> <span class="error"><?php echo $error_lastname; ?></span></div>
                        <?php } ?>
              </div>
               
            </div>
            
            
            
            
            <div class="form-group row ">
                      
                <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">
                    <input  class="form-control" name="email" placeholder="<?php echo $entry_email; ?> *" value="<?php echo $email; ?>" style="pointer-events: none;" />
                    <?php if ($error_email) { ?>
                       <div class="text-danger form-text"> <span class="error"><?php echo $error_email; ?></span> </div>
                    <?php } ?>
                </div>
                
                 <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                    <input class="form-control" name="telephone" placeholder="Mobile *"  value="<?php echo $telephone; ?>" />
                        <?php if ($error_telephone) { ?>
                        <div class="text-danger form-text">    <span class="error"><?php echo $error_telephone; ?></span> </div>
                        <?php } ?>
              </div>
            </div>
            
            
            
            
         <div class="form-group row">
               <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                    <input class="form-control" name="address_1" placeholder="<?php echo $entry_address_1; ?> *" value="<?php echo $address_1; ?>" />
                        <?php if ($error_address_1) { ?>
                           <div class="text-danger form-text">   <span class="error"><?php echo $error_address_1; ?></span> </div>
                        <?php } ?>
             </div>
              
               <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                    <input class="form-control" name="address_2" placeholder="<?php echo $entry_address_2; ?>" value="<?php echo $address_2; ?>" />
              </div>
              
            </div>
            
           
            
            <div class="form-group row">
               <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                    <input class="form-control" name="tax_id" placeholder="GST ID *" value="<?php echo $tax_id; ?>" maxlength="15" />
                        <?php if ($error_tax_id) { ?>
                            <div class="text-danger form-text">   <span class="error"><?php echo $error_tax_id; ?></span> </div>
                        <?php } ?>
              </div>
              
               <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                    <input class="form-control" name="pan_number" placeholder="PAN Number *" value="<?php echo $pan_number; ?>" maxlength="10" />
                        <?php if ($error_pan_number) { ?>
                           <div class="text-danger form-text">    <span class="error"><?php echo $error_pan_number; ?></span> </div>
                        <?php } ?>
               </div>
            </div>
            
            

            
            <div class="form-group row">
    
            <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">
                <input class="form-control" name="fssai" placeholder="FSSAI Licence Number" value="<?php echo $fssai; ?>" maxlength="14" />
            </div>
            <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">
                <input  class="form-control" name="city" placeholder="<?php echo $entry_city; ?> *" value="<?php echo $city; ?>" />
                <?php if ($error_city) { ?>
                    <div class="text-danger form-text">  <span class="error"><?php echo $error_city; ?></span> </div>
                <?php } ?>
            </div>
        </div>
   

            
            
            <div class="form-group row">
               <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                    <input  class="form-control" name="postcode" placeholder="<?php echo $entry_postcode; ?> *" value="<?php echo $postcode; ?>" maxlength="6" />
                        <?php if ($error_postcode) { ?>
                           <div class="text-danger form-text">
                                 <span class="error"><?php echo $error_postcode; ?></span>
                                 </div>
                        <?php } ?>
              </div>
              <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                    <select name="country_id" class="form-control form-control-sm">
                        <?php foreach ($countries as $country) { ?>
                            <?php if($country['country_id'] == 99) { ?>
                                <?php if ($country['country_id'] == $country_id) { ?>
                                    <option value="<?php echo $country['country_id']; ?>" selected="selected"><?php echo $country['name']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $country['country_id']; ?>"><?php echo $country['name']; ?></option>
                                <?php } ?>
                            <?php } ?>
                      <?php } ?>
                    </select>
                    <?php if ($error_country) { ?>
                       <div class="text-danger form-text">
                            <span class="error"><?php echo $error_country; ?></span>
                            </div>
                    <?php } ?>
              </div>
            </div>

          
            <div class="form-group row ">
     
                <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">          
                    <select name="zone_id" class="form-control form-control-sm"></select>
                        <?php if ($error_zone) { ?>
                          <div class="text-danger form-text"> 
                          <span class="error"><?php echo $error_zone; ?></span>
                          </div>
        				<?php } ?>
                    <input type="hidden" class="form-control" name="password" value="123456" />
                    <input type="hidden" class="form-control" name="confirm" value="123456" />
                </div>
                
                <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1">
                    <select name="district_id" class="form-control form-control-sm"></select>
                </div>
            </div>
            
<div class="form-group row justify-content-center">
    <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 text-center">
        <a id="button-gst-certificate-upload" class="btn btn bg-dark-org text-white button">* Upload GST Certificate</a>
        <span id="upload-msg-gst"><?php echo substr($gst_doc, 37); ?></span>
        <input type="hidden" id="gst_doc" value="<?php echo $gst_doc; ?>" name="gst_doc">
        <?php if ($error_gst_doc) { ?>
            <div class="text-danger form-text">
                <span class="error"><?php echo $error_gst_doc; ?></span>
            </div>
        <?php } ?>

        <a id="button-fssai-certificate-upload" class="btn btn bg-dark-org text-white button">Upload FSSAI Certificate</a>
        <span id="upload-msg-fssai"><?php echo substr($fssai_doc, 39); ?></span>
        <input type="hidden" id="fssai_doc" value="<?php echo $fssai_doc; ?>" name="fssai_doc">
    </div>
</div>


            <div class="form-group">
                <div class="col-xxl-12 col-xl-12 col-lg-10 col-md-10 col-sm-10 col-12 my-1">
                    <label><input name="agree" type="checkbox" value="1" onchange="toggleSubmit();" <?php if($agree == 1) { echo 'checked'; } ?>> I hereby agree to the terms and conditions mentioned above and also authorize to use this digital agreement as final agreement between the company and <span class="agreement_with">myself</span>.</label>
                </div>
            </div>
            
                    <div class="form-group d-flex justify-content-center">
    <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div>
    <?php if ($error_captcha) { ?>
        <div class="text-danger"><?php echo $error_captcha; ?></div>
    <?php } ?>
</div>

<div class="form-group text-center">
    <div class="row justify-content-center">
        <div class="col-12 col-md-10">
            <button type="submit" class="btn btn-secondary <?php if($agree != 1) { echo 'disabled'; } ?>" id="btn-submit">Submit</button>
            <?php if($agree != 1) { ?><p class="text-center agree-notice">(Agree terms & conditions to enable form submission!)</p><?php } ?>
        </div>
    </div>
</div>

        </form></div>
        </div>
        <?php } else { ?>
        
                <!--Ankit Work here-->
                <div class="d-flex align-items-center justify-content-center">
    <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-12 col-sm-12 col-12">
       <div class="py-3 px-lg-1 px-xl-2 px-xxl-3 px-1 shadow rounded-4 bg-white   ">
             <div class="row justify-content-center">
                 <div class="col-12 col-md-10 col-lg-8">
                          <div class="text-center">
                <h4 class="title text-muted">Generate Registration Link</h4>
            </div>
        </div>

            <form action="<?php echo $action; ?>" class="form-horizontal" method="post" enctype="multipart/form-data" align="center">
                <div class="form-group">
                    <div class="row justify-content-center">
                        <div class="col-xxl-6 col-xl-6 col-lg-8 col-md-6 col-sm-4 col-12 my-1 my-lg-0">
                               <input class="form-control my-2" name="email" placeholder="<?php echo $entry_email; ?> *" value="<?php echo $email; ?>" />
                        </div>
                    </div>
                      <input type="hidden" class="form-control" name="offline_user_id" placeholder="User ID" value="<?php echo $offline_user_id; ?>" />
                             <?php if ($offline_user_id) { ?>
                             
                                          <div class="form-group d-flex justify-content-center">
                                            <div class="col-12">
                                         <a class="btn bg-dark-org text-white w-30 my-2" id="btn-generate-link">Generate</a>
                                        </div>
                                    </div>
                             <?php } else { ?>
                                 <div class="form-group d-flex justify-content-center">
                                    <div class="col-12">
                                          <button type="btn btn-info" onClick="window.location.reload();">Click Me</button> 
                                    </div>
                                </div>
                            <?php } ?>
            </form> 
        </div>
    </div>
    </div>
        <?php } ?>
</div>
</article>

<script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
<script type="text/javascript">
    new AjaxUpload('#button-gst-certificate-upload', {
        action: 'index.php?route=account/addnewcustomer/upload&type=gst',
        name: 'file',
        autoSubmit: true,
        responseType: 'json',
        onSubmit: function(file, extension) {
            $('#button-gst-certificate-upload').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
            $('#button-gst-certificate-upload').attr('disabled', true);     
        },
        onComplete: function(file, json) {
            $('#button-gst-certificate-upload').attr('disabled', false);
            if (json['success']) {
                alert(json['success']);
                $('#upload-msg-gst').text(' ' + json['mask']);
                $('#gst_doc').val(json['uploaded_filename']);
            }
            if (json['error']) {
                alert(json['error']);
            }
            $('.loading').remove();
        }
    });
    
    new AjaxUpload('#button-fssai-certificate-upload', {
        action: 'index.php?route=account/addnewcustomer/upload&type=fssai',
        name: 'file',
        autoSubmit: true,
        responseType: 'json',
        onSubmit: function(file, extension) {
            $('#button-fssai-certificate-upload').after('<img src="catalog/view/theme/default/image/loading.gif" class="loading" style="padding-left: 5px;" />');
            $('#button-fssai-certificate-upload').attr('disabled', true);     
        },
        onComplete: function(file, json) {
            $('#button-fssai-certificate-upload').attr('disabled', false);
            if (json['success']) {
                alert(json['success']);
                $('#upload-msg-fssai').text(' ' + json['mask']);
                $('#fssai_doc').val(json['uploaded_filename']);
            }
            if (json['error']) {
                alert(json['error']);
            }
            $('.loading').remove();
        }
    });
</script>
<script type="text/javascript">
function toggleSubmit() {
    $('.agree-notice').remove();
    if($('input[name=\'agree\']').is(':checked')) {
        $('#btn-submit').removeClass('disabled');
    } else {
        $('#btn-submit').addClass('disabled');
        $('#btn-submit').after('<p class="text-center agree-notice">(Agree terms & conditions to enable form submission!)</p>');
    }
}


function generateLink() {
    var email_id = $('input[name=\'email\']').val();
    var email_id_format = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (email_id.match(email_id_format)) {
        $.ajax({
            url: 'index.php?route=account/addnewcustomer/sendRegistrationMail&email_id=' + email_id,
            dataType: 'json',
            beforeSend: function() {
                $('#btn-generate-link').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
                $('#btn-generate-link').addClass('disabled');
            },
            complete: function() {
                $('.wait').remove();
                $('#btn-generate-link').removeClass('disabled');
            },
            success: function(json) {
                if (json['success']) {
                    alert(json['success']);
                }
                if (json['error']) {
                    alert(json['error']);
                }
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    } else {
        alert('Please enter a valid email id!');
    }
}
// Click event handler
$('#btn-generate-link').click(function(event) {
    event.preventDefault();
    generateLink();
});

// Keypress event handler
$('input[name=\'email\']').keypress(function(event) {
    if (event.which === 13) {
        event.preventDefault();
        generateLink();
    }
});



// $('#btn-generate-link, input[name=\'email\']').on('click keypress', function(event) {
//     if (event.type === 'click' || (event.type === 'keypress' && event.which === 13)) {
//         // Prevent the default form submission behavior
//         event.preventDefault();

//         // Call the generateLink function
//         generateLink();
//     }
// });

// $('#btn-generate-link').click(function() {
//     var email_id = $('input[name=\'email\']').val();
//     var email_id_format = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
//     if(email_id.match(email_id_format)) {
//         $.ajax({
//     		url: 'index.php?route=account/addnewcustomer/sendRegistrationMail&email_id=' + email_id,
//     		dataType: 'json',
//     		beforeSend: function() {
//     			$('#btn-generate-link').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
//     			$('#btn-generate-link').addClass('disabled');
//     		},
//     		complete: function() {
//     			$('.wait').remove();
//     			$('#btn-generate-link').removeClass('disabled');
//     		},
//     		success: function(json) {
//     			if(json['success']) {
//     			    alert(json['success']);
//     			}
    			
//     			if(json['error']) {
//     			    alert(json['error']);
//     			}
//     		},
//     		error: function(xhr, ajaxOptions, thrownError) {
//     			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
//     		}
//     	});
//     } else {
//         alert('Please enter valid email id!');
//     }
// });

//ankit work from here
// $('#btn-generate-link').keypress(function(event) {
    
//     if (event.which === 13) {
    
//         event.preventDefault();

//         generateLink();
//     }
// });

// $('input[name=\'email\']').keypress(function(event) {
//     if (event.which === 13) {
//         event.preventDefault();
//         generateLink();
//     }
// });


$('input[name=\'postcode\']').on('input', function(){
    var postcode = $('input[name=\'postcode\']').val();
    if(!isNaN(postcode)) {
        if(postcode.length == 6) {
            $.ajax({
        		url: 'index.php?route=account/addnewcustomer/getZoneDistrict&postcode=' + postcode,
        		dataType: 'json',
        		beforeSend: function() {
        			$('input[name=\'postcode\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
        		},
        		complete: function() {
        			$('.wait').remove();
        		},
        		success: function(json) {
        		    if(json['zone_id'] > 0) {
        		        $('select[name=\'zone_id\'] option[value="' + json['zone_id'] + '"]').attr('selected' , true);
        			    $('select[name=\'zone_id\']').trigger('change');
        		    }
        		    
        			if(json['district_id'] > 0) {
        			    setTimeout(function(){
                            $('select[name=\'district_id\'] option[value="' + json['district_id'] + '"]').attr('selected' , true);
                        }, 1000);
        			}
        		},
        		error: function(xhr, ajaxOptions, thrownError) {
        			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
        		}
        	});
        }
    }
});

$('input[name=\'company\']').on('input', function(){
    var company_name = $('input[name=\'company\']').val();
    if(company_name == '') {
        $('.agreement_with').text('myself');
    } else {
        $('.agreement_with').text(company_name);
    }
});

$('select[name=\'country_id\']').bind('change', function() {
	$.ajax({
		url: 'index.php?route=account/address/country&country_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('select[name=\'country_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},		
		complete: function() {
			$('.wait').remove();
		},			
		success: function(json) {
			if (json['postcode_required'] == '1') {
				$('#postcode-required').show();
			} else {
				$('#postcode-required').hide();
			}
			
			html = '<option value="">--- Please Select State ---</option>';
			
			if (json['zone'] != '') {
				for (i = 0; i < json['zone'].length; i++) {
        			html += '<option value="' + json['zone'][i]['zone_id'] + '"';
	    			
					if (json['zone'][i]['zone_id'] == '<?php echo $zone_id; ?>') {
	      				html += ' selected="selected"';
	    			}
	
	    			html += '>' + json['zone'][i]['name'] + '</option>';
				}
			} else {
				html += '<option value="0" selected="selected"><?php echo $text_none; ?></option>';
			}
			
			$('select[name=\'zone_id\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});
$('select[name=\'country_id\']').trigger('change');

$('select[name=\'zone_id\']').bind('change', function() {
	$.ajax({
		url: 'index.php?route=account/address/district&zone_id=' + this.value,
		dataType: 'json',
		beforeSend: function() {
			$('select[name=\'zone_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
		},		
		complete: function() {
			$('.wait').remove();
		},			
		success: function(json) {
			html = '<option value="">--- Please Select District ---</option>';
			if (json.length > 0) {
				for (i = 0; i < json.length; i++) {
        			html += '<option value="' + json[i]['district_id'] + '"';
	    			
					if (json[i]['district_id'] == '<?php echo $district_id; ?>') {
	      				html += ' selected="selected"';
	    			}
	
	    			html += '>' + json[i]['name'] + '</option>';
				}
			}
			
			$('select[name=\'district_id\']').html(html);
		},
		error: function(xhr, ajaxOptions, thrownError) {
			alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
		}
	});
});
$(window).load(function() {
    $('select[name=\'zone_id\']').trigger('change');
});

</script> 

<script type="text/javascript">
	$('input[name=\'customer_group_id\']:checked').live('change', function() {
		var customer_group = [];
		
	<?php foreach ($customer_groups as $customer_group) { ?>
		customer_group[<?php echo $customer_group['customer_group_id']; ?>] = [];
		customer_group[<?php echo $customer_group['customer_group_id']; ?>]['company_id_display'] = '<?php echo $customer_group['company_id_display']; ?>';
		customer_group[<?php echo $customer_group['customer_group_id']; ?>]['company_id_required'] = '<?php echo $customer_group['company_id_required']; ?>';
		customer_group[<?php echo $customer_group['customer_group_id']; ?>]['tax_id_display'] = '<?php echo $customer_group['tax_id_display']; ?>';
		customer_group[<?php echo $customer_group['customer_group_id']; ?>]['tax_id_required'] = '<?php echo $customer_group['tax_id_required']; ?>';
	<?php } ?>	

		if (customer_group[this.value]) {
			if (customer_group[this.value]['company_id_display'] == '1') {
				$('#company-id-display').show();
			} else {
				$('#company-id-display').hide();
			}
			
			if (customer_group[this.value]['company_id_required'] == '1') {
				$('#company-id-required').show();
			} else {
				$('#company-id-required').hide();
			}
			
			if (customer_group[this.value]['tax_id_display'] == '1') {
				$('#tax-id-display').show();
			} else {
				$('#tax-id-display').hide();
			}
			
			if (customer_group[this.value]['tax_id_required'] == '1') {
				$('#tax-id-required').show();
			} else {
				$('#tax-id-required').hide();
			}	
		}
	});

	$('input[name=\'customer_group_id\']:checked').trigger('change');
	//-->
	</script>