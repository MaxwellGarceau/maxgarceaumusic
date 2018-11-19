import $ from 'jquery';

import Navigation from './modules/Navigation';
import CuebarModifications from './modules/CuebarModifications';
import Responsive from './modules/Responsive';

$(document).ready(() => {
  const navigation = new Navigation();
  const cuebarModifications = new CuebarModifications();
  const responsive = new Responsive();
});
