var properties = {
   backgroundColor : '#FF0'
};

var el = $('body .target');

el.pulse(properties, {
  duration : 3250,
  pulses   : 5,
  interval : 800
});
