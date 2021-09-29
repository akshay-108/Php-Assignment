$(document).ready(function()
{
    $("#submit").click(function(e){
        e.preventDefault();
        var name=$("#name");
        var email=$("#email");
        $.ajax({
            type:"POST",
            url:'insert.php',
            data:{
                name:name,
                email:email
            }
        }).done(function(data)
        {
            $("#msg").html(data);
        }).fail(function(data)
        {   
            $("#msg").html(data);
        })
    });
});