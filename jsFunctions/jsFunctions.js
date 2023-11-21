
// upload form
function openFrom() {
    document.getElementById('upload-display').style.display = 'flex';
}

function closeForm() {
    document.getElementById('upload-display').style.display = 'none';
}




// login pop-up

function openLogin() {
    document.getElementById('login-div').style.display = 'flex';
}

function closeLogin() {
    document.getElementById('login-div').style.display = 'none';
}




//search js
function display() {
    if (document.getElementById('destinationCheckbox').checked == true) {
        document.getElementById('displayDestination').style.display = 'flex';
    }
    if (document.getElementById('flightNumberCheckbox').checked == true) {
        document.getElementById('displayFlight').style.display = 'flex';
    }
    if (document.getElementById('dateCheckbox').checked == true) {
        document.getElementById('displayDate').style.display = 'flex';
    }

}


function disappear() {
    if (document.getElementById('destinationCheckbox').checked == false) {
        document.getElementById('displayDestination').style.display = 'none';
    }
    if (document.getElementById('flightNumberCheckbox').checked == false) {
        document.getElementById('displayFlight').style.display = 'none';
    }
    if (document.getElementById('dateCheckbox').checked == false) {
        document.getElementById('displayDate').style.display = 'none';
    }
}
function refreshPage() {
    location.reload(true);
}