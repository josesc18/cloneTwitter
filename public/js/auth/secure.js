let token = localStorage.getItem('access_token');

if(token==null){
    window.location.href = "http://127.0.0.1:8000/login";
}

function logout(){
    localStorage.removeItem('access_token');
    window.location.href = "http://127.0.0.1:8000/login";
}