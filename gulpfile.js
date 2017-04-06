var gulp = require('gulp');
var rename = require('gulp-rename');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var csso = require('gulp-csso');
var htmlmin = require('gulp-htmlmin');


gulp.task('jsmin', function() {
	var DEST = 'build/js';
	return gulp.src([
		"js/jquery.min.js",
		"js/bootstrap.min.js",
		"js/gmap3.js",
		"js/plugins.js",
		"revolution/js/jquery.themepunch.tools.min.js",
		"revolution/js/jquery.themepunch.revolution.min.js",
		"js/rev-slider.js",
		"js/scripts.js",
		"revolution/js/extensions/revolution.extension.video.min.js",
		"revolution/js/extensions/revolution.extension.carousel.min.js",
		"revolution/js/extensions/revolution.extension.slideanims.min.js",
		"revolution/js/extensions/revolution.extension.actions.min.js",
		"revolution/js/extensions/revolution.extension.layeranimation.min.js",
		"revolution/js/extensions/revolution.extension.kenburn.min.js",
		"revolution/js/extensions/revolution.extension.navigation.min.js",
		"revolution/js/extensions/revolution.extension.migration.min.js",
		"revolution/js/extensions/revolution.extension.parallax.min.js"
  	])
    .pipe(concat('script.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest(DEST));
});


gulp.task('cssmin', function() {
	var DEST = 'build/css';
 	return gulp.src([
		"css/bootstrap.min.css",
		"css/magnific-popup.css",
		"css/font-icons.css",
		"revolution/css/settings.css",
		"css/rev-slider.css",
		"css/sliders.css",
		"css/style.css",
		"css/responsive.css",
		"css/spacings.css",
		"css/animate.css"
  	])
    .pipe(concat('main.css'), {newLine: '\n\n\n\n\n\n\n\n'})
    .pipe(gulp.dest(DEST))
    .pipe(rename('main.min.css'))
    .pipe(csso({comments: 'none'}))
    .pipe(gulp.dest(DEST));
});


gulp.task('htmlmin', function() {
	var DEST = '.';
 	gulp.src([
		"index.html"
  	])
    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
    .pipe(rename('index.php'))
    .pipe(gulp.dest(DEST));

    DEST = 'avihita/';
 	return gulp.src([
		"avihita/index.html"
  	])
    .pipe(htmlmin({collapseWhitespace: true, removeComments: true}))
    .pipe(rename('index.php'))
    .pipe(gulp.dest(DEST));
});


gulp.task('default', function() {
	gulp.start('jsmin', 'cssmin', 'htmlmin');
})