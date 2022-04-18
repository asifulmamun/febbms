<main id="request_blood">
    <form action="./request-blood.php" method="POST" name="request_blood_form" id="request_blood_form">
        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="name" class="mdl-textfield__input" type="text" id="name">
            <label class="mdl-textfield__label" for="name">Name *</label>
            <span class="notice_red" id="namenotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select name="bloodGroup" class="" id="bloodgroup">
                <option selected>Blood Group *</option>
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
            <input name="mobile" class="mdl-textfield__input" type="text" id="mobile">
            <label class="mdl-textfield__label" for="mobile">Phone Number *</label>
            <span class="notice_red" id="mobilenotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <span>Last Date of Need Blood</span>
            <input name="blooddonatelastdate" class="mdl-textfield__input" type="date" id="blooddonatelastdate">
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select name="requiredonatebag" class="" id="requiredonatebag">
                    <option selected>Required Bag of Blood *</option>
                    <option value="1">1 Bag</option>
                    <option value="2">2 Bags</option>
                    <option value="3">3 Bags</option>
                    <option value="4">4 Bags</option>
                    <option value="5">5 Bags</option>
                    <option value="6">More than 5 Bags</option>
            </select>
            <span class="notice_red" id="requiredonatebagnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select name="district" class="" id="district">
                <option selected>District *</option>
            </select>
            <span class="notice_red" id="districtnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="hospitalandaddress" class="mdl-textfield__input" type="text" id="hospitalandaddress">
            <label class="mdl-textfield__label" for="hospitalandaddress">Hospital Name & Address *</label>
            <span class="notice_red" id="hospitalandaddressnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="socialUrl" class="mdl-textfield__input" type="text" id="socialurl">
            <label class="mdl-textfield__label" for="socialurl">Social URL</label>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <select name="gender" class="" id="gender">
                <option selected>Gender *</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            <span class="notice_red" id="gendernotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="pass" class="mdl-textfield__input" type="password" id="pass" autocomplete="on">
            <label class="mdl-textfield__label" for="pass">Enter Password *</label>
            <span class="notice_red" id="passnotice"></span>
        </div>

        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
            <input name="repass" class="mdl-textfield__input" type="password" id="repass" autocomplete="on">
            <label class="mdl-textfield__label" for="repass">Re-type Password *</label>
            <span class="notice_red" id="repassnotice"></span>
        </div>
    </form>
    <button id="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Submit</button>
</main>

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

    // Mobile
    if (id == 'mobile') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');

        // preg Match Capital Text
        let result_cap_text = get_value_form(id).match(/[A-Z]/g);

        // preg Match Small Text
        let result_sm_text = get_value_form(id).match(/[a-z]/g);

        // Preg Match 0-9
        let result_number = get_value_form(id).match(/\d/g);

        // preg Match single space
        let result_single_space = get_value_form(id).match(/ /g);

        // Spacial Charecter
        let special_char = /[ `!@#$%^&*()_\-+=\[\]{};':"\\|,.<>\/?~]/;
        let result_special_char = special_char.test(get_value_form(id)); // result_special_char == true/false

        // If Mobile Ok
        function mobile_ok() {
            notice_id.innerHTML = ``;
            return true;
        }

        // Main mobile verify
        if(get_value_form(id).startsWith("0") != true){

            notice_id.innerHTML = `Please start with '01'.`;
            not_valid_form(id);
        } else if (result_cap_text || result_sm_text || result_single_space || result_special_char == true || get_value_form(id) == "") {

            notice_id.innerHTML = `Text, Space & Special Charecter not allowed.`;
            not_valid_form(id);
        } else if (get_value_form(id).startsWith("0") == true && result_number) {

            if (get_value_form(id).length < 11) {

                notice_id.innerHTML = `Need minimum '11' digit.`;
                not_valid_form(id);
            } else if (get_value_form(id).length > 11) {

                notice_id.innerHTML = `More than '11' digit not allowed.`;
                not_valid_form(id);
            }else{

                // main result
                mobile_ok();
                return mobile_ok();
            }

        } else {

            notice_id.innerHTML = `Invalid Mobile Number.`;
            not_valid_form(id);
        }

    } /* mobile */

    // Required Bag of Blood
    if (id == 'requiredonatebag') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');

        if (get_value_form(id) == "Required Bag of Blood *") {

            notice_id.innerHTML = 'Please select, How many blood need?';
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';
            valid_form();
            return true;
        }
    } /* Required Bag of Blood */

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

    // Hospital
    if (id == 'hospitalandaddress') {

        // Notice ID
        let notice_id = document.getElementById(id + 'notice');


        if (get_value_form(id).length < 10) {

            notice_id.innerHTML = 'Hospital address fields minimum 10 words required.';
            not_valid_form(id);
        } else {

            notice_id.innerHTML = '';
            valid_form();
            return true;
        }
    } /* Address */

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
    my_event('name');
    my_event('bloodgroup');
    my_event('mobile');
    my_event('requiredonatebag');
    my_event('gender');
    my_event('district');
    my_event('hospitalandaddress');
    my_event('pass');
    my_event('repass');

}
all_trigger();

// After Submit Button
const submit_button = document.getElementById('button');
submit_button.addEventListener('click', function() {
    verify('name');
    verify('bloodgroup');
    verify('mobile');
    verify('requiredonatebag');
    verify('gender');
    verify('district');
    verify('hospitalandaddress');
    verify('pass');
    verify('repass');


    // if all true then submit form
    if (verify('name') == true && verify('bloodgroup') == true && verify('mobile') == true && verify('requiredonatebag') == true && verify('gender') == true && verify('district') == true && verify('hospitalandaddress') == true) {
        // Submitted Success
        document.request_blood_form.submit();
    } else {
        not_valid_form('Submit Form Error..');
    }

});
</script>