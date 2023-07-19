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

 #submit-summary:hover{
    background : #000 ;
      }
</style>


<div class="col-xxl-12 col-xl-12 col-12">
    <div class="page_header p-1 bg-light text-center"><p class="mb-1 fs-6 fw-bold">Sample Summary</p>
    </div>
</div>
<div id="content">
    <?php echo $content_top; ?>
    
    <div class="breadcrumb  py-2 px-3">
    <?php foreach ($breadcrumbs as $key => $breadcrumb) { ?>
        <?php if ($key > 0) { ?>
            <span class="breadcrumb-separator">&#8594;</span>
        <?php } ?>
        <a class="breadcrumb-link" aria-current="page" href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
    <?php } ?>
</div>
        
    </div>
    <div class="container mt-3">
        <form method="post" enctype="multipart/form-data" action="<?php echo $action; ?>">
            <?php if($sample_summary_exists == 1) { $disabled = "disabled"; } else { $disabled = ''; } ?>
        
       <div class="mx-auto p4 border rounded-3 bg-light" style="width: 500px;">     
        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 col-xs-12 col-sm-12 p-4">
            <div class="form-group mb-1">
                <label>Sample Taste Count:</label>
                <input type="text" class="form-control" name="sample_taste_count" value="<?php echo $sample_taste_count; ?>" <?php echo $disabled; ?>>
            </div>
            <div class="form-group required mb-1">
                <label>Conversion:</label>
                <input type="text" class="form-control" name="conversion_customer_count" value="<?php echo $conversion_customer_count; ?>" <?php echo $disabled; ?>>
            </div>
            <div class="form-group mb-1">
                <label>Units Sold:</label>
                <input type="text" class="form-control" name="quantity" value="<?php echo $quantity; ?>" <?php echo $disabled; ?>>
            </div>
            <div class="form-group mb-1">
                <label>Sale:</label>
                <input type="text" class="form-control" name="sale" value="<?php echo round($sale); ?>" <?php echo $disabled; ?>>
            </div>
            <div class="form-group text-center mt-3">
                <input class="button btn btn-default bg-dark-org text-white" id="submit-summary" type="submit" value="Submit Sample Summary" <?php echo $disabled; ?>>
            </div>
        </div>
    </div>
</div>

        </form>
    </div>
</div>
<?php echo $content_bottom; ?>