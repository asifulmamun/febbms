<div id="edit_profile">
    <form action="./dashboard.php?action=edit_password_update" method="POST" name="edit_profile_form" id="edit_profile_form">
        <input type="hidden" name="action" value="edit_password_update">
        
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="current_pass" class="mdl-textfield__input" type="password" id="current_pass" autocomplete="on">
            <label class="mdl-textfield__label" for="current_pass">Enter Current Password *</label>
            <span class="notice_red" id="current_passnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="pass" class="mdl-textfield__input" type="password" id="pass" autocomplete="on">
            <label class="mdl-textfield__label" for="pass">Enter New Password *</label>
            <span class="notice_red" id="passnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="repass" class="mdl-textfield__input" type="password" id="repass" autocomplete="on">
            <label class="mdl-textfield__label" for="repass">Re-type New Password *</label>
            <span class="notice_red" id="repassnotice"></span>
        </div>

    </form>
    <button id="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Update Profile</button>
</div>

<script>

/* Get the value of form
------------------------- */
function get_value_form(id) {
    let form_id = document.getElementById(id);
    return form_id.value;
}

/* If facing error auto notice here.
----------- */
function not_valid_form(where) {
    let submit_button = document.getElementById('button');

    if (where) {
        console.log(`Getting Error: ${where}`);
        button.disabled = true;
    } else {
        button.disabled = false;

    }
}

/* If Okk
--------------- */
function valid_form() {
    let submit_button = document.getElementById('button');
    button.disabled = false;
}

/* Event Triger by element ID
----------------------- */
function my_event(id) {

    // Selector
    let el_id = document.getElementById(id);

    // keypress verify
    el_id.addEventListener("click", function() {
        verify(id);
    })

    // keypress verify
    el_id.addEventListener("keypress", function() {
        verify(id);
    })

    // keypress verify
    el_id.addEventListener("keyup", function() {
        verify(id);
    })

    // change verify
    el_id.addEventListener("change", function() {
        verify(id);
    })

    // hover verify
    el_id.addEventListener("mouseover", function() {
        verify(id);
    })
}

/* Velidation
------------------ */
function verify(id) {

    // Password
    if (id == 'pass') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');

        if (get_value_form(id).length < 6) {

            notice_id.innerHTML = 'Please enter your password minimum 6';
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';

            if (get_value_form(id) != get_value_form('repass')) {

                document.getElementById('repassnotice').innerHTML = `Password doesn't match with first password.`;
                not_valid_form(id);
            } else {

                document.getElementById('repassnotice').innerHTML = '';
                valid_form();
                return true;
            }   
        }
    } // Password

    // Re-password
    if (id == 'repass') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');

        if (get_value_form(id) != get_value_form('pass')) {

            notice_id.innerHTML = `Password doesn't match with first password.`;
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';
            valid_form();
            return true;
        }

    } // Re-password


} // Verify


/* Trigger for validation
------------ */
function all_trigger() {
    my_event('pass');
    my_event('repass');
}
all_trigger();

// After Submit Button
const submit_button = document.getElementById('button');
submit_button.addEventListener('click', function() {
    verify('pass');
    verify('repass');

    // if all true then submit form
    if (verify('pass') == true && verify('repass') == true) {
        // Submitted Success
        document.edit_profile_form.submit();
    } else {
        not_valid_form('Submit Form Error..');
    }

});
</script>