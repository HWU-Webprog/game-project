// Nonfunctional Mock Up

function wizardOfOz() {
    var newMsg = document.createElement("div");
    newMsg.innerHTML = "Hi";
    document.body.appendChild(newMsg);
}

//Data Type for message
function Message (name, msg){
    this.name = name;
    this.timestamp = Date.now();
    this.msg = msg;

    this.out = function(){
        return "("+timestamp+") "+name+": "+msg;
    }
}

//Queue's messages server side
function msgqueue(){
    this.q = [];

    this.enqueue = function(Message){
        q.push(Message);
    }

    this.dequeue = function(){
        q.shift();
    }
}

//Post Request to Chat Database

// TODO: Collect UserName, TimeStamp, Message
// TODO: Post Above to Database
// TODO: Clear Message from form

//Get Request to check for new messages

// TODO: send TimeStamp with query. User Joined is initial TimeStamp
// TODO: return new messages with TimeStamp and UserName and append to local chat log
