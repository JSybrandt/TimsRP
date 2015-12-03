$('#regform').submit(function () {

    // Get the Login Name value and trim it
    var first = $.trim($('#firstname').val());
    var last = $.trim($('#lastname').val());
    var user = $.trim($('#regname').val());
    var email = $.trim($('#email').val());
    var dob = $.trim($('#DOB').val());
    var male = $('#male').is(':checked')
    var female = $('#female').is(':checked');
    var pswd = $.trim($('#regpassword').val());
    var flag = true;

    // Check if empty of not
    if (first  === '') {
        $(".firstname").removeClass("hidden");
        flag = false;
    }
    else {
        $(".firstname").toggleClass("hidden", true);
    }
    
    if (last  === '') {
        $(".lastname").removeClass("hidden");
        flag = false;
    }
    else {
        $(".lastname").toggleClass("hidden", true);
    }
    if (user  === '') {
        $(".regname").removeClass("hidden");
        flag = false;
    }
    else {
        $(".regname").toggleClass("hidden", true);
    }
    if (email  === '') {
        $(".email").removeClass("hidden");
        flag = false;
    }
    else {
        $(".email").toggleClass("hidden", true);
    }
    if (dob  === '') {
        $(".DOB").removeClass("hidden");
        flag = false;
    }
    else {
        $(".DOB").toggleClass("hidden", true);
    }
    
    if (pswd  === '') {
        $(".regpassword").removeClass("hidden");
        flag = false;
    }
    else {
        $(".regpassword").toggleClass("hidden", true);
    }
    
    if (male  === false && female === false) {
        $(".sex").removeClass("hidden");
        flag = false;
    }
    else {
        $(".sex").toggleClass("hidden", true);
    }
    
    if(flag === false) {
        return flag;
    }
});