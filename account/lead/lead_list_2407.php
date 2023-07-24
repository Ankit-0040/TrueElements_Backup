<?php echo $new_header; ?>
<link href="catalog/view/theme/default/stylesheet/new/lead_list.css" rel="stylesheet" media="screen" />
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


<!-- Core DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">

<!-- Core jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<!-- DataTables CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
<!-- DataTables Buttons CSS -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">


<!-- DataTables JS -->
<script type="text/javascript" src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<!-- DataTables Buttons JS -->
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.print.min.js"></script>


<!-- content/table -->
<div id="content" class="col-md-12 padding-0">
  
  <?php if ($error_warning) { ?>
    <div class="warning col-md-12"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
    <div class="success col-md-12"><?php echo $success; ?></div>
  <?php } ?>

      <div class="col-xxl-12 col-xl-12 col-12 mb-3">
    <div class="page_header p-1 bg-light text-center"><p class="mb-1 fs-6 fw-bold">Lead List</p>
    </div>
    </div>
    </div>
    
    <!--button started-->
    <div class="container">
        <div class="d-flex justify-content-end">
            <div class="mx-2 my-2">
            <div class="form-check form-switch">
                <?php if($show == "Active") { ?>
                    <input type="checkbox" name="onoffswitch" class="form-check-input" id="myonoffswitch" checked>
                <?php } else { ?>
                    <input type="checkbox" name="onoffswitch" class="form-check-input" id="myonoffswitch">
                <?php } ?>
                <label class="form-check-label" for="myonoffswitch"></label>
            </div>
        </div>
        
        
             <?php if($user =='puru@true-elements.com' || $user == 'Sujit') { ?>
                <div class="col-md-6 col-sm-3 col-4 d-flex align-items-center justify-content-end">
                    <a class="leadbtn form-check form-switch" id="openCategoryModalButton">Add Category</a>
                </div>
            <?php } ?>
            
                <div class ="mx-2 my-2">
                <a class="btn btn-primary leadbtn w-30" id="openModalButton">Add Lead</a>
                </div>
            </div>
        
    

    <div class="row">
        <div class="col-12">
            <input id="myInput2" type="text" placeholder="Type here..." class="d-sm-none">
        </div>
    </div>
</div>


<!--button closed-->
   
   
   
