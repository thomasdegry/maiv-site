var jspaths = ['app/webroot/js-dev/classes/*.js','app/webroot/js-dev/main.js'];
var csspaths = ['app/webroot/sass/modules/*.scss', 'app/webroot/sass/*.scss'];
var templatepaths = [];

var concatpaths = [].concat(jspaths);

module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    concat: {
      options: {
        banner: "(function(){\n\n",
        footer: "\n\n})();",
        separator: '\n\n'
      },
      dist: {
        src: concatpaths,
        dest: 'app/webroot/js/main.js'
      }
    },

    watch: {
      scripts:{
        files: jspaths,
        tasks: ['jshint', 'concat']
      },
      css:{
        files: csspaths,
        tasks:['compass:development']
      }
    },

    uglify: {
      default: {
        options: {
          wrap: true
        },
        files: {
          'out/js/main.js': concatpaths
        }
      }
    },

    compass: {
      development: { 
        options: {
          sassDir: 'app/webroot/sass',
          cssDir: 'app/webroot/css',
          environment: 'development'
        }
      },
      production: { 
        options: {
          sassDir: 'app/webroot/sass',
          cssDir: 'out/css',
          environment: 'production',
          outputStyle: 'compressed',
          force: true
        }
      }
    },

    jshint:{
      default:{
        options: {
          curly: true,
          eqeqeq: true,
          immed: true,
          latedef: true,
          noarg: true,
          sub: true,
          undef: true,
          eqnull: true,
          browser: true,
          noempty: true,
          trailing: true,
          globals:{
              $: true,
              console:true,
              Handlebars:true,
              tpl:true,
              _:true,
              bean:true
          },
        },
        files:{
          src: jspaths
        }
      }
    }

  });

  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-handlebars');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  grunt.registerTask('default', ['jshint','concat','compass:development','watch']);

};