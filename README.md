# WordPress

Your WordPress site. The repository holds only what is yours — `wp-content` —
and WordPress core comes from the official image at build time, so there is no
core to keep updated here.

```text
wp-content/
  themes/
    lightcloud/     # the active theme — yours to edit
  plugins/          # commit plugins here so they are part of the image
```

## Database

The site reads its MySQL connection from environment variables on the
application — set automatically when the database was created with the site,
editable in the environment's settings:

| Variable | Value |
|----------|-------|
| `WORDPRESS_DB_HOST` | host, or `host:port` |
| `WORDPRESS_DB_NAME` | database name |
| `WORDPRESS_DB_USER` | user |
| `WORDPRESS_DB_PASSWORD` | password |
| `WORDPRESS_TABLE_PREFIX` | optional, defaults to `wp_` |

Connections are encrypted by default; set `WORDPRESS_DB_SSL=off` only for an
external database that cannot speak TLS.

The first request after connecting opens the WordPress installer.

## Good to know

- `WP_HOME`/`WP_SITEURL` follow the request host, so the generated subdomain
  and a custom domain added later both serve the same site.
- The container filesystem does not survive a restart: media uploaded through
  the admin disappears — use an offsite store (S3, GCS or similar, via a
  plugin) — and plugins installed through the admin do too, so commit them to
  `wp-content/plugins` instead.
- Every push to the default branch deploys automatically.
