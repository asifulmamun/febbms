<div id="edit_profile">
    <form action="./dashboard.php?action=edit_profile_update" method="POST" name="edit_profile_form" id="edit_profile_form">
        <input type="hidden" name="action" value="edit_profile_update">

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo get_user_info($_SESSION['id'], 'name'); ?>" name="name" class="mdl-textfield__input" type="text" id="name">
            <label class="mdl-textfield__label" for="name">Name *</label>
            <span class="notice_red" id="namenotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select name="bloodGroup" class="" id="bloodgroup">
                <option selected><?php echo get_user_info($_SESSION['id'], 'bloodGroup'); ?></option>
                <option value="A(+)">A(+)</option>
                <option value="A(-)">A(-)</option>
                <option value="AB(+)">AB(+)</option>
                <option value="AB(-)">AB(-)</option>
                <option value="B(+)">B(+)</option>
                <option value="B(-)">B(-)</option>
                <option value="O(+)">O(+)</option>
                <option value="O(-)">O(-)</option>
            </select>
            <span class="notice_red" id="bloodgroupnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <span>Last Date of Donate</span>
            <input value="<?php echo get_user_info($_SESSION['id'], 'lastDateOfDonate'); ?>" name="lastDateOfDonate" class="mdl-textfield__input" type="date" id="lastDateOfDonate">
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <span>Date of Birth</span>
            <input value="<?php echo get_user_info($_SESSION['id'], 'dob'); ?>" name="dob" class="mdl-textfield__input" type="date" id="dob">
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select name="gender" class="" id="gender">
                <option selected><?php echo get_user_info($_SESSION['id'], 'gender'); ?></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <span class="notice_red" id="gendernotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select name="district" class="" id="district">
                <option selected><?php echo get_user_info($_SESSION['id'], 'district'); ?></option>
            </select>
            <span class="notice_red" id="districtnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo get_user_info($_SESSION['id'], 'address'); ?>" name="address" class="mdl-textfield__input" type="text" id="address">
            <label class="mdl-textfield__label" for="address">Address *</label>
            <span class="notice_red" id="addressnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input value="<?php echo get_user_info($_SESSION['id'], 'socialUrl'); ?>" name="socialUrl" class="mdl-textfield__input" type="text" id="socialurl">
            <label class="mdl-textfield__label" for="socialurl">Social URL</label>
        </div>
    </form>
    <button id="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Update Profile</button>
</div>

<script>
var getJSON = function(url, callback) {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.responseType = 'json';

    xhr.onload = function() {

        var status = xhr.status;

        if (status == 200) {
            callback(null, xhr.response);
        } else {
            callback(status);
        }
    };

    xhr.send();
};

getJSON('./layout/assets/resource/bd_district.json', function(err, data) {

    if (err != null) {
        console.error(err);
    } else {

        // District Add to select>form with value
        function district_set(value) {
            let select_district = document.getElementById('district'); // get the select
            let x = document.createElement("option");

            // add value to option
            x.setAttribute("value", value);
            let t = document.createTextNode(value);
            x.appendChild(t);
            select_district.appendChild(x);
        }

        for (let i = 0; i < 64; i++) {
            var district = data.districts[i].name;
            district_set(district);
        }
    }
});

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

    // Name
    if (id == 'name') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');

        // Preg Match 0-9
        let result_number = get_value_form(id).match(/\d/g);

        // Preg Match double space
        let result_double_space = get_value_form(id).match(/  /g);


        if (get_value_form(id) == "") {

            notice_id.innerHTML = `Please fill-up the ${id} feild.`;
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';
            valid_form();
            return true;

            if (result_number) {

                notice_id.innerHTML = `Invalid ${name}, try without this text 0-9.`;
                not_valid_form(id);
            } else {

                if (result_double_space) {

                    notice_id.innerHTML = 'Double space not allowed.';
                    not_valid_form(id);
                } else {

                    notice_id.innerHTML = '';
                    valid_form();
                    return true;
                }
            }
        }
    } /* Name */

    // Blood Group
    if (id == 'bloodgroup') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');

        if (get_value_form(id) == "Blood Group *") {

            notice_id.innerHTML = 'Select The Blood Group';
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';
            valid_form();
            return true;
        }
    } /* Bloog Group */

    // Gender
    if (id == 'gender') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');


        if (get_value_form(id) == "Gender *") {

            notice_id.innerHTML = 'Select Gender';
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';
            valid_form();
            return true;
        }
    } /* Gender */

    // District
    if (id == 'district') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');

        if (get_value_form(id) == "District *") {

            notice_id.innerHTML = 'Select District';
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';
            valid_form();
            return true;
        }
    } /* District */

    // Address
    if (id == 'address') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');


        if (get_value_form(id).length < 10) {

            notice_id.innerHTML = 'Address fields minimum 10 words required.';
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';
            valid_form();
            return true;
        }
    } /* Address */

} // Verify


/* Trigger for validation
------------ */
function all_trigger() {
    my_event('name');
    my_event('bloodgroup');
    my_event('gender');
    my_event('district');
    my_event('address');
}
all_trigger();

// After Submit Button
const submit_button = document.getElementById('button');
submit_button.addEventListener('click', function() {
    verify('name');
    verify('bloodgroup');
    verify('gender');
    verify('district');
    verify('address');

    // if all true then submit form
    if (verify('name') == true && verify('bloodgroup') == true && verify('gender') == true && verify('district') == true && verify('address') == true) {
        // Submitted Success
        document.edit_profile_form.submit();
    } else {
        not_valid_form('Submit Form Error..');
    }

});
</script>