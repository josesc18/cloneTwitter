let currentPage= 1;
let lastPage=0;
const tokenBearer = localStorage.getItem('access_token');
const user = JSON.parse(localStorage.getItem('user'));
const nodo = '';

window.addEventListener("scroll",function(){
    if(window.scrollY + window.innerHeight >=document.documentElement.scrollHeight){
        if(lastPage >= currentPage){
            infiniteScroll()
        }
    }
});
function makeATweet(data){
    fetch('http://127.0.0.1:8000/api/tweet',{
        method: 'post',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${tokenBearer}`
        },
        body: data
    })
    .then(window.location.href = "http://127.0.0.1:8000/home")

}
function loadNodo(id){
    this.nodo =  document.getElementById(id)
}

function infiniteScroll(){
    let endpoint = "http://127.0.0.1:8000/api/tweet?page="+currentPage
    getTweets(endpoint)
}

function onLoad(){
    infiniteScroll()
}

function getTweets(endpoint){
    fetch(endpoint,{
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${tokenBearer}`
        }
    })
    .then(response => response.json())
    .then(data => loadData(data));
}

function loadData(data){
    lastPage = data["last_page"]
    currentPage = parseInt(currentPage)+1
    renderHtml(data)
}
function renderHtml(data) {
    let tweets = data.data

    for(i in tweets){
        let htlm = `
        <div class="tweets-container">
            <div class="profile-img">
                <img class="profile-img" src="/img/default_profile.png" alt="">
            </div>
            <div class="content-tweet">
                <b>${user['name']} </b><span class="gray">@${user['username']}</span>
                <br>
                <p> ${tweets[i]['tweet']} </p> 
            </div>
        </div>
                `
        this.nodo.innerHTML +=htlm;
    }

 }