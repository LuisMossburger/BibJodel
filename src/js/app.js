//ToDo:
// > Kommunikation von ViewForm mit Observable Komponente

import ViewForm from "./view/ViewForm.js";
import ViewJSON from "./view/ViewJSON.js";
import ModelJSON from "./model/ModelJSON.js";

var viewForm = new ViewForm(),
    viewJSON = new ViewJSON(),
    occupancyJSON = new ModelJSON(),
    eventsJSON = new ModelJSON(),
    occupancyData = {},
    eventsData = {};

//Listener for form changing
viewForm.listen();
//Read data from JSON files
viewJSON.show(occupancyJSON.setJSON("data/libs.json"));
viewJSON.show(eventsJSON.setJSON("data/events.json"));
