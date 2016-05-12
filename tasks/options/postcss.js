module.exports = {
	dist: {
		options: {
			processors: [
				require('autoprefixer')({browsers: 'last 2 versions'})
			]
		},
		files: { 
			'assets/css/photogramappy.css': [ 'assets/css/photogramappy.css' ]
		}
	}
};