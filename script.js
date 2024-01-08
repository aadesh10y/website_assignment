let searchBtn = document.querySelector("#search-btn");
let searchBar = document.querySelector(".search-bar-container");
let formBtn = document.querySelector("#login-btn");
let loginForm = document.querySelector(".login-form-container");
let formClose = document.querySelector("#form-close");

window.onscroll = () => {
  searchBtn.classList.remove("fa-times");
  searchBar.classList.remove("active");
};

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