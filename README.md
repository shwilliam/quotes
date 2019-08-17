# Quotes

> An opinionated WP theme for a quote-centered site

**Note**: You may get a security-related error in your browser when using the 'Show me another!' button to fetch another random quote. This often occurs when using the Browsersync's proxied server and can simply be avoided by visiting the original, locally-served site, for example visit `http://localhost/your-site` as opposed to `http://localhost:3000/your-site`.

## Features

- Mobile, tablet & desktop friendly
- Uses WP rest API to avoid unecessary full-page reloads
- Styled w/ SASS using the SCSS (Sassy CSS) syntax
- Gulp for automated prefixing, minification w/ sourcemaps & BrowserSync
- Easy to build upon!

## Installation

- Download repo
- Move folder to `wp-content/themes` dir
- Activate theme in the WP admin area

## Sample content

- [Download `quotes.sql`](https://gist.github.com/shwilliam/e7658f5e07956d5ba370ab372de2eb53)
- Import the `.sql` file from within `phpmyadmin`

Note that this uses the URL `//localhost/quotes` and site path `/Applications/htdocs/quotes` so you must either mimic these or run your own find & replace to match your appropriate system paths.

## Development

- Clone repo
- Move folder to `wp-content/themes` dir
- Activate theme in the WP admin area
- Install dev dependencies w/ `npm i`
- Update `gulpfile.js` with the appropriate URL for the Browsersync proxy (so change `localhost[:port-here]/[your-dir-name-here]` to the appropriate localhost URL)
- Start gulp w/ `npm start`
