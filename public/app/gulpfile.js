var fileinclude     = require('gulp-file-include');
var gulp            = require('gulp');
var browserSync     = require('browser-sync');
var reload          = browserSync.reload;
var sass            = require('gulp-sass');
var minifyCss       = require('gulp-clean-css');
var sourcemaps      = require('gulp-sourcemaps');
var autoprefixer    = require('gulp-autoprefixer');
var gp_concat       = require('gulp-concat');
var gp_rename       = require('gulp-rename');
var gp_uglify       = require('gulp-uglify');
var bourbon         = require('bourbon-neat').includePaths;
var neat            = require('node-bourbon').includePaths;

gulp.task('serve', ['sass', 'vendor-minify-css', 'deploy-images', 'plugin-minify-css', 'vendor-js', 'plugin-js'], function() {

    browserSync.init({
        proxy: "http://localhost/investigationservices.co.uk/",
        port: 3004
    });

    gulp.watch('sass/**/*.scss', ['sass']);
    gulp.watch(['js/**/*.js'], ['plugin-js','vendor-js']);
    gulp.watch("../../**/*.php").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("sass/*.scss")
        //prevent pipe breaking caused by errors from gulp plugins
        .pipe(sourcemaps.init())
        .pipe(sass({
            includePaths: [].concat(bourbon,neat),
            errLogToConsole: true,
            outputStyle: 'expanded' // Options: nested, expanded, compact, compressed
        }))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write())
        .pipe(gulp.dest("../css/"))
        .pipe(browserSync.stream());
});

gulp.task('vendor-minify-css', function() {
  return gulp.src(['css/vendor/*.css'])
    .pipe(gp_concat('vendor.css'))
    .pipe(gp_rename('vendor.min.css'))
    .pipe(minifyCss())
    .pipe(gulp.dest('../css/'))
});

gulp.task('deploy-images', function() {
    gulp.src('css/**/*.{jpg,png,gif}')
    .pipe(gulp.dest('../css/images/'));
});

gulp.task('plugin-minify-css', function() {
  return gulp.src('../css/plugin-styles.css')
    .pipe(minifyCss({compatibility: 'ie8', keepBreaks:false}))
    .pipe(gp_rename({ suffix: '.min' }))
    .pipe(gp_rename('bm-acf-page-builder-public.min.css'))
    .pipe(gulp.dest("../css/"))
    
});

gulp.task('vendor-js', function(){
    return gulp.src(['js/vendor/*.js'])
        .pipe(gp_concat('vendor.js'))
        .pipe(gp_rename('vendor.min.js'))
        .pipe(gp_uglify())
        .pipe(gulp.dest('../js/'))
});

gulp.task('plugin-js', function(){
    return gulp.src(['js/bm-acf-page-builder-public.js'])
        .pipe(gp_rename('bm-acf-page-builder-public.min.js'))
        .pipe(gp_uglify())
        .pipe(gulp.dest('../js/'))
});

// Build task
gulp.task('build', ['sass', 'vendor-minify-css', 'deploy-images', 'plugin-minify-css', 'vendor-js', 'plugin-js']);
 
// Default task to be run with `gulp`
gulp.task('default', ['serve']);

