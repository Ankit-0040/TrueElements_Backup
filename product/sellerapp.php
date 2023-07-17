<?php echo $quick_header; ?>
     
     <style>
       
         div#sticky {
             position: -webkit-sticky;
             position: sticky;
             top: 60px;
         }
         
         .posmimg {
             margin-top: 12px;
         }
         
         .posmname {
             margin-top: 14px;
             min-height: 40px;
 
         }
     
         button[disabled], html input[disabled] {
             cursor: default !important;
             background: #666 !important;
         }
     
         #add{
            width: 50px;
            background: black;
            font-size: 18px;
            color: #fff;
         }
     
         #product .control-label {
           font-size: 16px;
           color: #f49a25;
         }
         
         h6 {
           margin-bottom: 0px !important;
           margin-left: 15px !important;
           margin-top: 25px !important;
           line-height: 1.3 !important;
           padding-bottom: 10px !important;
         }
         
         h3 {
           text-align: center;
           color: #f49a25;
         }
     
         .posmcheckbox label,.checkbox label {
           padding: 0px!important;
           display: block;
           position: relative;
           cursor: pointer;
           -webkit-touch-callout: none;
           -webkit-user-select: none;
           -khtml-user-select: none;
           -moz-user-select: none;
           -ms-user-select: none;
           user-select: none;
           text-align: center;
           font-size: 21px;
           color: #f49a25;
           width: 167px;
           min-height: 310px !important;
         }
     
         /*:checked + label:before {
           background-color: white;
           color: white;
           content: "✓";
           display: inline-block;
           border-radius: 50%;
           border: 1px solid grey;
           position: absolute;
           top: -5px;
           left: -5px;
           width: 25px;
           height: 25px;
           text-align: center;
           line-height: 28px;
           transition-duration: 0.4s;
           transform: scale(0);
         }*/
     
       .modal-content{
         top: 253px;
       }
     
     
           label img {
             /*min-height: 214px!important;*/
             width: auto;
             transition-duration: 0.2s;
             transform-origin: 50% 50%;
             position: relative;
           }
         
           :checked + label img {
             transform: scale(0.9);
             z-index: -1;
             position:relative;
           }
         
           :checked + label {
             background-image:linear-gradient(rgba(0, 0, 0, 0.7), transparent);
           }
         
           .checkbox,.posmcheckbox  {
             display: inline-block;
             text-align: center;
             min-height: 401px;
             border: 1px solid rgb(28,0,85);
             margin: 30px 10px 30px!important;
             padding-right: 0;
             padding-left: 0;
             border-radius:10px;
             overflow: hidden;
             width: 22%;
           }
           
            .checkbox,.posmcheckbox  {
               min-height: 206px!important;
            }
            
            .posmcheckbox label{
                 min-height: 201px !important;
 
            }
         
           .option_name {
             font-size: 14px;
             margin: 0 2px 0 2px;
           }
           
           .cat .price {
             font-size: 14px;
             
           }
           
           .name .mrp {
             font-size: 13px;
             color:#000 !important;
             
           }
           
           #product {
             max-height: 100%;
             margin-bottom: 0px;
           }
           
           .has-option {
             border: none;
             padding: 0px;
             box-shadow: none;
           }
           
           .option_help {
             color:#1C0055;
             font-size:14px;
             text-align:center;
           }
           
           #top_banner {
             padding-right: 0;
             padding-left: 0;
           }
           
           p {
             font-size: 14px;
             margin: 0;
           }
           
           .product-title-section {
             background-color: #A193A4;
             margin-top: 10px;
           }
           
           .product-title-subsection {
            background-image: url("/image/quick.jpg");
            padding: 45px 20px;
            height: 180px;
            width: 100%;
          }
         
          body {
           overflow-x:hidden!important;
         }
     
         .product-title{
           font-size: 29px!important;
           margin-bottom: 0px!important;
           margin-top: 0px!important;
           color: #ffffff!important;
           text-transform: none!important;
         }
         
         .selected-options h3 {
           font-size: 18px!important;
           text-align:left!important;
           margin-top: 5px!important;
           margin-bottom: 5px!important;
           color:#000;
         }
         
         .selected-options {
           padding-top:10px!important;
         }
         
         #minus {
           border-top-left-radius: 25px!important;
           border-bottom-left-radius: 25px!important;
           border-right:none!important;
           font-size: 20px;
         }
         #plus {
           border-top-right-radius: 25px!important;
           border-bottom-right-radius: 25px!important;
           border-left:none!important;
           font-size: 20px;
         }
         #input-quantity {
           padding-left: 5px!important;
           padding-right: 5px!important;
           border-left:none!important;
           border-right:none!important;
           width: 90px!important;
         }
         #minus:hover, #plus:hover {
           color: #f49a25!important;
           background: #fff!important;
         }
         #minus,#plus,#input-quantity {
           height:50px!important;
         }
         .qty-product label {
           margin-top: 15px!important;
         }
         .qty-product-content {
           position: relative;
           padding-top: 15px;
           width:80%;
           margin:auto;
           float:right;
         }
         .btn-block {
           border-radius: 25px;
           background: #f49a25;
           width:50%;
           color: beige;
           text-align: center;
           width: 50%;
           font-size: 15px !important;
           padding: 14px 16px !important;
           font-weight: 600 !important;
         }
         
         .text-total {
           font-size: 18px!important;
           color: #f49a25 !important;
           -webkit-transform: rotate(90deg);
           -ms-transform: rotate(90deg);
           transform: rotate(90deg);
           font-weight: 800;
           display: table-cell;
         }
         .main-price {
           font-size: 40px!important;
           color: #f49a25 !important;
           display: table-cell;
         }
         .price-section {
           line-height: 0px!important;
         }
         .button:hover {
           background: #666 !important;
         }
         
         a:hover, a:focus {
           text-decoration: none;
           outline: none;
           color: #fff;
         }
         
         .disabled {
           background-image : linear-gradient(to bottom, rgb(241,241,241), transparent);
           cursor : no-drop;
         }
         
         p.tip {
           text-decoration: none;
           display:none;
           padding: 1px;
         }
         
         .checkbox:hover p.tip,.posmcheckbox:hover p.tip  {
           display: block;
           border-radius: 6px;
           background-color: gold;
           position: absolute;
           top: 0px;
           color: #000;
           text-decoration: none;
           z-index:2;
           left:0;
         }
         
         :checked + label:hover p.tip, .disabled:hover p.tip {
           display: none;
         }
         
         .popup{
           position: fixed;
           z-index: 10004;
           top: 0;
           left: 0;
           width: 100%;
           -webkit-animation: alert-anim 1s cubic-bezier(1,-.01,0,.99);
           -moz-animation: alert-anim 1s cubic-bezier(1,-.01,0,.99);
           animation: alert-anim 1s cubic-bezier(1,-.01,0,.99);
         }
         
         .success {
           background: #fdad00 url('../../image/mobile/success.png') 10px center no-repeat;
           border: 1px solid #BBDF8D;
           -webkit-border-radius: 5px;
           -moz-border-radius: 5px;
           -ms-border-radius: 5px;
           -o-border-radius: 5px;
           border-radius: 5px;
           
         }
         
         .popuptext {
           position: relative;
           text-align: center;
           visibility: hidden;
           background: #f44336;
           color: #fff;
           padding: 5px 15px;
           width: 250px;
           left: calc( 50% - 125px);
           border-radius: 5px;
           cursor: pointer;
           -webkit-animation: updown 1.4s ease-in-out infinite;
           -moz-animation: updown 1.4s ease-in-out infinite;
           -o-animation: updown 1.4s ease-in-out infinite;
           animation: updown 1.4s ease-in-out infinite;
           top: 10px;
         }
         
         
         input[type="text"] {
           color: #000;
           height: 40px;
           border-color: black;
           text-align: center;
         }
         
         /* Popup arrow */
         .popuptext::after {
           content: '';
           display: block;
           position: absolute;
           left: calc( 50% - 7px );
           width: 0px;
           text-align: center;
           height: 0;
           border-top: 14px solid #F44336;
           border-right: 14px solid transparent;
           border-bottom: 0 solid transparent;
           border-left: 14px solid transparent;
         }
         
         /* Toggle this class - hide and show the popup */
         .show {
           visibility: visible;
           -webkit-animation: fadeIn 1s;
           animation: fadeIn 1s;
         }
         
         /* Add animation (fade in the popup) */
         @-webkit-keyframes fadeIn {
           from {opacity: 0;} 
           to {opacity: 1;}
         }
         
         @keyframes fadeIn {
           from {opacity: 0;}
           to {opacity:1 ;}
         }
     
         /*#selectedBaseContainer, #selectedSweetenerContainer, #selectedEdfContainer, #selectedSanContainer {
             cursor:pointer;
         }*/
         
         #selectedElementsContainer {
           cursor:pointer;
         }
         @media only screen and (max-width: 590px) {
           .myorders{
             margin-left: 221px;
           }
               
         }
         @media only screen and (min-width: 589px) {
           .myorders{
             margin-left: 906px;
           }
         }
             
         @media only screen and (min-width: 701px) {
           .modal-body {
             position: relative;
             padding: 40px;
           }
          #mobile-filter {
             transform: translate3d(-120%, 0, 0);
             -webkit-transform: translate3d(-120%, 0, 0);
             transition: all 0.6s;
             -webkit-transition: all 0.6s;
             position: fixed;
             top: 270px;
             overflow: auto;
             box-shadow: 0 0 20px;
             -webkit-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 1);
             -moz-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 1);
             background: #fff;
             z-index: 999;
             border-radius: 4px;
           }
         }
         @media only screen and (max-width: 700px) {
          html {
           overflow-y: scroll !important;
         }
         
         .dist-name {
           display: inline-block !important;
           z-index: 1;
           background: rgba(255,255,255,0.9);
           width: 100%;
           position: fixed;
           top: 0px;
         }
     
         .modal-body {
           position: relative;
           padding: 20px;
         }
     
         #add{
           width: 29px;
           background: black;
           font-size: 18px;
         }
             
         .checkbox label,.posmcheckbox label {
          width:auto;   
        }
         .product-title-section {
             margin-top: 0;
         }
           h6 {
             margin-top: 0px !important;
           }
           p.tip {
             display: none!important;
           }
           
           .checkbox,.posmcheckbox {
             width: calc( 50% - 20px);
           }
           
           .dist-name-mobile {
             position: relative;
             text-align: center;
           }
           
           .store-name-mobile {
             position: relative;
             text-align: center;
           }
           
           div #sticky {
             top: 0px;
           }
           
           #mobile-filter {
             transform: translate3d(-120%, 0, 0);
             -webkit-transform: translate3d(-120%, 0, 0);
             transition: all 0.6s;
             -webkit-transition: all 0.6s;
             position: fixed;
             top: 31%;
             overflow: auto;
             box-shadow: 0 0 20px;
             -webkit-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 1);
             -moz-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 1);
             background: #fff;
             z-index: 999;
             border-radius: 4px
           }
     
     
         }
     
         .checkbox input[type="checkbox"],.posmcheckbox input[type="checkbox"]{
           float: initial;
           margin-left: 0px;
           
         }
     
         .btn-block {
           height: 50px;
         }
         
         .cat{
           display:none;
         }
     
         .others {
           color:black
           font-size:15px;
         }
     
         #myBtn {
           display: none;
           position: fixed;
           bottom: 20px;
           right: 30px;
           z-index: 99;
           font-size: 18px;
           border: none;
           outline: none;
           background-color: #f49a25;
           color: white;
           cursor: pointer;
           padding: 15px;
           border-radius: 4px;
         }
     
         #myBtn:hover {
           background-color: #f49a25;
         }
     
         #show-filter {
           display: block;
           position: fixed;
           cursor: pointer;
           z-index: 9999;
         }
         
         .fa {
           font-size: 15px !important;
           color: #fff;
         }
         
         #show-filter i:first-child {
           position: fixed;
           top: 30%;
           left: 0;
           font-size: 2rem;
           width: 5rem;
           height: 5rem;
           line-height: 5rem;
           cursor: pointer;
           text-align: center;
           z-index: 120;
           border-top-right-radius: 3.5rem;
           border-bottom-right-radius: 3.5rem;
           -webkit-box-shadow: 0 0 0.5rem rgba(0,0,0,.17);
           box-shadow: 0 0 0.5rem rgba(0,0,0,.17);
           background-color: #000;
         }
         
         
         #mobile-filter.opened {
           -webkit-transform: translate3d(0%, 0, 0);
           transform: translate3d(0%, 0, 0);
         }
         #mobile-filter .panel {
           margin-top: 10px;
           margin-bottom: 10px;
         }
         #mobile-filter .cat-list li {
           font-size: 14px!important; 
         }
         #mobile-filter a.list-group-item {
           font-size: 15px!important;
           padding-top: 5px!important;
           padding-bottom: 5px!important;
         }
         #mobile-filter .filter-group .checkbox label {
           font-size: 14px!important;   
         }
         .filter-close {
           min-height: 25px!important;
         }
         .filter-close span {
           padding: 7px 0!important;
         }
         .filter-close span i {
           color: #000!important;
           font-size: 20px!important;
         }
         
         #filters{
           
           position: -webkit-sticky;
           position: sticky;
           top: 81px;
           margin-top: -6px;
         }
         .fa {
           display: inline-block;
           font: normal normal normal 14px/1 FontAwesome;
           font-size: 14px;
           font-size: inherit;
           text-rendering: auto;
           -webkit-font-smoothing: antialiased;
           -moz-osx-font-smoothing: grayscale;
         }
         
         .button {
           background: #f49a25;
           border: 0;
           font-weight: 600;
           font-size: 16px;
           padding: 7px 16px;
           border-radius: 4px;
           text-transform: none;
           color: #fff;
           -webkit-transition: ease-in-out .3s all;
           -moz-transition: ease-in-out .3s all;
           transition: ease-in-out .3s all;
           width:100%; 
         }
         .button:hover {
           color: #fff;
           background: #000;
           transition: .5s ease-in;
           -webkit-transition: .5s ease-in;
           -moz-transition: .5s ease-in;
           -o-transition: .5s ease-in;
           -ms-transition: .5s ease-in;
         }
         #myModal{
           z-index: 11000;
         }
         
        /* #notificationpopup{
           z-index: 11000;
         }
         
         #notificationpopup .modal-title {
           font-weight: 700;
           text-align: center;
           font-size: 27px;
           color: red
         }*/
         
         .dist-name {
           display: none;
           padding: 10px;
         }
     
       </style> 
       <div class="container">
           
         <?php if ($success) { ?>
             <div class="success"><?php echo $success; ?><img src="catalog/view/theme/<?php echo $this->config->get('config_template');?>/image/close.png" alt="" class="close" /></div>
         <?php } ?>
         
         <?php echo $column_left; ?>
         
         <div class="popup"></div>
         <div class="pull-left">
           <a class="btn btn-info" style="cursor:pointer;" onclick="clearCart();" ><strong><i class="fa fa-times"></i> Clear Cart </strong></a>
         </div>
     
         <div class="myorders"> 
             <?php if ($logged) { ?>
                 <a class="btn btn-info" href="<?php echo $my_orders; ?>">My Orders</a> 
                 <a class="btn btn-info" href="/product/quickorder">Quick Order</a>
             <?php } ?> 
         </div>
     <div class="row">
       <div id="content" class="col-md-12 col-sm-12 col-xs-12">
         <div class="row"><br>
         <div id="show-filter">
           <i class="fa fa-filter"></i>
         </div>
         <div id="mobile-filter" class="col-xs-9 col-sm-6">
           <div class="filter-close">
             <span class="pull-right"><i class="fa fa-close"></i></span>
           </div>
           <div class="panel panel-default">
             <div class="list-group">
               <a class="list-group-item">Select Category</a>
               <div class="list-group-item">
                 <div id="filter-group1" class="filter-group">
                   <select Id="categoryDropdown" style="height: 37px;width: 100%;" placeholder="Please">
                     <option value="" selected style="color:#000000;font-size:15px;">Select your option</option>
                      <option style="color:#000000;font-size:15px;">Berries</option>
                     <option style="color:#000000;font-size:15px;">Roasted Seeds</option>
                     <option style="color:#000000;font-size:15px;">Oats</option>
                     <option style="color:#000000;font-size:15px;">Raw Seeds</option>
                     <option style="color:#000000;font-size:15px;">Honey</option>
                     <option style="color:#000000;font-size:15px;">Quinoa</option>
                     <option style="color:#000000;font-size:15px;">Oatmeal</option>
                     <option style="color:#000000;font-size:15px;">Seeds Mixes</option>
                     <option style="color:#000000;font-size:15px;">Muesli</option>
                     <option style="color:#000000;font-size:15px;">Snack Mixes</option>
                     <option style="color:#000000;font-size:15px;">Flakes</option>
                     <option style="color:#000000;font-size:15px;">Granola</option>
                     <option style="color:#000000;font-size:15px;">Breakfast Mixes</option>  
                   </select>
                 </div>
               </div>
               <a class="list-group-item">Search</a> 
               <div class="list-group-item">
                 <div id="filter-group1" class="filter-group">
                  <input id="myInput2" type="text" style="font-size: 17px;width:100%" placeholder="Type here...">
                </div>
              </div>        
            </div>
          </div> 
         </div>
        <br>
        
        <div class="dist-name">
         <div class="col-md-12 col-xs-12 col-sm-12">
           <p class="dist-name-mobile"> </p> 
           <p class="store-name-mobile"> </p> 
         </div>
       </div>
       
       <div id="product" class="col-md-8 col-sm-12 col-xs-12">
        <div id="success"></div><div id="not_success"></div>
        <div class="row">
         <center><span>STEP: 1</span><p style="font-size: 25px;" class="control-label col-md-12 center">Seller App</p><br />
           
             <div class="col-md-3 col-sm-12 col-xs-12">
                 <select style="height: 37px;width: 90%;" placeholder="Please" name="distributor_idd" class="sel">
                     <option value="" selected style="color:#000000;font-size:15px;" name="distributor"> Select Distributor</option>
                     <?php foreach ($distributors as $distributor) { ?>
                         <option  value="<?php echo $distributor['distributor_id']; ?>"  style="color:#000000;font-size:15px;"><?php echo $distributor['name']; ?></option>
                     <?php } ?>  
                 </select>
             </div> 
         
             <div class="col-md-3 col-sm-12 col-xs-12">
                 <select style="height: 37px;width: 90%;" placeholder="Please" name="bit_id" class="sel">
                     <option value="" selected style="color:#000000;font-size:15px;" name="stores"> Select Beat</option>
                     <!--<?php foreach ($bits as $bit) { ?>
                         <option  value="<?php echo $bit['bit_id']; ?>"  style="color:#000000;font-size:15px;"><?php echo $bit['bitname']; ?></option>
                     <?php } ?>--> 
                 </select>
             </div>
             <div class="hidden-md hidden-lg"><br></div>
             <form id="form-nil-sale">
                 <div class="col-md-3 col-sm-12 col-xs-12">
                     <input type="hidden" name="location" id="location1" style="width:25%">
                     <select style="height: 37px;width: 90%;" placeholder="Please" name="stores_id" id="store_id" class="sel" onchange="changeDetected()">
                         <option value="">Select stores</option>
                     </select>
                 </div> 
                 <div class="hidden-md hidden-lg"><br></div>
                 <div class="col-md-3 col-sm-12 col-xs-12">
                     <select style="height: 37px;width: 90%;" id="nil_sale_reason" name="nil_sale_reason"  onchange="reasonselected()">
                         <option value="">Select reason for Nil Sale</option>
                         <option value="Purchase manager not available">Purchase manager not available</option>
                         <option value="Stock available">Stock available</option>
                         <option value="Offtake issue">Offtake issue</option>
                         <option value="Margin Issue">Margin Issue</option>
                         <option value="Outlet Closed">Outlet Closed</option>
                         <option value="Not Interested">Not Interested</option>
                         <option value="Distributor problem">Distributor problem</option>
                         <option value="Others">Others</option>
                     </select>
                     <input type="hidden" name="niluser" value="<?php echo $logged; ?>">
                 </div>  <br>  <br>  <br> 
             </form>
         </center></div><br><br>
       <div class="row">
        <center><button onclick="submittocart()" class="add-cart btn-block" id="add-cart" type="button"  data-loading-text="<?php echo $text_loading; ?>" ><i class='fa fa-shopping-cart' aria-hidden='true' style="padding-right:7px;"></i><span>select store</span></button></div></center><br />
                   <!--  <button  style="width: 172px;" class="btn btn-shopping-cart" ?>
                     <i class="fa fa-shopping-cart"></i><span>Add Selected To Cart</span>
                   </button>--> 
                  <!--div class="storeposm row" style="display:nonde;">  
                      <p style="font-size: 16px;" class="control-label col-md-12 center">What POSM is present in store?</p> 
                         <?php if ($posms) { ?>
                           <?php foreach ($posms as $posm) { ?>
                             <div  class="posmcheckbox col-md-3 col-sm-5 col-xs-5 pro-<?php echo $posm['posm_id']; ?>">
                              <div  class="checkbox1 ">
                               <input style="display:nonse;" type="checkbox" name="storeposm[<?php echo $posm['posm_id']; ?>][]" value="<?php echo $posm['posm_id']; ?>" id="a_<?php echo $posm['posm_id']; ?>" class="posmelements" />
                               <label for="<?php echo $posm['posm_id']; ?>">
                                 <img src="<?php echo $posm['thumb']; ?>" class="elements-image"/>
                                 <div class="product-details">
                                   <p class="name" style="color:#000;"><?php  echo $posm['name']; ?></p>
                                 </div>
                               </label>
                             </div>
                             <span class="storeposm-tool">
                               <input type="checkbox" id="<?php echo $posm['posm_id']; ?>" class="checkall" name="storeposmcart_id['posm_id'][]" value="<?php echo $posm['posm_id']; ?>" style="display:nosne;top: 2px;"><br>
                               <button type="button" id="add" class="sub">-</button>
                               <input type="text" value="1" name="storeposmcart_id['casee'][<?php echo $posm['posm_id']; ?>]"  size="2" >
                               <button type="button" id="add" class="add">+</button>
                             </span><br><br>
                           </div>
                         
                         <?php } ?>
                         <?php } ?>
                     </div--> 
                     
                     <div class="storeaddposm row" style="display:none;">  
                      <p style="font-size: 16px;text-align: center;font-weight: 700;color: #000;" class="control-label col-md-12 center">What POSM did you put today?</p> 
                         <?php if ($posms) { ?>
                           <?php foreach ($posms as $posm) { ?>
                             <div  class="posmcheckbox col-md-3 col-sm-5 col-xs-5 pro-<?php echo $posm['posm_id']; ?>">
                              <div  class="checkbox1 ">
                               <input style="display:none;" type="checkbox" name="storeaddposm[<?php echo $posm['posm_id']; ?>][]" value="<?php echo $posm['posm_id']; ?>" id="a_<?php echo $posm['posm_id']; ?>" class="posmelements" />
                               <label for="storeaddposm-<?php echo $posm['posm_id']; ?>">
                                 <img src="<?php echo $posm['thumb']; ?>" class="elements-image posmimg"/>
                                 <div class="product-details posmname">
                                   <p class="name" style="color:#000;"><?php  echo $posm['name']; ?></p>
                                 </div>
                               </label>
                             </div>
                             <span class="storeaddposm-tool">
                               <input type="checkbox" id="storeaddposm-<?php echo $posm['posm_id']; ?>" class="checkall" name="storeaddposmcart_id['posm_id'][]" value="<?php echo $posm['posm_id']; ?>" style="display:none;top: 2px;"><br>
                               <button type="button" id="add" class="sub">-</button>
                               <input type="text" value="1" name="storeaddposmcart_id['casee'][<?php echo $posm['posm_id']; ?>]"  size="2" >
                               <button type="button" id="add" class="add">+</button>
                             </span><br><br>
                           </div>
                         
                         <?php } ?>
                         <?php } ?>
                     </div> 
                   <div class="clearfix row"  id="myDIV">
                     <?php if ($products) { ?>
                       <?php foreach ($products as $product) { ?>
                         <div  class="checkbox col-md-3 col-sm-5 col-xs-5 pro-<?php echo $product['product_id']; ?>">
                          <div  class="checkbox1 ">
                           <input style="display:none;" type="checkbox" name="product[<?php echo $product['product_id']; ?>][]" value="<?php echo $product['product_id']; ?>" id="a_<?php echo $product['product_id']; ?>" class="elements" />
     
                           <label for="<?php echo $product['product_id']; ?>">
                             <img src="<?php echo $product['thumb']; ?>" class="elements-image"/>
                             <div class="product-details">
                               <p class="name" style="color:#000;"><?php  $count1 = substr($product['name'],13); echo  $count1; ?></p>
                               <p class="cat"><?php echo $product['quick_category']; ?></p>
                               <p class="price" ><span class="special-price"><?php echo $product['price']; ?></span></p>
                               <span style="font-size: 15px;color:#000;font-weight: 600;">MRP:<?php echo $product['mrp']; ?></span>
                             </div>
                           </label>
                         </div>
                         
                         <span class="multiplecart-tool">
                           <input type="checkbox" id="<?php echo $product['product_id']; ?>" class="checkall" name="multiplecart_id['product_id'][]" value="<?php echo $product['product_id']; ?>" style="display:none;top: 2px;">
                           
                           <br>
                           <button type="button" id="add" class="sub">-</button>
                           <input type="text" id="a3" value="1" name="multiplecart_id['casee'][<?php echo $product['product_id']; ?>]"  size="2" >
                           <button type="button" id="add" class="add">+</button>
                           <textarea class="cat" style="width: 56px;height: 40px;" type="text" id="a2" name="multiplecart_id['pack'][<?php echo $product['product_id']; ?>]"  size="2" ><?php echo $product['case_quantity']; ?></textarea>
                           
                         </span></br><br/>
                       </div>
                       
                     <?php } ?>
                   <?php } ?>
                 </div>
               </div>
               
               <!--Main Section-->
               <div class="col-md-4 col-sm-12 col-xs-12" id="sticky">
                <center style="font-size: 17px;">Distributor Name:</center>
                <input type="text" id="distributor_id" value="distributor name " name="distributor_id" style="width: 100%;" readonly>
                <br><br>
                <div class="product-title-section">
                 <div class="product-title-subsection"></div>
               </div>
               <div class="selected-options">
                 <?php if ($products) { ?>
                   <h3 class="col-md-6" id="selectedElementsContainer">My Quick List:</h3>
                   <h3 id="remainingSelection"></h3><br>
                   <h6 id="selectedElements"></h6>
                 <?php } ?>
               </div>
               <div class="form-group">
                <span>STEP: 2</span> <button onclick="submittocart()" class="add-cart btn-block" id="add-cart1" type="button" style="width:100%;" data-loading-text="<?php echo $text_loading; ?>"><i class='fa fa-shopping-cart' aria-hidden='true' style="padding-right:7px;"></i><span>Add & Checkout</span></button>
                <!--span>STEP: 3</span> 
                <a href="/quickcheckout/checkout" class="button btn-block" style="width:100%;text-align: center;background: #000000;" type="button"  data-loading-text="<?php echo $text_loading; ?>">Go To Checkout</a-->
              </div>
            </div>
          </div>
        </div>
      </div>
     </div>
     <input type="hidden" name="location" id="location" style="width:25%">
     <div id="address"></div>
     <button onclick="topFunction()" id="myBtn" title="Go to top">Top</button>
     
         <div id="notificationpopups" class="modal fade" role="dialog">
           <div class="modal-dialog">
             <!-- Modal content-->
             <div class="modal-content">
                 <div class="modal-header"> 
                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                     <h4 class="modal-title"><?php echo $notification_msg['heading'];?></h4>
                 </div>
               <div class="modal-body"> 
                  <p style="font-size: 20px;color: green"><?php echo $notification_msg['content'];?></p> 
               </div>
             </div>
     
           </div>
         </div>
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
             document.getElementById("location1").value = reponse.results[0].formatted;
         }
     </script> 
     <link rel="stylesheet" href="https://www.true-elements.in/admin/view/stylesheet/select2.min.css" type="text/css" />
     <script type="text/javascript" src="https://www.true-elements.in/admin/view/javascript/select2.min.js"></script>
     
     <script type="text/javascript">
         $('.sel').select2();
         $('select[name=\'distributor_idd\']').bind('change', function() {
             $.ajax({
                 url: 'index.php?route=product/sellerapp/mybeats&distributor_id=' + this.value,
                 dataType: 'json',
                 beforeSend: function() {
                     $('select[name=\'distributor_idd\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
                 },    
                 complete: function() {
                     $('.wait').remove();
                 },      
                 success: function(json) {
                        html = '<option value=""><?php echo "select beat"; ?></option>';
                        if (json['beats'] != '') {
                            for (i = 0; i < json['beats'].length; i++) {
                                html += '<option value="' + json['beats'][i]['bit_id'] + '"';
                                html += '>' + json['beats'][i]['bitname'] + '</option>';
                            }
                        } else {
                            html += '<option value="" selected="selected"><?php echo "Beats not available for selected distributor"; ?></option>';
                        }
                        $('select[name=\'bit_id\']').html(html);
                    },
                 error: function(xhr, ajaxOptions, thrownError) {
                 //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                   }
             });
         });
     
            $('select[name=\'distributor_idd\']').trigger('change');
     //--></script> 
     
     <script type="text/javascript">
         $('.sel').select2();
         $('select[name=\'bit_id\']').bind('change', function() {
             $.ajax({
                 url: 'index.php?route=product/sellerapp/mystores&bit_id=' + this.value,
                 dataType: 'json',
                 beforeSend: function() {
                     $('select[name=\'bit_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
                 },    
                 complete: function() {
                     $('.wait').remove();
                 },      
                 success: function(json) {
                        html = '<option value=""><?php echo "select store"; ?></option>';
                        if (json['stores'] != '') {
                            for (i = 0; i < json['stores'].length; i++) {
                                html += '<option value="' + json['stores'][i]['offlinestore_id'] + '"';
                                html += '>' + json['stores'][i]['firstname'] + '</option>';
                            }
                        } else {
                            html += '<option value="" selected="selected"><?php echo "Stores not available for selected beat"; ?></option>';
                        }
                        $('select[name=\'stores_id\']').html(html);
                    },
                 error: function(xhr, ajaxOptions, thrownError) {
                 //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                   }
             });
         });
     
            $('select[name=\'bit_id\']').trigger('change');
     //--></script> 
     <script type="text/javascript"><!--
         $('select[name=\'bit_id\']').bind('change', function() {
             $.ajax({
                 url: 'index.php?route=product/sellerapp/getdistributor&bit_id=' + this.value,
                 dataType: 'json',
                 beforeSend: function() {
                     $('select[name=\'stores_id\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
                 },    
                 complete: function() {
                     $('.wait').remove();
                 },      
                 success: function(json) { 
                     $('#distributor_id').val(json);
                     $('.dist-name-mobile').html(json);
                     var selectedstore = $('#store_id :selected').text(); 
                     $('.store-name-mobile').html(selectedstore); 
                     /*html = '<option value=""><?php echo "select D"; ?></option>';
                     if (json['distributors'] != '') {
                         for (i = 0; i < json['distributors'].length; i++) {
                               html += '<option value="' + json['distributors'][i]['customer_id'] + '"';
                   
                             html += '>' + json['distributors'][i]['firstname'] + '</option>';
                         }
                     } else {
                         html += '<option value="" selected="selected"><?php echo "Distributor not available for selected store"; ?></option>';
                     }
                        $('select[name=\'distributor_id\']').html(html); */
                   },
                   error: function(xhr, ajaxOptions, thrownError) {
                       //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                   }
             });
         });
         $('select[name=\'stores_id\']').trigger('change');
     //--></script> 
     <script type="text/javascript">
         var SeatProgramLevel;
         //var SeatAvailableFaculties;
         $('.add-cart').attr('disabled', 'disabled');
         $('#nil-sale').attr('disabled', 'disabled');
     
         function changeDetected(){
             SeatProgramLevel = $('#store_id').val();
             if ((SeatProgramLevel.length > 0)) {
                 $('.add-cart').removeAttr('disabled');
                 $(".add-cart span").text("Add & Checkout");
                  $(".storeaddposm").show();
             } else {
     
                 $('.add-cart').attr('disabled', 'disabled');
             }
             document.getElementById("selectedElements").innerHTML = '<p style="border-left: 3px solid #f49a25;">'+SeatProgramLevel+'</p>';
         }
     
         function reasonselected(){
             SeatProgramLevel = $('#nil_sale_reason').val();
             if ((SeatProgramLevel.length > 0)) {
                 $('#nil-sale').removeAttr('disabled');
                 $('#nil-sale').text("Punch Nil Sale");
                 $('#myDIV').hide();
             } else {
                 $('#myDIV').show();
                 $('#nil-sale').attr('disabled', 'disabled');
             }
         }
     
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
     <script type="text/javascript">
         $('.add').click(function () {
             $(this).prev().val(+$(this).prev().val() + 1);
         });
         $('.sub').click(function () {
             if ($(this).next().val() > 1) {
                 if ($(this).next().val() > 1) $(this).next().val(+$(this).next().val() - 1);
             }
         });
     </script>
     <script type="text/javascript">
         function submittocart(){
             var div  = $('.multiplecart-tool');                             
             var checkboxes = div.find('input:checked');
             var quantity = div.find('input:checked').siblings("input");  
             var casee = div.find('input:checked').siblings("input");  
             var pack = div.find('input:checked').siblings('textarea');
             var store_id = $('#store_id').find(":selected").val();
             var location = $('input[name="location"]').val();
             var nil_sale_reason = $('#nil_sale_reason').val();
             
             //var storeposmdiv  = $('.storeposm-tool');                           
             //var storeposmcheckboxes = storeposmdiv.find('input:checked');
             //var storeposmquantity = storeposmdiv.find('input:checked').siblings("input");
             var storeaddposmdiv  = $('.storeaddposm-tool');                        
             var storeaddposmcheckboxes = storeaddposmdiv.find('input:checked');
             var storeaddposmquantity = storeaddposmdiv.find('input:checked').siblings("input");
             
             
             var params = {}; 
             var storeposmparams = {};
             var storeaddposmparams = {};
             var a = 'quantity';                  
             var b = 'casee';
             var c = 'pack';
             var d = 'store_id';
             var e = 'location';
     
             if(store_id !=''){
                 for (var i=0, n=checkboxes.length;i<n;i++) {
                     if (checkboxes[i].checked) {                              
                         params[checkboxes[i].value] = quantity[i].value ; 
                         params[checkboxes[i].value] = casee[i].value ;          
                     }
                 } 
                 
                 for (var i=0, n=storeaddposmcheckboxes.length;i<n;i++) {
                     if (storeaddposmcheckboxes[i].checked) {                   
                         storeaddposmparams[storeaddposmcheckboxes[i].value] = storeaddposmquantity[i].value ;                    
                     }
                 } 
     
                 var languages = [];  
                 $('.posmelements').each(function(){  
                     if($(this).is(":checked")) {  
                         languages.push($(this).val());  
                     }  
                 });  
                 //languages = languages.toString();   
                 
                 $.ajax({
                     dataType: "json",
                     type : "POST",                                
                     url  : 'index.php?route=module/multiplecart',
                     data : {vals:params,store_id:store_id,location:location,nil_sale_reason:nil_sale_reason,storeaddposmparams:storeaddposmparams},
                     success : function(data){
                         <?php if($modules['notify'] == 0){?>
                             $("#notification").html(data['product_data']);           
                             $('.success').fadeIn('slow');
                             $('.warning').fadeIn('slow'); 
     
                             window.location.href = '/quickcheckout/checkout'; 
     
                         <?php } elseif($modules['notify'] == 1){ ?>
                             $(".popup").show().html(data['product_data']);
                             window.scrollTo(0, 200);
                             $('.success').fadeIn('slow');
                             $('.warning').fadeIn('slow');
                             $('#cart-total').html(json['total']);
     
                             $('#cart #cart-total').html(json['total']);
     
                             $('#cart-m #cart-total').html(json['total']);
     
                             $('html, body').animate({ scrollTop: 0 }, 'slow');
                             window.location.href = '/quickcheckout/checkout'; 
                         <?php } ?>
     
                         window.location.href = '/quickcheckout/checkout';  
                     }
                 })
             } else {
                 alert("select store");
             }    
         }                                                    
     </script>
     <script type="text/javascript">
         $('.checkbox1').click(function () {
             $(this).find('input[type=checkbox]').prop("checked", !$(this).find('input[type=checkbox]').prop("checked"));
         });
         
     
         $(document).ready(function() {
             ///After Page Load Enable All Checkboxes
             $(".checkbox input").prop("disabled", false);
             $(".checkbox1").on("click", function() {
                 //$("#nil_sale_reason").hide()   
                 //$("#nil-sale").hide()   
                 $("#nil_sale_reason").prop('disabled', true);
                 $("#nil-sale").prop('disabled', true);
                 $("#nil-sale").text("Disabled");
                 
                 var elementstext= "";
                 $('input.elements:checkbox:checked').each(function() {
                     elementstext+='&emsp;'+$(this).next('label').find('p.name').text()+'<br/>';
                 });
                 $('input.posmelements:checkbox:checked').each(function() {
                     elementstext+='&emsp;'+$(this).next('label').find('p.name').text()+'<br/>';
                 });
             
                 if (elementstext == ''){
                     $("#nil_sale_reason").removeAttr('disabled');
                     //$("#nil-sale").removeAttr('disabled'); 
                     $("#nil-sale").text("Select reason");
                     $("#nil_sale_reason").val("");
     
                 }
     
                 document.getElementById("selectedElements").innerHTML = '<p style="border-left: 3px solid #f49a25;">'+elementstext+'</p>';
     
                 $('input.elements:checkbox:checked').parent().parent().css({'box-shadow' : 'inset 0px 0px 0px 2px rgb(28,0,85)'});
                 $('input.elements:checkbox:not(:checked)').parent().parent().css({'box-shadow' : 'none'});
                 
                 $('input.posmelements:checkbox:checked').parent().parent().css({'box-shadow' : 'inset 0px 0px 0px 2px rgb(28,0,85)'});
                 $('input.posmelements:checkbox:not(:checked)').parent().parent().css({'box-shadow' : 'none'});
                 
                 
             });
         });
     </script>
     
     <script type="text/javascript">
         jQuery("#myInput").on("keyup", function() {
           // Retrieve the input field text and reset the count to zero
             var filter = $(this).val(),
               count = 0;
               // Loop through the comment list
               $('#myDIV div .checkbox1 label div .name').each(function() {
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
           
           $("#categoryDropdown").change(function () {
 
           // Retrieve the input field text and reset the count to zero
           var filter = $(this).val(),
           count = 0;
     
           // Loop through the comment list
           $('#myDIV div .checkbox1 label div .cat').each(function() {
     
     
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
     
         jQuery("#myInput1").on("keyup", function() {
               // Retrieve the input field text and reset the count to zero
               var filter = $(this).val(),
               count = 0;
               // Loop through the comment list
               $('#myDIV div .checkbox1 label div .name').each(function() {
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
     
         $("#myDropdown1").change(function () {
             // Retrieve the input field text and reset the count to zero
               var filter = $(this).val(),
               count = 0;
               // Loop through the comment list
               $('#myDIV div .checkbox1 label div .cat').each(function() {
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
     
         jQuery("#myInput2").on("keyup", function() {
               // Retrieve the input field text and reset the count to zero
               var filter = $(this).val(),
               count = 0;
               // Loop through the comment list
               $('#myDIV div .checkbox1 label div .name').each(function() {
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
     
         $("#myDropdown2").change(function () {
               // Retrieve the input field text and reset the count to zero
               var filter = $(this).val(),
               count = 0;
               // Loop through the comment list
               $('#myDIV div .checkbox1 label div .cat').each(function() {
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
     
         $('#show-filter').click(function() {
             if ($(this).hasClass('opened')) {
                 $(this).removeClass('opened');
                 $("#mobile-filter").removeClass('opened');
             } else {
                 $(this).addClass('opened');
                 $("#mobile-filter").addClass('opened');
             }
         });
     
         $('.filter-close span').click(function() {
             if($('#show-filter').hasClass('opened')) {
                 $('#show-filter').removeClass('opened');
                 $("#mobile-filter").removeClass('opened');
             }
         });
     
     </script>
     <script type="text/javascript">
         function clearCart() {
             $.ajax({
                 url: 'index.php?route=product/quickorder/clearcart',
                 dataType: 'json',
                 success: function(json) {
                     $('#cart #cart-total').html(json['total']);
                     $('#cart-m #cart-total').html(json['total']);
     
                     if (getURLVar('route') == 'checkout/cart' || getURLVar('route') == 'checkout/checkout') {
                         location = 'index.php?route=checkout/cart';
                     } else {
                         $('#cart > ul').load('index.php?route=common/cart/info ul li');
                     }
                 }
             });
         }
     </script>
     <script type="text/javascript">
         $('#nil-sale').on('click', function() {
             $.ajax({
                 url: 'index.php?route=product/sellerapp/nilsale',
                 type: 'post',
                 dataType: 'json',
                 data: $("#form-nil-sale").serialize(),
                 complete: function() {
                     $('#nil-sale').button('reset');
                 },
                 success: function(json) {
                     $('.alert-success, .alert-danger').remove();
     
                     if (json['error']) {
                         $('#success').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i><span>' + json['error'] + '</span></div>');
                         setTimeout(function(){
                             $('#success').fadeOut();
                         }, 10000); 
     
                     }
                       //alert(json['not_success']);
                   
                       if (json['not_success']) {
                           $('#not_success').after('<div class="alert alert-danger" style="margin-left: 10%; margin-right: 10%;"><i class="fa fa-exclamation-circle"></i><span>' + json['not_success'] + '</span></div>');
                           setTimeout(function(){
                               $('#not_success').fadeOut();
                           }, 10000); 
                           location = window.location;
     
                       } 
     
                       if (json['success']) {
                           $('#success').after('<div class="alert alert-success"><i class="fa fa-check-circle"></i><span>' + json['success'] + '</span></div>');
                           $('#nil-sale').attr('disabled', 'disabled');
                           setTimeout(function(){
                               $('.alert-success').fadeOut();
                           }, 2000);  
                           //alert("you have punched nil sale"); 
                           location = window.location;
                       }
                   }
               });
         });
     </script>
     <script type="text/javascript">
         if ( window.history.replaceState ) {
             window.history.replaceState( null, null, window.location.href );
         }
     </script>
 