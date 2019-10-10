// Nonfunctional Mock Up

function wizardOfOz() {
    var newMsg = document.createElement("div");
    newMsg.innerHTML = "Hi";
    document.body.appendChild(newMsg);
}

function message (name, msg){
    this.name = name;
    this.timestamp = Date.now();
    this.msg = msg;

    this.out = function(){
        return "("+timestamp+") "+name+": "+msg;
    }
}


//Post Request to Chat Database

// TODO: Collect UserName, TimeStamp, Message
// TODO: Post Above to Database
// TODO: Clear Message from form

//Get Request to check for new messages

// TODO: send TimeStamp with query. User Joined is initial TimeStamp
// TODO: return new messages with TimeStamp and UserName and append to local chat log
