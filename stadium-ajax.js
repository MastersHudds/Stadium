//declare variable for elements from the HTML document
let customerList;

function filterList(evnt)


{
    //get hold of the id number of the transaction that has been selected
    const id = evnt.target.value
    console.log("user clicked transaction:"+id)

    //make an Ajax request to filterTransactions.php
    fetch("filterTransactions.php?id="+id).then(function(response) {
        return response.json();
    }).then(function(json) {
        customers=json; //store json data as customers
        //when we get some customers back
        clearCustomerList(); //clear the matching-customer div element
        //loop over the customers
        customers.forEach(function(customer){
            const newDiv = document.createElement("div"); //create a div
            newDiv.textContent = customer.Name; //set the content of the div to be the customer names
            customerList.append(newDiv); //insert the new div into matching names

        });
    });
}

function clearCustomerList()
{
    //as long as the matching names div has a child element remove it.
    while(customerList.firstChild){
        customerList.removeChild(customerList.firstChild);
    }
}

function init(){
    customerList = document.querySelector("#matching-customers"); //get hold of <div id="matching customers"></div>
    const transactionBtns = document.querySelectorAll(".transactionBtn"); //get hold of all the transaction radio buttons
    transactionBtns.forEach(function(btn){
        //selecting a radio button calls filterList
        btn.addEventListener("click",filterList,false)
    })
}

init()
