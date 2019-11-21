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
        player2.killed_by(player1);
    }
    else{
        player1.killed_by(player2);
    }
}

/**
 * DETECT COLLISION
 * If one player XOR the other is Dashing
 * KILL
 * else
 * BOUNCE
 */
