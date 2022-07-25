const patterns = {
    name: /^[a-zA-Z]{3,20}$/i,
    email: /^([a-z0-9\.-]+)@([a-z0-9-]+)\.([a-z]{2,8})(\.[a-z]{2,8})?$/,
    phone: /^[0-9]{11}$/i
};

// this function is used to validate the specific field of the form
function validate(field) {
    if (patterns[field.name].test(field.value)) {
        field.className = "valid-field";
    } else {
        field.className = "invalid-field";
    }
};

let textArea = document.getElementById("message");

textArea.onkeypress = function(event) {
    let message_length = textArea.value.length;
    let counter = document.getElementById("num_of_chars");

    if (message_length <= 150) counter.innerHTML = `${message_length} out of 150`;
    else {
        event.preventDefault();
    }
};