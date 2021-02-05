

let toggleButton = document.querySelectorAll('.toggle-comments');

        for(let i = 0; i < toggleButton.length; i++){
            toggleButton[i].addEventListener('click', function(){
                let commentsBox = document.querySelectorAll('.comments-box');
                for(let j = 0; j < commentsBox.length; j++){
                    if(j === i){
                        if(commentsBox[j].style.display === "block"){
                            commentsBox[j].style.display = "none";
                        } else {
                            commentsBox[j].style.display = "block";
                        }
                    } else {
                        commentsBox[j].style.display = "none";
                    }
                }
                
            

            });
        }
