/*global $ */
(function () {
    'use strict';
    var display = $('.display'), //main body
        table = $('table'),      //shows users   
        tableBody = $('tbody'),
        blogDisplay = $('.blog'),   //will show blogs
        board = $('.board'),        //wil be the main body of blogs
        nextB = $('#next'),
        prevB = $('#previous'),
        returnB = $('#return'),
        postArray = [],
        length,                     //will be the length of the postarray
        position = 0,               // wil be the first blog shown
        iterator = 3,               // how many blogs to display at a time
        end = 0,                     // last blog
        blog,
        lastPage;                    // will be used to show previous blogs


    function addUser(user) {        //adds users to table
        var theRow = $('<tr >' +
            '<td>' + user.username + '</td>' +
            '<td>' + user.website + '</td>' +
            '<td>' + user.info + '</td>' +
            '<td><button>view</button></td>' +
            '</tr>'
        ).appendTo(tableBody)
            .data('userId', user.id);
    }

    function createUsers(info) {        //gets the users
        info.forEach(function (object) {
            // breaks up the company info into a string
            var infoString = "CompanyName: " + '"' + object.company.name + '",' +
                " Description: " + "'" + object.company.catchPhrase + "'," + " Business: " + "'" + object.company.bs + "'";
            var user = {
                id: object.id,
                username: object.username,
                website: object.website,
                info: infoString
            };
            addUser(user);
        });
    }
    // the website starts off with a list of users
    $.getJSON('https://jsonplaceholder.typicode.com/users', function (loadedData) {
        createUsers(loadedData);
    });

    tableBody.click(function (event) {   //gets the userId and then gets the posts for that id
        if (event.target.nodeName === 'BUTTON') {
            var tr = $(event.target).closest('tr'),
                userId = tr.data('userId');
            $.getJSON('https://jsonplaceholder.typicode.com/posts', { userId: userId }, function (posts) {
                table.hide();       //acts as if you went to a different page
                createBlog(posts);  // creats the blog page
            });
        }
    });

    function getPosts(posts) {  //creates the posts for the blog page
        posts.forEach(function (post) {
            var Post = {
                title: post.title,
                body: post.body,
                id: post.id
            };
            postArray.push(Post);
        });
        length = postArray.length;
    }
    function displayBlog() {     //creates the actual page
        for (position; position < end; position++) { //goes through each post and creats a blog for it
            var post = postArray[position];
            var blog = $('<div class="post"><hr><div class="row"><h3>' + post.title + '</h3></div>' +
                '<div class="row"><p>' + post.body + '</p></div>' +
                '<div class="row"><button class="comments">view comments</button><ol></ol></div></div>'
            ).appendTo(board).data('postId', post.id);

        }
        // will enable the next or previous button depending if there are any more posts to get in that direction
        if (position === length) { //checks if at last page and then disables button
            nextB.prop('disabled', true);
        } else {
            if (nextB.prop('disabled')) { //if not at last page then if disabled, enable
                nextB.prop('disabled', false);
            }
        }
        if (position === iterator) { //if at the first page disables prev button
            prevB.prop('disabled', true);
        } else {
            if (prevB.prop('disabled')) { //same as before
                prevB.prop('disabled', false);
            }
        }

    }

    function createBlog(posts) { //this is the first function called in the blog resets everything
        getPosts(posts);
        blogDisplay.show();
        position = 0;
        end = 0;
        nextBlogs();

    }

    function nextBlogs() { //gets the next 3 blogs or how many that are possible

        if (position != length) { // if at last page does not enable to get blogs
            board.empty();      //clears the previous blogs
            end += iterator;

            if (end > length) { //if less blogs than requested changes the request
                end = length;
            }
            displayBlog();
        }
    }
    function previousBlogs() {
        board.empty();
        if ((position === length) && (length % iterator > 0)) {//checks how many blogs were at the last page
            lastPage = length % iterator;
        } else {
            lastPage = iterator;
        }
        position -= lastPage;
        if (position != 0) { //checks if its at the first page t
            end = position;
            position -= iterator;
            displayBlog();
        }
    }
    //buttons to view blogs
    nextB.click(
        nextBlogs);

    prevB.click(
        previousBlogs);

    returnB.click(function () { //resets blog returns to main page
        postArray = [];
        blogDisplay.hide();
        table.show();
    });
    board.click(function (event) {
        //this is the code for the comments button it will add a list of comments
        //the first time clicked as well as toggle the 'ol' element, afterwards
        //it will only toggle, the second thing it does is change the text of the button.
        if (event.target.nodeName === 'BUTTON') {
            var blog = $(event.target).closest('.post'), //gets the specific blog, list and id of th button.
                list = blog.find('ol'),
                li = list.find('li'),
                postId = blog.data('postId');
            console.log(postId);
            if (!(li.length)) {     //checks if the list was already added.
                list.toggle();
                $.getJSON('https://jsonplaceholder.typicode.com/comments', { postId: postId }, function (comments) {
                    comments.forEach(function (comment) {
                        var li = $('<li>' + comment.name + ', ' + comment.email +
                            ', ' + comment.body + '</li>').appendTo(list);
                    });
                });
            } else { //from second time onward.
                list.toggle();
            }
            //cycles through the button's text.
            var button = blog.find('button');
            if (button.text() == 'view comments') {
                button.text('hide comments');
            } else {
                button.text('view comments');
            }


        }
    });

}());