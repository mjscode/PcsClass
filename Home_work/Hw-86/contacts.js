/*global $*/
(function () {
    "use strict";
    var contactTable = $("#contactTable tbody"),
        contacts = [];
    function addContact(contact) {
        contacts.push(contact);

        if (contacts.length === 1) {
            contactTable.empty();
        }

        contactTable.append(
            '<tr>' +
            '<td>' + contact.firstName + '</td>' +
            '<td>' + contact.lastName + '</td>' +
            '<td>' + contact.email + '</td>' +
            '<td>' + contact.phone + '</td>' +
            '</tr>'

        );
    };
    var firstNameInput = $("#first");
    var lastNameInput = $("#last");
    var emailInput = $("#email");
    var phoneInput = $("#phone");
    var addContactForm = $("#addContactForm");

    function hideAddContactForm() {
        addContactForm.slideUp();
        addContactForm[0].reset();
    }

    addContactForm.on("submit", function (event) {
        var newContact = {
            firstName: firstNameInput.val(),
            lastName: lastNameInput.val(),
            email: emailInput.val(),
            phone: phoneInput.val()
        };
        addContact(newContact);
        hideAddContactForm();
        event.preventDefault();
    });
    $("#cancel").click(hideAddContactForm);

    $("#add").click(function () {
        addContactForm.slideDown();
    });

    var theFilenameInput = $('#filename'),
        errorElement = $('#error');

    $('#loadForm').submit(function (event) {
        var fileToLoad = theFilenameInput.val();
        errorElement.hide();
        $.getJSON(fileToLoad, function (loadedFile) {
            loadedFile.forEach(function (jstring) {
                /*var asjsonString = JSON.stringify(jstring)
                var jsObject = JSON.parse(asjsonString);
                addContact(jsObject);*/
                addContact(jstring);
            });
        }).fail(function (jqxhr, status, statusText) {
            errorElement.text("Failed to load file: " + jqxhr.status + " " + statusText);
            errorElement.show();
        });
        event.preventDefault();
    });
}());
