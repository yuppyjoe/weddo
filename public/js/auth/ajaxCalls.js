function request(data, url, method, el, type) {
    el.innerHTML = `<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>`;
    if(el.tagName === 'button'.toUpperCase()){
        el = el.parentElement;
        el.innerHTML = `<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>`;
    }
    $.ajaxSetup({
        timeout: 10000,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery.ajax({
        type: method,
        url: url,
        method: method,
        data,
        success: function (result) {
            let msg, found;
            console.log(result);
            switch (type) {
                case 'username-reg':
                    found = result.user;
                    if(found) {
                        msg = messages('username').taken;
                        el.style.color = red;
                    }
                    else
                        msg = messages('username').success;
                    break
                case 'email-reg':
                    found = result.user;
                    if(found) {
                        msg = messages('email').taken;
                        el.style.color = red;
                    }
                    else
                        msg = messages('email').success;
                    break
                case 'submit-reg':
                    msg = "Registered Successfully";
                    el.style.color = green;
                    el.style.border = `1px solid ${green}`;
                    el.classList.add('p-3');
                    break
                default:
                    break;
            }
            setTimeout(() => {
                el.innerHTML = msg;
            }, 500);
        },
        error: function (error) {
            return {
                error,
                success: true
            }
        }
    });
}
