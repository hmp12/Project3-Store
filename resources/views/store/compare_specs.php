<?php
	include_once '../model/model.php';
	$model = new Model();

	session_start();
	if (!isset($_SESSION['products'])) {
		$_SESSION['products'] = array();
	}

	$products = $_SESSION['products'];
	
	if (empty($products[0])) {
		echo '<span class="price">Nothing to compare</span>';
	}
	else {	
		foreach ($products as $value) {
			$id = $value;
			if (empty($id)) {
				break;
			}
			$product = $model->getData('products', $id)[0];
			$spec = $model->getData('specs', $id)[0];

			$img = explode(',', $product['img_url']);
			$img_url[] = $model->getData('photos', $img[0])[0]['url'];
			$name[] = $product['name'];
			$price[] = number_format($product['price']).'đ';
			$display[] = $spec['display'];
			$os[] = $spec['os'];
			$fcam[] = $spec['fcam'];
			$bcam[] = $spec['bcam'];
			$cpu[] = $spec['cpu'];
			$gpu[] = $spec['gpu'];
			$ram[] = $spec['ram'];
			$storage[] = $spec['storage'];
			$sd[] = $spec['sd'];
			$sim[] = $spec['sim'];
			$battery[] = $spec['battery'];
			$connect[] = $spec['connect'];
			$material[] = $spec['material'];
			$weight[] = $spec['weight'];
	
		}
	}
	echo '
		<div class="compare_specs">
			<table>
				<tr>
					<th></th>
					<th>
						<img height="100px" src="../php/getfile.php?url='.$img_url[0].'">
						<p>'.$name[0].'</p>
					</th>
					<th>
						<img height="100px" src="../php/getfile.php?url='.$img_url[1].'">
						<p>'.$name[1].'</p>
					</th>
					<th>
						<img height="100px" src="../php/getfile.php?url='.$img_url[2].'">
						<p>'.$name[2].'</p>
					</th>
				</tr>
				<tr>
					<th>Giá thành</th>
					<th class="price">'.$price[0].'</th>
					<th class="price">'.$price[1].'</th>
					<th class="price">'.$price[2].'</th>
				</tr>
				<tr>
					<th>Màn hình</th>
					<th>'.$display[0].'</th>
					<th>'.$display[1].'</th>
					<th>'.$display[2].'</th>
				</tr>
				<tr>
					<th>OS</th>
					<th>'.$os[0].'</th>
					<th>'.$os[1].'</th>
					<th>'.$os[2].'</th>
				</tr>
				<tr>
					<th>Camera sau</th>
					<th>'.$bcam[0].'</th>
					<th>'.$bcam[1].'</th>
					<th>'.$bcam[2].'</th>
				</tr>
				<tr>
					<th>Camera trước</th>
					<th>'.$fcam[0].'</th>
					<th>'.$fcam[1].'</th>
					<th>'.$fcam[2].'</th>
				</tr>
				<tr>
					<th>CPU</th>
					<th>'.$cpu[0].'</th>
					<th>'.$cpu[1].'</th>
					<th>'.$cpu[2].'</th>
				</tr>
				<tr>
					<th>GPU</th>
					<th>'.$gpu[0].'</th>
					<th>'.$gpu[1].'</th>
					<th>'.$gpu[2].'</th>
				</tr>
				<tr>
					<th>RAM</th>
					<th>'.$ram[0].'</th>
					<th>'.$ram[1].'</th>
					<th>'.$ram[2].'</th>
				</tr>
				<tr>
					<th>Bộ nhớ trong</th>
					<th>'.$storage[0].'</th>
					<th>'.$storage[1].'</th>
					<th>'.$storage[2].'</th>
				</tr>
				<tr>
					<th>Thẻ nhớ</th>
					<th>'.$sd[0].'</th>
					<th>'.$sd[1].'</th>
					<th>'.$sd[2].'</th>
				</tr>
				<tr>
					<th>SIM</th>
					<th>'.$sim[0].'</th>
					<th>'.$sim[1].'</th>
					<th>'.$sim[2].'</th>
				</tr>
				<tr>
					<th>Pin</th>
					<th>'.$battery[0].'</th>
					<th>'.$battery[1].'</th>
					<th>'.$battery[2].'</th>
				</tr>
				<tr>
					<th>Kết nối</th>
					<th>'.$connect[0].'</th>
					<th>'.$connect[1].'</th>
					<th>'.$connect[2].'</th>
				</tr>
				<tr>
					<th>Kích thước</th>
					<th>'.$weight[0].'</th>
					<th>'.$weight[1].'</th>
					<th>'.$weight[2].'</th>
				</tr>			
			</table>
		</div>
	';
?>