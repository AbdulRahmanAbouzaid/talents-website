<footer class=" text-center p-2 bg-light-coral text-white fixedFooter">
  <div class="container">
    <div class="row">
      <div class="col ">
        <p>Copyright 2019 &copy; Tabouk</p>
      </div>
    </div>
  </div>
</footer>

    <script src="/public/js/jquery.js"></script>
    <script src="/public/js/popper.min.js"></script>
    <script src="/public/js/bootstrap.min.js"></script>
    <script src="/public/js/validation.js"></script>
    <script src="/public/js/all-fonts.js"></script>
    <script src="/public/js/fontawesome.js"></script>
    <script >
      function showAndHide(element, password_id) {
        var pass = document.getElementById(password_id);
        if (pass.type === "password") {
          element.classList.toggle("fa-eye-slash");
          pass.type = "text";
        } else {
          element.classList.toggle("fa-eye");
          pass.type = "password";
        }
      }
  </script>
  </body>
</html>
