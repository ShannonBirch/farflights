// Global Variables
//Created with help of http://wecodetheweb.com/2015/08/27/automating-ftp-deployment-with-travis-ci-and-gulp/


var ftp = require('vinyl-ftp');
var gutil = require('gulp.util');
var minimist = require('minimist'); //Enables it to get the ftp username and password
var args = minimist(process.argv.slice(2)); //Enables it to get the ftp username and password

gulp.task('deploy', function(){
	var remotePath = '/public_html/farflights.com/';
	var conn = ftp.create({
		host: 'ftp.catchtimeapp.com',
		user: args.user,
		password: args.password,
		log: gutil.log
	});
	
	return gulp.src(['./**/*.php', './**/*.css'])
		.pipe(conn.newer(remotePath))
		.pipe(conn.dest(remotePath));	
});

