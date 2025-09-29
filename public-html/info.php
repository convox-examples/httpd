<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Info - Convox Apache Example</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <h1>Server Information</h1>
            <p class="subtitle">Apache httpd Status</p>
        </header>
        
        <main>
            <section>
                <h2>Server Details</h2>
                <p><strong>Server Software:</strong> Apache httpd 2.4</p>
                <p><strong>Container OS:</strong> Alpine Linux</p>
                <p><strong>Document Root:</strong> /usr/local/apache2/htdocs/</p>
            </section>
            
            <section>
                <h2>Note</h2>
                <p>This is a static HTML file. For dynamic server information, you would need to enable Apache modules like mod_status or add PHP support.</p>
                <p>The .php extension is just for demonstration. To enable actual PHP processing, you would need to add PHP to your Docker image.</p>
            </section>
            
            <section>
                <nav>
                    <a href="/" class="button">Back to Home</a>
                </nav>
            </section>
        </main>
        
        <footer>
            <p>Powered by Apache httpd on Convox</p>
        </footer>
    </div>
</body>
</html>