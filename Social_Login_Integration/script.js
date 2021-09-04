const topButtonSignUp = document.querySelector('.topButtonSignUp');
const topButtonLogin = document.querySelector('.topButtonLogin');
const container = document.querySelector('.container');

topButtonSignUp.addEventListener('click', function(){
    container.classList.add('active');
    document.querySelector('.signInSection').classList.add('hidden');
    document.querySelector('.signUpSection').classList.remove('hidden');
    document.querySelector('.signUpSection').classList.add('active');
    document.querySelector('.topSignUpText').classList.add('active');
    document.querySelector('.bottomSignUpImage').classList.add('active');
    document.querySelector('.topLoginText').classList.add('login');
    document.querySelector('.topLoginText').classList.add('login');
    document.querySelector('.bottomLoginImage').classList.add('login');

});
topButtonLogin.addEventListener('click', function(){
    container.classList.remove('active');
    document.querySelector('.signInSection').classList.remove('hidden');
    document.querySelector('.signUpSection').classList.add('hidden');
    document.querySelector('.signUpSection').classList.remove('active');
    document.querySelector('.topSignUpText').classList.remove('active');
    document.querySelector('.bottomSignUpImage').classList.remove('active');
    document.querySelector('.topLoginText').classList.remove('login');
    document.querySelector('.topLoginText').classList.remove('login');
    document.querySelector('.bottomLoginImage').classList.remove('login');

});

