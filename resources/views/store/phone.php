<?php 
	include_once '../model/model.php';
	$model = new Model();

	include '../html/phone_filter.html';
	
	echo '<div class="products">';

	$sql = "SELECT * FROM categories WHERE parent_id='3'";
	$categories = $model->fetch_assoc($sql);

	foreach ($categories as $cate) {
		echo '<div class="container">';
		echo '
			<div id="'.$cate['url'].'">
				<h1>'.$cate['label'].'</h1>
			</div>
		';
		$cate_id = $cate['id'];
		$sql = "SELECT * FROM products WHERE cate_id LIKE '3,$cate_id%'";
		$products = $model->fetch_assoc($sql);
		if (!empty($products)) {
			foreach($products as $product) {
				$specs = $model->getData('specs', $product['id'])[0];
				$price = number_format($product['price']);
				$img_url = explode(',', $product['img_url']);
				$img = array();
				foreach ($img_url as $value) {
					$img[] = $model->getData('photos', $value)[0]['url'];
				}
				
				echo '	
					<div class="item-box">
						<img src="../php/getfile.php?url='.$img[0].'" class="image">
						<div class="info">
							<a href="?tab=product&v='.$product['id'].'">
								<p>'.$product['name'].'</p>
								<h5 class="price">'.$price.'đ</h5>
								<div class="specs">
									<table>
										<tr>
											<th>Display</th>
											<th>'.$specs['display'].'</th>
										</tr>
										<tr>
											<th>OS</th>
											<th>'.$specs['os'].'</th>
										</tr>
										<tr>
											<th>CPU</th>
											<th>'.$specs['cpu'].'</th>
										</tr>
										<tr>
											<th>RAM</th>
											<th>'.$specs['ram'].'</th>
										</tr>
									</table>
								</div>
							</a>
							<button value="'.$product['id'].'" class="button compare">Compare</button>	
						</div>
					</div>	
				';
			}
		}
		echo '</div>';
	}
	echo '</div>';
?>