<?php
$header = "Home";

$config = require 'config.php';
$db = new Database($config['database']);

$sliderItems = [
    [
        'image' => 'img/Background.png',
        'heading' => 'best of business planning <BR>advisor & specialist',
        'buttonText' => 'More Detail',
        'buttonLink' => '/aboutus'
    ],
    [
        'image' => 'img/Background.png',
        'heading' => 'empowering proneurship innovate, <BR> adapt, succeed',
        'buttonText' => 'More Detail',
        'buttonLink' => '/proneurship'
    ],
    // Add more slider items as needed
];

$services = [
    [
        'icon' => 'fas fa-plane-departure',
        'title' => 'Tailored M&E Solutions for Sustainable Growth',
        'description' => 'We assist organizations in adopting and strengthening their M&E systems, ensuring program effectiveness, transparency, and accountability that aligns with their unique goals and objectives.'
    ],
    [
        'icon' => 'fas fa-chart-line',
        'title' => 'Co-creation of Impactful and Sustainable Solutions Together',
        'description' => 'We foster a collaborative approach to program design and evaluation, creating a learning environment that sparks innovative and impactful solutions tailored to specific needs.'
    ],
    [
        'icon' => 'fas fa-luggage-cart',
        'title' => 'Data-Driven Insights for Sustainable Development',
        'description' => 'We provide valid and sophisticated insights from program data, enabling informed decision-making that maximizes impact and drives sustainable development across Northeast India.'
    ],
    [
        'icon' => 'fas fa-bullhorn',
        'title' => 'Transformative Communication and Storytelling',
        'description' => 'We transform complex reports into engaging narratives, helping organizations share their stories, garner support, and build positive social perceptions that amplify their impact.'
    ],
    [
        'icon' => 'fas fa-leaf',
        'title' => 'Energy and Environment Consulting',
        'description' => 'Scheduled transport operations, from broad market trends and strategy to the development of integrated commercial strategies.'
    ],
    [
        'icon' => 'fas fa-users',
        'title' => 'Capacity Building for Organizational Transformation',
        'description' => 'We offer comprehensive capacity-building programs that equip teams with the skills and knowledge to conceptualize program design, implement social projects, develop outreach and communication strategies.'
    ]
];

// Fetch the 4 most recent blog posts
$recentPosts = $db->query('SELECT * FROM blogs ORDER BY created_at DESC LIMIT 4')->fetchAll();

require "views/index.view.php";
