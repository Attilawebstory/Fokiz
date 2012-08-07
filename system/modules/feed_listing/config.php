<?php

    require_once('config.php'); // Includes root config file.

    //////////////////////////////////////////////////////////////////
    // Module Configuration
    //////////////////////////////////////////////////////////////////
    
    $module = new StdClass();
    $module->name           = "Feed Listing";
    $module->description    = "Lists all items included in the feed."; 
    $module->load           = "default.php";
    $module->css            = "screen.css";
    $module->js             = "common.js";
    $module->param          = "Items Per Page";
    $module->param_options  = "";
    
    //////////////////////////////////////////////////////////////////
    // Get Module Folder
    //////////////////////////////////////////////////////////////////
    
    $module_path = explode("/",dirname(__FILE__));
    $module_path_nodes = count($module_path);
    
    $module->folder         = $module_path[($module_path_nodes-1)];

?>