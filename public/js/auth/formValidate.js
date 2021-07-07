
const apisEndpoint = "http://127.0.0.1:8000/api/";
let token = localStorage.getItem('access_token');
if(token){
    window.location.href = "http://127.0.0.1:8000/home";
}

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

function validateRegister(data) {
    if(data.access_token!=null && data.user!=null){
        console.log('access_token: ' +data.access_token)
        console.log('user: '+JSON.stringify(data.user))
    }else{
        let errorCard = document.getElementById("errors"); 
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