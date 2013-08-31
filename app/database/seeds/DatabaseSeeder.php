<?php

class DatabaseSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();

        $this->call('LanguageTableSeeder');
        $this->command->info('Languages table seeded!');
        $this->call('ProviderTableSeeder');
        $this->command->info('Providers table seeded!');
        $this->call('ExamTableSeeder');
        $this->command->info('Exams table seeded!');
        $this->call('ExamLanguageTableSeeder');
        $this->command->info('Exam-Language table seeded!');
        $this->call('CertificationTableSeeder');
        $this->command->info('Certifications table seeded!');
        $this->call('CertificationLanguageTableSeeder');
        $this->command->info('Certification-Language table seeded!');
        $this->call('CertificationRequirementsTableSeeder');
        $this->command->info('Certification requirements table seeded!');
    }

    public static function scandir($dir)
    {
        $root = scandir($dir);
        foreach($root as $value)
        {
            if ($value === '.' || $value === '..')
                continue;
            if (is_file("$dir/$value"))
            {
                $result[] = "$dir/$value";
                continue;
            }
            foreach (DatabaseSeeder::scandir("$dir/$value") as $value)
                $result[] = $value;
        }
        return $result;
    }
}