
let btnSubmit = document.getElementById("submit");
let inpCity = document.getElementById("city");

//Function: Search in local storage the previous selection form user
const getCityStored = () => {

    //Checking if we have the local city in Local storage
    let localCity = localStorage.getItem('localCity');
    if (localCity.length > 0) {
        inpCity.value = localCity;

    } else {
        localStorage.setItem('localCity', "");
    }
}

btnSubmit.onclick = () => {
    let city = inpCity.value;
    if (city.length > 0) {
        localStorage.setItem('localCity', city);
        // container.style.visibility = "visible";
    }
}

