"use strict";

// Variables

//Gulp Plugins
var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var newer = require('gulp-newer');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var browserSync = require('browser-sync').create();
var reload = browserSync.reload;
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var watch = require('gulp-watch');

// Project URL.
var projectURL = 'localhost/wordpress/wp-skate-shop/';

// Styles related.
var styleSRC = 'src/sass/**/*.scss';
var styleDestination = './';

// JS related.
var jsSRC = 'src/js/dev/**/*.js';
var jsDestination = './src/js/dist/';
var jsFile = 'app.min.js';

// Images related.
var imgSrc = 'src/images/originals/*';
var imgDest = 'src/images/';
var baseImg = 'src/images/originals';

// Watch files paths.
var styleScssWatchFiles = 'src/sass/**/*.scss';
var styleSassWatchFiles= 'src/sass/**/*.sass';
var JSWatchFiles = 'src/js/**/*.js';
var PHPWatchFiles ='./**/*.php';

// Browsers autoprefixers
var autoprefixerBrowsers = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
];


// Tasks

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: projectURL,
        browser: ['chrome', 'firefox']
    });
});

gulp.task('sass', function () {
  return gulp.src( styleSRC )
    .pipe(sourcemaps.init())
    // .pipe(autoprefixer({ browsers: ['last 2 versions'], cascade: false }))
    .pipe(autoprefixer(autoprefixerBrowsers))
    .pipe(sass({ outputStyle:'expanded'}).on('error', sass.logError))
    .pipe(sourcemaps.write('./maps'))
    .pipe(gulp.dest( styleDestination ));
});


gulp.task('watch', function() {

    // Watch .scss & .sass files
    gulp.watch( styleScssWatchFiles , ['sass']).on("change", browserSync.reload);
    gulp.watch( styleSassWatchFiles , ['sass']).on("change", browserSync.reload);
    // Watch js directory
    gulp.watch( JSWatchFiles , ['js']).on("change", browserSync.reload);
    // Reload on PHP file changes.
    gulp.watch( PHPWatchFiles ).on("change", browserSync.reload);
    // Watch original images directory
    gulp.watch(imgSrc, ['images']).on("change", browserSync.reload);
});

gulp.task('images', function() {
    return gulp.src(imgSrc, {base: baseImg})
      .pipe(newer(imgDest))
      .pipe(imagemin({ optimizationLevel: 3, progressive: true, interlaced: true }))
      .pipe(gulp.dest(imgDest));
});


gulp.task('js', function(){
  return gulp.src( jsSRC )
    .pipe(concat( jsFile ))
    .pipe(uglify())
    .pipe(gulp.dest( jsDestination ))
});

// Move Font Awesome CSS to src/css
gulp.task('fa', function() {
  return gulp.src('bower_components/font-awesome/css/font-awesome.min.css')
    .pipe(gulp.dest('src/css'))
});

gulp.task('default',['sass', 'browser-sync','watch','images', 'js', 'fa']);

