<?php echo $quick_header; ?> 
<?php if ($success) { ?>
    <div class="success"><?php echo $success; ?></div>
<?php } ?>
<style>
    table {
      width:100%;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
    }
    th, td {
      padding: 15px;
      text-align: left;
    }
     
    #t01 th {
      background-color: black;
      color: white;
    }
</style>
<div id="content">
    <?php echo $content_top; ?>
  <div class="breadcrumb">
    <?php foreach ($breadcrumbs as $breadcrumb) { ?>
    <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
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
        <div class="table-heading col-md-10 col-xs-9 col-sm-9">
            <h1>Promoter Samples</h1>
        </div>
        <div class="buttons col-md-2 col-xs-3 col-sm-3">
            <a class="btn btn-info pull-right" href="<?php echo $sample_summary; ?>"><i class="fa fa-plus" aria-hidden="true"></i></a>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Sample Taste Count</th>
                    <th>Conversion</th>
                    <th>Units Sold</th>
                    <th>Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php if($sample_summary_data) { ?>
                    <?php foreach ($sample_summary_data as $data) { ?>
                        <tr>
                            <td><?php echo date('Y-m-d', strtotime($data['date_added'])); ?></td>
                            <td><?php echo $data['sample_taste_count']; ?></td>
                            <td><?php echo $data['conversion_customer_count']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td><?php echo round($data['sale']); ?></td>
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
  
  <div class="buttons">
    <div class="right"><a href="<?php echo $continue; ?>" class="button"><?php echo $button_continue; ?></a></div>
  </div>
  <?php echo $content_bottom; ?></div>