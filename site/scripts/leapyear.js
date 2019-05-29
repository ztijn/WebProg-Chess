$(function() {
    let url=location.href;
    let urlFilename = url.substring(url.lastIndexOf('/')+1);

    // only use this script on the leapyear page
    if (urlFilename==="leapyear.php"){
        validation();
    }
});

function validation() {
    // Check name
    $('#name').keyup(function() {
        checkName();
    });

    // Check age
    $('#age').keyup(function() {
        checkAge();
    });

    // Check mail address
    $('#mail').keyup(function() {
        checkMail();
    });

    // Check residence
    $('#place').keyup(function() {
        checkResidence();
    });

    // Check all fields on submit
    $('#confirm').click(function() {
        if (checkName() && checkAge() && checkMail() && checkResidence()){
            $('form').submit();
        }
    })
}

function checkName(){
    let name_input = $('#name');
    let cur_val = name_input.val();
    let name_regex = "^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$";
    if (cur_val.match(name_regex) && cur_val !== ''){
        name_input.removeClass('is-invalid');
        name_input.addClass('is-valid');
        return true;
    } else{
        name_input.removeClass('is-valid');
        name_input.addClass('is-invalid');
        return false;
    }
}

function checkAge(){
    let age_input = $('#age');
    let cur_val = age_input.val();
    let age_regex = "^[0-9]+$";
    if (cur_val.match(age_regex) && cur_val !== ''){
        age_input.removeClass('is-invalid');
        age_input.addClass('is-valid');
        return true;
    } else{
        age_input.removeClass('is-valid');
        age_input.addClass('is-invalid');
        return false;
    }
}

function checkMail(){
    let mail_input = $('#mail');
    let cur_val = mail_input.val();
    let mail_regex = "[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?";
    if (cur_val.match(mail_regex) && cur_val !== ''){
        mail_input.removeClass('is-invalid');
        mail_input.addClass('is-valid');
        return true;
    } else{
        mail_input.removeClass('is-valid');
        mail_input.addClass('is-invalid');
        return false;
    }
}

function checkResidence(){
    let place_input = $('#place');
    let cur_val = place_input.val();
    let place_regex = "^([a-zA-Z\u0080-\u024F]+(?:. |-| |'))*[a-zA-Z\u0080-\u024F]*$";
    if (cur_val.match(place_regex) && cur_val !== ''){
        place_input.removeClass('is-invalid');
        place_input.addClass('is-valid');
        return true;
    } else{
        place_input.removeClass('is-valid');
        place_input.addClass('is-invalid');
        return false;
    }
}