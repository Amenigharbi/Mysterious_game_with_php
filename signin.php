<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hello there !</title>
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
<body class="bg-gray-800">
    <div class="flex flex-col items-center justify-center h-screen">
        <div class="bg-white rounded p-10 w-full max-w-md">
            <div class="flex flex-col items-center space-y-4">
                <img src="https://plateaumarmots.fr/wp-content/uploads/2019/01/myst%C3%A8res-teaseur.jpg" alt="Mystery Game Image" class="mb-4">
                <form action="signup.php">
                    <input type="submit" name="account" class="hover:bg-gray-700 bg-gray-800 text-white py-2 px-4 rounded cursor-pointer text-lg" value="Don't Have An Account?">
                </form>
            </div>
            <form class="flex flex-col space-y-4" action="login.php" method="post" id="myform">
                
                <div class="space-y-2">
                    <h2 class="text-gray-800 text-3xl font-bold mb-4">SIGN IN</h2>

                    <div class="flex flex-col space-y-1">
                        <label for="your_email" class="text-gray-800">Email</label>
                        <input type="text" name="your_email" id="your_email" class="border border-gray-800 rounded p-2" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
                    </div>
                    
                    <div class="flex flex-col space-y-1">
                        <label for="password" class="text-gray-800">Password</label>
                        <input type="password" name="password" id="password" class="border border-gray-800 rounded p-2" required>
                    </div>
                    
                    <div class="form-row-last">
                        <input type="submit" name="login" class="hover:bg-gray-800 hover:text-white border border-gray-800 text-gray-800 py-1 px-4 rounded cursor-pointer text-lg" value="Log In">
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
