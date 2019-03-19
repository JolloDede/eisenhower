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
  form = document.getElementById("newentry--form")
  form.classList.add("newentry--form")

  bg = document.getElementById("newentry--bg")
  bg.classList.add("newentry--bg")
}

function newEntryClose() {
  form = document.getElementById("newentry--form")
  form.classList.remove("newentry--form")

  bg = document.getElementById("newentry--bg")
  bg.classList.remove("newentry--bg")
}

function getInformations(index) {
  var xhttp = new XMLHttpRequest()
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      bg = document.getElementById("newentry--bg")
      bg.classList.add("newentry--bg")

      infos = document.getElementById("queryvalue--display")
      infos.classList.add("queryvalue--display")
      infos.innerHTML += this.responseText
    }
  }
  xhttp.open("GET", "../php/queryvalue.php?q=" + index, true)
  xhttp.send()
}

function queryvalueClose() {
  bg = document.getElementById("newentry--bg")
  bg.classList.remove("newentry--bg")

  infos = document.getElementById("queryvalue--display")
  infos.classList.remove("queryvalue--display")

  table = document.getElementById("queryvalue--table")
  table.parentNode.removeChild(table)
}
