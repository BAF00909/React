//-------------------------------------------------------------------------------------
//
// THIS FILE IS NOT A PART OF THE PLUGIN, IT'S ONLY FOR THE DEMO
//
//-------------------------------------------------------------------------------------
!(function(){
    'use strict';
    // finally, initialize photobox on all retrieved images
    $('#gallery').photobox('a', { thumbs:true, loop:false }, callback);
    // using setTimeout to make sure all images were in the DOM, before the history.load() function is looking them up to match the url hash
    setTimeout(window._photobox.history.load, 1000);
    function callback(){
        console.log('callback for loaded content:', this);
    };

})();