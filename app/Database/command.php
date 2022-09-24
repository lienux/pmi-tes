php spark make:migration CreateMahasiswaTable
php spark migrate:file 'app/Database/Migrations/2022-04-23-174255_CreateMahasiswaTable.php'

php spark make:seeder ProgramStudi --suffix
php spark db:seed MahasiswaSeeder