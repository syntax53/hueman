<?php header("Content-type: text/css"); ?>

@font-face {
  font-family: 'Droid Serif';
  font-style: normal;
  font-weight: 400;
  src: url('fonts/DroidSerif.eot');
  src: local('Droid Serif'), local('DroidSerif'), url('fonts/DroidSerif.woff') format('woff'), url('fonts/DroidSerif.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
@font-face {
  font-family: 'Droid Serif';
  font-style: normal;
  font-weight: 700;
  src: local('Droid Serif Bold'), local('DroidSerif-Bold'), url('fonts/DroidSerif-Bold.woff') format('woff'), url('fonts/DroidSerif-Bold.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
@font-face {
  font-family: 'Droid Serif';
  font-style: italic;
  font-weight: 400;
  src: local('Droid Serif Italic'), local('DroidSerif-Italic'), url('fonts/DroidSerif-Italic.woff') format('woff'), url('fonts/DroidSerif-Italic.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
@font-face {
  font-family: 'Droid Serif';
  font-style: italic;
  font-weight: 700;
  src: local('Droid Serif Bold Italic'), local('DroidSerif-BoldItalic'), url('fonts/DroidSerif-BoldItalic.woff') format('woff'), url('fonts/DroidSerif-BoldItalic.woff2') format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}

@font-face {
	font-family: 'Titillium';
	src: url('fonts/titillium-light-webfont.eot');
	src: url('fonts/titillium-light-webfont.svg#titillium-light-webfont') format('svg'),
		 url('fonts/titillium-light-webfont.eot?#iefix') format('embedded-opentype'),
		 url('fonts/titillium-light-webfont.woff') format('woff'),
		 url('fonts/titillium-light-webfont.ttf') format('truetype');
	font-weight: 300;
	font-style: normal;
}
@font-face {
	font-family: 'Titillium';
	src: url('fonts/titillium-lightitalic-webfont.eot');
	src: url('fonts/titillium-lightitalic-webfont.svg#titillium-lightitalic-webfont') format('svg'),
		 url('fonts/titillium-lightitalic-webfont.eot?#iefix') format('embedded-opentype'),
		 url('fonts/titillium-lightitalic-webfont.woff') format('woff'),
		 url('fonts/titillium-lightitalic-webfont.ttf') format('truetype');
	font-weight: 300;
	font-style: italic;
}
@font-face {
	font-family: 'Titillium';
	src: url('fonts/titillium-regular-webfont.eot');
	src: url('fonts/titillium-regular-webfont.svg#titillium-regular-webfont') format('svg'),
		 url('fonts/titillium-regular-webfont.eot?#iefix') format('embedded-opentype'),
		 url('fonts/titillium-regular-webfont.woff') format('woff'),
		 url('fonts/titillium-regular-webfont.ttf') format('truetype');
	font-weight: 400;
	font-style: normal;
}
@font-face {
	font-family: 'Titillium';
	src: url('fonts/titillium-regularitalic-webfont.eot');
	src: url('fonts/titillium-regularitalic-webfont.svg#titillium-regular-webfont') format('svg'),
		 url('fonts/titillium-regularitalic-webfont.eot?#iefix') format('embedded-opentype'),
		 url('fonts/titillium-regularitalic-webfont.woff') format('woff'),
		 url('fonts/titillium-regularitalic-webfont.ttf') format('truetype');
	font-weight: 400;
	font-style: italic;
}
@font-face {
    font-family: 'Titillium';
    src: url('fonts/titillium-semibold-webfont.eot');
    src: url('fonts/titillium-semibold-webfont.svg#titillium-semibold-webfont') format('svg'),
         url('fonts/titillium-semibold-webfont.eot?#iefix') format('embedded-opentype'),
         url('fonts/titillium-semibold-webfont.woff') format('woff'),
         url('fonts/titillium-semibold-webfont.ttf') format('truetype');
	font-weight: 600;
	font-style: normal;
}

<?php
if (empty($_GET['font'])) exit;

if ( $_GET['font'] == 'titillium-web' ) { echo 'body { font-family: "Titillium", Arial, sans-serif; }'. "\n"; }

if ( $_GET['font'] == 'titillium-web-ext' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Titillium+Web:400,400italic,300italic,300,600&subset=latin,latin-ext\');'. "\n"; echo 'body { font-family: "Titillium Web"; }'. "\n"; }

if ( $_GET['font'] == 'droid-serif' ) { /*echo '@import url(\'//fonts.googleapis.com/css?family=Droid+Serif:400,400italic,700\');'. "\n";*/ echo 'body { font-family: "Droid Serif"; }'. "\n"; }

if ( $_GET['font'] == 'source-sans-pro' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Source+Sans+Pro:400,300italic,300,400italic,600&subset=latin,latin-ext\');'. "\n"; echo 'body { font-family: "Source Sans Pro"; }'. "\n"; }

if ( $_GET['font'] == 'lato' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700\');'. "\n"; echo 'body { font-family: "Lato"; }'. "\n"; }

if ( $_GET['font'] == 'raleway' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Raleway:400,300,600\');'. "\n"; echo 'body { font-family: "Raleway", Arial, sans-serif; }'. "\n"; }

if ( $_GET['font'] == 'ubuntu' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,latin-ext\');'. "\n"; echo 'body { font-family: "Ubuntu"; }'. "\n"; }

if ( $_GET['font'] == 'ubuntu-cyr' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Ubuntu:400,400italic,300italic,300,700&subset=latin,cyrillic-ext\');'. "\n"; echo 'body { font-family: "Ubuntu"; }'. "\n"; }

if ( $_GET['font'] == 'roboto-condensed' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,latin-ext\');'. "\n"; echo 'body { font-family: "Roboto Condensed"; }'. "\n"; }

if ( $_GET['font'] == 'roboto-condensed-cyr' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Roboto+Condensed:400,300italic,300,400italic,700&subset=latin,cyrillic-ext\');'. "\n"; echo 'body { font-family: "Roboto Condensed"; }'. "\n"; }

if ( $_GET['font'] == 'roboto-sla' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,cyrillic-ext\');'. "\n"; echo 'body { font-family: "Roboto Slab", Arial, sans-serif; }'. "\n"; }

if ( $_GET['font'] == 'roboto-slab-cyr' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Roboto+Slab:400,300italic,300,400italic,700&subset=latin,cyrillic-ext\');'. "\n"; echo 'body { font-family: "Roboto Slab", Arial, sans-serif; }'. "\n"; }

if ( $_GET['font'] == 'playfair-display' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,latin-ext\');'. "\n"; echo 'body { font-family: "Playfair Display", Arial, sans-serif; }'. "\n"; }

if ( $_GET['font'] == 'playfair-display-cyr' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Playfair+Display:400,400italic,700&subset=latin,cyrillic\');'. "\n"; echo 'body { font-family: "Playfair Display", Arial, sans-serif; }'. "\n"; }

if ( $_GET['font'] == 'open-sans' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,latin-ext\');'. "\n"; echo 'body { font-family: "Open Sans"; }'. "\n"; }

if ( $_GET['font'] == 'open-sans-cyr' ) { echo '@import url(\'//fonts.googleapis.com/css?family=Open+Sans:400,400italic,300italic,300,600&subset=latin,cyrillic-ext\');'. "\n"; echo 'body { font-family: "Open Sans"; }'. "\n"; }

if ( $_GET['font'] == 'pt-serif' ) { echo '@import url(\'//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,latin-ext\');'. "\n"; echo 'body { font-family: "PT Serif"; }'. "\n"; }

if ( $_GET['font'] == 'pt-serif-cyr' ) { echo '@import url(\'//fonts.googleapis.com/css?family=PT+Serif:400,700,400italic&subset=latin,cyrillic-ext\');'. "\n"; echo 'body { font-family: "PT Serif"; }'. "\n"; }

if ( $_GET['font'] == 'arial' ) { echo 'body { font-family: Arial, sans-serif; }'. "\n"; }
if ( $_GET['font'] == 'georgia' ) { echo 'body { font-family: Georgia, serif; }'. "\n"; }
if ( $_GET['font'] == 'verdana' ) { echo 'body { font-family: Verdana, sans-serif; }'. "\n"; }
if ( $_GET['font'] == 'tahoma' ) { echo 'body { font-family: Tahoma, sans-serif; }'. "\n"; }
