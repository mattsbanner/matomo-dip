<?php

    require_once('variables.php');

    foreach($hostnames as $hostname)
    {
        array_push($ip_addresses, gethostbyname($hostname));
    }

    $ip_list = substr(implode(', ', $ip_addresses),1);

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);

    $sql = "UPDATE `option` SET `option_value` = '".$ip_list."' WHERE `option_name` = 'SitesManager_ExcludedIpsGlobal'";
    echo $sql;

    $conn->close();

?>