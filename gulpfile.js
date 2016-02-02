// Global Variables
//Created with help of http://wecodetheweb.com/2015/08/27/automating-ftp-deployment-with-travis-ci-and-gulp/

var gulp = require('gulp');
var ftp = require('vinyl-ftp');
var gutil = require('gulp-util');
var minimist = require('minimist'); //Enables it to get the ftp username and password
var args = minimist(process.argv.slice(2)); //Enables it to get the ftp username and password

gulp.task('deploy', function(){
	var remotePath = '';
	var conn = ftp.create({
		host: 'catchtimeapp.com',
		user: args.user,
		password: args.password,
		log: gutil.log
	});
	
	return gulp.src('./files/**')
		.pipe(conn.newer(remotePath))
		.pipe(conn.dest(remotePath));	
});

