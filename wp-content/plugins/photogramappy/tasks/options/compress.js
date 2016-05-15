module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/pgm.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'pgm/'
	}
};