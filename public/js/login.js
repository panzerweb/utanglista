//show password toggle functionality
document.addEventListener("DOMContentLoaded", function () {
  const toggleBtn = document.getElementById("togglePassword");
  const passwordInput = document.getElementById("password");

  if (toggleBtn && passwordInput) {
    toggleBtn.addEventListener("click", function () {
      const icon = this.querySelector("i");
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("bi-eye");
        icon.classList.add("bi-eye-slash");
      } else {
        passwordInput.type = "password";
        icon.classList.remove("bi-eye-slash");
        icon.classList.add("bi-eye");
      }
    });
  } else {
    console.warn("Toggle or password input not found!");
  }
});


function login(){
  let admin_email = document.getElementById("admin_email").value;
  let admin_password = document.getElementById("admin_password").value;

  const formData = new FormData();
  formData.append('admin_email', admin_email);
  formData.append('admin_password', admin_password);

  fetch('./api/login.php', {
    method: 'POST',
    body: formData
  })
  .then(response => response.text())
  .then(data => {
    if (data.trim() == "success"){
      Swal.fire({
        icon: 'success',
        title: "Log-in Succesfully",
        showConfirmButton: false,
        timer: 1000
      })

      setTimeout(() => {
        window.location.href = './views/dashboard.php'
      }, 1000);
    } else{
      Swal.fire({
        icon: 'success',
        title: "Wrong password",
        text: `${data}`,
        showConfirmButton: false,
        timer: 1000
      })
      console.log(data);
    }
  })

  .catch(error => {
    console.log(error);
  })
}