<?php include 'assets/layout/header.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="assets/js/canvas.js"></script>
    <script src="assets/js/draw.js"></script>
    <script src="assets/js/player.js"></script>
    <script src="start.js"></script>
    
    <div id="main">
        <h1>Firehaus</h1>
        <p>Enter username: <input type="text" placeholder="Username" id="USERNAME"></p>
        <p>
            Select character colour:
            <select id="COLOUR">
                <option value="Red">Red</option>
                <option value="Blue">Blue</option>
                <option value="Green">Green</option>
                <option value="Yellow">Yellow</option>
            </select>
        </p>
        <p><button type="button" id="joinGame" onclick="start()">Join </button></p>
        <hr>

        <form action="/auth/profile/profile-view.php" method="GET">
            <p>
                Search for profile: <input type="text" placeholder="Username" name="u">
                <button type="submit">Go</button>
            </p>
        </form>

        <hr>
        <p>
            <a href="https://github.com/HWU-Webprog/game-project" target="_blank" style="text-decoration: none; text-align:center">

            <i class="fab fa-fw fa-github mr"></i>  Open Source!
            </a>
        </p>
    </div>
<?php require 'assets/layout/footer.php'; ?>
