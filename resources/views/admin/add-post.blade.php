<?php
	include '../model/model.php';
	$model = new Model();
	
	$titleErr = $urlErr = $bodyErr = "";
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		$data = $model->getData('posts', $id)[0];
		$title = $data['title'];
		$url = $data['url'];
		$body = $data['body'];
		$cover = '../php/getfile.php?url='.$data['img_url'];
		$tags = $data['tags'];
		$cate = $data['cate_id'];
	}
	else {
		$title = $url = $body = $cover = $tags = $cate = "";
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$valid = True;
		if (!empty($_POST['title'])) {
			$title = $_POST['title'];
		}
		else {
			$valid = False;
			$titleErr = "Title is empty";
		}
		if (!empty($_POST['url'])) {
			$url = $_POST['url'];
			/*
			$sql = "SELECT url FROM posts 
				WHERE url = '$url'";
			$data = $model->query($sql);
			if ($data->num_rows > 0) {
				$valid = False;
				$urlErr = "Url already existed";
			}
			*/
		}
		else {
			$valid = False;
			$urlErr = "Url is empty";
		}
		if (!empty($_POST['cate'])) {
			$cate = $_POST['cate'];
		}
		else {
			$cate = 0;
		}
		if (!empty($_POST['tags'])) {
			$tags = $_POST['tags'];
		}
		if (!empty($_POST['body'])) {
			$body = $_POST['body'];
		}
		else {
			$valid = False;
			$bodyErr = "Body is empty";
		}
		if (!empty($_POST['cover'])) {
			$cover = $_POST['cover'];
			$img_url = substr($cover, 23);
		}
		if ($valid) {
			if (empty($id)) {
				$sql = "INSERT INTO posts (title, url, cate_id, tags, img_url, body)
					VALUE ('$title', '$url', '$cate', '$tags', '$img_url', '$body')";
			}
			else {
				$sql = "UPDATE posts
					SET title = '$title', url = '$url', cate_id = '$cate', tags = '$tags', img_url = '$img_url', body = '$body'
					WHERE id = '$id'";
			}
		
			$model->query($sql);
			if ($model->error()) {
				echo $model->error();
			}
			else {
				echo "Post success";
			}	
		}
	}
?>

<div class="add">
	<div class="modal">
		<div class="modal-content">
			<div class="modal-header">
				<span class="close fa fa-times"></span>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button class="button" id="choose">Choose</button>
			</div>
		</div>
	</div>

	<h1>Add Posts</h1>
	<button class="button" id="back">Back</button>
	<form action="" enctype="multipart/form-data" method="post">
		<div class="container">
			<div class="left">
				<p>Title <span class="error"><?php echo $titleErr;?></p>
				<input type="text" width="900px" name="title" value="<?php echo $title;?>" placeholder="Type title in here" class="text" id="title">
				<p>Url <span class="error"><?php echo $urlErr;?></p>
				<input type="text" name="url" value="<?php echo $url;?>" placeholder="Click to auto complete" class="text" id="url">
				<p>Categories</p>
				<select name="cate" class="text">
					<option value="0" disabled selected hidden>Choose categories here</option>
					<?php
						$sql = "SELECT * FROM categories
							WHERE parent_id='1'";
						$data = $model->query($sql);
						if ($data->num_rows) {
							while ($row = $data->fetch_assoc()) {
								echo '
									<option value="'.$row['id'].'">'.$row['label'].'</option>
								';
							}
						}
					?>
				</select>
				<p>Tags</p>
				<input type="text" name="tags" placeholder="Input tags here" value="<?php echo $tags;?>" class="text" id="tags">
			</div>
			<div class="left">
				<p>Cover from</p>
				<img src="<?php if (!empty($cover)) {echo $cover;} else {echo '../img/default.png';};?>" height="220px" class="block" id="pre_img">
				<input type="text" name="cover" value="<?php echo $cover;?>" class="hidden" id="cover">
				<input type="button" value="Choose" class="button" id="ch_img">
				<input type="button" value="Remove" class="button" id="remove">
			</div>
		</div>

		<p>Body <span class="error"><?php echo $bodyErr;?></p>
		<div class="textarea">
			<textarea name="body"><?php echo $body;?></textarea>
		</div>
		<input type="submit" value="Post" class="button">
	</form>
</div>