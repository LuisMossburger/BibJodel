class ModelJSON {

  constructor() {
    this.filePath = "";
    this.fileJSON = "";
    this.ajax = new XMLHttpRequest();
  }

  setJSON(filePath) {
    var that = this;
    this.filePath = filePath;
    //AJAX request
    this.ajax.onreadystatechange = function() {
      if (this.status == 200 && this.readyState == 4) {
       that.fileJSON = JSON.parse(this.responseText);
       that.show();
      }
    }
    this.ajax.open("GET", filePath, true);
    this.ajax.send();
  }

  updateJSON(data) {
    this.fileJSON = JSON.parse(data);
  }

  getJSON() {
    return this.fileJSON;
  }

  show() {
    var belegung = document.getElementById("occupancyJSON"),
        template = document.getElementById("templateOccupancy").innerHTML.trim(),
        tmpEl = document.createElement("div");
    for (var key in this.fileJSON["lib"]) {
      tmpEl.innerHTML = template;
      tmpEl.querySelector("h3").innerHTML = "Bibliothek " + key;
      tmpEl.querySelectorAll("input")[0].value = this.fileJSON["lib"][key]["traffic"];
      tmpEl.querySelectorAll("input")[1].value = this.fileJSON["lib"][key]["open"];
      tmpEl.querySelectorAll("input")[2].value = this.fileJSON["lib"][key]["close"];
      belegung.appendChild(tmpEl.firstChild);
    }
  }

}

export default ModelJSON;
