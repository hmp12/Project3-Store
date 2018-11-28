<?php 
	include_once '../model/model.php';
	$model = new Model();
	$posts = $model->getData('posts');
?>
<div class="posts">
	<h1>Posts</h1>
	<?php include '../html/3button.html';?>
	<table class="table">
		<tr>
			<td><input type="checkbox" id="all"></td>
			<td><strong>ID</strong></td>
			<td><strong>Title</strong></td>
			<td><strong>Status</strong></td>
			<td><strong>Categories</strong></td>
			<td><strong>Author</strong></td>
			<td><strong>View</strong></td>
			<td><strong>Tools</strong></td>
		</tr>
		<?php
			//foreach($posts as $post) {
			for ($i=($page-1)*10;$i<$page*10;$i++) {
				$post = $posts[$i];
				if (empty($post)) {
					break;
				}
				if ($post['status'] == 0) {
					$post['status'] = "Hide";
				}
				else if ($post['status'] == 2) {
					$post['status'] = "Show";
				}
				else {
					
				}
				
				echo '
					<tr>
						<td><input type="checkbox" value="'.$post['id'].'"></td>
						<td>'.$post['id'].'</td>
						<td>'.$post['title'].'</td>
						<td>'.$post['status'].'</td>
						<td>'.$post['cate_id'].'</td>
						<td>'.$post['author_id'].'</td>
						<td>'.$post['view'].'</strong></td>
						<td>
							<button value="'.$post['id'].'" class="sbutton edit"><i class="fa fa-pencil-square-o"></i></button>
							<button value="'.$post['id'].'" class="sbutton delete"><i class="fa fa-trash"></i></button>
						</td>
									</tr>
				';
			}
		?>
	</table>
</div>