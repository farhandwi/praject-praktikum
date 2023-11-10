const darkMode = document.getElementById("toggleDarkMode");
const judul = document.getElementsByTagName("h1")[0];
const kotak = document.querySelector(".board");
const restartButton = document.getElementById("restartButton");
const statusText = document.getElementById("statusText");
const cells = document.querySelectorAll(".cell");
console.log(statusText);
console.log(restartButton);
console.log(cells);

const WINNING_CONDITIONS = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],
  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],
  [0, 4, 8],
  [2, 4, 6],
];

darkMode.addEventListener("click", function () {
  document.body.classList.toggle("dark-mode");
  judul.classList.toggle("dark-mode");
  console.log();
});

let opsi = ["", "", "", "", "", "", "", "", ""];
let playerSekarang = "X";
let running = false;

initializeGame();

function initializeGame() {
  cells.forEach((cell) => cell.addEventListener("click", cellClicked));
  restartButton.addEventListener("click", restartGame);
  statusText.textContent = `${playerSekarang} bermain`;
  running = true;
}

function cellClicked() {
  const cellIndex = this.getAttribute("cellIndex");

  if (opsi[cellIndex] != "" || !running) {
    return;
  }

  updateCell(this, cellIndex);
  //   changePlayer();
  checkWinner();
}

function updateCell(cell, index) {
  opsi[index] = playerSekarang;
  cell.textContent = playerSekarang;
}

function changePlayer() {
  playerSekarang = playerSekarang == "X" ? "O" : "X";
  statusText.textContent = `${playerSekarang} bermain`;
}

function checkWinner() {
  let roundWon = false;

  for (let i = 0; i < WINNING_CONDITIONS.length; i++) {
    const condition = WINNING_CONDITIONS[i];
    const cellA = opsi[condition[0]];
    const cellB = opsi[condition[1]];
    const cellC = opsi[condition[2]];

    if (cellA == "" || cellB == "" || cellC == "") {
      continue;
    }
    if (cellA == cellB && cellB == cellC) {
      roundWon = true;
      break;
    }
  }
  if (roundWon) {
    statusText.textContent = `${playerSekarang} menang!`;
    running = false;
  } else if (!opsi.includes("")) {
    statusText.textContent = `Seri!`;
    running = false;
  } else {
    changePlayer();
  }
}

function restartGame() {
  playerSekarang = "X";
  opsi = ["", "", "", "", "", "", "", "", ""];
  statusText.textContent = `${playerSekarang} bermain`;
  cells.forEach((cell) => (cell.textContent = ""));
  running = true;
}
