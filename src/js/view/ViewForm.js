class ViewForm {

  constructor() {
    //Buttons
    this.infoButton = document.querySelector("#info");
    this.occupancyButton = document.querySelector("#occupancy");
    this.eventsButton = document.querySelector("#events");
    //Divs
    this.infoDiv = document.querySelector("#infoWindow");
    this.occupancyDiv = document.querySelector("#occupancyWindow");
    this.eventsDiv = document.querySelector("#eventsWindow");
    //JSON placeholders
    this.occupancyJSON = document.querySelector("#occupancyJSON");
    this.eventsJSON = document.querySelector("#eventsJSON");
  }

  //set event listeners for navigation buttons
  listen() {
    this.infoButton.addEventListener("click", function(){this.showDiv(true,false,false)}.bind(this));
    this.occupancyButton.addEventListener("click", function(){this.showDiv(false,true,false)}.bind(this));
    this.eventsButton.addEventListener("click", function(){this.showDiv(false,false,true)}.bind(this));
  }

  //show div depending on boolean information (true = display, false = hide)
  showDiv(info,occupancy,events) {
    this.infoDiv.style.display = info ? "initial" : "none";
    this.occupancyDiv.style.display = occupancy ? "initial" : "none";
    this.eventsDiv.style.display = events ? "initial" : "none";
  }

}

export default ViewForm;
