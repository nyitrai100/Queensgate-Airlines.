// update crew member dinamically 

    function updateCrewMembers() {
        var crewNumbers = document.getElementById("crewNumbers").value;

        if (crewNumbers === '') {
            alert("You have to select at least one Crew member");
            return;
        } else {
            var crewMembersContainer = document.getElementById("crewMembersContainer");
            crewMembersContainer.innerHTML = "";

            for (var i = 0; i < crewNumbers; i++) {
                var crewDiv = document.createElement("div");
                crewDiv.id = "crewdiv" + (i + 1);

                // First Name
                var firstNameLabel = document.createElement("label");
                firstNameLabel.textContent = (i + 1) + ".First Name ";
                var firstNameInput = document.createElement("input");
                firstNameInput.type = "text";
                firstNameLabel.id= "firstNameLabel" + (i + 1);
                firstNameInput.id = "firstName" + (i + 1);
                firstNameInput.name = "firstName" + (i + 1);
                firstNameInput.required = true;

                // Append first name elements to crewDiv
                crewDiv.appendChild(firstNameLabel);
                crewDiv.appendChild(firstNameInput);

                // Last Name
                var lastNameLabel = document.createElement("label");
                lastNameLabel.textContent = (i + 1) + ".Last Name ";
                var lastNameInput = document.createElement("input");
                lastNameInput.type = "text";
                lastNameLabel.id= "lastNameLabel" + (i + 1);
                lastNameInput.id = "lastName" + (i + 1);
                lastNameInput.name = "lastName" + (i + 1);
                lastNameInput.required = true;

                // Append last name elements to crewDiv
                crewDiv.appendChild(lastNameLabel);
                crewDiv.appendChild(lastNameInput);

                // Append crewDiv to crewMembersContainer
                crewMembersContainer.appendChild(crewDiv);
            }
        }
    }

    function validateForm() {
        var crewNumbers = document.getElementById("crewNumbers").value;

        if (crewNumbers === '') {
            alert("You have to select at least one Crew member");
            return false;
        }

        return true; 
    }
