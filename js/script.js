function reaction(_infoId){
    const ajax = new XMLHttpRequest();
    var emojiId = _infoId.id;
    const t = emojiId.substring(0, emojiId.indexOf('_'));
    const id = emojiId.substring(emojiId.indexOf('_') + 1);
    window.alert(t);

    ajax.onload = function (){

    };
    ajax.open("POST", "php/reaction.php",true);

    var sendText = "t=" + t + "&id="+ id;
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(sendText);
}
