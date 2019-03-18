function showPW() {
  pw = document.getElementById("passw")
  icon = document.getElementsByClassName("form--imgholder")

  if (pw.type == "text") {
    pw.type = "password"
    icon[0].classList.remove("pwhidden")
  } else {
    pw.type = "text"
    icon[0].classList.add("pwhidden")
  }
}
