function act() {

//$(".ic#ICONE").html(SVG_CODE);

    $(".ic#heart").html('<svg xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" viewBox="0 0 512 512" focusable="false" data-prefix="fal" data-icon="heart"><path fill="currentColor" d="M 462.3 62.7 c -54.5 -46.4 -136 -38.7 -186.6 13.5 L 256 96.6 l -19.7 -20.3 C 195.5 34.1 113.2 8.7 49.7 62.7 c -62.8 53.6 -66.1 149.8 -9.9 207.8 l 193.5 199.8 c 6.2 6.4 14.4 9.7 22.6 9.7 c 8.2 0 16.4 -3.2 22.6 -9.7 L 472 270.5 c 56.4 -58 53.1 -154.2 -9.7 -207.8 Z m -13.1 185.6 L 256.4 448.1 L 62.8 248.3 c -38.4 -39.6 -46.4 -115.1 7.7 -161.2 c 54.8 -46.8 119.2 -12.9 142.8 11.5 l 42.7 44.1 l 42.7 -44.1 c 23.2 -24 88.2 -58 142.8 -11.5 c 54 46 46.1 121.5 7.7 161.2 Z" /></svg>');



    $(".ic#heart-fill").html('<svg xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" viewBox="0 0 512 512" focusable="false" data-prefix="fas" data-icon="heart"><path class="" fill="currentColor" d="M 462.3 62.6 C 407.5 15.9 326 24.3 275.7 76.2 L 256 96.5 l -19.7 -20.3 C 186.1 24.3 104.5 15.9 49.7 62.6 c -62.8 53.6 -66.1 149.8 -9.9 207.9 l 193.5 199.8 c 12.5 12.9 32.8 12.9 45.3 0 l 193.5 -199.8 c 56.3 -58.1 53 -154.3 -9.8 -207.9 Z" /></svg>');
}

$('#adherer').click(function(event) {
    let id=$(this).prop('id');
    let ideaID = event.target.dataset['ideaId'];
    let countAdhesions = document.getElementById('adhesions');
    join(true, ideaID);
    countAdhesions.innerText = parseInt(countAdhesions.innerText) + 1 + " Adhésions";
    $(this).attr('disabled','disabled');
});



$('.fl').click(function(event) {
    let id=$(this).prop('id');
    let ideaID = event.target.parentNode.parentNode.parentNode.dataset['ideaId'];
    if(id.includes("-fill")){
        ideaID = event.target.parentNode.parentNode.parentNode.parentNode.dataset['ideaId'];
    }
    let isLogin = event.target.parentNode.dataset["noUser"];
    let countLike = document.getElementById('like-count-'+ideaID);
    if(!countLike) return;
    if(!isLogin) {
        if (id.includes("-fill")) {
            idAfter = id.replace("-fill", "");
            $(this).attr("id", idAfter);
            countLike.innerText = parseInt(countLike.innerText) - 1 + " ";
            act();
            like(false, ideaID);
        } else {
            id += "-fill";
            $(this).attr("id", id);
            countLike.innerText = parseInt(countLike.innerText) + 1 + " ";
            act();
            like(true, ideaID);
        }
    }else{
        window.location.replace("login/");
    }
});


function like(isLike, ideaID){
    $.ajax({
        method: 'POST',
        url: reactURL+"/"+ideaID+"/react",
        data: {like: isLike, _token: token}
    }).done(function () {

    });
}

function join(isJoin, ideaID){
    $.ajax({
        method: 'POST',
        url: reactURL+"/"+ideaID+"/react",
        data: {join: isJoin, ideaID: ideaID, _token: token}
    });
}

$(act());
