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

function newEntry() {
  modal = document.getElementById("newentry--modal")
  modal.classList.add("newentry--modal")

  bg = document.getElementById("newentry--bg")
  bg.classList.add("newentry--bg")
  // Modales Fenster für das hinzufügen der neuen Elemente in die Datenbank.
}

function newEntryClose() {
  modal = document.getElementById("newentry--modal")
  modal.classList.remove("newentry--modal")

  bg = document.getElementById("newentry--bg")
  bg.classList.remove("newentry--bg")
}
