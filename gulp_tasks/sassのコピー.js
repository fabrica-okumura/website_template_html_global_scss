const gulp = require("gulp")
// Compile Sass
const sass = require("gulp-dart-sass")
// Prevent stopping on error
const plumber = require("gulp-plumber")
// Alert output
const notify = require("gulp-notify")
// Rename to .min.css
const rename = require("gulp-rename")
// File system
const fs = require("fs")
// Autoprefixer
const autoprefixer = require("gulp-autoprefixer")
// PostCSS
const postcss = require("gulp-postcss")
const mergeQueries = require("postcss-merge-queries")
const mergeRules = require("postcss-merge-rules")

const srcPath = {
  scss: "./sass/**/*.scss",
}

const distPath = {
  css: "./css/",
}

const cssSass = () => {
  // Check if source directory exists
  if (!fs.existsSync("./sass")) {
    console.error("Source directory not found.")
    process.exit(1)
  }

  return gulp
    .src(srcPath.scss, { sourcemaps: true })
    .pipe(
      plumber({ errorHandler: notify.onError("Error:<%= error.message %>") })
    )
    .pipe(sass({ outputStyle: "compressed" }))
    .pipe(autoprefixer())
    .pipe(postcss([mergeQueries(), mergeRules()]))
    .pipe(
      rename({
        extname: ".min.css",
      })
    )
    .pipe(gulp.dest(distPath.css, { sourcemaps: "./" }))
    .pipe(notify({ message: "Compiled Sass successfully.", onLast: true }))
}

const watchSassFiles = () => {
  gulp.watch(srcPath.scss, cssSass)
}

module.exports = {
  cssSass,
  watchSassFiles,
}
