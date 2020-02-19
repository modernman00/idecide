const totalScore = parseInt(document.getElementById('totalScore').value);

const financeScore = parseInt(document.getElementById('financeCat').value);

const purposeScore = parseInt(document.getElementById('purposeCat').value);

var purpose = (purposeScore > 80)?"Impactful" : "Not Impactful";

// Element inside which you want to see the chart.
let purChart = document.querySelector('#purposeChart');
let theMain = document.querySelector('#main');
let conChart = document.querySelector('#concernChart');
let finChart = document.querySelector('#financeChart');

// let purposeData = {
//   arcColors: ['rgb(44, 151, 222)', 'lightgray'],
//   arcDelimiters: [purposeScore],
//   rangeLabel: ['0%', '100%'],
//   centralLabel: '2',
// };

let main = {
  hasNeedle: true,
  needleColor: 'blue',
  arcColors: ['rgb(245, 7, 7)', 'rgb(255, 242, 3)', 'rgb(26, 143, 20)'],
  arcDelimiters: [65, 85, 99.99],
  arcLabelFontSize: 10,
  arcLabels: ["Don't buy", 'Think Again', 'Buy'],
  arcPadding: 3,
  arcPaddingColor: 'white',
  rangeLabel: ['0', '100'],
  needleStartValue: 0  
};


let purposeData = {
   hasNeedle: true,
    needleColor: 'blue',
  arcColors: ['rgb(245, 7, 7)', 'rgb(255, 242, 3)', 'rgb(26, 143, 20)'],
  arcDelimiters: [60, 90],
  arcPadding: 1,
  arcPaddingColor: 'white',
  // arcLabels: ['Struggling?', 'Just ok', 'Strong'],
  arcLabelFontSize: 10,
  // label options
  rangeLabel: ['0', '100'],
  // centralLabel: financeScore,
  rangeLabelFontSize: true,
  centralLabel: purpose,
  rangeLabelFontSize: 15
};

 
let finance = {
    hasNeedle: true,
    needleColor: 'black',
    arcColors: ['rgb(245, 7, 7)', 'rgb(255, 242, 3)', 'rgb(26, 143, 20)'],
    arcDelimiters: [60, 90],
    arcPadding: 1,
    arcPaddingColor: 'white',
    arcLabels: ['Struggling?', 'Just ok', 'Strong'],
    arcLabelFontSize: 10,
    //arcOverEffect: false,
    // label options
    rangeLabel: ['0', '100'],
    // centralLabel: financeScore,
    rangeLabelFontSize: true,
    // labelsFont: 'Consolas',

};
// Drawing and updating the chart.  

GaugeChart
  .gaugeChart(theMain, 600, main)
  .updateNeedle(totalScore);

GaugeChart
  .gaugeChart(purChart, 400, purposeData)
  .updateNeedle(purposeScore);

// GaugeChart
//   .gaugeChart(conChart, 400, concern)
//   .updateNeedle(60);

GaugeChart
  .gaugeChart(finChart, 400, finance)
  .updateNeedle(financeScore);

