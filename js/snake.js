var x = 200;
const cvs = document.getElementById('snake');
const ctx = cvs.getContext('2d');

//create the unit
const box = 32;

//load images

const ground = new Image();
ground.src = "../img/ground.png";

const foodImg = new Image();
foodImg.src = "../img/food.png";

const snakeHeadImg =  new Image();
//  snakeHeadImg.src = "../img/snakeHead.png";

//create Snake

let snake = [];
snake[0] = {
  x: 9 * box,
  y: 10 * box
}

//create the food

let food = {
  x: Math.floor(Math.random() * 17 + 1) * box,
  y: Math.floor(Math.random() * 15 + 3) * box
}

//create score

let score = 0;

//control the snake

let d;

document.addEventListener('keydown', test);

let lastTime = 0;

// Test if 200 ms are past since the last push of a button
function test(event) {
  console.log(Date.now()-lastTime);

  if (Date.now() - lastTime >= 150) {
    lastTime = Date.now();
    direction(event);
  }
}

function direction(event) {
  let key = event.keyCode;
  if (key == 37 && d != "RIGHT") {
    d = "LEFT";
  } else if (key == 38 && d != "DOWN") {
    d = "UP";
  } else if (key == 39 && d != "LEFT") {
    d = "RIGHT";
  } else if (key == 40 && d != "UP") {
    d = "DOWN";
  }
}


// check collision function
function collision(head, array) {
  for (let i = 0; i < array.length; i++) {
    if (head.x == array[i].x && head.y == array[i].y) {
      return true;
    }
  }
  return false;
}

//draw everything to the canvas

function draw() {

  ctx.drawImage(ground, 0, 0);
  for (let i = 0; i < snake.length; i++) {
    if (i == 0) {
      ctx.fillStyle = "green";
      // ctx.drawImage(snakeHeadImg, snake.x, snake.y);
    } else {
      ctx.fillStyle = "white";
      // ctx.drawImage(snakeImg, snake[i].x, snake[i].y);
    }
    ctx.fillRect(snake[i].x, snake[i].y, box, box);

    ctx.strokeStyle = "red";
    ctx.strokeRect(snake[i].x, snake[i].y, box, box);
  }
  ctx.drawImage(foodImg, food.x, food.y);

  //old head position
  let snakex = snake[0].x;
  let snakey = snake[0].y;

  //wich direction
  if (d == "LEFT") snakex -= box;
  if (d == "UP") snakey -= box;
  if (d == "RIGHT") snakex += box;
  if (d == "DOWN") snakey += box;

  //if the snake eats the food
  if (snakex == food.x && snakey == food.y) {
    score++;
    x -= 10
    food = {
      x: Math.floor(Math.random() * 17 + 1) * box,
      y: Math.floor(Math.random() * 15 + 3) * box
    }
  } else {
    snake.pop();
  }

  //add new head

  let newHead = {
    x: snakex,
    y: snakey
  }
  // game over

  if (snakex < box || snakex > 17 * box || snakey < 3 * box || snakey > 17 * box || collision(newHead, snake)) {
    clearInterval(game);
  }

  snake.unshift(newHead);

  ctx.fillStyle = "white";
  ctx.font = "42px Lato";
  ctx.fillText(score, box * 2, box * 1.6);
}

//call draw function every ms

let game = setInterval(draw, x);
