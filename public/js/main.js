function validateEmail() {
    
    let email=document.querySelector('input[name=email]').value;
    let pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;console.log(document.getElementById('login-btn'))
    if(email.match(pattern))
    {    
        
        emailError.innerText="";
        document.getElementById('login-btn').disabled=false;
        document.getElementById('login-btn').style.filter="saturate(100%)";
    }
   else
   {
        document.getElementById('login-btn').disabled=true;
        document.getElementById('login-btn').style.filter="saturate(0%)";
        emailError.innerText="The email address format is incorrect";
   }
    
  }
  
function createAccount ()
{   
    var registerUrl = '/register';
    document.getElementById('auth-form').action=registerUrl;
    document.querySelector('button[type=submit]').style.filter="saturate(0%)";
    emailError.innerText="The email address format is incorrect";
    comfirEmailError.innerText="";
    emailError.innerText="";
    document.getElementsByTagName('form')[0].reset();
    document.querySelector('label[for=password]').innerText="Name";
    document.querySelector('label[for=password]').setAttribute('for','name');

    document.querySelector('input[name=password]').setAttribute('type','text');
    document.querySelector('input[name=password]').setAttribute('name','name');

    document.querySelector('a[onclick="createAccount()"]').innerText="I already create an account";

    document.querySelector('button[name=signMeIn]').innerText="Sign Up";
    document.querySelector('button[name=signMeIn]').setAttribute("name","signMeUp");

    document.querySelector('a[onclick="createAccount()"]').setAttribute("onclick","alrMember()")

    fullName.innerHTML=`<label for="password" class="MyLabels">Password</label><br><input type="password" name="password" class="MyInputs">`;
    document.getElementById('LoginformContainer').style.height="450px";   

}
function alrMember()
{   
    var registerUrl = '/login';
    document.getElementById('auth-form').action=registerUrl;
    document.querySelector('button[type=submit]').style.filter="saturate(0%)";
    emailError.innerText="The email address format is incorrect";
    fullName.innerHTML="";
    comfirEmailError.innerText="";
    emailError.innerText="";
    document.getElementsByTagName('form')[0].reset();
    document.querySelector('label[for=name]').innerText="PASSWORD";
    document.querySelector('label[for=name]').setAttribute('for','password');
    
    document.querySelector('input[name=name]').setAttribute('type','password');
    document.querySelector('input[name=name]').setAttribute('name','password');
    document.querySelector('input[name=password]').removeAttribute('oninput');

    document.querySelector('a[onclick="alrMember()"]').innerText="Create an account";

    document.querySelector('button[name=signMeUp]').innerText="Sign In";
    document.querySelector('button[name=signMeUp]').setAttribute("name","signMeIn");

    document.querySelector('a[onclick="alrMember()"]').setAttribute("onclick","createAccount()");

    document.getElementById('LoginformContainer').style.height="370px";
}

function showactions(element){
    let MyElement=element;
    MyElement.children[3].style.visibility="visible";
    MyElement.style.backgroundColor="#d9d9d9";
}
function hideactions(element){
    let MyElement=element;
    MyElement.children[3].style.visibility="hidden";
    MyElement.style.backgroundColor="white";
}
function fillEditCategory(id,name){
    document.getElementById('categoryInput').value=name;
    document.getElementById('exampleModalLabel').innerText=name;
    document.getElementById('categoryCrud').action=`/edit-category/${id}`;
}