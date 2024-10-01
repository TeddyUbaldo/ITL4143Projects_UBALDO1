	/*const form = document.querySelector('form');

 	form.addEventListener('submit' , (e) => {

 		e.preventDefault();

 		const captchaResponse = grecaptcha.getResponse();

 		if(!captchaResponse.length > 0){

 			throw new Error("Captcha not activated");

 		}



 	})*/


	function captchaVerified(){

		var submitBtn = document.querySelector('#submit');
		submitBtn.removeAttribute('disabled');
	}