let count = 0;
let timeLeft = 10;
let timerId;
let autoClicker = false;

const scoreEl = document.getElementById("score");
const messageEl = document.getElementById("message");
const timerEl = document.getElementById("timer");
const clickBtn = document.getElementById("clickBtn");
const minusBtn = document.getElementById("minusBtn");
const buyAutoBtn = document.getElementById("buyAuto");

//  Auktalizacja wyniku
function updateScore() {
    scoreEl.textContent = "Wyniki" + count;

    if (count === 10)  {
        messageEl.textContent = "Gratulacje masz 10 punktów";
    } else if (count === 50) {
        messageEl.textContent = "OMG 50 PUNKTÓW";
    }
}

// Losowy kolor
function randomColor() {
    return "#" + Math.floor(Math.random() * 16777215).toString(16);
}

//  Klikanie +1
clickBtn.addEventListener("click", ()  => {
    count++;
    updateScore();
    clickBtn.style.backgroundColor = randomColor();
});

// klikanie -1
minusBtn.addEventListener("click",  ()    =>  {
    count--;
    updateScore();
    minusBtn.style.backgroundColor = randomColor();
});