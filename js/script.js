
function countChar(){
    var textArea = document.getElementById("writeMessage");
    var countChar = textArea.value.length;
    var spanCount = document.getElementById("countCharMessage");
    spanCount.textContent= countChar + "/50";
}

function displayOption(_dotsImg){
    if (_dotsImg.nextElementSibling.style.display !== "flex"){
        _dotsImg.nextElementSibling.style.display = "flex";
    }
    else{
        _dotsImg.nextElementSibling.style.display =  "none";
    }
}
function darkModeCss(){
     document.getElementById("darkMode").style.display = "none";

     const hrefPath = "http://loicganne.alwaysdata.net/css/home.css";
     var style = document.getElementById("style");
     var emoji = document.getElementsByClassName("postEmoji");
     console.log(style.href);
     if(style.href === hrefPath){
         style.setAttribute("href","css/darkMode.css");
         console.log(emoji[0].src) ;
         for(let i = 0; i < emoji.length ; ++i){
             if (emoji[i].src.indexOf('C') === -1){
                 emoji[i].style.filter = "invert()";
             }
             emoji[i].setAttribute("onclick","reactionDark(this)");
         }
     }else{
         style.setAttribute("href","css/home.css");
         for(let i = 0; i < emoji.length ; ++i){
             if (emoji[i].src.indexOf('C') === -1){
                 emoji[i].style.filter = "none";
             }
             emoji[i].setAttribute("onclick","reaction(this)");
         }
     }
}

function reaction(_infoId){
    const ajax = new XMLHttpRequest();
    var emojiId = _infoId.id;
    const t = emojiId.substring(0, emojiId.indexOf('_'));
    const id = emojiId.substring(emojiId.indexOf('_') + 1);
    ajax.onload = function (){

    };
    ajax.open("POST", "php/reaction.php",true);

    var sendText = "t=" + t + "&id="+ id;
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(sendText);
    changeEmoji(_infoId,t,id);
}

function reactionDark(_infoId){
    const ajax = new XMLHttpRequest();
    var emojiId = _infoId.id;
    const t = emojiId.substring(0, emojiId.indexOf('_'));
    const id = emojiId.substring(emojiId.indexOf('_') + 1);
    ajax.onload = function (){

    };
    ajax.open("POST", "php/reaction.php",true);

    var sendText = "t=" + t + "&id="+ id;
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(sendText);
    changeEmojiDark(_infoId,t,id);
}

function changeEmoji(emoji,t,id){
    const srcPath = "http://loicganne.alwaysdata.net/assets/reaction_";
    const srcPathShort = "assets/reaction_";
    const tabType = ["style","swag","cute","love"];
    let emojiTemp;
    var spanText = emoji.parentElement.nextSibling.textContent;

    switch (t) {
        case '1':

            if (emoji.src === srcPath + "style.png"){
                emoji.src = srcPathShort + "styleColor.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) + 1).toString();
            }
            else{
                emoji.src = srcPathShort + "style.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) - 1).toString();
            }
            for (let i = 1 ; i <= 4; ++i){
                if (i === parseInt(t)) continue;
                emojiTemp = document.getElementById(i+"_"+id);
                if(emojiTemp.src === srcPath + tabType[i-1] + "Color.png"){
                    emojiTemp.src = srcPathShort + tabType[i-1] + ".png";
                    emojiTemp.parentElement.nextSibling.textContent = (parseInt(emojiTemp.parentElement.nextSibling.textContent) - 1).toString();
                }
            }
            break;

        case '2':


            if (emoji.src === srcPath + "swag.png"){
                emoji.src = srcPathShort + "swagColor.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) + 1).toString();
            }
            else{
                emoji.src = srcPathShort + "swag.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) - 1).toString();
            }
            for (let i = 1 ; i <= 4; ++i){
                if (i === parseInt(t)) continue;
                emojiTemp = document.getElementById(i+"_"+id);
                if(emojiTemp.src === srcPath + tabType[i-1] + "Color.png"){
                    emojiTemp.src = srcPathShort + tabType[i-1] + ".png";
                    emojiTemp.parentElement.nextSibling.textContent = (parseInt(emojiTemp.parentElement.nextSibling.textContent) - 1).toString();
                }
            }
            break;

        case '3':

            if (emoji.src === srcPath + "cute.png"){
                emoji.src = srcPathShort + "cuteColor.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) + 1).toString();
            }
            else{
                emoji.src = srcPathShort + "cute.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) - 1).toString();
            }
            for (let i = 1 ; i <= 4; ++i){
                if (i === parseInt(t)) continue;
                emojiTemp = document.getElementById(i+"_"+id);
                if(emojiTemp.src === srcPath + tabType[i-1] + "Color.png"){
                    emojiTemp.src = srcPathShort + tabType[i-1] + ".png";
                    emojiTemp.parentElement.nextSibling.textContent = (parseInt(emojiTemp.parentElement.nextSibling.textContent) - 1).toString();
                }
            }
            break;

        case '4':
            if (emoji.src === srcPath + "love.png"){
                emoji.src = srcPathShort + "loveColor.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) + 1).toString();
            }
            else{
                emoji.src = srcPathShort + "love.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) - 1).toString();
            }
            for (let i = 1 ; i <= 4; ++i){
                if (i === parseInt(t)) continue;
                emojiTemp = document.getElementById(i+"_"+id);
                if(emojiTemp.src === srcPath + tabType[i-1] + "Color.png"){
                    emojiTemp.src = srcPathShort + tabType[i-1] + ".png";
                    emojiTemp.parentElement.nextSibling.textContent = (parseInt(emojiTemp.parentElement.nextSibling.textContent) - 1).toString();
                }
            }
            break;
    }

}


