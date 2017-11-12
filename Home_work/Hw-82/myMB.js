var pcs = pcs || {};

pcs.messagebox = (function () {
    'use strict';
    function createElement(type) {
        return document.createElement(type);
    }
    function showModalDialogue(msg) {
        var div = createElement("div");
        var span = createElement("span");
        var buttonDiv = createElement("div");
        var okButton = createElement("button");

        span.innerHTML = msg;
        div.appendChild(span);
        okButton.innerHTML = "OK";
        buttonDiv.appendChild(okButton);
        div.appendChild(buttonDiv);
        var block= createElement('div');
        block.style.zIndex = '1';
        block.style.height = '100%';
        block.style.width = '100%';
        block.style.position = 'absolute';
        block.style.left = '0';
        block.style.top = '0';
        
        block.style.border = '1px solid blue';
        block.style.backgroundColor = 'rgba(250,0,0,0)';
        document.body.appendChild(block);
        div.style.zIndex = '2';
        document.body.appendChild(div);
        div.style.backgroundColor = 'lightblue';
        div.style.padding = '20px';
        div.style.width = '400px';
        div.style.height = '100px';
        div.style.border = '1px solid blue';
        div.style.position = 'absolute';
        div.style.left = '50%';
        div.style.top = '10%';
        div.style.marginLeft = '-200px';
        div.style.marginTop = '-50px';
        div.style.boxSizing = 'border-box';
        div.style.display = 'inline-block';

        buttonDiv.style.position = 'absolute';
        buttonDiv.style.bottom = '6px';
        buttonDiv.style.textAlign = 'center';
        buttonDiv.style.width = '100%';
        buttonDiv.style.marginLeft = '-20px';

        okButton.addEventListener("click", function () {
                document.body.removeChild(block);
            document.body.removeChild(div);
        });
    }
    function show(msg) {
        var div = createElement("div");
        var span = createElement("span");
        var form=createElement("form");
        var label=createElement("label");
        var input=createElement("input");
        var formButton=createElement("button");
        var buttonDiv = createElement("div");
        var okButton = createElement("button");

        span.innerHTML = msg;
        div.appendChild(span);
        form.appendChild(label);
        form.appendChild(input);
        formButton.innerHTML='submit';
        form.appendChild(formButton);
        div.appendChild(form);
        okButton.innerHTML = "OK";
        buttonDiv.appendChild(okButton);
        div.appendChild(buttonDiv);
        document.body.appendChild(div);

        div.style.backgroundColor = 'lightblue';
        div.style.padding = '20px';
        div.style.width = '400px';
        div.style.height = '100px';
        div.style.border = '1px solid blue';
        div.style.position = 'absolute';
        div.style.left = '50%';
        div.style.top = '50%';
        div.style.marginLeft = '-200px';
        div.style.marginTop = '-50px';
        div.style.boxSizing = 'border-box';
        div.style.display = 'inline-block';

        buttonDiv.style.position = 'absolute';
        buttonDiv.style.bottom = '6px';
        buttonDiv.style.textAlign = 'center';
        buttonDiv.style.width = '100%';
        buttonDiv.style.marginLeft = '-20px';
        form.addEventListener('submit', function(event){    
            var value=input.value;
            alert(value);
            showModalDialogue(value);           
            event.preventDefault();
        });

        okButton.addEventListener("click", function () {
            document.body.removeChild(div);
        });
    }

    return {
        show: show,
        showModalDialogue:showModalDialogue
    };
}());