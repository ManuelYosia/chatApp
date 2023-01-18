const searchBar = document.querySelector(".search input"),
searchBtn = document.querySelector(".search button");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
}

searchBar.onkeyup = () => {
    // let xhr = new XMLHttpRequest();
    // xhr.open("GET", "php/users.php");
    // xhr.onload = () => {
    //     if(xhr.readyState === XMLHttpRequest) {
    //         if(xhr.status === 200) {
    //             console.log(data);
    //         }
    //     }
    // }
    // xhr.send();
    console.log("Change");
}