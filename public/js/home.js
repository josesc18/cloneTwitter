
function  validateInput(inputTweet,idbutton){
    let tweetInput = document.getElementById(inputTweet);
    let count = 0;
    let button = document.getElementById(idbutton);
    tweetInput.addEventListener('keyup', function(e){
        let count = tweetInput.value.length
        document.getElementById("valuesCounter").innerText=count;
        if(count > 250){
            button.classList.remove("undisable");
            button.classList.add("disable");
        }else{
            button.classList.remove("disable");
            button.classList.add("undisable");
        }

    })
}
