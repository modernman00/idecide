const totalScore = parseInt(document.getElementById('totalScore').value);

const financeScore = parseInt(document.getElementById('financeCat').value);

const purposeScore = parseInt(document.getElementById('purposeCat').value);

const purpose = "";

if(purposeScore > 80) {
  purpose = "Impactful";
} else{
  purpose = "Just another item";
}

// Element inside which you want to see the chart.
let element5 = document.querySelector('#gaugeArea5')
let theMain = document.querySelector('#main')
let element6 = document.querySelector('#gaugeArea6')
let element4 = document.querySelector('#gaugeArea4')

let options1 = {
  arcColors: ['rgb(44, 151, 222)', 'lightgray'],
  arcDelimiters: [80],
  rangeLabel: ['0%', '100%'],
  centralLabel: '70%',
}

let main = {
  hasNeedle: true,
  needleColor: 'black',
  arcColors: ['rgb(255, 84, 84)', 'rgb(239, 214, 19)', 'rgb(61, 204, 91)'],
  arcDelimiters: [50, 85, 99.99],
  arcLabels: ["Don't buy", 'Think', 'Buy'],
  arcPadding: 6,
  arcPaddingColor: 'white',
  rangeLabel: ['0', '100'],
  needleStartValue: 0,
}

let options3 = {
    hasNeedle: true,
    outerNeedle: true,
    needleColor: 'rgb(166, 206, 227)',
      arcDelimiters: [20, 40, 60],
      rangeLabel: ['-10', '10'],
    centralLabel: '2',
    rangeLabelFontSize: 42,
}

 
let finance = {
    hasNeedle: true,
    needleColor: 'black',
    arcColors: ['red', 'yellow', 'green'],
    arcDelimiters: [60, 90],
    arcPadding: 6,
    arcPaddingColor: 'white',
    arcLabels: ['Struggling?', 'Just ok', 'Strong'],
    arcLabelFontSize: false,
    //arcOverEffect: false,
    // label options
    rangeLabel: ['0', '100'],
    centralLabel: financeScore,
    rangeLabelFontSize: true,
    labelsFont: 'Consolas',

}
// Drawing and updating the chart.  

GaugeChart
  .gaugeChart(theMain, 400, main)
  .updateNeedle(totalScore)

GaugeChart
  .gaugeChart(element5, 400, options1)
  .updateNeedle(70)

GaugeChart
  .gaugeChart(element6, 400, options3)
  .updateNeedle(60)

GaugeChart
  .gaugeChart(element4, 400, finance)
  .updateNeedle(financeScore)

