function validate(e)
{
    let error_nums = 0;
    let name = document.getElementById("username").value;
    let pass = document.getElementById("pass").value;
    let email = document.getElementById("email").value;
    let contact = document.getElementById("contact").value;
    let namer = document.querySelector(".err");
    let email_error = document.querySelector(".err1");
    let contact_error = document.querySelector(".err2");
    let pass_error = document.querySelector(".err3");
    if(name === "")
    {
        namer.innerHTML = "Enter a valid name"; 
        e.preventDefault();
        error_nums++;
    }
    else
    {
        namer.innerHTML = ""; 
    }

    if(email === "")
    {
        email_error.innerHTML = "Enter a Valid Email Id";
        e.preventDefault();
        error_nums++;
    }
    else
    {
        email_error.innerHTML = "";
    }

    if(contact === "" || contact.length != 10 || isNaN(contact) == true)
        {
            contact_error.innerHTML = "Enter a valid Contact";
            e.preventDefault();
            error_nums++;
        }
        else
        {
            contact_error.innerHTML = "";
        } 
        
        if(pass.length <= 7 )
            {
                pass_error.innerHTML = "Enter a password of length 8 or more";
                e.preventDefault();
                error_nums++;
            }
            else
            {
                pass_error.innerHTML = "";
            }  
        if(error_nums > 0 )
            e.preventDefault();  
}

const form = document.querySelector(".form");
form.addEventListener("submit", validate);
