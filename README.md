<p align="center">
  <img src="./logo.png" alt="Light Cloud" width="200" />
</p>

<h1 align="center">WordPress Boilerplate</h1>

<p align="center">
  A WordPress site — bring your own MySQL database — ready to deploy on Light Cloud.
</p>

---

## Features

- Your `wp-content` in git — a small starter theme to begin with
- WordPress core comes from the official image at build time, so there is no core to keep updated in git
- `WP_HOME` and `WP_SITEURL` follow the host of the request, so the generated subdomain and a custom domain added later both serve the same site
- HTTPS detected from the proxy's forwarded scheme, which is what stops the redirect loop a WordPress site behind a load balancer otherwise falls into

## Local Development

WordPress core is supplied by the image, so there is nothing to run locally without a
MySQL database. Edit the theme in `wp-content/themes/lightcloud` and deploy:

```text
wp-content/
  themes/
    lightcloud/     # yours to edit
```

## Point it at a database

WordPress needs MySQL, and the database is yours to create: make one in the
console, then set these on the application. Nothing is wired up for you.

| Variable | Value |
|----------|-------|
| `WORDPRESS_DB_HOST` | host, or `host:port` |
| `WORDPRESS_DB_NAME` | database name |
| `WORDPRESS_DB_USER` | user |
| `WORDPRESS_DB_PASSWORD` | password |
| `WORDPRESS_TABLE_PREFIX` | optional, defaults to `wp_` |

The first request then takes you to the WordPress installer.

## What it does not handle

The container filesystem does not survive a restart. Media uploaded through the
admin, and plugins installed through it, will disappear — put uploads in an
offsite store (S3, GCS or similar, via a plugin) and commit plugins to
`wp-content/plugins` so they are part of the image.

## Deploy to Light Cloud

### 1. Create an Account

Visit [console.light-cloud.com](https://console.light-cloud.com) and sign up with GitHub or Google.

### 2. Create New Application

1. Click **"New Application"** in the dashboard
2. Select **"Container"** as the deployment type
3. Choose **"WordPress"** as the framework

### 3. Connect Repository

- **Option A:** Fork this repository and connect it via GitHub
- **Option B:** Push this code to your own GitHub repository and connect it

### 4. Configure Settings

Light Cloud will auto-detect your settings, but you can verify:

| Setting | Value |
|---------|-------|
| Port | `8080` |
| Dockerfile | Auto-detected |

### 5. Deploy

Click **"Deploy"** and your site will be live in minutes!

Your site will be available at `https://your-app.light-cloud.io`

## Learn More

- [WordPress documentation](https://developer.wordpress.org/)
- [Theme handbook](https://developer.wordpress.org/themes/)
- [Light Cloud documentation](https://docs.light-cloud.com)

---

<p align="center">
  <a href="https://light-cloud.com">Website</a> •
  <a href="https://docs.light-cloud.com">Documentation</a> •
  <a href="https://console.light-cloud.com">Console</a>
</p>

<p align="center">
  Made with ☁️ by <a href="https://light-cloud.com">Light Cloud</a>
</p>
