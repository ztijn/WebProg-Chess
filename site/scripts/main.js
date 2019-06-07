function logout() {
    console.log("Logged out");
    let logged_out = $.post('scripts/logout.php');
    logged_out.done(function(data) {
        console.log("done")
    })
}

$(function() {
    //Call logout function when button is clicked
    $("#logout").click(function() {
        logout();
    });
});