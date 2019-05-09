// Load Gulp...of course
const { src, dest, task, watch, series, parallel } = require('gulp');

// CSS related plugins
var sass         = require( 'gulp-sass' );
var autoprefixer = require( 'gulp-autoprefixer' );

// JS related plugins
var uglify       = require( 'gulp-uglify' );
var babelify     = require( 'babelify' );
var browserify   = require( 'browserify' );
var source       = require( 'vinyl-source-stream' );
var buffer       = require( 'vinyl-buffer' );
var stripDebug   = require( 'gulp-strip-debug' );
var concat       = require( 'gulp-concat' );

// Utility plugins
var imagemin     = require( 'gulp-imagemin' );
var newer        = require( 'gulp-newer' );
var rename       = require( 'gulp-rename' );
var sourcemaps   = require( 'gulp-sourcemaps' );
var notify       = require( 'gulp-notify' );
var plumber      = require( 'gulp-plumber' );
var options      = require( 'gulp-options' );
var gulpif       = require( 'gulp-if' );

// Browers related plugins
var browserSync  = require( 'browser-sync' ).create();

// Project related variables
var projectURL   = 'http://localhost/03-wordpress/wordpress/';

var styleSRC     = './src/sass/*.scss';
var styleURL     = './dist/css/';
var mapURL       = './';

var jsSRC        = './src/js/*.js';
var jsFiles      = 'app.min.js';
var jsURL        = './dist/js/';

var imgSRC       = './src/images/*';
var imgURL       = './dist/images/';

var fontsSRC     = './src/fonts/*';
var fontsURL     = './dist/fonts/';

var iconsSRC     = './bower_components/font-awesome/css/font-awesome.min.css';
var iconsURL     = './dist/css/';

// var htmlSRC     = './src/**/*.html';
// var htmlURL     = './dist/';

var phpWatch     = './**/*.php';
var styleWatch   = './src/sass/**';
var jsWatch      = './src/js/*.js';
var imgWatch     = './src/images/originals/*';
var fontsWatch   = './src/fonts/*.*';
var iconsWatch   = './bower_components/font-awesome/css/font-awesome.min.css';
// var htmlWatch    = './src/**/*.html';

// Tasks
function browser_sync() {
	browserSync.init({
      proxy: projectURL,
      browser: 'chrome',
      injectChanges: true
	});
}

function reload(done) {
	browserSync.reload();
	done();
}

function css(done) {
	src( styleSRC )
		.pipe( sourcemaps.init() )
		.pipe( sass({
         errLogToConsole: true,
         indentedSyntax: true,
         outputStyle: 'compressed',
         noCache: true,
         lineNumbers: false
		}) )
		.on( 'error', console.error.bind( console ) )
		.pipe( autoprefixer({ browsers: [ 'last 2 versions', '> 5%', 'Firefox ESR' ] }) )
		.pipe( rename( { suffix: '.min' } ) )
		.pipe( sourcemaps.write( mapURL ) )
		.pipe( dest( styleURL ) )
		.pipe( browserSync.stream() );
	done();
};

function js(){
   return src( jsSRC )
      .pipe(concat( jsFiles ))
      .pipe( sourcemaps.init({ loadMaps: true }) )
      .pipe( uglify() )
      .pipe( sourcemaps.write( '.' ) )
      .pipe( dest( jsURL ) )
      .pipe(browserSync.stream());
};

function images() {
   return src(imgSRC)
      .pipe(plumber())
      .pipe(newer(imgURL))
      .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
      .pipe(dest(imgURL));
};

function triggerPlumber( src_file, dest_file ) {
	return src( src_file )
		.pipe( plumber() )
		.pipe( dest( dest_file ) );
};

function fonts() {
	return triggerPlumber( fontsSRC, fontsURL );
};

function icons() {
	return triggerPlumber( iconsSRC, iconsURL );
};

// function html() {
// 	return triggerPlumber( htmlSRC, htmlURL );
// };

function watch_files() {
	watch(styleWatch, series(css, reload));
   watch(phpWatch, reload);
	watch(jsWatch, series(js, reload));
	watch(imgWatch, series(images, reload));
	watch(fontsWatch, series(fonts, reload));
   watch(iconsWatch, series(icons, reload));

	// watch(htmlWatch, series(html, reload));
	// src(jsURL + 'app.min.js')
	// 	.pipe( notify({ message: 'Gulp is Watching, Happy Coding!' }) );
}

task("css", css);
task("js", js);
task("images", images);
task("fonts", fonts);
task("icons", icons);
// task("html", html);
task("default", parallel(css, js, images, fonts, icons));
task("watch", parallel(browser_sync, watch_files));