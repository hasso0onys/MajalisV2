# Majalis

This project displays a list of Majalis (religious gatherings) using data served from simple PHP scripts.

## Running a local server

The application relies on `get_majalis.php` and other PHP endpoints to load data. Run a PHP development server from the project root:

```bash
php -S localhost:8000
```

Then open [http://localhost:8000/index.html](http://localhost:8000/index.html) in your browser.

## Static data alternative

If you cannot run PHP you may convert `majalis.csv` to a JSON file named `majalis.json` and adjust the fetch path in the HTML files. This allows the application to run from purely static hosting, though dynamic updates will not work.

