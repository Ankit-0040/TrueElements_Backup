<?php 
class ControllerCatalogProduct extends Controller {
	private $error = array(); 

	public function index() {
		$this->language->load('catalog/product');

		$this->document->setTitle($this->language->get('heading_title')); 

		$this->load->model('catalog/product');

		$this->getList();
	}
	
	public function updateproduct() {
		$this->language->load('catalog/product');

		$this->document->setTitle($this->language->get('Update Product'));

		$this->load->model('catalog/product');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateUpdateForm()) {
			$this->model_catalog_product->updateProduct($this->request->get['product_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getUpdateForm();
	}

	public function insert() {
		$this->language->load('catalog/product');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/product');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_product->addProduct($this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';
            
            if (isset($this->request->get['filter_product_id'])) {
				$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
			}

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_sku'])) {
				$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}

			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
			
			if (isset($this->request->get['filter_type'])) {
			    $url .= '&filter_type=' . $this->request->get['filter_type'];
		    }

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}

	public function update() {
		$this->language->load('catalog/product');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/product');

		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validateForm()) {
			$this->model_catalog_product->editProduct($this->request->get['product_id'], $this->request->post);

			$this->openbay->productUpdateListen($this->request->get['product_id'], $this->request->post);

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_product_id'])) {
				$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
			}

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_sku'])) {
				$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}

			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}	

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}
			
			if (isset($this->request->get['filter_type'])) {
			    $url .= '&filter_type=' . $this->request->get['filter_type'];
		    }

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getForm();
	}
	
	public function view() {
		$this->language->load('catalog/product');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/product');
	

		$this->getViewForm();
	}
	
	/*public function delete() {
		$this->language->load('catalog/product');

		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/product');

		if (isset($this->request->post['selected']) && $this->validateDelete()) {
			foreach ($this->request->post['selected'] as $product_id) {
				$this->model_catalog_product->deleteProduct($product_id);
				$this->openbay->deleteProduct($product_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_product_id'])) {
				$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
			}

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_sku'])) {
				$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}

			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}	

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}*/

	/*public function copy() {
		$this->language->load('catalog/product');
		
			$this->data['entry_title'] = $this->language->get('entry_title');


		$this->document->setTitle($this->language->get('heading_title'));

		$this->load->model('catalog/product');

		if (isset($this->request->post['selected']) && $this->validateCopy()) {
			foreach ($this->request->post['selected'] as $product_id) {
				$this->model_catalog_product->copyProduct($product_id);
			}

			$this->session->data['success'] = $this->language->get('text_success');

			$url = '';

			if (isset($this->request->get['filter_product_id'])) {
				$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
			}

			if (isset($this->request->get['filter_name'])) {
				$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_model'])) {
				$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_sku'])) {
				$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
			}

			if (isset($this->request->get['filter_price'])) {
				$url .= '&filter_price=' . $this->request->get['filter_price'];
			}

			if (isset($this->request->get['filter_quantity'])) {
				$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
			}	

			if (isset($this->request->get['filter_status'])) {
				$url .= '&filter_status=' . $this->request->get['filter_status'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			$this->redirect($this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'));
		}

		$this->getList();
	}*/
    
     //SOF STOCK HISTORY
    public function download_history() {

		$this->load->model('catalog/product');
				
				$product_stock= array();

				$data = array();

				$product_id = $this->request->get['product_id'];

				$results = $this->model_catalog_product->getProductChartHistory($data, $product_id);

				foreach ($results as $result) {
					$product_stock[] = array(
						'product_stock_history_id'     => $result['product_stock_history_id'],
						'product_id'    => $product_id,
						'user'			=> $result['user'],
						'comment'		=> $result['comment'],
						'order_id'		=> $result['order_id'],
						'po_id'			=> $result['po_id'],
						'inward_id'		=> $result['inward_id'],
						'restock_quantity'      => $result['restock_quantity'],
						'stock_quantity'=> $result['stock_quantity'],
						'date_added'    => date("Y-m-d H:i:s", strtotime($result['date_added']))
					);
				}	
						
						$product_stock_data = array();
						
						$product_stock_column=array();
						
						$product_stock_column = array('Product Stock History ID', 'Product ID', 'User', 'Comments', 'Order ID', 'PO ID', 'Restock Quantity','Stock Quantity', 'Updated Time');
							
						$product_stock_data[0]=   $product_stock_column;   
						
						foreach($product_stock as $product_stock_row)
						{
							$product_stock_data[]=   $product_stock_row;            
						}
						require_once(DIR_SYSTEM . 'library/PHPExcel.php');
						$filename='product_stock_history_list_'.$product_id.'_'.date('Y-m-d _ H:i:s');
						$filename = preg_replace('/[^aA-zZ0-9\_\-]/', '', $filename);
						// Create new PHPExcel object

						$objPHPExcel = new PHPExcel();

						
						$objPHPExcel->getActiveSheet()->fromArray($product_stock_data, null, 'A1');
						// Set active sheet index to the first sheet, so Excel opens this as the first sheet
						$objPHPExcel->setActiveSheetIndex(0);

						// Save Excel 95 file

						$callStartTime = microtime(true);
						$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
						
						//Setting the header type
						header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
						header("Content-Disposition: attachment; filename=\"" . $filename . ".csv\"");
						
						header('Cache-Control: max-age=0');

						$objWriter->save('php://output');
	}
	//EOF STOCK HISTORY
	protected function getList() {
		
		if (isset($this->request->get['filter_product_id'])) {
			$filter_product_id = $this->request->get['filter_product_id'];
		} else {
			$filter_product_id = null;
		}

		if (isset($this->request->get['filter_name'])) {
			$filter_name = $this->request->get['filter_name'];
		} else {
			$filter_name = null;
		}

		if (isset($this->request->get['filter_model'])) {
			$filter_model = $this->request->get['filter_model'];
		} else {
			$filter_model = null;
		}
		
		
		if (isset($this->request->get['filter_sku'])) {
			$filter_sku = $this->request->get['filter_sku'];
		} else {
			$filter_sku = null;
		}
		
		if (isset($this->request->get['filter_upc'])) {
			$filter_upc = $this->request->get['filter_upc'];
		} else {
			$filter_upc = null;
		}
		
		if (isset($this->request->get['filter_price'])) {
			$filter_price = $this->request->get['filter_price'];
		} else {
			$filter_price = null;
		}

		if (isset($this->request->get['filter_quantity'])) {
			$filter_quantity = $this->request->get['filter_quantity'];
		} else {
			$filter_quantity = null;
		}

		/*if (isset($this->request->get['filter_status'])) {
			$filter_status = $this->request->get['filter_status'];
		} else {
			$filter_status = null;
		}*/
		
		if (isset($this->request->get['filter_type'])) {
			$filter_type = $this->request->get['filter_type'];
			$this->data['filter_type_name'] = $this->model_catalog_product->getTypeName($this->request->get['filter_type']);
		} else {
			$filter_type = null;
		}

		if (isset($this->request->get['sort'])) {
			$sort = $this->request->get['sort'];
		} else {
			$sort = 'pd.name';
		}

		if (isset($this->request->get['order'])) {
			$order = $this->request->get['order'];
		} else {
			$order = 'ASC';
		}

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$url = '';

		if (isset($this->request->get['filter_product_id'])) {
			$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_sku'])) {
			$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
		}		
		
		if (isset($this->request->get['filter_upc'])) {
			$url .= '&filter_upc=' . urlencode(html_entity_decode($this->request->get['filter_upc'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}		

		/*if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}*/
		
		if (isset($this->request->get['filter_type'])) {
			$url .= '&filter_type=' . $this->request->get['filter_type'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'),       		
			'separator' => ' :: '
		);

		$this->data['insert'] = $this->url->link('catalog/product/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		$this->data['comboinsert'] = $this->url->link('catalog/product/comboinsert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		//$this->data['copy'] = $this->url->link('catalog/product/copy', 'token=' . $this->session->data['token'] . $url, 'SSL');
		/*$this->data['delete'] = $this->url->link('catalog/product/delete', 'token=' . $this->session->data['token'] . $url, 'SSL');*/

		$this->data['products'] = array();

		$data = array(
			'filter_product_id'	  => $filter_product_id,
			'filter_name'	  => $filter_name, 
			'filter_model'	  => $filter_model,
			'filter_upc'	  => $filter_upc,
			'filter_sku'	  => $filter_sku,
			'filter_price'	  => $filter_price,
			'filter_quantity' => $filter_quantity,
			//'filter_status'   => $filter_status,
			'filter_type'     => $filter_type,
			'sort'            => $sort,
			'order'           => $order,
			'start'           => ($page - 1) * $this->config->get('config_admin_limit'),
			'limit'           => $this->config->get('config_admin_limit')
		);
        
        $this->data['product_types'] = $this->model_catalog_product->getProductTypes();
        $this->data['username'] = $this->user->getUsername();
         

		$this->load->model('tool/image');

		$product_total = $this->model_catalog_product->getTotalProducts($data);

		$results = $this->model_catalog_product->getProducts($data);
        $allowed_user_groups = array('Top Administrator', 'Administrator');
		foreach ($results as $result) {
			$action = array(); 
         if (in_array($this->user->getUserGroup(), $allowed_user_groups)) {
             
			$action[] = array(
				'text' => $this->language->get('text_edit'),
				'href' => $this->url->link('catalog/product/update', 'token=' . $this->session->data['token'] . '&product_id=' . $result['product_id'] . $url, 'SSL')
			);
         } 
     if ($this->user->hasPermission('modify', 'total/total')) {
            $action[] = array(
				'text' => $this->language->get('update'),
				'href' => $this->url->link('catalog/product/updateproduct', 'token=' . $this->session->data['token'] . '&product_id=' . $result['product_id'] . $url, 'SSL')
			);
         } 
    		$action[] = array(
              'text' => $this->language->get('View'),
              'href' => $this->url->link('catalog/product/view', 'token=' . $this->session->data['token'] . '&product_id=' . $result['product_id'] . $url, 'SSL')
            );

			if ($result['image'] && file_exists(DIR_IMAGE . $result['image'])) {
				$image = $this->model_tool_image->resize($result['image'], 40, 40);
			} else {
				$image = $this->model_tool_image->resize('no_image.jpg', 40, 40);
			}

			$special = false;

			$product_specials = $this->model_catalog_product->getProductSpecials($result['product_id']);

			foreach ($product_specials  as $product_special) {
				if (($product_special['date_start'] == '0000-00-00' || $product_special['date_start'] < date('Y-m-d')) && ($product_special['date_end'] == '0000-00-00' || $product_special['date_end'] > date('Y-m-d'))) {
					$special = $product_special['price'];

					break;
				}					
			} 
			
			 $product_asinlist = $this->model_catalog_product->getProductASIN($result['product_id']);
			
			$product_mapping_info = $this->model_catalog_product->getProductMapping($result['product_id']); 
				
			$this->data['products'][] = array(
				'product_id'   => $result['product_id'],
				'name'         => $result['name'],
				'amazon_asin'  => $product_mapping_info['amazon_asin'],
				'pantry_asin'  => $product_mapping_info['pantry_asin'],
				'flipkart_fsn' => $product_mapping_info['flipkart_fsn'],
				'bb_sku'       => $product_mapping_info['bb_sku'],
				'snapdeal_sku' => $product_mapping_info['snapdeal_sku'],
				'smytten_sku'  => $product_mapping_info['smytten_sku'],
				'paytm_sku'    => $product_mapping_info['paytm_sku'],
				'1mg_sku'      => $product_mapping_info['1mg_sku'],
				'upc'          => $result['upc'],
				'model'        => $result['model'],
				'location'        => $result['location'],
				'asin'         => $product_asinlist['asin_code'],
				'sku'          => $result['sku'],
				'price'        => $result['price'],
				'offline_sp'   => $result['offline_sp'],
				'online_sp'    => $result['online_sp'], 
				'mrp2'         => round($result['mrp2']),
				'special'      => $special,
				'image'        => $image,
				'quantity'     => $result['quantity'],
				'mrp'          => $mrp,
				'tax_class_id' => $result['tax_rate'],
				'quick_category'=> $result['quick_category'],
				'status'        => ($result['status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'front_status'  => ($result['front_status'] ? $this->language->get('text_enabled') : $this->language->get('text_disabled')),
				'selected'      => isset($this->request->post['selected']) && in_array($result['product_id'], $this->request->post['selected']),
				'product_type'  => $this->model_catalog_product->getTypeName($result['product_type']),
				'action'       => $action
			);
		}

		$this->data['heading_title'] = $this->language->get('heading_title');		

		$this->data['text_enabled'] = $this->language->get('text_enabled');		
		$this->data['text_disabled'] = $this->language->get('text_disabled');		
		$this->data['text_no_results'] = $this->language->get('text_no_results');		
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');		

		$this->data['column_image'] = $this->language->get('column_image');		
		$this->data['column_name'] = $this->language->get('column_name');		
		$this->data['column_model'] = $this->language->get('column_model');		
		$this->data['column_price'] = $this->language->get('column_price');		
		$this->data['column_quantity'] = $this->language->get('column_quantity');		
		$this->data['column_status'] = $this->language->get('column_status');
		$this->data['column_type'] = $this->language->get('column_type');
		
		$this->data['column_action'] = $this->language->get('column_action');		

		//$this->data['button_copy'] = $this->language->get('button_copy');
		$this->data['button_insert'] = $this->language->get('button_insert');		
		$this->data['button_delete'] = $this->language->get('button_delete');		
		$this->data['button_filter'] = $this->language->get('button_filter');

		$this->data['token'] = $this->session->data['token'];

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->session->data['success'])) {
			$this->data['success'] = $this->session->data['success'];

			unset($this->session->data['success']);
		} else {
			$this->data['success'] = '';
		}

		$url = '';

		if (isset($this->request->get['filter_product_id'])) {
			$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_sku'])) {
			$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
		}


		if (isset($this->request->get['filter_upc'])) {
			$url .= '&filter_upc=' . urlencode(html_entity_decode($this->request->get['filter_upc'], ENT_QUOTES, 'UTF-8'));
		}


		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		/*if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}*/

        if (isset($this->request->get['filter_type'])) {
			$url .= '&filter_type=' . $this->request->get['filter_type'];
		}

		if ($order == 'ASC') {
			$url .= '&order=DESC';
		} else {
			$url .= '&order=ASC';
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['sort_name'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . '&sort=pd.name' . $url, 'SSL');
		$this->data['sort_model'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . '&sort=p.model' . $url, 'SSL');
		$this->data['sort_price'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . '&sort=p.price' . $url, 'SSL');
		$this->data['sort_quantity'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . '&sort=p.quantity' . $url, 'SSL');
		$this->data['sort_status'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . '&sort=p.status' . $url, 'SSL');
		$this->data['sort_order'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . '&sort=p.sort_order' . $url, 'SSL');

		$url = '';

		if (isset($this->request->get['filter_product_id'])) {
			$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_sku'])) {
			$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
		}
			
		if (isset($this->request->get['filter_upc'])) {
			$url .= '&filter_upc=' . urlencode(html_entity_decode($this->request->get['filter_upc'], ENT_QUOTES, 'UTF-8'));
		}
		
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}

		/*if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}*/
		
		if (isset($this->request->get['filter_type'])) {
			$url .= '&filter_type=' . $this->request->get['filter_type'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		$pagination = new Pagination();
		$pagination->total = $product_total;
		$pagination->page = $page;
		$pagination->limit = $this->config->get('config_admin_limit');
		$pagination->text = $this->language->get('text_pagination');
		$pagination->url = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url . '&page={page}', 'SSL');

		$this->data['pagination'] = $pagination->render();

		$this->data['filter_product_id'] = $filter_product_id;
		$this->data['filter_name'] = $filter_name;
		$this->data['filter_model'] = $filter_model;
		$this->data['filter_sku'] = $filter_sku;
		$this->data['filter_upc'] = $filter_upc;
		$this->data['filter_price'] = $filter_price;
		$this->data['filter_quantity'] = $filter_quantity;
		$this->data['filter_status'] = $filter_status;
		$this->data['filter_type'] = $filter_type;

		$this->data['sort'] = $sort;
		$this->data['order'] = $order;

		$this->template = 'catalog/product_list.tpl';
		$this->children = array(
		  	    'common/header',
		  	    'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function getForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_plus'] = $this->language->get('text_plus');
		$this->data['text_minus'] = $this->language->get('text_minus');
		$this->data['text_default'] = $this->language->get('text_default');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		$this->data['text_option'] = $this->language->get('text_option');
		$this->data['text_option_value'] = $this->language->get('text_option_value');
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_percent'] = $this->language->get('text_percent');
		$this->data['text_amount'] = $this->language->get('text_amount');
        
        $this->data['text_min_stock'] = $this->language->get('text_min_stock');
        $this->data['text_fba_min_stock'] = $this->language->get('text_fba_min_stock');
        
		$this->data['entry_name'] = $this->language->get('entry_name');
				// Product Title
		$this->data['entry_title'] = $this->language->get('entry_title');
		// Product Title
		$this->data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$this->data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_store'] = $this->language->get('entry_store');
		$this->data['entry_keyword'] = $this->language->get('entry_keyword');
		$this->data['entry_model'] = $this->language->get('entry_model');
		$this->data['entry_sku'] = $this->language->get('entry_sku');
		$this->data['entry_upc'] = $this->language->get('entry_upc');
		$this->data['entry_ean'] = $this->language->get('entry_ean');
		$this->data['entry_jan'] = $this->language->get('entry_jan');
		$this->data['entry_isbn'] = $this->language->get('entry_isbn');
		$this->data['entry_mpn'] = $this->language->get('entry_mpn');
		$this->data['entry_location'] = $this->language->get('entry_location');
		$this->data['entry_minimum'] = $this->language->get('entry_minimum');
		$this->data['entry_manufacturer'] = $this->language->get('entry_manufacturer');
		$this->data['entry_shipping'] = $this->language->get('entry_shipping');
		$this->data['entry_date_available'] = $this->language->get('entry_date_available');
		$this->data['entry_quantity'] = $this->language->get('entry_quantity');
		$this->data['entry_stock_status'] = $this->language->get('entry_stock_status');
		$this->data['entry_price'] = $this->language->get('entry_price');
		$this->data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$this->data['filter_product_type'] = '4';
		$this->data['entry_points'] = $this->language->get('entry_points');
		$this->data['entry_option_points'] = $this->language->get('entry_option_points');
		$this->data['entry_subtract'] = $this->language->get('entry_subtract');
		$this->data['entry_weight_class'] = $this->language->get('entry_weight_class');
		$this->data['entry_weight'] = $this->language->get('entry_weight');
    	$this->data['entry_gross_weight'] = $this->language->get('entry_gross_weight');
 		$this->data['entry_product_packingtype'] = $this->language->get('entry_product_packingtype');
 		$this->data['entry_casepacking_pid'] = $this->language->get('entry_casepacking_pid');
 		

		$this->data['entry_dimension'] = $this->language->get('entry_dimension');
		$this->data['entry_length'] = $this->language->get('entry_length');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_download'] = $this->language->get('entry_download');
		$this->data['entry_category'] = $this->language->get('entry_category');
		$this->data['entry_filter'] = $this->language->get('entry_filter');
		$this->data['entry_related'] = $this->language->get('entry_related');
		$this->data['entry_attribute'] = $this->language->get('entry_attribute');
		$this->data['entry_text'] = $this->language->get('entry_text');
		$this->data['entry_option'] = $this->language->get('entry_option');
		$this->data['entry_option_value'] = $this->language->get('entry_option_value');
		$this->data['entry_required'] = $this->language->get('entry_required');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_product_type'] = $this->language->get('entry_product_type');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_date_start'] = $this->language->get('entry_date_start');
		$this->data['entry_date_end'] = $this->language->get('entry_date_end');
		$this->data['entry_priority'] = $this->language->get('entry_priority');
		$this->data['entry_tag'] = $this->language->get('entry_tag');
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$this->data['entry_reward'] = $this->language->get('entry_reward');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_profile'] = $this->language->get('entry_profile');

		$this->data['text_recurring_help'] = $this->language->get('text_recurring_help');
		$this->data['text_recurring_title'] = $this->language->get('text_recurring_title');
		$this->data['text_recurring_trial'] = $this->language->get('text_recurring_trial');
		$this->data['entry_recurring'] = $this->language->get('entry_recurring');
		$this->data['entry_recurring_price'] = $this->language->get('entry_recurring_price');
		$this->data['entry_recurring_freq'] = $this->language->get('entry_recurring_freq');
		$this->data['entry_recurring_cycle'] = $this->language->get('entry_recurring_cycle');
		$this->data['entry_recurring_length'] = $this->language->get('entry_recurring_length');
		$this->data['entry_trial'] = $this->language->get('entry_trial');
		$this->data['entry_trial_price'] = $this->language->get('entry_trial_price');
		$this->data['entry_trial_freq'] = $this->language->get('entry_trial_freq');
		$this->data['entry_trial_length'] = $this->language->get('entry_trial_length');
		$this->data['entry_trial_cycle'] = $this->language->get('entry_trial_cycle');

		$this->data['text_length_day'] = $this->language->get('text_length_day');
		$this->data['text_length_week'] = $this->language->get('text_length_week');
		$this->data['text_length_month'] = $this->language->get('text_length_month');
		$this->data['text_length_month_semi'] = $this->language->get('text_length_month_semi');
		$this->data['text_length_year'] = $this->language->get('text_length_year');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_attribute'] = $this->language->get('button_add_attribute');
		$this->data['button_add_option'] = $this->language->get('button_add_option');
		$this->data['button_add_option_value'] = $this->language->get('button_add_option_value');
		$this->data['button_add_discount'] = $this->language->get('button_add_discount');
		$this->data['button_add_special'] = $this->language->get('button_add_special');
		$this->data['button_add_image'] = $this->language->get('button_add_image');
		$this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['button_add_profile'] = $this->language->get('button_add_profile');

		$this->data['tab_general'] = $this->language->get('tab_general');
		$this->data['tab_data'] = $this->language->get('tab_data');
		$this->data['tab_attribute'] = $this->language->get('tab_attribute');
		$this->data['tab_option'] = $this->language->get('tab_option');		
		$this->data['tab_profile'] = $this->language->get('tab_profile');
		$this->data['tab_discount'] = $this->language->get('tab_discount');
		$this->data['tab_special'] = $this->language->get('tab_special');
		$this->data['tab_image'] = $this->language->get('tab_image');
		$this->data['tab_links'] = $this->language->get('tab_links');
		$this->data['tab_reward'] = $this->language->get('tab_reward');
		$this->data['tab_design'] = $this->language->get('tab_design');
		$this->data['tab_marketplace_links'] = $this->language->get('tab_marketplace_links');
		$this->data['product_types'] = $this->model_catalog_product->getProductTypes();

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = array();
		}

		if (isset($this->error['meta_description'])) {
			$this->data['error_meta_description'] = $this->error['meta_description'];
		} else {
			$this->data['error_meta_description'] = array();
		}		

		if (isset($this->error['description'])) {
			$this->data['error_description'] = $this->error['description'];
		} else {
			$this->data['error_description'] = array();
		}	

		if (isset($this->error['model'])) {
			$this->data['error_model'] = $this->error['model'];
		} else {
			$this->data['error_model'] = '';
		}
		
		if (isset($this->error['offline_sp'])) {
			$this->data['error_offline_sp'] = $this->error['offline_sp'];
		} else {
			$this->data['error_offline_sp'] = '';
		}
		
		if (isset($this->error['online_sp'])) {
			$this->data['error_online_sp'] = $this->error['online_sp'];
		} else {
			$this->data['error_online_sp'] = '';
		}

		if (isset($this->error['date_available'])) {
			$this->data['error_date_available'] = $this->error['date_available'];
		} else {
			$this->data['error_date_available'] = '';
		}	

		$url = '';

		if (isset($this->request->get['filter_product_id'])) {
			$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_sku'])) {
			$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}	

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		if (!isset($this->request->get['product_id'])) {
			$this->data['action'] = $this->url->link('catalog/product/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/product/update', 'token=' . $this->session->data['token'] . '&product_id=' . $this->request->get['product_id'] . $url, 'SSL');
		}

		$this->data['cancel'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['product_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$product_info = $this->model_catalog_product->getProduct($this->request->get['product_id']);
		}

		$this->data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['product_description'])) {
			$this->data['product_description'] = $this->request->post['product_description'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_description'] = $this->model_catalog_product->getProductDescriptions($this->request->get['product_id']);
		} else {
			$this->data['product_description'] = array();
		}

		if (isset($this->request->post['model'])) {
			$this->data['model'] = $this->request->post['model'];
		} elseif (!empty($product_info)) {
			$this->data['model'] = $product_info['model'];
		} else {
			$this->data['model'] = '';
		}

		if (isset($this->request->post['sku'])) {
			$this->data['sku'] = $this->request->post['sku'];
		} elseif (!empty($product_info)) {
			$this->data['sku'] = $product_info['sku'];
		} else {
			$this->data['sku'] = '';
		}

		if (isset($this->request->post['upc'])) {
			$this->data['upc'] = $this->request->post['upc'];
		} elseif (!empty($product_info)) {
			$this->data['upc'] = $product_info['upc'];
		} else {
			$this->data['upc'] = '';
		}

		if (isset($this->request->post['ean'])) {
			$this->data['ean'] = $this->request->post['ean'];
		} elseif (!empty($product_info)) {
			$this->data['ean'] = $product_info['ean'];
		} else {
			$this->data['ean'] = '';
		}

		if (isset($this->request->post['jan'])) {
			$this->data['jan'] = $this->request->post['jan'];
		} elseif (!empty($product_info)) {
			$this->data['jan'] = $product_info['jan'];
		} else {
			$this->data['jan'] = '';
		}

		if (isset($this->request->post['isbn'])) {
			$this->data['isbn'] = $this->request->post['isbn'];
		} elseif (!empty($product_info)) {
			$this->data['isbn'] = $product_info['isbn'];
		} else {
			$this->data['isbn'] = '';
		}
		
		if (isset($this->request->post['casepacking_pid'])) {
			$this->data['casepacking_pid'] = $this->request->post['casepacking_pid'];
		} elseif (!empty($product_info)) {
			$this->data['casepacking_pid'] = $product_info['casepacking_pid'];
		} else {
			$this->data['casepacking_pid'] = '';
		}
		
		if (isset($this->request->post['product_packingtype'])) {
			$this->data['product_packingtype'] = $this->request->post['product_packingtype'];
		} elseif (!empty($product_info)) {
			$this->data['product_packingtype'] = $product_info['product_packingtype'];
		} else {
			$this->data['product_packingtype'] = '';
		}
				

		if (isset($this->request->post['flipkart_fsn'])) {
			$this->data['flipkart_fsn'] = $this->request->post['flipkart_fsn'];
		} elseif (!empty($product_info)) {
			$this->data['flipkart_fsn'] = $product_info['flipkart_fsn'];
		} else {
			$this->data['flipkart_fsn'] = '';
		}
		
		
		if (isset($this->request->post['mpn'])) {
			$this->data['mpn'] = $this->request->post['mpn'];
		} elseif (!empty($product_info)) {
			$this->data['mpn'] = $product_info['mpn'];
		} else {
			$this->data['mpn'] = '';
		}

		if (isset($this->request->post['location'])) {
			$this->data['location'] = $this->request->post['location'];
		} elseif (!empty($product_info)) {
			$this->data['location'] = $product_info['location'];
		} else {
			$this->data['location'] = '';
		}
		
		if (isset($this->request->post['shelf_life'])) {
			$this->data['shelf_life'] = $this->request->post['shelf_life'];
		} elseif (!empty($product_info)) {
			$this->data['shelf_life'] = $product_info['shelf_life'];
		} else {
			$this->data['shelf_life'] = '';
		}
		
		if (isset($this->request->post['case_quantity'])) {
			$this->data['case_quantity'] = $this->request->post['case_quantity'];
		} elseif (!empty($product_info)) {
			$this->data['case_quantity'] = $product_info['case_quantity'];
		} else {
			$this->data['case_quantity'] = '';
		}
		
		if (isset($this->request->post['te_com_url'])) {
			$this->data['te_com_url'] = $this->request->post['te_com_url'];
		} elseif (!empty($product_info)) {
			$this->data['te_com_url'] = $product_info['te_com_url'];
		} else {
			$this->data['te_com_url'] = '';
		}

		if (isset($this->request->post['rack_no'])) {
			$this->data['rack_no'] = $this->request->post['rack_no'];
		} elseif (!empty($product_info)) {
			$this->data['rack_no'] = $product_info['rack_no'];
		} else {
			$this->data['rack_no'] = '';
		}

		$this->load->model('setting/store');

		$this->data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['product_store'])) {
			$this->data['product_store'] = $this->request->post['product_store'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_store'] = $this->model_catalog_product->getProductStores($this->request->get['product_id']);
		} else {
			$this->data['product_store'] = array(0);
		}	

		if (isset($this->request->post['keyword'])) {
			$this->data['keyword'] = $this->request->post['keyword'];
		} elseif (!empty($product_info)) {
			$this->data['keyword'] = $product_info['keyword'];
		} else {
			$this->data['keyword'] = '';
		}

		if (isset($this->request->post['image'])) {
			$this->data['image'] = $this->request->post['image'];
		} elseif (!empty($product_info)) {
			$this->data['image'] = $product_info['image'];
		} else {
			$this->data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($product_info) && $product_info['image'] && file_exists(DIR_IMAGE . $product_info['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($product_info['image'], 100, 100);
		} else {
			$this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		if (isset($this->request->post['shipping'])) {
			$this->data['shipping'] = $this->request->post['shipping'];
		} elseif (!empty($product_info)) {
			$this->data['shipping'] = $product_info['shipping'];
		} else {
			$this->data['shipping'] = 1;
		}

		if (isset($this->request->post['price'])) {
			$this->data['price'] = $this->request->post['price'];
		} elseif (!empty($product_info)) {
			$this->data['price'] = $product_info['price'];
		} else {
			$this->data['price'] = '';
		}
		
		if (isset($this->request->post['online_sp'])) {
			$this->data['online_sp'] = $this->request->post['online_sp'];
		} elseif (!empty($product_info)) {
			$this->data['online_sp'] = $product_info['online_sp'];
		} else {
			$this->data['online_sp'] = '';
		}
		
		if (isset($this->request->post['offline_sp'])) {
			$this->data['offline_sp'] = $this->request->post['offline_sp'];
		} elseif (!empty($product_info)) {
			$this->data['offline_sp'] = $product_info['offline_sp'];
		} else {
			$this->data['offline_sp'] = '';
		}
		
		if (isset($this->request->post['mrp2'])) {
			$this->data['mrp2'] = $this->request->post['mrp2'];
		} elseif (!empty($product_info)) {
			$this->data['mrp2'] = $product_info['mrp2'];
		} else {
			$this->data['mrp2'] = '';
		}
		
		
		if (isset($this->request->post['cost'])) {
			$this->data['cost'] = $this->request->post['cost'];
		} elseif (!empty($product_info)) {
			$this->data['cost'] = $product_info['cost'];
		} else {
			$this->data['cost'] = '';
		}

		$this->load->model('catalog/profile');

		$this->data['profiles'] = $this->model_catalog_profile->getProfiles();

		if (isset($this->request->post['product_profiles'])) {
			$this->data['product_profiles'] = $this->request->post['product_profiles'];
		} elseif (!empty($product_info)) {
			$this->data['product_profiles'] = $this->model_catalog_product->getProfiles($product_info['product_id']);
		} else {
			$this->data['product_profiles'] = array();
		}

		$this->load->model('localisation/tax_class');

		$this->data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (isset($this->request->post['tax_class_id'])) {
			$this->data['tax_class_id'] = $this->request->post['tax_class_id'];
		} elseif (!empty($product_info)) {
			$this->data['tax_class_id'] = $product_info['tax_class_id'];
		} else {
			$this->data['tax_class_id'] = 0;
		}

		if (isset($this->request->post['date_available'])) {
			$this->data['date_available'] = $this->request->post['date_available'];
		} elseif (!empty($product_info)) {
			$this->data['date_available'] = date('Y-m-d', strtotime($product_info['date_available']));
		} else {
			$this->data['date_available'] = date('Y-m-d', time() - 86400);
		}

		if (isset($this->request->post['quantity'])) {
			$this->data['quantity'] = $this->request->post['quantity'];
		} elseif (!empty($product_info)) {
			$this->data['quantity'] = $product_info['quantity'];
		} else {
			$this->data['quantity'] = 0;
		}

		if (isset($this->request->post['minimum'])) {
			$this->data['minimum'] = $this->request->post['minimum'];
		} elseif (!empty($product_info)) {
			$this->data['minimum'] = $product_info['minimum'];
		} else {
			$this->data['minimum'] = 1;
		}

		if (isset($this->request->post['subtract'])) {
			$this->data['subtract'] = $this->request->post['subtract'];
		} elseif (!empty($product_info)) {
			$this->data['subtract'] = $product_info['subtract'];
		} else {
			$this->data['subtract'] = 1;
		}
 
        if (isset($this->request->post['min_stock'])) {
			$this->data['min_stock'] = $this->request->post['min_stock'];
		} elseif (!empty($product_info)) {
			$this->data['min_stock'] = $product_info['min_stock'];
		} else {
			$this->data['min_stock'] = '';
		}
		
		if (isset($this->request->post['fba_min_stock'])) {
			$this->data['fba_min_stock'] = $this->request->post['fba_min_stock'];
		} elseif (!empty($product_info)) {
			$this->data['fba_min_stock'] = $product_info['fba_min_stock'];
		} else {
			$this->data['fba_min_stock'] = 0;
		}
		
		if (isset($this->request->post['front_quantity'])) {
			$this->data['front_quantity'] = $this->request->post['front_quantity'];
		} elseif (!empty($product_info)) {
			$this->data['front_quantity'] = $product_info['front_quantity'];
		} else {
			$this->data['front_quantity'] = 0;
		}
		
		if (isset($this->request->post['millet_product'])) {
			$this->data['millet_product'] = $this->request->post['millet_product'];
		} elseif (!empty($product_info)) {
			$this->data['millet_product'] = $product_info['millet_product'];
		} else {
			$this->data['millet_product'] = 0;
		}
		
		if (isset($this->request->post['sort_order'])) {
			$this->data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($product_info)) {
			$this->data['sort_order'] = $product_info['sort_order'];
		} else {
			$this->data['sort_order'] = 1;
		}
		
		if (isset($this->request->post['product_type'])) {
			$this->data['product_type'] = $this->request->post['product_type'];
		} elseif (!empty($product_info)) {
			$this->data['product_type'] = $product_info['product_type'];
		} else {
			$this->data['product_type'] = 0;
		}

		$this->load->model('localisation/stock_status');

		$this->data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

		if (isset($this->request->post['stock_status_id'])) {
			$this->data['stock_status_id'] = $this->request->post['stock_status_id'];
		} elseif (!empty($product_info)) {
			$this->data['stock_status_id'] = $product_info['stock_status_id'];
		} else {
			$this->data['stock_status_id'] = $this->config->get('config_stock_status_id');
		}

		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($product_info)) {
			$this->data['status'] = $product_info['status'];
		} else {
			$this->data['status'] = 1;
		}


        if (isset($this->request->post['front_status'])) {
			$this->data['front_status'] = $this->request->post['front_status'];
		} elseif (!empty($product_info)) {
			$this->data['front_status'] = $product_info['front_status'];
		} else {
			$this->data['front_status'] = 0;
		}
		
		if (isset($this->request->post['quick_category'])) {
			$this->data['quick_category'] = $this->request->post['quick_category'];
		} elseif (!empty($product_info)) {
			$this->data['quick_category'] = $product_info['quick_category'];
		} else {
			$this->data['quick_category'] = '';
		}
		
		if (isset($this->request->post['gross_weight'])) {
			$this->data['gross_weight'] = $this->request->post['gross_weight'];
		} elseif (!empty($product_info)) {
			$this->data['gross_weight'] = $product_info['gross_weight'];
		} else {
			$this->data['gross_weight'] = '';
		}
		
		
		if (isset($this->request->post['weight'])) {
			$this->data['weight'] = $this->request->post['weight'];
		} elseif (!empty($product_info)) {
			$this->data['weight'] = $product_info['weight'];
		} else {
			$this->data['weight'] = '';
		}

		$this->load->model('localisation/weight_class');

		$this->data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

		if (isset($this->request->post['weight_class_id'])) {
			$this->data['weight_class_id'] = $this->request->post['weight_class_id'];
		} elseif (!empty($product_info)) {
			$this->data['weight_class_id'] = $product_info['weight_class_id'];
		} else {
			$this->data['weight_class_id'] = $this->config->get('config_weight_class_id');
		}

		if (isset($this->request->post['length'])) {
			$this->data['length'] = $this->request->post['length'];
		} elseif (!empty($product_info)) {
			$this->data['length'] = $product_info['length'];
		} else {
			$this->data['length'] = '';
		}

		if (isset($this->request->post['width'])) {
			$this->data['width'] = $this->request->post['width'];
		} elseif (!empty($product_info)) {	
			$this->data['width'] = $product_info['width'];
		} else {
			$this->data['width'] = '';
		}

		if (isset($this->request->post['height'])) {
			$this->data['height'] = $this->request->post['height'];
		} elseif (!empty($product_info)) {
			$this->data['height'] = $product_info['height'];
		} else {
			$this->data['height'] = '';
		}

		$this->load->model('localisation/length_class');

		$this->data['length_classes'] = $this->model_localisation_length_class->getLengthClasses();

		if (isset($this->request->post['length_class_id'])) {
			$this->data['length_class_id'] = $this->request->post['length_class_id'];
		} elseif (!empty($product_info)) {
			$this->data['length_class_id'] = $product_info['length_class_id'];
		} else {
			$this->data['length_class_id'] = $this->config->get('config_length_class_id');
		}

		$this->load->model('catalog/manufacturer');

		if (isset($this->request->post['manufacturer_id'])) {
			$this->data['manufacturer_id'] = $this->request->post['manufacturer_id'];
		} elseif (!empty($product_info)) {
			$this->data['manufacturer_id'] = $product_info['manufacturer_id'];
		} else {
			$this->data['manufacturer_id'] = 0;
		}

		if (isset($this->request->post['manufacturer'])) {
			$this->data['manufacturer'] = $this->request->post['manufacturer'];
		   } elseif (!empty($product_info)) {
			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($product_info['manufacturer_id']);

			if ($manufacturer_info) {		
				$this->data['manufacturer'] = $manufacturer_info['name'];
			} else {
				$this->data['manufacturer'] = '';
			}	
		} else {
			$this->data['manufacturer'] = '';
		}

		// Categories
		$this->load->model('catalog/category');

		if (isset($this->request->post['product_category'])) {
			$categories = $this->request->post['product_category'];
		} elseif (isset($this->request->get['product_id'])) {		
			$categories = $this->model_catalog_product->getProductCategories($this->request->get['product_id']);
		} else {
			$categories = array();
		}

		$this->data['product_categories'] = array();

		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				$this->data['product_categories'][] = array(
					'category_id' => $category_info['category_id'],
					'name'        => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
				);
			}
		}
		
		$quick_categories = $this->model_catalog_product->getQuickCategories();
		foreach($quick_categories as $quick_category_data) {
		    $this->data['quick_categories'][] = array(
		        'quick_category_id' => $quick_category_data['quick_category_id'],
		        'name'              => $quick_category_data['name'],
		        'status'            => $quick_category_data['status'],
		    );
		}
		
		// Zones
		$this->load->model('localisation/zone');
		
		if (isset($this->request->post['product_zone'])) {
			$zones = $this->request->post['product_zone'];
		} elseif (isset($this->request->get['product_id'])) {		
			$zones = $this->model_catalog_product->getProductZones($this->request->get['product_id']);
		} else {
			$zones = array();
		}
		
		$this->data['product_zones'] = array();

		foreach ($zones as $zone_id) {
			$zone_info = $this->model_localisation_zone->getZone($zone_id);

			if ($zone_info) {
				$this->data['product_zones'][] = array(
					'zone_id'   => $zone_info['zone_id'],
					'name'      => $zone_info['name']
				);
			}
		}

		// Filters
		$this->load->model('catalog/filter');

		if (isset($this->request->post['product_filter'])) {
			$filters = $this->request->post['product_filter'];
		} elseif (isset($this->request->get['product_id'])) {
			$filters = $this->model_catalog_product->getProductFilters($this->request->get['product_id']);
		} else {
			$filters = array();
		}

		$this->data['product_filters'] = array();

		foreach ($filters as $filter_id) {
			$filter_info = $this->model_catalog_filter->getFilter($filter_id);

			if ($filter_info) {
				$this->data['product_filters'][] = array(
					'filter_id' => $filter_info['filter_id'],
					'name'      => $filter_info['group'] . ' &gt; ' . $filter_info['name']
				);
			}
		}		

		// Attributes
		$this->load->model('catalog/attribute');

		if (isset($this->request->post['product_attribute'])) {
			$product_attributes = $this->request->post['product_attribute'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_attributes = $this->model_catalog_product->getProductAttributes($this->request->get['product_id']);
		} else {
			$product_attributes = array();
		}

		$this->data['product_attributes'] = array();

		foreach ($product_attributes as $product_attribute) {
			$attribute_info = $this->model_catalog_attribute->getAttribute($product_attribute['attribute_id']);

			if ($attribute_info) {
				$this->data['product_attributes'][] = array(
					'attribute_id'                  => $product_attribute['attribute_id'],
					'name'                          => $attribute_info['name'],
					'product_attribute_description' => $product_attribute['product_attribute_description']
				);
			}
		}		

		// Options
		$this->load->model('catalog/option');

		if (isset($this->request->post['product_option'])) {
			$product_options = $this->request->post['product_option'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_options = $this->model_catalog_product->getProductOptions($this->request->get['product_id']);			
		} else {
			$product_options = array();
		}			

		$this->data['product_options'] = array();

		foreach ($product_options as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				$product_option_value_data = array();

				foreach ($product_option['product_option_value'] as $product_option_value) {
					$product_option_value_data[] = array(
						'product_option_value_id' => $product_option_value['product_option_value_id'],
						'option_value_id'         => $product_option_value['option_value_id'],
						'quantity'                => $product_option_value['quantity'],
						'manufacturing_date'                 => $product_option_value['manufacturing_date'],
						'days_diff'                 => $product_option_value['days_diff'],
						'subtract'                => $product_option_value['subtract'],
						'price'                   => $product_option_value['price'],
						'price_prefix'            => $product_option_value['price_prefix'],
						'points'                  => $product_option_value['points'],
						'points_prefix'           => $product_option_value['points_prefix'],						
						'weight'                  => $product_option_value['weight'],
						'weight_prefix'           => $product_option_value['weight_prefix']	
					);
				}
                
                //array_multisort(array_column($product_option_value_data, 'quantity'), SORT_DESC, $product_option_value_data);
				$this->data['product_options'][] = array(
					'product_option_id'    => $product_option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $product_option['option_id'],
					'name'                 => $product_option['name'],
					'type'                 => $product_option['type'],
					'required'             => $product_option['required']
				);				
			} else {
				$this->data['product_options'][] = array(
					'product_option_id' => $product_option['product_option_id'],
					'option_id'         => $product_option['option_id'],
					'name'              => $product_option['name'],
					'type'              => $product_option['type'],
					'option_value'      => $product_option['option_value'],
					'required'          => $product_option['required']
				);				
			}
		}

		$this->data['option_values'] = array();

		foreach ($this->data['product_options'] as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				if (!isset($this->data['option_values'][$product_option['option_id']])) {
					$this->data['option_values'][$product_option['option_id']] = $this->model_catalog_option->getOptionValues($product_option['option_id']);
				}
			}
		}

		$this->load->model('sale/customer_group');

		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();

		if (isset($this->request->post['product_discount'])) {
			$this->data['product_discounts'] = $this->request->post['product_discount'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_discounts'] = $this->model_catalog_product->getProductDiscounts($this->request->get['product_id']);
		} else {
			$this->data['product_discounts'] = array();
		}

		if (isset($this->request->post['product_special'])) {
			$this->data['product_specials'] = $this->request->post['product_special'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_specials'] = $this->model_catalog_product->getProductSpecials($this->request->get['product_id']);
		} else {
			$this->data['product_specials'] = array();
		}
		
		//START COMBO PRODUCT
		
		if (isset($this->request->post['product_combo'])) {
			$combo_list = $this->request->post['product_combo'];
		} elseif (isset($this->request->get['product_id'])) {		
			$combo_list = $this->model_catalog_product->getProductCombos($this->request->get['product_id']);
		} else {
			$combo_list = array();
		}

		$this->data['products_combos'] = array();

		foreach ($combo_list as $list) {
			
			$product_name = $this->model_catalog_product->getProductName($list['product_id']);

			if ($product_name) {
				$this->data['product_combos'][] = array(
					'product_id' => $list['product_id'],
					'name'       => $product_name,
					'deduct'	 => $list['deduct']
				);
			}
		}		
	// END COMBO PRODUCT //
	
	//START Sub PRODUCT
		
		if (isset($this->request->post['sub_product_list'])) {
			$sub_product = $this->request->post['sub_product_list'];
		} elseif (isset($this->request->get['product_id'])) {		
			$sub_product = $this->model_catalog_product->getSubProductList($this->request->get['product_id']);
		} else {
			$sub_product = array();
		}

		$this->data['products_selected'] = array();

		foreach ($sub_product as $list) {
				$this->data['product_selected'][] = array(
				    'rmpm_id'   => $list['rmpm_id'],
				    'rmpm_name' => $list['rmpm_name'],
				    'quantity'  => $list['quantity']
				);
		}		
		
	// END Sub PRODUCT //

		// Images
		if (isset($this->request->post['product_image'])) {
			$product_images = $this->request->post['product_image'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_images = $this->model_catalog_product->getProductImages($this->request->get['product_id']);
		} else {
			$product_images = array();
		}

		$this->data['product_images'] = array();

		foreach ($product_images as $product_image) {
			if ($product_image['image'] && file_exists(DIR_IMAGE . $product_image['image'])) {
				$image = $product_image['image'];
			} else {
				$image = 'no_image.jpg';
			}

			$this->data['product_images'][] = array(
				'image'      => $image,
				'thumb'      => $this->model_tool_image->resize($image, 100, 100),
				'sort_order' => $product_image['sort_order']
			);
		}

		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

		// Downloads
		$this->load->model('catalog/download');

		if (isset($this->request->post['product_download'])) {
			$product_downloads = $this->request->post['product_download'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_downloads = $this->model_catalog_product->getProductDownloads($this->request->get['product_id']);
		} else {
			$product_downloads = array();
		}

		$this->data['product_downloads'] = array();

		foreach ($product_downloads as $download_id) {
			$download_info = $this->model_catalog_download->getDownload($download_id);

			if ($download_info) {
				$this->data['product_downloads'][] = array(
					'download_id' => $download_info['download_id'],
					'name'        => $download_info['name']
				);
			}
		}

		if (isset($this->request->post['product_related'])) {
			$products = $this->request->post['product_related'];
		} elseif (isset($this->request->get['product_id'])) {		
			$products = $this->model_catalog_product->getProductRelated($this->request->get['product_id']);
		} else {
			$products = array();
		}

		$this->data['product_related'] = array();

		foreach ($products as $product_id) {
			$related_info = $this->model_catalog_product->getProduct($product_id);

			if ($related_info) {
				$this->data['product_related'][] = array(
					'product_id' => $related_info['product_id'],
					'name'       => $related_info['name']
				);
			}
		}

		if (isset($this->request->post['points'])) {
			$this->data['points'] = $this->request->post['points'];
		} elseif (!empty($product_info)) {
			$this->data['points'] = $product_info['points'];
		} else {
			$this->data['points'] = '';
		}

		if (isset($this->request->post['product_reward'])) {
			$this->data['product_reward'] = $this->request->post['product_reward'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_reward'] = $this->model_catalog_product->getProductRewards($this->request->get['product_id']);
		} else {
			$this->data['product_reward'] = array();
		}

		if (isset($this->request->post['product_layout'])) {
			$this->data['product_layout'] = $this->request->post['product_layout'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_layout'] = $this->model_catalog_product->getProductLayouts($this->request->get['product_id']);
		} else {
			$this->data['product_layout'] = array();
		}

		$this->load->model('design/layout');

		$this->data['layouts'] = $this->model_design_layout->getLayouts();
       
       
       
		$this->template = 'catalog/product_form.tpl';
		$this->children = array(
    		  	'common/header',
    		  	'common/footer'
    	);

		$this->response->setOutput($this->render());
	}
	
	protected function getComboForm(){
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_plus'] = $this->language->get('text_plus');
		$this->data['text_minus'] = $this->language->get('text_minus');
		$this->data['text_default'] = $this->language->get('text_default');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		$this->data['text_option'] = $this->language->get('text_option');
		$this->data['text_option_value'] = $this->language->get('text_option_value');
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_percent'] = $this->language->get('text_percent');
		$this->data['text_amount'] = $this->language->get('text_amount');
        
        $this->data['text_min_stock'] = $this->language->get('text_min_stock');
        
		$this->data['entry_name'] = $this->language->get('entry_name');
		
		 $this->document->addStyle('view/stylesheet/bootstrap.css');
		$this->document->addStyle('view/stylesheet/multi_product.css');
		
				// Product Title
		$this->data['entry_title'] = $this->language->get('entry_title');
		// Product Title
		$this->data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$this->data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_store'] = $this->language->get('entry_store');
		$this->data['entry_keyword'] = $this->language->get('entry_keyword');
		$this->data['entry_model'] = $this->language->get('entry_model');
		$this->data['entry_sku'] = $this->language->get('entry_sku');
		$this->data['entry_upc'] = $this->language->get('entry_upc');
		$this->data['entry_ean'] = $this->language->get('entry_ean');
		$this->data['entry_jan'] = $this->language->get('entry_jan');
		$this->data['entry_isbn'] = $this->language->get('entry_isbn');
		$this->data['entry_mpn'] = $this->language->get('entry_mpn');
		$this->data['entry_location'] = $this->language->get('entry_location');
		$this->data['entry_minimum'] = $this->language->get('entry_minimum');
		$this->data['entry_manufacturer'] = $this->language->get('entry_manufacturer');
		$this->data['entry_shipping'] = $this->language->get('entry_shipping');
		$this->data['entry_date_available'] = $this->language->get('entry_date_available');
		$this->data['entry_quantity'] = $this->language->get('entry_quantity');
		$this->data['entry_stock_status'] = $this->language->get('entry_stock_status');
		$this->data['entry_price'] = $this->language->get('entry_price');
		$this->data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$this->data['entry_points'] = $this->language->get('entry_points');
		$this->data['entry_option_points'] = $this->language->get('entry_option_points');
		$this->data['entry_subtract'] = $this->language->get('entry_subtract');
		$this->data['entry_weight_class'] = $this->language->get('entry_weight_class');
		$this->data['entry_weight'] = $this->language->get('entry_weight');
		$this->data['entry_dimension'] = $this->language->get('entry_dimension');
		$this->data['entry_length'] = $this->language->get('entry_length');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_download'] = $this->language->get('entry_download');
		$this->data['entry_category'] = $this->language->get('entry_category');
		$this->data['entry_filter'] = $this->language->get('entry_filter');
		$this->data['entry_related'] = $this->language->get('entry_related');
		$this->data['entry_attribute'] = $this->language->get('entry_attribute');
		$this->data['entry_text'] = $this->language->get('entry_text');
		$this->data['entry_option'] = $this->language->get('entry_option');
		$this->data['entry_option_value'] = $this->language->get('entry_option_value');
		$this->data['entry_required'] = $this->language->get('entry_required');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_date_start'] = $this->language->get('entry_date_start');
		$this->data['entry_date_end'] = $this->language->get('entry_date_end');
		$this->data['entry_priority'] = $this->language->get('entry_priority');
		$this->data['entry_tag'] = $this->language->get('entry_tag');
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$this->data['entry_reward'] = $this->language->get('entry_reward');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_profile'] = $this->language->get('entry_profile');

		$this->data['text_recurring_help'] = $this->language->get('text_recurring_help');
		$this->data['text_recurring_title'] = $this->language->get('text_recurring_title');
		$this->data['text_recurring_trial'] = $this->language->get('text_recurring_trial');
		$this->data['entry_recurring'] = $this->language->get('entry_recurring');
		$this->data['entry_recurring_price'] = $this->language->get('entry_recurring_price');
		$this->data['entry_recurring_freq'] = $this->language->get('entry_recurring_freq');
		$this->data['entry_recurring_cycle'] = $this->language->get('entry_recurring_cycle');
		$this->data['entry_recurring_length'] = $this->language->get('entry_recurring_length');
		$this->data['entry_trial'] = $this->language->get('entry_trial');
		$this->data['entry_trial_price'] = $this->language->get('entry_trial_price');
		$this->data['entry_trial_freq'] = $this->language->get('entry_trial_freq');
		$this->data['entry_trial_length'] = $this->language->get('entry_trial_length');
		$this->data['entry_trial_cycle'] = $this->language->get('entry_trial_cycle');

		$this->data['text_length_day'] = $this->language->get('text_length_day');
		$this->data['text_length_week'] = $this->language->get('text_length_week');
		$this->data['text_length_month'] = $this->language->get('text_length_month');
		$this->data['text_length_month_semi'] = $this->language->get('text_length_month_semi');
		$this->data['text_length_year'] = $this->language->get('text_length_year');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_attribute'] = $this->language->get('button_add_attribute');
		$this->data['button_add_option'] = $this->language->get('button_add_option');
		$this->data['button_add_option_value'] = $this->language->get('button_add_option_value');
		$this->data['button_add_discount'] = $this->language->get('button_add_discount');
		$this->data['button_add_special'] = $this->language->get('button_add_special');
		$this->data['button_add_image'] = $this->language->get('button_add_image');
		$this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['button_add_profile'] = $this->language->get('button_add_profile');

		$this->data['tab_general'] = $this->language->get('tab_general');
		$this->data['tab_data'] = $this->language->get('tab_data');
		$this->data['tab_attribute'] = $this->language->get('tab_attribute');
		$this->data['tab_option'] = $this->language->get('tab_option');		
		$this->data['tab_profile'] = $this->language->get('tab_profile');
		$this->data['tab_discount'] = $this->language->get('tab_discount');
		$this->data['tab_special'] = $this->language->get('tab_special');
		$this->data['tab_image'] = $this->language->get('tab_image');
		$this->data['tab_links'] = $this->language->get('tab_links');
		$this->data['tab_reward'] = $this->language->get('tab_reward');
		$this->data['tab_design'] = $this->language->get('tab_design');
		$this->data['tab_marketplace_links'] = $this->language->get('tab_marketplace_links');

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = array();
		}

		if (isset($this->error['meta_description'])) {
			$this->data['error_meta_description'] = $this->error['meta_description'];
		} else {
			$this->data['error_meta_description'] = array();
		}		

		if (isset($this->error['description'])) {
			$this->data['error_description'] = $this->error['description'];
		} else {
			$this->data['error_description'] = array();
		}	

		if (isset($this->error['model'])) {
			$this->data['error_model'] = $this->error['model'];
		} else {
			$this->data['error_model'] = '';
		}		

		if (isset($this->error['date_available'])) {
			$this->data['error_date_available'] = $this->error['date_available'];
		} else {
			$this->data['error_date_available'] = '';
		}	

		$url = '';

		if (isset($this->request->get['filter_product_id'])) {
			$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_sku'])) {
			$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}	

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		if (!isset($this->request->get['product_id'])) {
			$this->data['action'] = $this->url->link('catalog/product/comboinsert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/product/update', 'token=' . $this->session->data['token'] . '&product_id=' . $this->request->get['product_id'] . $url, 'SSL');
		}

		$this->data['cancel'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['product_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$product_info = $this->model_catalog_product->getProduct($this->request->get['product_id']);
		}

		$this->data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['product_description'])) {
			$this->data['product_description'] = $this->request->post['product_description'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_description'] = $this->model_catalog_product->getProductDescriptions($this->request->get['product_id']);
		} else {
			$this->data['product_description'] = array();
		}

		if (isset($this->request->post['model'])) {
			$this->data['model'] = $this->request->post['model'];
		} elseif (!empty($product_info)) {
			$this->data['model'] = $product_info['model'];
		} else {
			$this->data['model'] = '';
		}

		if (isset($this->request->post['sku'])) {
			$this->data['sku'] = $this->request->post['sku'];
		} elseif (!empty($product_info)) {
			$this->data['sku'] = $product_info['sku'];
		} else {
			$this->data['sku'] = '';
		}

		if (isset($this->request->post['upc'])) {
			$this->data['upc'] = $this->request->post['upc'];
		} elseif (!empty($product_info)) {
			$this->data['upc'] = $product_info['upc'];
		} else {
			$this->data['upc'] = '';
		}

		if (isset($this->request->post['ean'])) {
			$this->data['ean'] = $this->request->post['ean'];
		} elseif (!empty($product_info)) {
			$this->data['ean'] = $product_info['ean'];
		} else {
			$this->data['ean'] = '';
		}

		if (isset($this->request->post['jan'])) {
			$this->data['jan'] = $this->request->post['jan'];
		} elseif (!empty($product_info)) {
			$this->data['jan'] = $product_info['jan'];
		} else {
			$this->data['jan'] = '';
		}

		if (isset($this->request->post['isbn'])) {
			$this->data['isbn'] = $this->request->post['isbn'];
		} elseif (!empty($product_info)) {
			$this->data['isbn'] = $product_info['isbn'];
		} else {
			$this->data['isbn'] = '';
		}

		if (isset($this->request->post['mpn'])) {
			$this->data['mpn'] = $this->request->post['mpn'];
		} elseif (!empty($product_info)) {
			$this->data['mpn'] = $product_info['mpn'];
		} else {
			$this->data['mpn'] = '';
		}

		if (isset($this->request->post['location'])) {
			$this->data['location'] = $this->request->post['location'];
		} elseif (!empty($product_info)) {
			$this->data['location'] = $product_info['location'];
		} else {
			$this->data['location'] = '';
		}

		$this->load->model('setting/store');

		$this->data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['product_store'])) {
			$this->data['product_store'] = $this->request->post['product_store'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_store'] = $this->model_catalog_product->getProductStores($this->request->get['product_id']);
		} else {
			$this->data['product_store'] = array(0);
		}	

		if (isset($this->request->post['keyword'])) {
			$this->data['keyword'] = $this->request->post['keyword'];
		} elseif (!empty($product_info)) {
			$this->data['keyword'] = $product_info['keyword'];
		} else {
			$this->data['keyword'] = '';
		}

		if (isset($this->request->post['image'])) {
			$this->data['image'] = $this->request->post['image'];
		} elseif (!empty($product_info)) {
			$this->data['image'] = $product_info['image'];
		} else {
			$this->data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($product_info) && $product_info['image'] && file_exists(DIR_IMAGE . $product_info['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($product_info['image'], 100, 100);
		} else {
			$this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		if (isset($this->request->post['shipping'])) {
			$this->data['shipping'] = $this->request->post['shipping'];
		} elseif (!empty($product_info)) {
			$this->data['shipping'] = $product_info['shipping'];
		} else {
			$this->data['shipping'] = 1;
		}

		if (isset($this->request->post['price'])) {
			$this->data['price'] = $this->request->post['price'];
		} elseif (!empty($product_info)) {
			$this->data['price'] = $product_info['price'];
		} else {
			$this->data['price'] = '';
		}
		
		if (isset($this->request->post['online_sp'])) {
			$this->data['online_sp'] = $this->request->post['online_sp'];
		} elseif (!empty($product_info)) {
			$this->data['online_sp'] = $product_info['online_sp'];
		} else {
			$this->data['online_sp'] = '';
		}
		
		if (isset($this->request->post['offline_sp'])) {
			$this->data['offline_sp'] = $this->request->post['offline_sp'];
		} elseif (!empty($product_info)) {
			$this->data['offline_sp'] = $product_info['offline_sp'];
		} else {
			$this->data['offline_sp'] = '';
		}
		
		
		if (isset($this->request->post['mrp2'])) {
			$this->data['mrp2'] = $this->request->post['mrp2'];
		} elseif (!empty($product_info)) {
			$this->data['mrp2'] = $product_info['mrp2'];
		} else {
			$this->data['mrp2'] = '';
		}
		
		
		if (isset($this->request->post['cost'])) {
			$this->data['cost'] = $this->request->post['cost'];
		} elseif (!empty($product_info)) {
			$this->data['cost'] = $product_info['cost'];
		} else {
			$this->data['cost'] = '';
		}

		$this->load->model('catalog/profile');

		$this->data['profiles'] = $this->model_catalog_profile->getProfiles();

		if (isset($this->request->post['product_profiles'])) {
			$this->data['product_profiles'] = $this->request->post['product_profiles'];
		} elseif (!empty($product_info)) {
			$this->data['product_profiles'] = $this->model_catalog_product->getProfiles($product_info['product_id']);
		} else {
			$this->data['product_profiles'] = array();
		}

		$this->load->model('localisation/tax_class');

		$this->data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (isset($this->request->post['tax_class_id'])) {
			$this->data['tax_class_id'] = $this->request->post['tax_class_id'];
		} elseif (!empty($product_info)) {
			$this->data['tax_class_id'] = $product_info['tax_class_id'];
		} else {
			$this->data['tax_class_id'] = 0;
		}

		if (isset($this->request->post['date_available'])) {
			$this->data['date_available'] = $this->request->post['date_available'];
		} elseif (!empty($product_info)) {
			$this->data['date_available'] = date('Y-m-d', strtotime($product_info['date_available']));
		} else {
			$this->data['date_available'] = date('Y-m-d', time() - 86400);
		}

		if (isset($this->request->post['quantity'])) {
			$this->data['quantity'] = $this->request->post['quantity'];
		} elseif (!empty($product_info)) {
			$this->data['quantity'] = $product_info['quantity'];
		} else {
			$this->data['quantity'] = 1;
		}

		if (isset($this->request->post['minimum'])) {
			$this->data['minimum'] = $this->request->post['minimum'];
		} elseif (!empty($product_info)) {
			$this->data['minimum'] = $product_info['minimum'];
		} else {
			$this->data['minimum'] = 1;
		}

		if (isset($this->request->post['subtract'])) {
			$this->data['subtract'] = $this->request->post['subtract'];
		} elseif (!empty($product_info)) {
			$this->data['subtract'] = $product_info['subtract'];
		} else {
			$this->data['subtract'] = 1;
		}
 
        if (isset($this->request->post['min_stock'])) {
			$this->data['min_stock'] = $this->request->post['min_stock'];
		} elseif (!empty($product_info)) {
			$this->data['min_stock'] = $product_info['min_stock'];
		} else {
			$this->data['min_stock'] = 0;
		}
		
		if (isset($this->request->post['sort_order'])) {
			$this->data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($product_info)) {
			$this->data['sort_order'] = $product_info['sort_order'];
		} else {
			$this->data['sort_order'] = 1;
		}

		$this->load->model('localisation/stock_status');

		$this->data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

		if (isset($this->request->post['stock_status_id'])) {
			$this->data['stock_status_id'] = $this->request->post['stock_status_id'];
		} elseif (!empty($product_info)) {
			$this->data['stock_status_id'] = $product_info['stock_status_id'];
		} else {
			$this->data['stock_status_id'] = $this->config->get('config_stock_status_id');
		}

		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($product_info)) {
			$this->data['status'] = $product_info['status'];
		} else {
			$this->data['status'] = 1;
		}


        if (isset($this->request->post['front_status'])) {
			$this->data['front_status'] = $this->request->post['front_status'];
		} elseif (!empty($product_info)) {
			$this->data['front_status'] = $product_info['front_status'];
		} else {
			$this->data['front_status'] = 1;
		}
		
		
		if (isset($this->request->post['weight'])) {
			$this->data['weight'] = $this->request->post['weight'];
		} elseif (!empty($product_info)) {
			$this->data['weight'] = $product_info['weight'];
		} else {
			$this->data['weight'] = '';
		}

		$this->load->model('localisation/weight_class');

		$this->data['weight_classes'] = $this->model_localisation_weight_class->getWeightClasses();

		if (isset($this->request->post['weight_class_id'])) {
			$this->data['weight_class_id'] = $this->request->post['weight_class_id'];
		} elseif (!empty($product_info)) {
			$this->data['weight_class_id'] = $product_info['weight_class_id'];
		} else {
			$this->data['weight_class_id'] = $this->config->get('config_weight_class_id');
		}

		if (isset($this->request->post['length'])) {
			$this->data['length'] = $this->request->post['length'];
		} elseif (!empty($product_info)) {
			$this->data['length'] = $product_info['length'];
		} else {
			$this->data['length'] = '';
		}

		if (isset($this->request->post['width'])) {
			$this->data['width'] = $this->request->post['width'];
		} elseif (!empty($product_info)) {	
			$this->data['width'] = $product_info['width'];
		} else {
			$this->data['width'] = '';
		}

		if (isset($this->request->post['height'])) {
			$this->data['height'] = $this->request->post['height'];
		} elseif (!empty($product_info)) {
			$this->data['height'] = $product_info['height'];
		} else {
			$this->data['height'] = '';
		}

		$this->load->model('localisation/length_class');

		$this->data['length_classes'] = $this->model_localisation_length_class->getLengthClasses();

		if (isset($this->request->post['length_class_id'])) {
			$this->data['length_class_id'] = $this->request->post['length_class_id'];
		} elseif (!empty($product_info)) {
			$this->data['length_class_id'] = $product_info['length_class_id'];
		} else {
			$this->data['length_class_id'] = $this->config->get('config_length_class_id');
		}

		$this->load->model('catalog/manufacturer');

		if (isset($this->request->post['manufacturer_id'])) {
			$this->data['manufacturer_id'] = $this->request->post['manufacturer_id'];
		} elseif (!empty($product_info)) {
			$this->data['manufacturer_id'] = $product_info['manufacturer_id'];
		} else {
			$this->data['manufacturer_id'] = 0;
		}

		if (isset($this->request->post['manufacturer'])) {
			$this->data['manufacturer'] = $this->request->post['manufacturer'];
		} elseif (!empty($product_info)) {
			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($product_info['manufacturer_id']);

			if ($manufacturer_info) {		
				$this->data['manufacturer'] = $manufacturer_info['name'];
			} else {
				$this->data['manufacturer'] = '';
			}	
		} else {
			$this->data['manufacturer'] = '';
		}

		// Categories
		$this->load->model('catalog/category');

		if (isset($this->request->post['product_category'])) {
			$categories = $this->request->post['product_category'];
		} elseif (isset($this->request->get['product_id'])) {		
			$categories = $this->model_catalog_product->getProductCategories($this->request->get['product_id']);
		} else {
			$categories = array();
		}

		$this->data['product_categories'] = array();

		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				$this->data['product_categories'][] = array(
					'category_id' => $category_info['category_id'],
					'name'        => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
				);
			}
		}

		// Filters
		$this->load->model('catalog/filter');

		if (isset($this->request->post['product_filter'])) {
			$filters = $this->request->post['product_filter'];
		} elseif (isset($this->request->get['product_id'])) {
			$filters = $this->model_catalog_product->getProductFilters($this->request->get['product_id']);
		} else {
			$filters = array();
		}

		$this->data['product_filters'] = array();

		foreach ($filters as $filter_id) {
			$filter_info = $this->model_catalog_filter->getFilter($filter_id);

			if ($filter_info) {
				$this->data['product_filters'][] = array(
					'filter_id' => $filter_info['filter_id'],
					'name'      => $filter_info['group'] . ' &gt; ' . $filter_info['name']
				);
			}
		}		

		// Attributes
		$this->load->model('catalog/attribute');

		if (isset($this->request->post['product_attribute'])) {
			$product_attributes = $this->request->post['product_attribute'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_attributes = $this->model_catalog_product->getProductAttributes($this->request->get['product_id']);
		} else {
			$product_attributes = array();
		}

		$this->data['product_attributes'] = array();

		foreach ($product_attributes as $product_attribute) {
			$attribute_info = $this->model_catalog_attribute->getAttribute($product_attribute['attribute_id']);

			if ($attribute_info) {
				$this->data['product_attributes'][] = array(
					'attribute_id'                  => $product_attribute['attribute_id'],
					'name'                          => $attribute_info['name'],
					'product_attribute_description' => $product_attribute['product_attribute_description']
				);
			}
		}		
        
        //Combo 
        
        if (isset($this->request->post['product_combo'])) {
			$combo_list = $this->request->post['product_combo'];
		} elseif (isset($this->request->get['product_id'])) {		
			$combo_list = $this->model_catalog_product->getProductCombos($this->request->get['product_id']);
		} else {
			$combo_list = array();
		}

		$this->data['products_combos'] = array();

		foreach ($combo_list as $list) {
			
			$product_name = $this->model_catalog_product->getProductName($list['product_id']);

			if ($product_name) {
				$this->data['product_combos'][] = array(
					'product_id' => $list['product_id'],
					'name'       => $product_name,
					'deduct' 	 => $list['deduct']
				);
			}
		}	
		
		// Options
		$this->load->model('catalog/option');

		if (isset($this->request->post['product_option'])) {
			$product_options = $this->request->post['product_option'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_options = $this->model_catalog_product->getProductOptions($this->request->get['product_id']);			
		} else {
			$product_options = array();
		}			

		$this->data['product_options'] = array();

		foreach ($product_options as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				$product_option_value_data = array();

				foreach ($product_option['product_option_value'] as $product_option_value) {
					$product_option_value_data[] = array(
						'product_option_value_id' => $product_option_value['product_option_value_id'],
						'option_value_id'         => $product_option_value['option_value_id'],
						'quantity'                => $product_option_value['quantity'],
						'manufacturing_date'                 => $product_option_value['manufacturing_date'],
						'days_diff'                 => $product_option_value['days_diff'],
						'subtract'                => $product_option_value['subtract'],
						'price'                   => $product_option_value['price'],
						'price_prefix'            => $product_option_value['price_prefix'],
						'points'                  => $product_option_value['points'],
						'points_prefix'           => $product_option_value['points_prefix'],						
						'weight'                  => $product_option_value['weight'],
						'weight_prefix'           => $product_option_value['weight_prefix']	
					);
				}

				$this->data['product_options'][] = array(
					'product_option_id'    => $product_option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $product_option['option_id'],
					'name'                 => $product_option['name'],
					'type'                 => $product_option['type'],
					'required'             => $product_option['required']
				);				
			} else {
				$this->data['product_options'][] = array(
					'product_option_id' => $product_option['product_option_id'],
					'option_id'         => $product_option['option_id'],
					'name'              => $product_option['name'],
					'type'              => $product_option['type'],
					'option_value'      => $product_option['option_value'],
					'required'          => $product_option['required']
				);				
			}
		}

		$this->data['option_values'] = array();

		foreach ($this->data['product_options'] as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				if (!isset($this->data['option_values'][$product_option['option_id']])) {
					$this->data['option_values'][$product_option['option_id']] = $this->model_catalog_option->getOptionValues($product_option['option_id']);
				}
			}
		}

		$this->load->model('sale/customer_group');

		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();

		if (isset($this->request->post['product_discount'])) {
			$this->data['product_discounts'] = $this->request->post['product_discount'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_discounts'] = $this->model_catalog_product->getProductDiscounts($this->request->get['product_id']);
		} else {
			$this->data['product_discounts'] = array();
		}

		if (isset($this->request->post['product_special'])) {
			$this->data['product_specials'] = $this->request->post['product_special'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_specials'] = $this->model_catalog_product->getProductSpecials($this->request->get['product_id']);
		} else {
			$this->data['product_specials'] = array();
		}

		// Images
		if (isset($this->request->post['product_image'])) {
			$product_images = $this->request->post['product_image'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_images = $this->model_catalog_product->getProductImages($this->request->get['product_id']);
		} else {
			$product_images = array();
		}

		$this->data['product_images'] = array();

		foreach ($product_images as $product_image) {
			if ($product_image['image'] && file_exists(DIR_IMAGE . $product_image['image'])) {
				$image = $product_image['image'];
			} else {
				$image = 'no_image.jpg';
			}

			$this->data['product_images'][] = array(
				'image'      => $image,
				'thumb'      => $this->model_tool_image->resize($image, 100, 100),
				'sort_order' => $product_image['sort_order']
			);
		}

		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

		// Downloads
		$this->load->model('catalog/download');

		if (isset($this->request->post['product_download'])) {
			$product_downloads = $this->request->post['product_download'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_downloads = $this->model_catalog_product->getProductDownloads($this->request->get['product_id']);
		} else {
			$product_downloads = array();
		}

		$this->data['product_downloads'] = array();

		foreach ($product_downloads as $download_id) {
			$download_info = $this->model_catalog_download->getDownload($download_id);

			if ($download_info) {
				$this->data['product_downloads'][] = array(
					'download_id' => $download_info['download_id'],
					'name'        => $download_info['name']
				);
			}
		}

		if (isset($this->request->post['product_related'])) {
			$products = $this->request->post['product_related'];
		} elseif (isset($this->request->get['product_id'])) {		
			$products = $this->model_catalog_product->getProductRelated($this->request->get['product_id']);
		} else {
			$products = array();
		}

		$this->data['product_related'] = array();

		foreach ($products as $product_id) {
			$related_info = $this->model_catalog_product->getProduct($product_id);

			if ($related_info) {
				$this->data['product_related'][] = array(
					'product_id' => $related_info['product_id'],
					'name'       => $related_info['name']
				);
			}
		}

		if (isset($this->request->post['points'])) {
			$this->data['points'] = $this->request->post['points'];
		} elseif (!empty($product_info)) {
			$this->data['points'] = $product_info['points'];
		} else {
			$this->data['points'] = '';
		}

		if (isset($this->request->post['product_reward'])) {
			$this->data['product_reward'] = $this->request->post['product_reward'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_reward'] = $this->model_catalog_product->getProductRewards($this->request->get['product_id']);
		} else {
			$this->data['product_reward'] = array();
		}

		if (isset($this->request->post['product_layout'])) {
			$this->data['product_layout'] = $this->request->post['product_layout'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_layout'] = $this->model_catalog_product->getProductLayouts($this->request->get['product_id']);
		} else {
			$this->data['product_layout'] = array();
		}

		$this->load->model('design/layout');

		$this->data['layouts'] = $this->model_design_layout->getLayouts();

		$this->template = 'catalog/combo_product_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);
		
		//BOF Customer Group Price
			$this->load->language('module/cgp');
			$this->data['entry_customer_group_price'] = $this->language->get('entry_customer_group_price');
			$this->data['warning_customer_group_price'] = $this->language->get('warning_customer_group_price');
			
			if (isset($this->request->post['customer_group_price'])) {
				$this->data['customer_group_prices'] = $this->request->post['customer_group_price'];
			} else {
				if(isset($this->data['product_discounts']))
				{
					$this->data['customer_group_prices'] = $this->getCustomerGroupPrices($this->data['product_discounts'], $this->data['customer_groups']);
				}
				else
					$this->data['customer_group_prices'] = array();
			}
			//EOF Customer Group Price

		$this->response->setOutput($this->render());
	}
	
	protected function getUpdateForm() {
		$this->data['heading_title'] = $this->language->get('heading_title');
		$this->load->model('analytics/product_profiling');
		$this->load->language('catalog/product_short_description');
		$this->data['entry_short_description'] = $this->language->get('entry_short_description');
		$this->data['entry_short_description2'] = $this->language->get('entry_short_description2');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_plus'] = $this->language->get('text_plus');
		$this->data['text_minus'] = $this->language->get('text_minus');
		$this->data['text_default'] = $this->language->get('text_default');
	
        $this->data['text_min_stock'] = $this->language->get('text_min_stock');
        $this->data['text_fba_min_stock'] = $this->language->get('text_fba_min_stock');
        
		$this->data['entry_name'] = $this->language->get('entry_name');
				// Product Title
		$this->data['entry_title'] = $this->language->get('entry_title');
		// Product Title
		$this->data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$this->data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_quantity'] = $this->language->get('entry_quantity');
		$this->data['entry_stock_status'] = $this->language->get('entry_stock_status');
		$this->data['entry_price'] = $this->language->get('entry_price');
		$this->data['entry_model'] = $this->language->get('entry_model');
		$this->data['entry_sku'] = $this->language->get('entry_sku');
		$this->data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$this->data['entry_subtract'] = $this->language->get('entry_subtract');
		$this->data['entry_status'] = $this->language->get('entry_status');
		
		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['tab_general'] = $this->language->get('tab_general');
		$this->data['tab_data'] = $this->language->get('tab_data');
	
		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = array();
		}

		if (isset($this->error['meta_description'])) {
			$this->data['error_meta_description'] = $this->error['meta_description'];
		} else {
			$this->data['error_meta_description'] = array();
		}		

		if (isset($this->error['description'])) {
			$this->data['error_description'] = $this->error['description'];
		} else {
			$this->data['error_description'] = array();
		}	
		if (isset($this->error['description'])) {
			$this->data['error_description'] = $this->error['description'];
		} else {
			$this->data['error_description'] = array();
		}
		
		if (isset($this->error['model'])) {
			$this->data['error_model'] = $this->error['model'];
		} else {
			$this->data['error_model'] = '';
		}
	
		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		if (!isset($this->request->get['product_id'])) {
		$this->data['action'] = $this->url->link('catalog/product/updateproduct', 'token=' . $this->session->data['token'] . '&product_id=' . $this->request->get['product_id'] . $url, 'SSL');
		} 

		$this->data['cancel'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['product_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$product_info = $this->model_catalog_product->getProduct($this->request->get['product_id']);
			$product_mapping_info = $this->model_catalog_product->getProductMapping($this->request->get['product_id']);
		}
		
		//SOF Channel Mapping
		if (isset($this->request->post['amazon_asin'])) {
            $this->data['amazon_asin'] = $this->request->post['amazon_asin'];
		} elseif (!empty($product_mapping_info)) {
			$this->data['amazon_asin'] = $product_mapping_info['amazon_asin'];
		} else {
			$this->data['amazon_asin'] = '';
		}
		
		if (isset($this->request->post['pantry_asin'])) {
            $this->data['pantry_asin'] = $this->request->post['pantry_asin'];
		} elseif (!empty($product_mapping_info)) {
			$this->data['pantry_asin'] = $product_mapping_info['pantry_asin'];
		} else {
			$this->data['pantry_asin'] = '';
		}
		
		if (isset($this->request->post['flipkart_fsn'])) {
            $this->data['flipkart_fsn'] = $this->request->post['flipkart_fsn'];
		} elseif (!empty($product_mapping_info)) {
			$this->data['flipkart_fsn'] = $product_mapping_info['flipkart_fsn'];
		} else {
			$this->data['flipkart_fsn'] = '';
		}
		
		if (isset($this->request->post['bb_sku'])) {
            $this->data['bb_sku'] = $this->request->post['bb_sku'];
		} elseif (!empty($product_mapping_info)) {
			$this->data['bb_sku'] = $product_mapping_info['bb_sku'];
		} else {
			$this->data['bb_sku'] = '';
		}
		
		if (isset($this->request->post['snapdeal_sku'])) {
            $this->data['snapdeal_sku'] = $this->request->post['snapdeal_sku'];
		} elseif (!empty($product_mapping_info)) {
			$this->data['snapdeal_sku'] = $product_mapping_info['snapdeal_sku'];
		} else {
			$this->data['snapdeal_sku'] = '';
		}
		
		if (isset($this->request->post['smytten_sku'])) {
            $this->data['smytten_sku'] = $this->request->post['smytten_sku'];
		} elseif (!empty($product_mapping_info)) {
			$this->data['smytten_sku'] = $product_mapping_info['smytten_sku'];
		} else {
			$this->data['smytten_sku'] = '';
		}
		
		if (isset($this->request->post['paytm_sku'])) {
            $this->data['paytm_sku'] = $this->request->post['paytm_sku'];
		} elseif (!empty($product_mapping_info)) {
			$this->data['paytm_sku'] = $product_mapping_info['paytm_sku'];
		} else {
			$this->data['paytm_sku'] = '';
		}
		
		if (isset($this->request->post['one_mg_sku'])) {
            $this->data['one_mg_sku'] = $this->request->post['one_mg_sku'];
		} elseif (!empty($product_mapping_info)) {
			$this->data['one_mg_sku'] = $product_mapping_info['1mg_sku'];
		} else {
			$this->data['one_mg_sku'] = '';
		}
		//EOF Channel Mapping
		if (isset($this->request->post['club_sku_id'])) {
            $this->data['club_sku_id'] = $this->request->post['club_sku_id'];
		} elseif (!empty($product_info)) {
			$this->data['club_sku_id'] = $product_info['club_sku_id'];
		} else {
			$this->data['club_sku_id'] = 0;
		}
		
		if (isset($this->request->post['pp_category_id'])) {
            $this->data['pp_category_id'] = $this->request->post['pp_category_id'];
		} elseif (!empty($product_info)) {
			$this->data['pp_category_id'] = $this->model_analytics_product_profiling->getPpCategoryByProductId($this->request->get['product_id']);
		} else {
			$this->data['pp_category_id'] = 0;
		}
		
		
		//SOF Product Profiling Mapping
		
		//EOF Product Profiling Mapping
		$this->data['pp_categories'] = $this->model_analytics_product_profiling->getPpCategories();
		$this->data['club_skus'] = $this->model_analytics_product_profiling->getClubSKus();
		
		$this->data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['product_description'])) {
			$this->data['product_description'] = $this->request->post['product_description'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_description'] = $this->model_catalog_product->getProductDescriptions($this->request->get['product_id']);
		} else {
			$this->data['product_description'] = array();
		}

		
	    if (isset($this->request->post['cost'])) {
			$this->data['cost'] = $this->request->post['cost'];
		} elseif (!empty($product_info)) {
			$this->data['cost'] = $product_info['cost'];
		} else {
			$this->data['cost'] = '';
		}
		
		$this->load->model('localisation/tax_class');

		$this->data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();
		
		if (isset($this->request->post['model'])) {
			$this->data['model'] = $this->request->post['model'];
		} elseif (!empty($product_info)) {
			$this->data['model'] = $product_info['model'];
		} else {
			$this->data['model'] = 0;
		}
		
		if (isset($this->request->post['sku'])) {
			$this->data['sku'] = $this->request->post['sku'];
		} elseif (!empty($product_info)) {
			$this->data['sku'] = $product_info['sku'];
		} else {
			$this->data['sku'] = 0;
		}

		if (isset($this->request->post['tax_class_id'])) {
			$this->data['tax_class_id'] = $this->request->post['tax_class_id'];
		} elseif (!empty($product_info)) {
			$this->data['tax_class_id'] = $product_info['tax_class_id'];
		} else {
			$this->data['tax_class_id'] = 0;
		}
		
		if (isset($this->request->post['shelf_life'])) {
			$this->data['shelf_life'] = $this->request->post['shelf_life'];
		} elseif (!empty($product_info)) {
			$this->data['shelf_life'] = $product_info['shelf_life'];
		} else {
			$this->data['shelf_life'] = '';
		}
		
		if (isset($this->request->post['case_quantity'])) {
			$this->data['case_quantity'] = $this->request->post['case_quantity'];
		} elseif (!empty($product_info)) {
			$this->data['case_quantity'] = $product_info['case_quantity'];
		} else {
			$this->data['case_quantity'] = '';
		}
		
		if (isset($this->request->post['te_com_url'])) {
			$this->data['te_com_url'] = $this->request->post['te_com_url'];
		} elseif (!empty($product_info)) {
			$this->data['te_com_url'] = $product_info['te_com_url'];
		} else {
			$this->data['te_com_url'] = '';
		}

		if (isset($this->request->post['quantity'])) {
			$this->data['quantity'] = $this->request->post['quantity'];
		} elseif (!empty($product_info)) {
			$this->data['quantity'] = $product_info['quantity'];
		} else {
			$this->data['quantity'] = 1;
		}

		if (isset($this->request->post['subtract'])) {
			$this->data['subtract'] = $this->request->post['subtract'];
		} elseif (!empty($product_info)) {
			$this->data['subtract'] = $product_info['subtract'];
		} else {
			$this->data['subtract'] = 1;
		}
 
        if (isset($this->request->post['min_stock'])) {
			$this->data['min_stock'] = $this->request->post['min_stock'];
		} elseif (!empty($product_info)) {
			$this->data['min_stock'] = $product_info['min_stock'];
		} else {
			$this->data['min_stock'] = 0;
		}
		
		if (isset($this->request->post['fba_min_stock'])) {
			$this->data['fba_min_stock'] = $this->request->post['fba_min_stock'];
		} elseif (!empty($product_info)) {
			$this->data['fba_min_stock'] = $product_info['fba_min_stock'];
		} else {
			$this->data['fba_min_stock'] = 0;
		}
		
		if (isset($this->request->post['front_quantity'])) {
			$this->data['front_quantity'] = $this->request->post['front_quantity'];
		} elseif (!empty($product_info)) {
			$this->data['front_quantity'] = $product_info['front_quantity'];
		} else {
			$this->data['front_quantity'] = 0;
		}
		
		if (isset($this->request->post['millet_product'])) {
			$this->data['millet_product'] = $this->request->post['millet_product'];
		} elseif (!empty($product_info)) {
			$this->data['millet_product'] = $product_info['millet_product'];
		} else {
			$this->data['millet_product'] = 0;
		}
		
		if (isset($this->request->post['gross_weight'])) {
			$this->data['gross_weight'] = $this->request->post['gross_weight'];
		} elseif (!empty($product_info)) {
			$this->data['gross_weight'] = $product_info['gross_weight'];
		} else {
			$this->data['gross_weight'] = 0;
		}
		
		if (isset($this->request->post['product_packingtype'])) {
			$this->data['product_packingtype'] = $this->request->post['product_packingtype'];
		} elseif (!empty($product_info)) {
			$this->data['product_packingtype'] = $product_info['product_packingtype'];
		} else {
			$this->data['product_packingtype'] = '';
		}
		
		if (isset($this->request->post['casepacking_pid'])) {
			$this->data['casepacking_pid'] = $this->request->post['casepacking_pid'];
		} elseif (!empty($product_info)) {
			$this->data['casepacking_pid'] = $product_info['casepacking_pid'];
		} else {
			$this->data['casepacking_pid'] = '';
		}
		
		$this->load->model('localisation/stock_status');

		$this->data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

		if (isset($this->request->post['stock_status_id'])) {
			$this->data['stock_status_id'] = $this->request->post['stock_status_id'];
		} elseif (!empty($product_info)) {
			$this->data['stock_status_id'] = $product_info['stock_status_id'];
		} else {
			$this->data['stock_status_id'] = $this->config->get('config_stock_status_id');
		}

		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($product_info)) {
			$this->data['status'] = $product_info['status'];
		} else {
			$this->data['status'] = 1;
		}

        if (isset($this->request->post['front_status'])) {
			$this->data['front_status'] = $this->request->post['front_status'];
		} elseif (!empty($product_info)) {
			$this->data['front_status'] = $product_info['front_status'];
		} else {
			$this->data['front_status'] = 1;
		}
		
		if (isset($this->request->post['quick_category'])) {
			$this->data['quick_category'] = $this->request->post['quick_category'];
		} elseif (!empty($product_info)) {
			$this->data['quick_category'] = $product_info['quick_category'];
		} else {
			$this->data['quick_category'] = '';
		}
		
			// Categories
		$this->load->model('catalog/category');

		if (isset($this->request->post['product_category'])) {
			$categories = $this->request->post['product_category'];
		} elseif (isset($this->request->get['product_id'])) {		
			$categories = $this->model_catalog_product->getProductCategories($this->request->get['product_id']);
		} else {
			$categories = array();
		}

        // Categories
		$this->data['product_categories'] = array();

		foreach ($categories as $category_id) {
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				$this->data['product_categories'][] = array(
					'category_id' => $category_info['category_id'],
					'name'        => ($category_info['path'] ? $category_info['path'] . ' &gt; ' : '') . $category_info['name']
				);
			}
		}
		
		$quick_categories = $this->model_catalog_product->getQuickCategories();
		foreach($quick_categories as $quick_category_data) {
		    $this->data['quick_categories'][] = array(
		        'quick_category_id' => $quick_category_data['quick_category_id'],
		        'name'              => $quick_category_data['name'],
		        'status'            => $quick_category_data['status'],
		    );
		}
		
		// Zones
		$this->load->model('localisation/zone');
		
		if (isset($this->request->post['product_zone'])) {
			$zones = $this->request->post['product_zone'];
		} elseif (isset($this->request->get['product_id'])) {		
			$zones = $this->model_catalog_product->getProductZones($this->request->get['product_id']);
		} else {
			$zones = array();
		}
		
		$this->data['product_zones'] = array();

		foreach ($zones as $zone_id) {
			$zone_info = $this->model_localisation_zone->getZone($zone_id);

			if ($zone_info) {
				$this->data['product_zones'][] = array(
					'zone_id'   => $zone_info['zone_id'],
					'name'      => $zone_info['name']
				);
			}
		}
		
		$this->template = 'catalog/product_update_form.tpl';
		$this->children = array(
			'common/header',
			'common/footer'
		);

		$this->response->setOutput($this->render());
	}
	
	protected function getViewForm() {
	    
	    $this->data['product_id'] = isset($this->request->get['product_id']);
	
	    if (isset($this->request->get['product_id'])) {
		$this->data['product_id'] = isset($this->request->get['product_id']);

		$this->data['token'] = $this->session->data['token'];
			
		if (isset($this->request->get['filter_history_date_start'])) {
			$filter_history_date_start = $this->request->get['filter_history_date_start'];
		} else {
			$filter_history_date_start = '';
		}

		if (isset($this->request->get['filter_history_date_end'])) {
			$filter_history_date_end = $this->request->get['filter_history_date_end'];
		} else {
			$filter_history_date_end = '';
		}
		
		$this->data['ranges_history'] = array();
		
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hcustom'),
			'value' => 'custom',
			'style' => 'color:#666',
			'id' 	=> '',
		);
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hweek'),
			'value' => 'week',
			'style' => 'color:#090',
			'id' 	=> '',
		);
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hmonth'),
			'value' => 'month',
			'style' => 'color:#090',
			'id' 	=> '',
		);					
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hquarter'),
			'value' => 'quarter',
			'style' => 'color:#090',
			'id' 	=> '',
		);
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hyear'),
			'value' => 'year',
			'style' => 'color:#090',
			'id' 	=> '',
		);
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hcurrent_week'),
			'value' => 'current_week',
			'style' => 'color:#06C',
			'id' 	=> '',
		);
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hcurrent_month'),
			'value' => 'current_month',
			'style' => 'color:#06C',
			'id' 	=> '',
		);	
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hcurrent_quarter'),
			'value' => 'current_quarter',
			'style' => 'color:#06C',
			'id' 	=> '',
		);			
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hcurrent_year'),
			'value' => 'current_year',
			'style' => 'color:#06C',
			'id' 	=> '',
		);			
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hlast_week'),
			'value' => 'last_week',
			'style' => 'color:#F90',
			'id' 	=> '',
		);
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hlast_month'),
			'value' => 'last_month',
			'style' => 'color:#F90',
			'id' 	=> '',
		);	
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hlast_quarter'),
			'value' => 'last_quarter',
			'style' => 'color:#F90',
			'id' 	=> '',
		);			
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hlast_year'),
			'value' => 'last_year',
			'style' => 'color:#F90',
			'id' 	=> '',
		);			
		$this->data['ranges_history'][] = array(
			'text'  => $this->language->get('stat_hall_time'),
			'value' => 'all_time',
			'style' => 'color:#F00',
			'id' 	=> 'chart_all_time',
		);
		
		if (isset($this->request->get['filter_history_range'])) {
			$filter_history_range = $this->request->get['filter_history_range'];
		} else {
			$filter_history_range = 'all_time';
		}

		if (isset($this->request->get['filter_history_option'])) {
			$filter_history_option = $this->request->get['filter_history_option'];
		} else {
			$filter_history_option = '';
		}

		if (isset($this->request->get['sort_history'])) {
			$sort_history = $this->request->get['sort_history'];
		} else {
			$sort_history = 'date_added';
		}

		if (isset($this->request->get['order_history'])) {
			$order_history = $this->request->get['order_history'];
		} else {
			$order_history = 'DESC';
		}
				
		if (isset($this->request->get['page_history'])) {
			$page_history = $this->request->get['page_history'];
		} else {
			$page_history = 1;
		}

		$this->data['sort_history'] = $sort_history;
		$this->data['order_history'] = $order_history;
		$this->data['page_history'] = $page_history;
				
		$this->load->model('catalog/product');

		$this->data['histories'] = array();
				
		$data = array(
			'filter_history_date_start'	  		=> $filter_history_date_start, 
			'filter_history_date_end'	  		=> $filter_history_date_end, 
			'filter_history_range'	  	  		=> $filter_history_range, 
			'filter_history_option'	  	  		=> $filter_history_option,
			'sort_history'            			=> $sort_history,
			'order_history'           			=> $order_history,
			'start_history'           	  		=> ($page_history - 1) * $this->config->get('config_admin_limit'),
			'limit_history'           	  		=> $this->config->get('config_admin_limit')			
		);

		$prod_history_total = $this->model_catalog_product->getProductHistoryTotal($data, $this->request->get['product_id']);
		
		$prod_history = $this->model_catalog_product->getProductHistory($data, $this->request->get['product_id']);
					
		foreach ($prod_history as $history) {
		
		if ($filter_history_option == 0) {	
			$this->data['histories'][] = array(
				'product_stock_history_id'     		 => $history['product_stock_history_id'],
				'product_option_stock_history_id'    => 0,	
				'nooption'     			=> '1',
				'hproduct_id'     		=> $history['product_id'],
				'hdate_added' 			=> date($this->language->get('date_format_short'), strtotime($history['date_added'])) . ' ' . date($this->language->get('time_format'), strtotime($history['date_added'])),
				'hcomment'				=> $history['comment'],
				'huser'					=> $history['user'],
				'horder_id'				=> $history['order_id'],
				'hpo_id'				=> $history['po_id'],
				'hinward_id'			=> $history['inward_id'],
				'hrestock_quantity'     => $history['restock_quantity'],	
				'hstock_quantity'    	=> $history['stock_quantity']			
			);
		} 
		}

		$this->data['ghistories'] = array();
		
		$prod_ghistory = $this->model_catalog_product->getProductChartHistory($data, $this->request->get['product_id']);
		
		foreach ($prod_ghistory as $ghistory) {
					
			$this->data['ghistories'][] = array(
				'ghproduct_id'     		=> $ghistory['product_id'],
				'ghdate_added' 			=> date($this->language->get('date_format_short'), strtotime($ghistory['date_added'])) . ' ' . date($this->language->get('time_format'), strtotime($ghistory['date_added'])),	
				'ghstock_quantity'    	=> $ghistory['stock_quantity'],
				'ghorder_id'			=> $ghistory['order_id'],
				'ghpo_id'				=> $ghistory['po_id'],
				'ghinward_id'			=> $ghistory['inward_id']
			);
		}
		
		$this->data['username'] = $this->user->getUsername();
		
			//START Sub PRODUCT
		
		if (isset($this->request->get['product_id'])) {
			$sub_product = $this->model_catalog_product->getSubProductList($this->request->get['product_id']);
		} else {
			$sub_product = array();
		}

		$this->data['product_selected'] = array();

		foreach ($sub_product as $list) {
            $this->data['product_selected'][] = array(
                'rmpm_id'   => $list['rmpm_id'],
                'rmpm_name' => $list['rmpm_name'],
                'quantity'  => $list['quantity']
            );
		}		
		
	// END Sub PRODUCT //
	
	    //SOF Mapped Combo Products
	    $combo_products = $this->model_catalog_product->getProductCombos($this->request->get['product_id']);
        $this->data['combo_products'] = array();

		foreach ($combo_products as $combo_product) {
			$product_name = $this->model_catalog_product->getProductName($combo_product['product_id']);

			if ($product_name) {
				$this->data['combo_products'][] = array(
					'product_id' => $combo_product['product_id'],
					'name'       => $product_name,
					'deduct'	 => $combo_product['deduct']
				);
			}
		}
		
		$url = '';

		if (isset($this->request->get['filter_history_date_start'])) {
			$url .= '&filter_history_date_start=' . $this->request->get['filter_history_date_start'];
		}
		
		if (isset($this->request->get['filter_history_date_end'])) {
			$url .= '&filter_history_date_end=' . $this->request->get['filter_history_date_end'];
		}
		
		if (isset($this->request->get['filter_history_range'])) {
			$url .= '&filter_history_range=' . $this->request->get['filter_history_range'];
		}
								
		if ($order_history == 'ASC') {
			$url .= '&order_history=DESC';
		} else {
			$url .= '&order_history=ASC';
		}

		if (isset($this->request->get['page_history'])) {
			$url .= '&page_history=' . $this->request->get['page_history'];
		}
					
		$this->data['sort_history_date_added'] = $this->url->link('catalog/product/edit', 'token=' . $this->session->data['token'] . '&sort_history=date_added' . $url, 'SSL');
		$this->data['sort_history_restock_quantity'] = $this->url->link('catalog/product/edit', 'token=' . $this->session->data['token'] . '&sort_history=restock_quantity' . $url, 'SSL');
		$this->data['sort_history_stock_quantity'] = $this->url->link('catalog/product/edit', 'token=' . $this->session->data['token'] . '&sort_history=stock_quantity' . $url, 'SSL');
		
		$pagination_history = new Pagination();
		$pagination_history->total = $prod_history_total;
		$pagination_history->page = $page_history;
		$pagination_history->limit = $this->config->get('config_admin_limit');
		$pagination_history->text = $this->language->get('text_pagination');
		$pagination_history->url = $this->url->link('catalog/product/update', 'token=' . $this->session->data['token'] . '&product_id=' . $this->request->get['product_id'] . '&page_history={page}', 'SSL');
			
		$this->data['pagination_history'] = $pagination_history->render();
							
		$this->data['filter_history_date_start'] = $filter_history_date_start; 
		$this->data['filter_history_date_end'] = $filter_history_date_end; 		
		$this->data['filter_history_range'] = $filter_history_range;  	
		
		$this->data['sort_history'] = $sort_history;
		$this->data['order_history'] = $order_history;

		if (defined('_JEXEC')) {
	    $this->document->addScript(JPATH_MIJOSHOP_OC . 'admin/view/javascript/jquery/jquery.tmpl.min.js');
		$this->document->addScript(JPATH_MIJOSHOP_OC . 'admin/view/javascript/multiselect/jquery.multiselect.js');
	    $this->document->addStyle(JPATH_MIJOSHOP_OC . 'admin/view/javascript/multiselect/jquery.multiselect.css');		
		} else {
	    $this->document->addScript('view/javascript/jquery/jquery.tmpl.min.js');
		$this->document->addScript('view/javascript/multiselect/jquery.multiselect.js');
	    $this->document->addStyle('view/javascript/multiselect/jquery.multiselect.css');
		}	
		
		}
		
		$this->data['heading_title'] = $this->language->get('heading_title');

		$this->data['text_enabled'] = $this->language->get('text_enabled');
		$this->data['text_disabled'] = $this->language->get('text_disabled');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_yes'] = $this->language->get('text_yes');
		$this->data['text_no'] = $this->language->get('text_no');
		$this->data['text_plus'] = $this->language->get('text_plus');
		$this->data['text_minus'] = $this->language->get('text_minus');
		$this->data['text_default'] = $this->language->get('text_default');
		$this->data['text_image_manager'] = $this->language->get('text_image_manager');
		$this->data['text_browse'] = $this->language->get('text_browse');
		$this->data['text_clear'] = $this->language->get('text_clear');
		$this->data['text_option'] = $this->language->get('text_option');
		$this->data['text_option_value'] = $this->language->get('text_option_value');
		$this->data['text_select'] = $this->language->get('text_select');
		$this->data['text_none'] = $this->language->get('text_none');
		$this->data['text_percent'] = $this->language->get('text_percent');
		$this->data['text_amount'] = $this->language->get('text_amount');
        $this->load->language('catalog/product_short_description');
		$this->data['entry_short_description'] = $this->language->get('entry_short_description');
		$this->data['entry_short_description2'] = $this->language->get('entry_short_description2');
        $this->data['text_min_stock'] = $this->language->get('text_min_stock');
        $this->data['text_fba_min_stock'] = $this->language->get('text_fba_min_stock');
        
		$this->data['entry_name'] = $this->language->get('entry_name');
				// Product Title
		$this->data['entry_title'] = $this->language->get('entry_title');
		// Product Title
		$this->data['entry_meta_description'] = $this->language->get('entry_meta_description');
		$this->data['entry_meta_keyword'] = $this->language->get('entry_meta_keyword');
		$this->data['entry_description'] = $this->language->get('entry_description');
		$this->data['entry_store'] = $this->language->get('entry_store');
		$this->data['entry_keyword'] = $this->language->get('entry_keyword');
		$this->data['entry_model'] = $this->language->get('entry_model');
		$this->data['entry_sku'] = $this->language->get('entry_sku');
		$this->data['entry_upc'] = $this->language->get('entry_upc');
		$this->data['entry_ean'] = $this->language->get('entry_ean');
		$this->data['entry_jan'] = $this->language->get('entry_jan');
		$this->data['entry_isbn'] = $this->language->get('entry_isbn');
		$this->data['entry_mpn'] = $this->language->get('entry_mpn');
		$this->data['entry_location'] = $this->language->get('entry_location');
		$this->data['entry_minimum'] = $this->language->get('entry_minimum');
		$this->data['entry_manufacturer'] = $this->language->get('entry_manufacturer');
		$this->data['entry_shipping'] = $this->language->get('entry_shipping');
		$this->data['entry_date_available'] = $this->language->get('entry_date_available');
    	$this->data['entry_quantity'] = $this->language->get('entry_quantity');
    	$this->data['entry_stock_status'] = $this->language->get('entry_stock_status');
    	$this->data['entry_price'] = $this->language->get('entry_price');
    		
    	$this->data['tab_history'] = $this->language->get('tab_history');	
    	$this->data['entry_hrange'] = $this->language->get('entry_hrange');			
    	$this->data['entry_hdate_start'] = $this->language->get('entry_hdate_start');
    	$this->data['entry_hdate_end'] = $this->language->get('entry_hdate_end');
    	$this->data['entry_hoption'] = $this->language->get('entry_hoption');
    	$this->data['text_nooption'] = $this->language->get('text_nooption');				
    	$this->data['button_hfilter'] = $this->language->get('button_hfilter');
    	$this->data['button_hdownload'] = $this->language->get('button_hdownload');
    	$this->data['column_hdate_added'] = $this->language->get('column_hdate_added');
    	$this->data['column_comment'] = $this->language->get('column_comment');
    	$this->data['column_user'] = $this->language->get('column_user');
    	$this->data['column_hrestock_quantity'] = $this->language->get('column_hrestock_quantity');
    	$this->data['column_hstock_quantity'] = $this->language->get('column_hstock_quantity');
    	$this->data['column_horder_id'] = $this->language->get('column_horder_id');
    	$this->data['column_hpo_id'] = $this->language->get('column_hpo_id');
    	$this->data['text_no_results'] = $this->language->get('text_no_results');
    	$this->data['entry_gstock_quantity'] = $this->language->get('entry_gstock_quantity');
    	$this->data['openbay_show_menu'] = $this->config->get('openbaymanager_show_menu');
		$this->data['entry_tax_class'] = $this->language->get('entry_tax_class');
		$this->data['entry_points'] = $this->language->get('entry_points');
		$this->data['entry_option_points'] = $this->language->get('entry_option_points');
		$this->data['entry_subtract'] = $this->language->get('entry_subtract');
		$this->data['entry_weight_class'] = $this->language->get('entry_weight_class');
		$this->data['entry_weight'] = $this->language->get('entry_weight');
		$this->data['entry_dimension'] = $this->language->get('entry_dimension');
		$this->data['entry_length'] = $this->language->get('entry_length');
		$this->data['entry_image'] = $this->language->get('entry_image');
		$this->data['entry_download'] = $this->language->get('entry_download');
		$this->data['entry_category'] = $this->language->get('entry_category');
		$this->data['entry_filter'] = $this->language->get('entry_filter');
		$this->data['entry_related'] = $this->language->get('entry_related');
		$this->data['entry_attribute'] = $this->language->get('entry_attribute');
		$this->data['entry_text'] = $this->language->get('entry_text');
		$this->data['entry_option'] = $this->language->get('entry_option');
		$this->data['entry_option_value'] = $this->language->get('entry_option_value');
		$this->data['entry_required'] = $this->language->get('entry_required');
		$this->data['entry_sort_order'] = $this->language->get('entry_sort_order');
		$this->data['entry_product_type'] = $this->language->get('entry_product_type');
		$this->data['entry_status'] = $this->language->get('entry_status');
		$this->data['entry_date_start'] = $this->language->get('entry_date_start');
		$this->data['entry_date_end'] = $this->language->get('entry_date_end');
		$this->data['entry_priority'] = $this->language->get('entry_priority');
		$this->data['entry_tag'] = $this->language->get('entry_tag');
		$this->data['entry_customer_group'] = $this->language->get('entry_customer_group');
		$this->data['entry_reward'] = $this->language->get('entry_reward');
		$this->data['entry_layout'] = $this->language->get('entry_layout');
		$this->data['entry_profile'] = $this->language->get('entry_profile');

		$this->data['text_recurring_help'] = $this->language->get('text_recurring_help');
		$this->data['text_recurring_title'] = $this->language->get('text_recurring_title');
		$this->data['text_recurring_trial'] = $this->language->get('text_recurring_trial');
		$this->data['entry_recurring'] = $this->language->get('entry_recurring');
		$this->data['entry_recurring_price'] = $this->language->get('entry_recurring_price');
		$this->data['entry_recurring_freq'] = $this->language->get('entry_recurring_freq');
		$this->data['entry_recurring_cycle'] = $this->language->get('entry_recurring_cycle');
		$this->data['entry_recurring_length'] = $this->language->get('entry_recurring_length');
		$this->data['entry_trial'] = $this->language->get('entry_trial');
		$this->data['entry_trial_price'] = $this->language->get('entry_trial_price');
		$this->data['entry_trial_freq'] = $this->language->get('entry_trial_freq');
		$this->data['entry_trial_length'] = $this->language->get('entry_trial_length');
		$this->data['entry_trial_cycle'] = $this->language->get('entry_trial_cycle');

		$this->data['text_length_day'] = $this->language->get('text_length_day');
		$this->data['text_length_week'] = $this->language->get('text_length_week');
		$this->data['text_length_month'] = $this->language->get('text_length_month');
		$this->data['text_length_month_semi'] = $this->language->get('text_length_month_semi');
		$this->data['text_length_year'] = $this->language->get('text_length_year');

		$this->data['button_save'] = $this->language->get('button_save');
		$this->data['button_cancel'] = $this->language->get('button_cancel');
		$this->data['button_add_attribute'] = $this->language->get('button_add_attribute');
		$this->data['button_add_option'] = $this->language->get('button_add_option');
		$this->data['button_add_option_value'] = $this->language->get('button_add_option_value');
		$this->data['button_add_discount'] = $this->language->get('button_add_discount');
		$this->data['button_add_special'] = $this->language->get('button_add_special');
		$this->data['button_add_image'] = $this->language->get('button_add_image');
		$this->data['button_remove'] = $this->language->get('button_remove');
		$this->data['button_add_profile'] = $this->language->get('button_add_profile');

		$this->data['tab_general'] = $this->language->get('tab_general');
		$this->data['tab_data'] = $this->language->get('tab_data');
		$this->data['tab_attribute'] = $this->language->get('tab_attribute');
		$this->data['tab_option'] = $this->language->get('tab_option');		
		$this->data['tab_profile'] = $this->language->get('tab_profile');
		$this->data['tab_discount'] = $this->language->get('tab_discount');
		$this->data['tab_special'] = $this->language->get('tab_special');
		$this->data['tab_image'] = $this->language->get('tab_image');
		$this->data['tab_links'] = $this->language->get('tab_links');
		$this->data['tab_reward'] = $this->language->get('tab_reward');
		$this->data['tab_design'] = $this->language->get('tab_design');
		$this->data['tab_marketplace_links'] = $this->language->get('tab_marketplace_links');
		$this->data['product_types'] = $this->model_catalog_product->getProductTypes();

		if (isset($this->error['warning'])) {
			$this->data['error_warning'] = $this->error['warning'];
		} else {
			$this->data['error_warning'] = '';
		}

		if (isset($this->error['name'])) {
			$this->data['error_name'] = $this->error['name'];
		} else {
			$this->data['error_name'] = array();
		}

		if (isset($this->error['meta_description'])) {
			$this->data['error_meta_description'] = $this->error['meta_description'];
		} else {
			$this->data['error_meta_description'] = array();
		}		

		if (isset($this->error['description'])) {
			$this->data['error_description'] = $this->error['description'];
		} else {
			$this->data['error_description'] = array();
		}	

		if (isset($this->error['model'])) {
			$this->data['error_model'] = $this->error['model'];
		} else {
			$this->data['error_model'] = '';
		}		

		if (isset($this->error['date_available'])) {
			$this->data['error_date_available'] = $this->error['date_available'];
		} else {
			$this->data['error_date_available'] = '';
		}	

		$url = '';

		if (isset($this->request->get['filter_product_id'])) {
			$url .= '&filter_product_id=' . $this->request->get['filter_product_id'];
		}

		if (isset($this->request->get['filter_name'])) {
			$url .= '&filter_name=' . urlencode(html_entity_decode($this->request->get['filter_name'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_model'])) {
			$url .= '&filter_model=' . urlencode(html_entity_decode($this->request->get['filter_model'], ENT_QUOTES, 'UTF-8'));
		}

		if (isset($this->request->get['filter_sku'])) {
			$url .= '&filter_sku=' . urlencode(html_entity_decode($this->request->get['filter_sku'], ENT_QUOTES, 'UTF-8'));
		}
		if (isset($this->request->get['filter_price'])) {
			$url .= '&filter_price=' . $this->request->get['filter_price'];
		}

		if (isset($this->request->get['filter_quantity'])) {
			$url .= '&filter_quantity=' . $this->request->get['filter_quantity'];
		}	

		if (isset($this->request->get['filter_status'])) {
			$url .= '&filter_status=' . $this->request->get['filter_status'];
		}

		if (isset($this->request->get['sort'])) {
			$url .= '&sort=' . $this->request->get['sort'];
		}

		if (isset($this->request->get['order'])) {
			$url .= '&order=' . $this->request->get['order'];
		}

		if (isset($this->request->get['page'])) {
			$url .= '&page=' . $this->request->get['page'];
		}

		$this->data['breadcrumbs'] = array();

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('text_home'),
			'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
			'separator' => false
		);

		$this->data['breadcrumbs'][] = array(
			'text'      => $this->language->get('heading_title'),
			'href'      => $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL'),
			'separator' => ' :: '
		);

		if (!isset($this->request->get['product_id'])) {
			$this->data['action'] = $this->url->link('catalog/product/insert', 'token=' . $this->session->data['token'] . $url, 'SSL');
		} else {
			$this->data['action'] = $this->url->link('catalog/product/update', 'token=' . $this->session->data['token'] . '&product_id=' . $this->request->get['product_id'] . $url, 'SSL');
		}

		$this->data['cancel'] = $this->url->link('catalog/product', 'token=' . $this->session->data['token'] . $url, 'SSL');

		if (isset($this->request->get['product_id']) && ($this->request->server['REQUEST_METHOD'] != 'POST')) {
			$product_info = $this->model_catalog_product->getProduct($this->request->get['product_id']);
		}

		$this->data['token'] = $this->session->data['token'];

		$this->load->model('localisation/language');

		$this->data['languages'] = $this->model_localisation_language->getLanguages();

		if (isset($this->request->post['product_description'])) {
			$this->data['product_description'] = $this->request->post['product_description'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_description'] = $this->model_catalog_product->getProductDescriptions($this->request->get['product_id']);
		} else {
			$this->data['product_description'] = array();
		}
		
		if(!empty($product_info)) {
		    $this->data['te_com_url'] = $product_info['te_com_url'];
		}

		if (isset($this->request->post['model'])) {
			$this->data['model'] = $this->request->post['model'];
		} elseif (!empty($product_info)) {
			$this->data['model'] = $product_info['model'];
		} else {
			$this->data['model'] = '';
		}
		
		if (isset($this->request->post['user'])) {
			$this->data['user'] = $this->request->post['user'];
		} elseif (!empty($product_info)) {
			$this->data['user'] = $product_info['user'];
		} else {
			$this->data['user'] = '';
		}

		if (isset($this->request->post['sku'])) {
			$this->data['sku'] = $this->request->post['sku'];
		} elseif (!empty($product_info)) {
			$this->data['sku'] = $product_info['sku'];
		} else {
			$this->data['sku'] = '';
		}

		if (isset($this->request->post['upc'])) {
			$this->data['upc'] = $this->request->post['upc'];
		} elseif (!empty($product_info)) {
			$this->data['upc'] = $product_info['upc'];
		} else {
			$this->data['upc'] = '';
		}

		if (isset($this->request->post['ean'])) {
			$this->data['ean'] = $this->request->post['ean'];
		} elseif (!empty($product_info)) {
			$this->data['ean'] = $product_info['ean'];
		} else {
			$this->data['ean'] = '';
		}

		if (isset($this->request->post['jan'])) {
			$this->data['jan'] = $this->request->post['jan'];
		} elseif (!empty($product_info)) {
			$this->data['jan'] = $product_info['jan'];
		} else {
			$this->data['jan'] = '';
		}

		if (isset($this->request->post['isbn'])) {
			$this->data['isbn'] = $this->request->post['isbn'];
		} elseif (!empty($product_info)) {
			$this->data['isbn'] = $product_info['isbn'];
		} else {
			$this->data['isbn'] = '';
		}

		if (isset($this->request->post['mpn'])) {
			$this->data['mpn'] = $this->request->post['mpn'];
		} elseif (!empty($product_info)) {
			$this->data['mpn'] = $product_info['mpn'];
		} else {
			$this->data['mpn'] = '';
		}

		if (isset($this->request->post['location'])) {
			$this->data['location'] = $this->request->post['location'];
		} elseif (!empty($product_info)) {
			$this->data['location'] = $product_info['location'];
		} else {
			$this->data['location'] = '';
		}


		if (isset($this->request->post['rack_no'])) {
			$this->data['rack_no'] = $this->request->post['rack_no'];
		} elseif (!empty($product_info)) {
			$this->data['rack_no'] = $product_info['rack_no'];
		} else {
			$this->data['rack_no'] = '';
		}

		$this->load->model('setting/store');

		$this->data['stores'] = $this->model_setting_store->getStores();

		if (isset($this->request->post['product_store'])) {
			$this->data['product_store'] = $this->request->post['product_store'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_store'] = $this->model_catalog_product->getProductStores($this->request->get['product_id']);
		} else {
			$this->data['product_store'] = array(0);
		}	

		if (isset($this->request->post['keyword'])) {
			$this->data['keyword'] = $this->request->post['keyword'];
		} elseif (!empty($product_info)) {
			$this->data['keyword'] = $product_info['keyword'];
		} else {
			$this->data['keyword'] = '';
		}

		if (isset($this->request->post['image'])) {
			$this->data['image'] = $this->request->post['image'];
		} elseif (!empty($product_info)) {
			$this->data['image'] = $product_info['image'];
		} else {
			$this->data['image'] = '';
		}

		$this->load->model('tool/image');

		if (isset($this->request->post['image']) && file_exists(DIR_IMAGE . $this->request->post['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($this->request->post['image'], 100, 100);
		} elseif (!empty($product_info) && $product_info['image'] && file_exists(DIR_IMAGE . $product_info['image'])) {
			$this->data['thumb'] = $this->model_tool_image->resize($product_info['image'], 100, 100);
		} else {
			$this->data['thumb'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);
		}

		if (isset($this->request->post['shipping'])) {
			$this->data['shipping'] = $this->request->post['shipping'];
		} elseif (!empty($product_info)) {
			$this->data['shipping'] = $product_info['shipping'];
		} else {
			$this->data['shipping'] = 1;
		}

		if (isset($this->request->post['price'])) {
			$this->data['price'] = $this->request->post['price'];
		} elseif (!empty($product_info)) {
			$this->data['price'] = $product_info['price'];
		} else {
			$this->data['price'] = '';
		}
		
		if (isset($this->request->post['online_sp'])) {
			$this->data['online_sp'] = $this->request->post['online_sp'];
		} elseif (!empty($product_info)) {
			$this->data['online_sp'] = $product_info['online_sp'];
		} else {
			$this->data['online_sp'] = '';
		}
		
		if (isset($this->request->post['offline_sp'])) {
			$this->data['offline_sp'] = $this->request->post['offline_sp'];
		} elseif (!empty($product_info)) {
			$this->data['offline_sp'] = $product_info['offline_sp'];
		} else {
			$this->data['offline_sp'] = '';
		}
		
		
		if (isset($this->request->post['mrp2'])) {
			$this->data['mrp2'] = $this->request->post['mrp2'];
		} elseif (!empty($product_info)) {
			$this->data['mrp2'] = $product_info['mrp2'];
		} else {
			$this->data['mrp2'] = '';
		}
		
		
		if (isset($this->request->post['cost'])) {
			$this->data['cost'] = $this->request->post['cost'];
		} elseif (!empty($product_info)) {
			$this->data['cost'] = $product_info['cost'];
		} else {
			$this->data['cost'] = '';
		}

		$this->load->model('catalog/profile');

		$this->data['profiles'] = $this->model_catalog_profile->getProfiles();

		if (isset($this->request->post['product_profiles'])) {
			$this->data['product_profiles'] = $this->request->post['product_profiles'];
		} elseif (!empty($product_info)) {
			$this->data['product_profiles'] = $this->model_catalog_product->getProfiles($product_info['product_id']);
		} else {
			$this->data['product_profiles'] = array();
		}

		$this->load->model('localisation/tax_class');

		$this->data['tax_classes'] = $this->model_localisation_tax_class->getTaxClasses();

		if (isset($this->request->post['tax_class_id'])) {
			$this->data['tax_class_id'] = $this->request->post['tax_class_id'];
		} elseif (!empty($product_info)) {
			$this->data['tax_class_id'] = $product_info['tax_class_id'];
		} else {
			$this->data['tax_class_id'] = 0;
		}

		if (isset($this->request->post['date_available'])) {
			$this->data['date_available'] = $this->request->post['date_available'];
		} elseif (!empty($product_info)) {
			$this->data['date_available'] = date('Y-m-d', strtotime($product_info['date_available']));
		} else {
			$this->data['date_available'] = date('Y-m-d', time() - 86400);
		}

		if (isset($this->request->post['quantity'])) {
			$this->data['quantity'] = $this->request->post['quantity'];
		} elseif (!empty($product_info)) {
			$this->data['quantity'] = $product_info['quantity'];
		} else {
			$this->data['quantity'] = 1;
		}

		if (isset($this->request->post['minimum'])) {
			$this->data['minimum'] = $this->request->post['minimum'];
		} elseif (!empty($product_info)) {
			$this->data['minimum'] = $product_info['minimum'];
		} else {
			$this->data['minimum'] = 1;
		}

		if (isset($this->request->post['subtract'])) {
			$this->data['subtract'] = $this->request->post['subtract'];
		} elseif (!empty($product_info)) {
			$this->data['subtract'] = $product_info['subtract'];
		} else {
			$this->data['subtract'] = 1;
		}
 
        if (isset($this->request->post['min_stock'])) {
			$this->data['min_stock'] = $this->request->post['min_stock'];
		} elseif (!empty($product_info)) {
			$this->data['min_stock'] = $product_info['min_stock'];
		} else {
			$this->data['min_stock'] = 0;
		}
		
		if (isset($this->request->post['fba_min_stock'])) {
			$this->data['fba_min_stock'] = $this->request->post['fba_min_stock'];
		} elseif (!empty($product_info)) {
			$this->data['fba_min_stock'] = $product_info['fba_min_stock'];
		} else {
			$this->data['fba_min_stock'] = 0;
		}
		
		if (isset($this->request->post['sort_order'])) {
			$this->data['sort_order'] = $this->request->post['sort_order'];
		} elseif (!empty($product_info)) {
			$this->data['sort_order'] = $product_info['sort_order'];
		} else {
			$this->data['sort_order'] = 1;
		}
		
		if (isset($this->request->post['product_type'])) {
			$this->data['product_type'] = $this->request->post['product_type'];
		} elseif (!empty($product_info)) {
			$this->data['product_type'] = $product_info['product_type'];
		} else {
			$this->data['product_type'] = 0;
		}

		$this->load->model('localisation/stock_status');

		$this->data['stock_statuses'] = $this->model_localisation_stock_status->getStockStatuses();

		if (isset($this->request->post['stock_status_id'])) {
			$this->data['stock_status_id'] = $this->request->post['stock_status_id'];
		} elseif (!empty($product_info)) {
			$this->data['stock_status_id'] = $product_info['stock_status_id'];
		} else {
			$this->data['stock_status_id'] = $this->config->get('config_stock_status_id');
		}
// ankit
		if (isset($this->request->post['status'])) {
			$this->data['status'] = $this->request->post['status'];
		} elseif (!empty($product_info)) {
			$this->data['status'] = $product_info['status'];
		} else {
			$this->data['status'] = 1;
		}


        if (isset($this->request->post['front_status'])) {
			$this->data['front_status'] = $this->request->post['front_status'];
		} elseif (!empty($product_info)) {
			$this->data['front_status'] = $product_info['front_status'];
		} else {
			$this->data['front_status'] = 1;
		}
		
	   if (isset($this->request->post['quick_category'])) {
			$this->data['quick_category'] = $this->request->post['quick_category'];
		} elseif (!empty($product_info)) {
			$this->data['quick_category'] = $product_info['quick_category'];
		} else {
			$this->data['quick_category'] = 1;
		}
		
		$this->data['weight'] = round($product_info['weight'], 4);
		$this->load->model('localisation/weight_class');
		$this->data['weight_class'] = $this->model_localisation_weight_class->getWeightClass($product_info['weight_class_id'])['title'];
		
		$this->data['gross_weight'] = round($product_info['gross_weight'], 4);
        $this->data['product_packingtype'] = $product_info['product_packingtype'];
        $this->data['casepacking_pid'] = $product_info['casepacking_pid'];

		$this->data['width'] = round($product_info['width'], 4);
		$this->data['height'] = round($product_info['height'], 4);
        $this->data['length'] = round($product_info['length'], 4);
		$this->load->model('localisation/length_class');
		$this->data['length_class'] = $this->model_localisation_length_class->getLengthClass($product_info['length_class_id'])['title'];

		$this->load->model('catalog/manufacturer');

		if (isset($this->request->post['manufacturer_id'])) {
			$this->data['manufacturer_id'] = $this->request->post['manufacturer_id'];
		} elseif (!empty($product_info)) {
			$this->data['manufacturer_id'] = $product_info['manufacturer_id'];
		} else {
			$this->data['manufacturer_id'] = 0;
		}

		if (isset($this->request->post['manufacturer'])) {
			$this->data['manufacturer'] = $this->request->post['manufacturer'];
		} elseif (!empty($product_info)) {
			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($product_info['manufacturer_id']);

			if ($manufacturer_info) {		
				$this->data['manufacturer'] = $manufacturer_info['name'];
			} else {
				$this->data['manufacturer'] = '';
			}	
		} else {
			$this->data['manufacturer'] = '';
		}

	

		// Options
		$this->load->model('catalog/option');

		if (isset($this->request->post['product_option'])) {
			$product_options = $this->request->post['product_option'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_options = $this->model_catalog_product->getProductOptions($this->request->get['product_id']);			
		} else {
			$product_options = array();
		}			

		$this->data['product_options'] = array();

		foreach ($product_options as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				$product_option_value_data = array();

				foreach ($product_option['product_option_value'] as $product_option_value) {
					$product_option_value_data[] = array(
						'product_option_value_id' => $product_option_value['product_option_value_id'],
						'option_value_id'         => $product_option_value['option_value_id'],
						'quantity'                => $product_option_value['quantity'],
						'manufacturing_date'                 => $product_option_value['manufacturing_date'],
						'days_diff'                 => $product_option_value['days_diff'],
						'subtract'                => $product_option_value['subtract'],
						'price'                   => $product_option_value['price'],
						'price_prefix'            => $product_option_value['price_prefix'],
						'points'                  => $product_option_value['points'],
						'points_prefix'           => $product_option_value['points_prefix'],						
						'weight'                  => $product_option_value['weight'],
						'weight_prefix'           => $product_option_value['weight_prefix']	
					);
				}

				$this->data['product_options'][] = array(
					'product_option_id'    => $product_option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $product_option['option_id'],
					'name'                 => $product_option['name'],
					'type'                 => $product_option['type'],
					'required'             => $product_option['required']
				);				
			} else {
				$this->data['product_options'][] = array(
					'product_option_id' => $product_option['product_option_id'],
					'option_id'         => $product_option['option_id'],
					'name'              => $product_option['name'],
					'type'              => $product_option['type'],
					'option_value'      => $product_option['option_value'],
					'required'          => $product_option['required']
				);				
			}
		}

		$this->data['option_values'] = array();

		foreach ($this->data['product_options'] as $product_option) {
			if ($product_option['type'] == 'select' || $product_option['type'] == 'radio' || $product_option['type'] == 'checkbox' || $product_option['type'] == 'image') {
				if (!isset($this->data['option_values'][$product_option['option_id']])) {
					$this->data['option_values'][$product_option['option_id']] = $this->model_catalog_option->getOptionValues($product_option['option_id']);
				}
			}
		}

		$this->load->model('sale/customer_group');

		$this->data['customer_groups'] = $this->model_sale_customer_group->getCustomerGroups();

		if (isset($this->request->post['product_discount'])) {
			$this->data['product_discounts'] = $this->request->post['product_discount'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_discounts'] = $this->model_catalog_product->getProductDiscounts($this->request->get['product_id']);
		} else {
			$this->data['product_discounts'] = array();
		}

		if (isset($this->request->post['product_special'])) {
			$this->data['product_specials'] = $this->request->post['product_special'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_specials'] = $this->model_catalog_product->getProductSpecials($this->request->get['product_id']);
		} else {
			$this->data['product_specials'] = array();
		}

		// Images
		if (isset($this->request->post['product_image'])) {
			$product_images = $this->request->post['product_image'];
		} elseif (isset($this->request->get['product_id'])) {
			$product_images = $this->model_catalog_product->getProductImages($this->request->get['product_id']);
		} else {
			$product_images = array();
		}

		$this->data['product_images'] = array();

		foreach ($product_images as $product_image) {
			if ($product_image['image'] && file_exists(DIR_IMAGE . $product_image['image'])) {
				$image = $product_image['image'];
			} else {
				$image = 'no_image.jpg';
			}

			$this->data['product_images'][] = array(
				'image'      => $image,
				'thumb'      => $this->model_tool_image->resize($image, 100, 100),
				'sort_order' => $product_image['sort_order']
			);
		}

		$this->data['no_image'] = $this->model_tool_image->resize('no_image.jpg', 100, 100);

		
		if (isset($this->request->post['product_related'])) {
			$products = $this->request->post['product_related'];
		} elseif (isset($this->request->get['product_id'])) {		
			$products = $this->model_catalog_product->getProductRelated($this->request->get['product_id']);
		} else {
			$products = array();
		}

		$this->data['product_related'] = array();

		foreach ($products as $product_id) {
			$related_info = $this->model_catalog_product->getProduct($product_id);

			if ($related_info) {
				$this->data['product_related'][] = array(
					'product_id' => $related_info['product_id'],
					'name'       => $related_info['name']
				);
			}
		}

		if (isset($this->request->post['points'])) {
			$this->data['points'] = $this->request->post['points'];
		} elseif (!empty($product_info)) {
			$this->data['points'] = $product_info['points'];
		} else {
			$this->data['points'] = '';
		}

		if (isset($this->request->post['product_reward'])) {
			$this->data['product_reward'] = $this->request->post['product_reward'];
		} elseif (isset($this->request->get['product_id'])) {
			$this->data['product_reward'] = $this->model_catalog_product->getProductRewards($this->request->get['product_id']);
		} else {
			$this->data['product_reward'] = array();
		}
		
		if ($this->user->hasPermission('modify', 'inventory/bom_calculator')) {
		    $this->data['has_bom_access'] = 1;
		} else {
		    $this->data['has_bom_access'] = 0;
		}

		$this->template = 'catalog/product_view.tpl';
		$this->children = array(
		  	    'common/header',
		  	    'common/footer'
		);

		$this->response->setOutput($this->render());
	}

	protected function validateForm() {
		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		foreach ($this->request->post['product_description'] as $language_id => $value) {
			if ((utf8_strlen($value['name']) < 1) || (utf8_strlen($value['name']) > 255)) {
				$this->error['name'][$language_id] = $this->language->get('error_name');
			}
		}

		if ((utf8_strlen(trim($this->request->post['model'])) != 8) || !is_numeric(trim($this->request->post['model']))) {
			$this->error['model'] = $this->language->get('error_model');
		}
		
		if ((utf8_strlen($this->request->post['offline_sp']) < 1)) {
			$this->error['offline_sp'] = "Please enter Offline Special Price";
		}
		
		if ((utf8_strlen($this->request->post['online_sp']) < 1)) {
			$this->error['online_sp'] = "Please enter Online Special Price";
		}

		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}
	
	protected function validateUpdateForm() {
	    if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if ((utf8_strlen(trim($this->request->post['model'])) != 8) || !is_numeric(trim($this->request->post['model']))) {
			$this->error['model'] = $this->language->get('error_model');
		}
		
		if ($this->error && !isset($this->error['warning'])) {
			$this->error['warning'] = $this->language->get('error_warning');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	protected function validateDelete() {
		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}

	/*protected function validateCopy() {
		if (!$this->user->hasPermission('modify', 'catalog/product')) {
			$this->error['warning'] = $this->language->get('error_permission');
		}

		if (!$this->error) {
			return true;
		} else {
			return false;
		}
	}*/

	public function autocomplete() {
		$json = array();

		if (isset($this->request->get['filter_pid']) || isset($this->request->get['filter_name']) || isset($this->request->get['filter_model']) || isset($this->request->get['filter_sku']) || isset($this->request->get['filter_category_id'])) {
			$this->load->model('catalog/product');
			$this->load->model('catalog/option');
			
			$day_of_year = date('z') + 1;
		
    		if($day_of_year < 10) {
                $batch_prefix = '00';
            } else if ($day_of_year < 100) {
                $batch_prefix = '0';
            } else {
                $batch_prefix = '';
            }
            
            $todays_batch = date('y') . 'TE' . $batch_prefix . $day_of_year;
			
			if (isset($this->request->get['supplier_id']) && $this->request->get['supplier_id'] > 0) {
				$supplier_id = $this->request->get['supplier_id'];
				$supplier_defaults_query = $this->db->query("SELECT default_fg_warehouse, default_fg_batch, default_rm_warehouse, default_rm_batch FROM `" . DB_PREFIX . "supplier` WHERE supplier_id = '" . (int)$supplier_id . "' LIMIT 1");
			} else {
				$supplier_id = 0;
			}
			
			if (isset($this->request->get['filter_pid'])) {
				$filter_pid = $this->request->get['filter_pid'];
			} else {
				$filter_pid = '';
			}
			
			if (isset($this->request->get['filter_name'])) {
				$filter_name = $this->request->get['filter_name'];
			} else {
				$filter_name = '';
			}

			if (isset($this->request->get['filter_model'])) {
				$filter_model = $this->request->get['filter_model'];
			} else {
				$filter_model = '';
			}
			
			if (isset($this->request->get['filter_sku'])) {
				$filter_sku = $this->request->get['filter_sku'];
			} else {
				$filter_sku = '';
			}
			
			if (isset($this->request->get['filter_product_type']) && $this->request->get['filter_product_type'] > 0) {
				$filter_product_type = $this->request->get['filter_product_type'];
			} else {
				$filter_product_type = NULL;
			}

			if (isset($this->request->get['limit'])) {
				$limit = $this->request->get['limit'];	
			} else {
				$limit = 20;	
			}			

			$data = array(
			    'filter_product_id'     => $filter_pid,
				'filter_name'           => $filter_name,
				'filter_model'          => $filter_model,
				'filter_sku'            => $filter_sku,
				'filter_product_type'   => $filter_product_type,
				'start'                 => 0,
				'limit'                 => $limit
			);

			$results = $this->model_catalog_product->getProducts($data);
            $i = 1;
			foreach ($results as $result) {
				$option_data = array();

				$product_options = $this->model_catalog_product->getProductOptions($result['product_id']);	

				foreach ($product_options as $product_option) {
					$option_info = $this->model_catalog_option->getOption($product_option['option_id']);

					if ($option_info) {				
						if ($option_info['type'] == 'select' || $option_info['type'] == 'radio' || $option_info['type'] == 'checkbox' || $option_info['type'] == 'image') {
							$option_value_data = array();
                            $batch_count = 0;
							foreach ($product_option['product_option_value'] as $product_option_value) {
								$option_value_info = $this->model_catalog_option->getOptionValue($product_option_value['option_value_id']);

								if ($option_value_info) {
								    if($supplier_id > 0 && $result['product_type'] == 4) {
								        if($batch_count == 31) {
								            break;
								        }
								        if($supplier_defaults_query->row['default_fg_batch'] > 0 && $product_option['option_id'] == $supplier_defaults_query->row['default_fg_batch'] && $option_value_info['name'] <= $todays_batch) {
								            $option_value_data[] = array(
								    	        'product_option_value_id' => $product_option_value['product_option_value_id'],
								    	        'option_value_id'         => $product_option_value['option_value_id'],
								    	        'name'                    => $option_value_info['name']." (". round($product_option_value['quantity'],4) .")",
								    	        'quantity'                => round($product_option_value['quantity'], 4),
								    	        'price'                   => (float)$product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
								    	        'price_prefix'            => $product_option_value['price_prefix']
								            );
								            $batch_count++;
								        }
								    } else if($supplier_id > 0 && $result['product_type'] == 1) {
								        if($supplier_defaults_query->row['default_rm_batch'] > 0 && $product_option['option_id'] == $supplier_defaults_query->row['default_rm_batch']) {
								            $option_value_data[] = array(
								    	        'product_option_value_id' => $product_option_value['product_option_value_id'],
								    	        'option_value_id'         => $product_option_value['option_value_id'],
								    	        'name'                    => $option_value_info['name']." (". round($product_option_value['quantity'],4) .")",
								    	        'quantity'                => round($product_option_value['quantity'], 4),
								    	        'price'                   => (float)$product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
								    	        'price_prefix'            => $product_option_value['price_prefix']
								            );
								        }
								    } else {
								        $option_value_data[] = array(
								    	    'product_option_value_id' => $product_option_value['product_option_value_id'],
								    	    'option_value_id'         => $product_option_value['option_value_id'],
								    	    'name'                    => $option_value_info['name']." (". round($product_option_value['quantity'],4) .")",
								    	    'quantity'                => round($product_option_value['quantity'], 4),
								    	    'price'                   => (float)$product_option_value['price'] ? $this->currency->format($product_option_value['price'], $this->config->get('config_currency')) : false,
								    	    'price_prefix'            => $product_option_value['price_prefix']
								        );
								    }
								}
							}
							if(count($option_value_data) > 0) {
							    $option_data[] = array(
							        'product_option_id' => $product_option['product_option_id'],
							        'option_id'         => $product_option['option_id'],
							        'name'              => $option_info['name'],
							        'type'              => $option_info['type'],
							        'option_value'      => $option_value_data,
							        'required'          => $product_option['required']
						        );
							}
						} else {
							$option_data[] = array(
								'product_option_id' => $product_option['product_option_id'],
								'option_id'         => $product_option['option_id'],
								'name'              => $option_info['name'],
								'type'              => $option_info['type'],
								'option_value'      => $product_option['option_value'],
								'required'          => $product_option['required']
							);				
						}
					}
				}
				
                 $json[] = array(
				    'product_id'    => $result['product_id'],
				    'name'          => strip_tags(html_entity_decode($result['name'], ENT_QUOTES, 'UTF-8')),
				    'product_type'  => $result['product_type'],
				    'model'         => $result['model'],
				    'sku'           => $result['sku'],
				    'option'        => $option_data,
				    'price'         => $result['price'],
				    'mrp'           => $result['mrp'],
				    'quantity'      => $result['quantity']
				);
                if ($i++ == 10) break;
			}
		}

		$this->response->setOutput(json_encode($json));
	}
}
?>