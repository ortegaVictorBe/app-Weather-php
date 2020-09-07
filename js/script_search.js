//  -------------------------------------------------------
//  Variables - Global use
//  -------------------------------------------------------

const search = document.getElementById('city');
const matchList = document.getElementById('match-list');
const setCards = document.querySelector('#match-list');


// const loading = document.getElementById('loading');
// const data = document.getElementById('data');

var citySelected = {};
var matches = [];
var cities = {};

//  -------------------------------------------------------
//  Functions.
//  -------------------------------------------------------

//loadCities - fucntion(Async) : open the file with the cities
const loadCities = async () => {
    const res = await fetch('city.list.min.json');
    cities = await res.json();

    //data.style.visibility = 'visible';
    // loading.style.display = 'none';
};

//searchCities - function: search cities in the list
const searchCities = searchText => {
    //Get matches to current input
    matches = cities.filter(city => {
        const regex = new RegExp(`^${searchText}`, 'gi');
        return city.name.match(regex) || city.country.match(regex);
    });

    if (searchText.length === 0) {
        matches = [];
        matchList.innerHTML = '';
    }
    outputHtml(matches);
};

//outputHtml - function: Show the results in html
const outputHtml = matches => {
    if (matches.length > 0) {

        const html = matches.map(match => `<div class="card card-body mb-1" id="d${match.id}">
        <h4 id="h${match.id}">${match.name} (${match.country}) <span id="s${match.id}" class="text-primary">${match.state}</span></h4>
        <small id="m${match.id}" >Lat: ${match.coord.lat} / Long: ${match.coord.lon}</small></div>`).join('');
        matchList.innerHTML = html;
    }
};

setCards.addEventListener('click', e => {
    if (e.target.id.length > 0 && e.target.id != 'match-list') {

        search.setAttribute('id_city', e.target.id.substring(1, e.target.id.length));
        citySelected = matches.find(city => { return city.id == parseInt(search.getAttribute('id_city')); });
        // search.value = `${citySelected.name} (${citySelected.country}) ${citySelected.state} `;
        search.value = `${citySelected.name},${citySelected.country}`;
        matchList.innerHTML = '';

    }

});

// input - Event:click - Whe the user type in the input, search inside of the cities loaded, in live
search.addEventListener('input', () => searchCities(search.value));

loadCities();

