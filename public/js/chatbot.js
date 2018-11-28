$(document).ready(function() {
	$('#send-bt').click(function() {
		send();
	});

	function send() {
		$body = $('#chat-input').val();
		$.ajax({
			url: '../chatbot/send.php',
			type: 'post',
			data: {
				body: $body
			},
			success: function(data) {
				$('#chat-input').val('');
				$('#error').html(data);
				$('.messages').load('../chatbot/mess_log.php');
				$('.messages').animate({
					scrollTop: $('.messages')[0].scrollHeight
				}, 1000);
			}
		});
	}

	
	
	$('.messages').load('../chatbot/mess_log.php');
	//$('.messages').animate({
		//scrollTop: $('.messages')[0].scrollHeight
	//}, 1000);
	$('.messages').on('click', '.bot-bt', function(){
		$('#chat-input').val($(this).text());
		send();
	});
	$('.test-mess').on('click', '.bot-bt', function(){
		$('#chat-input').val($(this).text() + "\n");

	});

	/*
	$.ajaxSetup({cache:false});
	setInterval(function() {
		$('.messages').load('mess_log.php');
	}, 1000);
	*/
});