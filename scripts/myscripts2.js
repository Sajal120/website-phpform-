"use strict";

 

function init()
{
	 const slider = document.querySelector(".slider input");   //assigning the slider  
     const img = document.querySelector(".images .img-2"); //assigning the greyscale image which is image2(in css we load image 1 and do its validation on sliding as well
     const dragLine = document.querySelector(".slider .drag-line");  //assigning the vertical dragline 
     slider.oninput = ()=>{       //when slider is on input do these actions
        let sliderVal = slider.value;
        dragLine.style.left = sliderVal + "%";          //when the dragline is towards left the image width on percent 
																//is changed which will do the action of
																	//loading annother image by replacing the current image on sliding it
        img.style.width = sliderVal + "%";         
      }
}

window.onload = init;  //windows on load goto init function





