function SetAutoLogout(Minutes) {

    setTimeout(function() {
        window.location.href = 'account-management/uitloggen.php';
    }, Minutes * 60 * 1000);
    
}

function ToggleEditButton(Id) {

    let parentElement = document.getElementById(Id);
    let values = parentElement.getElementsByTagName('span');
    let inputValues = parentElement.getElementsByTagName('input');

    if (inputValues.length !== 1) {
        return console.error("No inputbox has been detected or more than one is detected")
    }
    else {
        inputValues = inputValues[0]
    }

    for (let i = 0; i < values.length; i++) {
        const value = values[i];

        if (value.style.display === "none") {

            value.style.display = "inherit"
            inputValues.style.display = "none"
            
            if (inputValues.type !== "password") {
                value.innerText = inputValues.value
            }
            
        }
        else {

            value.style.display = "none"
            inputValues.style.display = "inherit"

            inputValues.addEventListener("keydown", function(event) {
                if (event.key === 'Enter') {
                    ToggleEditButton(Id)
                }
            });

        }
        
    }
    
}