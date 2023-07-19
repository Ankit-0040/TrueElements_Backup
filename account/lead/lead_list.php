<?php echo $quick_header; ?>
    <script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" />
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .pink {
        color: #feac00;
    }
    .p-0 {
        padding: 0 !important;
    }
    .my-3 {
        margin-top: 1rem !important;
        margin-bottom: 1rem !important;
    }
    
    .stickyheader {
        position: sticky;
        top: 0;
        z-index: 100;
    }
    
    .padding-0{
        padding: 0;
    }
    .table-striped tbody td a:nth-child(3) {
        background-color: #228B22;
    }
    
    .btn-info {
        background-color: #000;
        border-color: #000;
    }    
    
    .btn:hover, .btn:focus {
        background-color: #f49a25;
        border-color: #f49a25;
        color:#fff;
    } 
      
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
      color: white !important;
      border: none;
      background-color: #585858;
      background: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #585858), color-stop(100%, #111));
      /* Chrome,Safari4+ */
      background: -webkit-linear-gradient(top, #585858 0%, #111 100%);
      /* Chrome10+,Safari5.1+ */
      background: -moz-linear-gradient(top, #585858 0%, #111 100%);
      /* FF3.6+ */
      background: -ms-linear-gradient(top, #585858 0%, #111 100%);
      /* IE10+ */
      background: -o-linear-gradient(top, #585858 0%, #111 100%);
      /* Opera 11.10+ */
      background: linear-gradient(to bottom, #585858 0%, #111 100%);
      /* W3C */
    }
    
    table.dataTable tbody th, table.dataTable tbody td {
    
        border: 1px solid #ddd;
    
    }
    
    .dataTables_wrapper .dataTables_length {
        float: right !important;
        margin-bottom: 8px !important;
    
    }
    .dataTables_wrapper .dataTables_filter {
        float: left !important;
        text-align: left !important;
    }
    tfoot {
        display: table-header-group !important;
    }

    .ui-state-default input{
        width: 100% !important;

    }
     
    .hidden-xs, .hidden-sm{
        display: inline-table !important;
    }
    
    .hidden{
        display:none;
    }
    
    .modal-content{
        margin-top: 32%;
    }
    
    .login-heading {
        font-size: 24px;
    }
    
    #header #cart {
        display: none !important;
    }
    
    .form-control {
        background: #fff;
        border-radius: 5px;
    }
    
    @media(min-width: 780px) {
        .form-control {
              width: 77%;
        } 
        .dataTables_wrapper .dataTables_filter input {
            margin-left: 0.5em;
            height: 26px;
            width: 370px;
        }
    }
    
    .pull-right {
       margin: 1%;
    }
    
    input, button, select, textarea {
        color:#000 !important;   
    }
    
    #loginModal{
        background: #6d6d6d;    
        
    }
    
    .onoffswitch {
        position: relative;
        width: 90px;
        -webkit-user-select:none;
        -moz-user-select:none;
        -ms-user-select: none;
    }

    .onoffswitch-checkbox {
        display: none;
    }

    .onoffswitch-label {
        display: block;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid #ccc;
        border-radius: 20px;
    }
    
    .onoffswitch-inner {
        display: block;
        width: 200%;
        margin-left: -100%;
        -moz-transition: margin 0.3s ease-in 0s;
        -webkit-transition: margin 0.3s ease-in 0s;
        -o-transition: margin 0.3s ease-in 0s;
        transition: margin 0.3s ease-in 0s;
    }

    .onoffswitch-inner:before, .onoffswitch-inner:after {
        display: block;
        float: left;
        width: 50%;
        height: 30px;
        padding: 0;
        line-height: 30px;
        font-size: 14px;
        color: white;
        font-weight: bold;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
}

    .onoffswitch-inner:before {
        content: "Active";
        padding-left: 10px;
        background-color: #f49a25;
        color: #fff;
    }

    .onoffswitch-inner:after {
        content: "All";
        padding-right: 10px;
        background-color: #31b0d5;
        color: #fff;
        text-align: right;
    }

    .onoffswitch-switch {
        display: block;
        width: 18px;
        margin: 6px;
        background: #FFFFFF;
        border: 2px solid #999999;
        border-radius: 20px;
        position: absolute;
        top: 0;
        bottom: 0;
        right: 56px;
        -moz-transition: all 0.3s ease-in 0s;
        -webkit-transition: all 0.3s ease-in 0s;
        -o-transition: all 0.3s ease-in 0s;
        transition: all 0.3s ease-in 0s; 
    }

    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-inner {
        margin-left: 0;
    }

    .onoffswitch-checkbox:checked + .onoffswitch-label .onoffswitch-switch {
        right: 0px; 
    }

    

    @media (max-width: 450px) and (min-width: 360px){
        .leadbtn{
          font-size: 12px;
          margin-left: 0 !important;
          font-weight: 501;
          padding: 8px 10px;
        }
        
         
        .activ{
            margin-left: -11px;
           
         }

         .rowmb{
            
            margin-bottom: 30px;
         }
         #sticky{
            position: static !important;
         }
     } 

     .btn-dang
         {
            background-color: #ee2500 !important;
            color: #fff;
         }  
         #myonoffswitch{
            display: none;
         } 

    div #sticky {
            position: -webkit-sticky;
            position: sticky;
            top: 5px;
            margin-top: 65px;
        }
         
    @media (max-width: 450px) {
         
         table.dataTable.collapsed tbody tr:nth-child(4n+2){
                  background-color: #F0F0F0;
           } 

          .sticky {
           position: fixed;
           top: 0;
           width: 100%;
           z-index: 100;
           background-color: #fff;
           padding: 15px 6px 12px 12px;
           border-bottom: 1px solid rgb(240, 240, 240);
           left: 0px;
           }
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
    
        #mobile-filter{
            position: fixed;
            z-index: 100;
            top:31%;
            left: 0%;
            background: rgb(255, 255, 255);
            border-radius: 4px;
            box-shadow: 0px 0px 20px;
            padding: 25px 25px 0px;
        }
        
        #mobile-filter checkbox{
            display: none;
        }
    
        @media only screen and (max-width: 768px){
            input[type="checkbox"], input[type="radio"] {
                margin: 4px 0 0;
                margin-top: 1px\9;
                line-height: normal;
               display: none;
            }
        }
        
        @media only screen and (max-width: 768px){
            table.dataTable thead th div.DataTables_sort_wrapper span {
                position: absolute;
                top: 50%;
                margin-top: -9px;
                right: -1px;
               
            }
        }
        @media screen and (min-width: 300px) and (max-width: 500px){
            #leads thead th, #leads tbody td{
                padding: 10px;
            } 
            tfoot.stickyfooter select{
                width: 60px;
            }
        }
        
        .modal-body{
            margin-right: 70px;
            margin-left: 0px;
        } 
            
        table.dataTable thead th div.DataTables_sort_wrapper span {
            position: absolute;
            top: 50%;
            margin-top: -9px;
        }
