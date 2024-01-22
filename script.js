let searchBtn = document.querySelector("#search-btn");
let searchBar = document.querySelector(".search-bar-container");
let formBtn = document.querySelector("#login-btn");
let loginForm = document.querySelector(".login-form-container");
let formClose = document.querySelector("#form-close");
let menu = document.querySelector('#menu-bar');
let navbar = document.querySelector('.navbar');
let videobtn = document.querySelectorAll('.vid-btn');

window.onscroll = () => {
  searchBtn.classList.remove("fa-times");
  searchBar.classList.remove("active");
  menu.classList.remove('fa-times');
  navbar.classList.remove('active');
  loginForm.classList.remove("active");
}

menu.addEventListener("click", () => {
  menu.classList.toggle('fa-times');
  navbar.classList.toggle('active');
});


searchBtn.addEventListener("click", () => {
  searchBar.classList.toggle("active");

  // Toggle the search and cancel icons using Font Awesome classes
  if (searchBar.classList.contains("active")) {
    searchBtn.innerHTML = '<i class="fas fa-times"></i>';
  } else {
    searchBtn.innerHTML = '<i class="fas fa-search"></i>';
  }
});

formBtn.addEventListener("click", () => {
  loginForm.classList.add("active");
});

formClose.addEventListener("click", () => {
  loginForm.classList.remove("active");
});

videobtn.forEach(btn =>{
  btn.addEventListener('click', ()=>{
    document.querySelector('.controls .active').classList.remove('active');
    btn.classList.add('active');
    let src = btn.getAttribute('data-src');
    document.querySelector('#video-slider').src = src;
  });
});

const API_KEY = "ac693a0525364bcfba8eec98622884d3";
const url = "https://newsapi.org/v2/everything?q=";
window.addEventListener('load', () => fetchFootballNews("Europe"));

async function fetchFootballNews() {
  const query = "football";
  const res = await fetch(`${url}${query}&apiKey=${API_KEY}`);
  const data = await res.json();
  console.log(data);
  bindData(data.articles);
}


function bindData(articles){
  const cardsContainer = document.getElementById('cards-container');
  const newsCardTemplate = document.getElementById('template-news-card');

  cardsContainer.innerHTML = '';

  articles.forEach(article => {
    if(!article.urlToImage) return;
    const cardClone = newsCardTemplate.content.cloneNode(true);
    fillDataInCard(cardClone, article);
    cardsContainer.appendChild(cardClone);
  });

}

function fillDataInCard(cardClone, article) {
  const newsImg = cardClone.querySelector('#news-img');
  const newsTitle = cardClone.querySelector('#news-title');
  const newsSource = cardClone.querySelector('#news-source');
  const newsDesc = cardClone.querySelector('#news-desc');

  newsImg.src = article.urlToImage;
  newsTitle.innerHTML = article.title;
  newsDesc.innerHTML = article.description;

  const date = new Date(article.publishedAt).toLocaleString("en-US", {
    timeZone: "Asia/Jakarta"
  });

  newsSource.innerHTML = `${article.source.name} · ${date}`;

  cardClone.firstElementChild.addEventListener("click", () => {
      window.open(article.url, "_blank");
  });
}