$(document).ready(function(){

$('input').attr('required','required');

$('form').on('submit',function(e){
	e.preventDefault();
	let formData = $('form').serializeArray();
	let data = {};
	$.each(formData,function(){
		data[this.name] = this.value;
	})
	console.log(data);
	$.ajax({
		'type':'POST',
		'url':'db/register.php',
		'data':{'formData':data},
		'success':function(data){
			console.log(JSON.parse(data))
		},
		'error':function(data){
			console.log(JSON.parse(data))
		}
	})
})

})