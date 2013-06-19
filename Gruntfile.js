var jspaths = ['app/webroot/js-dev/classes/*.js','app/webroot/js-dev/main.js'];
var adminjspaths = ['app/webroot/js-dev/admin/*.js','app/webroot/js-dev/admin.js'];
var csspaths = [
  'app/webroot/sass/modules/*.scss',
  'app/webroot/sass/admin/modules/*.scss',
  'app/webroot/sass/admin/*.scss',
  'app/webroot/sass/*.scss'
];
var templatepaths = [];

module.exports = function(grunt) {

  grunt.initConfig({

    pkg: grunt.file.readJSON('package.json'),

    concat: {
      options: {
        banner: "(function(){\n\n",
        footer: "\n\n})();",
        separator: '\n\n'
      },
      site: {
        src: jspaths,
        dest: 'app/webroot/js/main.js'
      },
      admin: {
        src: adminjspaths,
        dest: 'app/webroot/js/admin.js'
      }
    },

    watch: {
      scripts:{
        files: jspaths,
        tasks: ['jshint', 'concat:site']
      },
      css:{
        files: csspaths,
        tasks:['compass:development']
      },
      admin: {
        files:adminjspaths,
        tasks: ['jshint', 'concat:admin']
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
  grunt.loadNpmTasks('grunt-contrib-compass');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  grunt.registerTask('default', ['jshint', 'concat:admin', 'concat:site', 'compass:development','watch']);

};