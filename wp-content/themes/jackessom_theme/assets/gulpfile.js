var gulp = require("gulp"),
	util = require("gulp-util"),
	sass = require("gulp-sass"),
	autoprefixer = require('gulp-autoprefixer'),
	minifycss = require('gulp-minify-css'),
	rename = require('gulp-rename'),
	sourcemaps = require('gulp-sourcemaps'),
	uglify = require('gulp-uglify'),
	pump = require('pump'),
	imagemin = require('gulp-imagemin'),
	log = util.log;

var sassFiles = "sass/**/*.scss";
var jsFiles = "js/src/**/*.js";
var imageFiles = "images/**/*";

gulp.task('sass', function (cb) {
	log("Generate CSS files " + (new Date()).toString());
	pump([
	    gulp.src(sassFiles),
	    sourcemaps.init(),
	    sass({ style: 'expanded' }),
	    autoprefixer("last 3 version","safari 5", "ie 8", "ie 9"),
	    gulp.dest("css"),
	    rename({suffix: '.min'}),
	    minifycss(),
	    sourcemaps.write('map'),
	    gulp.dest('css')
	],
	cb
	);
});

gulp.task('js', function (cb) {
	log("Generate .min.js files " + (new Date()).toString());
	pump([
	    gulp.src(jsFiles),
	    rename({suffix: '.min'}),
	    uglify(),
	    gulp.dest('js')
	],
	cb
	);
});

gulp.task("images", function (cb) {
	log("compress image files files " + (new Date()).toString());
	pump([
	    gulp.src(imageFiles),
	    imagemin(),
	    gulp.dest('images')
	],
	cb
	);
});

gulp.task("watch", function(){
    gulp.watch(sassFiles, ["sass"]);
    gulp.watch(jsFiles, ["js"]);
    gulp.watch(imageFiles, ["images"]);
});

gulp.task("build", ["sass", "js", "images"]);

gulp.task("default", ["watch"]);