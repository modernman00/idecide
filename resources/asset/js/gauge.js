// Require JS
var Gauge1 = require("svg-gauge");

var Gauge = window.Gauge1;

// Create a new Gauge
var cpuGauge = Gauge(document.getElementById("cpuSpeed"), {
    max: 100,
    // custom label renderer
    label: function(value) {
      return Math.round(value) + "/" + this.max;
    },
    min: 0,
 
    dialStartAngle: 180,
    dialEndAngle: 0,
    value: 50,

    // Custom dial colors (Optional)
    color: function(value) {
      if(value < 20) {
        return "#5ee432"; // green
      }else if(value < 40) {
        return "#fffa50"; // yellow
      }else if(value < 60) {
        return "#f7aa38"; // orange
      }else {
        return "#ef4655"; // red
      }
    }
});

// Set gauge value
cpuGauge.setValue(75);

// Set value and animate (value, animation duration in seconds)
cpuGauge.setValueAnimated(90, 1);

var gauge3 = Gauge(
    document.getElementById("gauge3"), {
      max: 100,
      value: 50
    }
  );
  
  var gauge4 = Gauge(
    document.getElementById("gauge4"), {
      max: 30000,
      dialStartAngle: 90,
      dialEndAngle: 0,
      value: 50
    }
  );
  