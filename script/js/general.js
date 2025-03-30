function SetAutoLogout(Minutes) {

    setTimeout(function() {
        window.location.href = 'account-management/uitloggen.php';
    }, Minutes * 60 * 1000);
    
}