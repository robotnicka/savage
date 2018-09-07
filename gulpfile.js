var gulp = require('gulp');
var sass = require('gulp-sass');
var neat = require('node-neat');

gulp.task('sass', function() {
    return gulp.src('sass/**/*.scss')
    .pipe(sass({
        includePaths: require('node-neat').includePaths
    }))
    .pipe(gulp.dest(''));
});

gulp.task('watch', function() {
    gulp.watch('sass/**/*.scss', ['sass']);
});

gulp.task('default', ['sass', 'watch']);
