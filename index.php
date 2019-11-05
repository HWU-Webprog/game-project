<?php require 'assets/layout/header.php'; ?>
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
        <p><a href="https://github.com/HWU-Webprog/game-project" target="_blank" style="text-decoration: none;">
            <i class="fab fa-fw fa-github mr"></i>Open Source!
        </a></p>
    </div>
<?php require 'assets/layout/footer.php'; ?>