</style> 

<!-- content/table -->
<div id="content" class="col-md-12 padding-0">
  
  <?php if ($error_warning) { ?>
    <div class="warning col-md-12"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
    <div class="success col-md-12"><?php echo $success; ?></div>
  <?php } ?>
  <!--<div class="box col-md-12">-->
    <div class="heading"> 
      <center><h1 class="p-0 my-3"><span class="pink">Leads</span> List</h1></center>
      <div class="col-lg-12 buttons padding-0" id="btnbox" style="display:none;">
    <div class="rowmb" id="stick">
        <div class="col-md-offset-6 col-md-6 col-xs-12 col-sm-offset-5 col-sm-6" style="min-height: 65px;">
            <div class="activ col-md-offset-4 col-md-1 col-xs-4 col-sm-3">
                <div class="onoffswitch">
                    <?php if($show == "Active") { ?>
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                    <?php } else { ?>
                        <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch">
                    <?php } ?>
                    
                    <label class="onoffswitch-label" for="myonoffswitch">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                    </label>
                </div>
            </div>
        <?php if($user =='puru@true-elements.com' || $user == 'Sujit') { ?>
            <div class="col-md-offset-1 col-md-1 col-xs-4 col-sm-3">
                <a class="btn btn-info leadbtn" data-toggle="modal" data-target="#addleadcategory">Add Category</a>
            </div>
        <?php } ?>
            <div class="col-md-offset-2 col-md-2 col-xs-offset-1 col-xs-3 col-sm-2">
                <a class="btn btn-primary leadbtn" data-toggle="modal" data-target="#addlead">Add Lead</a>
            </div>
         </div>
     
      <div class="col-xs-12 hidden-lg">
        <input id="myInput2" type="text"  placeholder="Type here..." style="width:100%; font-size: 17px;margin-top: 7%;">
      </div>
  </div>
  </div> 
   
