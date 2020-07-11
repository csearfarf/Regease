var url=window.location.origin;


lottie.loadAnimation({
  container: document.getElementById('anim'), // the dom element that will contain the animation
  renderer: 'svg',
  autoplay: true,
  path: url+'/regeasev2/assets/'+'data.json' // the path to the animation json
});


function introLoader(element,delay) {

 
  this.open = function(callback) {
    setTimeout(function() {
      $(element).fadeIn(500, function() {
        if(callback !== undefined) callback();
      });
    }, delay);
    
  };
  this.close = function(callback) {
    setTimeout(function() {
      $(element).fadeOut(500, function() {
        if(callback !== undefined) callback();
      });
    }, delay);
  };
}
var LOADER = new introLoader('#introLoader',4000);
$(window).on('load', function() {
  LOADER.close(function() {
  });
});

