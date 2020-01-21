<?php
    /* THIS PHP FILE SERVES AS THE ENVIRONMENT VARIABLES */
    $timezone = "Asia/Manila";
    #$databaseHost = "localhost"; /* Database Server ex: 127.0.0.0 */
    #$databaseUsername = "id9552114_greenfields"; /* Credentials for MySQL */
    #$databasePassword = "123123"; /* Credentials for MySQL */
    #$databaseName = "id9552114_greenfields"; /* Database name */

    #Local Server Setup
    $databaseHost = "localhost"; /* Database Server ex: 127.0.0.0 */
    $databaseUsername = "root"; /* Credentials for MySQL */
    $databasePassword = "root"; /* Credentials for MySQL */
    $databaseName = "dbresort"; /* Database name */
    
    /* Salt for password encryption. This will be concatenated to the password before storing it into the database. */
    define("SALT",md5("e2vZPW"));
    /* Encryption method. This is used for openssl encryption/decryption. */
    define("ENCRYPT_METHOD", "AES-256-CBC");
    /* Hash for openssl encryption/decryption */
    define("GET_HASH", hash("sha256", "UniCare"));
    /* Vector for openssl encryption/decryption */
    define("VECTOR", substr(hash('sha256', "SecretVector"), 0, 16));
    /* App name */
    define('APP_NAME', "Greenfields Paradise Resort");
    // $base = "http://localhost:8181/resort/"; /* Base URL */
?>