const totalScore = parseInt(document.getElementById('totalScore').value);

const financeScore = parseInt(document.getElementById('financeCat').value);

const purposeScore = parseInt(document.getElementById('purposeCat').value);

var purpose = (purposeScore > 80)?"Impactful" : "Just another item";

// Element inside which you want to see the chart.
let element5 = document.querySelector('#purposeChart');
let theMain = document.querySelector('#main');
let element6 = document.querySelector('#concernChart');
let element4 = document.querySelector('#financeChart');

let purposeData = {
  arcColors: ['rgb(44, 151, 222)', 'lightgray'],
  arcDelimiters: [80],
  rangeLabel: ['0%', '100%'],
  centralLabel: purposeScore,
};

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

let options3 = {
    hasNeedle: true,
    outerNeedle: true,
    needleColor: 'rgb(166, 206, 227)',
      arcDelimiters: [20, 40, 60],
      rangeLabel: ['-10', '10'],
    centralLabel: '2',
    rangeLabelFontSize: 42,
};

 
let finance = {
    hasNeedle: true,
    needleColor: 'black',
    arcColors: ['red', 'yellow', 'green'],
    arcDelimiters: [60, 90],
    arcPadding: 3,
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
  .gaugeChart(element5, 400, purposeData)
  .updateNeedle(purposeScore);

GaugeChart
  .gaugeChart(element6, 400, options3)
  .updateNeedle(60);

GaugeChart
  .gaugeChart(element4, 400, finance)
  .updateNeedle(financeScore);

