const topButtonSignUp = document.querySelector('.topButtonSignUp');
const topButtonLogin = document.querySelector('.topButtonLogin');
const container = document.querySelector('.container');

//disable signup button on small screens
if(window.screen.availWidth<1250){
    document.querySelector('.topButtonSignUp').disabled = 'true'
}

window.addEventListener('resize', function(e){
    // console.log(e.currentTarget.screen.availWidth);
    if(e.currentTarget.screen.availWidth<1250){
        document.querySelector('.topButtonSignUp').disabled = 'true';
    }
})

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


//social signin starts
const facebookSignin = document.querySelector('.facebookSignin');
const googleSignin = document.querySelector('.googleSignin');
const twitterSignin = document.querySelector('.twitterSignin');
const githubSignin = document.querySelector('.githubSignin');
const logoutButton = document.querySelector('.logoutButton');

//firebase
// import { initializeApp } from "https://www.gstatic.com/firebasejs/9.0.1/firebase-app.js";
      
// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyDsToLjFedrODnQ_mSlLCUqsrVFDAUlCQU",
  authDomain: "socialsigninintegration.firebaseapp.com",
  projectId: "socialsigninintegration",
  storageBucket: "socialsigninintegration.appspot.com",
  messagingSenderId: "197742187019",
  appId: "1:197742187019:web:d8ae4f6b0ba7b25fa32d0e"
};
      
// Initialize Firebase
// const app = initializeApp(firebaseConfig);
firebase.initializeApp(firebaseConfig);

const auth = firebase.auth();

googleSignin.addEventListener('click', function(){
    let provider = new firebase.auth.GoogleAuthProvider();

    firebase.auth().signInWithPopup(provider)
    .then((result) => {
        console.log(result.user);
    })
    .catch((error) => {
        console.log(error);
    })
    
})

facebookSignin.addEventListener('click', function(){
    let provider = new firebase.auth.FacebookAuthProvider();

    firebase.auth().signInWithPopup(provider)
    .then((result) => {
        console.log(result);
    })
    .catch((error) => {
        console.log(error);
    })
})

twitterSignin.addEventListener('click', function(){
    console.log("twitter.....");
    let provider = new firebase.auth.TwitterAuthProvider();

    firebase.auth().signInWithPopup(provider)
    .then((result) => {
        console.log(result)
    })
    .catch((error) => {
        console.log(error);
    })
})

githubSignin.addEventListener('click', function(){
    let provider = new firebase.auth.GithubAuthProvider();

    firebase.auth().signInWithPopup(provider)
    .then((result) => {
        // console.log(result);
    })
    .catch((error) => {
        console.log(error);
    })
})

auth.onAuthStateChanged(function(user){
    if(user){
        // console.log('-------------');
        // console.log(user);
        document.querySelector('.box').style.display = '';
        document.getElementById('profilePic').src = `${user.photoURL}`;
        document.getElementById('displayName').innerHTML = `Hello, ${user.displayName}`;
        let email = user.email ? user.email : 'No mail is associated with this account.';
        document.getElementById('displayText').innerHTML = `You should use you registered mail (${email}) for all of our services.`;
        document.querySelector('.container').style.display = 'none';
        document.addEventListener('click', function(e){
            // console.log(e.target);
            // console.log('hhhhhhhhh');

            if(e.target.closest('.logoutButton')){
                // console.log('yayaya');
                auth.signOut();
            }
        })
    }
    else{
        document.querySelector('.container').style.display = '';
        document.querySelector('.box').style.display = 'none';
        // document.querySelector('.box').classList.add('hidden');
    }
});