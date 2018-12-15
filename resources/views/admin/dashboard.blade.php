<div class="dashboard">
	<ol class="breadcrumb">
            <li class="breadcrumb-item">
            	<a href="">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Overview</li>
	</ol>
	
	<div class="row">
		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-primary o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fa fa-user"></i>
				</div>
				<div class="mr-6"><h3>{{ $usersCount }} Users</h3></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="{{ url('/') }}/admin/user">
				<span class="float-left">View Users</span>
				<span class="float-right">
				<i class="fa fa-angle-right"></i>
				</span>
			</a>
			</div>
		</div>

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-danger o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fa fa-shopping-cart"></i>
				</div>
				<div class="mr-5"><h3>{{ $ordersCount }} Orders</h3></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="{{ url('/') }}/admin/order">
				<span class="float-left">View Orders</span>
				<span class="float-right">
				<i class="fa fa-angle-right"></i>
				</span>
			</a>
			</div>
		</div>

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-success o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fa fa-archive"></i>
				</div>
				<div class="mr-5"><h3>{{ $productsCount }} Products</h3></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="{{ url('/') }}/admin/product">
				<span class="float-left">View Products</span>
				<span class="float-right">
				<i class="fa fa-angle-right"></i>
				</span>
			</a>
			</div>
		</div>

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-info o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fa fa-image"></i>
				</div>
				<div class="mr-5"><h3>{{ $photosCount }} Photos</h3></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="{{ url('/') }}/admin/photo">
				<span class="float-left">View Photos</span>
				<span class="float-right">
				<i class="fa fa-angle-right"></i>
				</span>
			</a>
			</div>
		</div>

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-warning o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fa fa-tags"></i>
				</div>
				<div class="mr-5"><h3>{{ $categoriesCount }} Categories</h3></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="{{ url('/') }}/admin/category">
				<span class="float-left">View Categories</span>
				<span class="float-right">
				<i class="fa fa-angle-right"></i>
				</span>
			</a>
			</div>
		</div>

		<div class="col-xl-3 col-sm-6 mb-3">
			<div class="card text-white bg-secondary o-hidden h-100">
			<div class="card-body">
				<div class="card-body-icon">
				<i class="fa fa-object-ungroup"></i>
				</div>
				<div class="mr-5"><h3>{{ $bannersCount }} Banners</h3></div>
			</div>
			<a class="card-footer text-white clearfix small z-1" href="{{ url('/') }}/admin/banner">
				<span class="float-left">View Banners</span>
				<span class="float-right">
				<i class="fa fa-angle-right"></i>
				</span>
			</a>
			</div>
		</div>
	</div>

	{{ gettype($revenue) }}
	<script>
		var revenue = {!! json_encode($revenue) !!};
		revenue = Object.values(revenue);
	</script>
	<div class="card mb-3">
		<div class="card-header">
			<i class="fas fa-chart-area"></i>
			Revenue Chart</div>
		<div class="card-body">
			<canvas id="revenueChart" width="100%" height="30"></canvas>
		</div>
		<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
	</div>
</div>