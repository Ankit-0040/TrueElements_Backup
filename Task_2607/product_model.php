<?php
class ModelCatalogProduct extends Model {
	public function addProduct($data) {
	    $product_name = "";
		$this->db->query("INSERT INTO " . DB_PREFIX . "product SET model = '" . $this->db->escape($data['model']) . "', sku = '" . $this->db->escape($data['sku']) . "', upc = '" . $this->db->escape($data['upc']) . "', ean = '" . $this->db->escape($data['ean']) . "', jan = '" . $this->db->escape($data['jan']) . "', isbn = '" . $this->db->escape($data['isbn']) . "', mpn = '" . $this->db->escape($data['mpn']) . "', location = '" . $this->db->escape($data['location']) . "',rack_no = '" . $this->db->escape($data['rack_no']) . "', quantity = '" . (float)$data['quantity'] . "', shelf_life = '" . (int)$data['shelf_life'] . "', min_stock = '" . (float)$data['min_stock'] . "', fba_min_stock = '" . (int)$data['fba_min_stock'] . "', front_quantity = '" . (int)$data['front_quantity'] . "', millet_product = '" . (int)$data['millet_product'] . "', minimum = '" . (int)$data['minimum'] . "', subtract = '" . (int)$data['subtract'] . "', stock_status_id = '" . (int)$data['stock_status_id'] . "', te_com_url = '" . $this->db->escape($data['te_com_url']) . "', date_available = '" . $this->db->escape($data['date_available']) . "', manufacturer_id = '" . (int)$data['manufacturer_id'] . "', shipping = '" . (int)$data['shipping'] . "', price = '" . (float)$data['price'] . "',offline_sp = '" . (float)$data['offline_sp'] . "',online_sp = '" . (float)$data['online_sp'] . "', mrp2 = '" . (float)$data['mrp2'] . "', cost = '" . (float)$data['cost'] . "', points = '" . (int)$data['points'] . "', casepacking_pid = '" . $this->db->escape($data['casepacking_pid']) . "', product_packingtype = '" . $this->db->escape($data['product_packingtype']) . "', gross_weight = '" . (float)$data['gross_weight'] . "', weight = '" . (float)$data['weight'] . "', weight_class_id = '" . (int)$data['weight_class_id'] . "', length = '" . (float)$data['length'] . "', width = '" . (float)$data['width'] . "', height = '" . (float)$data['height'] . "', length_class_id = '" . (int)$data['length_class_id'] . "', status = '" . (int)$data['status'] . "', case_quantity = '" . (int)$data['case_quantity'] . "', quick_category = '" . $this->db->escape($data['quick_category']) . "',front_status = '" . (int)$data['front_status'] . "', tax_class_id = '" . $this->db->escape($data['tax_class_id']) . "', sort_order = '" . (int)$data['sort_order'] . "', date_added = NOW()");

		$product_id = $this->db->getLastId();
		
      	$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_channel SET product_id = '" . $product_id . "'");
      // COMBO		
		if (isset($data['product_combo'])) {
			foreach ($data['product_combo'] as $combo) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "mapped_combo SET combo_product_id = '" . (int)$product_id . "', product_id = '" . (int)$combo['product_id'] . "', deduct = '" . (int)$combo['deduct'] . "'");
			}		
		}
		// Sub Pro
		
		if (isset($data['sub_product_list'])) {
	        foreach ($data['sub_product_list'] as $list) {
	            	$this->db->query("INSERT INTO " . DB_PREFIX . "sub_product SET product_id = '" . (int)$product_id . "', rmpm_id = '" . (int)$list['rmpm_id'] . "', rmpm_name = '". $this->db->escape($list['rmpm_name']) ."', quantity = '" . (float)$list['quantity'] . "'");
		
	        }		
	   }
	
		//For Product Stock History
		$user = $this->user->getUserName();
		$this->db->query("INSERT INTO " . DB_PREFIX . "product_stock_history SET product_id = '" . (int)$product_id . "', comment =  'Initial Quantity', user = '" . $user . "', restock_quantity = '" . (float)$data['quantity'] . "', stock_quantity = '" . (float)$data['quantity'] . "',  date_added = NOW()");
        
        
      
      
		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product SET image = '" . $this->db->escape(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8')) . "' WHERE product_id = '" . (int)$product_id . "'");
		}

		foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET product_id = '" . (int)$product_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', title = '" . $this->db->escape($value['title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', description = '" . $this->db->escape($value['description']) . "', ingredients = '" . $this->db->escape($value['ingredients']) . "', tag = '" . $this->db->escape($value['tag']) . "', product_type = '". (int)$data['product_type'] ."', source_of_origin = '" . $this->db->escape($value['source_of_origin']) . "'");
			
			$product_name = $value['name'];
		}

		if (isset($data['product_store'])) {
			foreach ($data['product_store'] as $store_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_store SET product_id = '" . (int)$product_id . "', store_id = '" . (int)$store_id . "'");
			}
		}

		if (isset($data['product_attribute'])) {
			foreach ($data['product_attribute'] as $product_attribute) {
				if ($product_attribute['attribute_id']) {
					$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' AND attribute_id = '" . (int)$product_attribute['attribute_id'] . "'");

					foreach ($product_attribute['product_attribute_description'] as $language_id => $product_attribute_description) {				
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET product_id = '" . (int)$product_id . "', attribute_id = '" . (int)$product_attribute['attribute_id'] . "', language_id = '" . (int)$language_id . "', text = '" .  $this->db->escape($product_attribute_description['text']) . "'");
					}
				}
			}
		}

		if (isset($data['product_option'])) {
			foreach ($data['product_option'] as $product_option) {
				if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', required = '" . (int)$product_option['required'] . "'");

					$product_option_id = $this->db->getLastId();

					if (isset($product_option['product_option_value']) && count($product_option['product_option_value']) > 0 ) {
						foreach ($product_option['product_option_value'] as $product_option_value) {
							$this->db->query("INSERT INTO " . DB_PREFIX . "product_option_value SET product_option_id = '" . (int)$product_option_id . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value_id = '" . (int)$product_option_value['option_value_id'] . "', quantity = '" . (float)$product_option_value['quantity'] . "', subtract = '" . (int)$product_option_value['subtract'] . "', price = '" . (float)$product_option_value['price'] . "', price_prefix = '" . $this->db->escape($product_option_value['price_prefix']) . "', points = '" . (int)$product_option_value['points'] . "', points_prefix = '" . $this->db->escape($product_option_value['points_prefix']) . "', weight = '" . (float)$product_option_value['weight'] . "', weight_prefix = '" . $this->db->escape($product_option_value['weight_prefix']) . "'");
						} 
					}else{
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_option_id = '".$product_option_id."'");
					}
				} else { 
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value = '" . $this->db->escape($product_option['option_value']) . "', required = '" . (int)$product_option['required'] . "'");
				}
			}
		}

		if (isset($data['product_discount'])) {
			foreach ($data['product_discount'] as $product_discount) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_discount SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$product_discount['customer_group_id'] . "', quantity = '" . (float)$product_discount['quantity'] . "', priority = '" . (int)$product_discount['priority'] . "', price = '" . (float)$product_discount['price'] . "', date_start = '" . $this->db->escape($product_discount['date_start']) . "', date_end = '" . $this->db->escape($product_discount['date_end']) . "'");
			}
		}

		if (isset($data['product_special'])) {
			foreach ($data['product_special'] as $product_special) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$product_special['customer_group_id'] . "', priority = '" . (int)$product_special['priority'] . "', price = '" . (float)$product_special['price'] . "', date_start = '" . $this->db->escape($product_special['date_start']) . "', date_end = '" . $this->db->escape($product_special['date_end']) . "'");
			}
		}

		if (isset($data['product_image'])) {
			foreach ($data['product_image'] as $product_image) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_image SET product_id = '" . (int)$product_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['image'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
			}
		}

		if (isset($data['product_download'])) {
			foreach ($data['product_download'] as $download_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_download SET product_id = '" . (int)$product_id . "', download_id = '" . (int)$download_id . "'");
			}
		}

		if (isset($data['product_category'])) {
			foreach ($data['product_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id = '" . (int)$product_id . "', category_id = '" . (int)$category_id . "'");
			}
		}
		
		if (isset($data['product_zone'])) {
			foreach ($data['product_zone'] as $zone_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_zone SET product_id = '" . (int)$product_id . "', zone_id = '" . (int)$zone_id . "'");
			}
		}

		if (isset($data['product_filter'])) {
			foreach ($data['product_filter'] as $filter_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_filter SET product_id = '" . (int)$product_id . "', filter_id = '" . (int)$filter_id . "'");
			}
		}

		if (isset($data['product_related'])) {
			foreach ($data['product_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET product_id = '" . (int)$product_id . "', related_id = '" . (int)$related_id . "'");
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$related_id . "' AND related_id = '" . (int)$product_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET product_id = '" . (int)$related_id . "', related_id = '" . (int)$product_id . "'");
			}
		}

		if (isset($data['product_reward'])) {
			foreach ($data['product_reward'] as $customer_group_id => $product_reward) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_reward SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$customer_group_id . "', points = '" . (int)$product_reward['points'] . "'");
			}
		}

		if (isset($data['product_layout'])) {
			foreach ($data['product_layout'] as $store_id => $layout) {
				if ($layout['layout_id']) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_layout SET product_id = '" . (int)$product_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout['layout_id'] . "'");
				}
			}
		}

		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'product_id=" . (int)$product_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}

		if (isset($data['product_profiles'])) {
			foreach ($data['product_profiles'] as $profile) {
				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_profile` SET `product_id` = " . (int)$product_id . ", customer_group_id = " . (int)$profile['customer_group_id'] . ", `profile_id` = " . (int)$profile['profile_id']);
			}
		}
		
		$tax_rate = $this->db->query("SELECT title FROM " . DB_PREFIX . "tax_class WHERE tax_class_id = '" . $data['tax_class_id'] . "' LIMIT 1")->row['title'];
		    
		    $tax_rate = (int)filter_var($tax_rate, FILTER_SANITIZE_NUMBER_INT);
		    $online_sp = round((($tax_rate / 100) + 1) * $data['online_sp']);
		    $offline_sp = round((($tax_rate / 100) + 1) * $data['offline_sp']);
    		//New FG Entry Mail
    		$subject = "New PID created in the ERP System - " . $product_name . " - " . $product_id;
    	    
    		$fhtml = "<p>Hi Team,</p><p>New PID is created in the system. PFB details -</p>";
    		$fhtml .= "<p><b>Name: </b>" . $product_name . "<br/><b>Product ID: </b>" . $product_id . "<br/><b>Listed By: </b>" . $user . "<br/><b>Cost: </b>" . round($data['cost']) . "<br/><b>MRP: </b>" . round($data['mrp2']) . "<br/><b>Offline Selling Price: </b>" . $offline_sp . "<br/><b>Online Selling Price: </b>" . $online_sp . "<br/><b>GST(%): </b>" . $tax_rate . "<br/><b>Listing Date & Time: </b>" . date('Y-m-d H:i:s') . "</p>";
    		$fhtml .= "<p></p>";
    		
    		$mail = new Mail();
        	$mail->protocol = $this->config->get('config_mail_protocol');
        	$mail->parameter = $this->config->get('config_mail_parameter');
        	$mail->hostname = $this->config->get('config_smtp_host');
        	$mail->username = $this->config->get('config_smtp_username');
        	$mail->password = $this->config->get('config_smtp_password');
        	$mail->port = $this->config->get('config_smtp_port');
        	$mail->timeout = $this->config->get('config_smtp_timeout');
        	$mail->setTo($this->config->get('config_new_pid_entry_to'));
        	$mail->setFrom($this->config->get('config_email'));
        	$mail->setSender($this->config->get('config_name'));
        	$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
        	$mail->setHtml($fhtml);
        	$mail->send();
        	
		
		if($data['product_type'] == '4') {
    		//New FG Entry Mail
    		$subject = "New Finished Goods Listed in True Elements ERP System - " . $product_name . " - " . $product_id;
    	    
    		$html = "<p>Hi Team,</p><p>New FG is listed in the system. PFB details -</p>";
    		$html .= "<p><b>Name: </b>" . $product_name . "<br/><b>Product ID: </b>" . $product_id . "<br/><b>Listed By: </b>" . $user . "<br/><b>MRP: </b>" . round($data['mrp2']) . "<br/><b>Offline Selling Price: </b>" . $offline_sp . "<br/><b>Online Selling Price: </b>" . $online_sp . "<br/><b>GST(%): </b>" . $tax_rate . "<br/><b>Listing Date & Time: </b>" . date('Y-m-d H:i:s') . "</p>";
    		$html .= "<p><b>Note:</b>While listing product in other channels, use system product id. This will help us in proper analytics.</p>";
    		
    		$mail = new Mail();
        	$mail->protocol = $this->config->get('config_mail_protocol');
        	$mail->parameter = $this->config->get('config_mail_parameter');
        	$mail->hostname = $this->config->get('config_smtp_host');
        	$mail->username = $this->config->get('config_smtp_username');
        	$mail->password = $this->config->get('config_smtp_password');
        	$mail->port = $this->config->get('config_smtp_port');
        	$mail->timeout = $this->config->get('config_smtp_timeout');
        	$mail->setTo($this->config->get('config_new_fg_entry_to'));
        	$mail->setFrom($this->config->get('config_email'));
        	$mail->setSender($this->config->get('config_name'));
        	$mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
        	$mail->setHtml($html);
        	$mail->send();
		}

		$this->cache->delete('product');
	}

	public function editProduct($product_id, $data) {
	    
	    //For Product Stock History
		$user = $this->user->getUserName();
		$query = $this->db->query("SELECT quantity AS old_qty FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
		$old_qty = $query->row['old_qty'];

		$new_qty = (float)$data['quantity'];
		if ($old_qty == $new_qty) { 		//No update
			$restock_quantity = $new_qty;
			$stock_quantity = 0;
		} else {
			$restock_quantity = $new_qty;
			$stock_quantity = $new_qty - $old_qty;

			$this->db->query("INSERT INTO " . DB_PREFIX . "product_stock_history SET product_id = '" . (int)$product_id . "', comment =  'Product Page Update', user = '" . $user . "', restock_quantity = '" . $restock_quantity . "', stock_quantity = '" . $stock_quantity . "', date_added = NOW()");
		}
		//EOF stock history
		
		$this->db->query("UPDATE " . DB_PREFIX . "product SET model = '" . $this->db->escape($data['model']) . "', sku = '" . $this->db->escape($data['sku']) . "', upc = '" . $this->db->escape($data['upc']) . "', ean = '" . $this->db->escape($data['ean']) . "', jan = '" . $this->db->escape($data['jan']) . "', isbn = '" . $this->db->escape($data['isbn']) . "', mpn = '" . $this->db->escape($data['mpn']) . "', location = '" . $this->db->escape($data['location']) . "',rack_no = '" . $this->db->escape($data['rack_no']) . "', quantity = '" . (float)$data['quantity'] . "', shelf_life = '" . (int)$data['shelf_life'] . "', min_stock = '" . (float)$data['min_stock'] . "', fba_min_stock = '" . (int)$data['fba_min_stock'] . "', front_quantity = '" . (int)$data['front_quantity'] . "', millet_product = '" . (int)$data['millet_product'] . "', minimum = '" . (int)$data['minimum'] . "', subtract = '" . (int)$data['subtract'] . "', stock_status_id = '" . (int)$data['stock_status_id'] . "', te_com_url = '" . $this->db->escape($data['te_com_url']) . "', date_available = '" . $this->db->escape($data['date_available']) . "', manufacturer_id = '" . (int)$data['manufacturer_id'] . "', shipping = '" . (int)$data['shipping'] . "', price = '" . (float)$data['price'] . "',offline_sp = '" . (float)$data['offline_sp'] . "',online_sp = '" . (float)$data['online_sp'] . "', mrp2 = '" . (float)$data['mrp2'] . "',cost = '" . (float)$data['cost'] . "', points = '" . (int)$data['points'] . "', casepacking_pid = '" . $this->db->escape($data['casepacking_pid']) . "', product_packingtype = '" . $this->db->escape($data['product_packingtype']) . "', gross_weight = '" . (float)$data['gross_weight'] . "', weight = '" . (float)$data['weight'] . "', weight_class_id = '" . (int)$data['weight_class_id'] . "', length = '" . (float)$data['length'] . "', width = '" . (float)$data['width'] . "', height = '" . (float)$data['height'] . "', length_class_id = '" . (int)$data['length_class_id'] . "', user = '" ."Last Edited By: ". $user . "',status = '" . (int)$data['status'] . "', case_quantity = '" . (int)$data['case_quantity'] . "', quick_category = '" . $this->db->escape($data['quick_category']) . "',front_status = '" . (int)$data['front_status'] . "', tax_class_id = '" . $this->db->escape($data['tax_class_id']) . "', sort_order = '" . (int)$data['sort_order'] . "', date_modified = NOW() WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['image'])) {
			$this->db->query("UPDATE " . DB_PREFIX . "product SET image = '" . $this->db->escape(html_entity_decode($data['image'], ENT_QUOTES, 'UTF-8')) . "' WHERE product_id = '" . (int)$product_id . "'");
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "'");

		foreach ($data['product_description'] as $language_id => $value) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "product_description SET product_id = '" . (int)$product_id . "', language_id = '" . (int)$language_id . "', name = '" . $this->db->escape($value['name']) . "', title = '" . $this->db->escape($value['title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', description = '" . $this->db->escape($value['description']) . "', ingredients = '" . $this->db->escape($value['ingredients']) . "', tag = '" . $this->db->escape($value['tag']) . "',product_type = '". (int)$data['product_type'] ."', source_of_origin = '" . $this->db->escape($value['source_of_origin']) . "'");
			
			$this->db->query("UPDATE " . DB_PREFIX . "sub_product SET rmpm_name = '" . $this->db->escape($value['name']) . "' WHERE rmpm_id = '" . (int)$product_id . "'");
		}
	
    	$existing_bom_arr = array();
    	$modified_bom_arr = array();
    	$existing_bom_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "sub_product WHERE product_id = '" . (int)$product_id . "'");
    	
		// NOTE : write the following query in delete function also
	    $this->db->query("DELETE FROM ". DB_PREFIX ."sub_product WHERE product_id = '". (int)$product_id ."' ");
			
	    if (isset($data['sub_product_list']) || $existing_bom_query->num_rows) {
	        $product_name = $value['name'];
	        $subject = "ERP: BOM Update - " . $product_name;
            
		    $html = "<html>\n<head>\n<style>table{border-collapse:collapse;margin:10px;text-align:center;} table thead tr{background:#000;color: #fff;} th, td{font-weight:bold;border:1px solid #000;padding: 5px;}</style>\n</head>\n<body>\n<div>\n<table>\n<tr>\n<th>Product Name:</th>\n<td>" . $product_name . "</td>\n</tr>\n<tr>\n<th>Product ID:</th>\n<td>" . $product_id . "</td>\n</tr>\n<tr>\n<th>User:</th>\n<td>" . $user . "</td>\n</tr>\n</table>\n</div>";
		   
		    $html .= "<div>\n<table style='width:100%;'>\n<thead>\n<tr><td colspan='100%' style='text-transform: uppercase;'>New BOM</td>\n</tr>\n<tr>\n<th>Sr no.</th>\n<th>Sub Product Id</th>\n<th>Sub Product Name</th>\n<th>Deduct Quantity</th>\n</tr>\n</thead>\n<tbody>"; 
    	    $sn_count = 1;
    	    foreach ($data['sub_product_list'] as $list) {
    	        if(array_key_exists($list['rmpm_id'], $modified_bom_arr)) {
            	    $modified_bom_arr[$list['rmpm_id']] += $list['quantity'];
                } else {
                    $modified_bom_arr[$list['rmpm_id']] = $list['quantity'];
                }
    	        
    		    $this->db->query("INSERT INTO " . DB_PREFIX . "sub_product SET product_id = '" . (int)$product_id . "', rmpm_id = '" . (int)$list['rmpm_id'] . "', rmpm_name = '". $this->db->escape($list['rmpm_name']) ."', quantity = '" . (float)$list['quantity'] . "'");
    		
    		    $html .= "<tr>\n<td>" . $sn_count . "</td>\n<td>" . $list['rmpm_id'] . "</td>\n<td>" . $list['rmpm_name'] . "</td>\n<td>" . $list['quantity'] . "</td>\n</tr>";
                $sn_count++;
    	    }
    	    $html .= "</tbody>\n</table>";
    	    $sn_count = 1;
    	    if($existing_bom_query->num_rows) {
    	        $html .= "<table style='width:100%;'>\n<thead>\n<tr><td colspan='100%' style='text-transform: uppercase;'>Old BOM</td>\n</tr>\n<tr>\n<th>Sr no.</th>\n<th>Sub Product Id</th>\n<th>Sub Product Name</th>\n<th>Deduct Quantity</th>\n</tr>\n</thead>\n<tbody>";
            	foreach($existing_bom_query->rows AS $existing_bom) {
            	    if(array_key_exists($existing_bom['rmpm_id'], $existing_bom_arr)) {
            	        $existing_bom_arr[$existing_bom['rmpm_id']] += $existing_bom['quantity'];
            	    } else {
            	        $existing_bom_arr[$existing_bom['rmpm_id']] = $existing_bom['quantity'];
            	    }
            	    $html .= "<tr>\n<td>" . $sn_count . "</td>\n<td>" . $existing_bom['rmpm_id'] . "</td>\n<td>" . $existing_bom['rmpm_name'] . "</td>\n<td>" . $existing_bom['quantity'] . "</td>\n</tr>";
                    $sn_count++;  
            	}
            	$html .= "</tbody>\n</table>";
            	$bom_comment = "BOM Modified";
        	} else {
        	    $html .= "<p>Old BOM was not exist.</p>";
        	    $bom_comment = "New BOM Insert";
        	}
        	$html .= "</div>\n</body>\n</html>";
        	ksort($existing_bom_arr);
        	ksort($modified_bom_arr);
        	
        	if(empty($modified_bom_arr)) {
        	    $bom_comment = "BOM Removed";
        	}
	        
	        if($existing_bom_arr != $modified_bom_arr) {
	            $this->db->query("INSERT INTO " . DB_PREFIX . "bom_log SET product_id = '" . (int)$product_id . "', comment = '" . $bom_comment . "', user = '" . $user . "', date_added = NOW()");
    	        $mail = new Mail();
    			$mail->protocol = $this->config->get('config_mail_protocol');
          	    $mail->parameter = $this->config->get('config_mail_parameter');
    	        $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
    	        $mail->smtp_username = $this->config->get('config_mail_smtp_username');
                $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
                $mail->smtp_port = $this->config->get('config_mail_smtp_port');
                $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');
                //$mail->setTo("shubham@true-elements.com");
                $mail->setTo($this->config->get('config_bom_modified_to'));
                $mail->setFrom($this->config->get('config_email'));
                $mail->setSender($this->config->get('config_name'));
           	    $mail->setSubject(html_entity_decode($subject, ENT_QUOTES, 'UTF-8'));
                $mail->setHtml($html);
                $mail->send();
	        }
	}
		
	//START COMBO
		$this->db->query("DELETE FROM " . DB_PREFIX . "mapped_combo WHERE combo_product_id = '" . (int)$product_id . "'");


		if (isset($data['product_combo'])) {
			foreach ($data['product_combo'] as $combo) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "mapped_combo SET combo_product_id = '" . (int)$product_id . "', product_id = '" . (int)$combo['product_id'] . "', deduct = '" . (int)$combo['deduct'] . "'");
			}		
		}
		//END COMBO
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "'");

		if (!empty($data['product_attribute'])) {
			foreach ($data['product_attribute'] as $product_attribute) {
				if ($product_attribute['attribute_id']) {
					$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' AND attribute_id = '" . (int)$product_attribute['attribute_id'] . "'");

					foreach ($product_attribute['product_attribute_description'] as $language_id => $product_attribute_description) {				
						$this->db->query("INSERT INTO " . DB_PREFIX . "product_attribute SET product_id = '" . (int)$product_id . "', attribute_id = '" . (int)$product_attribute['attribute_id'] . "', language_id = '" . (int)$language_id . "', text = '" .  $this->db->escape($product_attribute_description['text']) . "'");
					}
				}
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_option'])) {
			foreach ($data['product_option'] as $product_option) {
				if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_option_id = '" . (int)$product_option['product_option_id'] . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', required = '" . (int)$product_option['required'] . "'");

					$product_option_id = $this->db->getLastId();

					if (isset($product_option['product_option_value'])  && count($product_option['product_option_value']) > 0 ) {
						foreach ($product_option['product_option_value'] as $product_option_value) {
							$this->db->query("INSERT INTO " . DB_PREFIX . "product_option_value SET product_option_value_id = '" . (int)$product_option_value['product_option_value_id'] . "', product_option_id = '" . (int)$product_option_id . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value_id = '" . (int)$product_option_value['option_value_id'] . "', quantity = '" . (float)$product_option_value['quantity'] . "', subtract = '" . (int)$product_option_value['subtract'] . "', price = '" . (float)$product_option_value['price'] . "', price_prefix = '" . $this->db->escape($product_option_value['price_prefix']) . "', points = '" . (int)$product_option_value['points'] . "', points_prefix = '" . $this->db->escape($product_option_value['points_prefix']) . "', weight = '" . (float)$product_option_value['weight'] . "', weight_prefix = '" . $this->db->escape($product_option_value['weight_prefix']) . "'");
						}
					}else{
						$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_option_id = '".$product_option_id."'");
					}
				} else { 
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_option SET product_option_id = '" . (int)$product_option['product_option_id'] . "', product_id = '" . (int)$product_id . "', option_id = '" . (int)$product_option['option_id'] . "', option_value = '" . $this->db->escape($product_option['option_value']) . "', required = '" . (int)$product_option['required'] . "'");
				}					
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_discount'])) {
			foreach ($data['product_discount'] as $product_discount) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_discount SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$product_discount['customer_group_id'] . "', quantity = '" . (float)$product_discount['quantity'] . "', priority = '" . (int)$product_discount['priority'] . "', price = '" . (float)$product_discount['price'] . "', date_start = '" . $this->db->escape($product_discount['date_start']) . "', date_end = '" . $this->db->escape($product_discount['date_end']) . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_special'])) {
			foreach ($data['product_special'] as $product_special) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_special SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$product_special['customer_group_id'] . "', priority = '" . (int)$product_special['priority'] . "', price = '" . (float)$product_special['price'] . "', date_start = '" . $this->db->escape($product_special['date_start']) . "', date_end = '" . $this->db->escape($product_special['date_end']) . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_image'])) {
			foreach ($data['product_image'] as $product_image) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_image SET product_id = '" . (int)$product_id . "', image = '" . $this->db->escape(html_entity_decode($product_image['image'], ENT_QUOTES, 'UTF-8')) . "', sort_order = '" . (int)$product_image['sort_order'] . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_download WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_download'])) {
			foreach ($data['product_download'] as $download_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_download SET product_id = '" . (int)$product_id . "', download_id = '" . (int)$download_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_category'])) {
			foreach ($data['product_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id = '" . (int)$product_id . "', category_id = '" . (int)$category_id . "'");
			}		
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_zone WHERE product_id = '" . (int)$product_id . "'");
		if (isset($data['product_zone'])) {
			foreach ($data['product_zone'] as $zone_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_zone SET product_id = '" . (int)$product_id . "', zone_id = '" . (int)$zone_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_filter WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_filter'])) {
			foreach ($data['product_filter'] as $filter_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_filter SET product_id = '" . (int)$product_id . "', filter_id = '" . (int)$filter_id . "'");
			}		
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE related_id = '" . (int)$product_id . "'");

		if (isset($data['product_related'])) {
			foreach ($data['product_related'] as $related_id) {
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "' AND related_id = '" . (int)$related_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET product_id = '" . (int)$product_id . "', related_id = '" . (int)$related_id . "'");
				$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$related_id . "' AND related_id = '" . (int)$product_id . "'");
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_related SET product_id = '" . (int)$related_id . "', related_id = '" . (int)$product_id . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_reward'])) {
			foreach ($data['product_reward'] as $customer_group_id => $value) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_reward SET product_id = '" . (int)$product_id . "', customer_group_id = '" . (int)$customer_group_id . "', points = '" . (int)$value['points'] . "'");
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_layout'])) {
			foreach ($data['product_layout'] as $store_id => $layout) {
				if ($layout['layout_id']) {
					$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_layout SET product_id = '" . (int)$product_id . "', store_id = '" . (int)$store_id . "', layout_id = '" . (int)$layout['layout_id'] . "'");
				}
			}
		}

		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id. "'");

		if ($data['keyword']) {
			$this->db->query("INSERT INTO " . DB_PREFIX . "url_alias SET query = 'product_id=" . (int)$product_id . "', keyword = '" . $this->db->escape($data['keyword']) . "'");
		}

		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_profile` WHERE product_id = " . (int)$product_id);		if (isset($data['product_profiles'])) {			foreach ($data['product_profiles'] as $profile) {				$this->db->query("INSERT INTO `" . DB_PREFIX . "product_profile` SET `product_id` = " . (int)$product_id . ", customer_group_id = " . (int)$profile['customer_group_id'] . ", `profile_id` = " . (int)$profile['profile_id']);			}		}		$this->cache->delete('product');
	}
	
	public function updateProduct($product_id, $data) {
	    $user = $this->user->getUserName();
	    
		$this->db->query("UPDATE " . DB_PREFIX . "product SET cost = '" . (float)$data['cost'] . "', model = '" . $this->db->escape($data['model']) . "', sku = '" . $this->db->escape($data['sku']) . "', status = '" . (int)$data['status'] . "', front_status = '" . (int)$data['front_status'] . "', min_stock = '" . (float)$data['min_stock'] . "', fba_min_stock = '" . (int)$data['fba_min_stock'] . "', front_quantity = '" . (int)$data['front_quantity'] . "', millet_product = '" . (int)$data['millet_product'] . "', tax_class_id = '" . $this->db->escape($data['tax_class_id']) . "', sort_order = '" . (int)$data['sort_order'] . "', user = '" ."Last Updated By: ". $user . "', shelf_life = '" . (int)$data['shelf_life'] . "', case_quantity = '" . (int)$data['case_quantity'] . "', te_com_url = '" . $this->db->escape($data['te_com_url']) . "', gross_weight = '" . $this->db->escape($data['gross_weight']) . "', product_packingtype = '" . $this->db->escape($data['product_packingtype']) . "', casepacking_pid = '" . $this->db->escape($data['casepacking_pid']) . "', club_sku_id = '" . (int)$data['club_sku_id'] . "', quick_category = '" . $this->db->escape($data['quick_category']) . "', date_modified = NOW() WHERE product_id = '" . (int)$product_id . "'");
		
		
		foreach ($data['product_description'] as $language_id => $value) {
		   $this->db->query("UPDATE " . DB_PREFIX . "product_description SET short_description = '" . $this->db->escape($value['short_description']) . "',name = '" . $this->db->escape($value['name']) . "', title = '" . $this->db->escape($value['title']) . "', meta_keyword = '" . $this->db->escape($value['meta_keyword']) . "', meta_description = '" . $this->db->escape($value['meta_description']) . "', description = '" . $this->db->escape($value['description']) . "', short_description2 = '" . $this->db->escape($value['short_description2']) . "', ingredients = '" . $this->db->escape($value['ingredients']) . "', source_of_origin = '" . $this->db->escape($value['source_of_origin']) . "' WHERE product_id = '" . (int)$product_id . "' AND language_id = '" . (int)$language_id . "'");
		}
		
		$this->db->query("UPDATE " . DB_PREFIX . "product_to_channel SET amazon_asin = '" . $this->db->escape($data['amazon_asin']) . "', pantry_asin = '" . $this->db->escape($data['pantry_asin']) . "', flipkart_fsn = '" . $this->db->escape($data['flipkart_fsn']) . "', bb_sku = '" . $this->db->escape($data['bb_sku']) . "', snapdeal_sku = '" . $this->db->escape($data['snapdeal_sku']) . "', smytten_sku = '" . $this->db->escape($data['smytten_sku']) . "', paytm_sku = '" . $this->db->escape($data['paytm_sku']) . "', 1mg_sku = '" . $this->db->escape($data['one_mg_sku']) . "' WHERE product_id = '" . (int)$product_id . "'");
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "category_mapping WHERE product_id = '" . (int)$product_id . "'");
		
		if($data['pp_category_id'] > 0) {
		    $this->db->query("INSERT INTO " . DB_PREFIX . "category_mapping SET product_id = '" . (int)$product_id . "', pp_category_id = '" . (int)$data['pp_category_id'] . "'");
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");

		if (isset($data['product_category'])) {
			foreach ($data['product_category'] as $category_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_category SET product_id = '" . (int)$product_id . "', category_id = '" . (int)$category_id . "'");
			}		
		}
		
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_zone WHERE product_id = '" . (int)$product_id . "'");
		if (isset($data['product_zone'])) {
			foreach ($data['product_zone'] as $zone_id) {
				$this->db->query("INSERT INTO " . DB_PREFIX . "product_to_zone SET product_id = '" . (int)$product_id . "', zone_id = '" . (int)$zone_id . "'");
			}
		}
		$this->cache->delete('product');
	}

	public function copyProduct($product_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		if ($query->num_rows) {
			$data = array();

			$data = $query->row;

			$data['sku'] = '';
			$data['upc'] = '';
			$data['viewed'] = '0';
			$data['keyword'] = '';
			$data['status'] = '0';

			$data = array_merge($data, array('product_attribute' => $this->getProductAttributes($product_id)));
			$data = array_merge($data, array('product_description' => $this->getProductDescriptions($product_id)));			
			$data = array_merge($data, array('product_discount' => $this->getProductDiscounts($product_id)));
			$data = array_merge($data, array('product_filter' => $this->getProductFilters($product_id)));
			$data = array_merge($data, array('product_image' => $this->getProductImages($product_id)));		
			$data = array_merge($data, array('product_option' => $this->getProductOptions($product_id)));
			$data = array_merge($data, array('product_related' => $this->getProductRelated($product_id)));
			$data = array_merge($data, array('product_reward' => $this->getProductRewards($product_id)));
			$data = array_merge($data, array('product_special' => $this->getProductSpecials($product_id)));
			$data = array_merge($data, array('product_category' => $this->getProductCategories($product_id)));
			$data = array_merge($data, array('product_download' => $this->getProductDownloads($product_id)));
			$data = array_merge($data, array('product_layout' => $this->getProductLayouts($product_id)));
			$data = array_merge($data, array('product_store' => $this->getProductStores($product_id)));
			$data = array_merge($data, array('product_profiles' => $this->getProfiles($product_id)));
			$this->addProduct($data);
		}
	}

	public function deleteProduct($product_id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_filter WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_related WHERE related_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_download WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM " . DB_PREFIX . "product_to_store WHERE product_id = '" . (int)$product_id . "'");
		$this->db->query("DELETE FROM `" . DB_PREFIX . "product_profile` WHERE `product_id` = " . (int)$product_id);
		$this->db->query("DELETE FROM " . DB_PREFIX . "review WHERE product_id = '" . (int)$product_id . "'");

		$this->db->query("DELETE FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id. "'");

		$this->cache->delete('product');
	}

	public function getOrderProductDiscounts($product_id, $customer_group_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "' AND customer_group_id = '" . (int)$customer_group_id . "' AND ((date_start = '0000-00-00' OR date_start < NOW()) AND (date_end = '0000-00-00' OR date_end > NOW())) ORDER BY priority ASC LIMIT 1");
		return $query->rows;		
	}
	
	public function getCatalogProducts($data = array()) {
		$sql = "SELECT p.*, pd.*, pc.*";
		
		if (isset($data['customer_group_id']) && !empty($data['customer_group_id'])) {
			$sql .= ", (SELECT pd2.price FROM " . DB_PREFIX . "product_discount pd2 WHERE pd2.product_id = p.product_id AND pd2.customer_group_id = '" . (int)$data['customer_group_id'] . "' AND pd2.quantity = '1' AND ((pd2.date_start = '0000-00-00' OR pd2.date_start < NOW()) AND (pd2.date_end = '0000-00-00' OR pd2.date_end > NOW())) ORDER BY pd2.priority ASC, pd2.price ASC LIMIT 1) AS discount, (SELECT ps.price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$data['customer_group_id'] . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special";			
		}

		$sql .= " FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_channel pc ON (p.product_id = pc.product_id)";

		$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "'"; 

		if (isset($data['filter_name']) && !empty($data['filter_name'])) {
			$sql .= " AND CONCAT(LCASE(pd.name), ' ', p.cloudtail_item_code, ' ', pc.amazon_asin, ' ', pc.pantry_asin, ' ', pc.flipkart_fsn, ' ', pc.bb_sku, ' ', pc.snapdeal_sku, ' ', pc.smytten_sku, ' ', pc.paytm_sku, ' ', pc.1mg_sku) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_name'])) . "%'";
		}

		if (isset($data['filter_model']) && !empty($data['filter_model'])) {
			$sql .= " AND CONCAT(p.sku, ' ', p.upc, ' ',p.model, ' ',pc.amazon_asin, ' ', pc.pantry_asin, ' ', pc.flipkart_fsn, ' ', pc.bb_sku, ' ', pc.snapdeal_sku, ' ', pc.smytten_sku, ' ', pc.paytm_sku, ' ', pc.1mg_sku) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_model'])) . "%'";
		}

		if (isset($data['filter_sku']) && !empty($data['filter_sku'])) {
			$sql .= " AND LCASE(p.sku) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_sku'])) . "%'";
		}

		if (isset($data['filter_upc']) && !empty($data['filter_upc'])) {
			$sql .= " AND LCASE(p.upc) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_upc'])) . "%'";
		}
		
		if (isset($data['filter_ean']) && !empty($data['filter_ean'])) {
			$sql .= " AND LCASE(p.ean) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_ean'])) . "%'";
		}
		
		if (isset($data['filter_jan']) && !empty($data['filter_jan'])) {
			$sql .= " AND LCASE(p.jan) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_jan'])) . "%'";
		}
		
		if (isset($data['filter_isbn']) && !empty($data['filter_isbn'])) {
			$sql .= " AND LCASE(p.isbn) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_isbn'])) . "%'";
		}
		
		if (isset($data['filter_mpn']) && !empty($data['filter_mpn'])) {
			$sql .= " AND LCASE(p.mpn) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_mpn'])) . "%'";
		}
		
		if (isset($data['filter_location']) && !empty($data['filter_location'])) {
			$sql .= " AND LCASE(p.location) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_location'])) . "%'";
		}
		
		if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
			$sql .= " AND p.quantity = '" . $this->db->escape($data['filter_quantity']) . "'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
		}
		
		if (isset($data['filter_pid']) && !empty($data['filter_pid'])) {
			$sql .= " AND p.product_id = '" . (int)$data['filter_pid'] . "'";
		}

		$sql .= " GROUP BY p.product_id";

		$sort_data = array('pd.name','p.model','p.sku','p.upc','p.ean','p.jan','p.isbn','p.mpn','p.location','p.price','p.quantity','p.status','p.sort_order');

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];
		} else {
			$sql .= " ORDER BY pd.name";
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " ASC";
		} else {
			$sql .= " DESC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}

			if ($data['limit'] < 1) {
				$data['limit'] = 20;
			}

			$sql .= " LIMIT " . (int)$data['start'] . "," . (int)$data['limit'];
		}

		$query = $this->db->query($sql);

		return $query->rows;
	}
   
	public function getProduct($product_id, $customer_group_id = false) {
		if ($customer_group_id) {
			$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id . "') AS keyword, (SELECT price FROM " . DB_PREFIX . "product_special ps WHERE ps.product_id = p.product_id AND ps.customer_group_id = '" . (int)$customer_group_id . "' AND ((ps.date_start = '0000-00-00' OR ps.date_start < NOW()) AND (ps.date_end = '0000-00-00' OR ps.date_end > NOW())) ORDER BY ps.priority ASC, ps.price ASC LIMIT 1) AS special, (SELECT points FROM " . DB_PREFIX . "product_reward pr WHERE pr.product_id = p.product_id AND customer_group_id = '" . (int)$customer_group_id . "') AS reward FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		} else {
			$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id . "') AS keyword FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'");
		}
		$query = $this->db->query("SELECT DISTINCT *, (SELECT keyword FROM " . DB_PREFIX . "url_alias WHERE query = 'product_id=" . (int)$product_id . "') AS keyword FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) WHERE p.product_id = '" . (int)$product_id . "' AND pd.language_id = '" . (int)$this->config->get('config_language_id') . "'");

		return $query->row;
	}

	public function getProducts($data = array()) {
		$sql = "SELECT *, tc.title AS tax_rate FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "tax_class tc USING (tax_class_id) ";
		
		//$sql .= " LEFT JOIN " . DB_PREFIX . "product_to_channel pc ON (p.product_id = pc.product_id) ";

		if (!empty($data['filter_category_id'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";			
		}

		$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = 1"; 

        if (!empty($data['filter_product_id'])) {
		$sql .= " AND p.product_id = '" . (int)$data['filter_product_id'] . "'";
		}
		
		if (!empty($data['filter_product_type'])) {
		    $sql .= " AND pd.product_type = '" . (int)$data['filter_product_type'] . "'";
		}
		
		if (!empty($data['filter_name'])) {
			$sql .= " AND CONCAT(pd.name, ' ', p.product_id) LIKE  '". "%". $this->db->escape($data['filter_name']) . "%'";
		}
		 
		
		if (!empty($data['filter_model'])) {
			$sql .= "LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";			
		}

		//if (!empty($data['filter_model'])) {
			//$sql .= " AND CONCAT(p.sku, ' ', p.upc, ' ',p.model, ' ', p.model,pc.amazon_asin, ' ', pc.pantry_asin, ' ', pc.flipkart_fsn, ' ', pc.bb_sku, ' ', pc.snapdeal_sku, ' ', pc.smytten_sku, ' ', pc.paytm_sku, ' ', pc.1mg_sku) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_model'])) . "%'";
		//}
		
		/*if (!empty($data['filter_sku'])) {
		    
		    $sql .= " AND CONCAT(p.sku, ' ', p.upc, ' ',p.model, ' ', p.model, ' ', pc.amazon_asin, ' ', pc.pantry_asin, ' ', pc.flipkart_fsn, ' ', pc.bb_sku, ' ', pc.snapdeal_sku, ' ', pc.smytten_sku, ' ', pc.paytm_sku, ' ', pc.1mg_sku) LIKE '%" . $this->db->escape(utf8_strtolower($data['filter_sku'])) . "%'";
		}*/

		if (!empty($data['filter_upc'])) {
			$sql .= " AND p.upc LIKE '" . $this->db->escape($data['filter_upc']) . "%'";
		}

		if (!empty($data['filter_price'])) {
			$sql .= " AND p.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}

		if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
			$sql .= " AND p.quantity = '" . $this->db->escape($data['filter_quantity']) . "'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
		}

		if (isset($data['filter_type']) && !is_null($data['filter_type'])) {
			$sql .= " AND pd.product_type = '" . (int)$data['filter_type'] . "'";
		}

		$sql .= " GROUP BY p.product_id";

		$sort_data = array(
		    'p.product_id',
			'pd.name',
			'pd.product_type',
			'p.model',
			'sku',
			'p.upc',
			'p.price',
			'p.mrp',
			'p.quantity',
			'p.status',
			'p.sort_order'
		);	

		if (isset($data['sort']) && in_array($data['sort'], $sort_data)) {
			$sql .= " ORDER BY " . $data['sort'];	
		} else {
			$sql .= " ORDER BY pd.name";	
		}

		if (isset($data['order']) && ($data['order'] == 'DESC')) {
			$sql .= " ASC";
		} else {
			$sql .= " DESC";
		}

		if (isset($data['start']) || isset($data['limit'])) {
			if ($data['start'] < 0) {
				$data['start'] = 0;
			}				

			if ($data['limit'] < 1) {
				$data['limit'] = 15;
			}	

				$sql .= " LIMIT 0,5000";
		}	

		$query = $this->db->query($sql);

		return $query->rows;
	}
    
	public function getProductsByCategoryId($category_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id) LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id) WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p2c.category_id = '" . (int)$category_id . "' ORDER BY pd.name ASC");

		return $query->rows;
	} 

	public function getProductDescriptions($product_id) {
		$product_description_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_description_data[$result['language_id']] = array(
				'name'              => $result['name'],
				'title'             => $result['title'],
                'ingredients'       => $result['ingredients'],
				'description'       => $result['description'],
				'meta_keyword'      => $result['meta_keyword'],
				'meta_description'  => $result['meta_description'],
				'tag'               => $result['tag'],
				'product_type'      => $result['product_type'],
				'source_of_origin'  => $result['source_of_origin']
			);
		}

		return $product_description_data;
	}

	public function getProductCategories($product_id) {
		$product_category_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_category WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_category_data[] = $result['category_id'];
		}

		return $product_category_data;
	}
	
	public function getProductZones($product_id) {
		$product_zone_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_zone WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_zone_data[] = $result['zone_id'];
		}

		return $product_zone_data;
	}

	public function getProductFilters($product_id) {
		$product_filter_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_filter WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_filter_data[] = $result['filter_id'];
		}

		return $product_filter_data;
	}

	public function getProductAttributes($product_id) {
		$product_attribute_data = array();

		$product_attribute_query = $this->db->query("SELECT attribute_id FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' GROUP BY attribute_id");

		foreach ($product_attribute_query->rows as $product_attribute) {
			$product_attribute_description_data = array();

			$product_attribute_description_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_attribute WHERE product_id = '" . (int)$product_id . "' AND attribute_id = '" . (int)$product_attribute['attribute_id'] . "'");

			foreach ($product_attribute_description_query->rows as $product_attribute_description) {
				$product_attribute_description_data[$product_attribute_description['language_id']] = array('text' => $product_attribute_description['text']);
			}

			$product_attribute_data[] = array(
				'attribute_id'                  => $product_attribute['attribute_id'],
				'product_attribute_description' => $product_attribute_description_data
			);
		}

		return $product_attribute_data;
	}

	public function getProductOptions($product_id) {
		$product_option_data = array();

		$product_option_query = $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_option` po LEFT JOIN `" . DB_PREFIX . "option` o ON (po.option_id = o.option_id) LEFT JOIN `" . DB_PREFIX . "option_description` od ON (o.option_id = od.option_id) WHERE po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY o.sort_order");
		
		foreach ($product_option_query->rows as $product_option) {
			$product_option_value_data = array();	

			$product_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_id = '" . (int)$product_id . "' AND pov.product_option_id = '" . (int)$product_option['product_option_id'] . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "' ORDER BY ovd.name DESC");
			
			
			foreach ($product_option_value_query->rows as $product_option_value) {
			    
			    $batch_name = $product_option_value['name'];
				$year = substr($batch_name, 0, 2);
				$day_of_year = substr($batch_name, 4, 3) - 1;
				
				$manufacturing_date = date('d M Y', strtotime(date($year . '-m-d', strtotime($year . "-01-01 +" . $day_of_year . " DAYS"))));
				 
				$now = date("d M Y"); // or your date as well
				$date1=date_create($manufacturing_date);
                $date2=date_create($now);
                $diff = date_diff($date1,$date2);
                
                $days_diff = $diff->format("%R%a"); 
				
				
				$product_option_value_data[] = array(
					'product_option_value_id' => $product_option_value['product_option_value_id'],
					'option_value_id'         => $product_option_value['option_value_id'],
					'name'                    => $product_option_value['name'],
					'manufacturing_date'      => $manufacturing_date,
					'days_diff'               => $days_diff,
					'quantity'                => $product_option_value['quantity'],
					'subtract'                => $product_option_value['subtract'],
					'price'                   => $product_option_value['price'],
					'price_prefix'            => $product_option_value['price_prefix'],
					'points'                  => $product_option_value['points'],
					'points_prefix'           => $product_option_value['points_prefix'],						
					'weight'                  => $product_option_value['weight'],
					'weight_prefix'           => $product_option_value['weight_prefix']					
				);
			}

			$product_option_data[] = array(
				'product_option_id'    => $product_option['product_option_id'],
				'option_id'            => $product_option['option_id'],
				'name'                 => $product_option['name'],
				'type'                 => $product_option['type'],			
				'product_option_value' => $product_option_value_data,
				'option_value'         => $product_option['option_value'],
				'required'             => $product_option['required']				
			);
		}

		return $product_option_data;
	}
	
	public function getProductOptionsFiltered($product_id, $data = array()) {
		$product_option_data = array();
		
		if($data['filter_option_id'] > 0) {
		    $filter_option_id = " AND o.option_id = " . (int)$data['filter_option_id'];
		} else {
		    $filter_option_id = "";
		}
		
		if($data['filter_quantity']) {
		    $filter_quantity = " AND pov.quantity > '0'";
		} else {
		    $filter_quantity = "";
		}

		$product_option_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option po LEFT JOIN " . DB_PREFIX . "option o ON (po.option_id = o.option_id) LEFT JOIN " . DB_PREFIX . "option_description od ON (o.option_id = od.option_id) WHERE po.product_id = '" . (int)$product_id . "' AND od.language_id = '" . (int)$this->config->get('config_language_id') . "'" . $filter_option_id . " ORDER BY o.sort_order");
		
		foreach ($product_option_query->rows as $product_option) {
			$product_option_value_data = array();	

			$product_option_value_query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_option_value pov LEFT JOIN " . DB_PREFIX . "option_value ov ON (pov.option_value_id = ov.option_value_id) LEFT JOIN " . DB_PREFIX . "option_value_description ovd ON (ov.option_value_id = ovd.option_value_id) WHERE pov.product_id = '" . (int)$product_id . "' AND pov.product_option_id = '" . (int)$product_option['product_option_id'] . "' AND ovd.language_id = '" . (int)$this->config->get('config_language_id') . "'" . $filter_quantity . " ORDER BY ovd.name DESC");
			
			
			foreach ($product_option_value_query->rows as $product_option_value) {
				$product_option_value_data[] = array(
					'product_option_value_id' => $product_option_value['product_option_value_id'],
					'option_value_id'         => $product_option_value['option_value_id'],
					'name'                    => $product_option_value['name'],
					'quantity'                => $product_option_value['quantity'],
					'subtract'                => $product_option_value['subtract'],
					'price'                   => $product_option_value['price'],
					'price_prefix'            => $product_option_value['price_prefix'],
					'points'                  => $product_option_value['points'],
					'points_prefix'           => $product_option_value['points_prefix'],						
					'weight'                  => $product_option_value['weight'],
					'weight_prefix'           => $product_option_value['weight_prefix']					
				);
			}

			$product_option_data[] = array(
				'product_option_id'    => $product_option['product_option_id'],
				'option_id'            => $product_option['option_id'],
				'name'                 => $product_option['name'],
				'type'                 => $product_option['type'],
				'product_option_value' => $product_option_value_data,
				'required'             => $product_option['required']
			);
		}

		return $product_option_data;
	}

	public function getProductImages($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_image WHERE product_id = '" . (int)$product_id . "'");

		return $query->rows;
	}

	public function getProductDiscounts($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_discount WHERE product_id = '" . (int)$product_id . "' ORDER BY quantity, priority, price");

		return $query->rows;
	}

	public function getProductSpecials($product_id) {
		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_special WHERE product_id = '" . (int)$product_id . "' ORDER BY priority, price");

		return $query->rows;
	}

	public function getProductRewards($product_id) {
		$product_reward_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_reward WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_reward_data[$result['customer_group_id']] = array('points' => $result['points']);
		}

		return $product_reward_data;
	}

	public function getProductDownloads($product_id) {
		$product_download_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_download WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_download_data[] = $result['download_id'];
		}

		return $product_download_data;
	}

	public function getProductStores($product_id) {
		$product_store_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_store WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_store_data[] = $result['store_id'];
		}

		return $product_store_data;
	}

	public function getProductLayouts($product_id) {
		$product_layout_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_layout WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_layout_data[$result['store_id']] = $result['layout_id'];
		}

		return $product_layout_data;
	}

	public function getProductRelated($product_id) {
		$product_related_data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_related WHERE product_id = '" . (int)$product_id . "'");

		foreach ($query->rows as $result) {
			$product_related_data[] = $result['related_id'];
		}

		return $product_related_data;
	}
	//combo
	public function getProductCombos($product_id){
		$query = $this->db->query("SELECT * FROM ". DB_PREFIX ."mapped_combo WHERE combo_product_id = '". (int)$product_id ."'");
		
		return $query->rows;
	}
	// Get related list for FG
	public function getSubProductList($product_id) {
		$query = $this->db->query("SELECT * FROM ". DB_PREFIX ."sub_product WHERE product_id = '". (int)$product_id ."' ");
		
		return $query->rows;
	}
	
	public function getProductName($product_id){
		$query = $this->db->query("SELECT name FROM ". DB_PREFIX ."product_description WHERE product_id = '". (int)$product_id ."'");
		return $query->row['name'];
	}

	public function getProfiles($product_id) {
		return $this->db->query("SELECT * FROM `" . DB_PREFIX . "product_profile` WHERE product_id = " . (int)$product_id)->rows;
	}

	public function getTotalProducts($data = array()) {
		$sql = "SELECT COUNT(DISTINCT p.product_id) AS total FROM " . DB_PREFIX . "product p LEFT JOIN " . DB_PREFIX . "product_description pd ON (p.product_id = pd.product_id)";

		if (!empty($data['filter_category_id'])) {
			$sql .= " LEFT JOIN " . DB_PREFIX . "product_to_category p2c ON (p.product_id = p2c.product_id)";			
		}

		$sql .= " WHERE pd.language_id = '" . (int)$this->config->get('config_language_id') . "' AND p.status = 1";
       
       
        if (!empty($data['filter_product_id'])) {
		$sql .= " AND p.product_id = '" . (int)$data['filter_product_id'] . "'";
		}
		
		if (!empty($data['filter_name'])) {
			$sql .= " AND CONCAT(pd.name, ' ', p.product_id) LIKE '" . $this->db->escape($data['filter_name']) . "%'";
		}

		if (!empty($data['filter_model'])) {
			$sql .= " AND p.model LIKE '" . $this->db->escape($data['filter_model']) . "%'";
		}

		if (!empty($data['filter_price'])) {
			$sql .= " AND p.price LIKE '" . $this->db->escape($data['filter_price']) . "%'";
		}

		if (isset($data['filter_quantity']) && !is_null($data['filter_quantity'])) {
			$sql .= " AND p.quantity = '" . $this->db->escape($data['filter_quantity']) . "'";
		}

		if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
			$sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
		}
		
		if (isset($data['filter_type']) && !is_null($data['filter_type'])) {
			$sql .= " AND pd.product_type = '" . (int)$data['filter_type'] . "'";
		}

		$query = $this->db->query($sql);

		return $query->row['total'];
	}
	
	public function getProductMapping($product_id) {
	    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "product_to_channel WHERE product_id = '" . (int)$product_id . "' LIMIT 1");
	    return $query->row;
	}
	
	public function getProductTypes(){
		$query = $this->db->query("SELECT * FROM ". DB_PREFIX ."product_type");
		
		return $query->rows;
	}
	
	public function getProductASIN($product_id) {
	return $this->db->query("SELECT asin_code FROM `" . DB_PREFIX . "asin` WHERE product_id = " . (int)$product_id)->row;
	}
	
	public function getTypeName($type_id){
		if($type_id != 0){
		$query = $this->db->query("SELECT name FROM ". DB_PREFIX ."product_type WHERE type_id = '". (int)$type_id ."' ");
		
		return $query->row['name'];
		}
		
	}

	public function getTotalProductsByTaxClassId($tax_class_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product WHERE tax_class_id = '" . (int)$tax_class_id . "'");

		return $query->row['total'];
	}

	public function getTotalProductsByStockStatusId($stock_status_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product WHERE stock_status_id = '" . (int)$stock_status_id . "'");

		return $query->row['total'];
	}

	public function getTotalProductsByWeightClassId($weight_class_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product WHERE weight_class_id = '" . (int)$weight_class_id . "'");

		return $query->row['total'];
	}

	public function getTotalProductsByLengthClassId($length_class_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product WHERE length_class_id = '" . (int)$length_class_id . "'");

		return $query->row['total'];
	}

	public function getTotalProductsByDownloadId($download_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product_to_download WHERE download_id = '" . (int)$download_id . "'");

		return $query->row['total'];
	}
	
	public function getTotalProductsByManufacturerId($manufacturer_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product WHERE manufacturer_id = '" . (int)$manufacturer_id . "'");

		return $query->row['total'];
	}

	public function getTotalProductsByAttributeId($attribute_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product_attribute WHERE attribute_id = '" . (int)$attribute_id . "'");

		return $query->row['total'];
	}	

	public function getTotalProductsByOptionId($option_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product_option WHERE option_id = '" . (int)$option_id . "'");

		return $query->row['total'];
	}	

	public function getTotalProductsByLayoutId($layout_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "product_to_layout WHERE layout_id = '" . (int)$layout_id . "'");

		return $query->row['total'];
	}
	
	public function getNutritionalInfo($product_id) {
	    $query = $this->db->query("SELECT * FROM " . DB_PREFIX . "nutritional_info WHERE product_id = '" . (int)$product_id . "' LIMIT 1");

		return $query->row;
	}
	
	public function getIngredients($product_id) {
	    $query = $this->db->query("SELECT ingredients FROM " . DB_PREFIX . "product_description WHERE product_id = '" . (int)$product_id . "' LIMIT 1");

		return $query->row['ingredients'];
	}
	
	public function getProductionCaseQuantity($product_id) {
	    $query = $this->db->query("SELECT production_case_quantity FROM " . DB_PREFIX . "product WHERE product_id = '" . (int)$product_id . "' LIMIT 1");

		return $query->row['production_case_quantity'];
	}
	
	public function getTotalProductQuantityByOptionId($product_id, $option_id) {
        return $this->db->query("SELECT IFNULL(SUM(quantity), 0) AS total FROM " . DB_PREFIX . "product_option_value WHERE product_id = '" . (int)$product_id . "' AND option_id = '" . (int)$option_id . "'")->row['total'];
    }
    
    public function getQuickCategory($quick_category_id) {
        return $this->db->query("SELECT quick_category_id, name, image, status FROM " . DB_PREFIX . "quick_category WHERE quick_category_id = '" . (int)$quick_category_id . "' LIMIT 1")->row;
    }
    
    public function getQuickCategories() {
        return $this->db->query("SELECT quick_category_id, name, image, status FROM " . DB_PREFIX . "quick_category")->rows;
    }
    public function addSellerappProductCategory($data) {
        $this->db->query("INSERT INTO " . DB_PREFIX . "quick_category SET name = '" . $this->db->escape($data['name']) . "', image = '" . $this->db->escape($data['image']) . "', status = '" . (int)$data['status'] . "'");
    }
    
    public function editSellerappProductCategory($quick_category_id, $data) {
        $this->db->query("UPDATE " . DB_PREFIX . "quick_category SET name = '" . $this->db->escape($data['name']) . "', image = '" . $this->db->escape($data['image']) . "', status = '" . (int)$data['status'] . "' WHERE quick_category_id = '" . (int)$quick_category_id . "'");
    }
}
?>