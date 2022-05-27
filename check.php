<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <input type="text" id="country" placeholder="enter name">
    <h5 id="cnt_check"></h5>
    <button id="formsubmit" type="submit">submit</button>

    <script type="text/javascript" src="js/jquery.js"></script>
    <script>
        $(document).ready(function() {
                var user_err =true

            $("#country").keyup(function() {
                checkdata();
            })

            function checkdata() {
                var country_val = $("#country").val();
                console.log(country_val);

                if (country_val.length < 3 || country_val.length > 10  ) {
                    $("#cnt_check").show();
                    $("#cnt_check").html("**plese select length 3 to 10");
                    $("#cnt_check").focus();
                    $("#cnt_check").css("color", "red");
                     user_err =false
                    return false
                } else {
                    $("#cnt_check").hide();
                }
            }
            $("#formsubmit").click(function(){
                var user_err =true;
                checkdata();
                if( user_err == true ){
                   return true;
                }else{
                    return false;
                }
            })
        });
    </script>

</body>

</html>