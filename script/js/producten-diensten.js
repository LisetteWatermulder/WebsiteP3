function createPopupBox(BoxTitle, BoxText) {

    // Create the close button
    const popupboxClose = document.createElement("span")
    popupboxClose.className = "PopupboxClose"
    popupboxClose.innerHTML = "&times"

    // Change the background color when the mouse hovers over
    popupboxClose.addEventListener('mouseover', () => {
        popupboxClose.style.backgroundColor = "rgb(233, 121, 121)"
    });

    // Change the background color back when the mouse leaves
    popupboxClose.addEventListener('mouseout', () => {  
        popupboxClose.style.backgroundColor = "rgb(243, 65, 65)";
    });

    // Create the title
    const popupboxTitle = document.createElement("h1")
    popupboxTitle.className = "PopupboxTitle"
    popupboxTitle.innerText = BoxTitle

    // Create the text paragraph
    const popupboxText = document.createElement("p")
    popupboxText.innerText = BoxText

    // Create the content container
    const popupboxInnerContainer = document.createElement("div")
    popupboxInnerContainer.className = "PopupboxInnerContainer"
    popupboxInnerContainer.appendChild(popupboxClose)
    popupboxInnerContainer.appendChild(popupboxTitle)
    popupboxInnerContainer.appendChild(popupboxText)

    // Create the outer part
    const popupboxOuterContainer = document.createElement("div")
    popupboxOuterContainer.className = "PopupboxOuterContainer"
    popupboxOuterContainer.id = "Popupbox"
    popupboxOuterContainer.appendChild(popupboxInnerContainer)

    // Add the just created code to the body, so the popupbox will appear
    document.body.appendChild(popupboxOuterContainer)

    // Close the popupbox if the user clicks on the close button
    popupboxClose.addEventListener("click", () => {  
        popupboxOuterContainer.remove()
    })

    // Close the popupbox if the user anywhere around the popupbox
    window.addEventListener("click", (e) => {  

        const popupBox = document.getElementById("Popupbox")
        if (e.target === popupBox) {
            popupboxOuterContainer.remove()
        }

    })

    // Test if all the styles are used. Throw a warning if it isn't used as without style it won't look correct
    let productParts = ["PopupboxOuterContainer", "PopupboxInnerContainer", "PopupboxClose", "PopupboxTitle"]
    productParts.forEach(part => {

        if (testStyleExists(part) == false) {
            console.warn(`The style '${part}' could not be found. It's recommended that you style this class because it won't look correct if you don't.`)
        }
        
    })

}