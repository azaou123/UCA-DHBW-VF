<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * This migration creates a settings table to store key-value pairs
     * for application configuration. The 'about_collaboration_description'
     * can be updated from the backoffice to manage collaboration content.
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('value');
            $table->timestamps();
        });

        DB::table('settings')->insert([
          'key' => 'about_collaboration_description',
          'value' => json_encode('Welcome to Cadi Ayyad University (UCA), in collaboration with Baden-Württemberg Cooperative State University (DHBW). This synergistic partnership exemplifies our commitment to innovation, academic excellence, and global collaboration. Developed by the talented students of Cadi Ayyad University, this website is a testament to our dedication to experiential learning and cross-cultural collaboration. With a rich tapestry of international partnerships, including DHBW, we aim to be a catalyst for positive change, nurturing talents, and shaping the future of education. Join us in exploring our journey, values, and the collective pursuit of knowledge that defines who we are. Together, with DHBW, we make a lasting impact on a global scale.'),
          'created_at' => now(),
          'updated_at' => now()
      ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
