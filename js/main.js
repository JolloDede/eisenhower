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

  heute = new Date()
  day = heute.getDate()
  month = heute.getMonth() + 1
  year = heute.getFullYear()
  if(day < 10){
    day = '0' + day
  }
  if(month < 10){
    month = '0' + month
  }
  today = year+'-'+month+'-'+day
  document.getElementById("date").setAttribute("min", today)
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
      bg = document.getElementById("queryvalue--bg")
      bg.classList.add("queryvalue--bg")

      infos = document.getElementById("queryvalue--display")
      infos.classList.add("queryvalue--display")
      infos.innerHTML += this.responseText
    }
  }
  xhttp.open("GET", "../php/queryvalue.php?q=" + index, true)
  xhttp.send()
}

function queryvalueClose() {
  bg = document.getElementById("queryvalue--bg")
  bg.classList.remove("queryvalue--bg")

  infos = document.getElementById("queryvalue--display")
  infos.classList.remove("queryvalue--display")

  table = document.getElementById("queryvalue--table")
  table.parentNode.removeChild(table)

  button = document.getElementById("query--delete")
  button.parentNode.removeChild(button)
}

function queryDelete(id) {
  var xhttp = new XMLHttpRequest()
  xhttp.open("GET", "../php/querydelete.php?q=" + id, true)
  xhttp.send()
  location.reload()
}
