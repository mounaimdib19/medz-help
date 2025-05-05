document.addEventListener("DOMContentLoaded", function () {
  const formContainer = document.querySelector(".form_container");
  const loginForm = document.querySelector(".login_form");
  const signupForm = document.querySelector(".signup_form");

  //formContainer.classList.add("active");
  //loginForm.style.display = "block";
  //signupForm.style.display = "none"; // Hide signup form initially

  const formCloseBtn = document.querySelector(".form_close");
  const signupLink = document.querySelector("#signupLink");
  const loginLink = document.querySelector("#loginLink");
  const pwShowHide = document.querySelectorAll(".pw_hide");

  formCloseBtn.addEventListener("click", () => {
    formContainer.classList.remove("active");
    loginForm.style.display = "block";
    signupForm.style.display = "none";
  });

  pwShowHide.forEach((icon) => {
    icon.addEventListener("click", () => {
      let getPwInput = icon.parentElement.querySelector("input");
      if (getPwInput.type === "password") {
        getPwInput.type = "text";
        icon.classList.replace("uil-eye-slash", "uil-eye");
      } else {
        getPwInput.type = "password";
        icon.classList.replace("uil-eye", "uil-eye-slash");
      }
    });
  });

  signupLink.addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.style.display = "none";
    signupForm.style.display = "block";
  });

  loginLink.addEventListener("click", (e) => {
    e.preventDefault();
    loginForm.style.display = "block";
    signupForm.style.display = "none";
    document.getElementById("signupForm").reset();
  });


  const loginEmailInput = document.getElementById("login-email");
  const loginPasswordInput = document.getElementById("passwordInput");
  const errorLoginEmail = document.getElementById("error-login-email");
  const errorLoginPassword = document.getElementById("error-login-password");

  loginEmailInput.addEventListener("input", () => {
    const loginEmail = loginEmailInput.value;

    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(loginEmail)) {
      errorLoginEmail.textContent = "Invalid email address";
    } else {
      errorLoginEmail.textContent = "";
    }
  });

  loginPasswordInput.addEventListener("input", () => {
    const loginPassword = loginPasswordInput.value;

    if (loginPassword.length < 6) {
      errorLoginPassword.textContent = "Password must be at least 6 characters";
    } else {
      errorLoginPassword.textContent = "";
    }
  });

  const signupFullNameInput = document.getElementById("fullNameInput");
  const signupEmailInput = document.getElementById("signup-email");
  const signupPasswordInput = document.getElementById("signup-password");
  const confirmSignupPasswordInput = document.getElementById("confirmPasswordInput");
  const errorSignupFullName = document.getElementById("error-signup-fullname");
  const errorSignupEmail = document.getElementById("error-signup-email");
  const errorSignupPassword = document.getElementById("error-signup-password");

  signupFullNameInput.addEventListener("input", () => {
    const signupFullName = signupFullNameInput.value;


    const fullNameRegex = /^[A-Za-z]+(\s[A-Za-z]+)+$/;

    if (!fullNameRegex.test(signupFullName)) {
      errorSignupFullName.textContent = "Invalid full name";
    } else {
      errorSignupFullName.textContent = "";
    }
  });

  signupEmailInput.addEventListener("input", () => {
    const signupEmail = signupEmailInput.value;

    if (!signupEmail.match(/^[^\s@]+@[^\s@]+\.[^\s@]+$/)) {
      errorSignupEmail.textContent = "Invalid email address";
    } else {
      errorSignupEmail.textContent = "";
    }
  });

  signupPasswordInput.addEventListener("input", () => {
    const signupPassword = signupPasswordInput.value;

    if (signupPassword.length < 8) {
      errorSignupPassword.textContent = "Password must be at least 8 characters";
    } else {
      errorSignupPassword.textContent = "";
    }
  });

  confirmSignupPasswordInput.addEventListener("input", () => {
    const confirmSignupPassword = confirmSignupPasswordInput.value;
    const signupPassword = signupPasswordInput.value;

    if (confirmSignupPassword !== signupPassword) {
      errorSignupPassword.textContent = "Passwords do not match";
    } else {
      errorSignupPassword.textContent = "";
    }
  });
});
