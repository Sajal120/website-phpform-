"use strict";

 

function init()
{
	  //queryselector is used.
	  const btn = document.querySelector("button");              // assigning button to the variable
      const post = document.querySelector(".post");
      const widget = document.querySelector(".star-widget");     //assignig div class
      const editBtn = document.querySelector(".edit");
      btn.onclick = ()=>{                          //when user clicks on any star buttons, onclick action happens
        widget.style.display = "none"; //setting the final display to be none
        post.style.display = "block";
        editBtn.onclick = ()=>{      
        widget.style.display = "block";
        post.style.display = "none";       //when the user click on post then display the final image
        }
        return false;
      }
	

}

window.onload = init;





