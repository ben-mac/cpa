var gulp = require('gulp'),
    sass = require('gulp-sass'),
    sourcemaps = require('gulp-sourcemaps'),
    autoprefixer = require('gulp-autoprefixer'),
    browserSync = require('browser-sync');

// Browser Sync it up

gulp.task('browser-sync', function() {
  var files = [
    './style.css',
    './*.php'
  ];

  // initialize that Browser
  browserSync.init(files, {
    proxy: "cpa.test"
  });
});

var sourcemaps = require('gulp-sourcemaps');

// Gulp Sass task + browser syn
gulp.task('sass', function() {
  return gulp.src('sass/*.scss')
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'expanded'}).on('error', sass.logError))
    .pipe(sourcemaps.write())
    .pipe(autoprefixer())
    .pipe(gulp.dest('./'))
    .pipe(browserSync.stream());
});

// Default task for Gulp
gulp.task('default', ['sass', 'browser-sync'], function() {
  gulp.watch("sass/**/*.scss", ['sass']);
});

// Gulp Prod task
gulp.task('prod', function() {
  return gulp.src('sass/*.scss')
    .pipe(sass({outputStyle: 'compressed'})
    .pipe(autoprefixer())
    .pipe(gulp.dest('./')))
});



