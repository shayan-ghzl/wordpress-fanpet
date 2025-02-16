'use strict';
const gulp = require('gulp');
const dartSass = require('sass');
const gulpSass = require('gulp-sass');
const sass = gulpSass(dartSass);
const cleanCSS = require('gulp-clean-css');
const rename = require("gulp-rename");

// ----------------------------------------------

gulp.task('sass', function () {
  return gulp.src(['./assets/scss/style.scss'])
    .pipe(sass())
    .pipe(gulp.dest('./assets/css'));
});

gulp.task('autoprefixer', async function () {
  const autoprefixer = (await import('gulp-autoprefixer')).default;

  return gulp.src('./assets/css/*.css')
    .pipe(autoprefixer({ cascade: false }))
    .pipe(gulp.dest('./assets/css/prefixed-style'));
});

gulp.task('minify-prefixer', async function () {
  const autoprefixer = (await import('gulp-autoprefixer')).default;

  return gulp.src('./assets/css/prefixed-style/*.css')
    .pipe(autoprefixer({ cascade: false }))
    .pipe(gulp.dest('./assets/css/prefixed-style/min'));
});

gulp.task('minify-css', function () {
  return gulp.src(['./assets/css/style.css'])
    .pipe(cleanCSS({ compatibility: 'ie8' }))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('./assets/css'));
});

gulp.task('watch', function () {
  gulp.watch('./assets/scss/**/*.scss', gulp.series(['sass', 'minify-css']));
  // gulp.watch('./assets/scss/**/*.scss', gulp.series(['sass', 'minify-css', 'autoprefixer', 'minify-prefixer']));
});

gulp.task('minify-svg', async function () {
  const { default: imagemin } = await import('gulp-imagemin');
  const { default: imageminSvgo } = await import('imagemin-svgo');

  gulp.src('./assets/images/svg-icons/*.svg')
    .pipe(imagemin([imageminSvgo()]))
    .pipe(gulp.dest('./assets/gulp-imagemin/svg-icons'));
});

gulp.task('minify-image', async function () {
  const { default: imagemin } = await import('gulp-imagemin');
  gulp.src(['./assets/images/*.png', './assets/images/*.jpg'])
    .pipe(imagemin())
    .pipe(gulp.dest('./assets/images/min'));
});

gulp.task('default', async function () {
  gulp.series(['sass', 'minify-css']);
  // gulp.series(['sass', 'minify-css', 'autoprefixer', 'minify-prefixer', 'minify-svg', 'minify-image']);
});