$(document).ready(function() {
	//$('#logo').css({'background-color': '#7f7f7f'});

	//update_user();
	//update_cart();
	//update_noti();

	$('#table').DataTable();

	if ($("#revenueChart").length) {
		var ctx = $("#revenueChart");
		var revenueChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				datasets: [{
					label: 'million dong',
					data: revenue,
					backgroundColor: "rgba(2,117,216,0.2)",
					borderColor: "rgba(2,117,216,1)",
					borderWidth: 1,
					pointRadius: 5,
					pointBackgroundColor: "rgba(2,117,216,1)",
					pointBorderColor: "rgba(255,255,255,0.8)",
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(2,117,216,1)",
					pointHitRadius: 50,
					pointBorderWidth: 2,
				}]
			},
			options: {
				scales: {
					xAxes: [{
						time: {
						unit: 'date'
						},
						gridLines: {
						display: false
						},
						ticks: {
						maxTicksLimit: 7
						}
					}],
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	}

	$('#url').focus(function() {
		$(this).val($('#title').val().trim().toLowerCase().replace(/ /g, '-'));
	});
	$('#tags').tagsinput({
		maxTags: 3,
		trimValue: true
	});
	
	$('.bootstrap-tagsinput input').focus(function() {
		$(this).val($('#title').val().trim().toLowerCase().replace(/ /g, ','));
	});

	$('textarea').froalaEditor({
		theme: 'custom',
		heightMin: 100,
		heightMax: 500,
		quickInsertTags: ['']
	});

	$('input[type="checkbox"]:eq(0)').change(function() {
		$('input[type="checkbox"]').prop('checked',$(this).prop('checked'));
	});
	$('#back').click(function() {
		location.replace(public_path + "/admin/" + $(this).val());
	});
	$('#add').click(function() {
		location.replace(public_path + "/admin/" + $(this).val() + "/add");
	});
	$('.subProducts #add').click(function() {
		location.replace( window.location.pathname + "/add");
	});
	$('#reload').click(function() {
		location.reload();
	});
	$('#delete').click(function() {
		$confirm = confirm("Are you sure to delete all selected " + tab + "?");
		if ($confirm) {
			var ids = [];
			$('input[type="checkbox"]:checkbox:checked').each(function(i) {
				ids[i] = $(this).val();
			});
			if (ids.length == 0) {
				alert("Nothing selected to delete");
			}
			else {
				$.ajax({
					url: public_path + "/admin/" + $('#add').val() + "/delete",
					type: 'POST',
					data: {
						ids: ids,
					},
					success: function(data) {
						$('.error').html(data);
					},
					error: function() {
						alert("Something wrong, please try again");
					}
				});
			}
			location.reload();
		}
	});

	//$('.edit').click(function() {
	$('tbody').on('click', '.edit', function () {
		var id = [];
		id = $(this).val();
		location.replace(public_path + "/admin/" + $('#add').val() + '/edit/' + id);
	});

	//$('.delete').click(function() {
	$('tbody').on('click', '.delete', function () {
		$confirm = confirm("Are you sure to delete this " + tab + "?");
		if ($confirm) {
			var id = [];
			id = $(this).val();
			$.ajax({
				url: public_path + "/admin/" + $('#add').val() + "/delete",
				type: 'POST',
				data: {
					ids: id,
				},
				success: function(data) {
					$('.error').html(data);
				},
				error: function() {
					alert("Something wrong, please try again");
				}
			});
			location.reload();
		}
	});
	
	$('#up_img').change(function() {
		var length = $(this)[0].files.length;
		var img, src;
		for (var i=1; i<length; i++) {
			src = URL.createObjectURL($(this)[0].files[i]);
			img = "<img src='" + src + "' height='200px'>";
			$('#pre_img').after(img);
		}
		src = URL.createObjectURL($(this)[0].files[0]);
		$('#pre_img').attr("src", src);	
	});

	$('.image').click(function() {
		$('.image').not(this).removeClass("clicked");
		$(this).toggleClass("clicked");

	});

	$('#ch_img').click(function() {
		$.ajax({
			url: public_path + "/admin/photo-choose",
			type: 'GET',
			data: {

			},
			success: function(data) {
				$('.modal-body').html(data);
			},
			error: function() {
				alert("Something wrong, please try again");
			}
		});
		$('.modal').show();
	});

	$('#choose').click(function() {
		var choice = $('input[type="checkbox"]:checkbox:checked:eq(0)');
		var id = choice.val();
		if (id == null) {
			alert("Nothing selected");
		}
		else {
			var src = choice.parent('.img_box').children('.image').attr('src');
			$('#pre_img').attr("src", src);
			$('#cover').val(src);
			$('.modal').hide();
			$('.pre_img').remove();
			$('.cover').remove();
			$('.add input[type="checkbox"]:checkbox:checked').each(function(i) {
				$('#pre_img').attr("height", '150px');
				src = $(this).parent('.img_box').children('.image').attr('src');
				var imgId = $(this).val();
				console.log(imgId);
				input = "<input type=\"text\" name=\"imgIds[]\" value='" + imgId + "' class=\"hidden cover\">";
				img = "<img src='" + src + "' height='100px' class=\"pre_img\">";
				$('#pre_img').before(input);
				$('#pre_img').after(img);
			})
		}
		
	});

	$('#remove').click(function() {
		$('#pre_img').attr("src", public_path + '/img/default.png');
		$('#pre_img').attr("height", '200px');
		$('.pre_img').each(function(i) {
			$(this).remove();
		})
		$('#cover').val(null);
	});

	$('.close').click(function() {
		$('.modal').hide();
	});

	
});