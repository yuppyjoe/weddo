const usernameRegex = new RegExp("^[a-zA-Z0-9_]*$");
const emailRegex = new RegExp("(^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$)");
const passwordRegex = new RegExp("^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#\$%\^&\*])(?=.{8,26})");

const validate = (name, value) => {
    let valid = false;
    let errors = {length: false, value: false};
    const valueLength = value.length;
    const { error } = messages(name);

    switch (name) {
        case 'username':
            valid = usernameRegex.exec(value);
            errors.value = valid? null : error;
            errors.length = lengthCheck(3, 26, valueLength, name);
            break
        case 'email':
            valid = emailRegex.exec(value);
            if(valid) {
                const email = value.split('@')[1];
                valid = email.split('.').length >= 2 && email.split('.')[1].length >= 2;
            }
            errors.value = valid? null : error;
            break
        case 'password':
            valid = passwordRegex.exec(value);
            errors.length = lengthCheck(8, 26, valueLength, name);
            errors.value = valid? null : error;
            triggerConfirmError(value === regData['password-confirm'], 'register');
            break
        case 'password-confirm':
            valid = regData.password === value;
            errors.value = valid? null : error;
            break
        default:
            //set defaults
            break
    }

    const { length: lengthErr, value: valueErr } = errors;
    valid = valid && !lengthErr && !valueErr;

    regData[name] = value;

    return {valid, errors };
}

const lengthCheck = (min, max, length, name) => {
    let error = null;
    if (length > max)
        error = `${name} length should not exceed ${max}`
    if (length < min)
        error = `${name} length should not be less than ${min}`
    return error;
}

const triggerConfirmError = (match, action) => {
    let el;
    switch (action) {
        case 'register':
            el = document.querySelector('input[name="password-confirm"]').parentElement
                .querySelector('.response');
            el.innerHTML = 'passwords do not match';
            el.style.display = match? 'none': 'block';
            el.style.color = match? green: red;
            signUpValid['password-confirm'] = match? 1 : 0;
            break
        case 'login':
            break
        default:
            break
    }
}
