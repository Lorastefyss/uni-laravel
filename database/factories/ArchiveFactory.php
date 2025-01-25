<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\Archive;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ArchiveFactory extends Factory
{
    protected $model = Archive::class;

    public function definition()
    {
        $manager = new ImageManager(new Driver());
        
        $filename = $this->faker->uuid . '.jpg';
        $uploadPath = public_path('uploads');
        
        if (!File::exists($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true);
        }

        // Generate random RGB values
        $r = mt_rand(0, 255);
        $g = mt_rand(0, 255);
        $b = mt_rand(0, 255);
        $color = "rgb($r,$g,$b)";

        // Create image with background color
        $img = $manager->create(800, 600);

        $img->fill($color);
        
        // Add text
        $img->text('Sample Archive', 400, 300, function($font) {
            $font->size(48);
            $font->color('#FFFFFF');
            $font->align('center');
            $font->valign('middle');
        });

        $img->save($uploadPath . '/' . $filename);

        return [
            'event_id' => Event::inRandomOrder()->first()->id,
            'file_name' => 'uploads/' . $filename,
            'file_date' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}