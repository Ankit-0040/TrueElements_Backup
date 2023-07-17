<?php echo $quick_header; ?>
  <style>
      input[type="text"], input[type="password"], input[type="date"], input[type="datetime"], input[type="email"], input[type="number"], input[type="search"], input[type="tel"], input[type="time"], input[type="url"], textarea, select, .greenBtn, .orangeButton {
        width: 100%;
        float: left;
        height: 35px;
        line-height: 45px;
        /* border: 1px solid #f1f1f1; */
        padding: 0 15px;
        font-family: 'Muli', sans-serif;
        font-weight: 300;
        font-size: 1.2em;
        border-radius: 8px;
        color: #676767;
        background: #fff;
    }
    article{
        background: # ;
    }    
    .form-horizontal .form-group {
        
    }
    h2.title, h1.title {
        text-align: center;
        color: #676767;
        font-size: 2.2em;
        font-weight: 700;
        padding: 0;
        line-height: 1em;
    }
    .heading {
        width: 100%;
        float: left;
        padding: 0px 20px 20px 20px;
        z-index: 2;
        position: relative;
    }
  </style>
  <article>
      	<?php if ($error_warning) { ?>
	        <div class="warning"><?php echo $error_warning; ?></div>
	    <?php } ?>
	
      <div class="container"> 
        <div class="heading">
            <h1 class="title">Add Store/Outlet</h1>
        </div> 
      <form action="<?php echo $action; ?>" class="form-horizontal" method="post" enctype="multipart/form-data" align="center">
      <div class="form-group">
        <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
        <div class="col-sm-10 col-xs-10 col-md-10">          
            <select name="margin" class="form-control">
                <option value="25">25%</option> 
                <option value="26">26%</option> 
                <option value="27">27%</option> 
                <option value="28">28%</option> 
                <option value="29">29%</option> 
                <option value="30">30%</option> 
            </select>
        </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
     <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
        <div class="col-sm-10 col-xs-10 col-md-10">          
            <select name="bit_id" class="form-control">
                <option value="0">Select Beat</option>
                    <?php foreach ($bits as $bit) { ?>
                        <option value="<?php echo $bit['bit_id']; ?>"><?php echo $bit['bitname']; ?> </option>
                    <?php } ?>
                </select>
                <?php if ($error_bit_id) { ?>
                    <span class="error"><?php echo $error_bit_id; ?></span>
                <?php } ?>
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    
     <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
        <div class="col-sm-10 col-xs-10 col-md-10">
            <select name="outlet_type_id" class="form-control">
                <option value="0">Select Outlet Type *</option>
                <?php foreach($outlet_types AS $outlet_type) { ?>
                    <?php if($outlet_type['outlet_type_id'] == $outlet_type_id) { ?>
                        <option value="<?php echo $outlet_type['outlet_type_id']; ?>" selected><?php echo $outlet_type['type']; ?></option>
                    <?php } else { ?>
                        <option value="<?php echo $outlet_type['outlet_type_id']; ?>"><?php echo $outlet_type['type']; ?></option>
                    <?php } ?>
                <?php } ?>
            </select>
            <?php if ($error_outlet_type) { ?>
                <span class="error"><?php echo $error_outlet_type; ?></span>
            <?php } ?>
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
       <div class="col-sm-10 col-xs-10 col-md-10">
            <input type="text" class="form-control" name="firstname" placeholder="Outlet Name *" value="<?php echo $firstname; ?>" />
            <?php if ($error_firstname) { ?>
                <span class="error"><?php echo $error_firstname; ?></span>
            <?php } ?>
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
        <div class="col-sm-10 col-xs-10 col-md-10">          
            <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>"/>
            <?php if ($error_email) { ?>
                <span class="error"><?php echo $error_email; ?></span>
            <?php } ?>
        </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
        <div class="col-sm-10 col-xs-10 col-md-10">          
            <input type="text" class="form-control" name="telephone" placeholder="Mobile *" value="<?php echo $telephone; ?>" maxlength="10"/>
            <?php if ($error_telephone) { ?>
                <span class="error"><?php echo $error_telephone; ?></span>
            <?php } ?>
        </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    
    <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
       <div class="col-sm-10 col-xs-10 col-md-10">          
            <input type="text" class="form-control" name="address_1" placeholder="<?php echo $entry_address_1; ?> *" value="<?php echo $address_1; ?>" />
            <?php if ($error_address_1) { ?>
                <span class="error"><?php echo $error_address_1; ?></span>
            <?php } ?>
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    
    <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>      
       <div class="col-sm-10 col-xs-10 col-md-10">          
            <input type="text" class="form-control" name="address_2" placeholder="<?php echo $entry_address_2; ?>" value="<?php echo $address_2; ?>" />
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    
    <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>      
       <div class="col-sm-10 col-xs-10 col-md-10">          
            <input type="text" class="form-control" name="tax_id" placeholder="<?php echo $entry_tax_id; ?> *" value="<?php echo $tax_id; ?>" maxlength="15" />
            <?php if ($error_tax_id) { ?>
                <span class="error"><?php echo $error_tax_id; ?></span>
            <?php } ?>
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    
     <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>      
       <div class="col-sm-10 col-xs-10 col-md-10">          
            <input type="text" class="form-control" name="city" placeholder="<?php echo $entry_city; ?> *" value="<?php echo $city; ?>" />
                <?php if ($error_city) { ?>
                    <span class="error"><?php echo $error_city; ?></span>
                <?php } ?>
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    
    <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
       <div class="col-sm-10 col-xs-10 col-md-10">          
            <input type="text" class="form-control" name="postcode" placeholder="<?php echo $entry_postcode; ?> *" value="<?php echo $postcode; ?>"  maxlength=6/>
            <?php if ($error_postcode) { ?>
                <span class="error"><?php echo $error_postcode; ?></span>
            <?php } ?>
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
    
    <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
       <div class="col-sm-10 col-xs-10 col-md-10">          
           <select name="country_id" class="form-control">
                <option value="99" selected="selected">India</option>
            </select>
      </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
     <div class="form-group">
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
       <div class="col-sm-10 col-xs-10 col-md-10">          
            <select name="zone_id" class="form-control"></select>               
            <?php if ($error_zone) { ?>
                <span class="error"><?php echo $error_zone; ?></span>
            <?php } ?>
        </div>
       <div class="col-sm-1 col-xs-1 col-md-1"> </div>       
    </div>
            
    <div class="form-group" align="center">        
     <div class="col-sm-1 col-xs-1 col-md-1"> </div> 
     <div class="col-sm-10 col-xs-10 col-md-10">
        <button type="submit" class="btn btn-default" style="
    padding: 10px 20px 10px 20px;
">Add Outlet</button>
        
      </div>
      <div class="col-sm-1 col-xs-1 col-md-1"> </div> 
    </div>
    <br />
  </form>
</div>
</article>
    
    <script type="text/javascript">
    <!--
    $('select[name=\'country_id\']').bind('change', function() {
        $.ajax({
            url: 'index.php?route=account/register/country&country_id=' + this.value,
            dataType: 'json',
            beforeSend: function() {
                $('select[name=\'country_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/loading.gif" alt="" /></span>');
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
                
                html = '<option value=""><?php echo $text_select; ?></option>';
                
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
    //-->
    </script>
<?php echo $quick_footer; ?>