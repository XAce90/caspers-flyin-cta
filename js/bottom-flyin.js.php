<?php
/*
 * JS Output for BOTTOM Fly-In
 */
?>

<script>
  let slideUp = (target, duration=500) => {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = duration + 'ms';
    target.style.boxSizing = 'border-box';
    target.style.height = target.offsetHeight + 'px';
    target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    window.setTimeout( () => {
      target.style.display = 'none';
      target.style.removeProperty('height');
      target.style.removeProperty('padding-top');
      target.style.removeProperty('padding-bottom');
      target.style.removeProperty('margin-top');
      target.style.removeProperty('margin-bottom');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
      //alert("!");
    }, duration);
  }

  let slideDown = (target, duration=500) => {
    target.style.removeProperty('display');
    let display = window.getComputedStyle(target).display;

    if (display === 'none')
      display = 'block';

    target.style.display = display;
    let height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = 0;
    target.style.paddingTop = 0;
    target.style.paddingBottom = 0;
    target.style.marginTop = 0;
    target.style.marginBottom = 0;
    target.offsetHeight;
    target.style.boxSizing = 'border-box';
    target.style.transitionProperty = "height, margin, padding";
    target.style.transitionDuration = duration + 'ms';
    target.style.height = height + 'px';
    target.style.removeProperty('padding-top');
    target.style.removeProperty('padding-bottom');
    target.style.removeProperty('margin-top');
    target.style.removeProperty('margin-bottom');
    window.setTimeout( () => {
      target.style.removeProperty('height');
      target.style.removeProperty('overflow');
      target.style.removeProperty('transition-duration');
      target.style.removeProperty('transition-property');
    }, duration);
  }

  var slideToggle = (target, duration = 500) => {
    if (window.getComputedStyle(target).display === 'none') {
      return slideDown(target, duration);
    } else {
      return slideUp(target, duration);
    }
  }

  function slideWindow() {
    const body = document.querySelector('.cpcta-flyin .cpcta-content-panel')
    slideToggle(body);
    
    document.querySelector('.cpcta-flyin').classList.toggle('slidOut');
  }

  document.addEventListener('DOMContentLoaded', () => {    
    document.querySelector('.cpcta-top-bar').addEventListener('click', () => {
      slideWindow();
    });

    document.querySelector('.cpcta-close').addEventListener('click', () => {
      slideWindow();
    });

    <?php if( get_option('cpcta-enable-autopop') && is_front_page() ) { ?>
      setTimeout(slideWindow, <?php echo get_option('cpcta-autopop-timer'); ?>);
    <?php } ?>

    // set max-height based on size of window
    const windowHeight = window.innerHeight;
    const maxHeight = windowHeight - (windowHeight * .2);
    document.querySelector('.cpcta-content-panel').style.maxHeight = Math.floor(maxHeight) + 'px';
  })
</script>