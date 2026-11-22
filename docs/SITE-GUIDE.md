# fu.edu.sd: speed, Google and security guide

For the team that runs the website (CESD and CTS). Last updated 22 November 2026.

The design is unchanged. This guide explains what was improved, how to deploy it, and how to keep it fast, visible on Google and safe.

## 1. Results

Homepage, Lighthouse mobile test, same computer before and after:

| | Before | After |
|---|---|---|
| Performance | 34 | 99 |
| Accessibility | 58 | 96 |
| Best practices | 96 | 100 |
| SEO | 82 | 100 |
| Largest Contentful Paint (LCP) | 38.6 s | 2.2 s |
| Layout shift (CLS) | 0.415 | 0 |
| Speed Index | 19.8 s | 0.9 s |
| Page size | 7.6 MB | 0.23 MB |

Other pages tested score 97 to 100 for performance on mobile. The desktop homepage scores 100.

These numbers were measured on a local copy. Test the live site after deployment at <https://pagespeed.web.dev/>. The server's response time and the visitor's distance from it also count, so live scores can be lower. "What your real users are experiencing" is a 28-day average, so it needs about four weeks to show the change.

## 2. Deploy

The server folder is `public_html/repositories/the_future_uni_web_site`. GitHub Actions (`.github/workflows/deploy.yml`) deploys every push to the **`development`** branch automatically.

```bash
git checkout development
git add -A
git commit -m "Speed, SEO and security improvements"
git push origin development
```

**A push goes live.** Back up the database first, because the deployment runs `php artisan migrate --force`. The new migration only adds indexes and never stops a deployment.

The workflow installs packages, rebuilds caches, clears the page cache and makes WebP copies of uploaded images.

### Server `.env`

Set these once, then run `php artisan config:cache`:

```ini
APP_ENV=production
APP_DEBUG=false
APP_URL=https://fu.edu.sd
SITE_URL=https://fu.edu.sd
SESSION_SECURE_COOKIE=true
GOOGLE_SITE_VERIFICATION=
```

### Check after deployment

```bash
curl -I https://fu.edu.sd/                    # 200 and security headers
curl -s -o /dev/null -D - https://fu.edu.sd/  # second run: X-Page-Cache: hit
curl -I https://fu.edu.sd/sitemap.xml         # 200, application/xml
curl -I https://fu.edu.sd/robots.txt          # 200
curl -I https://fu.edu.sd/Home                # 301 to /
curl -I https://fu.edu.sd/.env                # 403 or 404, never 200
curl -I "https://fu.edu.sd/public/client/dist/site.min.css?v=1"   # Cache-Control ... immutable
```

If the last line shows no `Cache-Control`, ask the host to enable Apache `mod_headers`.

Then open the homepage, one news page, the admin login and one admin page.

### Server Tools in the admin panel

Open **Server Tools** in the admin menu and enter your own password. The page locks again after 15 minutes.

| Tool | Use it |
|---|---|
| Optimize | After a deployment or a change in `.env` |
| Clear all caches | When a change does not show; run Optimize afterwards |
| Clear saved pages | When only a public page looks old |
| Compress uploaded images | After uploading many images |
| Reset PHP OPcache | When PHP still runs old code |
| Migration status | To see pending database changes |
| Preview migration | To read the SQL first |
| Migrate | To change the database; back it up first |

Every run is recorded in `storage/logs/server-tools.log`.

### Roll back

```bash
git revert HEAD
git push origin development
```

## 3. Google Search Console and sitemap

### Prove ownership

Use exactly `https://fu.edu.sd/`. The address `www.fu.edu.sd` does not exist in DNS, so Google answers "Could not find your site" for it.

Do not upload the file by hand. A copy in the `public` folder makes the address show an empty page; the deployment removes it.

1. Deploy the site and open <https://fu.edu.sd/googleafbc0ccb2ebc472f.html>. It must show `google-site-verification: googleafbc0ccb2ebc472f.html`.
2. Open <https://search.google.com/search-console>, choose **Add property**, then **URL prefix**, and enter `https://fu.edu.sd/`.
3. Choose **HTML file** and press **Verify**.
4. Remove the old property that failed.

Keep the file address working, because Google checks it again from time to time.

Other methods:

- **DNS:** choose **Domain**, enter `fu.edu.sd` and add the TXT record in the domain's DNS. It covers all subdomains.
- **HTML tag:** copy only the `content` value into `GOOGLE_SITE_VERIFICATION` in the server `.env`, then press **Optimize** in Server Tools.

The server blocks every other `google*.html` file on purpose. To add one, put its name in `google_files` in `config/seo.php` and add it to the exception in `.htaccess`.

### Submit the sitemap

In Search Console open **Sitemaps**, enter `sitemap.xml` and submit. New news and events appear in it automatically.

Address: <https://fu.edu.sd/sitemap.xml>

### Also do these once

