<form method="GET" name="search_become_donor" id="search_become_donor">
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
// Submit for global Search
let submit_btn = document.getElementById('submit');
submit_btn.addEventListener('click', function() {

    document.getElementById('count_page').innerText = 0; // pagination count

    let blood_group_id = document.search_become_donor.blood_group_id.value;
    showUser(blood_group_id, 6, 0);

});

// After Submit Show The Results
function showUser(blood_group_id, per_page, page) {

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById("result").innerHTML = this.responseText;
        }
    };

    let get_url = `./search_result_become_donor.php?for=becomedonor&blood_group_id=${blood_group_id}&per_page=${per_page}&page=${page}`;
    xmlhttp.open("GET", get_url, true);
    xmlhttp.send();
}
</script>