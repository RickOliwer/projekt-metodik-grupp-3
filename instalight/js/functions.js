
function collapseToggle(toggleButton, contant){
    for(let i = 0; i < toggleButton.length; i++){
        toggleButton[i].addEventListener('click', function(){
            for(let j = 0; j < contant.length; j++){
                if(j === i){
                    if(contant[j].style.maxHeight){
                        contant[j].style.maxHeight = null;
                    } else {
                        contant[j].style.maxHeight = contant[j].scrollHeight + "px";
                    }
                } else {
                    contant[j].style.maxHeight = null;
                }
            }
        });
    }
}

