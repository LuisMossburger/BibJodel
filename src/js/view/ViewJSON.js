class ViewJSON {

  constructor() {
    //JSON templates
    this.occupancyTemplate = document.querySelector("#templateOccupancy");
    this.eventsTemplate = document.querySelector("#templateEvents");
  }

  show(data) {
  }

  save() {
    var newData = "",
        newJSON = JSON.stringify(newData);
    return newJSON;
  }

}

export default ViewJSON;
