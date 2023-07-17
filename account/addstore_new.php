<?php echo $new_header; ?>
<link href="catalog/view/theme/default/stylesheet/new/add_store.css" rel="stylesheet" media="screen" />
  <article>
      	<?php if ($error_warning) { ?>
	        <div class="warning"><?php echo $error_warning; ?></div>
	    <?php } ?>

<div class="col-xxl-12 col-xl-12 col-12 mb-3">
    <div class="page_header p-1 bg-light text-center"><p class="mb-1 fs-6 fw-bold">Add Store/Outlet</p>
    </div>
</div>	
      <div class="container"> 
       <div class="py-3 px-lg-1 px-xl-2 px-xxl-3 px-1 pe-3 ps-3 pt-4 shadow rounded-4 bg-white"> 
 <div class="row justify-content-center">
      <form action="<?php echo $action; ?>" class="form-horizontal" method="post" enctype="multipart/form-data" align="center">
          
          
<div class="form-group">
    <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">
            <select name="margin" class="form-control">
                <option value="25">25%</option>
                <option value="26">26%</option>
                <option value="27">27%</option>
                <option value="28">28%</option>
                <option value="29">29%</option>
                <option value="30">30%</option>
            </select>
        </div>
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">
            <select name="bit_id" class="form-control">
                <option value="0">Select Beat</option>
                <?php foreach ($bits as $bit) { ?>
                    <option value="<?php echo $bit['bit_id']; ?>"><?php echo $bit['bitname']; ?></option>
                <?php } ?>
            </select>
            <?php if ($error_bit_id) { ?>
                <span class="error"><?php echo $error_bit_id; ?></span>
            <?php } ?>
        </div>
    </div>
</div>



    
     <div class="form-group">
         <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
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
              <div class="text-danger form-text ">  <span class="error"><?php echo $error_outlet_type; ?></span> </div>
            <?php } ?>
      </div>
           <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">
            <input type="text" class="form-control" name="firstname" placeholder="Outlet Name *" value="<?php echo $firstname; ?>" />
            <?php if ($error_firstname) { ?>
              <div class="text-danger form-text ">  <span class="error"><?php echo $error_firstname; ?></span> </div>
            <?php } ?>
      </div>
    </div>
    </div>
    
    
    <div class="form-group">
        <div class="row">
        <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
            <input type="text" class="form-control" name="email" placeholder="Email" value="<?php echo $email; ?>"/>
            <?php if ($error_email) { ?>
                <span class="error"><?php echo $error_email; ?></span>
            <?php } ?>
        </div>
         <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
            <input type="text" class="form-control" name="telephone" placeholder="Mobile *" value="<?php echo $telephone; ?>" maxlength="10"/>
            <?php if ($error_telephone) { ?>
               <div class="text-danger form-text "> <span class="error"><?php echo $error_telephone; ?></span> </div>
            <?php } ?>
        </div>      
    </div>
    </div>
    
    
    
    <div class="form-group">
            <div class = "row">
       <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
            <input type="text" class="form-control" name="address_1" placeholder="<?php echo $entry_address_1; ?> *" value="<?php echo $address_1; ?>" />
            <?php if ($error_address_1) { ?>
               <div class="text-danger form-text "> <span class="error"><?php echo $error_address_1; ?></span></div>
            <?php } ?>
      </div>
           <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
            <input type="text" class="form-control" name="address_2" placeholder="<?php echo $entry_address_2; ?>" value="<?php echo $address_2; ?>" />
      </div>
    </div>
    </div>
    

    
    <div class="form-group">
       <div class="row">    
       <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
            <input type="text" class="form-control" name="tax_id" placeholder="<?php echo $entry_tax_id; ?> *" value="<?php echo $tax_id; ?>" maxlength="15" />
            <?php if ($error_tax_id) { ?>
               <div class="text-danger form-text "> <span class="error"><?php echo $error_tax_id; ?></span></div>
            <?php } ?>
      </div>
     <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
            <input type="text" class="form-control" name="city" placeholder="<?php echo $entry_city; ?> *" value="<?php echo $city; ?>" />
                <?php if ($error_city) { ?>
                   <div class="text-danger form-text "> <span class="error"><?php echo $error_city; ?></span></div>
                <?php } ?>
      </div>    
    </div>
     </div>  
    
 
    
    <div class="form-group">
       <div class="row">        
       <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
            <input type="text" class="form-control" name="postcode" placeholder="<?php echo $entry_postcode; ?> *" value="<?php echo $postcode; ?>"  maxlength=6/>
            <?php if ($error_postcode) { ?>
                <span class="error"><?php echo $error_postcode; ?></span>
            <?php } ?>
      </div>
       <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
           <select name="country_id" class="form-control">
                <option value="99" selected="selected">India</option>
            </select>
      </div>      
    </div>
    </div>
    
    <div class="form-group">
       <div class="col-lg-6 col-md-8 col-sm-10 col-12 my-1 mx-auto mt-2 mb-2">          
         <select name="zone_id" class="form-control"></select>               
            <?php if ($error_zone) { ?>
                <span class="error"><?php echo $error_zone; ?></span>
            <?php } ?>
      </div>
    </div>
    
            
<div class="form-group d-flex justify-content-center">
    <div class="col-12  mx-auto mt-2 mb-2">
        <button type="submit" class="btn bg-dark-org text-white w-30 my-2" id="add-outlet">Add Outlet</button>
    </div>
</div>
</form>
</div>
</div>
<button class="btn btn-sm btn-warning rounded-circle position-fixed end-0 translate-middle d-none" onclick="scrollToTop()" id="back-to-up"><i class="fa fa-arrow-up text-white" aria-hidden="true"></i>
</button>

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
      <script> 
        window.onload = function() {
            navigator.geolocation.getCurrentPosition(function (position) {
                var lat = position.coords.latitude;
                var long = position.coords.longitude;
                var script = document.createElement('script');
                script.src = "https://api.opencagedata.com/geocode/v1/json?q="+ lat +","+ long +"&key=13fd5e35784b4204a38e9584835fa18d&jsonp=geoResponse";
                document.body.appendChild(script); 
            });
        }
        
        geoResponse = function(reponse){
            document.getElementById("address").innerHTML = reponse.results[0].formatted;
            document.getElementById("location").value = reponse.results[0].formatted;
        }
                                 
    </script>
     
   <script>
    window.onscroll = () => {
  toggleTopButton();
}
function scrollToTop(){
  window.scrollTo({top: 0, behavior: 'smooth'});
}

function toggleTopButton() {
  if (document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 20) {
    document.getElementById('back-to-up').classList.remove('d-none');
  } else {
    document.getElementById('back-to-up').classList.add('d-none');
  }
}
</script>
<?php echo $quick_footer; ?>