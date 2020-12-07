const btn__login = $(".btn__login");
const btn__register = $(".btn__register");
const form__login = $(".form-login");
const form__register = $('.form-register');

btn__login.on('click',function() {
	form__login.show();
	form__register.hide();
	localStorage.setItem("register", '');
})
btn__register.on('click',function() {
	form__register.show();
	form__login.hide();
	localStorage.setItem("register", true);
})

if (localStorage.getItem('register')) {
	form__register.show();
	form__login.hide();
}
if (!localStorage.getItem('register')) {
	form__login.show();
	form__register.hide();
}