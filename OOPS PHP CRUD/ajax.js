$(document).ready(function()
{
    $("#submit").click(function(e){
        e.preventDefault();
        var name=$('#name').val();
        var email=$('#email').val();
        $.ajax({
            type:"POST",
            url:'insert.php',
            data:{
                name:name,
                email:email
            }
        }).done(function(msg)
        {
            $("#result1").html(msg);
        }).fail(function(msg)
        {   
            $("#result2").html(msg);
        })
    });
});
