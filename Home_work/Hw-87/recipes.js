/*global $, pcs*/
(function () {
    'use strict';
    var selection = $('#selec');
    var image = $('#image');
    var recipe = $('#recipe');
    var array = [];


    /*$.get("recipes.json", function (loadedRecipeData) {
        array = loadedRecipeData;
        array.forEach(function (food) {
            var choice = food.name;
            $('<div class="col-md-2"><label>' +
                '<button id=' + "'" + choice + "'" + 'class="form-input" type="radio">' + choice + '</label></div>').appendTo(selection);
            $('#' + choice).click(function (event) {
                image.empty();
                image.attr('src', food.url);
                recipe.empty();
                var recipeArray = food.ingredients;
                for (var index = 0; index < recipeArray.length; index++) {
                    $('<li>' + recipeArray[index] + '</li>').appendTo(recipe);

                }
                event.preventDefault();
            });
        });


    })*/ $.get("recipes.php", function (loadedrecipeData) {
        array = JSON.parse(loadedrecipeData);
        array.forEach(function (food) {
            var choice = food.name;
            $('<div class="col-md-2"><label>' +
                '<button id=' + "'" + choice + "'" + 'class="form-input" type="radio">' + choice + '</label></div>').appendTo(selection);
            $('#' + choice).click(function (event) {
                image.empty();
                image.attr('src', food.url);
                recipe.empty();
                var str = food.ingredients;
                var recipeArray = str.split("/");
                for (var index = 0; index < recipeArray.length; index++) {
                    $('<li>' + recipeArray[index] + '</li>').appendTo(recipe);

                }
                event.preventDefault();
            });
        });
    }).fail(function (jqxhr) {
        pcs.messagebox.show("Error: " + jqxhr.responseText);
    });




}());