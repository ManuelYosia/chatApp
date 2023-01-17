const form = document.querySelector(".signup form"), signUpBtn = document.querySelector(".signup .button input"), 
errorTxt = document.querySelector(".error-txt");

form.onsubmit = (e) => {
    e.preventDefault();
}

signUpBtn.onclick = () => {
    let xhr = new XMLHttpRequest();

    xhr.open("POST", "php/signup.php", true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response
                if(data === "Succsess") {
                    location.href = "./login.php"
                }else{
                    errorTxt.textContent = data
                    errorTxt.style.display = "block"
                }
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData)
}