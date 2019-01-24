# photogramappy

This plugin is something I have built to demonstrate the use of advanced, modern PHP in a WordPress context. It is fairly simple for practical use reasons. It creates a custom post type - `Photographs` - and adds meta for latitude and longitude using the <a href="https://packagist.org/packages/inpsyde/metabox-orchestra">Metabox Orchestra</a> library, add taps into the Google Maps API for rendering maps _below_ post content.

<h2>Requirements</h2>
- PHP 7.2
- Composer
- WordPress 4.9.9+

<h2>Tests</h2>
- <a href="https://jdk.java.net/11/">Java OpenJDK</a>
- <a href="https://chromedriver.storage.googleapis.com/index.html?path=2.45/">ChromeDriver</a>
- <a href="https://docs.seleniumhq.org/download/">Selenium Standalone Server</a>

These are required for the <a href="https://codeception.com/">Codeception</a> Acceptance tests.

<h2>Real Purpose</a>
WordPress does _not_ have to fall on seemingly ancient coding standard. With Modern PHP, we can leverage Composer, Packagist, etc. I also need a job. <a href="http://www.technosailor.com/wp-content/abrazell-resume.pdf">So hire me</a>!
