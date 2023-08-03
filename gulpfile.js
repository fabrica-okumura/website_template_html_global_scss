const gulp = require('gulp');
const { watchSassFiles } = require('./gulp_tasks/sass');

exports.default = gulp.series(
  gulp.parallel(watchSassFiles)
);
