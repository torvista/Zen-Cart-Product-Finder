<?php

/**
 * blank sidebox - allows a blank sidebox to be added to your site
 *
 * @package templateSystem
 * @copyright 2007 Kuroi Web Design
 * @copyright Portions Copyright 2003-2007 Zen Cart Development Team
 * @license http://www.zen-cart.com/license/2_0.txt GNU Public License V2.0
 * @version $Id: blank_sidebox.php 2007-05-26 kuroi $
 */
$content = '';
$content .= '<div id="' . str_replace('_', '-', $box_id . 'Content') . '" class="sideBoxContent">';
//<!--BOF Product Finder-->
$content .= zen_draw_form('ymm_sidebox', '');
$content .= '<div>' . "\n" . '<div>';

$model1[] = array('id' => '', 'text' => TEXT_PLEASE_SELECT);
if (isset($_POST['cPath1'])) {
  $value = $_POST['cPath1'];
}
$content .= '<span id="pf_title">' . strip_tags(TEXT_FIND_ALL_PRODUCTS) . '</span>';
$content .= '<span class="pf_selectbox_name">' . TEXT_MAKE . '</span>' . zen_draw_pull_down_menu('cPath1', array_merge($model1, zen_get_category_tree()), $value, 'id="cPath" class="pf_selectbox_text"');
$content .= '</div>' . "\n";
$content .= '<div class="pf_noscript">';
$content .= '<noscript>';
$content .= zen_image_submit(PF_NOSCRIPT_SUBMIT, PF_NOSCRIPT_SUBMIT_ALT);
if ($_POST['cPath1'] != '') {
  $value = $_POST['cPath1'];
  $dropdownArray = zen_get_category_tree($value);
}
$content .= '</noscript>';
$content .= '</div>' . "\n";
$content .= '<div>';
$modulePath = DIR_WS_CATALOG;
$content .= zen_draw_hidden_field('basemodulepath', $modulePath, 'id="basemodulepath" ');
$model = array();
$model[] = array('id' => '', 'text' => TEXT_PLEASE_SELECT);
if ($_POST['cPath1'] != '') {
  $model = array_merge($model, $dropdownArray);
}
if (isset($_POST['select_model'])) {
  $value = $_POST['select_model'];
}
$content .= '<span class="pf_selectbox_name">' . TEXT_MODEL . '</span>';
$content .= zen_draw_pull_down_menu('select_model', $model, $value, 'id="select_model" class="pf_selectbox_text"');
$content .= '</div>' . "\n";
$content .= '<div class="pf_noscript">';
$content .= '<noscript>';
if ($_POST['select_model'] != '') {
  $value = $_POST['select_model'];
  $dropdownArray = zen_get_category_tree($value);
}
$content .= zen_image_submit(PF_NOSCRIPT_SUBMIT, PF_NOSCRIPT_SUBMIT_ALT);
$content .= '</noscript>';
$content .= '</div>' . "\n";
$content .= '<div>';
$year = array();
$year[] = array('id' => '',
  'text' => TEXT_PLEASE_SELECT
);
if ($_POST['select_model'] != '') {
  $year = array_merge($year, $dropdownArray);
}
if (isset($_POST['cPath'])) {
  $value = $_POST['cPath'];
}
if ($_POST['select_model'] != '') {
  $content .= '<span class="pf_selectbox_name">' . TEXT_YEAR . '</span>';
  $content .= zen_draw_pull_down_menu('cPath', $year, $value, 'id="select_year" class="pf_selectbox_text"');
} else {
  $content .= '<span class="pf_selectbox_name">' . TEXT_YEAR . '</span>';
  $content .= zen_draw_pull_down_menu('cPath22', $year, $value, 'id="select_year" class="pf_selectbox_text"');
}
$content .= '</div>' . "\n";
$content .= '<div class="pf_noscript">';
$content .= '<noscript>';
if ($_POST['cPath'] != '') {
  $value = $_POST['cPath'];
}
$content .= zen_image_submit(PF_NOSCRIPT_SUBMIT, PF_NOSCRIPT_SUBMIT_ALT);
$content .= '</noscript>';
$content .= '</div>' . "\n";
$content .= '</div>';
$content .= '</form>';
//<!--EOF Product Finder-->
$content .= '</div>';