function changeEmojiDark(emoji,t,id){
    const srcPath = "http://loicganne.alwaysdata.net/assets/reaction_";
    const srcPathShort = "assets/reaction_";
    const tabType = ["style","swag","cute","love"];
    let emojiTemp;
    var spanText = emoji.parentElement.nextSibling.textContent;

    switch (t) {
        case '1':

            if (emoji.src === srcPath + "style.png"){
                emoji.src = srcPathShort + "styleColor.png";
                if(emoji.style.filter === "invert()"){
                    emoji.style.filter = "none";
                }
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) + 1).toString();
            }
            else{
                emoji.style.filter = "invert()";
                emoji.src = srcPathShort + "style.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) - 1).toString();
            }
            for (let i = 1 ; i <= 4; ++i){
                if (i === parseInt(t)) continue;
                emojiTemp = document.getElementById(i+"_"+id);
                if(emojiTemp.src === srcPath + tabType[i-1] + "Color.png"){
                    emojiTemp.style.filter = "invert()";
                    emojiTemp.src = srcPathShort + tabType[i-1] + ".png";
                    emojiTemp.parentElement.nextSibling.textContent = (parseInt(emojiTemp.parentElement.nextSibling.textContent) - 1).toString();
                }
            }
            break;

        case '2':

            if (emoji.src === srcPath + "swag.png"){
                emoji.src = srcPathShort + "swagColor.png";
                if(emoji.style.filter === "invert()"){
                    emoji.style.filter = "none";
                }
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) + 1).toString();
            }
            else{
                emoji.style.filter = "invert()";
                emoji.src = srcPathShort + "swag.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) - 1).toString();
            }
            for (let i = 1 ; i <= 4; ++i){
                if (i === parseInt(t)) continue;
                emojiTemp = document.getElementById(i+"_"+id);
                if(emojiTemp.src === srcPath + tabType[i-1] + "Color.png"){
                    emojiTemp.style.filter = "invert()";
                    emojiTemp.src = srcPathShort + tabType[i-1] + ".png";
                    emojiTemp.parentElement.nextSibling.textContent = (parseInt(emojiTemp.parentElement.nextSibling.textContent) - 1).toString();
                }
            }
            break;

        case '3':

            if (emoji.src === srcPath + "cute.png"){
                emoji.src = srcPathShort + "cuteColor.png";
                if(emoji.style.filter === "invert()"){
                    emoji.style.filter = "none";
                }
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) + 1).toString();
            }
            else{
                emoji.style.filter = "invert()";
                emoji.src = srcPathShort + "cute.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) - 1).toString();
            }
            for (let i = 1 ; i <= 4; ++i){
                if (i === parseInt(t)) continue;
                emojiTemp = document.getElementById(i+"_"+id);
                if(emojiTemp.src === srcPath + tabType[i-1] + "Color.png"){
                    emojiTemp.style.filter = "invert()";
                    emojiTemp.src = srcPathShort + tabType[i-1] + ".png";
                    emojiTemp.parentElement.nextSibling.textContent = (parseInt(emojiTemp.parentElement.nextSibling.textContent) - 1).toString();
                }
            }
            break;

        case '4':
            if (emoji.src === srcPath + "love.png"){
                emoji.src = srcPathShort + "loveColor.png";
                if(emoji.style.filter === "invert()"){
                    emoji.style.filter = "none";
                }
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) + 1).toString();
            }
            else{
                emoji.style.filter = "invert()";
                emoji.src = srcPathShort + "love.png";
                emoji.parentElement.nextSibling.textContent = (parseInt(spanText) - 1).toString();
            }
            for (let i = 1 ; i <= 4; ++i){
                if (i === parseInt(t)) continue;
                emojiTemp = document.getElementById(i+"_"+id);
                if(emojiTemp.src === srcPath + tabType[i-1] + "Color.png"){
                    emojiTemp.style.filter = "invert()";
                    emojiTemp.src = srcPathShort + tabType[i-1] + ".png";
                    emojiTemp.parentElement.nextSibling.textContent = (parseInt(emojiTemp.parentElement.nextSibling.textContent) - 1).toString();
                }
            }
            break;
    }
}

function reloadPage(){
    document.location.reload();
}



function supprPost(supprButton){
    const parentBox = modifButton.parentNode;
    const ajax = new XMLHttpRequest();

    var postId =parentBox().parentElement.id.substring(4);

    ajax.onload = function (){

    };

    ajax.open("POST", "php/delete_message.php",true);

    var sendText = "post_id=" + postId;
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(sendText);
}



function modifPost(modifButton){
    const parentBox = modifButton.parentNode;
    parentBox.style.display = "none";

    var postId = parentBox.parentElement.id.substring(4);

    var p = parentBox.nextSibling;
    var formModif = document.createElement("form");
    var textareaModif = document.createElement("textarea");
    var idModif = document.createElement("input");
    var buttonModif = document.createElement("button");

    formModif.setAttribute("method", "post");
    formModif.setAttribute("action","php/modif_message.php");
    formModif.className = "formModif" ;

    textareaModif.value = p.textContent;
    textareaModif.name = "text";

    idModif.value = postId;
    idModif.name = "post_id";
    idModif.style.display = "none";

    buttonModif.textContent = "Modifier";
    buttonModif.className = "sendButton"
    buttonModif.value = "edit";
    buttonModif.name = "editSubmit";
    buttonModif.setAttribute("type","submit");

    p.replaceWith(formModif);
    formModif.appendChild(textareaModif);
    formModif.appendChild(idModif);
    formModif.appendChild(buttonModif);


    modifButton.setAttribute("onclick", "reloadPage()") ;
}