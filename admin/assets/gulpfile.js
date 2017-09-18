var fileinclude 	= require('gulp-file-include');
var gulp        	= require('gulp');
var browserSync   = require('browser-sync');
var reload        = browserSync.reload;
var uglify 			  = require('gulp-uglify');
var gp_rename   	= require('gulp-rename');
var pump 			    = require('pump');
var sass          = require('gulp-sass');
var minifyCss     = require('gulp-clean-css');
var sourcemaps    = require('gulp-sourcemaps');
var autoprefixer  = require('gulp-autoprefixer');

gulp.task('sass', function () {
 return gulp.src('css/sass/**/*.scss')
  .pipe(sourcemaps.init())
  .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
  .pipe(minifyCss({compatibility: 'ie8', keepBreaks:false}))
  .pipe(sourcemaps.write())
  .pipe(gp_rename('input.min.css'))
  .pipe(gulp.dest("css/"))
  .pipe(browserSync.stream());
});

// process JS files and return the stream.
gulp.task('js', function () {
    return gulp.src('js/partials/input.js')
        .pipe(fileinclude({
		  prefix: '@@',
		}))
		.pipe(gp_rename('input.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('js/'))
});

// create a task that ensures the `js` task is complete before
// reloading browsers
gulp.task('js-watch', ['js'], function (done) {
    browserSync.reload();
    done();
});

gulp.task('serve', ['js','sass'], function() {

    browserSync.init({
        port: 3004,
        proxy: "localhost/blag-new-wp/"
    });

    // add browserSync.reload to the tasks array to make
    // all browsers reload after tasks are complete.
    gulp.watch("js/**/*.js", ['js-watch']);
    gulp.watch("css/sass/**/*.scss", ['sass']);
    gulp.watch("../**/*.php").on('change', browserSync.reload);
});

// Default task to be run with `gulp`
gulp.task('default', ['serve']);