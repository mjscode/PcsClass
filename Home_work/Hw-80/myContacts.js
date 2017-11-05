(function () {
    "use strict";
    var contactTable = get("contactTable"),
    start = true; 

    function get(id) {
        return document.getElementById(id);

    }

    function addContact() {
        var fname=get('fname').value;
        var lname=get('lname').value;
        var email=get('email').value;
        var phone=get('phone').value;
        var contact = {
            
            firstName: fname,
            lastName: lname,
            email: email,
            phone: phone
        };
        

        if (start) {
            contactTable.deleteRow(1);
            start=false;
        }

        var row = contactTable.insertRow();
        var firstNameCell = row.insertCell();
        var lastNameCell = row.insertCell();
        var emailCell = row.insertCell();
        var phoneCell = row.insertCell();

        firstNameCell.innerHTML = fname;
        lastNameCell.innerHTML = lname;
        emailCell.innerHTML = email;
        phoneCell.innerHTML = phone;
    }
    get("contactForm").addEventListener("submit", function (event){
        addContact();
        event.preventDefault();
    }
    );
}());