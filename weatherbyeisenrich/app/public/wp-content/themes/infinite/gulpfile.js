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
var targetjsDir = 'js';


// Compile SCSS and minify to app.css
gulp.task('sass', function(){
  return sass(scssDir + '/app.scss', { style: 'compressed' })
  .pipe(autoprefix('last 10 version'))
  .pipe(uglify())
  .pipe(gulp.dest(targetCssDir))
  .pipe(notify('CSS Complete'));
});


// Uglify task for JavaScript files
gulp.task('js', function() {
  gulp.src(jsDir + '/**/*.js')
  .pipe(uglify())
  .pipe(concat("/app.min.js"))
  .pipe(gulp.dest(targetjsDir))
});

gulp.task('watch', function() {
  gulp.watch(scssDir + '/**/*.scss', function() {
    gulp.run('sass');
  });

  gulp.watch(jsDir + '/**/*.js', function() {
    gulp.run('js');
  });
});

gulp.task('default', ['sass', 'js', 'watch']);