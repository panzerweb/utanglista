//show password toggle functionality
  document.querySelectorAll('.show-password-btn').forEach(btn => {
    btn.addEventListener('click', function() {
      const input = this.parentElement.querySelector('input');
      const icon = this.querySelector('i');
      if (input.type === "password") {
        input.type = "text";
        icon.classList.remove('bi-eye-slash');
        icon.classList.add('bi-eye');
      } else {
        input.type = "password";
        icon.classList.remove('bi-eye');
        icon.classList.add('bi-eye-slash');
      }
    });
  });

document.getElementById('togglePassword').addEventListener('click', function () {
  const passwordInput = document.getElementById('admin_password');
  const icon = document.getElementById('togglePasswordIcon');
  if (passwordInput.type === 'password') {
    passwordInput.type = 'text';
    icon.classList.remove('bi-eye');
    icon.classList.add('bi-eye-slash');
    icon.style.transform = 'scale(1.2) rotate(10deg)';
  } else {
    passwordInput.type = 'password';
    icon.classList.remove('bi-eye-slash');
    icon.classList.add('bi-eye');
    icon.style.transform = 'scale(1) rotate(0deg)';
  }
  setTimeout(() => {
    icon.style.transform = '';
  }, 200);
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