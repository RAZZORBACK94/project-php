function validate() {
  var username = document.getElementById("username")[0].value;
  var email = document.getElementById("username")[0].value;
  var password = document.getElementById("username")[0].value;

  if (username == "" || email == "" || password == "") {
    var errormessage = document.querySelector(".error-message");
    errormessage.textContent = "tolong isi semua kolom";
    errormessage.style.backgroundcolor = "yellow";
    errormessage.style.borderRadius = "11 px";
    errormessage.style.display = "block";
  } else {
    window.location.href = "login.php";
  }
}
