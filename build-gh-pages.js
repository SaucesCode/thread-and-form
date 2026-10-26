const fs = require('fs');
const path = require('path');

const pages = [
  { url: 'http://localhost/wordpress/', file: 'index.html' },
  { url: 'http://localhost/wordpress/collection/', file: 'collection/index.html' },
  { url: 'http://localhost/wordpress/about/', file: 'about/index.html' },
  { url: 'http://localhost/wordpress/journal/', file: 'journal/index.html' },
  { url: 'http://localhost/wordpress/size-guide/', file: 'size-guide/index.html' },
  { url: 'http://localhost/wordpress/shipping-returns/', file: 'shipping-returns/index.html' },
  { url: 'http://localhost/wordpress/contact/', file: 'contact/index.html' },
  { url: 'http://localhost/wordpress/non-existent-page-404', file: '404.html' }
];

function copyFolderRecursiveSync(source, target) {
  if (!fs.existsSync(target)) {
    fs.mkdirSync(target, { recursive: true });
  }

  const files = fs.readdirSync(source);
  for (const file of files) {
    const curSource = path.join(source, file);
    const curTarget = path.join(target, file);
    if (fs.lstatSync(curSource).isDirectory()) {
      copyFolderRecursiveSync(curSource, curTarget);
    } else {
      fs.copyFileSync(curSource, curTarget);
    }
  }
}

async function buildDocs() {
  const docsDir = path.resolve(__dirname, 'docs');
  if (!fs.existsSync(docsDir)) {
    fs.mkdirSync(docsDir, { recursive: true });
  }

  // Copy assets folder into docs/assets
  console.log('Copying assets into docs/assets...');
  copyFolderRecursiveSync(path.resolve(__dirname, 'assets'), path.join(docsDir, 'assets'));

  // Create .nojekyll in docs
  fs.writeFileSync(path.join(docsDir, '.nojekyll'), '', 'utf8');

  // Fetch each page and rewrite paths
  for (const p of pages) {
    console.log(`Fetching ${p.url} -> docs/${p.file}...`);
    const res = await fetch(p.url);
    let html = await res.text();

    const depth = p.file.split('/').length - 1;
    const relRoot = depth === 0 ? './' : '../'.repeat(depth);

    // 1. Replace theme assets URL
    html = html.replaceAll('http://localhost/wordpress/wp-content/themes/thread-and-form/assets/', `${relRoot}assets/`);
    html = html.replaceAll('/wordpress/wp-content/themes/thread-and-form/assets/', `${relRoot}assets/`);

    // 2. Replace page internal links
    html = html.replaceAll('http://localhost/wordpress/collection/', `${relRoot}collection/`);
    html = html.replaceAll('http://localhost/wordpress/about/', `${relRoot}about/`);
    html = html.replaceAll('http://localhost/wordpress/journal/', `${relRoot}journal/`);
    html = html.replaceAll('http://localhost/wordpress/size-guide/', `${relRoot}size-guide/`);
    html = html.replaceAll('http://localhost/wordpress/shipping-returns/', `${relRoot}shipping-returns/`);
    html = html.replaceAll('http://localhost/wordpress/contact/', `${relRoot}contact/`);
    html = html.replaceAll('http://localhost/wordpress/', `${relRoot}`);

    // Relative root replacements
    html = html.replaceAll('href="/wordpress/collection/"', `href="${relRoot}collection/"`);
    html = html.replaceAll('href="/wordpress/about/"', `href="${relRoot}about/"`);
    html = html.replaceAll('href="/wordpress/journal/"', `href="${relRoot}journal/"`);
    html = html.replaceAll('href="/wordpress/size-guide/"', `href="${relRoot}size-guide/"`);
    html = html.replaceAll('href="/wordpress/shipping-returns/"', `href="${relRoot}shipping-returns/"`);
    html = html.replaceAll('href="/wordpress/contact/"', `href="${relRoot}contact/"`);
    html = html.replaceAll('href="/wordpress/"', `href="${relRoot}"`);

    // Fix Canonical & Open Graph URLs for GitHub Pages
    html = html.replaceAll('http://localhost/wordpress/', 'https://saucescode.github.io/thread-and-form/');
    html = html.replaceAll('/wordpress/', 'https://saucescode.github.io/thread-and-form/');

    const targetFile = path.join(docsDir, p.file);
    const targetDir = path.dirname(targetFile);
    if (!fs.existsSync(targetDir)) {
      fs.mkdirSync(targetDir, { recursive: true });
    }

    fs.writeFileSync(targetFile, html, 'utf8');
    console.log(`Saved docs/${p.file} (${html.length} bytes)`);
  }

  // Create a root index.html that redirects to ./docs/ in case GitHub Pages is set to root folder
  const rootIndex = `<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="0; url=./docs/">
    <title>Thread & Form — Luxury Fashion Flagship</title>
    <script>window.location.replace('./docs/');</script>
</head>
<body>
    <p>Redirecting to <a href="./docs/">Thread & Form Live Preview</a>...</p>
</body>
</html>
`;
  fs.writeFileSync(path.resolve(__dirname, 'index.html'), rootIndex, 'utf8');
  console.log('Created root index.html fallback redirect.');

  // Also create .nojekyll in repo root
  fs.writeFileSync(path.resolve(__dirname, '.nojekyll'), '', 'utf8');
  console.log('Created root .nojekyll file.');

  console.log('\n--- STATIC GITHUB PAGES BUILD COMPLETE ---');
}

buildDocs().catch(err => {
  console.error('Build failed:', err);
  process.exit(1);
});
