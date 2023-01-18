const form = document.querySelector(".login form"), logInBtn = document.querySelector(".login form .button input"), errorTxt = document.querySelector(".form .error-txt");

form.onsubmit = (e) => {
    e.preventDefault(); //prevent form default
}

logInBtn.onclick = () => {
    // start ajax
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "php/login.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if(data === "Success") {
                    location.href = "users.php"
                }else{
                    errorTxt.style.display = "block";
                    errorTxt.textContent = data;
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}