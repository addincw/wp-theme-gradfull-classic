<img src="https://github.com/addincw/html-template-gradfull/blob/master/dist/assets/banner.png" width="100%" />

# Gradfull Classic

![Static Badge](https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white)
![Static Badge](https://img.shields.io/badge/Sass-CC6699?style=for-the-badge&logo=sass&logoColor=white)

Gradfull (Fully Gradient) is wordpress clasic theme based on gradfull html template, html template with a beautiful gradient color theme, modern, attractive but still looks professional. Aimed at company profile websites, landing pages, and also personal portfolio websites, but not limited to.

Visit [html template repositories](https://github.com/addincw/html-template-gradfull) if you interest and want to create your own theme other than wordpress.

## Table of Contents

1. [Description](https://github.com/addincw/html-template-gradfull#gradfull-html-template)
2. [Table of Contents](https://github.com/addincw/html-template-gradfull#table-of-contents)
3. [Structure Folders](https://github.com/addincw/html-template-gradfull#structure-folder)
4. [Prerequisite](https://github.com/addincw/html-template-gradfull#structure-folder)
5. [Get the Theme](https://github.com/addincw/html-template-gradfull#structure-folder)
6. [Installation](https://github.com/addincw/html-template-gradfull#structure-folder)
7. [Work with Theme](https://github.com/addincw/html-template-gradfull#quick-start)
8. [License](https://github.com/addincw/html-template-gradfull#license)

## Structure Folder

```
|- src // development folders, if need some customization
    |- js
    |- scss
|- assets/ // builded js and scss file from src folder, also static image used on theme
|- ...another files that normally exist on wordpress theme classic
```

## Prerequisite

1. It assume you have installed wordpress either on your local or live server
2. You know, and have access into wordpress dashboard. Generally accessible in `https://your-wordpress-domain-site/wp-admin`

## Get The Theme

There are a 2 ways to get gradfull classic theme, choose according to your preference.

### Download Source Files

Get the theme source files by [download the zip file](https://github.com/addincw/wp-theme-gradfull-classic) directly. Then upload downloaded source files into your wordpress site

1. login to wordpress dashboard
2. go to menu `appearance > themes > add new`
3. upload theme

### Download from Wordpress Dashboard

1. login to wordpress dashboard
2. go to menu `appearance > themes > add new`
3. search theme `gradfull classic`
4. install

## Installation

This instruction guide you how to activate theme and setup require configuration to work with a theme. It assume you have installed a theme by following get theme section.

1. login to wordpress dashboard
2. go to menu `appearance > themes`, find gradfull classic theme that you have installed
3. activate theme
4. go to menu `settings > permalinks`. Set `permalink structure` as `Month and name`, which will set route site using datetime and slug pattern
5. go to menu `pages > add new`. Create new page with a slug name `front-page`, which will be used as the base template for the front-page
6. go to menu `pages > add new`. Create new page with a slug name `articles`, which will be used as the base template for the articles page
7. go to menu `pages > add new`. Create new page with a slug name `projects`, which will be used as the base template for the projects page
8. go to menu `settings > reading`. Set `your homepage displays` as `a static page`. then,

   5.1 select `homepage` field to `front page`

   5.2 select `posts page` field to `articles` (post which has been made on point 2)

## Working with Theme

### Basic (Coming Soon)

This theme provide admin menu `front page settings` to change a copy and image showed on front-page.

### Advanced

If you need modification/addition on theme which you can't do in the menu `front page settings` like custom template, css, or js files. You can change it directly from the source code theme by following the theme style guide.

Theme is the same as other classic WordPress themes, which follow the guideline that WordPress recommends. Read [wordpress official docs](https://developer.wordpress.org/themes/basics/) for the basic development theme.

**_Work with Theme_**

CSS and JS files placed under `assets` folder, and load via `add_action('wp_enqueue_scripts')` wordpress function on file `functions.php`.

So, if you need some modification/addition about css/js go under `assets` folder, its recommend not to directly edit original file, instead create your own files then load it via `add_filadd_action('wp_enqueue_scripts')` wordpress function on file `functions.php`.

`functions.php`

```
// ...inside function add_action('wp_enqueue_scripts')

// your custom style
wp_enqueue_style('custom_css_name', get_theme_file_uri('assets/custom_css_name.css'));

// your custom js
wp_enqueue_script('custom_js_name', get_theme_file_uri('assets/custom_js_name.js'));
```

**_Work with Theme using Webpack_**

CSS and JS files are placed under `assets`folder basically built with webpack. In the build process (`npm run build`) Webpack will load the source files under `src` folder, then merge them, and place the files under `assets` folder.

Theme uses webpack to get optimized files, and along with the node package manager to manage dependency from third party libraries.

Your local or live server should installed nodejs.

1. Open your terminal, you should be in your theme's project folder `.../wp-content/gradfullclassic/`
2. Run the command `npm install` for the first time in the development process
3. Make your modification/addition under `src` folder, its recommend not to directly edit original file, instead create your own files, `src/scss/your-file.scss` for css file, and `src/js/your-file.js` for js file
4. Then import your-file inside `src/js/main.js`

   ```
   // for css file
   import "../scss/your-scss-file.scss";

   // for js file
   import YourJSFile from "./your-js-file";
   ```

5. run command `npm run build`, theme will rebuild files under `assets` folder.
6. It doesnt required to manually load it via `add_filadd_action('wp_enqueue_scripts')` wordpress function on file `functions.php`. Because it still use same file `/assets/main.css` and `/assets/main.js`

## License

Copyright (c) 2023 Project Cendekia

Gradfull is licensed under The MIT License (MIT). Which means that you can use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the final products. But you always need to state that Project Cendekia is the original author of this template
