<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello there!</title>
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Font-->
    <link rel="stylesheet" type="text/css" href="css/opensans-font.css">
    <link rel="stylesheet" type="text/css" href="fonts/line-awesome/css/line-awesome.min.css">
    <!-- Jquery -->
    <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <!-- Tailwind -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
   
</head>
<body class="bg-blue-950">
    <div class="flex flex-col items-center justify-center">
        <div class="bg-white rounded flex justify-between items-center p-10 mt-10">
            <div class="flex flex-col items-center">
                <img src="https://st2.depositphotos.com/1561359/8050/v/450/depositphotos_80506350-stock-illustration-questionnaire-symbol-showing-through-magnifying.jpg" alt="Mystery Game Image" class="mb-4">
                <form class="" action="signin.php">
                    <input type="submit"  name="account" class="hover:bg-blue-500 bg-blue-950 text-white py-2 px-4 rounded cursor-pointer text-lg" value="Have An Account">
                </form>
            </div>
            <form class="flex flex-col items-center space-y-4" action="register.php" method="post" id="myform">
                
                <div class="space-y-2">
                <h2 class="text-blue-950 text-7xl font-bold mb-4">SIGN UP</h2>
                <div class="flex flex-col space-y-1">
                    <label for="your_email" class="text-blue-950">Username</label>
                    <input type="text" name="your_username" id="your_username" class="border border-blue-950 rounded p-2" >
                </div>

                <div class="flex flex-col space-y-1">
                    <label for="your_email" class="text-blue-950">Email</label>
                    <input type="text" name="your_email" id="your_email" class="border border-blue-950 rounded p-2" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                </div>
                
                <div class="">
                    <div class="flex flex-col space-y-1">
                        <label for="password" class="text-blue-950">Password</label>
                        <input type="password" name="password" id="password" class="border border-blue-950 rounded p-2" required>
                    </div>
                    <div class="flex flex-col space-y-1">
                        <label for="comfirm-password" class="text-blue-950">Confirm Password</label>
                        <input type="password" name="comfirm_password" id="comfirm_password" class="border border-blue-950 rounded p-2" required>
                    </div>
                </div>
                <div class="form-row-last">
                    <input type="submit" name="register" class="hover:bg-blue-950 hover:text-white border border-blue-950 text-blue-950 py-1 px-4 rounded cursor-pointer text-lg" value="Register">
                </div>

                </div>
                
            </form>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script>
        // just for the demos, avoids form submit
        $( "#myform" ).validate({
            rules: {
                password: "required",
                comfirm_password: {
                    equalTo: "#password"
                }
            },
            messages: {
                your_email: {
                    required: "Please provide an email"
                },
                password: {
                    required: "Please enter a password"
                },
                comfirm_password: {
                    required: "Please enter a password",
                    equalTo: "Wrong Password"
                }
            }
        });
    </script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>
