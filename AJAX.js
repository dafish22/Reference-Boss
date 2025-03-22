// HTML area
const dataArea = document.getElementById("data");

// define function (count param is passed) - async AJAX call
const getData = search => new Promise((resolves, rejects) => {
    // API URL to contact
    const api = `https://openlibrary.org/search.json?q=${search}`;
    // AJAX object
    const req = new XMLHttpRequest();  
    req.open('GET', api);
    
    // onload event contains a ternery for resolve/reject
    req.onload = () => (req.status === 200) ? 
        resolves(JSON.parse(req.response)) :
        rejects(Error(req.statusText));
        // onerror function set to lambda which returns (null, err)
    req.onerror = err => rejects(err);
    
    // send AJAX request
    req.send();    
});

window.addEventListener('load', function () {
    // call getData (2 responses => resolve, fail) - error out to the browser console if issues
    getData("Java").then(
        loaded => drawData(loaded),
        err => drawData(`Cannot load members: ${err}`)
    );
});

const drawData = dataVal => {
    // docs is the root
    const bookArray = dataVal.docs;

    // loop books
    for (let i = 0; i < bookArray.length; i++) {

        const book = dataVal.docs[i];

        document.getElementById("data").innerHTML += `<p>${book.author_name.join(", ")} : ${book.title} </p>`;

    }
}

const app = document.getElementById('data')
const logo = document.createElement('img')
logo.src = 'logo.png'

const container = document.createElement('div')
container.setAttribute('class', 'container')

app.appendChild(logo)
app.appendChild(container)