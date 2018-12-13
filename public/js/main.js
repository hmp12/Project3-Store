$(document).ready(function() {
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});


	var top_height = $(".top-bar").height();
	var lastScroll = 0;
	var menu_show = 1;
	$('#show-top').hide();
	
	$("#me").click(function() {
		$("#me").css({"margin-left": "10vh"})
		$("#qmark").css({"opacity": "0"});
		$("#me_picture").css({"opacity": "1"});
		$("#info").css({"opacity": "1", "transform": "scale(1)", "width": "60vw"});
	});

	// $(window).scroll(function() {
	// 	if ($(window).scrollTop() <= top_height + 2) {
	// 		show_top();
	// 	}
	// 	else {
	// 		hide_top();
	// 		if (lastScroll > $(window).scrollTop()) {
	// 			$(".nar-bar").slideDown();
	// 			$(".sidebar").css({"top": "50px"});
	// 			$(".content-wrapper").css({"padding-top": "50px"});
	// 		}
	// 		else {
	// 			$(".nar-bar").slideUp();
	// 			$(".sidebar").css({"top": "0px"});
	// 			$(".content-wrapper").css({"padding-top": "0px"});
	// 		}
			
	// 	}
	// 	lastScroll = $(window).scrollTop();
	// });

	// $("#hide-side").click(function() {
	// 	if ($(".sidebar").css("width") == "50px") {
	// 		$(".sidebar").animate({width: '250px'}, 500, function() {	
	// 			$(".sidebar li").css({"text-align": "left"});
	// 			$(".sidebar span").show();
	// 		});
	// 		$(".content-wrapper").css({"width": "calc(100% - 250px)", "margin-right": "0px"});
	// 	}
	// 	else {
	// 		$(".sidebar").animate({width: '50px'}, 500, function() {
	// 			$(".content-wrapper").css({"width": "calc(100% - 50px)", "margin-right": "0px"});
	// 			$(".sidebar li").css({"text-align": "center"});
	// 			$(".sidebar span").hide();
	// 		});			
	// 	}
	// })
	$("#hide-top").click(function() {
		top_height /= 2;
		$(this).hide();
		$(".top-bar").slideUp();
		$('#show-top').show();
	});
	$("#show-top").click(function() {
		top_height *= 2;
		$(this).hide();
		$(".top-bar").slideDown();
		$('#hide-top').show();
	});
});

function show_top() {
	$(".top-bar").css({"position": ""});
	$(".nar-bar").css({"position": ""});
	$(".sidebar").css({"position": ""});
	//$(".content-wrapper").css({"padding-top": "0px"});
}
function hide_top() {
	$(".top-bar").css({"position": "fixed", "top": "-48px"});
	$(".nar-bar").css({"position": "fixed", "top": "0px"});
	$(".sidebar").css({"position": "fixed", "top": "50px"});
	//$(".content-wrapper").css({"padding-top": "48px"});
}

function submit_form() {
	document.getElementById("auto_submit").submit();
}

function update_search(input) {
	$.ajax({
		url: public_path + "/store/search",
		type: 'POST',
		data: {
			input: input
		},
		success: function(data) {
			$('.nar-bar #search .dropdown').html(data);
		}
	});
}

function update_user() {
	$.ajax({
		url: public_path + "/store/user",
		type: 'POST',
		data: {

		},
		success: function(data) {
			$('.nar-bar #user .dropdown').html(data);
		}
	});
}


function update_cart() {
	$.ajax({
		url: public_path + "/store/cart",
		type: 'POST',
		data: {

		},
		success: function(data) {
			$('.nar-bar #cart .dropdown').html(data);
			$('.delete').click(function() {
				$confirm = confirm("Are you sure to delete this products from cart?");
				if ($confirm) {
					var id = $(this).val();
					$.ajax({
						url: public_path + "/store/cart/delete",
						type: 'POST',
						data: {
							id: id,
						},
						success: function(data) {
							$('.error').html(data);
							update_cart();
						},
						error: function() {
							alert("Something wrong, please try again");
						}
					});
				}
			});
			$('#btn-purchase').click(function() {
				$.ajax({
					url: public_path + "/store/purchase",
					type: 'GET',
					data: {
		
					},
					success: function(data) {
						$('.modal-body').html(data);
						$('.purchase').show();
					}
				});
				
			});
		}
	});
}

function update_compare() {
	$.ajax({
		url: public_path + "/store/compare-list",
		type: 'GET',
		success: function(data) {
			$('.nar-bar #compare .dropdown').html(data);
			$('.discard').click(function() {
				var id = $(this).val();
				$.ajax({
					url: public_path + "/store/delete-compare",
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
		}
	});
}

function update_noti() {

}