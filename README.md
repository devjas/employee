# Installation

1. Download employee package into your <code>"packages"</code> directory (packages directory is required) inside of your root Laravel project.
2. Open the <code>composer.json</code> file that's in the root of your project and add the following <br> <code>"Jas\\\ManageEmployees\\\\": "packages/employee/manageemployees/src/"</code> inside of <code>autoload > psr-4</code> and save the file.
3. Open <code>conifg > app.php</code> file and add the following <br><code>Jas\ManageEmployees\Providers\EmployeeServiceProvider::class,</code> inside of a providers array.
4. Open your command line, make sure you are in the root of your project and type <code>composer dump-autoload</code>.
5. Run <code>php artisan migrate</code> command. This will add all of the required tables into your database.
6. Run <code>php artisan vendor:publish</code> command, it will create required assets folder inside of your public directory.

This is a package preview example link //your-website/employee

Done!

Create your departments first as you won't be able to create employees unless you have departments available.

In some cases you might have to run <code>php artisan route:cache</code> command.
