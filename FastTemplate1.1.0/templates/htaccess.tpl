AuthUserFile {AUTH_USER_FILE}
AuthGroupFile {AUTH_GROUP_FILE}
AuthName {AUTH_NAME}
AuthType {AUTH_TYPE}
Options {OPTIONS}

# Sub Name {AUTH_NAME}

<Limit {METHODS}>
{USER_LIMITS}
</Limit>

<Files ~ "(.*?)\.ht(access|passwd)$">
order deny,allow
deny from all
</Files>

ErrorDocument 401 {ERROR_401}
ErrorDocument 402 {ERROR_402}
ErrorDocument 403 {ERROR_403}
ErrorDocument 404 {ERROR_404}
ErrorDocument 500 {ERROR_500}
