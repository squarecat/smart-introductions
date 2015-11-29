module.exports = function(grunt) {

  'use strict';

  grunt.initConfig({

    jshint: {
      options: {
        jshintrc: '.jshintrc'
      },
      all: ['Gruntfile.js', 'src/javascript/**/*.js', '!src/javascript/templates.js']
    },

    sass: {
      dist: {
        files: {
          'assets/css/main.css':'scss/main.scss'
        }
      }
    },

    autoprefixer: {
      no_dest: {
        src: 'assets/css/main.css'
      }
    },

    watch: {
      sass: {
        files: ['scss/**/*.scss'],
        tasks: ['sass']
      },
      jshint: {
        files: ['js/**/*.js'],
        tasks: ['jshint']
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-jshint');
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('build', ['jshint', 'sass', 'autoprefixer']);
  grunt.registerTask('default', ['jshint', 'sass', 'autoprefixer', 'watch']);

};