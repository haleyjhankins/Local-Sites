var gulp = require('gulp'),
gutil = require('gulp-util'),
autoprefix = require('gulp-autoprefixer'),
sass = require('gulp-ruby-sass'),
uglify = require('gulp-uglify'),
watch = require('gulp-watch'),
concat = require('gulp-concat'),
notify = require('gulp-notify');

// Setup SCSS, CSS & JS folders as variables
var scssDir = 'assets/scss';
var targetCssDir = 'assets/css';
var jsDir = 'assets/js';
var lodashJsDir = 'node_modules/lodash/index.js';
var slickJsDir = 'node_modules/slick-carousel/slick/slick.js';
var lightboxJsDir = 'assets/lightbox/js/lightbox.js';

// Compile SCSS and minify to app.css
gulp.task('sass', function(){
  return sass(scssDir + '/vendor.scss', { style: 'compressed' })
  .pipe(autoprefix('last 4 version'))
  .pipe(gulp.dest(targetCssDir))
  .pipe(notify('CSS Complete'));
});

// Uglify task for JavaScript files
gulp.task('js', function() {
  gulp.src([jsDir, lodashJsDir, slickJsDir, lightboxJsDir])
  .pipe(uglify())
  .pipe(concat("vendor.min.js"))
  .pipe(gulp.dest(jsDir))
});

// Watch task only watches SASS function
gulp.task('watch', function() {
  gulp.watch(scssDir + '/**/*.scss', function() {
    gulp.run('sass');
  });
});

gulp.task('default', ['sass', 'js', 'watch']);