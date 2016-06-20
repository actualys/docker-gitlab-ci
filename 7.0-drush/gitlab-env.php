#!/usr/bin/env php
<?php

/**
 * @see: http://docs.gitlab.com/ce/ci/variables/README.html
 */
$env_allowed = array(
  'CI',
  'GITLAB_CI',
  'CI_SERVER',
  'CI_SERVER_NAME',
  'CI_SERVER_VERSION',
  'CI_SERVER_REVISION',
  'CI_BUILD_REF',
  'CI_BUILD_TAG',
  'CI_BUILD_NAME',
  'CI_BUILD_STAGE',
  'CI_BUILD_REF_NAME',
  'CI_BUILD_ID',
  'CI_BUILD_REPO',
  'CI_BUILD_TRIGGERED',
  'CI_BUILD_TOKEN',
  'CI_PROJECT_ID',
  'CI_PROJECT_DIR',
);

$content = file_get_contents('php://stdin');
$vars = array_intersect_key($_SERVER, array_combine($env_allowed, $env_allowed));
uksort($vars, function($a, $b) {
  return strlen($a) < strlen($b);
});

foreach ($vars as $name => $value) {
  $content = str_replace('$' . $name, $value, $content);
}
echo $content;
