module.exports = function( grunt ) {

grunt.loadNpmTasks( 'grunt-contrib-less' );

grunt.initConfig( {
	pkg: grunt.file.readJSON( 'package.json' ),
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
grunt.registerTask( 'default', [ 'less' ] );

};
