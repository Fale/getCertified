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
        $this->call('CertificationTableSeeder');
        $this->command->info('Certifications table seeded!');
        $this->call('ExamTableSeeder');
        $this->command->info('Exams table seeded!');
        $this->call('CertificationExamTableSeeder');
        $this->command->info('Certification-Exam table seeded!');
        $this->call('CertificationLanguageTableSeeder');
        $this->command->info('Certification-Language table seeded!');
    }

}