
$('.like_button').on('click',function(e){
e.preventDefault();
console.log('click');
var $like_panel = $(this).parents('.like_panel');
var user_id = $like_panel.find('#user_id').val();
var post_id = $like_panel.find('#post_id').val();
var status = $like_panel.find('#status').val();

$.ajax({
  type: "POST",
  url: "pages/ajax.php?status="+status,
  data: {
    action: 'toggleLike',
    user_id: user_id,
    post_id: post_id
  },
  cache: false,
  success: function(data){
     console.log(data);
     var count = $like_panel.find('.like_count').attr('data-likes');
  		if (data == 0) {
  			count--;
  			$like_panel.find('#status').val(0);
  			$like_panel.find('.like_count').html(count);
	  		$like_panel.find('.like_count').attr('data-likes',count);
	  		$like_panel.find('.like_button').removeClass('active-like');
  		}else{
  			count++;
  			$like_panel.find('#status').val(1);
  			$like_panel.find('.like_count').html(count);
	  		$like_panel.find('.like_count').attr("data-likes",count);
	  		$like_panel.find('.like_button').addClass('active-like');
  		}

		
  }
});
});