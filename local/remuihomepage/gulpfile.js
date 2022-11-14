
// Gulp.
var gulp = require('gulp');

// Sass/CSS stuff.
var gulpSass = require('gulp-sass');
var dartSass = require('sass');
var concat = require('gulp-concat');
const sass = gulpSass(dartSass);

gulp.task('styles', function() {
    return gulp.src('scss/all.scss')
    .pipe(sass({
        outputStyle: 'compressed'
    }))
    .pipe(concat('styles.css'))
    .pipe(gulp.dest('.'));
});
