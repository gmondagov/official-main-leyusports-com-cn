<?php

/**
 * Generates an HTML link card for a sports platform.
 *
 * @param string $url        The target URL for the card.
 * @param string $title      The title to display on the card.
 * @param string $description A short description for the card.
 * @return string            The escaped HTML fragment.
 */
function renderLinkCard(string $url, string $title, string $description): string
{
    $safeUrl = htmlspecialchars($url, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeTitle = htmlspecialchars($title, ENT_QUOTES | ENT_HTML5, 'UTF-8');
    $safeDescription = htmlspecialchars($description, ENT_QUOTES | ENT_HTML5, 'UTF-8');

    $html = <<<HTML
<div class="link-card">
    <a href="{$safeUrl}" target="_blank" rel="noopener noreferrer">
        <div class="card-content">
            <h3 class="card-title">{$safeTitle}</h3>
            <p class="card-desc">{$safeDescription}</p>
        </div>
        <div class="card-arrow">&rarr;</div>
    </a>
</div>
HTML;

    return $html;
}

/**
 * Creates a styled link card from configuration data.
 *
 * @param array $config Associative array with keys: 'url', 'title', 'description'.
 * @return string       The HTML output.
 */
function buildCardFromConfig(array $config): string
{
    $defaults = [
        'url'         => '#',
        'title'       => 'Untitled',
        'description' => 'No description provided.',
    ];

    $merged = array_merge($defaults, $config);
    return renderLinkCard($merged['url'], $merged['title'], $merged['description']);
}

// --- Example usage (can be removed or kept as demonstration) ---

$sampleConfig = [
    'url'         => 'https://official-main-leyusports.com.cn',
    'title'       => '乐鱼体育',
    'description' => 'Explore a wide range of sports events and live updates.',
];

echo buildCardFromConfig($sampleConfig);