let currentPage= 1;
let lastPage=0;
const tokenBearer = localStorage.getItem('access_token');
const user = localStorage.getItem('access_token');

const nodoTweets = document.getElementById('tweets')

window.addEventListener('load',getTweets())

function onLoad (){
    fetch('http://127.0.0.1:8000/api/tweet',{
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${tokenBearer}`
        }
    })
    .then(response => response.json())
    .then(data => getData(data));
}

function getTweets(){
    currentPage+= 1;
    let tweetEndpoint  ="http://127.0.0.1:8000/api/tweet?page="+currentPage;
    fetch(tweetEndpoint,{
        method: 'get',
        headers: {
            'Accept': 'application/json',
            'Authorization': `Bearer ${tokenBearer}`
        }
    })
    .then(response => response.json())
    .then(data => getData(data));
}

function getData(data){
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
                <span><b>Full Name</b> @username</span>${new Date(tweets[i]['updated_at']).toLocaleDateString()}
                <br>
                <p> ${tweets[i]['tweet']} </p> 
            </div>
        </div>
                `
        nodoTweets.innerHTML +=htlm;
    }

 }