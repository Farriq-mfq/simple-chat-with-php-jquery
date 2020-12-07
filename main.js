$(function() {
	'use strict';
	$(document).on("click","#user_click",function(e) {
		e.preventDefault();
		const id = $(this).data('id');
		$("#org_box").removeClass('col-lg-12');
		$("#org_box").addClass('col-lg-6');
		$("#show__msg__box").show();
		$(".user__name").html($(this).attr('href'))
		$.get('files/getuser.php',{id:id},function(data) {
				$(".info_msg").html(data)
		})
		render()
		$(".info_msg").scrollTop($(".info_msg")[0].scrollHeight);

	})

	$("#send_message").on('submit',function(e) {
		e.preventDefault();
		$.ajax({
			method:'POST',
			url:'files/send.php',
			data:$(this).serialize(),
			success:function(data) {
				$(".info_msg").scrollTop($(".info_msg")[0].scrollHeight);
				$("#send_message")[0].reset()	
			}
		})
	})

	function render() {
		const get = $.get('files/getmsg.php',function(data) {
				$(".info_msg").html(data)
		})

		const timer = setTimeout(function() {
			render()	
		},500)
		$("#close__msg__box").on("click",function() {
			$("#org_box").removeClass('col-lg-6');
			$("#org_box").addClass('col-lg-12');
			$("#show__msg__box").hide();
			get.abort();
			clearTimeout(timer);
		})
	}
	
	getNotif();	
	function getNotif() {
		$('.notif').each(function(key,value) {
			const id = $(this).data('id');
			const thiss = $(this);
			const getperson = $.get('files/getperson.php',{id:id},function(data) {
				const dataJson = JSON.parse(data);
				thiss.html(dataJson.notify);
				thiss.parent().parent().find('.time span').html(dataJson.time);
				if (dataJson.lastmessage != null) {
					if (dataJson.lastmessage.length > 10) {
						thiss.parent().siblings().find('.last__messages').html(dataJson.lastmessage.substr(0,10))
						thiss.parent().siblings().find('.last__messages').append(`...`)
					}else{
						thiss.parent().siblings().find('.last__messages').html(dataJson.lastmessage)
					}
				}
				if (dataJson.activity == 'offline') {
					thiss.parent().find('.activity').removeClass('text-success');
					thiss.parent().find('.activity').addClass('text-danger');
				}else{
					thiss.parent().find('.activity').removeClass('text-danger');
					thiss.parent().find('.activity').addClass('text-success');
				}
				thiss.parent().find('.activity').html(dataJson.activity)
			})
		})
		const timer =setTimeout(getNotif,1500);
		$("#logout").on('click',function() {
			clearTimeout(timer);
			getperson.abort();
			return false;
		})
	}

	$("#search__contact").on('keyup',function() {
		const value = $(this).val();
		let bool = 'false';
		$(".msg__info").each(function() {
			$(this).each(function() {
				if ($(this).text().toLowerCase().indexOf(value.toLowerCase())>=0) {
					bool = 'true';
				}
			})
			if (bool == 'true') {
				$(this).show();
			}else{
				$(this).hide();
			}
		})
	})
})