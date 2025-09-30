# Apache httpd Example for Convox

An Apache httpd static website ready to deploy on Convox.

This example demonstrates how to deploy a static website using Apache httpd on Convox. Perfect for static sites, documentation, single-page applications, or any content that needs a reliable web server with professional features.

Deploy to Convox Cloud for a fully-managed platform experience, or to your own Convox Rack for complete control over your infrastructure. Either way, you'll get automatic SSL, load balancing, and zero-downtime deployments out of the box.

## Deploy to Convox Cloud

1. **Create a Cloud Machine** at [console.convox.com](https://console.convox.com)

2. **Create the app**:
```bash
convox cloud apps create httpd -i your-machine-name
```

3. **Deploy the app**:
```bash
convox cloud deploy -a httpd -i your-machine-name
```

4. **View your app**:
```bash
convox cloud services -a httpd -i your-machine-name
```

Visit your URL to see the example website!

## Deploy to Convox Rack

1. **Create the app**:
```bash
convox apps create httpd
```

2. **Deploy the app**:
```bash
convox deploy -a httpd
```

3. **View your app**:
```bash
convox services -a httpd
```

Visit your URL to see the example website!

## Project Structure

```
.
├── Dockerfile              # Alpine-based Apache image
├── convox.yml             # Convox deployment configuration  
└── public-html/           # Your website files
    ├── index.html         # Homepage
    ├── about.html         # About page
    ├── style.css          # Styling
    └── info.php           # Server info (static demo)
```

## Customizing Your Site

### Adding Static Files

Simply add your HTML, CSS, JavaScript, and other static files to the `public-html/` directory:

```bash
cp -r your-website/* public-html/
convox cloud deploy -a httpd -i your-machine-name
```

### Customizing Apache Configuration

To customize Apache configuration, you can either:
1. Mount a custom config file in your Dockerfile
2. Modify the default config with RUN commands
3. Use .htaccess files in your public-html directory

### Using for Single Page Applications

For React, Vue, or Angular apps, add this to `public-html/.htaccess`:

```apache
RewriteEngine On
RewriteBase /
RewriteRule ^index\.html$ - [L]
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule . /index.html [L]
```

## Scaling

### Convox Cloud
```bash
convox cloud scale web --count 3 --cpu 500 --memory 512 -a httpd -i your-machine-name
```

### Convox Rack
```bash
convox scale web --count 3 --cpu 500 --memory 512 -a httpd
```

## Common Use Cases

- **Static Websites**: Marketing sites, landing pages, blogs
- **Documentation**: Software documentation, API docs
- **Single Page Applications**: React, Vue, Angular builds
- **File Hosting**: Downloads, media files, assets
- **Maintenance Pages**: Temporary holding pages

## Performance Features

- **Alpine Linux**: Minimal footprint for efficient containers
- **Health Checks**: Simple `/` endpoint monitoring  
- **Static Serving**: Optimized for serving static files
- **Production Ready**: Based on official httpd Docker image

## Common Commands

### View logs

Cloud:
```bash
convox cloud logs -a httpd -i your-machine-name
```

Rack:
```bash
convox logs -a httpd
```

### Access container shell

Cloud:
```bash
convox cloud run web sh -a httpd -i your-machine-name
```

Rack:
```bash
convox run web sh -a httpd
```

### Check Apache configuration

Cloud:
```bash
convox cloud run web "httpd -t" -a httpd -i your-machine-name
```

Rack:
```bash
convox run web "httpd -t" -a httpd
```

## Adding Dynamic Features

To add PHP support, modify the Dockerfile:

```dockerfile
FROM php:8-apache
# ... rest of configuration
```

Then enable PHP processing in your Apache configuration.

## Tips

- Keep static assets in subdirectories (css/, js/, images/)
- Use Apache's mod_rewrite for clean URLs
- Enable browser caching for better performance
- Monitor logs for 404s and errors
- Use health checks for reliability