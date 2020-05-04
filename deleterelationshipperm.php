<?php

require_once 'deleterelationshipperm.civix.php';
use CRM_Deleterelationshipperm_ExtensionUtil as E;

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function deleterelationshipperm_civicrm_config(&$config) {
  _deleterelationshipperm_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function deleterelationshipperm_civicrm_xmlMenu(&$files) {
  _deleterelationshipperm_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function deleterelationshipperm_civicrm_install() {
  _deleterelationshipperm_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function deleterelationshipperm_civicrm_postInstall() {
  _deleterelationshipperm_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function deleterelationshipperm_civicrm_uninstall() {
  _deleterelationshipperm_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function deleterelationshipperm_civicrm_enable() {
  _deleterelationshipperm_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function deleterelationshipperm_civicrm_disable() {
  _deleterelationshipperm_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function deleterelationshipperm_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _deleterelationshipperm_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function deleterelationshipperm_civicrm_managed(&$entities) {
  _deleterelationshipperm_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function deleterelationshipperm_civicrm_caseTypes(&$caseTypes) {
  _deleterelationshipperm_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function deleterelationshipperm_civicrm_angularModules(&$angularModules) {
  _deleterelationshipperm_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function deleterelationshipperm_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _deleterelationshipperm_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

/**
 * Implements hook_civicrm_entityTypes().
 *
 * Declare entity types provided by this module.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_entityTypes
 */
function deleterelationshipperm_civicrm_entityTypes(&$entityTypes) {
  _deleterelationshipperm_civix_civicrm_entityTypes($entityTypes);
}
/**
 * Implements hook_civicrm_permission().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_permission
 */
function deleterelationshipperm_civicrm_permission(&$permissions) {
  $prefix = ts('CiviCRM') . ': ';
  $permissions['delete relationships'] = [
    $prefix . ts('Delete relationships'),
    ts('Delete contact relationships'),
  ];
}

/**
 * Implements hook_civicrm_links().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_links
 */
function deleterelationshipperm_civicrm_links($op, $objectName, $objectId, &$links, &$mask, &$values) {
  if ($op == 'relationship.selector.row' && $objectName == 'Relationship') {
    if (!CRM_Core_Permission::check('delete relationships')) {
      foreach ($links as $key => $link) {
        if (in_array($link['name'], ['Delete', 'Disable'])) {
          unset($links[$key]);
        }
      }
    }
  }
}

/**
 * Implements hook_civicrm_pre().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_pre
 */
function deleterelationshipperm_civicrm_pre($op, $objectName, $id, &$params) {
  if ($op == 'delete' && $objectName == 'Relationship') {
    _deleterelationshipperm_civicrm_check_permission();
  }
}

/**
 * Implements hook_civicrm_apiWrappers().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_apiWrappers
 */
function deleterelationshipperm_civicrm_apiWrappers(&$wrappers, $apiRequest) {
  if ($apiRequest['entity'] == 'Relationship' && $apiRequest['action'] == 'delete') {
    _deleterelationshipperm_civicrm_check_permission('exception');
  }
}

/**
 * Check if user has permission to delete relationship.
 *
 * @param string $errorType
 */
function _deleterelationshipperm_civicrm_check_permission($errorType = NULL) {
  if (CRM_Core_Permission::check('delete relationships')) {
    return FALSE;
  }
  $message = ts('You do not have permission to delete relationships. Please speak to an administrator..');
  if ($errorType == 'exception') {
    throw new API_Exception($message);
  }
  else {
    CRM_Core_Error::statusBounce($message);
  }
}
