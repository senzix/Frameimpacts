<?php

function getIndustryName($key)
{
    $industries = [
        'social' => 'Social Impact Management Consulting',
        'health' => 'Health Operations Management Consulting',
        'business' => 'Business Management Consulting',
        // Add more industries as needed
    ];

    return $industries[$key] ?? 'Industry';
}

function getIndustryData()
{
    return [
        'social' => [
            'name' => 'Social Impact Management Consulting',
            'description' => 'Social Impact Management Consulting drives sustainable growth by helping organizations create measurable social, environmental, and economic benefits.'
        ],
        'health' => [
            'name' => 'Health Management Consulting',
            'description' => 'Health Operations Management Consulting optimizing healthcare processes, enhancing efficiency, patient outcomes, and resource management while reducing costs and improving care delivery.'
        ],
        'business' => [
            'name' => 'Business Management Consulting',
            'description' => 'Business Management Consulting improves organizational performance by optimizing operations, strategies, and processes, driving growth, efficiency, and long-term success.'
        ],
        // Add more industries as needed
    ];
}

if (isset($_GET['p_id'])) {
    $key = $_GET['p_id'];
    $validKeys = ['social', 'health', 'business']; // Add all valid keys here

    if (in_array($key, $validKeys)) {
        $name = getIndustryName($key);
        $header = $name;
        require "views/industry/{$key}.php";
    } else {
        // Handle invalid key (e.g., show 404 page)
        require "views/404.php";
    }
} else {
    $header = "Industry";
    require "views/industry.view.php";
}