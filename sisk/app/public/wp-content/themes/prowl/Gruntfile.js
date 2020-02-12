module.exports = function(grunt) {
  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    sass: {
      options: {
        includePaths: ['bower_components/foundation/scss']
      },
      dist: {
        options: {
          outputStyle: 'compressed'
        },
        files: {
          'assets/css/app.css': 'assets/scss/app.scss'
        }
      }
    },

    copy: {
      scripts: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.js',
        dest: 'js'
      },

      maps: {
        expand: true,
        cwd: 'bower_components/',
        src: '**/*.map',
        dest: 'js'
      },
    },

    uglify: {
      dist: {
        files: {
          'js/modernizr/modernizr.min.js': ['js/modernizr/modernizr.js']
        }
      }
    },

    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: [
          'js/modernizr/modernizr.min.js',
          'js/foundation/js/foundation.min.js',
          'js/slick.min.js'
        ],

        dest: 'assets/js/prowl.js',
      },

    },

    watch: {
      grunt: { files: ['Gruntfile.js'] },
      options: {
        livereload: true,
      },
      sass: {
        files: 'assets/scss/**/*.scss',
        tasks: ['sass'],
        options: {
          livereload: 35729
        }
      },
      php: {
        files: ['**/*.php'],
        options: {
          livereload: 35729
        }
      }
    }
  });



  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-uglify');

  grunt.registerTask('build', ['sass']);
  grunt.registerTask('default', ['copy', 'uglify', 'concat', 'watch']);

}