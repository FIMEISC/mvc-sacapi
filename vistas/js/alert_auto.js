$('#alert-success').fadeIn();     
    setTimeout(function() {
        $("#alert-success").fadeOut();
    },2000);

$('#alert-danger').fadeIn(); 
    setTimeout(function() {
        $("#alert-danger").fadeOut();
    }
    ,2000);


$(document).ready(function() {
    $('#loginform').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: 'login-check.php',
            data: $(this).serialize(),
            success: function(response)
            {
                var jsonData = JSON.parse(response);
                console.log(jsonData);
                if (jsonData.success == "1")
                {
                    location.href = 'main.php?module=start';
                }
                else
                {	
                    location.href = 'index.php?alert=1';
                }
            }
        });
    });
});