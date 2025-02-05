import gulp from 'gulp';
import browserSync from 'browser-sync';
import * as dartSass from 'sass';
import gulpSass from 'gulp-sass';
import postcss from 'gulp-postcss';
import tailwindcss from 'tailwindcss';
import autoprefixer from 'autoprefixer';
import cssnano from 'gulp-cssnano';
import plumber from 'gulp-plumber';
import notify from 'gulp-notify';

const styles = gulpSass(dartSass);
const reload = browserSync.reload;

// Funktion för att hantera felmeddelanden snyggt
function customPlumber(errTitle) {
    return plumber({
        errorHandler: notify.onError({
            title: errTitle || "Error running Gulp",
            message: "Error: <%= error.message %>",
            sound: "Submarine"
        })
    });
}

// // BrowserSync (för live-reload)
// gulp.task('browser-sync', function (done) {
//     browserSync.init({
//         proxy: 'localhost:8888/jakko/', // Ändra till din lokala URL om nödvändigt
//         notify: false,
//         open: false // Förhindrar att en ny flik öppnas automatiskt
//     });
//     done();
// });

// browser-sync task for starting the server.
gulp.task('browser-sync', function (complete) {
    console.log('Starting BrowserSync...');
    //watch files
    var files = [
        './style.css',
        './*.php',
        './template-parts/*.php',
    ];

    //initialize browsersync
    browserSync.init(files, {
        //browsersync with a php server
        proxy: 'localhost:8888/jakko/',
        notify: false
    });
    complete();
});

// Sass-kompilering, PostCSS och minifiering
gulp.task('styles', function () {
    return gulp.src('sass/*.scss')
        .pipe(customPlumber('Error Running styles'))
        .pipe(styles()) // Kompilera SCSS till CSS
        // .pipe(postcss([tailwindcss(), autoprefixer()])) // Lägg till Tailwind och Autoprefixer
        // .pipe(cssnano()) // Minifiera CSS
        .pipe(gulp.dest('./')) // Spara den kompilerade CSS-filen
        .pipe(reload({ stream: true })); // Ladda om webbläsaren
});

// Watch-funktion som lyssnar efter ändringar
gulp.task('watch', function () {
    console.log('Watching for file changes...');
    gulp.watch('sass/**/*.scss', gulp.series('styles')).on('change', function (path) {
        console.log('Changed: ' + path);  // Loggar ändringar av SASS-filer
    });
    gulp.watch('./**/*.php').on('change', function (path) {
        console.log('Changed: ' + path);  // Loggar ändringar av PHP-filer
        reload(path); // Uppdaterar browser-sync för PHP-ändringar
    });
});

// Standarduppgift (körs med `gulp`)
gulp.task('default', gulp.series('styles', 'browser-sync', 'watch'));
