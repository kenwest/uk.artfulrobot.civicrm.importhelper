<?php

/**
 * CsvHelper.Upload API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 * @return void
 * @see http://wiki.civicrm.org/confluence/display/CRMDOC/API+Architecture+Standards
 */
function _civicrm_api3_csv_helper_Upload_spec(&$spec) {
  $spec['data']['api.required'] = 1;
}

/**
 * CsvHelper.Upload API
 *
 * @param array $params
 * @return array API result descriptor
 * @see civicrm_api3_create_success
 * @see civicrm_api3_create_error
 * @throws API_Exception
 */
function civicrm_api3_csv_helper_Upload($params) {
  try {
    $result = CRM_CsvImportHelper::upload($params);
    return civicrm_api3_create_success($result, $params, 'CsvHelper', 'upload');
  }
  catch (\Exception $e) {
    // Re-cast exception for API.
    throw new API_Exception($e->getMessage(), 1);
  }
}
