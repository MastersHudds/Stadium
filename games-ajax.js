//declare variable for elements from the HTML document
let bookingsList;

function filterList(evnt)


{
    //get hold of the id number of the booked game id that has been selected
    const id = evnt.target.value
    console.log("user clicked Game:"+id)

    //make an Ajax request to filterGames.php
    fetch("filterGames.php?id="+id).then(function(response) {
        return response.json();
    }).then(function(json) {
        customers=json; //store json data as customer bookings
        //when we get some bookings back
        clearBookingsList(); //clear the matching-bookings div element
        //loop over the bookings
        customers.forEach(function(customer){
            const newDiv = document.createElement("div"); //create a div
            newDiv.textContent = customer.Name; //set the content of the div to be the customer names
           bookingsList.append(newDiv); //insert the new div into matching names

        });
    });
}

function clearBookingsList()
{
    //as long as the matching names div has a child element remove it.
    while(bookingsList.firstChild){
        bookingsList.removeChild(bookingsList.firstChild);
    }
}

function init(){
    bookingsList = document.querySelector("#matching-teams"); //get hold of <div id="matching customers"></div>
    const teamsBtns = document.querySelectorAll(".gamesBtn"); //get hold of all the teams radio buttons
    teamsBtns.forEach(function(btn){
        //selecting a radio button calls filterList
        btn.addEventListener("click",filterList,false)
    })
}

init()
