'use strict';

const gulp = require('gulp');
const runSequence = require('run-sequence');
const plumber = require('gulp-plumber');
const notify = require('gulp-notify');

// image
const imagemin = require('gulp-imagemin');
const imageminJpg = require('imagemin-jpeg-recompress');
const imageminPng = require('imagemin-pngquant');
const imageminGif = require('imagemin-gifsicle');

// css
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const autoprefixer = require('gulp-autoprefixer');
const rename = require('gulp-rename');

// js
const babel = require('gulp-babel');
const concat = require('gulp-concat');
const uglify = require('gulp-uglify');

// svg
const svgmin = require('gulp-svgmin');
const svgstore = require('gulp-svgstore');
const cheerio = require('gulp-cheerio');
const svg2png = require('gulp-svg2png');

// clean
const del = require('del');

// directory settings
const dir = {
  src: {
    css: 'src/css',
    js: 'src/js',
    img: 'src/img',
    svg: 'src/svg',
  },
  dist: {
    css: 'dist/css',
    js: 'dist/js',
    img: 'dist/img',
    svg: 'dist/svg',
  },
};

// Clean directory
gulp.task('clean', callback => {
  del(['img'], callback);
});

/**
 * Build defaultTasks
 */
gulp.task('build', ['clean'], callback => {
  return runSequence(['scss', 'img'], callback);
});

/**
 * Minify images
 */
gulp.task('img', () => {
  gulp
    .src(`${dir.src.img}/**/*.+(jpg|jpeg|png|gif)`)
    .pipe(
      imagemin([
        imageminPng(),
        imageminJpg(),
        imageminGif({
          interlaced: false,
          optimizationLevel: 3,
          colors: 180,
        }),
      ])
    )
    .pipe(gulp.dest(dir.dist.img));
});

/**
 * Build SVG
 */
gulp.task('svg', function() {
  gulp
    .src(`${dir.src.svg}/icon/*.svg`)
    .pipe(svgmin())
    .pipe(svgstore({ inlineSvg: true }))
    .pipe(
      cheerio({
        run: function($, file) {
          $('svg').addClass('hide');
          $('[fill]').removeAttr('fill');
        },
        parserOptions: { xmlMode: true },
      })
    )
    .pipe(gulp.dest(dir.dist.svg));
});
gulp.task('svg2png', function() {
  gulp
    .src(`${dir.src.svg}/icon/*.svg`)
    .pipe(svg2png(3))
    .pipe(rename({ prefix: 'icon.svg.' }))
    .pipe(imagemin())
    .pipe(gulp.dest(dir.dist.svg));
});

/**
 * Build CSS
 */
gulp.task('scss', () => {
  return gulp
    .src([`${dir.src.css}/**/*.scss`])
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(sourcemaps.init())
    .pipe(sass({ outputStyle: 'expanded' }))
    .pipe(
      autoprefixer({
        browsers: ['last 2 version'],
        sourceComments: true,
        cascade: false,
      })
    )
    .pipe(sourcemaps.write('./maps/'))
    .pipe(gulp.dest(dir.dist.css));
});

/**
 * Build JS
 */
// Babel
gulp.task('babel', () => {
  return gulp
    .src([`${dir.src.js}/**/*.js`])
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(
      babel({
        presets: ['env'],
      })
    )
    .pipe(gulp.dest(dir.dist.js));
});

// Uglify
gulp.task('uglify', () => {
  return gulp
    .src([`${dir.src.js}/**/*.js`])
    .pipe(
      plumber({ errorHandler: notify.onError('Error: <%= error.message %>') })
    )
    .pipe(uglify())
    .on('error', function(e) {
      console.log(e);
    })
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(dir.dist.js));
});

gulp.task('watch', ['img', 'scss', 'babel'], () => {
  gulp.watch(`${dir.src.js}/**/*.js`, ['babel']);
  gulp.watch(`${dir.src.css}/**/*.scss`, ['scss']);
  gulp.watch(`${dir.src.img}/**/*.+(jpg|jpeg|png|gif)`, ['img']);
});

gulp.task('default', ['watch']);
