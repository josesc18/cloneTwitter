
const apisEndpoint = "http://127.0.0.1:8000/api/";
let token = localStorage.getItem('access_token');
if(token){
    window.location.href = "http://127.0.0.1:8000/home";
}
if(document.getElementById('btnLogin')!=null){
    document.getElementById('btnLogin').addEventListener("click", function(e) {
        e.preventDefault();
        let form = document.querySelector('#loginForm');
        let data = new URLSearchParams(new FormData(form));
    
        fetch(apisEndpoint+'login',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
            },
            body: data
        })
        .then(response => response.json())
        .then(data => validateLogin(data));
    })
}
if (document.getElementById('btnRegister')!=null){
    document.getElementById('btnRegister').addEventListener("click", function(e) {
        e.preventDefault();
        let form = document.querySelector('#registerForm');
        let data = new URLSearchParams(new FormData(form));
    
        fetch(apisEndpoint+'register',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
            },
            body: data
        })
        .then(response => response.json())
        .then(data => responseRegister(data));
    })
}

function validateLogin(data) {
    if(data.access_token!=null && data.user!=null){
        localStorage.setItem('access_token',data.access_token )
        localStorage.setItem('user',JSON.stringify(data.user))
        window.location.href = "http://127.0.0.1:8000/home";
    }else{
        let errorCard = document.getElementById("errors"); 
        document.getElementById('errors').firstChild.remove();
        document.getElementById("username").classList.add("formInvalidated")
        document.getElementById("password").classList.add("formInvalidated")
        errorCard.classList.add('card-error')
        let errors = data.errors;
        for (const error in data) {
            let nodo = document.createElement("p")
            var newContent = document.createTextNode(`${error}: ${data[error]}`);
            nodo.appendChild(newContent);
            errorCard.appendChild(nodo);
        }
    }
}

function responseRegister(data) {

    let errorCard = document.getElementById("errors"); 
    if(data.code==200){
        alert(data.message)
        window.location.href = "http://127.0.0.1:8000/login";
    }else{
        console.log(data)
        document.getElementById('errors').lastChild.remove();
        document.getElementById("email").classList.add("formInvalidated")
        document.getElementById("username").classList.add("formInvalidated")
        errorCard.classList.add('card-error')
        let errors = data.errors;
        for (const error in errors) {
            let nodo = document.createElement("p")
            var newContent = document.createTextNode(`${error}: ${errors[error]}`);
            nodo.appendChild(newContent);
            errorCard.appendChild(nodo);
        }
    }
}