<div id="sticky">   
<div class="footleft">
   
    <?php if($category_name) { ?>
            <div class="footnav col-md-2 col-xs-12 col-sm-12 hidden-xs hidden-sm" style="margin-top: 50px;">
                 <select style="height: 37px;width: 100%;font-size: 17px;margin-bottom: 7%;" class="sel"  onchange="location = this.value;">
                    <option value="/account/lead" selected style="color:#000000;font-size:15px;">Select Category</option>
                    <?php foreach($lead_typess AS $lead_type) { ?>
                        <?php if($lead_type['lead_category_id'] == $category_name) { ?>
                            <option value="<?php echo $lead_type['href']; ?>" selected><?php echo $lead_type['lead_category_name']; ?></option>
                       <?php } else { ?> 
                            <option value="<?php echo $lead_type['href']; ?>"><?php echo $lead_type['lead_category_name']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
                
                    <a href="https://www.true-elements.in/account/lead" class="btn btn-block btn-info navigation-btn" style="margin-bottom: 10px;">All</a>
                    <?php foreach($lead_typess AS $lead_type) { ?> 
                     <?php if($lead_type['lead_category_id'] == $category_name) { ?>
                            <a href="<?php echo $lead_type['href']; ?>" class="btn btn-block navigation-btn" style="margin-bottom: 10px; background: #f49a25;color:#fff;"><?php echo $lead_type['lead_category_name']; ?></a>
                        <?php } else { ?>
                            <a href="<?php echo $lead_type['href']; ?>" class="btn btn-block btn-info navigation-btn" style="margin-bottom: 10px;"><?php echo $lead_type['lead_category_name']; ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
                <?php $class_name = "col-md-10"; ?>
            <?php } else { ?>
                <div class="footnav col-md-2 col-xs-12 col-sm-12 hidden-xs hidden-sm" style="margin-top: 50px;width:11%;">
                    
                    <select class="sel" style="font-size: 17px;margin-bottom: 7%;height: 37px;width: 100%;"  onchange="location = this.value;">
                    <option value="/account/lead" selected style="color:#000000;font-size:15px;">Select Category</option>
                    <?php foreach($lead_typess AS $lead_type) { ?> 
                        <option value="<?php echo $lead_type['href']; ?>"><?php echo $lead_type['lead_category_name']; ?></option>
                              <?php } ?>
                </select>
                
                <label>Category</label>

                    <a href="https://www.true-elements.in/account/lead" class="btn btn-block btn-info navigation-btn" style="margin-bottom: 10px;">All</a>
                    <?php foreach($lead_typess AS $lead_type) { ?>
                    <a href="<?php echo $lead_type['href']; ?>" class="btn btn-block btn-info navigation-btn" style="margin-bottom: 10px;"><?php echo $lead_type['lead_category_name']; ?></a>
                    <?php } ?>
                </div>    
                <?php $class_name = "col-md-10"; ?>
            <?php } ?>
            
           
    </div>
</div>
    
<div class="hidden-lg">
    <div id="show-filter">
      <i class="fa fa-filter"></i>
    </div>

 <div id="mobile-filter" class="col-xs-9 col-sm-6">
      <div class="filter-close">
        <span class="pull-right"><i class="fa fa-close"></i></span>
      </div>
    
      <div class="fpanel panel panel-default">
        <div class="list-group">
          <a class="list-group-item">Select Category</a>
          <div class="list-group-item">
            <div id="filter-group1" class="filter-group">
              <select Id="myDropdown2" style="height: 37px;width: 100%;" placeholder="Please">
                <option value="" selected style="color:#000000;font-size:15px;">Select your option</option>
                
                  <?php foreach($lead_typess AS $lead_type) { ?> 
                     <option value="<?php echo $lead_type['href']; ?>"><?php echo $lead_type['lead_category_name']; ?></option>
                  <?php } ?>
              </select>
            </div>
          </div>
          <a class="list-group-item">Search</a> 
          <div class="list-group-item">
            <div id="filter-group1" class="filter-group">
             <input id="myInput3" type="text" style="font-size: 17px;width:100%" placeholder="Type here...">
           </div>
         </div>        
       </div>
     </div> 
    </div>
  </div>
  
     
    <script type="text/javascript">
        window.onscroll = function() {myFunction()};
    
        var stick = document.getElementById("stick");
        var sticky = stick.offsetTop;
        function myFunction() {
          if (window.pageYOffset >= sticky) {
            stick.classList.add("sticky")
          } else {
            stick.classList.remove("sticky");
          }
        }
    </script>
    
    <script type="text/javascript">
        $(function () { 
            $('#myDropdown2').change( function() {
                location.href = $(this).val();
            });
        });

    $(document).ready(function(){
        $("#mobile-filter").css({'display': 'none'});
        $("#show-filter").click(function(){
            //var duration = 800;
            //var effect = 'slide';
            // $("#mobile-filter").toggle(effect, duration);
            $("#mobile-filter").slideToggle("slow");
    
        });

        $("#myInput2, #myInput3").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#leads tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
        
    });


  </script>
    <div class="content <?php echo $class_name; ?> col-xs-12 col-sm-12">
    <form action="" method="post" enctype="multipart/form-data" id="form">     
      <!--  <table class="hidden-xs hidden-sm" cellspacing="50" style="  border-spacing: 0px 0px;" width="100%" id="leads">-->
      <div >
        <table class="display" cellspacing="50" style="border-spacing: 0px 0px;" width="100%" id="leads">  
          <tfoot class="stickyfooter">
            <tr class=""> 
                <td class=""></td>
                <td class="status" id="status">Status</td>
                <th class ="name" id="name" >Lead Name</th>
                <th id="email">Email</th>
                <th id="mobile">Mobile</th>
                <td>Expected Business</td>
                <td id="comment">Comment</td>
                <td class="users" id="users">User</td>
                <td id="date_added">Added On</td>
                <td id="date_modified">Modified On</td>
                <td></td>
            </tr>
        </tfoot>
          <thead class="stickyheader">
            <tr> 
                <td class="all"></td>
                <th class="all">Status</th>
                <th class="all">Lead Name</th>
                <th class="min-desktop">Email</th>
                <td class="min-desktop">Mobile</td>
                <td class="min-desktop">Expected Business</td>
                <th class="min-desktop">Last Comment</th>
                <th class="all">User</th> 
                <th class="min-desktop">Added On</th>
                <th class="min-desktop">Last Updated</th>
                <th class="min-desktop">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php if ($leads) { ?>
            <?php foreach ($leads as $lead) { ?>
            <tr>
                <td style="text-align: center;">
                  <?php if ($lead['selected']) { ?>
                <input type="checkbox" name="selected[]" id="<?php echo $lead['lead_id']; ?>_select" value="<?php echo $lead['lead_id']; ?>" checked="checked" />
                <?php } else { ?>
                <input type="checkbox" name="selected[]" id="<?php echo $lead['lead_id']; ?>_select" value="<?php echo $lead['lead_id']; ?>" />
                <?php } ?></td>
                <td class="center"><?php echo $lead['status']; ?></td>
                <td class="center"><?php echo $lead['name']; ?></td>
                <td class="center"><?php echo $lead['email']; ?></td>
                <td class="center"><?php echo $lead['mobile']; ?></td>
                <td class="center"><?php echo ($lead['expected_business']>0)?$lead['expected_business']:"-"; ?></td>
                <td class="center">
                    <?php $initial_comment = preg_replace('/\s+/', ' ', $lead['comment']);
                            echo implode(PHP_EOL, str_split($initial_comment, 18))  ; ?>
                </td>
                <td class="center">
                <?php if ($lead['user']) { ?>
                    <?php echo $lead['user']; ?>
                <?php } else { ?>
                    <select name="<?php echo $lead['lead_id']; ?>_assignuser" id="<?php echo $lead['lead_id']; ?>_assignuser" onclick='document.getElementById("<?php echo $lead['lead_id']; ?>_select").setAttribute("checked","checked");'>
                        <option value=" ">Assign to</option> 
                        <option value="54784">Prachi</option>
                        <option value="54900">Rashmi</option>
                        <option value="54786">Dhivni</option>
                        <option value="54693">Sudhir</option>
                        <option value="54814">Saikiran</option>
                        <option value="54818">Krishna</option>
                        <option value="54764">Puru</option>
                        <option value="55062">Janhavi</option>
                        <option value="55592">Pavitra K</option>
                        <option value="54780">Amol</option> 
                        <option value="52620">Sujit</option> 
                    </select>
                    &nbsp;<a style="background: url(https://datatables.net/examples/resources/details_open.png) no-repeat center center; cursor: pointer;" onclick="$('#form').attr('action', '<?php echo $assign_user; ?>'); $('#form').submit();" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                    <?php } ?> 
                </td>
                <!--td><select name="<?php echo $lead['lead_id']; ?>_assignuser" id="<?php echo $lead['lead_id']; ?>_assignuser" onclick='document.getElementById("<?php echo $lead['lead_id']; ?>_select").setAttribute("checked","checked");'>
                        <option value=" ">Assign to</option> 
                        <option value="54784">Prachi</option>
                        <option value="54900">Rashmi</option>
                        <option value="54786">Dhivni</option>
                        <option value="54693">Sudhir</option>
                        <option value="54814">Saikiran</option>
                        <option value="54818">Krishna</option>
                        <option value="54764">Puru</option>
                    </select>
                    &nbsp;<a style="background: url(https://datatables.net/examples/resources/details_open.png) no-repeat center center; cursor: pointer;" onclick="$('#form').attr('action', '<?php echo $assign_user; ?>'); $('#form').submit();" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td>
                <td class="center">
                        <input type="date" class="date" name="<?php echo $lead['lead_id']; ?>_remind" onclick='document.getElementById("<?php echo $lead['lead_id']; ?>_select").setAttribute("checked","checked");' style="width: 70%;" value="<?php echo $lead['remind']; ?>">
                        
                        &nbsp;<a style="background: url(https://datatables.net/examples/resources/details_open.png) no-repeat center center; cursor: pointer;padding: 2%;" onclick="$('#form').attr('action', '<?php echo $edit_list; ?>'); $('#form').submit();" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a> 
                    </td-->
                
                <?php   $date_added = strtotime($lead['date_added']);
                            $new_date_added = date('d-M',$date_added);
                            $date_modified = strtotime($lead['date_modified']);
                            $new_date_modified = date('d-M',$date_modified);
                            
                    ?>

                <td class="center" data-sort="<?php echo $date_added; ?>"> <?php echo $new_date_added; ?></td>
                <td class="center" data-sort="<?php echo $date_modified; ?>"> <?php echo $new_date_modified; ?></td>
                
                <td class="right">
                     <?php if ($user == 'Puru' || $user == 'Rashmi' || $user =='Sujit' || $user =='Prachi' || $user =='Sanchita' || $user =='Saikiran') { ?>
                        <a class="dt-button buttons-print" href="<?php echo $lead['edit']; ?>" target="_blank">Edit</a>
                    <?php } ?>
                <a class="dt-button buttons-print" href="<?php echo $lead['href']; ?>" target="_blank">VH</a>
                <!--a class="dt-button buttons-print"  data-toggle="modal" data-target="#add-<?php echo $lead['lead_id']; ?>">AH</a-->
                </td>
            </tr>
            <?php } ?>
            <?php } else { ?>
            <tr>
              <td class="center" colspan="8"><?php echo $text_no_results; ?></td>
            </tr>
            <?php } ?>
          </tbody>
      </table>
    </div>
    </form>
      <!-- Mobile UI end -->
    </div>
  </div>
   
    
    <?php foreach ($leads as $lead) { ?>
        <div id="add-<?php echo $lead['lead_id']; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">X</button>
          <span class="modal-title"><p class="login-heading"><strong>Add History - <?php echo $lead['name']; ?></strong></p></span>
        </div>
        <div class="modal-body"> 
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                <form action="index.php?route=account/lead/add_history_list" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="lead_id" class="form-control" value="<?php echo $lead['lead_id']; ?>" size="4"/>
                       
                        <div class="form-group">
                             <textarea class="form-control" name="comment" rows="5" cols="5"><?php echo $comment; ?></textarea>
                                 <input type="hidden" name="user" class="form-control" value="<?php echo $user; ?>" size="4"/>
                              <input type="hidden" name="leaduser_id" class="form-control" value="<?php echo $lead['leaduser_id']; ?>" size="4"/>
                             
                        </div>
                        
                        <div class="form-group"> 
                            <select name="lead_status_id" class="form-control"> 
                                <option value="">Select Status</option>
                                <?php foreach ($lead_statuses as $lead_status) { ?> 
                                <?php if ($lead['lead_status_id'] == $lead_status['lead_status_id']) { ?>
                                    <option value="<?php echo $lead_status['lead_status_id']; ?>"  selected="selected"><?php echo $lead_status['name']; ?></option>
                                <?php } else { ?>
                                    <option value="<?php echo $lead_status['lead_status_id']; ?>" ><?php echo $lead_status['name']; ?></option>
                                <?php } ?>
                            <?php } ?>    
                            </select>
                        </div>  
                        <div class="form-group" style=""> 
                            <label>Assign to:</label>
                            <span style="display:none;"><?php echo $lead['user']; ?></span>
                            <select name="assignuser" class="form-control">
                                <?php foreach ($userss as $key => $value) { ?>
                                    <?php if ($lead['user'] == $key) { ?>
                                        <option value="<?php echo $key; ?>" selected="selected"><?php echo $key; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $key; ?>"><?php echo $key; ?></option>
                                <?php } ?>
                         <?php } ?> 
                        </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="button btn btn-primary" value="Add" />
                        </div> 
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div>
    <?php } ?>
</div>
<!-- content/table -->

    <!-- Add Category popup-->
    <div id="addleadcategory" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">X</button>
                  <span class="modal-title"><p class="login-heading"><strong>Add New Category</strong></p></span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="index.php?route=account/lead/addcategory" method="post" enctype="multipart/form-data" id="addcategoryModalForm">
                          <div class="row">
                            <input type="text" name="name" value="" placeholder="Lead category name" class="form-control">
                          </div> <br>
                          <div class="col-sm-2">
                            <input type="submit" value="Add Category" class="btn btn-primary">
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
   <!-- Add Category popup-->
   
   <!-- Add lead popup-->
    <div id="addlead" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
         <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">X</button>
          <span class="modal-title"><p class="login-heading"><strong>Add New Lead</strong></p></span>
        </div>
        <div class="modal-body">
           
        <div class="container login-container">
            <div class="row">
                <div class="col-md-6 login-form-1">
                <form action="index.php?route=account/lead/add" method="post" enctype="multipart/form-data" id="addleadModalForm">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Lead name" value="" size="4"/>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" value="" size="4"/>
                        </div>
                        <div class="form-group">
                            <input type="number" name="mobile" class="numeric form-control" placeholder="Mobile" value="" size="4"/>
                            <input type="hidden" name="user" class="form-control" value="<?php echo $user; ?>" size="4"/>
                        </div> 
                        <div class="form-group">
                            <input type="text" name="expected_business" class="form-control" placeholder="Expected Business" value="" size="4"/> 
                        </div> 
                        <div class="form-group"> 
                            <select name="lead_type" class="form-control"> 
                                <option value="">Select lead category</option>
                                <?php foreach ($lead_cat as $lead_category) { ?>
                                
                                    <?php if ($category_name == $lead_category['lead_category_id']) { ?>
                                        <option value="<?php echo $lead_category['lead_category_id']; ?>" selected="selected"><?php echo $lead_category['lead_category_name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $lead_category['lead_category_id']; ?>"><?php echo $lead_category['lead_category_name']; ?></option>
                                    <?php } ?> 
                                <?php } ?>
                            </select>
                        </div>
                        
                        <div class="form-group"> 
                            <select name="assignuser" class="form-control">
                                <option value="">Select lead owner</option>
                                <?php foreach ($userss as $key => $value) { ?>
                                    <?php if ($lead['user'] == $value) { ?>
                                        <option value="<?php echo $key; ?>" selected="selected"><?php echo $key; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $value; ?>"><?php echo $key; ?></option>
                                    <?php } ?>
                                <?php } ?> 
                        </select>
                        </div>
                        <div class="form-group">
                            <label>Attachment</label>
                                <a id="button-image-upload" class="btn btn-info button">Upload</a><span id="uploadMsgImage"></span>
                                <input type="hidden" val="" id="attachment" name="attachment">
                        </div>
                        <div class="form-group">
                             <label>Comment</label>
                             <textarea class="form-control" name="comment" rows="5" cols="5"><?php echo $comment; ?></textarea> 
                        </div>
                        <div class="form-group">
                            <input type="submit" class="button btn btn-primary" value="Add Lead" />
                        </div> 
                    </form>
                </div>
            </div>
        </div>
        </div>
    </div>
  </div>
</div>
    <!-- Add lead popup-->

<script type="text/javascript">
    $(document).ready(function() {
        $("#btnbox").show();
    });
    
  new AjaxUpload('#button-image-upload', {
    action: 'index.php?route=account/lead/upload',
    name: 'file',
    autoSubmit: true,
    responseType: 'json',
    onSubmit: function(file, extension) {
      $('#button-image-upload').after('<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');
      $('#button-image-upload').attr('disabled', true);     
    },
    onComplete: function(file, json) {
      $('#button-image-upload').attr('disabled', false);
      console.log(json);
      if (json['success']) {
        alert(json['success']);
        $('#uploadMsgImage').text(' ' + json['mask']);
        $('#attachment').val(json['uploaded_filename']);             
      }
      if (json['error']) {
        alert(json['error']);
      }
      $('.loading').remove();
    }
  });
</script>

<script type="text/javascript"><!--
    var category = '<?php echo $category; ?>';
    url = 'index.php?route=account/lead';
    if(category > 0) {
        url += '&category=' + category;
    }
    $(document).ready(function() {
        $("#myonoffswitch").change(function() {
            if($('#myonoffswitch:checkbox:checked').length > 0) {
                url += '&show=Active';
                 
            } else {
                 url += '&show=All';
            }
            location = url;
        });
    });
</script>

<script type="text/javascript"><!--
    $(document).ready(function() { 
        $('#id-date_added').datepicker({dateFormat: 'd-M'}); 
        $('#id-date_modified').datepicker({dateFormat: 'd-M'}); 
        $('.date').datepicker({dateFormat: 'd-M'});
    });

    $('.switcher').on('switchChange.bootstrapSwitch', function(event, state) {
        if (state) {
            var long = "All";
            window.location.href = 'https://www.true-elements.in/account/lead&show='${long};
        } else {
            // Is not checked
            var long = " ";
            window.location.href = 'https://www.true-elements.in/account/lead&show='${long};
        }
    });

</script>
<script type="text/javascript">
    $(function() {

      $("#addleadModalForm").validate({
        rules: {
                name: {
                    required: true,
                    minlength: 2
             },
                email: {
                    required: false,
                    email: false,
                    minlength: 0
             },
                mobile: {
                    required: false,
                    minlength: 0
             },
                lead_type: {
                    required: true 
             },assignuser: {
                    required: true 
             }
            },
            messages: {
                name: {
                    required: "Please enter name",
                    minlength: "Name minimum length 2 characters"
             },
                email: {
                    required: "Please enter email",
                    minlength: "Email minimum length 5 characters",
                    email: "Please enter a valid email address"
             },
                mobile: {
                    required: "Please enter mobile number",
                    minlength: "mobile number must be at least 10 digits",
                    email: "Please enter a valid email address"
             },
                lead_type: {
                    required: "Please select Lead type" 
             },
                assignuser: {
                    required: "Please select User" 
             }
            }
      });
    });

    $(function() {
    
      $("#addcategoryModalForm").validate({
        rules: {
                name: {
                    required: true,
                    minlength: 2
             }
            },
            messages: {
                name: {
                    required: "Please enter category name",
                    minlength: "Name minimum length 2 characters"
             }
            }
      });
    });

</script>


<script type="text/javascript"><!--
 $(document).ready(function() { 
      $('#id-date_added').datepicker({dateFormat: 'd-M'}); 
      $('#id-date_modified').datepicker({dateFormat: 'd-M'}); 
      
      $('.date').datepicker({dateFormat: 'd-M'});
    });
    
    $('#leads tfoot th').each( function () {
        var title = $(this).text();
        var id = $(this).attr("id");
        $(this).html( '<input type="text" id="id-'+id+'" placeholder="Search '+title+'" />' );
    });

  $(document).ready(function() {
    var table = $('#leads').DataTable({
      scrollCollapse: true, 
      autoWidth: true, 
      responsive: true,
      dom: 'lBfrtip',
      buttons: [
      'csv', 'excel'
      ],
      language: {
        searchPlaceholder: "Universal Search"
      },
      lengthMenu: [
      [ 25, 50, 100, 200, -1 ],
      [ '25', '50','100','200', 'Show all' ]
      ],  

        
        initComplete: function () {
            // Apply the search
            this.api().columns().every( function () {
              var that = this;
              $( 'input', this.footer() ).on('keyup change clear', function () {
                if ( that.search() !== this.value ) {
                  that
                  .search( this.value )
                  .draw();
                }
              } );
            } );
          }
        });


    $("#status").each( function () {
        var select = $('<select><option value=""></option></select>')
            .appendTo( $(this).empty() ) .on( 'change', function () {
                var val = $(this).val();
                table.column(1)
                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                    .draw();
            });
            table.column(1).data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'">'+d+'</option>' )
            });
    });
    
    
    $("#users").each( function () {
        var select = $('<select><option value=""></option></select>')
            .appendTo( $(this).empty() ) .on( 'change', function () {
                var val = $(this).val();
                table.column(7)
                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
                    .draw();
            });
            table.column(7).data().unique().sort().each( function ( d, j ) {
                select.append( '<option value="'+d+'">'+d+'</option>' )
            });
    });
 
  });


</script>
<?php echo $quick_footer; ?>
