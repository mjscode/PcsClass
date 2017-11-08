var clock=clock || {};

clock.stopWatch= (function (){
    'use strict';
    function createElement(type) {
        return document.createElement(type);
    }
    function add(){
        var start=new Date();
        var difference=0;

        var div = createElement("div");
        div.className = "row";

        var divHours=createElement("div");
        divHours.className = "col-md-2";
        var pHours=createElement("p");
        pHours.innerHTML="Hours:";
        var spanHours=createElement("span");
        spanHours.innerHTML='00';
        pHours.appendChild(spanHours);
        divHours.appendChild(pHours);

        var divMinutes=createElement("div");
        divMinutes.className = "col-md-2";
        var pMinutes=createElement("p");
        pMinutes.innerHTML="Minutes:";
        var spanMinutes=createElement("span");
        spanMinutes.innerHTML='00';
        pMinutes.appendChild(spanMinutes);
        divMinutes.appendChild(pMinutes);

        var divSeconds=createElement("div");
        divSeconds.className = "col-md-2";
        var pSeconds=createElement("p");
        pSeconds.innerHTML="Seconds:";
        var spanSeconds=createElement("span");
        spanSeconds.innerHTML='00';
        pSeconds.appendChild(spanSeconds);
        divSeconds.appendChild(pSeconds);

        var divCentiSeconds=createElement("div");
        divCentiSeconds.className = "col-md-2";
        var pCentiSeconds=createElement("p");
        pCentiSeconds.innerHTML='CentiSeconds:';
        var spanCentiSeconds=createElement("span");
        spanCentiSeconds.innerHTML='00';
        pCentiSeconds.appendChild(spanCentiSeconds);
        divCentiSeconds.appendChild(pCentiSeconds);

        var divStarter=createElement('div');
        divStarter.className='col-md-2';
        var buttonStarter=createElement('button');
        buttonStarter.innerHTML='stop';
        divStarter.appendChild(buttonStarter);

        var divReset=createElement('div');
        divReset.className='col-md-2';
        var buttonReset=createElement('button');
        buttonReset.innerHTML='reset';
        divReset.appendChild(buttonReset);

        div.appendChild(divHours);
        div.appendChild(divMinutes);
        div.appendChild(divSeconds);
        div.appendChild(divCentiSeconds);
        div.appendChild(divStarter);
        div.appendChild(divReset);

        function startTimer(){
            start=new Date();
           
        }

        function updateDisplay(number){
            
            var hours=0;
            var minutes=0;
            var seconds=0;
            var centiseconds=0;
            if(number>0){
                var milliseconds=number;
                hours = Math.floor(milliseconds/(60*60*1000));
                milliseconds = milliseconds %(60 * 60* 1000);
                minutes=Math.floor(milliseconds/(60*1000));
                milliseconds=milliseconds%(60*1000);
                seconds=Math.floor(milliseconds/1000);
                milliseconds=milliseconds%1000;
                centiseconds=Math.floor(milliseconds/10);
            }
            spanHours.innerHTML=hours;
            spanMinutes.innerHTML=minutes;
            spanSeconds.innerHTML=seconds;
            spanCentiSeconds.innerHTML=centiseconds;
    
        }

        buttonStarter.addEventListener('click', function (){
            if(start){
                difference=new Date()-start;
                start=0;
                updateDisplay(difference);
                buttonStarter.innerHTML='start';
            }else{
                updateDisplay(0);
                startTimer();
                buttonStarter.innerHTML='stop';
            }
        });

        buttonReset.addEventListener('click', function(){
            if(start){
            start=0;
            buttonStarter.innerHTML='start';
            }
            updateDisplay(0);
        });
        document.body.appendChild(div);
    }
    
    
    return {
        add:add
    };
}());