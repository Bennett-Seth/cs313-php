function clicked() {
	alert("Clicked!");
}

function colorChange(){
    var newBg = document.getElementById("newColor").value;
      
   var div1 =  document.getElementById("set_1");
   
    div1.style.backgroundColor = newBg;

    if (div1.style.backgroundColor == "greenyellow"){
        alert("Please check your spelling");
    } else {
        alert("Congrats, you've changed the background color to " +  newBg);
    }
    
}

function colorChange2(){
    var newBg2 = document.getElementById("newColor2").value;
    
    //var div2 =  document.getElementById("set_2");
    
    $("#set_2").css("background-color", newBg2);
}

function visChange(){
    $("#jQFade").click(function(){
        $("#set_3").fadeToggle("slow");
 });
};
