
let toggleComments = document.querySelectorAll('.toggle-comments');
let commentsBox = document.querySelectorAll('.comments-box');

collapseToggle(toggleComments, commentsBox);


// let form = document.querySelector(".stop-form");

// form.onclick = stopFormSubmit;


// $("stop-form").submit(function(event){
//     event.preventDefault();

//     let inputComment = document.querySelector(".input-comments").value

//     $.post("../home.php", {inputComment:inputComment}, function(data){
//         console.log(data);
//     })
// })