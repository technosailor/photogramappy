module.exports = {
	main: {
		options: {
			mode: 'zip',
			archive: './release/bmap.<%= pkg.version %>.zip'
		},
		expand: true,
		cwd: 'release/<%= pkg.version %>/',
		src: ['**/*'],
		dest: 'bmap/'
	}
};