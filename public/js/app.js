let currentPage= 0;
let lastPage=0;
const tokenBearer = localStorage.getItem('access_token');
const user = localStorage.getItem('access_token');

const nodo = '';

window.addEventListener("scroll",function(){
    if(window.scrollY + window.innerHeight >=document.documentElement.scrollHeight){
        if(lastPage != currentPage){
            infiniteScroll()
        }
    }
});

function loadNodo(id){
    this.nodo =  document.getElementById(id)
}

function infiniteScroll(){
    let endpoint = "http://127.0.0.1:8000/api/tweet?page"+currentPage
    getTweets(endpoint)
}

function onLoad(){
    fetch('http://127.0.0.1:8000/api/tweet',{
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${tokenBearer}`
        }
    })
    .then(response => response.json())
    .then(data => loadData(data));
}

function getTweets(endpoint){
    currentPage+= 1;
    let tweetEndpoint  =endpoint+currentPage;
    fetch(tweetEndpoint,{
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
                <b>Full Name</b><span class="gray">@username</span>
                <br>
                <p> ${tweets[i]['tweet']} </p> 
            </div>
        </div>
                `
        this.nodo.innerHTML +=htlm;
    }

 }