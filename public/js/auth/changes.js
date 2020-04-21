const regData = {
    username: '',
    password: '',
    email: '',
    'password-confirm': ''
}

const red = "#dc3545";
const green = "#28a745";
const orange = "#ee6f2d";

const sum = (arr) => arr.reduce(function (a, b) {return a + b;}, 0);

const signUpValid = {
    username: 0,
    password: 0,
    email: 0,
    'password-confirm': 0
};

window.addEventListener('keyup', e => {
    const el = e.target;
    const name = el.name;
    const value = el.value;
    const {valid, errors: {length: lengthError, value: valueError} } = validate(name, value);
    const response = el.parentElement.querySelector('.response');
    response.style.display = 'block';
    response.style.color =valid? green: red;
    const { success } = messages(name);

    signUpValid[name] = valid? 1: 0;

    if(valid){
        switch (name) {
            case 'username':
                response.innerHTML = success
                request(
                    {field: name, value},
                    `/auth/users/check`,
                    `GET`,
                    response,
                    'username-reg'
                )
                break
            case 'email':
                response.innerHTML = success
                request(
                    {field: name, value},
                    `/auth/users/check`,
                    `GET`,
                    response,
                    'email-reg'
                )
                break
            case 'password':
                response.innerHTML = success
                break
            case 'password-confirm':
                response.innerHTML = ""
                break
            default:
                //set defaults
                break
        }
    }

    if(lengthError && valueError)
        response.innerHTML=`
            <p class="mb-1 text-small">${lengthError}</p>
            <p class="text-small">${valueError}</p>
                `
    else if(lengthError)
         response.innerHTML=`
            <p class="mb-1 text-small">${lengthError}</p>
            `
    else if(valueError)
         response.innerHTML=`
            <p class="mb-1 text-small">${valueError}</p>
            `
    const signUpAllow = Object.values(signUpValid);
    document.querySelector('#register').disabled = sum(signUpAllow) !== 4;
})

window.addEventListener('click', e => {
    e.preventDefault();
    const el = e.target;
    const elId = el.id;

    if(elId === 'register'){
        delete regData['password-confirm'];
        request(
            regData,
            '/auth/users',
            'POST',
            el,
            'submit-reg'
        )
    }
} )
