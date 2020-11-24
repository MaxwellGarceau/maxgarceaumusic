<?php

function red_get_return_to_top_arrow() {
  $html = '<a href="javascript:" id="return-to-top"><i class="fas fa-chevron-up"></i></a>';
  return $html;
}

function red_display_return_to_top_arrow() {
  echo red_get_return_to_top_arrow();
}
