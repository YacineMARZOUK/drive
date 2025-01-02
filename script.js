const signUpForm = document.getElementById('signUpForm');
        const signInForm = document.getElementById('signInForm');
        const showSignUpButton = document.getElementById('showSignUp');
        const showSignInButton = document.getElementById('showSignIn');

        showSignUpButton.addEventListener('click', () => {
            signUpForm.classList.remove('hidden');
            signInForm.classList.add('hidden');
            showSignUpButton.classList.add('bg-custom', 'text-white');
            showSignUpButton.classList.remove('bg-gray-300', 'text-gray-800');
            showSignInButton.classList.add('bg-gray-300', 'text-gray-800');
            showSignInButton.classList.remove('bg-custom', 'text-white');
        });

        showSignInButton.addEventListener('click', () => {
            signInForm.classList.remove('hidden');
            signUpForm.classList.add('hidden');
            showSignInButton.classList.add('bg-custom', 'text-white');
            showSignInButton.classList.remove('bg-gray-300', 'text-gray-800');
            showSignUpButton.classList.add('bg-gray-300', 'text-gray-800');
            showSignUpButton.classList.remove('bg-custom', 'text-white');
        });