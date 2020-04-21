const messages = (name) => {
    switch(name) {
        case 'username':
            return {
                taken: "provided username is not available",
                success: "username is valid",
                error: "Username can only contain letters and _"
            }
        case "email":
            return {
                taken: "provided email is not available",
                success: "Email verified",
                error: "Email is invalid (Eg. Example@mail.com)"
            }
        case "password":
            return {
                success: "Nice Password",
                error: "Password should be min 8 characters long, have a number, lowercase, uppercase and a special character"
            }
        case "password-confirm":
            return {
                error: "Passwords do not match",
                success: ""
            }
        default:
            return;
    }
}
