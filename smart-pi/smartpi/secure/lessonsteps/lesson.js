// let btnWrong = document.querySelectorAll('#w');
// let btnCorrect = document.querySelectorAll('#r');


// for (wrong of btnWrong) {
//     wrong.addEventListener('click', () => btnWrong.style.backgroundColor = '#E04D60');
// }

// btnCorrect.addEventListener('click', () => btnCorrect.style.backgroundColor = '#23d160')


var correctfeedback = document.getElementById("right-hidden");
var incorrectfeedback = document.getElementById("wrong-hidden");
correctfeedback.style.display = "none";
incorrectfeedback.style.display = "none";
var nextstep = document.getElementById("nextstep");
nextstep.style.display = "none";
var complete = document.getElementById("completequiz");


function quizfeedback() {


    var wrongAns = document.getElementsByClassName('wr-bg');
    for (var i = 0; i < wrongAns.length; i++) {
        //if wrong answer is clicked, disable buttons, change their colour and add icons
        nextstep.disabled = false;
        wrongAns[i].disabled = true;
        wrongAns[i].style.backgroundColor = "#E04D60";
        wrongAns[i].insertAdjacentHTML("beforeend", "<i class='fas fa-times quiz-icon'></i>");
    }

    //if wrong answer is clicked, highlight the correct answer, add icon and text explaining the answer
    var rightAns = document.getElementsByClassName('ri-bg')[0];
    var addhtml = document.getElementsByClassName('anstoggle')[0];
    rightAns.style.backgroundColor = "#23d160";
    rightAns.insertAdjacentHTML("beforeend", "<i class='fas fa-check quiz-icon'></i>");
    incorrectfeedback.style.display = "block";
    //remove text
   
    complete.style.display = "none";
    nextstep.style.display = "block";
}

function quizfeedbackR() {
    //if right answer is clicked, disable buttons, change their colour and add icons
    nextstep.disabled = false;
    var rightAns = document.getElementsByClassName('ri-bg')[0];
    var addhtml = document.getElementsByClassName('anstoggle')[0];
    rightAns.style.backgroundColor = "#23d160";
    rightAns.insertAdjacentHTML("beforeend", "<i class='fas fa-check quiz-icon'></i>");
    complete.style.display = "none";
    nextstep.style.display = "block";
    correctfeedback.style.display = "block";

    //loop through incorrect answers and disable the buttons
    var wrongAns = document.getElementsByClassName('wr-bg');
    for (var i = 0; i < wrongAns.length; i++) {
        wrongAns[i].disabled = true;
    }
}

