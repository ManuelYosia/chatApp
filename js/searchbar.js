const searchBar = document.querySelector(".search input"),
searchBtn = document.querySelector(".search button");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}