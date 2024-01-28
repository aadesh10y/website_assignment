let searchBtn = document.querySelector("#search-btn");
let searchBar = document.querySelector(".search-bar-container");
let formBtn = document.querySelector("#login-btn");
let loginForm = document.querySelector(".login-form-container");
let formClose = document.querySelector("#form-close");
let menu = document.querySelector("#menu-bar");
let navbar = document.querySelector(".navbar");

//Added codes
const documentId = document.getElementById(".register-form");
const loginMessage = document.querySelector(".login-message");
const registerMessage = document.querySelector(".register-message");
const loginButton = document.querySelector(".login-button");
const registerNowButton = document.querySelector(".register-now-button");
const loginLink = document.querySelector(".register-now-link");
const sendMessageButton = document.querySelector(".send-message-button");
const sendMessage = document.querySelector(".send-message");

let videobtn = document.querySelectorAll(".vid-btn");

window.onscroll = () => {
  searchBtn.classList.remove("fa-times");
  searchBar.classList.remove("active");
  menu.classList.remove("fa-times");
  navbar.classList.remove("active");
  loginForm.classList.remove("active");
};

menu.addEventListener("click", () => {
  menu.classList.toggle("fa-times");
  navbar.classList.toggle("active");
});

searchBtn.addEventListener("click", () => {
  searchBar.classList.toggle("active");
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

videobtn.forEach((btn) => {
  btn.addEventListener("click", () => {
    document.querySelector(".controls .active").classList.remove("active");
    btn.classList.add("active");
    let src = btn.getAttribute("data-src");
    document.querySelector("#video-slider").src = src;
  });
});

const API_KEY = "ac693a0525364bcfba8eec98622884d3";
const url = "https://newsapi.org/v2/everything?q=";
window.addEventListener("load", () => fetchSoccerNews("soccer"));

async function fetchSoccerNews(query) {
  const res = await fetch(`${url}${query}&apiKey=${API_KEY}`);
  const data = await res.json();
  bindData(data.articles);
}

function bindData(articles) {
  const cardsContainer = document.getElementById("cards-container");
  const newsCardTemplate = document.getElementById("template-news-card");

  cardsContainer.innerHTML = "";

  const limitedArticles = articles.slice(0, 9);

  limitedArticles.forEach((article) => {
    if (!article.urlToImage) return;
    const cardClone = newsCardTemplate.content.cloneNode(true);
    fillDataInCard(cardClone, article);
    cardsContainer.appendChild(cardClone);
  });
}

function fillDataInCard(cardClone, article) {
  const newsImg = cardClone.querySelector("#news-img");
  const newsTitle = cardClone.querySelector("#news-title");
  const newsSource = cardClone.querySelector("#news-source");
  const newsDesc = cardClone.querySelector("#news-desc");

  newsImg.src = article.urlToImage;
  newsTitle.innerHTML = article.title;
  newsDesc.innerHTML = article.description;

  const date = new Date(article.publishedAt).toLocaleString("en-US", {
    timeZone: "Asia/Jakarta",
  });

  newsSource.innerHTML = `${article.source.name}·${date}`;

  cardClone.firstElementChild.addEventListener("click", () => {
    window.open(article.url, "_blank");
  });
}

let curSelectedNav = null;
function onNavItemClick(id) {
  let query = "";
  switch (id) {
    case "PL":
      query = "Premier League";
      break;
    case "LALIGA":
      query = "La Liga";
      break;
    case "UCL":
      query = "UEFA Champions League";
      break;
  }
  fetchSoccerNews(query);
  const navItem = document.getElementById(id);
  curSelectedNav?.classList.remove("active");
  curSelectedNav = navItem;
  curSelectedNav.classList.add("active");
}

const searchButton = document.getElementById("search-button");
const searchText = document.getElementById("search-text");

searchButton.addEventListener("click", () => {
  const query = searchText.value;
  if (!query) return;
  fetchSoccerNews(query);
  curSelectedNav?.classList.remove("active");
  curSelectedNav = null;
});

function showRegisterForm() {
  document.getElementById("login-form").style.display = "none";
  document.getElementById("register-form").style.display = "block";
}

loginLink.addEventListener("click", showRegisterForm);

function showLoginForm() {
  document.getElementById("register-form").style.display = "none";
  document.getElementById("login-form").style.display = "block";
}

//Added codes.

sendMessageButton.addEventListener("click", () => {
  sendMessage.style.display = "block";

  setTimeout(() => {
    sendMessage.style.display = "none";
  }, 2000);
});

formBtn.addEventListener("click", () => {
  loginForm.style.display = "flex";
});

formClose.addEventListener("click", () => {
  loginForm.style.display = "none";
});

loginButton.addEventListener("click", (e) => {
  e.preventDefault();
  loginMessage.style.display = "block";

  setTimeout(() => {
    loginMessage.style.display = "none";
  }, 1500);
});

registerNowButton.addEventListener("click", (e) => {
  e.preventDefault();
  registerMessage.style.display = "block";

  setTimeout(() => {
    registerMessage.style.display = "none";
  }, 1500);
});