//Assignment 4 Question 4 by Camil Bouzidi
//This is the JS code used for the time.

//This is old code from the previous assignment:
/* function expSuggesAppear() {
    resNode = document.getElementById("res");
    dtown = document.getElementById("dtown");
    lowerbound = document.getElementById("50to80").value;
    upperbound = document.getElementById("80to100").value;
    pRange = document.frm.pRange.value;
    if (dtown.checked == true) {
        if ((upperbound == pRange) || (lowerbound == pRange)) {
            resNode.style.visibility = "visible";
        }
        else {
            resNode.style.visibility = "hidden";
        }
    }
    else {
        resNode.style.visibility = "hidden";
    }
    
}*/

function clock() { //Thank you to Pranav C Balan from stackoverflow.com/questions/39418405/making-a-live-clock-in-javascript helping me figure out how to update the clock.
    var dateVar = document.getElementById('dateVar');
    var d = new Date(); //I decided to keep the current format, as my modifications were not working.

    dateVar.innerHTML = d;
}
setInterval(clock, 1000);

function disclaimer(){
    alert("We promise you: our website will never sell or misuse your information. \n We must also mention that the person who built this website is not responsible for any incorrect information.");
}