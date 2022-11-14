// Gulp
var gulp = require('gulp');

// Sass/CSS stuff
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var exec = require('gulp-exec');
var notify = require("gulp-notify");
var babel = require('gulp-babel');
var sass = require("gulp-sass");
var sourcemaps = require('gulp-sourcemaps');

// JS stuff
var minify = require('gulp-minify');

gulp.task('styles', function() {
    return gulp.src('styles/main.scss')
    .pipe(sass({
        outputStyle: false
    }))
    .pipe(concat('./styles/styles.css'))
    .pipe(gulp.dest('.'));
});

gulp.task('compress', function() {
    return gulp.src(['./amd/src/*.js'])
    .pipe(sourcemaps.init())
    .pipe(minify({
        ext: {
            min: '.min.js'
        },
        noSource: true,
        ignoreFiles: []
    }))
    .pipe(sourcemaps.write('.'))
    .pipe(gulp.dest('./amd/build'));
});

gulp.task('purge', gulp.series(function() {
    return gulp.src('.')
    .pipe(exec('php ./../../admin/cli/purge_caches.php'))
    .pipe(notify('Purged All'));
}));

gulp.task('purgejs', gulp.series(function() {
    return gulp.src('.')
    .pipe(exec('php ./../../admin/cli/purge_caches.php --js=true'))
    .pipe(notify('Purged JS'));
}));

gulp.task('purgelang', gulp.series(function() {
    return gulp.src('.')
    .pipe(exec('php ./../../admin/cli/purge_caches.php --lang=true'))
    .pipe(notify('Purged Language Packs'));
}));

gulp.task('watch', function(done) {
    gulp.watch('./amd/src/*.js', gulp.series('compress', 'purgejs'));
    gulp.watch('./styles/**/*.scss', gulp.series('styles'));
    gulp.watch(['./lang/**/*.php'], gulp.series('purgelang'));
    gulp.watch(['./styles.css', './templates/**/*.mustache'], gulp.series('purge'));
    done();
});

gulp.task('default', gulp.series('compress', 'styles', 'purge', 'watch'));
