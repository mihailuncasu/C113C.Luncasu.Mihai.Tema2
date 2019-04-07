// M: This function does a ajax call to the server and asks for the email/password in order to login the user;
function checkEmail() {
    $.ajax({
        type: 'post',
        url: "AjaxLogin",
        data: {
            'email': $('#login-form-email').val(),
            'password': $('#pwd').val(),
            'stage': $('#stage').val()
        },
        dataType: 'json',
        success: function (data) {
            // M: Data retrieved in the success case;
            var loginHiddenContent = $('#login-hidden-div');
            var stage = $('#stage');
            var registerHiddenContent = $('#register-hidden-div');
            var emailMsg = $('#email-msg');
            var goButton = $('#myGo-button');
            if (data.response == 0) {
                // M: In this case, the email already exists in the db so we will show the password and submit button;
                registerHiddenContent.addClass('hidden-content');
                emailMsg.addClass('hidden-content');
                goButton.addClass('hidden-content');
                emailMsg.text(' ');
                loginHiddenContent.removeClass('hidden-content');
                // M: Stage is the stage of the login process;
                stage.attr('value', '1');
            }
            if (data.response == 1) {
                // M: In this case the email dosen't exist in the db;
                loginHiddenContent.addClass('hidden-content');
                stage.attr('value', '0');
                emailMsg.removeClass('hidden-content');
                emailMsg.text(data.msg);
                goButton.addClass('hidden-content');
                registerHiddenContent.removeClass('hidden-content');
            }
            if (data.response == 2) {
                // M: The login wasn't successful. Username or password incorrect;
                
            }
        },
        error: function (data) {
            // M: In case of failure;
            alert('A aparut o eroare. Va rugam sa incercati iar!');
        }
    })
}

function userOption(option, rootUrl) {
    if (option == 'home') {
        // M: We redirect the user to the homepage;
        window.location.replace(rootUrl);
    }
    if (option == 'register') {
        // M: We redirect the user to the register page;
        window.location.replace(rootUrl + '/users/register');
    }
}

function goHome(rootUrl) {
    window.location.replace(rootUrl);
}

// M: Handler for the form submit action;
$(document).ready(function () {
    // M: Before the ajax check;
    $('#login-form').submit(function (event) {
        // M: Prevent the submit of the form;
        event.preventDefault();
        // M; Checking if the user provided an input;
        if (!$('#login-form-email').val()) {
            $('#email-error').removeClass('hidden-content');
            $('#email-error').text('Introduceti o adresa de email!');
        } else {
            $('#email-error').addClass('hidden-content');
            $('#email-error').text('');
            checkEmail();   
        }
    });
})


