
var gulp = require('gulp');

// general dependencies
var clean  = require('gulp-clean');
var concat = require('gulp-concat');
var notify = require('gulp-notify');
var rename = require('gulp-rename');
var autoprefix = require('gulp-autoprefixer');

// css-related dependencies
var sass = require('gulp-sass');
var minifyCSS = require('gulp-minify-css');

// js-related dependencies
var uglify  = require('gulp-uglify');

// clean file directories...
gulp.task('clean', function() {
  gulp.src(['dist/css', 'dist/js'], { read: false })
  .pipe( clean() )
  .pipe(notify({
    message: "Directory has been cleaned."
  }));
});

// stylesheet tasks
gulp.task('styles', function () {
  gulp.src([
    'public/vendor/bootstrap/dist/css/bootstrap.min.css',
    'public/vendor/components-font-awesome/css/font-awesome.min.css',
    'public/dist/css/less-style.css',
    'public/dist/css/style.css'
   ])
  .pipe(sass({ style: 'expanded' }))

  .pipe(concat('application.css'))
  .pipe(gulp.dest('public/dist/css'))

  .pipe(rename({suffix: '.min'}))
  .pipe(minifyCSS())
  .pipe(gulp.dest('public/dist/css'))

  .pipe(notify({
    message: "Styles are minifed."
  }));
});

// css lint

// js tasks
gulp.task('scripts', function () {
  gulp.src([
  	'public/vendor/jquery/jquery.min.js',
    'public/vendor/bootstrap/dist/js/bootstrap.min.js',
    'public/vendor/jquery-ui/ui/jquery-ui.js',
    'public/vendor/bootstrap-datetimepicker/js/*.js',
    'public/vendor/wysihtml5/dist/wysihtml5-0.3.0.min.js',
    'public/vendor/bootstrap-wysihtml5/dist/bootstrap-wysihtml5-0.0.2.min.js',
    //'public/vendor/jquery.steps/build/jquery.steps.min.js',
    //'public/vendor/jquery.slimscroll/jquery.slimscroll.min.js',
    //'public/vendor/fullcalendar/fullcalendar.min.js',
    //'public/vendor/respond/dest/respond.min.js',
    //'public/vendor/html5shiv/dist/html5shiv.min.js',
    //'public/dist/js/custom.js'
  ])
  .pipe(concat('application.js'))
  .pipe(gulp.dest('public/dist/js'))

  .pipe(rename( {suffix: '.min' }))
  .pipe(uglify())
  .pipe(gulp.dest('public/dist/js'))

  .pipe(notify({
    message: "Javascript has been minified!"
  }));
});


// watch for updates to js and css files...
gulp.task('watch', function() {
  gulp.watch('scss/**/*.scss', ['styles']);
  gulp.watch('coffee/**/*.coffee', ['scripts']);
});

// default task
gulp.task('default', ['clean'], function() {
  gulp.start('styles', 'scripts', 'watch');
});
