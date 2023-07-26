PM Sticker Label Super Muesli 400gm
<!-- Frontend 3461 -->

 <tr>
    <td><?php echo $entry_status; ?></td>
    <td>
        <select name="status">
            <?php if ($status == 1) { ?>
                <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <option value="3"><?php echo $text_draft; ?></option>
                <option value="4"><?php echo $text_process; ?></option>
            <?php } elseif ($status == 0) { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                <option value="3"><?php echo $text_draft; ?></option>
                <option value="4"><?php echo $text_process; ?></option>
            <?php } elseif ($status == 3) { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <option value="3" selected="selected"><?php echo $text_draft; ?></option>
                <option value="4"><?php echo $text_process; ?></option>
            <?php } elseif ($status == 4) { ?>
                <option value="1"><?php echo $text_enabled; ?></option>
                <option value="0"><?php echo $text_disabled; ?></option>
                <option value="3"><?php echo $text_draft; ?></option>
                <option value="4" selected="selected"><?php echo $text_process; ?></option>
            <?php } ?>
        </select>
    </td>
</tr>

<!-- controller 3989  636 808 1857 2743 3468-->
            if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($product_info)) {
			$this->data['status'] = $product_info['status'];
		} else {
			$this->data['status'] = 1;
		}
<!-- Update controller -->
if (isset($this->request->post['status'])) {
    $this->data['status'] = $this->request->post['status'];
} elseif (!empty($product_info)) {
    $this->data['status'] = $product_info['status'];
} else {
    $this->data['status'] = 1;
}

// Check if the 'status' value is one of the allowed values (1, 0, 3, 4)
$statuses = array(1, 0, 3, 4);
if (!in_array($this->data['status'], $statuses)) {
    $this->data['status'] = 1; // Set a default value (1) if the 'status' is not valid
}

<!-- Model -->
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
        <!-- Update model -->
        if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
    $statuses = array(1, 0, 3, 4);
    if (in_array($data['filter_status'], $statuses)) {
        $sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
    }
} else {
    $sql .= " AND p.status IN (1, 0, 3, 4)";
}
<!-- Update model -->

        <!-- Previous -->
        if (isset($data['filter_status']) && !is_null($data['filter_status'])) {
         $statuses = array(1, 0, 3, 4);
            if (in_array($data['filter_status'], $statuses)) {
                $sql .= " AND p.status = '" . (int)$data['filter_status'] . "'";
            }
            } else {
             $sql .= " AND p.status IN (1, 0, 3, 4)";
            }
        }
<!-- Previous -->

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