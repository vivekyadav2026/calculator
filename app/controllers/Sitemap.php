<?php
class Sitemap extends Controller {
    public function index($slugMap = []) {
        // Output XML headers
        header("Content-Type: application/xml; charset=utf-8");

        $baseUrl = URLROOT;
        $date = date('Y-m-d');

        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Add homepage
        echo "  <url>\n";
        echo "    <loc>" . $baseUrl . "/</loc>\n";
        echo "    <lastmod>" . $date . "</lastmod>\n";
        echo "    <changefreq>daily</changefreq>\n";
        echo "    <priority>1.0</priority>\n";
        echo "  </url>\n";

        // Add dynamic slugs from slugMap
        foreach ($slugMap as $slug => $method) {
            echo "  <url>\n";
            echo "    <loc>" . $baseUrl . "/" . $slug . "</loc>\n";
            echo "    <lastmod>" . $date . "</lastmod>\n";
            echo "    <changefreq>weekly</changefreq>\n";
            echo "    <priority>0.8</priority>\n";
            echo "  </url>\n";
        }

        // Add static pages
        $staticPages = ['calculators', 'pages/about', 'pages/privacy', 'pages/terms'];
        foreach ($staticPages as $page) {
            echo "  <url>\n";
            echo "    <loc>" . $baseUrl . "/" . $page . "</loc>\n";
            echo "    <lastmod>" . $date . "</lastmod>\n";
            echo "    <changefreq>monthly</changefreq>\n";
            echo "    <priority>0.5</priority>\n";
            echo "  </url>\n";
        }

        echo '</urlset>';
    }
}
