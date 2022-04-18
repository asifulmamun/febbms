<form method="GET" name="search_become_donor" id="search_become_donor">

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <select name="district" class="" id="district">
            <option selected>District *</option>
        </select>
    </div>

    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        <input type="hidden" name="for" value="becomedonor">
        <select name="blood_group_id" id="blood_group_id">
            <option selected>Blood Group *</option>
            <option value="1">A(+)</option>
            <option value="2">A(-)</option>
            <option value="3">AB(+)</option>
            <option value="4">AB(-)</option>
            <option value="5">B(+)</option>
            <option value="6">B(-)</option>
            <option value="7">O(+)</option>
            <option value="8">O(-)</option>
        </select>
    </div>
</form>
<button id="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Submit</button>



<script>
// Json district
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

// Submit for district Search
let submit_btn = document.getElementById('submit');
submit_btn.addEventListener('click', function() {

    document.getElementById('count_page').innerText = 0; // pagination count

    let blood_group_id = document.search_become_donor.blood_group_id.value;
    let district = document.search_become_donor.district.value;
    showUser(blood_group_id, district, 6, 0);

});

// After Submit Show The Results
function showUser(blood_group_id, district, per_page, page) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML = this.responseText;
        }
    };

    let get_url = `./search_result_become_donor.php?for=becomedonor&blood_group_id=${blood_group_id}&district=${district}&per_page=${per_page}&page=${page}`;
    xmlhttp.open("GET", get_url, true);
    xmlhttp.send();
}
</script>