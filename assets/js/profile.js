function totextarea() {
    var bio = document.getElementById('bio');
    var biotext = bio.innerHTML;
    var parent = bio.parentNode
    parent.removeChild(bio);

    var biotextfield = document.createElement("textarea");
    biotextfield.rows=5;
    biotextfield.cols=50;
    document.getElementById("bioform").prepend(biotextfield);
    biotextfield.innerHTML = biotext;

    document.getElementById("biobutton").style="display:block; margin:auto";

}
