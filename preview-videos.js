let text = document.querySelector('.title');
let iput = document.querySelector('.iput');
let note = document.querySelector('.note');

function load() {
  // text.innerHTML = 'the page has loaded'
}

function iframeDidLoad() {
  alert('Done');
}

function newSite() {
  let sites = text.innerHTML;

  document.getElementById('myIframe').src = sites;
}  
