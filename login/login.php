

<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive</title>
    
    <!-- Favicon -->
    <link rel="icon" href="img/chef2.png" type="image/x-icon">

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .text-custom { color: #ff0000; }
        .bg-custom { background-color: #ff0000; }
        .hover\:bg-custom:hover { background-color: #cc0000; }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
<a href="../index.php" class="absolute top-4 left-4 flex items-center text-custom">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor">
        <path d="M15.41 16.59L10.83 12l4.58-4.59L14 6l-6 6 6 6z"/>
    </svg>
</a>
   

    <!-- Form Section -->
    <section class="py-16 bg-gray-100">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold text-custom mb-6">Sign Up / Sign In</h2>
            <div class="space-x-6">
                <button id="showSignUp" class="px-6 py-3 bg-custom text-white rounded-full">Sign Up</button>
                <button id="showSignIn" class="px-6 py-3 bg-gray-300 text-gray-800 rounded-full">Sign In</button>
            </div>
            
            <!-- Sign Up Form -->
            <div id="signUpForm" class="space-y-6 hidden mt-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Sign Up</h3>
                <form action="signup.php" method="POST" class="max-w-md mx-auto bg-white p-6 shadow-lg rounded-lg space-y-6">
                    <input type="hidden" name="action" value="signup">
                    <div>
                        <label for="nom" class="block text-left text-gray-700">Full Name</label>
                        <input type="text" id="nom" name="nom" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Full Name" required>
                    </div>
                    <div>
                        <label for="email" class="block text-left text-gray-700">Email</label>
                        <input type="email" id="email" name="email" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Email" required>
                    </div>
                    <div>
                        <label for="password" class="block text-left text-gray-700">Password</label>
                        <input type="password" id="password" name="password" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Password" required>
                    </div>
                    <div>
                        <label for="adresse" class="block text-left text-gray-700">Address</label>
                        <textarea name="adresse" id="adresse" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Address"></textarea>
                    </div>
                    <div>
                        <label for="telephone" class="block text-left text-gray-700">Telephone</label>
                        <input type="tel" id="telephone" name="telephone" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Telephone">
                    </div>
                    <button type="submit" class="w-full bg-custom text-white p-3 rounded-lg">Sign Up</button>
                </form>
            </div>

            <!-- Sign In Form -->
            <div id="signInForm" class="space-y-6 hidden mt-8">
                <h3 class="text-2xl font-bold text-gray-800 mb-4">Sign In</h3>
                <form action="signup.php" method="POST" class="max-w-md mx-auto bg-white p-6 shadow-lg rounded-lg space-y-6">
                    <input type="hidden" name="action" value="signin">
                    <div>
                        <label for="email_signin" class="block text-left text-gray-700">Email</label>
                        <input type="email" id="email_signin" name="email_l" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Email" required>
                    </div>
                    <div>
                        <label for="password_signin" class="block text-left text-gray-700">Password</label>
                        <input type="password" id="password_signin" name="password_l" class="w-full p-3 border border-gray-300 rounded-lg" placeholder="Password" required>
                    </div>
                    <button type="submit" class="w-full bg-custom text-white p-3 rounded-lg">Sign In</button>
                </form>
            </div>
        </div>
    </section>

    <script src="../script.js"></script>
</body>
</html>

  