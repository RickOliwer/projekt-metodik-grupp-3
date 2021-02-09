
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

// $(function () {
//     $('.stop-form').on('submit',function (e) {
        
//               $.ajax({
//                 method: 'POST',
//                 url: '../instalight/functions/add-comment.php',
//                 data: $(e.target).serialize(),
//                 success: function (data) {
//                     if(data.code == 200){
//                         console.log(data.message);
//                     }
//                     let datadatafat = JSON.parse(data);
//                     console.log(datadatafat.message);
//                 }
//               });
//               e.preventDefault(); 
//     });
// });


// function stopFormSubmit(e){
//     e.window.focus();
// }

