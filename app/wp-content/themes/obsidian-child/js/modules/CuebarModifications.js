import $ from 'jquery';

class CuebarModifications {
  constructor() {
    $(document).ready(() => {
      this.init();
    });
  };
  init = () => {
    this.insertFeaturedTrack();
  };
  getInsertPosition = () => {
    console.log($('.cuebar .mejs-track-title'));
    return $('.cuebar .mejs-track-title');
  };
  createFeaturedTrack = () => {
    return '<span class="mejs-featured-track info-message__info"> (Featured Track)</span>';
  };
  insertFeaturedTrack = () => {
    this.getInsertPosition().append(this.createFeaturedTrack());
  };
}

export default CuebarModifications;
