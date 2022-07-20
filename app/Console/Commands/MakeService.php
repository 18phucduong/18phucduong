<?php

namespace App\Console\Commands;

class MakeService extends BaseMakeFile
{

    protected $extension = ".php";
    protected $fileName = "";
    protected $folderName = "Services";
    protected $folderPath = "";
    protected $fullFileName = "";
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {fileName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Make a service file';


    protected function  setFileName(): void
    {
        $this->fileName = $this->argument('fileName') . 'Service';
    }
    protected function generateContent()
    {
        return "<?php\n\nnamespace App\\{$this->folderName};\n\nclass {$this->fileName}\n{\n}\n";
    }
}
