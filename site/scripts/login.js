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
    $('#submit').click(function () {
        if (checkUsername()) {
            $('form').submit();
        }
    });
});