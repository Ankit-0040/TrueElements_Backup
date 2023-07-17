<?php echo $new_header; ?>
<style>
    section {
        overflow-x:hidden!important;
    }
    
    #notificationpopup{
      z-index: 11000;
    }
    
    #notificationpopup .modal-title {
      font-weight: 700;
      text-align: center;
      font-size: 27px;
      color: red
    }
    
    @media screen and (min-width:1000px){
        .checkbox {
            width: 23% !important;
            margin:30px 6px 30px !important;
            min-height: 346px !important;
        }
    }
     
    #address {
        display : none;
    }
</style>
  

    <link href="catalog/view/theme/default/stylesheet/quickorder.css" rel="stylesheet" />

<div class="container">
  <div class="row">
    <div id="content" class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
      </br> <br>
    <div id="product" class="col-md-12 col-sm-12 col-xs-12">
      <div class="row">
        <center> 
            
        <p class="mb-1 fs-6 fw-bold">Distributor inventory report</p>
            <!--<p style="font-size: 25px;" class="control-label col-md-12 center" id="control-label">Distributor inventory report</p><br />     ankit-->
         
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12"> 
                <input id="myInput" type="text" style="font-size: 17px;" placeholder="Search here...">
            </div> 
            <div class="hidden-md hidden-lg"><br></div>
            <div class="col-md-6 col-sm-12 col-xs-12">
                <select Id="myDropdown" style="height: 37px;" placeholder="Please">
                    <option value="" selected style="color:#000000;font-size:15px;">Select your option</option>
                    <?php if ($distributors) { ?>
                        <?php foreach ($distributors as $distributor) { ?>
                            <?php if($distributor['name'] != '') { ?>
                                 <option style="color:#000000;font-size:15px;"><?php echo $distributor['name']; ?></option>
                            <?php } ?>    
                        <?php } ?>
                    <?php } ?>  
                </select>
            </div> 
        </div>
    </center></div><br />
    <div class="row">
      
              <div class="clearfix"  id="myDIV">
                <?php if ($distributors) { ?>
                  <?php foreach ($distributors as $distributor) { ?>
                    <?php if($distributor['name'] != '') { ?>
                        <div  class="checkbox col-md-4 col-sm-5 col-xs-5 pro-<?php echo $distributor['product_id']; ?>">
                             <div  class="checkbox1 searchcheckbox1">
                                <?php if($distributor['opening_inv'] > 0) { ?><a href="<?php echo $distributor['href']; ?>"><?php } ?>  <input style="display:none;" type="checkbox" name="product[<?php echo $distributor['product_id']; ?>][]" value="<?php echo $distributor['product_id']; ?>" id="a_<?php echo $distributor['product_id']; ?>" class="elements" />
                                
                                  <label for="<?php echo $distributor['product_id']; ?>">
                                    <?php if($distributor['opening_inv'] > 0) { ?> 
                                        <img src="https://www.true-elements.com/admin/view/image/logo.png" class="elements-image"/>
                                    <?php } else { ?>
                                         <img src="/image/data/pending.png" class="elements-image"/>
                                    <?php } ?> 
                                    <div class="product-details">
                                        <p class="cat"><?php echo $distributor['name']; ?></p>
                                      <p class="name" style="color:#000;"><?php echo $distributor['name']; ?></span></p>
                                      <p class="price">Opening Inv: <?php echo $distributor['opening_inv']; ?></p>
                                      <p class="price" >Primary sales: <span class="special-price"><?php echo $distributor['primary_sales']; ?></span></p>
                                      <p class="price" >Secondary Sales: <span class="special-price"><?php echo $distributor['primary_sales']; ?></span></p>
                                      <span style="font-size: 15px;color:#000;font-weight: 600;">In Hand Inventory: <?php echo $distributor['in_hand_inv']; ?></span>
                                    </div>
                                  </label>
                                 <?php if($distributor['opening_inv'] > 0) { ?></a><?php } ?>  
                            </div>
                        </div>
                    <?php } ?>    
                <?php } ?>
              <?php } ?>
            </div>
          </div>
          <!--Main Section-->
     </div>
   </div>
 </div>
</div>

<button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
<input type="hidden" name="location" id="location" style="width:25%">
<div id="address"></div>
  

<script type="text/javascript">                                         
    $(document).ready(function() {
        if( $.cookie('showOnlyOne') ){
            //it is still within the day 
            //hide the div
            $('#notificationpopup').modal('hide');
        } else {
            //either cookie already expired, or user never visit the site
            //create the cookie
            $('#notificationpopup').modal('show');  
            $.cookie('showOnlyOne', 'showOnlyOne', { expires: 1 });
            //and display the div
        }
    });
</script>
 
<script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    document.getElementById("myBtn").style.display = "block";
  } else {
    document.getElementById("myBtn").style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

<link rel="stylesheet" href="https://www.true-elements.in/admin/view/stylesheet/select2.min.css" type="text/css" />
<script type="text/javascript" src="https://www.true-elements.in/admin/view/javascript/select2.min.js"></script>

<script type="text/javascript">
    $('.sel').select2();
</script>

<script type="text/javascript">
    jQuery("#myInput").on("keyup", function() {
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(),
        count = 0;
        // Loop through the comment list
        $('#myDIV div .searchcheckbox1 label div .name').each(function() {
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).parent().parent().parent().parent().hide();  // MY CHANGE
                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).parent().parent().parent().parent().show(); // MY CHANGE
                count++;
            }
        });
    });
    
    $("#myDropdown").change(function () {
        // Retrieve the input field text and reset the count to zero
        var filter = $(this).val(),
        count = 0;
        // Loop through the comment list
        $('#myDIV div .searchcheckbox1 label div .cat').each(function() {
            // If the list item does not contain the text phrase fade it out
            if ($(this).text().search(new RegExp(filter, "i")) < 0) {
                $(this).parent().parent().parent().parent().hide();  // MY CHANGE
                // Show the list item if the phrase matches and increase the count by 1
            } else {
                $(this).parent().parent().parent().parent().show(); // MY CHANGE
                count++;
            }
        });
    });
  </script> 
