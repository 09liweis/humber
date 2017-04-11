var gulp = require('gulp');

var cleanCSS = require('gulp-clean-css');
var concatCss = require('gulp-concat-css');

gulp.task('minify-css', function() {
    return gulp.src('dev/css/*.css')
    .pipe(concatCss('styles.css'))
    .pipe(cleanCSS())
    .pipe(gulp.dest('production/css'));
});

var sass = require('gulp-sass');
gulp.task('sassit', function() {
    return gulp.src('dev/css/*.sass').pipe(sass().on('error', sass.logError)).pipe(gulp.dest('dev/css'));
});


gulp.task('styles', ['sassit', 'minify-css'], function() {
    
});

var imagemin = require('gulp-imagemin');
gulp.task('imagemin', function() {
    gulp.src('dev/images/**/*').pipe(imagemin()).pipe(gulp.dest('production/images'));
});

gulp.task('watch', function() {
    gulp.watch('dev/css/*.sass', ['sassit']);
    gulp.watch('dev/css/*.css', ['styles']);
    gulp.watch('dev/images/**/*', ['imagemin']);
});