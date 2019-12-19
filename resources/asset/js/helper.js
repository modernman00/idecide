const curr = (currency) => {
  const owo = (currency == 'naira') ? "<span>&#8358;</span>" : "<span>&#163;</span>";
  return owo;
}

 // number format

 var naija = { style: 'currency', currency: 'NGN' };
 var numberFormatNaija = new Intl.NumberFormat('en-NGR', naija);
 
 var british = { style: 'currency', currency: 'GBP' };
 var numberFormatBritain = new Intl.NumberFormat('en-GB', british);

 // ROUND NUMBER TO TWO

 const roundToTwo = (num) => {
  return +(Math.round(num + "e+2") + "e-2");
}

//go back
const goBack = () => {
  window.history.back()
}

// convert to uppercase 
const toUpper = (abi) => {
  $(abi).change(() => {
    const res = $(abi).val();
    const out = res.toUpperCase();
    $(abi).val(out);
  });
}

// timeout
setTimeout(function() {
  window.location.href = "/signout";
}, 6000000);
// TOOLTIP
$(function() {
  $(document ).tooltip();
});
 