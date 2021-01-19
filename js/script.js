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

function changeEmoji(emoji,t,id){
    const srcPath = "http://localhost:63342/Vanestarre/assets/reaction_";
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