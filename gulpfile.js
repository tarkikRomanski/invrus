var gulp = require('gulp');
var es6 = require('es6-promise').polyfill();
var rename = require('gulp-rename');
var postcss = require('gulp-postcss');
var cssnano = require('cssnano');
var nested = require('postcss-nested');
var cssshort = require('postcss-short');
var cssnext = require('cssnext');


gulp.task('css', function () {
    var processors = [
      nested,
      cssnext(),
      cssshort(),
      cssnano(),
    ];
    return gulp.src('./style/inStyle.css')
        .pipe(postcss(processors))
        .pipe(rename('main.css'))
        .pipe(gulp.dest('./style/'));
});

gulp.task('default', function(){
  gulp.watch('style/inStyle.css', function(){
    gulp.run('css');
  });
});
