module.exports = function(grunt) {

    // Project configuration.
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            web: {
                options: {
                    separator: '\n\n'
                },
                src: [
                    'public/static/web/app/main.js',
                    'public/static/web/app/factory/**/*.js',
                    'public/static/web/app/service/**/*.js',
                    'public/static/web/app/repository/**/*.js',
                    'public/static/web/app/controller/**/*.js',
                    'public/static/web/app/directive/**/*.js',
                    'public/static/web/app/config.js'
                ],
                dest: 'public/static/web/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            }, 
            
            admin: {
                options: {
                    separator: '\n\n'
                },
                src: [
                    'public/static/admin/app/main.js',
                    'public/static/admin/app/factory/**/*.js',
                    'public/static/admin/app/service/**/*.js',
                    'public/static/admin/app/repository/**/*.js',
                    'public/static/admin/app/controller/**/*.js',
                    'public/static/admin/app/directive/**/*.js',
                    'public/static/admin/app/config.js'
                ],
                dest: 'public/static/admin/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            }, 
            
            user: {
                options: {
                    separator: '\n\n'
                },
                src: [
                    'public/static/user/app/main.js',
                    'public/static/user/app/factory/**/*.js',
                    'public/static/user/app/service/**/*.js',
                    'public/static/user/app/repository/**/*.js',
                    'public/static/user/app/controller/**/*.js',
                    'public/static/user/app/directive/**/*.js',
                    'public/static/user/app/config.js'
                ],
                dest: 'public/static/user/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            },
            
            store: {
                options: {
                    separator: '\n\n'
                },
                src: [
                    'public/static/store/app/main.js',
                    'public/static/store/app/factory/**/*.js',
                    'public/static/store/app/service/**/*.js',
                    'public/static/store/app/repository/**/*.js',
                    'public/static/store/app/controller/**/*.js',
                    'public/static/store/app/directive/**/*.js',
                    'public/static/store/app/config.js'
                ],
                dest: 'public/static/store/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            },
            
            channel: {
                options: {
                    separator: '\n\n'
                },
                src: [
                    'public/static/channel/app/main.js',
                    'public/static/channel/app/factory/**/*.js',
                    'public/static/channel/app/service/**/*.js',
                    'public/static/channel/app/repository/**/*.js',
                    'public/static/channel/app/controller/**/*.js',
                    'public/static/channel/app/directive/**/*.js',
                    'public/static/channel/app/config.js'
                ],
                dest: 'public/static/channel/dist/<%= pkg.version %>/<%= pkg.name %>.js'
            }
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');

    // Default task(s).
    grunt.registerTask('default', ['concat']);

};