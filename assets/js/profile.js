    
    $.ajax({
        type: 'post',
        url: "AjaxLogin",
        data: {
            'email': $('#login-form-email').val(),
            'password': $('#pwd').val(),
            'stage': $('#stage').val(),
            'remember_me' : remember,
        },
        dataType: 'json',
        success: function (data) {
            // M: Data retrieved in the success case;
            var loginHiddenContent = $('#login-hidden-div');
            var stage = $('#stage');
            var registerHiddenContent = $('#register-hidden-div');
            var emailMsg = $('#email-msg');
            var goButton = $('#myGo-button');
            var loginMsg = $('#login-msg');
            if (data.response == 0) {
                // M: In this case, the email already exists in the db so we will show the password and submit button;
                registerHiddenContent.addClass('hidden-content');
                emailMsg.addClass('hidden-content');
                goButton.addClass('hidden-content');
                emailMsg.text(' ');
                loginMsg.addClass('hidden-content');
                loginHiddenContent.removeClass('hidden-content');
                // M: Stage is the stage of the login process;
                stage.attr('value', '1');
            }
            if (data.response == 1) {
                // M: In this case the email dosen't exist in the db;
                loginHiddenContent.addClass('hidden-content');
                loginMsg.addClass('hidden-content');
                stage.attr('value', '0');
                emailMsg.removeClass('hidden-content');
                emailMsg.text(data.msg);
                goButton.addClass('hidden-content');
                registerHiddenContent.removeClass('hidden-content');
            }
            if (data.response == 2) {
                // M: The login wasn't successful. Username or password incorrect;
                loginMsg.removeClass('hidden-content');
                loginMsg.text(data.msg);
            }
            if (data.response == 3) {
                // M: Succesfully logged in. Redirect user to the homepage;
                window.location.replace(data.msg);
            }
            if (data.response == 4) {
                // M: Internal server error;
                alert(data.msg);
            }
        },
        error: function (data) {
            // M: In case of failure;
            alert('A aparut o eroare. Va rugam sa incercati iar!');
        }
    })