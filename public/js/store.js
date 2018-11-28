$(document).ready(function() {
	var banner_index = 0;
	var banner_max = $('.banner').length - 1;
	var auto_next = setInterval(function() {
		$('.next').click();
	}, 5000);
	
	update_user();
	update_cart();
	update_noti();
	update_compare();

	var price = parseInt($('#price').text().replace(/,/g, ''));
	var quanlity;
	$('.cart-button').click(function() {
		$('.modal').show();
		$('#quanlity').val('1');
	});

	$('#plus').click(function() {
		quanlity = parseInt($('#quanlity').val()) + 1;
		sum = price*quanlity; 
		$('#quanlity').val(quanlity);
		$('#price').text(sum.toLocaleString('en'));
	});

	$('#minus').click(function() {
		if ($('#quanlity').val() > 1) {
			quanlity = parseInt($('#quanlity').val()) - 1;
			sum = price*quanlity; 
			$('#quanlity').val(quanlity);
			$('#price').text(sum.toLocaleString('en'));
		}	
	});

	$('#add').click(function() {
		quanlity = parseInt($('#quanlity').val());
		var username = $('#username').val();
		var phone = $('#phone').val();
		$.ajax({
			url: public_path + "/store/cart/add",
			type: 'POST',
			data: {
				productId: productId,
				quanlity: quanlity,
			},
			success: function(data) {
				$('.error').html(data);
				$('.modal').hide();
				update_user();
				update_cart();
			}
		});
	});

	$('.compare').click(function() {
		var id = $(this).val();
		$.ajax({
			url: public_path + "/store/add-compare",
			type: 'POST',
			data: {
				id: id
			},
			success: function(data) {
				$('.error').html(data);
				update_compare();
			}
		});
	});

	$('.memory-button').click(function() {
		memory = $(this).val();
		$.ajax({
			url: public_path + "/store/get-sub-product",
			type: 'POST',
			data: {
				productId: productId,
				memory: memory,
				color: color
			},
			success: function(data) {
				if (data == '') {
					$('.price').text('Không còn hàng');
				}
				else {
					$('.price').text(data['price'] + 'đ');
				}
			}
		});

		$('.memory-button').each(function(i) {
			$(this).css({'background-color': 'rgba(0, 0, 0, 0)'});
		});
		$(this).css({'background-color': 'rgba(200, 200, 200, 0.5)'});
	});

	$('.color-button').click(function() {
		color = $(this).val();
		$.ajax({
			url: public_path + "/store/get-sub-product",
			type: 'POST',
			data: {
				productId: productId,
				memory: memory,
				color: color
			},
			success: function(data) {
				if (data == '') {
					$('.price').text('Không còn hàng');
				}
				else {
					$('.price').text(data['price'] + 'đ');
				}
			}
		});

		$('.color-button').each(function(i) {
			$(this).find('.round-check .round-checked').css({'opacity': '0'});
		});
		$(this).find('.round-check .round-checked').css({'opacity': '1'});
	});

	$('.memory-button').first().click();
	$('.color-button').first().click();

	$('.next').click(function() {
		clearInterval(auto_next);
		$('.banner:eq('+banner_index+')').css({left: '-100%'});
		$('.dot:eq('+banner_index+')').css({'background-color': 'rgba(150, 150, 150, 0.5)'});
		if (banner_index < banner_max) {
			banner_index++;
		}
		else {
			while (banner_index != 0) {
				$('.banner:eq('+banner_index+')').css({left: '100%'});
				banner_index--;
			}
		}
		$('.banner:eq('+banner_index+')').css({left: '0',});
		$('.dot:eq('+banner_index+')').css({'background-color': 'rgba(0, 0, 0, 0.5)'});
		auto_next = setInterval(function() {
			$('.next').click();
		}, 5000);
	});

	$('.prev').click(function() {
		clearInterval(auto_next);
		$('.banner:eq('+banner_index+')').css({left: '100%'});
		$('.dot:eq('+banner_index+')').css({'background-color': 'rgba(150, 150, 150, 0.5)'});
		if (banner_index > 0) {
			banner_index--;
		}
		else {
			while (banner_index != banner_max) {
				$('.banner:eq('+banner_index+')').css({left: '-100%'});
				banner_index++;
			}
		}
		$('.banner:eq('+banner_index+')').css({left: '0',});
		$('.dot:eq('+banner_index+')').css({'background-color': 'rgba(0, 0, 0, 0.5)'});
		auto_next = setInterval(function() {
			$('.next').click();
		}, 5000);
	});

	$('.dot').click(function() {
		clearInterval(auto_next);
		while (!$(this).is($('.dot:eq('+banner_index+')'))) {
			$('.next').click();
		}
		auto_next = setInterval(function() {
			$('.next').click();
		}, 5000);
	});

	$('#search input').keyup(function() {
		var input = $(this).val();
		update_search(input); 
	});

	$('.filter').change(function() {
		var type = $('#type').val();
		var branch = $('#branch').val();
		var price = $('#price').val();
		var os = $('#os').val();
		var display = $('#display').val();
		var ram = $('#ram').val();
		var cam = $('#cam').val();
		var sort = $('#sort').val();
		$.ajax({
			url: public_path + "/store/product-filter",
			type: 'POST',
			data: {
				type: type,
				branch: branch,
				price: price,
				os: os,
				display: display,
				ram: ram,
				cam: cam,
				sort: sort		
			},
			success: function(data) {
				$('.products').html(data);
			}
		});
	});

	$('.img').click(function() {
		var src = $(this).attr('src');
		$('.image').attr('src', src);
	});

	$('.close').click(function() {
		$('.modal').hide();
	});

	$('.support-bt').click(function(event) {
		$('.chat-box').slideToggle(500);
	});

});