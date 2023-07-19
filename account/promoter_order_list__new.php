<?php echo $new_header; ?> 
<style>
 .breadcrumb-separator {
    color: #888;
    margin: 0 5px;
}
.breadcrumb-link {
    color: #333;
    text-decoration: underline;
    transition: color 0.3s ease;
}
.breadcrumb-link:hover {
    color: #007bff;
}
    #add-list {
    width: 35px;
    height: 35px;
}
</style>
<?php if ($success) { ?>
    <div class="success"><?php echo $success; ?></div>
<?php } ?>
<div class="col-xxl-12 col-xl-12 col-12">
    <div class="page_header p-1 bg-light text-center"><p class="mb-1 fs-6 fw-bold">Promoter Summary</p>
    </div>
</div>

<div id="content">
    <?php echo $content_top; ?>
    
        <div class="breadcrumb  py-2 px-3">
    <?php foreach ($breadcrumbs as $key => $breadcrumb) { ?>
        <?php if ($key > 0) { ?>
            <span class="breadcrumb-separator">&#8594;</span>
        <?php } ?>
        <a class="breadcrumb-link" href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
</div>
    
  
  <?php if ($orders) { ?>
    <div class="container">
        <h1><?php echo $heading_title; ?></h1>
    <table id="t01">
        <thead>
            <th>Order Id</th>
            <th>Added on</th>
            <th>Store Name:</th>
            <th>Action</th>
        </thead>
        <?php foreach ($orders as $order) { ?>
            <tbody>
                <td>#<?php echo $order['promoter_sale_id']; ?></td>
                <td><?php echo $order['date_added']; ?></td>
                <td><?php echo $order['name']; ?></td>
                <td><a href="<?php echo $order['href']; ?>" class="button btn btn-theme-default" target="blank"> View </a> 
                </td>
            </tbody>
        <?php } ?>
    </table>
  <div class="pagination"><?php echo $pagination; ?></div>
  </div>
  <?php } else { ?>
  <div class="content"><?php echo $text_empty; ?></div>
  <?php } ?>
  


<div class="container">
    <div class="row align-items-center">
        <div class=" table-heading col-12 col-md-10 col-xs-9 col-sm-9">
            <h1 class="h3 fw-bold text-smaller">Promoter Samples</h1>
        </div>
        <div class="col-md-2 col-xs-3 col-sm-3">
         <a class="btn btn rounded-circle btn-warning btn-sm float-end" id="add-list" href="<?php echo $sample_summary; ?>">
    <i class="fa fa-plus text-white "  style="font-size: 1.2em; line-height: 1; display: flex; align-items: center; justify-content: center; padding: 4px;" aria-hidden="true"></i>
</a>

        </div>
    </div>


      <div class="row my-2 my-lg-2">
          <div class = "col-md-12 col-sm-12 col-12">
    <div class = "table-responsive">
        <table class="table table-striped table-hover caption-top table-striped table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Date</th>
                    <th class="text-center">Sample Taste Count</th>
                    <th class="text-center">Conversion</th>
                    <th class="text-center">Units Sold</th>
                    <th class="text-center">Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php if($sample_summary_data) { ?>
                    <?php foreach ($sample_summary_data as $data) { ?>
                        <tr>
                            <td class="text-left"><?php echo date('Y-m-d', strtotime($data['date_added'])); ?></td>
                            <td class="text-left"><?php echo $data['sample_taste_count']; ?></td>
                            <td class="text-left"><?php echo $data['conversion_customer_count']; ?></td>
                            <td class="text-left"><?php echo $data['quantity']; ?></td>
                            <td class="text-left"><?php echo round($data['sale']); ?></td>
                        </tr>
                    <?php } ?>
                <?php } else { ?>
                    <tr>
                        <td class="text-center" colspan="5">No records found!</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>
</div>
</div>
</div>

    </div>
  
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php echo $content_bottom; ?></div>