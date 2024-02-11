//Fully reset the fields of a form + with a confirmation alert 
function reset(formName) {
    //reset form
    if(confirm("Are you sure you want to clear the form? Your information will not be saved if you continue.") == true) {
    document.getElementById(formName).reset();
    }
}