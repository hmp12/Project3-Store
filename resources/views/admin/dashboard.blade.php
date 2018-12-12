<div class="dashboard">
	<h1>Dashboard</h1>
	<a href="{{ url('/') }}/admin/user">
		<div class="gray box">
			<div class="float-left">
				<h1><i class="fa fa-user"></i></h1>
				<h3>Users</h3>
			</div>
			<div class="right">
				<?php echo $usersCount;?>
			</div>
		</div>
	</a>
	<a href="{{ url('/') }}/admin/order">
		<div class="red box">
			<div class="float-left">
				<h1><i class="fa fa-pencil-square"></i></h1>
				<h3>Order</h3>
			</div>
			<div class="right">
				<?php echo $postsCount;?>
			</div>
		</div>
	</a>
	<a href="{{ url('/') }}/admin/product">
		<div class="green box">
			<div class="float-left">
				<h1><i class="fa fa-archive"></i></h1>
				<h3>Products</h3>
			</div>
			<div class="right">
				<?php echo $productsCount;?>
			</div>
		</div>
	</a>
	<a href="{{ url('/') }}/admin/photo">
		<div class="blue box">
			<div class="float-left">
				<h1><i class="fa fa-picture-o"></i></h1>
				<h3>Photos</h3>
			</div>
			<div class="right">
				<?php echo $photosCount;?>
			</div>
		</div>
	</a>
	<a href="{{ url('/') }}/admin/category">
		<div class="yellow box">
			<div class="float-left">
				<h1><i class="fa fa-tags"></i></h1>
				<h3>Categories</h3>
			</div>
			<div class="right">
				<?php echo $categoriesCount;?>
			</div>
		</div>
	</a>
	<a href="{{ url('/') }}/admin/banner">
		<div class="gray box">
			<div class="float-left">
				<h1><i class="fa fa-picture-o"></i></h1>
				<h3>Banner</h3>
			</div>
			<div class="right">
				<?php echo $usersCount;?>
			</div>
		</div>
	</a>
</div>