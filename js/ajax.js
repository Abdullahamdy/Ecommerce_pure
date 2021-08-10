


var log = console.log;
$('form').submit(function(event){
	event.preventDefault();

var name = $('input[name="name"]').val();
var phone = $('input[name="phone"]').val();
var email = $('input[name="email"]').val();
var message = $('textarea').val();

	// console.log(name , phone , email , message);

	// $('.res').hide();

if(!name) {
		$('input[name="name"]').attr('placeholder' , 'name can`t be empty').addClass('alert');
	}

if (!phone) {

	$('input[name="phone"]').attr('placeholder','the phone cant to be empty').addClass('alert');
}
if (!email) {
	$('input[name= "email"]').attr('placeholder','the email cant to be empty').addClass('alert');
}
if (!message) {
	$('textarea').attr('placeholder','the message cant to be empty').addClass('alert');
}
if (name&&phone&&email&&message) {
	$.post('admin/functions/insermassage.php',{
	Name : name,
	Phone: phone,
	Email:email,
	Message:message	
	},function(data){
       $('.res').show().html(data);
        $('form').trigger('reset');
        console.log(data)
	})
}

})