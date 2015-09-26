module.exports = (grunt) ->
	require('load-grunt-tasks')(grunt)

	grunt.initConfig

		# CSS Processors
		sass:
			options:
				compress: false
				sourcemap: 'none'
			scss:
				files: [
					expand: true
					cwd: 'assets/css/'
					src: ['*.scss']
					dest: 'assets/css/'
					ext: '.min.css'
				]
		postcss:
			options:
				processors: [
					require 'autoprefixer-core'
					require 'csswring'
				]
			mincss:
				files: [
					expand: true
					cwd: 'assets/css/'
					src: ['*.min.css']
					dest: 'assets/css/'
				]

		# JS Processors
		import:
			js:
				expand: true
				cwd: 'assets/js/'
				src: ['*.js', '!*.min.js']
				dest: 'assets/js/'
				ext: '.min.js'
		uglify:
			minjs:
				files: [
					expand: true
					cwd: 'assets/js/'
					src: ['*.min.js']
					dest: 'assets/js/'
					ext: '.min.js'
				]

		# Watch
		watch:
			css:
				files: ['assets/css/*.scss']
				tasks: ['sass', 'postcss']
			js:
				files: ['assets/js/*.js', '!assets/js/*.min.js']
				tasks: ['import', 'uglify']



	# Register Tasks
	grunt.registerTask 'default', [
		'sass'
		'postcss'
		'import'
		'uglify'
	]
