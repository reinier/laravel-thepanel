module.exports = function(grunt) {
	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		sass: {
			dist: {
		        files: {
		            './public/style/thepanel.css': './public/style/thepanel.scss',
		            '../../../public/packages/hidiyo/thepanel/style/thepanel.css': './public/style/thepanel.scss',
		            './public/style/frontpage.css': './public/style/frontpage.scss',
		            '../../../public/packages/hidiyo/thepanel/style/frontpage.css': './public/style/frontpage.scss'
		        }
		    }
	    },
		watch: {
			css: {
				files: ['**/*.scss'],
				tasks: ['sass']
			},
			reload: {
				files: ['**/*.blade.php','**/*.scss'],
				tasks: ['reload']
			},
			options: {
		      forever: true,
		    },
		},
	});

	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-contrib-sass');

	grunt.registerTask('watchreload', ['watch']);
	grunt.registerTask('default',['watch:css']);

	grunt.registerTask("reload", "reload Chrome on OS X",
	function() {
		require("child_process").exec("osascript " +
			"-e 'tell application \"Google Chrome\" " +
			"to tell the active tab of its first window' " +
			"-e 'reload' " +
			"-e 'end tell'");
	});
};