- **Settings > Users and permissions:** remove every owner you do not know.
- **Security & Manual Actions:** open both pages. If a problem is listed, fix it and request a review.
- **Pages** and **Removals:** look for addresses that are not yours and request removal.
- **URL inspection:** enter the homepage and press **Request indexing**.

### What was added for search engines

- A unique title and description for each page, in `config/seo.php`.
- Canonical addresses. `/Home` and `/news_events` now redirect, so each page has one address.
- Structured data: university, website, breadcrumbs, and news articles.
- Sharing image and text for Facebook, WhatsApp and X.
- One main heading per page, image descriptions and clear link names.
- Admin pages are marked "noindex".

To change a title or description, edit `config/seo.php` and deploy. A path added there is also added to the sitemap.

## 4. How the speed works

| Part | What it does |
|---|---|
| WebP images | `name.jpg.webp` sits next to each original and is used automatically |
| One CSS file | `public/client/dist/site.min.css` replaces eight files |
| One JS file | `public/client/dist/site.min.js` (7 KB) replaces jQuery and the plugins |
| Own fonts | Ubuntu is served from our site; no Google Fonts or CDN requests |
| Page cache | Finished pages are kept for 10 minutes and cleared after admin changes |
| Browser cache | Static files are kept for 30 days, or one year when they have `?v=` |
| No session on public pages | No cookies, so pages can be cached |
| Visitor counter | Runs after the page is sent, at most once a day per address |

### Everyday tasks

**Add an image to a page.** Put it in `public/client/img`, run the command, and use `@img` in Blade:

```bash
php artisan media:webp client/img
```

```blade
<img src="@img('client/img/example.jpg')" width="800" height="500" alt="Describe the picture" loading="lazy">
```

**Change the slider photos.** Replace `1-640`, `1-1024`, `1-1600` and `1-2200` (`.webp`) in `public/client/img/hero-slider`. Use a new file name if the old photo must disappear at once.

**Change styles or scripts.** Edit `public/client/css/style.css` or the files in `resources/client`, then rebuild and commit `public/client/dist`:

```bash
npm install
npm run build:client
```

Rebuild also after using a new Bootstrap class in a Blade file, because unused styles are removed.

**A change is not visible:**

```bash
php artisan cache:clear pages
php artisan view:clear
```

**Run the checks:**

```bash
php artisan test --filter=PublicSiteTest
```

### Server settings that still help

With root access to WHM, use **Software > EasyApache 4 > Customize**:

1. **PHP 8.2** (`ea-php82`) with `opcache`, `gd`, `mbstring`, `fileinfo`, `curl`, `mysqlnd`, `xml`, `zip` and `bcmath`. Laravel 9 supports PHP 8.0 to 8.2, so do not choose 8.3 or newer yet.
2. **HTTP/2** (`mod_http2`), which also needs the `event` MPM and PHP-FPM.
3. **Brotli** (`mod_brotli`).

Then, in **MultiPHP Manager**, set the domain to `ea-php82` and turn PHP-FPM on.

Also consider a **CDN**, such as the free Cloudflare plan, because many visitors are far from the server.

### If a deployment fails

Open GitHub > **Actions** > the red run > **Deploy to Server**.

| Message | What to do |
|---|---|
| `project folder not found` | Correct the folder in `.github/workflows/deploy.yml` |
| `PHP 8.0.2 - 8.2 not found` | Install `ea-php82` in EasyApache 4 |
| `composer not found` | Install Composer or correct its path |
| `'artisan migrate' failed` | The code is live; read the **Database** part of the log, then use **Migration status** in Server Tools |

The deployment finds the right PHP and Composer by itself. To run a command by hand on cPanel, name the PHP version:

```bash
cd ~/public_html/repositories/the_future_uni_web_site
/opt/cpanel/ea-php82/root/usr/bin/php artisan migrate:status
```

## 5. Security

### In place

- Browser protection headers, including a Content Security Policy, HSTS and clickjacking protection.
- Secure session cookies in production.
- Delete and status links in the admin panel work only from inside the site.
- User forms accept only their own fields.
- Uploaded images are re-encoded and renamed.
- Unknown or deleted news and events return a 404 page.
- Search is limited in length and in requests per minute.
- HTML inside staff CV text is removed.
- Logout ends the session completely.
- PHP packages were updated within the supported range.
- Only `index.php` may run as PHP. Source folders, configuration, documents and backups are blocked.

### Every month

- [ ] `composer audit`, then `composer update` on a test copy
- [ ] Review the admin users and remove old accounts
- [ ] Open `/security_scan` in the admin panel
- [ ] Check Search Console for security messages and unknown owners
- [ ] Test that a backup can be restored

### Plan

- **Upgrade Laravel 9.** It no longer receives security fixes. Move to PHP 8.2 or later and a supported Laravel version. Some package warnings cannot be solved before this.
- Change the delete links in the admin panel into forms.
- Add two-step login for administrators.
