// Create a request variable and assign a new XMLHttpRequest object to it
var request = new XMLHttpRequest()

// open a new connection, using the GET request on the URL endpoint
request.open('GET', 'https://openlibrary.org/search.json?q=', true)
request.onload = function () {
    // begin accessing JSON data here
    var data = JSON.parse(this.response)

   if (request.status >= 200 && request.status < 400) {
        data.forEach(() => { console.log() })
    } else {
        console.log('error')
    }
}

// Send request
request.send() 

const app = document.getElementById('root')

const logo = document.createElement('img')

logo.src = 'logo.png'

const container = document.createElement('div')
container.setAttribute('class', 'container')

app.appendChild(logo)
app.appendChild(container)
