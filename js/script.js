
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

function changeFilePath(){
    var fileInput = document.getElementById("fileChooser").value;
    var filePath = document.getElementById("filePath");
    var index = fileInput.lastIndexOf('\\') + 1 ;

    if(fileInput === ""){
        fileInput = "Aucun fichier sélectionée";
        filePath.textContent = fileInput;
    }
    else {
        filePath.textContent = fileInput.substring(index);
    }

}

function hideMe(me){
    me.parentNode.style.display = "none";
}


function reaction(_infoId){
    const ajax = new XMLHttpRequest();
    var emojiId = _infoId.id;
    var displayAlert = false ;
    const t = emojiId.substring(0, emojiId.indexOf('_'));
    const id = emojiId.substring(emojiId.indexOf('_') + 1);
    ajax.onload = function (){

    };
    ajax.open("POST", "php/reaction.php",true);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == XMLHttpRequest.DONE) {
            displayAlert =(ajax.responseText.charAt(ajax.responseText.length-1)) ;
            console.log(ajax.responseText);
            if (displayAlert == '1'){
                document.getElementById("alertBitCoin").style.display = "flex";
            }
        }
    };
    var sendText = "t=" + t + "&id="+ id;
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(sendText);
    changeEmoji(_infoId,t,id);
}

function reactionDark(_infoId){
    const ajax = new XMLHttpRequest();
    var emojiId = _infoId.id;
    var displayAlert = false ;
    const t = emojiId.substring(0, emojiId.indexOf('_'));
    const id = emojiId.substring(emojiId.indexOf('_') + 1);
    ajax.onload = function (){

    };
    ajax.open("POST", "php/reaction.php",true);

    ajax.onreadystatechange = function() {
        if (ajax.readyState == XMLHttpRequest.DONE) {
            displayAlert =Boolean(ajax.responseText.charAt(ajax.responseText.length-1)) ;
            if (displayAlert == true){
                document.getElementById("alertBitCoin").style.display = "flex";
            }
        }
    };
    var sendText = "t=" + t + "&id="+ id;
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(sendText);
    changeEmoji(_infoId,t,id);
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


    const parentBox = supprButton.parentNode;
    const ajax = new XMLHttpRequest();

    parentBox.style.display = "none";

    var postId =parentBox.parentElement.id.substring(4);
    //var post = parentBox.parentElement;
    //post.style.display = "none" ;

    ajax.onload = function (){

    };

    ajax.open("POST", "php/delete_message.php",false);

    var sendText = "post_id=" + postId;
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send(sendText);

    reloadPage();
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
    textareaModif.setAttribute("maxlength","50");

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

function editProfil(editBtn){
    var bio = document.getElementById("bio");
    var picture = document.getElementById("profilPictureChange");
    var name = document.getElementById("nameProfil");
    var username = document.getElementById("usernameProfil");
    var mail = document.getElementById("mailProfil");
    var birth = document.getElementById("birthProfil");
    var userInfo = document.getElementById("userInfo");
    var profil = document.getElementById("profil");

    var label = document.getElementById("labelFile");
    var span = document.getElementById("filePath");
    label.style.display = "inline-block";
    span.style.display = "block";

    var newBio = document.createElement("textarea");
    newBio.setAttribute("maxlength", 80);
    newBio.style.resize = "none" ;
    newBio.value = bio.textContent;
    console.log(bio.textContent);
    console.log(newBio.value);
    newBio.name = "description";
    newBio.className = "inputEdit";
    newBio.id = bio.id;
    bio.replaceWith(newBio);

    var newPicture = document.createElement("label");


    var newName = document.createElement("input");
    newName.setAttribute("type","text");
    newName.name = "name";
    newName.value = name.textContent;
    newName.className = "inputEdit";
    name.replaceWith(newName);

    var newUsername = document.createElement("input");
    newUsername.setAttribute("type","text");
    newUsername.setAttribute("title","Caractères inaccentués minuscules et chiffres seulement");
    newUsername.setAttribute("pattern", "[a-z0-9]+");
    newUsername.name = "username";
    newUsername.value = username.textContent;
    newUsername.className = "inputEdit";
    username.replaceWith(newUsername);

    var newMail  =document.createElement("input");
    newMail.setAttribute("type","email");
    newMail.setAttribute("pattern", "^[a-z0-9._%+-]+@[a-z0-9.-]+\\.[a-z]{2,4}$");
    newMail.name = "mail";
    newMail.value = mail.textContent;
    newMail.className = "inputEdit";
    mail.replaceWith(newMail);

    var newBirth = document.createElement("input");
    newBirth.setAttribute("type","date");
    newBirth.value = birth.textContent;
    newBirth.name = "birthdate";
    newBirth.className = "inputEdit";
    birth.replaceWith(newBirth);

    var submit = document.createElement("button");
    submit.setAttribute("type","submit");
    submit.textContent = "Modifier" ;
    submit.className = "sendButton";
    submit.value = "config"
    submit.name = "submit";
    submit.id = "submitProfil";

    userInfo.appendChild(submit);

    editBtn.setAttribute("onclick", "reloadPage()") ;
}

function editConfig(editBtn){
    var nbrPage = document.getElementById("nbrPageConfig");
    var minAlert = document.getElementById("minAlert");
    var maxAlert = document.getElementById("maxAlert");
    var configInfo = document.getElementById("configInfo");

    var newNbrPage = document.createElement("input");
    newNbrPage.setAttribute("type","number");
    newNbrPage.name ="nbr_page";
    newNbrPage.className= "inputConfig";
    newNbrPage.value = nbrPage.textContent;
    nbrPage.replaceWith(newNbrPage);

    var newMinAlert = document.createElement("input");
    newMinAlert.setAttribute("type","number");
    newMinAlert.name ="min_alert";
    newMinAlert.className= "inputConfig";
    newMinAlert.value = minAlert.textContent;
    minAlert.replaceWith(newMinAlert);

    var newMaxAlert = document.createElement("input");
    newMaxAlert.setAttribute("type","number");
    newMaxAlert.name ="max_alert";
    newMaxAlert.className= "inputConfig";
    newMaxAlert.value = maxAlert.textContent;
    maxAlert.replaceWith(newMaxAlert);


    var submit = document.createElement("button");
    submit.setAttribute("type","submit");
    submit.textContent = "Modifier" ;
    submit.className = "sendButtonWhite";
    submit.value = "config"
    submit.name = "submit";
    submit.id = "submitConfig";

    configInfo.appendChild(submit);


    editBtn.setAttribute("onclick","reloadPage()");
}