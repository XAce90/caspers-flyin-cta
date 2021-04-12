const slideWindow = () => {
  document.querySelector('.cpcta-flyin').classList.toggle('slidOut');
  
  // todo: mobile logic
  // var CTA = '<?php echo addslashes(get_option('cpcta-top-bar-text')); ?>';
  // if( jQuery(window).width() > 480) {
  //   jQuery('.cpcta-flyin .cpcta-top-bar').toggleClass('slidOut'); //top-bar follows content-panel on tablet and desktop
  //   //change cpcta-top-bar content based on position
  //   if(jQuery('.cpcta-flyin .cpcta-top-bar').hasClass('slidOut')){
  //     jQuery('.cpcta-flyin .cpcta-top-bar').text('Close');
  //   } else {
  //     jQuery('.cpcta-flyin .cpcta-top-bar').text(CTA);
  //   }
  // }	
}

document.addEventListener('DOMContentLoaded', () => {   
  /**
   * Once the content finishes loading, attach the following event listeners.
   * 1. When a user clicks on the tab (i.e. top-bar), reveal/hide the content window.
   * 2. When a user clicks on the "close" button, hide the content window
   * 3. TODO? Listen to browser resize?
   */ 
  document.querySelector('.cpcta-top-bar').addEventListener('click', () => {
    slideWindow();
  });

  document.querySelector('.cpcta-close').addEventListener('click', () => {
    slideWindow();
  });

  // auto-pop out cta window
  const autopopTimer = document.querySelector('.cpcta-flyin').dataset.autopopTimer;
  if(autopopTimer) {
    setTimeout(slideWindow, parseInt(autopopTimer));
  }

  // compensate for logged in admin bar
  const wpadminbar = document.querySelector('#wpadminbar');
  if(wpadminbar) {
    const offset = wpadminbar.offsetHeight;
    const newHeight = window.innerHeight - offset;
    document.querySelector('.cpcta-content-panel').style.marginTop = `${offset}px`;
    document.querySelector('.cpcta-content-panel').style.height = `${newHeight}px`;
  }
})