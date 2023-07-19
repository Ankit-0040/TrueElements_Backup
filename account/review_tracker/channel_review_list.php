<?php echo $quick_header; ?> 
    <style>
        .filter-close {
          min-height: 25px !important;
        }
        .leftbtn{
            padding: 1px 1px 1px 16px !important;
            text-align: left;
        }
        
        .channel_rvw_catlist{
             height:400px;
             overflow-y:scroll;
        }
        .select2-container{
            padding:0 17px;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            right: 20px !important;
        }

        #mobile-filter {
          transform: translate3d(-120%, 0, 0);
          -webkit-transform: translate3d(-120%, 0, 0);
          transition: all 0.6s;
          -webkit-transition: all 0.6s;
          position: fixed;
          top: 30px;
          overflow: auto;
          box-shadow: 0 0 20px;
          -webkit-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 1);
          -moz-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 1);
          background: #fff;
          z-index: 9999;
          border-radius: 4px;
        }
            #mobile-filter.opened {
          -webkit-transform: translate3d(0%, 0, 0);
          transform: translate3d(0%, 0, 0);
        }
        #show-filter.opened {
          display: none;
        }
        #show-filter{
          position: fixed;
          top: 45%;
          left: 0;
          font-size: 2rem;
          width: 5rem;
          height: 5rem;
          line-height: 5rem;
          cursor: pointer;
          text-align: center;
          z-index: 121;
          border-top-right-radius: 3.5rem;
          border-bottom-right-radius: 3.5rem;
          -webkit-box-shadow: 0 0 0.5rem rgba(0,0,0,.17);
          box-shadow: 0 0 0.5rem rgba(0,0,0,.17);
          background-color: #000;
        }
        #show-filter .fa-filter{
            color:#fff;
            font-size: 1.7rem;
        }
        #mobile-filter{
            z-index:120; 
            top: 36%;
        }
    
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
        
        @media screen and (min-width: 768px) {
            div#myreviewModal > .modal-dialog {
                width: auto;
                padding-top: 30px;
                padding-bottom: 30px;
            }
        }
        
        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }
          
        .leftbtn {
            padding: 1px 1px;
        }
        #sticky {
            position: sticky;
            top: 20px;
        }
        
        @media (min-width: 1200px) {
            .container {
                width: 1170px;
            }
        }
          
        .leftbtn {
            padding: 1px 1px;
        }
        #sticky {
            position: sticky;
            top: 20px;
        }
        .btn {
            text-transform: none;
        }
    </style>
    
    <link rel="stylesheet" href="https://www.true-elements.in/catalog/view/theme/default/stylesheet/tool/channel_review.css" type="text/css" />
    <script type="text/javascript" src="catalog/view/javascript/jquery/ajaxupload.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://www.true-elements.in/admin/view/stylesheet/select2.min.css" type="text/css" />
    <script type="text/javascript" src="https://www.true-elements.in/admin/view/javascript/select2.min.js"></script>
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://www.true-elements.in/admin/view/stylesheet/select2.min.css" type="text/css" />
    <script type="text/javascript" src="https://www.true-elements.in/admin/view/javascript/select2.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- Add owner to catgeory popup-->
    <div id="addowner" class="modal fade" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                    <span class="modal-title"><p class="login-heading"><strong>Add Owner to Channel</strong></p></span>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <form action="index.php?route=account/channel_review/addowner" method="post" enctype="multipart/form-data" id="addcategoryModalForm">
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label" for="input-filter"><span data-toggle="tooltip" title="<?php echo $help_filter; ?>">Select Channel</span></label>
                                <select name="owner_channel" class="form-control selectsearch" id="channel_reviews_category">
                                    <option value="">Select Channel</option>
                                    <?php foreach ($channel_review_cat as $channel_review_category) { ?>
                                    <?php if ($category_name == $channel_review_category['channel_review_category_id']) { ?>
                                        <option value="<?php echo $channel_review_category['channel_review_category_id']; ?>" selected="selected"><?php echo $channel_review_category['channel_review_category_name']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?php echo $channel_review_category['channel_review_category_id']; ?>"><?php echo $channel_review_category['channel_review_category_name']; ?></option>
                                    <?php } ?>
                                    <?php } ?>
                                </select>
                            </div><br>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="input-filter"><span data-toggle="tooltip" title="<?php echo $help_filter; ?>">Owners</span></label>
                                <div class="col-sm-10" style="float: none;">
                                    <input type="text" name="filter_owner" id="input-filter-name" placeholder="Type owner name  (Autocomplete)" class="form-control filter_owner"> 
                                    <div id="category-owner" class="well well-sm" style="height: 150px; overflow: auto;">
                                      <?php $class = 'odd'; ?>
                                      <?php foreach ($channelowners as $category_owner) { ?>
                                      <?php $class = ($class == 'even' ? 'odd' : 'even'); ?>
                                      <div id="category-owner<?php echo $category_owner['owner_id']; ?>" class="<?php echo $class; ?>"><?php echo $category_owner['firstname']; ?><img src="admin/view/image/delete.png" alt="" />
                                        <input type="hidden" name="category_owner[]" value="<?php echo $category_owner['owner_id']; ?>" />
                                      </div>
                                      <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Save Changes" class="btn btn-primary">
                            </div>
                        </form>
                    </div>        
                </div>
            </div>
        </div>
    </div>
    <!-- Add owner to category popup-->
    
    <!-- Pending Count popup-->
    <div id="count" class="modal fade" role="dialog">
         
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                         Active Tasks count By User
                </div>
                <div class="modal-body">
                    <table class="display" cellspacing="50" style="border-spacing: 0px 0px;" width="100%" id="taskconut">  
                        <tfoot>
                            <tr class="hidden-xs"> 
                                <th id="users" class="users">User</th>
                                <td id="count">Active Task Count</td>
                                <td>On Hold Count</td>
                            </tr>
                        </tfoot>      
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>Active Task Count</th>
                                <th>On Hold Count</th>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php if ($users_activ_tasks) { ?>
                                <?php foreach ($users_activ_tasks as $users_activ_task) { ?>
                                <tr>
                                    <td><?php echo $users_activ_task['user_name']; ?></td>
                                    <td><?php echo $users_activ_task['count']; ?></td>
                                    <td><?php echo $users_activ_task['onholdcount']; ?></td>
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
    <!-- Pending count popup-->

    <!-- Add review popup-->
    <div id="addchannel_review" class="modal fade" role="dialog">
      <div class="modal-dialog" style="width:auto;">
        <!-- Modal content-->
        <div class="modal-content addmodal" style="width:auto;">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">X</button>
            <span class="modal-title"><p class="login-heading"><strong>Add New Review</strong></p></span>
          </div>
          <div class="modal-body">
            <div class="container login-container">
              <div class="row">
                <div class="col-md-12 login-form-1">
                  <form action="index.php?route=account/channel_review/add" method="post" enctype="multipart/form-data" id="addchannel_reviewModalForm">
                    <div class="form-group col-md-6"> 
                      <select name="channel_review_category" class="form-control selectsearch" id="channel_review_category"> 
                        <option value="">Select Channel</option>
                        <?php foreach ($channel_review_cat as $channel_review_category) { ?>
                          <?php if ($category_name == $channel_review_category['channel_review_category_id']) { ?>
                            <option value="<?php echo $channel_review_category['channel_review_category_id']; ?>" selected="selected"><?php echo $channel_review_category['channel_review_category_name']; ?></option>
                          <?php } else { ?>
                            <option value="<?php echo $channel_review_category['channel_review_category_id']; ?>"><?php echo $channel_review_category['channel_review_category_name']; ?></option>
                          <?php } ?>
                        <?php } ?>
                      </select>
                    </div>  
                    <div class="form-group  col-md-6">
                        <select name="priority" class="form-control sel">
                            <option value="">Select priority</option>
                            <option value="low">Low</option>
                            <option value="medium">Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>   
                    <table class="display dataTable dtr-inline" cellspacing="50" style="border-spacing: 0px; width: 100%;" width="100%"  border="1" id="multitable">
                        <thead>
                            <tr>
                                <td style="width: 20%;">Title </td>
                                <td style="width: 35%;">Description</td>
                                <td style="width: 20%;">Owner </td>
                                <td>Attachment</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>    
                            <tr id="product-row1">
                                <td><input type="text" name="review_description[1][title]" class="form-control" placeholder="Title" value="" size="4"/></td>
                                <td> <textarea class="form-control comment" name="review_description[1][description]" rows="3" cols="3"> </textarea> 
                                </td>
                                <td> 
                                    <select name="review_description[1][assignuser]" class="form-control selectsearch">
                                        <option value="">Select Review owner</option>
                                        <?php if ($channelowners) { ?>
                                        <?php foreach ($channelowners as $channelowner) { ?> 
                                        <option value="<?php echo $channelowner['owner_id']; ?>"><?php echo $channelowner['firstname'], " ", $channelowner['lastname']; ?></option>
                                        <?php } ?>
                                        <?php } ?>
                                    </select> 
                                </td>
                                <td>
                                    <label>Attachment</label>
                                    <a id="button-image-upload-1" class="btn btn-info button">Upload</a><span id="uploadMsgImage-1"></span>
                                    <input type="hidden" val="" id="attachment-1" name="review_description[1][attachment]">
                                </td>
                                <td class="center">  
                                    <img src="admin/view/image/delete.png" onclick="$('#product-row1').remove();" style="cursor: pointer;">
                                </td>
                            </tr>
                        </tbody>    
                        <tfoot style="display: table-footer-group !important">
                            <tr>
                                <td colspan="4"></td>
                                <td class="left"> <a onclick="addOptionValue(0);" class="button insert">Add More</a></td>
                            </tr>
                        </tfoot>
                    </table>
                    
                    <div class="form-group">
                      <input type="submit" class="button btn btn-primary pull-right" value="Add Review" />
                    </div>
                    <script>
                        var i = $('#multitable tbody tr').length +  1;
                        function addOptionValue(option_row) {
                            html = '<tr id="product-row' + i + '">';
                            html += '<td><input type="text" name="review_description[' + i + '][title]" class="form-control" placeholder="Title" value="" size="4"/></td>';
                            html += '<td><textarea class="form-control comment" name="review_description[' + i + '][description]" rows="3" cols="3"> </textarea></td>';
                            html += '<td><select name="review_description[' + i + '][assignuser]" class="form-control selectsearch"><option value="">Select Review owner</option><?php if ($channelowners) { ?> <?php foreach ($channelowners as $channelowner) { ?><option value="<?php echo $channelowner['owner_id']; ?>" ><?php echo $channelowner['firstname'], ' ', $channelowner['lastname']; ?></option><?php } ?>   <?php } ?></select></td>';
                            html +='<td><label>Attachment</label><a id="button-image-upload-' + i + '" class="btn btn-info button">Upload</a><span id="uploadMsgImage-' + i + '"></span><input type="hidden" val="" id="attachment-' + i + '" name="review_description[' + i + '][attachment]"></td>';
                            html += '<td class="center"><img src="admin/view/image/delete.png" onclick="$(\'#product-row' + i  + '\').remove();" style="cursor: pointer;"></td>';
                            html += '</tr>';
                         
                            tableBody = $("#multitable  tbody");
                            tableBody.append(html); 
                            
                            //$('#multitable tfoot').before(html);
                            
                            var rowcount = $('#multitable tbody tr').length;
                         
                                new AjaxUpload('#button-image-upload-' + rowcount + '', {
                                    action: 'index.php?route=account/channel_review/upload',
                                    name: 'file',
                                    autoSubmit: true,
                                    responseType: 'json',
                                    onSubmit: function(file, extension) {
                                        $('#button-image-upload-' + rowcount + '').after('<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');
                                        $('#button-image-upload-' + rowcount + '').attr('disabled', true);     
                                    },
                                    onComplete: function(file, json) {
                                        $('#button-image-upload-' + rowcount + '').attr('disabled', false);
                                        console.log(json);
                                        if (json['success']) {
                                                $('#uploadMsgImage-' + rowcount + '').text(' ' + json['mask']);
                                            
                                                $('#attachment-' + rowcount + '').val(json['uploaded_filename']);  
                                            alert(json['uploaded_filename']);
                                        }
                                        if (json['error']) {
                                                alert(json['error']);
                                        }
                                        $('.loading').remove();
                                    }
                                }); 
                                console.log('Hello World', + rowcount);
                        
                            $(this).focus().select();
                            i++;
                            var index = $('.inputs').index(this) + 1;
                            $('.inputs').eq(index).focus();
                            $('.selectsearch').select2();
                        }
                        
                        
                    </script>  
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Add lead popup-->
    
    <!-- my reviews -->
        <div id="myreviewModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header"> 
                        <button type="button" class="close" data-dismiss="modal">X</button>
                        <center><h4 class="modal-title">My Reviews</h4></center>
                        <a onclick="$('#form').attr('action', '<?php echo $bulk_update; ?>'); $('#form').submit();" class="button pull-right" style="background: #e46a76;box-shadow: 0 2px 4px rgba(0, 0, 0, .5);">Bulk Update</a>
                        <br>
                    </div>
                    
                    <div class="modal-body">
                        <div class="content <?php echo $class_name; ?> col-xs-12 col-sm-12 padding-0">
                            <form action="" method="post" enctype="multipart/form-data" id="form">     
                                <div> 
                                    <?php if ($channel_reviews) { ?>
                                        <table class="display cell-border" cellspacing="50" style="border-spacing: 0px 0px;" width="100%" id="my_reviews"> 
                                            <tfoot class="stickyfooter">
                                                <tr class=""> 
                                                    <td class=""></td>
                                                    <th id="title">Title</th> 
                                                    <td>Last Comment</td> 
                                                    <th class="status" id="status">Status</th> 
                                                    <td>Owner</td>
                                                    <td>New Status</td>
                                                    <td>Comment</td> 
                                                </tr>
                                            </tfoot>
                                            <thead class="stickyheader">
                                                <tr> 
                                                    <td class="all no-sort"></td>
                                                    <th class="all no-sort">Title</th> 
                                                    <td class="min-desktop no-sort">Last Comment</td>  
                                                    <th class="all no-sort">Status</th> 
                                                    <th class="all no-sort">Owner</th>
                                                    <td>New Status</td>
                                                    <th class="all no-sort">comment</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($channel_reviews as $channel_review) { ?>
                                                    <?php if ($channel_review['user_id'] == $logged) { ?>
                                                        <tr>
                                                            <td class="" style="text-align: center;">
                                                            <?php if ($channel_review['selected']) { ?>
                                                                <input type="checkbox" name="selected[]" id="<?php echo $channel_review['channel_review_id']; ?>_select" value="<?php echo $channel_review['channel_review_id']; ?>" checked="checked" />
                                                            <?php } else { ?>
                                                                <input type="checkbox" name="selected[]" id="<?php echo $channel_review['channel_review_id']; ?>_select" value="<?php echo $channel_review['channel_review_id']; ?>" />
                                                            <?php } ?></td>
                                                            <td class="center"><?php echo $channel_review['description']; ?></td>
                                                            <td class="center desc">
                                                                <?php $comment = preg_replace('/\s+/', ' ', $channel_review['comment']);
                                                                echo implode(PHP_EOL, str_split($comment, 16))  ; ?>
                                                            </td> 
                                                            <td class="center <?php echo $class; ?>" style=""><?php echo $channel_review['status']; ?></td>
                                                            <td class="center">
                                                                <select name="<?php echo $channel_review['channel_review_id']; ?>_user" class="form-control selectsearch" >
                                                                    <option value="">Select Review owner</option>
                                                                    <?php if ($channelowners) { ?>
                                                                    <?php foreach ($channelowners as $channelowner) { ?>  
                                                                        <?php if ($channelowner['owner_id'] == $channel_review['user_id']) { ?>
                                                                            <option value="<?php echo $channelowner['owner_id']; ?>" selected="selected"><?php echo $channelowner['firstname']; ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="<?php echo $channelowner['owner_id']; ?>"><?php echo $channelowner['firstname']; ?></option>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            
                                                            <td class="center">
                                                                <select name="<?php echo $channel_review['channel_review_id']; ?>_status" class="form-control"  onclick='document.getElementById("<?php echo $channel_review['channel_review_id']; ?>_select").setAttribute("checked","checked");'>
                                                                    <option value="">Select Review Status</option>
                                                                    <?php if ($channel_review_statuses) { ?>
                                                                    <?php foreach ($channel_review_statuses as $channel_review_status) { ?>
                                                                        <?php if ($channel_review_status['channel_review_status_id'] == $channel_review['channel_review_status_id']) { ?>
                                                                            <option value="<?php echo $channel_review_status['channel_review_status_id']; ?>" selected="selected"><?php echo $channel_review_status['name']; ?></option>
                                                                        <?php } else { ?>
                                                                            <option value="<?php echo $channel_review_status['channel_review_status_id']; ?>"><?php echo $channel_review_status['name']; ?></option>
                                                                        <?php } ?>
                                                                    <?php } ?>
                                                                    <?php } ?>
                                                                </select>
                                                            </td>
                                                            <td class=""><textarea class="date focusFields editable form-control comment" name="<?php echo $channel_review['channel_review_id']; ?>_comment" rows="3" cols="3" onclick='document.getElementById("<?php echo $channel_review['channel_review_id']; ?>_select").setAttribute("checked","checked");' > </textarea>  </td>
                                                        </tr>
                                                    <?php } ?>    
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    <?php } else { ?>
                                        <center><h2>No Reviews Found</h2></center>
                                    <?php } ?>
                                </div>
                            </form>
                        <!-- Mobile UI end -->
                        </div>
                         
                    </div>
                </div>
            </div>
        </div>
    <!-- my reviews -->
    
    <!-- Pending Count popup-->
    <div id="onleave" class="modal fade" role="dialog">
         
        <div class="modal-dialog">
        <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">X</button>
                         <center><h2>People on leave today</h2></center>
                </div>
                <div class="modal-body">
                    <table class="display" cellspacing="50" style="border-spacing: 0px 0px;" width="100%" id="onleavetable">  
                        <tfoot>
                            <tr class="hidden-xs"> 
                                <th class="user_name">User</th>
                                <th class="department">Department</th>
                                <td style="width: 20%;">From</td>
                                <td style="width: 20%;">To</td>
                                <td style="width: 20%;">No. Days</td>
                                <td style="width: 20%;">Status</td>
                            </tr>
                        </tfoot>      
                        <thead>
                            <tr>
                                <th>User</th> 
                                <th>Department</th> 
                                <td>From</td>
                                <td>To</td>
                                <td>No. Days</td>
                                <td>Status</td>
                            </tr>
                        </thead> 
                        <tbody>
                            <?php if ($peoples_on_leave) { ?>
                                <?php foreach ($peoples_on_leave as $people) { ?>
                                <tr>
                                    <td><?php echo $people['user_name']; ?></td>
                                    <td><?php echo $people['department']; ?></td>
                                    <td><?php echo $people['from_date']; ?></td>
                                    <td><?php echo $people['to_date']; ?></td>
                                    <td><?php echo $people['no_working_days']; ?></td>
                                    <td><?php echo $people['status']; ?></td>
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </tbody>
                    </table>   
                </div>
            </div>
        </div>
    </div>
    <!-- Pending count popup-->

<!-- content/table -->
<div id="content" class="col-md-12">
  <?php if ($error_warning) { ?>
    <div class="warning col-md-12"><?php echo $error_warning; ?></div>
  <?php } ?>
  <?php if ($success) { ?>
    <div class="success col-md-12"><?php echo $success; ?></div>
  <?php } ?>
  <!--<div class="box col-md-12">-->
<div class="review-header col-lg-10 col-md-12 col-sm-12 col-xs-12 padding-0">
    <div class="col-lg-12 heading">
        <center><h1 class="p-0 my-3"><span class="pink">Review</span> Tracker</h1></center>
    </div>

    <div class="col-lg-12 buttons padding-0" id="btnbox" style="display:nones;">
        <div class="rowmb">
            <div class="col-md-12 col-xs-12 col-sm-12 padding-0" style="min-height: 65px;">
          <div class="col-md-2 col-xs-6 col-sm-4 add-channel margin-bottom-5">
              <a class="btn btn-primary leadbtn reviewbtn" data-toggle="modal" data-target="#myreviewModal">My Reviews</a>
                <!--a class="btn btn-info leadbtn reviewbtn" data-toggle="modal" data-target="#addchannel_reviewcategory">Add Channel</a-->
          </div>
          <div class="col-md-2 col-xs-6 col-sm-4 channel-owner margin-bottom-5">
            <a class="btn btn-info leadbtn reviewbtn" data-toggle="modal" data-target="#addowner">Add Channel Owner</a>
          </div>
          <div class="col-md-3 col-xs-7 col-sm-4 padding-0 btn-margin margin-bottom-5">
            <a class="btn btn-info leadbtn" data-toggle="modal" data-target="#count">Users Active Tasks Count</a>
          </div>
          <div class="col-md-2 col-xs-5 col-sm-4 btn-margin add-review margin-bottom-5">
            <a class="btn btn-primary leadbtn reviewbtn" data-toggle="modal" data-target="#addchannel_review">Add Review</a>
          </div>
          <div class="col-md-3 col-xs-6 col-sm-4 padding-0 btn-margin margin-bottom-5">
            <a class="btn btn-info leadbtn" data-toggle="modal" data-target="#onleave">People on leave today</a>
          </div>
            
          <div class="activ col-md-1 col-md-offset-3 col-sm-4 col-xs-12">
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
          <!-- <div class="btn-details col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-0"><span style="font-weight: 700;">*Ed - Edit , *AH - Add History , *VH - View History</span></div> -->
        </div>
        <div class="col-xs-12 hidden-lg padding-0">
          <input id="myInput2" type="text"  placeholder="Type here..." style="width:100%; font-size: 17px;margin:20px 0;">
        </div>
      </div>
    </div>
 </div> 
      <div id="sticky" class="col-lg-2 col-md-2 col-sm-2">   
        <div class="footleft">
          <?php if($category_name) { ?>
            <div class="footnav col-md-12 col-xs-12 col-sm-12 hidden-xs hidden-sm padding-0" style="margin-top: 50px;">
                
                <select style="height: 37px;width: 100%;font-size: 17px;margin-bottom: 7%;" onchange="location = this.value;" class="selectsearch">
                    <option value="/account/channel_review" selected style="color:#000000;font-size:15px;">All</option>
                    <?php foreach($channel_review_typess AS $channel_review_type) { ?>
                        <?php if($channel_review_type['channel_review_category_id'] == $category_name) { ?>
                            <option value="<?php echo $channel_review_type['href']; ?>" selected><?php echo $channel_review_type['channel_review_category_name']; ?></option>
                       <?php } else { ?> 
                            <option value="<?php echo $channel_review_type['href']; ?>"><?php echo $channel_review_type['channel_review_category_name']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            <div class="channel_rvw_catlist col-lg-12 col-md-12 col-sm-12">
                <div style="margin-top:6%;padding:0 8px;">      
                    <a href="https://www.true-elements.in/account/channel_review" class="btn leftbtn btn-block btn-info navigation-btn" style="margin-bottom: 5px;">All</a>
                    <?php foreach($channel_review_typess AS $channel_review_type) { ?> 
                        <?php if($channel_review_type['channel_review_category_id'] == $category_name) { ?>
                        <a href="<?php echo $channel_review_type['href']; ?>" class="btn leftbtn btn-block navigation-btn" style="margin-bottom: 5px; background: #f49a25;color:#fff"><?php echo $channel_review_type['channel_review_category_name']; ?></a>
                        <?php } else { ?>
                        <a href="<?php echo $channel_review_type['href']; ?>" class="btn leftbtn btn-block btn-info navigation-btn" style="margin-bottom: 5px;"><?php echo $channel_review_type['channel_review_category_name']; ?></a>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
            </div>
            <?php $class_name = "col-md-10"; ?>
        <?php } else { ?>
          <div class="footnav col-md-12 col-xs-12 col-sm-12 hidden-xs hidden-sm padding-0" style="margin-top: 50px;">
              <select style="height: 37px;width: 100%;font-size: 17px;margin-bottom: 7%;" onchange="location = this.value;" class="selectsearch">
                    <option value="/account/channel_review" selected style="color:#000000;font-size:15px;">All</option>
                    <?php foreach($channel_review_typess AS $channel_review_type) { ?>
                        <?php if($channel_review_type['channel_review_category_id'] == $category_name) { ?>
                            <option value="<?php echo $channel_review_type['href']; ?>" selected><?php echo $channel_review_type['channel_review_category_name']; ?></option>
                       <?php } else { ?> 
                            <option value="<?php echo $channel_review_type['href']; ?>"><?php echo $channel_review_type['channel_review_category_name']; ?></option>
                        <?php } ?>
                    <?php } ?>
                </select> 
                <div class="channel_rvw_catlist col-lg-12 col-md-12 col-sm-12">
                    <div style="margin-top:6%;padding:0 8px;">   
                        <a href="https://www.true-elements.in/account/channel_review" class="btn leftbtn btn-block btn-info navigation-btn" style="margin-bottom: 5px;">All</a>
                        <?php foreach($channel_review_typess AS $channel_review_type) { ?>
                            <a href="<?php echo $channel_review_type['href']; ?>" class="btn leftbtn btn-block btn-info navigation-btn" style="margin-bottom: 5px;"><?php echo $channel_review_type['channel_review_category_name']; ?></a>
                        <?php } ?>
                    </div>
                </div>
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
                  <?php foreach($channel_review_typess AS $channel_review_type) { ?> 
                    <option value="<?php echo $channel_review_type['href']; ?>"><?php echo $channel_review_type['channel_review_category_name']; ?></option>
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
    
    
    
  <div class="content <?php echo $class_name; ?> col-xs-12 col-sm-12 padding-0" style="display:inline-block;">
    <form action="" method="post" enctype="multipart/form-data" id="form">     
      <div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padding-0 hidden-lg hidden-md ">
            <button id="btn-show-all-children" type="button" class="col-lg-3 col-md-3 col-sm-3     col-xs-5">Expand All Reviews</button>
            <button id="btn-hide-all-children" type="button" class="col-lg-3 col-md-3 col-sm-3 col-xs-6">Collapse All Reviews</button>
        </div>

        <?php if ($channel_reviews) { ?>
              <table class="display cell-border" cellspacing="50" style="border-spacing: 0px 0px;" width="100%" id="channel_reviews">  
          <tfoot class="stickyfooter">
            <tr class=""> 
                <td class=""></td>
                <td class=""></td>
                <th class="status" id="status">Status</th>
                <th class="name" id="name">Category</th>
                <th id="title">Title</th> 
                <th>Description</th>
                <th>Last Comment</th>
                <th class="review_user" id="review_user">Owner</th>
                <th id="priority" class="not-mobile priority">Priority</th>
                <th id="date_added">Date Added</th> 
                <th id="date_modified">Date Updated</th> 
                <td></td>
              </tr>
            </tfoot>
            <thead class="stickyheader">
              <tr> 
                <td class="all no-sort"></td>
                <th class="min-desktop">Review id</th> 
                <th class="all no-sort">Status</th>
                <th class="min-desktop no-sort">Category</th>
                <th class="all no-sort">Title</th> 
                <th class="min-desktop no-sort">Description</th>
                <td class="min-desktop no-sort">Last Comment</td>
                <th class="all no-sort">Owner</th>
                <th class="min-desktop no-sort">Priority</th>
                <th class="min-desktop no-sort">Added On</th>
                <th class="min-desktop no-sort">Updated On</th>
                <th class="min-desktop no-sort" style="width: 10%;">Action</th>
              </tr>
            </thead>
            <tbody>
                <?php foreach ($channel_reviews as $channel_review) { ?>
                   
                  <tr>
                    <td class="" style="text-align: center;">
                      <?php if ($channel_review['selected']) { ?>
                        <input type="checkbox" name="selected[]" id="<?php echo $channel_review['channel_review_id']; ?>_select" value="<?php echo $channel_review['channel_review_id']; ?>" checked="checked" />
                      <?php } else { ?>
                        <input type="checkbox" name="selected[]" id="<?php echo $channel_review['channel_review_id']; ?>_select" value="<?php echo $channel_review['channel_review_id']; ?>" />
                        <?php } ?></td>
                        <td class="center"><?php echo $channel_review['channel_review_id']; ?></td> 
                    
                        <td class="center <?php echo $class; ?>" style=""><?php echo $channel_review['status']; ?></td>

                        <td class="center"><?php echo $channel_review['channel_review_category_name']; ?></td>
                        <td class="center"><?php echo $channel_review['description']; ?></td>
                        <td class="center desc">
                            <?php $initial_comment = preg_replace('/\s+/', ' ', $channel_review['initial_comment']);
                            echo implode(PHP_EOL, str_split($initial_comment, 18))  ; ?></td>
                        <td class="center desc">
                            <?php $comment = preg_replace('/\s+/', ' ', $channel_review['comment']);
                            echo implode(PHP_EOL, str_split($comment, 16))  ; ?>
                        </td>

                        <td class="center"><?php echo $channel_review['user']; ?></td>
                        <!--td><select name="<?php echo $channel_review['channel_review_id']; ?>_assignuser" id="<?php echo $channel_review['channel_review_id']; ?>_assignuser" onclick='document.getElementById("<?php echo $channel_review['channel_review_id']; ?>_select").setAttribute("checked","checked");'>  
                          <option value="">Assign To</option>
                          <?php if ($channel_review['channel_owners']) { ?>
                            <?php foreach ($channel_review['channel_owners'] as $channelowner) { ?> 
                              <option value="<?php echo $channelowner['owner_id']; ?>" ><?php echo $channelowner['firstname']; ?></option>
                            <?php } ?>
                          <?php } ?> 
                        </select>
                        &nbsp;<a style="background: url(https://datatables.net/examples/resources/details_open.png) no-repeat center center; cursor: pointer;" onclick="$('#form').attr('action', '<?php echo $assign_user; ?>'); $('#form').submit();" >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a></td-->
                        <td class="center" style="<?php echo $backgroundl; ?>"><?php echo $channel_review['priority']; ?></td>

                        <?php   $date_added = strtotime($channel_review['date_added']);
                        $new_date_added = date('d-M',$date_added);
                        $date_modified = strtotime($channel_review['date_modified']);
                        $new_date_modified = date('d-M',$date_modified);

                        ?>

                        <td class="center" data-sort="<?php echo $date_added; ?>"> <?php echo $new_date_added; ?> </td> 
                        <td class="center" data-sort="<?php echo $date_modified; ?>"><?php echo $new_date_modified; ?></td> 

                        <td class="">
                          <?php if ($user == 'Puru' || $user == 'Rashmi' || $user =='Sujit') { ?>
                            <a class="dt-button buttons-print" href="<?php echo $channel_review['edit']; ?>" target="_blank">Ed</a>
                          <?php } ?>
                          <a class="dt-button buttons-print" href="<?php echo $channel_review['href']; ?>" target="_blank">VH</a>
                          <!--a class="dt-button buttons-print"  data-toggle="modal" data-target="#add-<?php echo $channel_review['channel_review_id']; ?>">AH</a-->
                        </td>
                      </tr>
                    <?php } ?>
                </tbody>
              </table>
                <?php } else { ?>
                    <center><h2>No Reviews Found</h2></center>
                <?php } ?>
            </div>
          </form>
          <!-- Mobile UI end -->
        </div>
    </div>
  </div>
  
    
  <!-- content/table -->
    <script type="text/javascript">
        $(document).ready(function() { 
            $('#id-date_added').datepicker({dateFormat: 'd-M'}); 
            $('#id-date_modified').datepicker({dateFormat: 'd-M'});
            $('.date').datepicker({dateFormat: 'd-M'});
        });
    
        $('#channel_reviews tfoot th').each( function () {
            var title = $(this).text();
            var id = $(this).attr("id");
            $(this).html( '<input type="text" id="id-'+id+'" placeholder="Search '+title+'" />' );
        });

        $(document).ready(function() {
            var table = $('#channel_reviews').DataTable({
                scrollCollapse: true,
                'responsive': true,
                autoWidth: true, 
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
                columnDefs: [
                    { orderable: true, className: 'no-sort', targets: 1},
                    { orderable: false, targets: '_all' }
                ],
                order: [[ 1 , "desc" ]],
                "pagingType": "first_last_numbers",
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every( function () {
                        var that = this;
                        $( 'input', this.footer() ).on('keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that.search( this.value ).draw();
                            }
                        });
                    });
                }
            });

        // Handle click on "Expand All" button
        $('#btn-show-all-children').on('click', function(){
            // Expand row details
            table.rows(':not(.parent)').nodes().to$().find('td:first-child').trigger('click');
        });

        // Handle click on "Collapse All" button
        $('#btn-hide-all-children').on('click', function(){
            // Collapse row details
            table.rows('.parent').nodes().to$().find('td:first-child').trigger('click');
        });


        $(".status").each( function () {
            var select = $('<select><option value=""></option></select>')
                .appendTo( $(this).empty() ) .on( 'change', function () {
                    var val = $(this).val();
                    table.column(2)
                        .search( val ? '^'+$(this).val()+'$' : val, true, false )
                        .draw();
                });
                table.column(2).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
        });
    
        $(".name").each( function () {
            var select = $('<select><option value=""></option></select>')
                .appendTo( $(this).empty() ) .on( 'change', function () {
                    var val = $(this).val();
                    table.column(3)
                        .search( val ? '^'+$(this).val()+'$' : val, true, false )
                        .draw();
                });
                table.column(3).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
        });
    
        $(".review_user").each( function () {
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
    
        $(".priority").each( function () {
            var select = $('<select><option value=""></option></select>')
                .appendTo( $(this).empty() ) .on( 'change', function () {
                    var val = $(this).val();
                    table.column(8)
                        .search( val ? '^'+$(this).val()+'$' : val, true, false )
                        .draw();
                });
                table.column(8).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
        });
 
    });

    </script>
    
    
    
    <script type="text/javascript"><!-- 

        $('#onleavetable tfoot th').each( function () {
            var title = $(this).text();
            var id = $(this).attr("id");
            $(this).html( '<input type="text" id="id-'+id+'" placeholder="Search '+title+'" />' );
        });

        $(document).ready(function() {
            var table1 = $('#onleavetable').DataTable( {
                scrollCollapse: true,
                autoWidth:         true, 
                dom: 'lBfrtip',
                buttons: [  ],
                language: {
                    searchPlaceholder: "Universal Search"
                },
                lengthMenu: [
                    [  25, 50, 100, 200, -1 ],
                    [ '25', '50','100','200', 'Show all' ]
                ], 
                'columnDefs': [         // see https://datatables.net/reference/option/columns.searchable
                    { 'searchable'    : true, 'sortable'    : true, 'targets'       : [0,0] }, 
                ],
                order: [[ 0 , "desc" ]],
                "pagingType":"full_numbers",
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.childRowImmediate,
                        type: 'none',
                        target: ''
                    },
                },
            
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every( function () {
                        var that = this;
                        $( 'input', this.footer() ).on( 'keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that.search( this.value ).draw();
                            }
                        });
                    });
                }
        });
        
        $(".user_name").each( function () {
            var select = $('<select><option value=""></option></select>').appendTo( $(this).empty() ) .on( 'change', function () {
                var val = $(this).val();
                    table1.column(0).search( val ? '^'+$(this).val()+'$' : val, true, false ).draw();
                });
                    table1.column(0).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
        });
        
        $(".department").each( function () {
            var select = $('<select><option value=""></option></select>').appendTo( $(this).empty() ) .on( 'change', function () {
                var val = $(this).val();
                    table1.column(1).search( val ? '^'+$(this).val()+'$' : val, true, false ).draw();
                });
                    table1.column(1).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
        });
    
    });
    
  </script>    
    <script type="text/javascript">
        window.onscroll = function() {myFunction()};
        var stick = document.getElementById("sticky");
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
        
            $("#myInput2, #myInput3").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#channel_reviews tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    </script>
    
    <script type="text/javascript">
        $('.selectsearch').select2();
        $(document).ready(function() {
            $("#btnbox").show();
        });
    
        $('#category-owner div img').live('click', function() {
    	    $(this).parent().remove();
    	    $('#category-owner div:odd').attr('class', 'odd');
    	    $('#category-owner div:even').attr('class', 'even');	
        });
    </script>
    <script type="text/javascript">/*
        $('.sel').select2();*/
        $('select[name=\'owner_channel\']').bind('change', function() {
        $.ajax({
            url: 'index.php?route=account/channel_review/channelowners&channel_review_category_id=' + this.value,
            dataType: 'json',
            beforeSend: function() {
                $('select[name=\'channel_review_category\']').after('<span class="wait">&nbsp;<img src="catalog/view/theme/default/image/loading.gif" alt="" /></span>');
            },    
            complete: function() {
                $('.wait').remove();
            },      
            success: function(json) {
                $('#category-owner').empty(); 
                if (json['owners'] != '') {
                    for (i = 0; i < json['owners'].length; i++) { 
                        $('#category-owner').append('<div id="category-owner' + json['owners'][i]['owner_id'] + '">' + json['owners'][i]['firstname']  + " " + json['owners'][i]['lastname'] + '<img src="admin/view/image/delete.png" alt="" /><input type="hidden" name="category_owner[]" value="' + json['owners'][i]['owner_id'] + '" /></div>');
                    }
                }  
        
                //$('#category-owner').append(html);
            },
            error: function(xhr, ajaxOptions, thrownError) {
                //alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

        //$('select[name=\'channel_review_category\']').trigger('change');
  //--></script>  
    <script type="text/javascript">
        $('#my_reviews tfoot th').each( function () {
            var title = $(this).text();
            var id = $(this).attr("id");
            $(this).html( '<input type="text" id="id-'+id+'" placeholder="Search '+title+'" />' );
        });

        $(document).ready(function() {
            var table = $('#my_reviews').DataTable({
                scrollCollapse: true,
                'responsive': true,
                autoWidth: true, 
                dom: 'lBfrtip',
                buttons: [ ],
                language: {
                    searchPlaceholder: "Universal Search"
                },
                lengthMenu: [
                    [ 10, 25, 50, 100, 200, -1 ],
                    [ '10', '25', '50','100','200', 'Show all' ]
                ], 
                columnDefs: [
                    { orderable: true, className: 'no-sort', targets: 1},
                    { orderable: false, targets: '_all' }
                ],
                order: [[ 1 , "desc" ]],
                "pagingType": "first_last_numbers",
                initComplete: function () {
                    // Apply the search
                    this.api().columns().every( function () {
                        var that = this;
                        $( 'input', this.footer() ).on('keyup change clear', function () {
                            if ( that.search() !== this.value ) {
                                that.search( this.value ).draw();
                            }
                        });
                    });
                }
            }); 


            $(".status").each( function () {
                var select = $('<select><option value=""></option></select>').appendTo( $(this).empty() ) .on( 'change', function () {
                    var val = $(this).val();
                    table.column(3).search( val ? '^'+$(this).val()+'$' : val, true, false ).draw();
                });
                table.column(3).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
            }); 
    
            $(".user").each( function () {
                var select = $('<select><option value=""></option></select>').appendTo( $(this).empty() ) .on( 'change', function () {
                    var val = $(this).val();
                    table.column(4).search( val ? '^'+$(this).val()+'$' : val, true, false ).draw();
                });
                table.column(4).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
            });
        });
    </script>   
    <script type="text/javascript"><!-- 

    $('#taskconut tfoot th').each( function () {
        var title = $(this).text();
        var id = $(this).attr("id");
        $(this).html( '<input type="text" id="id-'+id+'" placeholder="Search '+title+'" />' );
    });

    $(document).ready(function() {
        var table1 = $('#taskconut').DataTable( {
            scrollCollapse: true,
            autoWidth:         true, 
            dom: 'lBfrtip',
            buttons: [
            'csv', 'excel'
            ],
            language: {
                searchPlaceholder: "Universal Search"
            },
            lengthMenu: [
                [  25, 50, 100, 200, -1 ],
                [ '25', '50','100','200', 'Show all' ]
            ], 
            'columnDefs': [         // see https://datatables.net/reference/option/columns.searchable
                { 'searchable'    : true, 'sortable'    : true, 'targets'       : [0,1] }, 
            ],
            order: [[ 1 , "desc" ]],
            "pagingType":"full_numbers",
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.childRowImmediate,
                    type: 'none',
                    target: ''
                },
            },
        
            initComplete: function () {
                // Apply the search
                this.api().columns().every( function () {
                    var that = this;
                    $( 'input', this.footer() ).on( 'keyup change clear', function () {
                        if ( that.search() !== this.value ) {
                            that.search( this.value ).draw();
                        }
                    });
                });
            }
        });
        
        $(".users").each( function () {
            var select = $('<select><option value=""></option></select>').appendTo( $(this).empty() ) .on( 'change', function () {
                var val = $(this).val();
                    table1.column(0).search( val ? '^'+$(this).val()+'$' : val, true, false ).draw();
                });
                    table1.column(0).data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                });
        });
    
    });
    
  </script>
    <script type="text/javascript"><!--
        var category = '<?php echo $category; ?>';
        url = 'index.php?route=account/channel_review';
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
        $('.switcher').on('switchChange.bootstrapSwitch', function(event, state) {
            if (state) {
                var long = "All";
                window.location.href = 'https://www.true-elements.in/account/channel_review&show=' + long;
            } else {
                // Is not checked
                var long = "";
                window.location.href = 'https://www.true-elements.in/account/channel_review&show=' + long;
            }
        });

    </script>
    <script type="text/javascript">
        $(function() {
            $("#addchannel_reviewModalForm").validate({
                rules: {
                  channel: {
                    required: true,
                    minlength: 2
                  },
                  sub_group: {
                    required: true, 
                    minlength: 2
                  },
                  description: {
                    required: false,
                    minlength: 0
                  },priority: {
                    required: true,
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
                  sub_group: {
                    required: "Please enter sub group",
                    minlength: "sub group minimum length 5 characters" 
                  },
                  priority: {
                    required: "Please select priority",
                    minlength: "priority minimum length 5 characters" 
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
    
    <script type="text/javascript">
        new AjaxUpload('#button-image-upload-1', {
            action: 'index.php?route=account/channel_review/upload',
            name: 'file',
            autoSubmit: true,
            responseType: 'json',
            onSubmit: function(file, extension) {
                $('#button-image-upload-1').after('<img src="view/image/loading.gif" class="loading" style="padding-left: 5px;" />');
                $('#button-image-upload').attr('disabled', true);     
            },
            onComplete: function(file, json) {
                $('#button-image-upload-1').attr('disabled', false);
                console.log(json);
                if (json['success']) {
                    alert(json['success']);
                    $('#uploadMsgImage-1').text(' ' + json['mask']);
                    $('#attachment-1').val(json['uploaded_filename']);          
                }
                if (json['error']) {
                    alert(json['error']);
                }
                $('.loading').remove();
            }
        });
    </script>
    <script type="text/javascript"><!--
        // Filter
        $('input[name=\'filter_user\']').autocomplete({
            delay: 500,
            source: function(request, response) {
                $.ajax({
                    url: 'index.php?route=account/channel_review/autocompleteuser&filter_name=' +  encodeURIComponent(request.term),
                    dataType: 'json',
                    success: function(json) {   
                        response($.map(json, function(item) {
                            return {
                                label: item.name,
                                value: item.customer_id
                            }
                        }));
                    }
                });
            }, 
            select: function(event, ui) {
                $('#category-filter' + ui.item.value).remove();
                $('input[name=\'filter_user\']').val('');
                $('#category-user').append('<div id="category-user' + ui.item.value + '">' + ui.item.label + '<img src="admin/view/image/delete.png" alt="" /><input type="hidden" name="category_user[]" value="' + ui.item.value + '" /></div>');
                $('#category-user div:odd').attr('class', 'odd');
                $('#category-user div:even').attr('class', 'even');
                return false;
            },
            focus: function(event, ui) {
                return false;
            }
        });

        //#channel_review_category
        // Filter
        $('input[name=\'filter_owner\']').autocomplete({
            delay: 500,
            source: function(request, response) {
                $.ajax({
                    url: 'index.php?route=account/channel_review/autocompleteuser&filter_name=' +  encodeURIComponent(request.term),
                    dataType: 'json',
                    success: function(json) {   
                        response($.map(json, function(item) {
                            return {
                                label: item.name,
                                value: item.customer_id
                            }
                        }));
                    }
                });
            }, 
            select: function(event, ui) {
                $('#category-owner' + ui.item.value).remove();
                $('input[name=\'filter_owner\']').val('');
                $('#category-owner').append('<div id="category-owner' + ui.item.value + '">' + ui.item.label + '<img src="admin/view/image/delete.png" alt="" /><input type="hidden" name="category_owner[]" value="' + ui.item.value + '" /></div>');
                $('#category-owner div:odd').attr('class', 'odd');
                $('#category-owner div:even').attr('class', 'even');

                return false;
            },
            focus: function(event, ui) {
                return false;
            }
        });
</script>

<?php echo $quick_footer; ?> 
