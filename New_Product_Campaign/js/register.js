$(document).ready(function(){
$('.participate').click(function(){
	console.log('here')
    document.getElementById('participate-section').scrollIntoView({ block: 'end',  behavior: 'smooth' });
})
$('.details').click(function(){
    document.getElementById('details-section').scrollIntoView({ block: 'end',  behavior: 'smooth' });
})


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
			data = JSON.parse(data);
			if(data.status==true){
					Swal.fire({
					  title:'Good job!',
					  text:'Check your mail for further instructions',
					  icon:'success',
					  closeOnConfirm:true,

					})
			}else{
				Swal.fire({
					  title:'Error!',
					  text:'Something went wrong',
					  icon:'error',
					  closeOnConfirm:true,
					})
			}
		},
		'error':function(data){
				Swal.fire({
					  title:'Error!',
					  text:'Something went wrong',
					  icon:'error',
					  closeOnConfirm:true,
					})
		}
	})
})

})