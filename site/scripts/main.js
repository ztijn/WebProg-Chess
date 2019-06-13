function logout() {
    console.log("Logged out");
    let logged_out = $.post('scripts/logout.php');
    logged_out.done(function(data) {
        console.log("done")
    })
}

function checkUsername(){
    let username_input = $('#username');
    let cur_val = username_input.val();
    let username_regex = "^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$";
    if (cur_val.match(username_regex) && cur_val !== ''){
        return true;
    } else{
        return false;
    }
}

$(function() {
    //Call logout function when button is clicked
    $('#submit').click(function () {
        if (checkUsername()) {
            $('form').submit();
        }
    });
    $("#logout").click(function() {
        logout();
    });
});