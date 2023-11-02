    // Display the input field

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

    // Disappear the input field
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
        location.reload(true); // Passing true forces a reload from the server, not the cache
    }