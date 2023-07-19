<?php echo $quick_header; ?>
<div class="col-xxl-12 col-xl-12 col-12">
    <div class="page_header p-1 bg-light text-center"><p class="mb-1 fs-6 fw-bold">Sample Summary</p>
    </div>
</div>
<div id="content">
    <?php echo $content_top; ?>
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
            <?php echo $breadcrumb['separator']; ?><a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <div class="container">
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <?php if($sample_summary_exists == 1) { $disabled = "disabled"; } else { $disabled = ''; } ?>
            <div class="col-md-4 col-md-offset-4 col-xs-12 col-sm-12">
                <div class="form-group"> 
                    <label>Sample Taste Count:</label>
    				<input type="text" class="form-control" name="sample_taste_count" value="<?php echo $sample_taste_count; ?>" <?php echo $disabled; ?>>
    			</div>
                <div class="form-group required">
                    <label>Conversion:</label>
                    <input type="text" class="form-control" name="conversion_customer_count" value="<?php echo $conversion_customer_count; ?>" <?php echo $disabled; ?>>
                </div>
                
                <div class="form-group"> 
                    <label>Units Sold:</label>
    				<input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>" <?php echo $disabled; ?>>
    			</div>
    			
    			<div class="form-group"> 
                    <label>Sale:</label>
    				<input type="text" class="form-control" name="sale" value="<?php echo round($sale); ?>" <?php echo $disabled; ?>>
    			</div>
                
                <div class="form-group text-center">
                    <input class="button btn btn-primary" type="submit" value="Submit Sample Summary" <?php echo $disabled; ?>>
                </div>
            </div>
        </form>
    </div>
</div>
<?php echo $content_bottom; ?>