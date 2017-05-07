module.exports = function( grunt ) {

grunt.loadNpmTasks( 'grunt-contrib-less' );
grunt.loadNpmTasks('grunt-contrib-watch');

grunt.initConfig( {
	pkg: grunt.file.readJSON( 'package.json' ),
	watch: {
		styles: {
			files: ['**/*.less'],
			tasks: ['build'],
			spawn: false
		}
	},
	less: {
		options: {
			compress: true
		},
		build: {
			src: 'style.less',
			dest: 'style.css'
		}
	}
} );

// Default task(s).
grunt.registerTask( 'build', [ 'less' ] );
grunt.registerTask( 'default', [ 'watch' ] );

};
