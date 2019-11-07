<?php $db = new SQLite3('database.sqlite', SQLITE3_OPEN_CREATE | SQLITE3_OPEN_READWRITE);

require '../assets/layout/header.php'; ?>
    <div id="leftWrapper">
        <div class="imageContainer" id="profileImageContainer">
            <!--Javascript to set the image to what was saved-->
            <img src="../assets/img/Woolooloo.jpg" alt="ProfilePic">
            <div class="editButton" id="profileImageContainerEdit">
                <img src="../assets/img/edit-button-512.png" alt="Edit Image">
                <!--Javascript to Change the image-->
            </div>
        </div>

        <div class="textDiv" id="profileDescription">
                <!--User-created description or should we do something more rigid?-->
                Lorem ipsum dolor sit amet consectetur adipiscing elit consequat, nibh fusce est imperdiet fames vehicula fringilla natoque lobortis, facilisis accumsan praesent feugiat etiam interdum himenaeos. Cras aliquet placerat pharetra est ullamcorper auctor torquent sociosqu, natoque duis fermentum posuere cubilia mauris nullam eget ultrices, proin mollis sagittis lacinia massa consequat etiam.
                Nisl felis volutpat a aliquam elementum nullam eget augue auctor hac, lacinia curae purus montes sapien sociosqu per suspendisse natoque, nam potenti ut nulla in pellentesque donec varius tincidunt. Ligula laoreet ridiculus tempor donec montes varius class aptent nec eget, aliquam eu fusce velit ut tristique porttitor lacinia venenatis vulputate, facilisis pharetra iaculis tempus fringilla litora dignissim elementum platea.
                Litora habitant interdum laoreet viverra ante sodales ullamcorper suscipit, est sociosqu inceptos pretium torquent platea mauris, at morbi in libero habitasse imperdiet bibendum. Auctor lacus feugiat euismod viverra orci vel litora, himenaeos gravida risus velit vestibulum nulla sodales, elementum semper purus justo dignissim luctus. Velit aliquet lobortis sapien condimentum suscipit vivamus, tortor litora sem pulvinar in enim convallis, tellus mattis himenaeos et aenean gravida, lectus morbi arcu posuere dis.
            <div class="editButton" id="profileDescriptionEdit">
                <img src="../assets/img/edit-button-512.png" alt="Edit Description">
                <!--Javascript to Edit the description-->
            </div>
        </div>
    </div>

    <div id="rightWrapper">
        <div class="textDiv" id="profileHeader">
            USERNAME HERE | Wins: 1 | Average Position: 38
            <!--Javascript here to fetch data-->
        </div>

        <div class="logContainer" id="profileLogContainer">
            <!--Insert Javascript to create .log classes for games played from the user's data-->
            <div class="log">
                Position: #34 | Kills: 12 | Killed By: Smart Cookie
            </div>
            <div class="log">
                    Position: #64 | Kills: 1 | Killed By: Smart Cookie
            </div>
            <div class="log">
                    Position: #2 | Kills: 7 | Killed By: Smart Cookie
            </div>
            <div class="log">
                Position: #1 | Kills: 43 | VICTORY
            </div>
        </div>
    </div>

<?php require '../assets/layout/footer.php'; ?>
