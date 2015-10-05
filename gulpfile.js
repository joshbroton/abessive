var gulp            = require('gulp'),
    connect         = require('gulp-connect'),
    babel           = require('gulp-babel'),
    sass            = require('gulp-sass'),
    autoprefixer    = require('gulp-autoprefixer'),
    sourcemaps      = require('gulp-sourcemaps'),
    clean           = require('gulp-clean'),
    minifyCss       = require('gulp-minify-css'),
    uglify          = require('gulp-uglify'),
    rename          = require('gulp-rename'),
    htmlreplace     = require('gulp-html-replace'),
    zip             = require('gulp-zip'),
    eslint          = require('gulp-eslint'),
    scsslint        = require('gulp-scss-lint');

var roots = {
    dev: './dev/',
    build: './build/'
};

gulp.task('connect', ['sass', 'babel'], function() {
    connect.server({
        root: roots.dev,
        livereload: true
    });
});

gulp.task('html', function() {
    gulp.src(roots.dev + '*.html')
        .pipe(connect.reload());
});

gulp.task('babel', function() {
    gulp.src(roots.dev + 'js/**/*.es6')
        .pipe(babel())
        .pipe(gulp.dest(roots.dev + '/js'))
        .pipe(connect.reload());
});

gulp.task('sass', function() {
    gulp.src(roots.dev + 'scss/styles.scss')
        .pipe(sourcemaps.init())
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer({
            browsers: ['last 2 versions', 'ie <= 9'],
            cascade: false
        }))
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest(roots.dev + 'css'));
});

gulp.task('css', function() {
    gulp.src(roots.dev + 'css/*.css')
        .pipe(connect.reload());
});

gulp.task('watch', ['connect'], function() {
    gulp.watch([roots.dev + '**/*.html'], ['html']);
    gulp.watch([roots.dev + 'js/**/*.es6'], ['babel']);
    gulp.watch([roots.dev + 'scss/**/*.scss'], ['sass']);
    gulp.watch([roots.dev + 'css/**/*.css'], ['css']);
});

// Delete the build directory if it exists
gulp.task('clean', ['sass', 'babel'], function() {
    return gulp.src(roots.build)
               .pipe(clean());
});

gulp.task('clean-unminified', ['build-copy', 'minify-css', 'uglify'], function() {
    return gulp.src([
                    roots.build + 'css/styles.css',
                    roots.build + 'js/site/app.js'
               ])
               .pipe(clean());
});

gulp.task('build-copy', ['clean'], function() {
    return gulp.src([
                    roots.dev + '**/*',
                    '!' + roots.dev + '{scss,scss/**}',
                    '!./**/*.map',
                    '!./**/*.es6'
                ])
               .pipe(gulp.dest('build'));
});

gulp.task('minify-css', ['build-copy'], function() {
    return gulp.src(roots.build + 'css/styles.css')
               .pipe(minifyCss())
               .pipe(rename({suffix: '.min'}))
               .pipe(gulp.dest('build/css'));
});

gulp.task('uglify', ['build-copy'], function() {
    return gulp.src(roots.build + 'js/site/**/*.js')
               .pipe(uglify())
               .pipe(rename({suffix: '.min'}))
               .pipe(gulp.dest('build/js/site'));
});

gulp.task('html-replace', ['build-copy'], function() {
    gulp.src(roots.build + 'index.html')
        .pipe(htmlreplace({
            'css': 'css/styles.min.css',
            'js': 'js/site/app.min.js'
        }))
        .pipe(gulp.dest('build/'))
});

gulp.task('zip', ['html-replace', 'clean-unminified'], function() {
    return gulp.src('./{build,build/**}')
               .pipe(zip('build.' + dateHash() + '.zip'))
               .pipe(gulp.dest('./'));
});

gulp.task('eslint', function() {
    return gulp.src(roots.dev + 'js/site/*.es6')
               .pipe(eslint())
               .pipe(eslint.format());
               // If eslint happens BEFORE transpilation, and you want it to fail before,
               // then add this line and add eslint as requirement for babel task
               //.pipe(eslint.failOnError());
});

gulp.task('scsslint', ['eslint'], function() {
    return gulp.src(roots.dev + 'scss/*.scss')
               .pipe(scsslint({'config': 'scss-lint-config.yml'}));
});

gulp.task('start', ['watch']);

gulp.task('build', ['clean', 'build-copy', 'minify-css', 'uglify', 'html-replace', 'clean-unminified', 'zip']);

gulp.task('lint', ['eslint', 'scsslint']);

//for zip creation
var dateHash = function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd
    }

    if(mm<10) {
        mm='0'+mm
    }

    var date = yyyy + '-' + mm + '-' + dd + '.' + today.getTime();
    return date;
};

