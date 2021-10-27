(function($){
	
	$('.addPanier').click(function(event){
		event.preventDefault();
		$.get($(this).attr('href'),{},function(data){
			if(data.error){
				alert(data.message);
			}else{
				if(confirm(data.message + 'do you want to consult your cart?')){
					location.href = 'p.php';
				}else{
					$('#total').empty().append(data.total);
					$('#count').empty().append(data.count);
				}
			}
		},'json');
		return false;
	});
	
})(jQuery);