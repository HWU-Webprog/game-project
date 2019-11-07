<?php require 'vendor/autoload.php'; ?>

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
        <p><button type="button" onclick="createplayer()">Join </button></p>
        <hr>

        <form action="/auth/profile.php" method="GET">
            <p>
                Search for profile: <input type="text" placeholder="Username" name="u">
                <button type="submit">Go</button>
            </p>
        </form>

        <hr>
        <p><a href="https://github.com/HWU-Webprog/game-project" target="_blank" style="text-decoration: none;">
            <i class="fab fa-fw fa-github mr"></i>Open Source!
        </a></p>
    </div>
<?php require '../assets/layout/footer.php'; ?>
