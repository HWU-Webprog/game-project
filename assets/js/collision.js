/**
 * Player 1 is use used as the frame of reference for calculations in the following code
 */


/**
 *  BOUNCE
 * Add Velocities Together
 * Assign this as new velocity for each player in Random Opposite Directions
 */
function bounce(player1, player2){

    diffx = player2.x - player1.x;
    diffy = player2.y - player1.y;
    hyp = Math.sqrt((diffx ^ 2) + (diffy ^ 2));

    if (player1.boostactive) {
        vel = 10;
    }
    else{
        vel = 5;
    }

    player2.vx = vel * (diffx / hyp);
    player2.vy = vel * (diffy / hyp);
    player1.vx = 0 - player2.vx;
    player1.vy = 0 - player2.vy;
}

/**
 * KILL
 * Muder the player not dashing
 * Reset Cooldown?
 */
function kill(player1, player2){
    if (player1.boostactive){
        player2.murder();
        //Send record of kill to database
    }
    else{
        player1.murder();
        //send record of kill to database
    }
}

//Determine whether 2 player's coordinates are intersecting,. return true/false appropriately
function intersects(player1, player2){
  //Assign variables for xs and ys
  x1 = player1.x;
  x2 = player2.x;
  y1 = player1.y;
  y2 = player2.y;
  //Determine whether coordinates lie within bounds of each other
  if((x1 < x2 + 20) && (x1 + 20 > x2) && (y1 < y2 + 20) && (y1 + 20 > y2)){
    return true;
  }
  else{
    return false;
  }
}

/**
 * DETECT COLLISION
 * If one player XOR the other is Dashing
 * KILL
 * else
 * BOUNCE
 */
function hasCollided(player1, player2){
  if( ( intersects(player1, player2) ) ) {
    if((player1.boostActive && !player2.boostActive) || (!player1.boostActive && player2.boostActive)){
      kill(player1, player2);
    }
    else{
      bounce(player1, player2);
    }
  }
}