<div class="container-fluid">
  <div class="container-fluid">
  <div class="sticky-top">
    <div class="row justify-content-center"> <!-- Add the row class here -->
      <div class="my-2 col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-10">
        <div class="form-group">
            <div class=" p-4 bg-white shadow rounded-4 mb-3"> 
          <div class="row justify-content-center" >
              <!-- Add the row class here -->
            <label for="category-select" class="col-sm-4 col-xxl-4 col-xl-4 col-lg-4 col-form-label" >Select Category:</label> <!-- Adjust the column size based on your preference -->
            <div class="col-sm-8 col-xxl-6 col-xl-6 col-lg-6 col-md-8"> 
              <?php if($category_name) { ?>
                <select id="category-select" class="form-select sel" onchange="location = this.value;">
                  <option value="/account/lead" selected>Select Category</option>
                  <?php foreach($lead_typess AS $lead_type) { ?>
                    <?php if($lead_type['lead_category_id'] == $category_name) { ?>
                      <option value="<?php echo $lead_type['href']; ?>" selected><?php echo $lead_type['lead_category_name']; ?></option>
                    <?php } else { ?> 
                      <option value="<?php echo $lead_type['href']; ?>"><?php echo $lead_type['lead_category_name']; ?></option>
                    <?php } ?>
                  <?php } ?>
                </select>
              <?php } else { ?>
                <select id="category-select" class="form-select sel" onchange="location = this.value;">
                  <option value="/account/lead" selected>Select Category</option>
                  <?php foreach($lead_typess AS $lead_type) { ?> 
                    <option value="<?php echo $lead_type['href']; ?>"><?php echo $lead_type['lead_category_name']; ?></option>
                  <?php } ?>
                </select>
              <?php } ?>
            </div>
          </div>
          </div>
          <?php if (!$category_name) { ?>
            <label class="row justify-content-center mb-2 mt-2">Category</label>
            <a href="https://www.true-elements.in/account/lead" class="btn btn-primary d-block mb-2 navigation-btn">All</a>
            <?php foreach($lead_typess AS $lead_type) { ?>
              <a href="<?php echo $lead_type['href']; ?>" class="btn btn-primary d-block mb-2 navigation-btn"><?php echo $lead_type['lead_category_name']; ?></a>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>



    
    <div class="d-sm-none">
  <div id="show-filter">
    <i class="fa fa-funnel"></i>
  </div>

  <div id="mobile-filter" class="col-9 col-sm-6">
    <div class="filter-close">
      <span class="float-end"><i class="bi bi-x"></i></span>
    </div>

    <div class="fpanel shadow-sm border border-secondary">
      <div class="list-group">
        <a class="list-group-item">Select Category</a>
        <div class="list-group-item">
          <div id="filter-group1" class="filter-group">
            <select id="myDropdown2" class="form-select" style="height: 37px; width: 100%;">
              <option value="" selected>Select your option</option>
              <?php foreach ($lead_typess AS $lead_type) { ?>
                <option value="<?php echo $lead_type['href']; ?>"><?php echo $lead_type['lead_category_name']; ?></option>
              <?php } ?>
            </select>
          </div>
        </div>
        <a class="list-group-item">Search</a>
        <div class="list-group-item">
          <div id="filter-group1" class="filter-group">
            <input id="myInput3" type="text" class="form-control" style="font-size: 17px; width: 100%;" placeholder="Type here...">
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
  
  

 <div class = "container-fluid">
  <div class="content col-md-10 col-xs-12 col-sm-12 <?php echo $class_name; ?>">
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
    <div class="modal fade" id="addlead" tabindex="-1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
           <div class="modal-header">
    <h5 class="modal-title"><strong>Add New Lead</strong></h5>
    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>

            <div class="modal-body">
                <div class="container login-container">
                    <div class="row">
                        
                            <form action="index.php?route=account/lead/add" method="post" enctype="multipart/form-data" id="addleadModalForm">
                                <div class="form-group mb-3">
                                    <input type="text" name="name" class="form-control" placeholder="Lead name" value="" size="4"/>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Email" value="" size="4" />
                                </div>
                                <div class="form-group mb-3">
                                    <input type="number" name="mobile" class="numeric form-control" placeholder="Mobile" value="" vaalu="4"/>
                                    <input type="hidden" name="user" class="form-control" value="<?php echo $user; ?>" size="4" />
                                </div>
                                <div class="form-group mb-3">
                                    <input type="text" name="expected_business" class="form-control" placeholder="Expected Business" value="" size="4" />
                                </div>
                                <div class="form-group mb-3">
                                    <select name="lead_type" class="form-select">
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
                                <div class="form-group mb-3">
                                    <select name="assignuser" class="form-select">
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
                                <div class="form-group mb-3">
                                    <label for="attachment">Attachment</label>
                                    <a id="button-image-upload" class="btn btn-info">Upload</a><span id="uploadMsgImage"></span>
                                    <input type="hidden" value="" id="attachment" name="attachment">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="comment">Comment</label>
                                    <textarea class="form-control" name="comment" rows="5" cols="5"><?php echo $comment; ?></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <input type="submit" class="button btn btn-primary" value="Add Lead" />
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <!-- Add lead popup-->
    
<!-- Including Bootstrap 5 JS  -->
<script>
    document.getElementById('openCategoryModalButton').addEventListener('click', function() {
        var categoryModal = new bootstrap.Modal(document.getElementById('addleadcategory'));
        categoryModal.show();
    });
</script>

<script>
    document.getElementById('openModalButton').addEventListener('click', function() {
        var myModal = new bootstrap.Modal(document.getElementById('addlead'));
        myModal.show();
    });
</script>


<!--Handle upload attachment in add lead-->
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('button-image-upload').addEventListener('click', function() {
      const fileInput = document.createElement('input');
      fileInput.type = 'file';
      fileInput.accept = '.jpg, .jpeg, .png'; // Optional: Limit accepted file types
      fileInput.addEventListener('change', handleFileUpload);
      fileInput.click();
    });
  });

  function handleFileUpload(event) {
    const file = event.target.files[0];
    if (!file) return;

    const formData = new FormData();
    formData.append('file', file);

    fetch('index.php?route=account/lead/upload', {
      method: 'POST',
      body: formData
    })
      .then(response => response.json())
      .then(json => {
        if (json['success']) {
          alert(json['success']);
          document.getElementById('uploadMsgImage').textContent = ' ' + json['mask'];
          document.getElementById('attachment').value = json['uploaded_filename'];
        } else if (json['error']) {
          alert(json['error']);
        }
      })
      .catch(error => {
        console.error('Error uploading file:', error);
        alert('An error occurred during file upload. Please try again.');
      });
  }
</script>
<!--Handle upload attachment in add lead-->





  <!--  <script type="text/javascript">
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
    </script>-->

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

  <!-- Add lead Modal form Condition-->
<script type="text/javascript">
  $(document).ready(function() {
    $("#addleadModalForm").validate({
      rules: {
        name: {
          required: true,
          minlength: 2
        },
        email: {
          email: true,
          minlength: 5
        },
        mobile: {
          minlength: 10
        },
        lead_type: {
          required: true
        },
        assignuser: {
          required: true
        }
      },
      messages: {
        name: {
          required: "Please enter name",
          minlength: "Name minimum length 2 characters"
        },
        email: {
          email: "Please enter a valid email address",
          minlength: "Email minimum length 5 characters"
        },
        mobile: {
          minlength: "Mobile number must be at least 10 digits"
        },
        lead_type: {
          required: "Please select Lead type"
        },
        assignuser: {
          required: "Please select User"
        }
      }
    });

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

<!-- Add lead Modal form Condition-->


<script type="text/javascript">
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
      'csv','excel'
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