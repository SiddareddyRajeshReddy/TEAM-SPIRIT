function validate(e)
{
    let error_nums = 0;
    let pass = document.getElementById("pass").value;
    let email = document.getElementById("email").value;
    err = document.querySelector(".err");
   
    if(pass.length <= 7 || email === "")
    {
        err.innerHTML = "Enter Credentials";
        e.preventDefault();
        error_nums++;
    }
    else
    {
        err.innerHTML = "";
    }  
        if(error_nums > 0 )
            e.preventDefault();  
}

const form = document.querySelector(".form");
form.addEventListener("submit", validate);
