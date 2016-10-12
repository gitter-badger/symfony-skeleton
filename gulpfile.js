/**
 * Gulpfile.js
 */

/**
 * Initializing dependencies
 */
var gulp      = require('gulp');
var concatCss = require('gulp-concat-css');
var cleanCSS  = require('gulp-clean-css');
var uglify    = require('gulp-uglifyjs');
var gutil     = require('gulp-util');
var sass      = require('gulp-sass');
var watch     = require('gulp-watch');

/**
 * Global vars
 */
var global = {
    assetsDirectory: 'app/Resources/public',
};


/**
 * Style tasks
 */
gulp.task('styles', function () {
    gutil.log(gutil.colors.red('Procesing css files.'));

    gulp.src([
        global.assetsDirectory + '/css/*'
    ])
    	.pipe(sass())
        .pipe(concatCss('all.css'))
        .pipe(gulp.dest('web/assets/css'));
});


/**
 * Scripts tasks
 */
gulp.task('scripts', function () {
    gutil.log(gutil.colors.red('Procesing js files'));

    return gulp.src([
        'node_modules/jquery/dist/jquery.min.js',
        'node_modules/materialize-css/dist/js/materialize.min.js',
        global.assetsDirectory + '/js/*'
    ])
        .pipe(uglify('all.js'))
        .pipe(gulp.dest('web/assets/js'));
});


/**
 * Fonts tasks
 */
gulp.task('fonts', function () {
    gutil.log(gutil.colors.red('Copying the fonts'));

    return gulp.src([
        global.assetsDirectory + '/fonts/**/*.*',
        'node_modules/materialize-css/dist/fonts/**/*.*'
        ])
        .pipe(gulp.dest('web/assets/fonts'));
});


/**
 * Images tasks
 */
gulp.task('images', function () {
    gutil.log(gutil.colors.red('Copying the images'));

    return gulp.src(global.assetsDirectory + '/images/*')
        .pipe(gulp.dest('web/assets/images'));
});


/**
 * Watch task to check every change in the files
 */
gulp.task('watch', function () {
    gutil.log(gutil.colors.cyan('Watching changes...'));

    return gulp.watch(global.assetsDirectory + '/**/*.*', ['styles', 'scripts']);
});


/**
 * All the task to execute with the command gulp
 */
gulp.task('default', [
	'styles', 
	'scripts', 
	'fonts',
    'images'
]);