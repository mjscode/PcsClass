modules = modules || {};

modules.add = (function () {
    'use strict';

    var addForm = $('#addForm'),
        confirmB = $('#confirmAdd'),
        addBox = $('#addModal'),
        confirmation = $('#confirmModal'),
        confirmBody = $('#confirmBody'),
        closeConfirm = confirmation.find('.close'),
        closeAdd = addBox.find('.close'),
        cancelConfirm = $('#cancelConfirm'),
        cancelAdd = $('#cancelAdd');

    function showConfirmation(name) {
        var paragraph = '<p>You have added Item <strong>' + name + '</strong>successfully!</p>';
        confirmBody.html(paragraph);
        confirmation.modal('toggle');

    }
    function closeConfirmation() {
        confirmBody.empty();
    }
    function cancelButtonEvent() {
        confirmB.off('click');
    }

    /*closeConfirm.click(closeConfirmation);
    closeButton.click(closeConfirmation);*/

    function show(alertDiv, alertRow) {
        addBox.modal('toggle');

        var name = $('#addName').val(),
            unit = $('#addUnit').val(),
            price = $('#addPrice').val(),
            stock = $('#addStock').val() ? $('#addStock').val() : 0,
            categorySelected = $('#addCategory :selected'),
            selectedName = categorySelected.text(),
            selectedValue = categorySelected.val(),

            nameSpan = $('#newName'),
            unitSpan = $('#newUnit'),
            priceSpan = $('#newPrice'),
            stockSpan = $('#newStock'),
            categorySpan = $('#newCategory');

        nameSpan.html(name);
        unitSpan.html(unit ? unit : '<i>(none entered)</i>');
        priceSpan.html(price ? price : '<i>(none entered)</i>');
        stockSpan.html(stock);
        categorySpan.html(selectedName);

        confirmB.on('click', function () {
            $.post("models/addItemModel.php", {
                name: name, unit: unit ? unit : ' ',
                price: price ? price : ' ', stock: stock,
                category: selectedValue
            },
                function () {
                    showConfirmation(name);
                    addForm.trigger('reset');

                }).fail(function (jqxhr) {
                    var response = jqxhr.responseText;
                    alert = $('<div>' +
                        '<strong>Error! </strong>' + response + '</div>'
                    ).appendTo(alertDiv);
                    if (alertRow.is(":hidden")) {
                        alertRow.toggle();
                    }

                });
            cancelButtonEvent();
            addBox.modal('toggle');
        });
        closeAdd.click(cancelButtonEvent);
        cancelAdd.click(cancelButtonEvent);
    }
    return {
        show: show
    };

}());