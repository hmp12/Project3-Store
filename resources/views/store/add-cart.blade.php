<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$user_id = $_POST['user_id'];
		$username = $_POST['username'];
		$phone = $_POST['phone'];
		$product_id = $_POST['product_id'];
		$name = $_POST['name'];
		$quanlity = $_POST['quanlity'];
		$price = $_POST['price'];
		$img_url = $_POST['img_url'];

		if (empty($user_id)) {
			$sql = "SELECT id FROM user WHERE phone = '$phone'";
			$user = $model->fetch_assoc($sql)[0];
			if (!empty($user)) {
				$user_id = $user['id'];
				$session->send($user_id, 'guest');
			}
			else {
				$sql = "INSERT INTO user (usr, name, phone)
				VALUE ('$phone', '$username', '$phone')";
				if ($model->db->query($sql)) {
					$sql = "SELECT id FROM user WHERE phone = '$phone'";
					$user = $model->db->fetch_assoc($sql)[0];
					$user_id = $user['id'];
					$session->send($user_id, 'guest');
				}
				else {
					echo $model->db->error();
				}
			}	
		}
		if (!empty($user_id)) {
			$sql = "INSERT INTO carts (user_id, product_id, name, price, img_url, quanlity)
				VALUE ('$user_id', '$product_id', '$name', '$price', '$img_url', '$quanlity');";
			$model->db->query($sql);
			echo $model->db->error();
			echo '<script type="text/javascript">
						var user_id = "'.$user_id.'";
				</script>';
		}		
	}
?>
			