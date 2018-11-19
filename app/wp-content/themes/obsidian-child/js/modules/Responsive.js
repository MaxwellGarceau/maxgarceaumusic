import $ from 'jquery';

class Responsive {
  constructor() {
    // Declare Variables
    this.navMenu = $('#menu-main-menu');
    this.siteTitle = $('#masthead .site-title');
    this.navMenuBreakpoint = 767;

    this.init();
  };
  init = () => {
    this.onLoad();
    this.onScreenResize();
  };
  onScreenResize = () => {
    $(window).resize((e) => {
      this.handleNavMenu(e);
    });
  };
  onLoad = () => {
    this.handleNavMenu();
  };
  handleNavMenu = (e) => {
    const screenWidth = e ? e.target.innerWidth : $(window).width();
    if (this.navMenu.height() > 60 && screenWidth > this.navMenuBreakpoint) {
      this.siteTitle.addClass('nav-menu-wrapped');
    } else {
      this.siteTitle.removeClass('nav-menu-wrapped');
    }
  };
}

export default Responsive;
