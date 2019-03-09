// NOTE: Make sure my node modules aren't committed to git hub (GitIgnore), because that's plagarism.

//Requires the Express Library
var express = require("express");

//Create "Express" App
var app = express();
var path = require('path');

//Activate View Engine
app.set("views", "views");
    //Syntax = "type", "directory name";
app.set("view engine", "ejs");

app.use(express.static("public"));

//Server is Listening
//app.listen(5000, function(){
	//console.log("The server is listening on port 5000");
//});

//Controler Code (Server Side)
app.get("/", function(req,res){
	console.log("Recieved a request for /");
	res.write("This is the root");
	res.end();
});	

app.get("/home", function(req,res){
	console.log("Recieved a request for the home page");
    res.render("home");
    res.end();

});	

app.get("/calc", function(req,res){
	console.log("Recieved a request for the calc page");

    // Recieve the variables from the form page
    var wieght = req.query.wieght;
        console.log(wieght);

    var type = req.query.type;
        console.log(type);
    
    // Use the mail's "type" to calculate the rate
    var rate = getRate(type);
        console.log(rate);
    
    // Calculate the final cost
    var cost = calcShipRate(wieght, rate);
        console.log(cost);
    
    // Print the results to the Cost page
    var result = {
        wieght: wieght,
        type: type,
        cost: cost
        };
    res.render("cost", result);

    // Send the results to the cost page
    res.end();
});


//Model Code (functions, etc).

function getRate(type){
    var rate;             
    switch(type){
        case "stamped":
            rate = 0.55;
            return rate;
            break;
            
        case "metered": 
            rate = 0.5;
            return rate;
            break;
            
        case "flat": 
            rate = 1.00;
            return rate;
            break;
            
        case "first_class": 
            rate = 3.66;
            return rate;
            break;
        }
}

function calcShipRate(wieght, rate){
    var wieght = parseInt(wieght);
    var rate = parseInt(rate);
    
    var result = wieght*rate;
    return result;
}







